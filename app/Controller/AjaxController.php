<?php
/**
 * Created by JetBrains PhpStorm.
 * User: netors
 * Date: 2/4/12
 * Time: 2:43 PM
 * To change this template use File | Settings | File Templates.
 * @property CampaignsLocation $CampaignsLocation
 * @property Producto $Producto
 * @property BusinessTypesBusinessType $BusinessTypesBusinessType
 */
class AjaxController extends AppController {

	public $components = array('AjaxHandler');
	public $uses = array('CampaignsLocation', 'Click','BusinessTypesBusinessType');

	public function beforeFilter() {
		parent::beforeFilter();

		$this->AjaxHandler->handle('*');
		// Or individual actions
		//$this->AjaxHandler->handle('login', 'logout', 'postComment');
	}

	public function admin_rev_adj($campaign_location_id = null, $rev_adj = null) {
		$response = array('success' => false);

		$this->CampaignsLocation->id = (int)$campaign_location_id;
		if ($this->CampaignsLocation->exists()) {
			if ($this->CampaignsLocation->updateAll(array('CampaignsLocation.rev_adj'=>(int)$rev_adj),array('CampaignsLocation.id'=>(int)$campaign_location_id))) {
				$response['data'] = $rev_adj;
				$response['success'] = true;
			} else {
				die('not saved');
				$response['data'] = __('Relevance could not be adjusted.');
				$response['code'] = -1;
			}
		} else {
			$response['data'] = __('CampaignLocation does not exist.');
			$response['code'] = -1;
		}

		return $this->AjaxHandler->respond('json', $response);
	}

	public function admin_btbt_weight_adj($business_types_business_type_id = null, $weight_adj = null) {
		$response = array('success' => false);

		$this->BusinessTypesBusinessType->id = (int)$business_types_business_type_id;
		if ($this->BusinessTypesBusinessType->exists()) {
			if ($this->BusinessTypesBusinessType->updateAll(array('BusinessTypesBusinessType.weight'=>(int)$weight_adj),array('BusinessTypesBusinessType.id'=>(int)$business_types_business_type_id))) {
				$response['data'] = $weight_adj;
				$response['success'] = true;
			} else {
				die('not saved');
				$response['data'] = __('Weight could not be adjusted.');
				$response['code'] = -1;
			}
		} else {
			$response['data'] = __('BusinessTypesBusinessType does not exist.');
			$response['code'] = -1;
		}

		return $this->AjaxHandler->respond('json', $response);
	}

	public function admin_get_latest_clicks() {
		$response = array('success' => false);

		$today = date('Y-m-d');
		$today_minus_30_days = date("Y-m-d", strtotime($today) - (30*86400));
		$conditions = array(
			'Click.created BETWEEN ? AND ?' => array($today_minus_30_days, $today),
			'Click.is_unique' => 1
		);
		$order = array('Click.created_date'=>'asc');
		$group = array(
			'created_date',
		);
		$fields = array('created_date','COUNT(*) as total');
		$params = array(
					'fields' => $fields,
					'conditions' => $conditions,
					'order' => $order,
					'group' => $group
				);

		$this->Click->unbindModelAll();
		$uniqueClicks = $this->Click->find('all', $params);
		unset($conditions['Click.is_unique']);
		$params['conditions'] = $conditions;
		$totalClicks = $this->Click->find('all', $params);

		if (!empty($uniqueClicks)||!empty($totalClicks)) {

			foreach ($uniqueClicks as $key => $uniqueClick) {
				$uniqueClicks[$key]['Click']['total'] = $uniqueClick[0]['total'];
				unset($uniqueClicks[$key][0]);
			}
			foreach ($totalClicks as $key => $totalClick) {
				$totalClicks[$key]['Click']['total'] = $totalClick[0]['total'];
				unset($totalClicks[$key][0]);
			}

			$response['data'] = array(
				'uniqueClicks' => $uniqueClicks,
				'totalClicks' => $totalClicks
			);
			$response['success'] = true;
		} else {
			$response['data'] = __('There are no clicks for the last 30 days.');
			$response['code'] = -1;
		}

		return $this->AjaxHandler->respond('json', $response);
	}

}
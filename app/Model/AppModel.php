<?php
App::uses('AppModel', 'Model');
/**
 * Created by JetBrains PhpStorm.
 * User: netors
 * Date: 11/11/11
 * Time: 2:25 AM
 * To change this template use File | Settings | File Templates.
 */
 
class AppModel extends Model {

	function unbindModelAll() {
		$unbind = array();
		foreach ($this->belongsTo as $model=>$info)
		{
			$unbind['belongsTo'][] = $model;
		}
		foreach ($this->hasOne as $model=>$info)
		{
			$unbind['hasOne'][] = $model;
		}
		foreach ($this->hasMany as $model=>$info)
		{
			$unbind['hasMany'][] = $model;
		}
		foreach ($this->hasAndBelongsToMany as $model=>$info)
		{
			$unbind['hasAndBelongsToMany'][] = $model;
		}
		parent::unbindModel($unbind);
	}
    
}
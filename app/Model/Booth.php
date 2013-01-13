<?php
App::uses('AppModel', 'Model');
/**
 * Booth Model
 *
 * @property User $User
 */
class Booth extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'location';

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'booth_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
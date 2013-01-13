<?php
App::uses('PhpassFormAuthenticate', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property ApiKey $ApiKey
 * @property Campaign $Campaign
 * @property Location $Location
 * @property UserProfile $UserProfile
 */
class User extends AppModel {

    /**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'username';

    /**
	 * Model Behaviors
	 *
	 * @var array
	 */
	public $actsAs = array('Acl' => array('type' => 'requester'));

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_banned' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'last_ip' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

    /**
     * beforeSave callback
     *
     * We use this callback to save the password using Phpass and to create the
     * unique hash of the User
     *
     * @return bool
     */
    function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		$this->data['User']['hash'] = Security::hash($this->data['User']['username'],'sha1',true);
        return true;
    }

    /**
     * parentNode method
     *
     * Used by the ACL Plugin
     *
     * @return array|null
     */
    function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['role_id'])) {
		$roleId = $this->data['User']['role_id'];
		} else {
			$roleId = $this->field('role_id');
		}
		if (!$roleId) {
		return null;
		} else {
			return array('Role' => array('id' => $roleId));
		}
	}

    /**
     * Creates virtual field
     *
     * @param bool $id
     * @param null $table
     * @param null $ds
     */
    public function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id,$table,$ds);
        $this->virtualFields = array('full_name' => 'CONCAT('.$this->alias.'.`name`, " ", '.$this->alias.'.lastname)');
    }

    /**
     * getRoleList method
     *
     * List used by the Filter
     *
     * @return mixed
     */
    public function getRoleList() {
        return $this->Role->find('list', array('order'=>array('name'=>'ASC')));
    }
}

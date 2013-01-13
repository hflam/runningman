<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 * @property Booth $Booth
 */
class User extends AppModel {

    /**
     * Behaviors
     *
     * @var array
     */
    public $actsAs = array(
	        'Acl' => array(
	            'type' => 'requester'
	        ),
	        'Containable',
        );

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

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
		'Booth' => array(
			'className' => 'Booth',
			'foreignKey' => 'booth_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
     * beforeSave method
     *
     * It is called before the Model saves the data,
     * it hashes the password for security reasons.
     *
     * @return void
     */
    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        if (isset($this->data['User']['username'])) {
            $this->data['User']['hash'] = Security::hash($this->data['User']['username'],'sha1',true);
        }
        return true;
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
}
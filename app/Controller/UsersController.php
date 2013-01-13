<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    //public $components = array('Filter.Filter');

    /**
     * Helpers
     *
     * @var array
     */
    //public $helpers = array('Filter.Filter');

    /**
     * Filters
     *
     * @var array
     */
    /*public $filters = array(
		'admin_index' => array(
			'User' => array(
                'User.name' => array(
                    'label' => 'Name'
                ),
                'User.lastname' => array(
                    'label' => 'Lastname'
                ),
                'User.username' => array(
                    'label' => 'Username'
                ),
                'User.email' => array(
                    'label' => 'Email'
                ),
                'User.role_id' => array(
                    'type' => 'select',
                    'label' => 'Role',
                    'selector' => 'getRoleList'
                ),
			)
		),
	);*/

    /**
     * beforeFilter
     */
    public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('login');
	}

	public function admin_home() {
	}

	public function admin_dashboard() {

	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	/**
	 * helpers method
	 *
	 * @return void
	 */
	public function admin_helpers() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate('User',array('User.role_id' =>Configure::read('Role.helper'))));
	}

    /**
     * view method
     *
     * @param string $id
     * @return void
     */
	public function admin_view($id = null) {
        $this->User->recursive = 2;
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add($role_id = null) {
		if ($this->request->is('post')) {
			$this->request->data['User']['is_active'] = 1;
			$this->request->data['User']['balance'] = 0;
            if ($this->request->data['User']['role_id']==Configure::read('Role.master')) unset($this->request->data['User']['role_id']);
            $this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'Flash/error');
			}
        } else {
            $this->request->data['User']['role_id'] = $role_id;
        }
		$booths = $this->User->Booth->find('list');
		$roles = $this->User->Role->find('list',array('conditions'=>array('id >'=>Configure::read('Role.admin'))));
		$this->set(compact('roles','booths'));
	}


    /**
     * admin_edit method
     *
     * @param string $id
     * @return void
     */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'Flash/error');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
        $roles = $this->User->Role->find('list',array('conditions'=>array('id !='=>Configure::read('Role.master'))));
        $this->set(compact('roles'));
	}

    /**
     * delete method
     *
     * @param string $id
     * @return void
     *
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}
     */
    /**
     * admin_deactivate method
     *
     * @param string $id
     * @return void
     */
	public function admin_deactivate($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->updateAll(array('is_active'=>0),array('User.id'=>$id))) {
			$this->Session->setFlash(__('User deactivated'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deactivated'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}

    /**
     * admin_activate method
     *
     * @param string $id
     * @return void
     */
	public function admin_activate($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->updateAll(array('is_active'=>1),array('User.id'=>$id))) {
			$this->Session->setFlash(__('User activated'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not activated'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}

	/**
	 * admin_login method
	 *
	 * @return void
	 */
	public function admin_login() {
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash(__('You are logged in!'),'Flash/info');
			$this->redirect('/', null, false);
		}
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
                if ($this->Session->read('Auth.User.is_active')) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash(__('This account is inactive. Contact your administrator.'),'Flash/error');
                    $this->redirect($this->Auth->logout());
                }
			} else {
				$this->Session->setFlash(__('Your username or password was incorrect.'),'Flash/error');
			}
		}
	}

	/**
	 * admin_profile method
	 *
	 * @return void
	 */
	public function admin_profile()  {
		$id = $this->Session->read('Auth.User.id');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}


	/**
	 * admin_logout method
	 *
	 * @return void
	 */
	public function admin_logout() {
		$this->Session->setFlash(__('Good-Bye'),'Flash/info');
		$this->redirect($this->Auth->logout());
	}
}

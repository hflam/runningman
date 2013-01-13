<?php
App::uses('AppController', 'Controller');
/**
 * Roles Controller
 *
 * @property Role $Role
 */
class RolesController extends AppController {

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Role->recursive = 0;
		$conditions = array('Role.id !=' => Configure::read('Role.master'));
		$this->set('roles', $this->paginate('Role', $conditions));
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this->Role->id = $id;
		if (!$this->Role->exists()||$id==Configure::read('Role.master')) {
			throw new NotFoundException(__('Invalid Role'));
		}
        $contain = array('User');
        $conditions = array('Role.id'=>$id);
        $role = $this->Role->find('first',compact('contain','conditions'));
		$this->set(compact('role'));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Role->create();
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The Role has been saved'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Role could not be saved. Please, try again.'),'Flash/error');
			}
        }
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if ($this->Session->read('Auth.User.role_id')!=Configure::read('Role.master')) throw new MethodNotAllowedException();
		$this->Role->id = $id;
		if (!$this->Role->exists()||$id==Configure::read('Role.master')) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Role->save($this->request->data)) {
				$this->Session->setFlash(__('The Role has been saved'),'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Role could not be saved. Please, try again.'),'Flash/error');
			}
		} else {
			$this->request->data = $this->Role->read(null, $id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if ($this->Session->read('Auth.User.role_id')!=Configure::read('Role.master')) throw new MethodNotAllowedException();
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Role->id = $id;
		if (!$this->Role->exists()) {
			throw new NotFoundException(__('Invalid role'));
		}
		if ($this->Role->delete()) {
			$this->Session->setFlash(__('Role deleted'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Role was not deleted'),'Flash/error');
		$this->redirect(array('action' => 'index'));
	}
}

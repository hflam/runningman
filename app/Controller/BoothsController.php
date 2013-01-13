<?php
App::uses('AppController', 'Controller');
/**
 * Booths Controller
 *
 * @property Booth $Booth
 */
class BoothsController extends AppController {
	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Booth->recursive = 0;
		$booths = $this->paginate();
		$this->set(compact('booths'));
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this->Booth->id = $id;
		if (!$this->Booth->exists()) {
			throw new NotFoundException(__('Invalid booth'));
		}
		$conditions = array('Booth.id' => $id);
		$booth = $this->Booth->find('first', compact('conditions'));
		$this->set(compact('booth'));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Booth->create();
			if ($this->Booth->save($this->request->data)) {
				$this->Session->setFlash(__('The booth has been saved'), 'default', array(), 'success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The booth could not be saved. Please, try again.'), 'default', array(), 'error');
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
		$this->Booth->id = $id;
		if (!$this->Booth->exists()) {
			throw new NotFoundException(__('Invalid booth'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Booth->save($this->request->data)) {
				$this->Session->setFlash(__('The booth has been saved'), 'default', array(), 'success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The booth could not be saved. Please, try again.'), 'default', array(), 'error');
			}
		} else {
			$this->request->data = $this->Booth->read(null, $id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Booth->id = $id;
		if (!$this->Booth->exists()) {
			throw new NotFoundException(__('Invalid booth'));
		}
		if ($this->Booth->delete()) {
			$this->Session->setFlash(__('Booth deleted'), 'default', array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Booth was not deleted'), 'default', array(), 'error');
		$this->redirect(array('action' => 'index'));
	}

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
		$this->Booth->id = $id;
		if (!$this->Booth->exists()) {
			throw new NotFoundException(__('Invalid Booth'));
		}
		if ($this->Booth->updateAll(array('is_active'=>0),array('Booth.id'=>$id))) {
			$this->Session->setFlash(__('Booth deactivated'), 'default', array(), 'success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Booth was not deactivated'), 'default', array(), 'error');
		$this->redirect($this->referer());
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
		$this->Booth->id = $id;
		if (!$this->Booth->exists()) {
			throw new NotFoundException(__('Invalid Booth'));
		}
		if ($this->Booth->updateAll(array('is_active'=>1),array('Booth.id'=>$id))) {
			$this->Session->setFlash(__('Booth activated'), 'default', array(), 'success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Booth was not activated'), 'default', array(), 'error');
		$this->redirect($this->referer());
	}
}

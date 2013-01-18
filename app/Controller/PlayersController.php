<?php
App::uses('AppController', 'Controller');
/**
 * Players Controller
 *
 * @property Player $Player
 */
class PlayersController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	/**
     * Models
     *
     * @var array
     */
    public $uses = array(
        'Player',
        'Booth'
    );
	
	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Player->recursive = 0;
		$players = $this->paginate();
		$this->set(compact('players'));
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$conditions = array('Player.id' => $id);
		$player = $this->Player->find('first', compact('conditions'));
		$this->set(compact('player'));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Player->create();
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'), 'default', array(), 'success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'), 'default', array(), 'error');
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Player->save($this->request->data)) {
				$this->Session->setFlash(__('The player has been saved'), 'default', array(), 'success');
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The player could not be saved. Please, try again.'), 'default', array(), 'error');
			}
		} else {
			$this->request->data = $this->Player->read(null, $id);
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		if ($this->Player->delete()) {
			$this->Session->setFlash(__('Player deleted'), 'default', array(), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Player was not deleted'), 'default', array(), 'error');
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid Player'));
		}
		if ($this->Player->updateAll(array('is_active'=>0),array('Player.id'=>$id))) {
			$this->Session->setFlash(__('Player deactivated'), 'default', array(), 'success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Player was not deactivated'), 'default', array(), 'error');
		$this->redirect($this->referer());
	}

	/**
	 * admin_token method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_token($id, $mode) {
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid player'));
		}
		$conditions = array('Player.id' => $id);
		$player = $this->Player->find('first', compact('conditions'));
		if ($mode == 'plus') {
			$player['Player']['tokens'] += 1;
			$word = 'increased';
		} else {
			if ($player['Player']['tokens'] > 0) {
				$player['Player']['tokens'] -= 1;
				$word = 'decreased';
			} else {
				$this->Session->setFlash(__('Not enough token for Player '.$player['Player']['name'].'.'), 'Flash/error');
				$this->redirect(array('action'=>'index'));
			}			
		}

		if ($this->Player->save($player)) {
			$this->Session->setFlash(__('Player '.$player['Player']['name'].'\'s token has '.$word.' by 1!'),'Flash/success');
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('The player could not be saved. Please, try again.'), 'Flash/error');
			$this->redirect(array('action'=>'index'));
		}
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
		$this->Player->id = $id;
		if (!$this->Player->exists()) {
			throw new NotFoundException(__('Invalid Player'));
		}
		if ($this->Player->updateAll(array('is_active'=>1),array('Player.id'=>$id))) {
			$this->Session->setFlash(__('Player activated'), 'default', array(), 'success');
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Player was not activated'), 'default', array(), 'error');
		$this->redirect($this->referer());
	}
}

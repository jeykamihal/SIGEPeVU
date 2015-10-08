<?php
App::uses('AppController', 'Controller');
/**
 * BonificacionsPersonals Controller
 *
 * @property BonificacionsPersonal $BonificacionsPersonal
 * @property PaginatorComponent $Paginator
 */
class BonificacionsPersonalsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BonificacionsPersonal->recursive = 0;
		$this->set('bonificacionsPersonals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BonificacionsPersonal->exists($id)) {
			throw new NotFoundException(__('Invalid bonificacions personal'));
		}
		$options = array('conditions' => array('BonificacionsPersonal.' . $this->BonificacionsPersonal->primaryKey => $id));
		$this->set('bonificacionsPersonal', $this->BonificacionsPersonal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BonificacionsPersonal->create();
			if ($this->BonificacionsPersonal->save($this->request->data)) {
				$this->Session->setFlash(__('La bonificación se ha guardado con Exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La bonificación no se ha guardado con exito. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$personals = $this->BonificacionsPersonal->Personal->find('list');
		$bonificacions = $this->BonificacionsPersonal->Bonificacion->find('list');
		$this->set(compact('personals', 'bonificacions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BonificacionsPersonal->exists($id)) {
			throw new NotFoundException(__('Invalid bonificacions personal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BonificacionsPersonal->save($this->request->data)) {
				$this->Session->setFlash(__('La bonificación se ha guardado con Exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La bonificación no se ha guardado con exito. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('BonificacionsPersonal.' . $this->BonificacionsPersonal->primaryKey => $id));
			$this->request->data = $this->BonificacionsPersonal->find('first', $options);
		}
		$personals = $this->BonificacionsPersonal->Personal->find('list');
		$bonificacions = $this->BonificacionsPersonal->Bonificacion->find('list');
		$this->set(compact('personals', 'bonificacions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BonificacionsPersonal->id = $id;
		if (!$this->BonificacionsPersonal->exists()) {
			throw new NotFoundException(__('Invalid bonificacions personal'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BonificacionsPersonal->delete()) {
			$this->Session->setFlash(__('La bonificación se ha sido eliminado.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('La bonificación no se ha eliminado. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

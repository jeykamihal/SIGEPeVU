<?php
App::uses('AppController', 'Controller');
/**
 * Bonificacions Controller
 *
 * @property Bonificacion $Bonificacion
 * @property PaginatorComponent $Paginator
 */
class BonificacionsController extends AppController {

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
		$this->Bonificacion->recursive = 0;
		$this->set('bonificacions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bonificacion->exists($id)) {
			throw new NotFoundException(__('Invalid bonificacion'));
		}
		$options = array('conditions' => array('Bonificacion.' . $this->Bonificacion->primaryKey => $id));
		$this->set('bonificacion', $this->Bonificacion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bonificacion->create();
			if ($this->Bonificacion->save($this->request->data)) {
				$this->Session->setFlash(__('La bonificación se ha guardado con Exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La bonificación no se ha guardado con exito. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$personals = $this->Bonificacion->Personal->find('list');
		$this->set(compact('personals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bonificacion->exists($id)) {
			throw new NotFoundException(__('Invalid bonificacion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bonificacion->save($this->request->data)) {
				$this->Session->setFlash(__('La bonificación se ha guardado con Exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La bonificación no se ha guardado con exito. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Bonificacion.' . $this->Bonificacion->primaryKey => $id));
			$this->request->data = $this->Bonificacion->find('first', $options);
		}
		$personals = $this->Bonificacion->Personal->find('list');
		$this->set(compact('personals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bonificacion->id = $id;
		if (!$this->Bonificacion->exists()) {
			throw new NotFoundException(__('Invalid bonificacion'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bonificacion->delete()) {
			$this->Session->setFlash(__('La bonificación se ha borrado con Exito.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('La bonificación no se ha podido eliminar. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

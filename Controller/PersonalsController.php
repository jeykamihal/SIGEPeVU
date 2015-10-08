<?php
App::uses('AppController', 'Controller');
/**
 * Personals Controller
 *
 * @property Personal $Personal
 * @property PaginatorComponent $Paginator
 */
class PersonalsController extends AppController {

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
		$this->Personal->recursive = 0;
		$this->set('personals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Personal->exists($id)) {
			throw new NotFoundException(__('Invalid personal'));
		}
		$options = array('conditions' => array('Personal.' . $this->Personal->primaryKey => $id));
		$this->set('personal', $this->Personal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Personal->create();
			if ($this->Personal->save($this->request->data)) {
				$this->Session->setFlash(__('El agente ha sido guardado.'), 'default', array('class' => 'alert alert-success'));
      
                                $expr = ($this->request->data ['Personal']['Estado']);
                                if($expr == 'PERSONAL CONTRATADO'){
                                    return $this->redirect(array('controller'=> 'Contratos', 'action' => 'add'));
                                } else {
                                    return $this->redirect(array('action' => 'index'));
                                }
                  
			} else {
				$this->Session->setFlash(__('No se ha podido guardar al agente. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$comisions = $this->Personal->Comision->find('list');
		$bonificacions = $this->Personal->Bonificacion->find('list');
		//$this->set(compact('comisions', 'bonificacions'));
                $estados = array('PLANTA PERMANENTE'=>'PLANTA PERMANTE', 'PERSONAL CONTRATADO'=>'PERSONAL CONTRATADO'); //PARA CARGAR EL COMBO EN PERSONAL DE MANERA ESTATICA
                $this->set(compact('comisions', 'bonificacions', 'estados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Personal->exists($id)) {
			throw new NotFoundException(__('Invalid personal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Personal->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos del personal se han editados con exito.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido guardar los cambios de los datos del personal. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Personal.' . $this->Personal->primaryKey => $id));
			$this->request->data = $this->Personal->find('first', $options);
		}
		$comisions = $this->Personal->Comision->find('list');
		$bonificacions = $this->Personal->Bonificacion->find('list');
                $estados = array('PLANTA PERMANENTE'=>'PLANTA PERMANTE', 'PERSONAL CONTRATADO'=>'PERSONAL CONTRATADO');
                $this->set(compact('comisions', 'bonificacions', 'estados'));
		//$this->set(compact('comisions', 'bonificacions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Personal->id = $id;
		if (!$this->Personal->exists()) {
			throw new NotFoundException(__('Invalid personal'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Personal->delete()) {
			$this->Session->setFlash(__('El personal ha sido eliminado.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('No se ha podido eliminar al personal. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


      
}

<?php
App::uses('AppController', 'Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 * @property PaginatorComponent $Paginator
 */
class EquiposController extends AppController {

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
		$this->Equipo->recursive = 0;
		$this->set('equipos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Equipo->exists($id)) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		$options = array('conditions' => array('Equipo.' . $this->Equipo->primaryKey => $id));
		$this->set('equipo', $this->Equipo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Equipo->create();
			if ($this->Equipo->save($this->request->data)) {
				$this->Session->setFlash(__('El equipo ha sido guardado.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El equipo no se ha podido guardar. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$personals = $this->Equipo->Personal->find('list');
		$this->set(compact('personals'));
                $equEstados = array('FUNCIONA' => 'FUNCIONA', 'NO FUNCIONA' => 'NO FUNCIONA', 'EN REPARACION' => 'EN REPARACION', 'NO DEFINIDO' => 'NO DEFINIDO');
                $this ->set(compact('equEstados'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Equipo->exists($id)) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Equipo->save($this->request->data)) {
				$this->Session->setFlash(__('Se ha guardado los cambios del equipo.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido guardar los cambios del equipo. Por favor intente nuevamente
                                    .'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Equipo.' . $this->Equipo->primaryKey => $id));
			$this->request->data = $this->Equipo->find('first', $options);
		}
		$personals = $this->Equipo->Personal->find('list');
		$this->set(compact('personals'));
                 $equEstados = array('FUNCIONA' => 'FUNCIONA', 'NO FUNCIONA' => 'NO FUNCIONA', 'EN REPARACION' => 'EN REPARACION', 'NO DEFINIDO' => 'NO DEFINIDO');
                $this ->set(compact('equEstados'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid equipo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Equipo->delete()) {
			$this->Session->setFlash(__('El equipo se ha eliminado.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('El equipo no se ha eliminado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


        public function equiposestados(){
            $this->Equipo->recursive = 0;
            $equiposestados =$this->Equipo->find('all');
            $this->set('equiposestados',$equiposestados);
        }

}

<?php
App::uses('AppController', 'Controller');
/**
 * Contratos Controller
 *
 * @property Contrato $Contrato
 * @property PaginatorComponent $Paginator
 */
class ContratosController extends AppController {

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
		$this->Contrato->recursive = 0;
		$this->set('contratos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contrato->exists($id)) {
			throw new NotFoundException(__('Invalid contrato'));
		}
		$options = array('conditions' => array('Contrato.' . $this->Contrato->primaryKey => $id));
		$this->set('contrato', $this->Contrato->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contrato->create();
			if ($this->Contrato->save($this->request->data)) {
				$this->Session->setFlash(__('El contrato se ha guardado.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El contrato no se ha podido guardar. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$personals = $this->Contrato->Personal->find('list');
		//$this->set(compact('personals'));
                $conTipos = array('SERVICIO'=>'SERVICIO', 'DIRECTA'=>'DIRECTA');
                $this->set(compact('personals', 'conTipos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contrato->exists($id)) {
			throw new NotFoundException(__('Contrato Invalido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contrato->save($this->request->data)) {
				$this->Session->setFlash(__('El contrato ha sido editado.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido guardar el contrato. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Contrato.' . $this->Contrato->primaryKey => $id));
			$this->request->data = $this->Contrato->find('first', $options);
		}
		$personals = $this->Contrato->Personal->find('list');
		//$this->set(compact('personals'));
                $conTipo = array('SERVICIO'=>'SERVICIO', 'DIRECTA'=>'DIRECTA');
                $this->set(compact('personals', 'conTipo'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contrato->id = $id;
		if (!$this->Contrato->exists()) {
			throw new NotFoundException(__('Invalid contrato'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contrato->delete()) {
			$this->Session->setFlash(__('El contrato se ha eliminado.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('El contrato no se ha eliminado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}




        public function vencidos() {
//		$this->Contrato->recursive = 0;
//        $q = array($this->Contrato->query('SELECT `Contrato`.`id`, `Contrato`.`conTipo`, `Contrato`.`conPlazo`, `Contrato`.`conFecIni`, `Contrato`.`conFecFin`, `Contrato`.`personal_id`, `Personal`.`id`, `Personal`.`Apellido_Nombre`, `Personal`.`DNI`, `Personal`.`Legajo`, `Personal`.`Clase`, `Personal`.`Cargo`, `Personal`.`Estado`, `Personal`.`Localidad`, `Personal`.`Obra`, `Personal`.`comision_id` FROM `dvppevu`.`contratos` AS `Contrato` LEFT JOIN `dvppevu`.`personals` AS `Personal` ON (`Contrato`.`personal_id` = `Personal`.`id`) WHERE `Contrato`.`conFecFin` >= curdate()'));
//        $opciones = array('conditions' => array($q));
//        $this->set('contratosVencidos', $opciones);


        $this->Contrato->recursive = 0;
        $this->set('contratosVencidos', $this->Contrato->query('SELECT `Contrato`.`id`, `Contrato`.`conTipo`, `Contrato`.`conPlazo`, `Contrato`.`conFecIni`, `Contrato`.`conFecFin`, `Contrato`.`personal_id`, `Personal`.`id`, `Personal`.`Apellido_Nombre`, `Personal`.`DNI`, `Personal`.`Legajo`, `Personal`.`Clase`, `Personal`.`Cargo`, `Personal`.`Estado`, `Personal`.`Localidad`, `Personal`.`Obra`, `Personal`.`comision_id` FROM `dvppevu`.`contratos` AS `Contrato` LEFT JOIN `dvppevu`.`personals` AS `Personal` ON (`Contrato`.`personal_id` = `Personal`.`id`) WHERE MONTH(`Contrato`.`conFecFin`) = MONTH(curdate())'));
    }

    public function imprimirconstancia($personal_id,$contrato_id){
        Configure::write('debug', 0);
        $this->loadModel('Personal');
        $personal = $this->Personal->find('first',array('conditions'=>array('Personal.id'=>$personal_id)));
        $this->set('personal',$personal);

        $contratovencido = $this->Contrato->find('first',array('conditions'=>array('Contrato.id'=>$contrato_id)));
        $this->set('contratovencido',$contratovencido);


    }

  
}

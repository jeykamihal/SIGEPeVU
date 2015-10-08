<?php

App::uses('AppController', 'Controller');

/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 */
class EquiposComisionsController extends AppController {

    public $helpers = array('Js' => array('Jquery'), 'Javascript');
    public $paginate = array(
        'Personal' => array('limit' => 25)
    );
    public $uses = array('Personal');

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $title = array();
        $conditions = array();




        // filter by Codigo Equipo
        //
//                if(!empty($this->passedArgs['Comision.id'])) {
//
////                    $conditions['Equipo.equCodigo LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.equCodigo']);
////                    $this->request->data['Buscar']['equCodigo'] = $this->passedArgs['Buscar.equCodigo'];
////                    $title[] = __('Equipo',true).': '.$this->passedArgs['Buscar.equCodigo'];
//                    $idComision = Comision.id;
//                    $this->Equipo->recursive = 0;
//        $this->set('equicomision', $this->Equipo->query('SELECT * FROM `dvppevu`.`equipos` AS `E`, `dvppevu`.`personals` AS `P` WHERE `E`.`personal_id` = `P`.`id` AND `P`.`comision_id`'== $idComision ));
//                }
//                $this->loadModel('Equipo');
        $this->Personal->recursive = 0;
//        $equipos = $this->Equipo->find('all',array('conditions'=>$conditions));
//		$this->set('equipos', $equipos);
        $this->set('personal', $this->paginate($conditions));
        $this->set(compact('title'));


        $comisions = $this->Personal->Comision->find('list'); //para cargar el combo de Eqencomision
        $this->set(compact('comisions'));
    }

    public function buscar() {
        // the page we will redirect to
        $url['action'] = 'index';

        // build a URL will all the search elements in it
        // the resulting URL will be
        // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
        foreach ($this->request->data as $k => $v) {
            foreach ($v as $kk => $vv) {
                $url[$k . '.' . $kk] = $vv;
            }
        }

        // redirect the user to the url
        $this->redirect($url, null, true);
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
                $this->Session->setFlash(__('El equipo no se ha guardado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $personals = $this->Equipo->Personal->find('list');
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
        if (!$this->Equipo->exists($id)) {
            throw new NotFoundException(__('Invalid equipo'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Equipo->save($this->request->data)) {
                $this->Session->setFlash(__('El equipo ha sido guardado.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('El equipo no se ha guardado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Equipo.' . $this->Equipo->primaryKey => $id));
            $this->request->data = $this->Equipo->find('first', $options);
        }
        $personals = $this->Equipo->Personal->find('list');
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
        $this->Equipo->id = $id;
        if (!$this->Equipo->exists()) {
            throw new NotFoundException(__('Invalid equipo'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Equipo->delete()) {
            $this->Session->setFlash(__('El equipo ha sido eliminado.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('El equipo no se ha eliminado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function eqcomi() {
        $aux = $this->request->data ['EquiposComisions']['comision_id'];
        $this->loadModel('Equipo');
        $this->Equipo->recursive = 0;
        $this->set('equiposcomisions', $this->Equipo->query('SELECT `E`.`id`, `E`.`equCodigo`, `E`.`equTipo`, `E`.`personal_id`, `Personal`.`id`, `Personal`.`Apellido_Nombre`, `Personal`.`comision_id` FROM `dvppevu`.`equipos` AS `E` LEFT JOIN `dvppevu`.`personals` AS `Personal` ON (`E`.`personal_id` = `Personal`.`id`) WHERE `Personal`.`comision_id`= ' . $aux));
        $this->set('idcomision',$aux);//paso a la vista el id de comision que se envia por post porqu se pierde--->KIKO 09-09-15
    }

    
    public function imprimirequiposxcomision($idcomision = null) {
        Configure::write('debug',0);
        $this->loadModel('Equipo');
        //$this->Equipo->recursive = 0;
        $equiposxcomisions = $this->Equipo->query('SELECT `E`.`id`, `E`.`equCodigo`, `E`.`equTipo`, `E`.`personal_id`, `Personal`.`id`, `Personal`.`Apellido_Nombre`, `Personal`.`comision_id` FROM `dvppevu`.`equipos` AS `E` LEFT JOIN `dvppevu`.`personals` AS `Personal` ON (`E`.`personal_id` = `Personal`.`id`) WHERE `Personal`.`comision_id`= ' . $idcomision);
        $this->set('equiposxcomisions',$equiposxcomisions);
        $this->loadModel('Comision');
        $datoscom = $this->Comision->find('first',array('conditions'=>array('Comision.id'=>$idcomision)));
        $this->set('datoscom',$datoscom);
    }

}

?>

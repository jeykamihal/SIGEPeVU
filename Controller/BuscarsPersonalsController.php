<?php
App::uses('AppController', 'Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 */
class BuscarsPersonalsController  extends AppController {
//    
        public $helpers = array('Js' => array('Jquery'),'Javascript');
        
        public $paginate = array(
        
        'Personal' => array ('limit' => 25)
    );
        
        public $uses=array('Personal'); 
		
        

/**
 * index method
 *
 * @return void
 */
	public function index() {
                // the elements from the url we set above are read 
                // automagically by cake into $this->passedArgs[]
                // eg:
                // $passedArgs['Search.keywords'] = mykeyword
                // $passedArgs['Search.tag_id'] = 3

                // required if you are using Containable
                // requires Post to have the Containable behaviour
                //$contain = array(); 

                // we want to set a title containing all of the
                // search criteria used (not required)     
                $title = array();
                $conditions = array();

                 //
                // filter by nombreapellido
                //
//                if(!empty($this->passedArgs['Buscar.Apellido_Nombre'])) {
//                    
//                    $conditions['Personal.Apellido_Nombre LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.Apellido_Nombre']);
//                    
//                     $this->request->data['Buscar']['Apellido_Nombre'] = $this->passedArgs['Buscar.Apellido_Nombre'];
//                    
//                    $title[] = __('Apellido y Nombre',true).': '.$this->passedArgs['Buscar.Apellido_Nombre'];
//                    
//                    
//                }
                 //
               			

                // filter by Apellido y Nombre	
                //
                if(!empty($this->passedArgs['BuscarsPersonal.Apellido_Nombre'])) {
                    
                    $conditions['Personal.Apellido_Nombre LIKE '] = str_replace('*','%',$this->passedArgs['BuscarsPersonal.Apellido_Nombre']);
                    $this->request->data['BuscarsPersonal']['Apellido_Nombre'] = $this->passedArgs['BuscarsPersonal.Apellido_Nombre'];
                    $title[] = __('Personal',true).': '.$this->passedArgs['BuscarsPersonal.Apellido_Nombre'];
                    
                }
				
				
				// filter by Clase	
                //
                if(!empty($this->passedArgs['BuscarsPersonal.Clase'])) {
                    
                    $conditions['Personal.Clase LIKE '] = str_replace('*','%',$this->passedArgs['BuscarsPersonal.Clase']);
                    $this->request->data['BuscarsPersonal']['Clase'] = $this->passedArgs['BuscarsPersonal.Clase'];
                    $title[] = __('Personal',true).': '.$this->passedArgs['BuscarsPersonal.Clase'];
                    
                }
				

                $this->Personal->recursive = 0;
                $this->set('personals', $this->paginate($conditions));
                $this->set(compact('title'));
                
                 
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
				$this->Session->setFlash(__('El agente fue guardado'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El agente no ha sido guardado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$comisions = $this->Personal->Comision->find('list');
		$bonificacions = $this->Personal->Bonificacion->find('list');
		$this->set(compact('comisions', 'bonificacions'));
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
				$this->Session->setFlash(__('Se han modificado los datos del agente.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se ha podido modificar los datos. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Personal.' . $this->Personal->primaryKey => $id));
			$this->request->data = $this->Personal->find('first', $options);
		}
		$comisions = $this->Personal->Comision->find('list');
		$bonificacions = $this->Personal->Bonificacion->find('list');
		$this->set(compact('comisions', 'bonificacions'));
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
			$this->Session->setFlash(__('Se ha eliminado al agente.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('El agente no ha sido eliminado. Por favor, intente nuevamente.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

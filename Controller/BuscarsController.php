<?php
App::uses('AppController', 'Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 */
class BuscarsController  extends AppController {
//    
        public $helpers = array('Js' => array('Jquery'),'Javascript');
        
        public $paginate = array(
        
        'Equipo' => array ('limit' => 25)
    );
        
        public $uses=array('Equipo');

        

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
                // filter by Codigo Equipo	
                //
                if(!empty($this->passedArgs['Buscar.equCodigo'])) {
                    
                    $conditions['Equipo.equCodigo LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.equCodigo']);
                    $this->request->data['Buscar']['equCodigo'] = $this->passedArgs['Buscar.equCodigo'];
                    $title[] = __('Equipo',true).': '.$this->passedArgs['Buscar.equCodigo'];
                    
                }
                //
                // filter by Codigo Equipo	
                //
                if(!empty($this->passedArgs['Buscar.equPatente'])) {
                    
                    $conditions['Equipo.equPatente LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.equPatente']);
                    $this->request->data['Buscar']['equPatente'] = $this->passedArgs['Buscar.equPatente'];
                    $title[] = __('Equipo',true).': '.$this->passedArgs['Buscar.equPatente'];
                    
                }
                //
                // filter by Tpo
                //
                if(!empty($this->passedArgs['Buscar.equTipo'])) {
                    
                    $conditions['Equipo.equTipo LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.equTipo']);
                    $this->request->data['Buscar']['equTipo'] = $this->passedArgs['Buscar.equTipo'];
                    $title[] = __('Equipo',true).': '.$this->passedArgs['Buscar.equTipo'];
                    
                }
                
                
//                $this->loadModel('Equipo');
                $this->Equipo->recursive = 0;
//        $equipos = $this->Equipo->find('all',array('conditions'=>$conditions));
//		$this->set('equipos', $equipos);
                $this->set('equipos', $this->paginate($conditions));
                $this->set(compact('title'));
                
                 
	}

 /*       public function buscarpersonal() {
                $this->autoRender = false;

                // get the search term from URL
                $term = $this->request->query['q'];
                $this->loadModel('Personal');
                $productores = $this->Personal->find('all', array(
                    'conditions' => array(
                        'Personal.Apellido_Nombre LIKE' => '%' . $term . '%'
                    )
                        ));

                // Format the result for select2
                $result = array();
                foreach ($personales as $key => $personal) {
                    $result[$key]['id'] = (int) $productor['Personal']['id'];
                    $result[$key]['text'] = $productor['Personal']['Apellido_Nombre'];
                }
                $personals = $result;

                echo json_encode($personals);
        }
        
        public function buscaroficina() {
                $this->autoRender = false;
                $this->loadModel('Oficina');
                
                if (!empty($this->request->data['id'])) {
                    $term = $this->request->data['id'];

                    $oficinas = $this->Oficina->find('all', array(
                        'conditions' => array(
                            'Oficina.id' => $term
                        )
                            ));
                } else {

                    $term = $this->request->query['q'];

                    $oficinas = $this->Oficina->find('all', array(
                        'conditions' => array(
                            'Oficina.descripcionoficina LIKE' => '%' . $term . '%'
                        )
                            ));
                }

                // Format the result for select2
                $result = array();
                foreach ($oficinas as $key => $oficina) {
                    $result[$key]['id'] = (int) $oficina['Oficina']['id'];
                    $result[$key]['text'] = $oficina['Oficina']['descripcionoficina'];
                }
                $oficinas = $result;

                echo json_encode($oficinas);
        }*/
        
        
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
}

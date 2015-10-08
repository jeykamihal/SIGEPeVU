<?php
App::uses('AppController', 'Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 */
class ExpedientesController  extends AppController {
//    public $helpers = array(
//		'Session',
//		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
//		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
//		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
//	);
        public $helpers = array('Js' => array('Jquery'),'Javascript');

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
                if(!empty($this->passedArgs['Buscar.Apellido_Nombre'])) {
                    
                    $conditions['Equipo.Apellido_Nombre LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.Apellido_Nombre']);
                    
                     $this->request->data['Buscar']['Apellido_Nombre'] = $this->passedArgs['Buscar.Apellido_Nombre'];
                    
                    $title[] = __('Apellido y Nombre',true).': '.$this->passedArgs['Buscar.Apellido_Nombre'];
                    
                    
                }
                 //
                // filter by Codigo Equipo	
                //
                if(!empty($this->passedArgs['Buscar.equCodigo'])) {
                    
                    $conditions['Equipo.equCodigo LIKE '] = str_replace('*','%',$this->passedArgs['Buscar.equCodigo']);
                    $this->request->data['Buscar']['equCodigo'] = $this->passedArgs['Buscar.equCodigo'];
                    $title[] = __('Equipo',true).': '.$this->passedArgs['Buscar.equCodigo'];
                    
                }
                
                 //
                // filter by Fecha
                //
               /* if(!empty($this->passedArgs['Buscar.fecha'])) {
                    
                    $conditions['Equipo.fechaexp'] = str_replace('*','%',$this->passedArgs['Buscar.fecha']);
                    $this->request->data['Buscar']['fecha'] = $this->passedArgs['Buscar.fecha'];
                    $title[] = __('Fecha',true).': '.$this->passedArgs['Buscar.fecha'];
                    
                }
                
                //
                // filter by conTipo
                //
                if(!empty($this->passedArgs['Buscar.conTipo'])) {

                    $EquiposdelconTipo= $this->Equipo->query("select Equipo_id from Equipos_conTipoes where conTipoe_id = ". $this->passedArgs['Buscar.conTipo']);
                    $Equipos_ids = array();
                    foreach ($EquiposdelconTipo as $et){
                        $Equipos_ids[] = $et['Equipos_conTipoes']['Equipo_id'];
                    }
                    $conditions['Equipo.id'] = $Equipos_ids;                   
                    $this->request->data['Buscar']['conTipo'] = $this->passedArgs['Buscar.conTipo'];
                    $title[] = __('conTipo',true).': '.$this->passedArgs['Buscar.conTipo'];
                    
                }

                //
                // filter by Productor
                //
                if(!empty($this->passedArgs['Buscar.productor'])) {

                    $Equiposdelproductor= $this->Equipo->query("select Equipo_id from Equipos_productores where productore_id = ". $this->passedArgs['Buscar.productor']);
                    $Equipos_ids = array();
                    foreach ($Equiposdelproductor as $et){
                        $Equipos_ids[] = $et['Equipos_productores']['Equipo_id'];
                    }
                    $conditions['Equipo.id'] = $Equipos_ids;                   
                    $this->request->data['Buscar']['productor'] = $this->passedArgs['Buscar.productor'];
                    $title[] = __('conTipo',true).': '.$this->passedArgs['Buscar.conTipo'];
                    
                }
                
                //
                // filter by Oficina
                //
                if(!empty($this->passedArgs['Buscar.oficina'])) {
                    
                    $conditions['Equipo.oficina_id'] = $this->passedArgs['Buscar.oficina'];
                    
                    $this->request->data['Buscar']['oficina'] = $this->passedArgs['Buscar.oficina'];
                    
                    $title[] = __('Oficina',true).': '.$this->passedArgs['Buscar.oficina'];
                    
                }
                
                
                // set title
                $title = implode(' | ',$title);
                $title = (isset($title)&&$title)?$title:__('All Equipos',true);
                
                $this->loadModel('EquiposProductore');
                $this->set('Equiposproductores',$this->EquiposProductore->find('all'));
                
                $this->loadModel('EquiposconTipoe');
                $this->set('EquiposconTipoes',$this->EquiposconTipoe->find('all'));
                

		$this->Equipo->recursive = 0;
		$this->set('Equipos', $this->paginate($conditions));
                $this->set(compact('title'));*/
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid Equipo'));
		}
		$this->set('Equipo', $this->Equipo->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Equipo->create();
                        
                        if (!empty($this->request->data['Productore']['Productore'])){
                            $prod = explode(',',$this->request->data['Productore']['Productore']);
                            $this->request->data['Productore']['Productore'] = $prod;
                        }
                        if (!empty($this->request->data['conTipoe']['conTipoe'])){
                            $tit = explode(',',$this->request->data['conTipoe']['conTipoe']);
                            $this->request->data['conTipoe']['conTipoe'] = $tit;
                        }
                        
			if ($this->Equipo->save($this->request->data)) {
				$this->Session->setFlash(__('The Equipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Equipo could not be saved. Please, try again.'));
			}
		}
                $tipodocumentos = $this->Equipo->Tipodocumento->find('list');
		$tenenciatierras = $this->Equipo->Tenenciatierra->find('list');
		$tipoplanes = $this->Equipo->Tipoplane->find('list');
		$departamentos = $this->Equipo->Departamento->find('list');
		$tecnicos = $this->Equipo->Tecnico->find('list');
		$estados = $this->Equipo->Estado->find('list');
		$oficinas = $this->Equipo->Oficina->find('list');
		//$productores = $this->Equipo->Productore->find('list',array('fields'=>array('id','nombredocumento')));
		$conTipoes = $this->Equipo->conTipoe->find('list');
		$this->set(compact('tipodocumentos','tenenciatierras', 'tipoplanes', 'departamentos', 'tecnicos', 'estados', 'oficinas', 'conTipoes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid Equipo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Equipo->save($this->request->data)) {
				$this->Session->setFlash(__('The Equipo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Equipo could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Equipo->read(null, $id);
		}
                $tipodocumentos = $this->Equipo->Tipodocumento->find('list');
		$tenenciatierras = $this->Equipo->Tenenciatierra->find('list');
		$tipoplanes = $this->Equipo->Tipoplane->find('list');
		$departamentos = $this->Equipo->Departamento->find('list');
		$tecnicos = $this->Equipo->Tecnico->find('list');
		$estados = $this->Equipo->Estado->find('list');
		$oficinas = $this->Equipo->Oficina->find('list');
		$productores = $this->Equipo->Productore->find('list');
		$conTipoes = $this->Equipo->conTipoe->find('list');
		$this->set(compact('tipodocumentos','tenenciatierras', 'tipoplanes', 'departamentos', 'tecnicos', 'estados', 'oficinas', 'productores', 'conTipoes'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Equipo->id = $id;
		if (!$this->Equipo->exists()) {
			throw new NotFoundException(__('Invalid Equipo'));
		}
		if ($this->Equipo->delete()) {
			$this->Session->setFlash(__('Equipo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Equipo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function buscarconTipo() {
                $this->autoRender = false;
                $this->loadModel('conTipoe');
                
                if (!empty($this->request->data['id'])) {
                    $term = $this->request->data['id'];

                    $conTipoes = $this->conTipoe->find('all', array(
                        'conditions' => array(
                            'conTipoe.id' => $term
                        )
                            ));
                } else {
                    // get the search term from URL
                    $term = $this->request->query['q'];

                    $conTipoes = $this->conTipoe->find('all', array(
                        'conditions' => array(
                            'conTipoe.nombreconTipo LIKE' => '%' . $term . '%'
                        )
                            ));
                }

                // Format the result for select2
                $result = array();
                foreach ($conTipoes as $key => $conTipo) {
                    $result[$key]['id'] = (int) $conTipo['conTipoe']['id'];
                    $result[$key]['text'] = $conTipo['conTipoe']['nombredocumento'];
                }
                $conTipoes = $result;

                echo json_encode($conTipoes);
        }
        
        public function buscarproductor() {
                $this->autoRender = false;

                // get the search term from URL
                $term = $this->request->query['q'];
                $this->loadModel('Productore');
                $productores = $this->Productore->find('all', array(
                    'conditions' => array(
                        'Productore.nombreproductor LIKE' => '%' . $term . '%'
                    )
                        ));

                // Format the result for select2
                $result = array();
                foreach ($productores as $key => $productor) {
                    $result[$key]['id'] = (int) $productor['Productore']['id'];
                    $result[$key]['text'] = $productor['Productore']['nombredocumento'];
                }
                $productores = $result;

                echo json_encode($productores);
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
        }
        
        
        public function buscar() {
            // the page we will redirect to
            $url['action'] = 'index';

            // build a URL will all the search elements in it
            // the resulting URL will be
            // example.com/cake/posts/index/Search.keywords:mykeyword/Search.tag_id:3
            foreach ($this->data as $k => $v) {
                foreach ($v as $kk => $vv) {
                    $url[$k . '.' . $kk] = $vv;
                }
            }

            // redirect the user to the url
            $this->redirect($url, null, true);
        }
}

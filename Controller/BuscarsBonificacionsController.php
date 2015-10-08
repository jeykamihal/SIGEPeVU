<?php
App::uses('AppController', 'Controller');
/**
 * Equipos Controller
 *
 * @property Equipo $Equipo
 */
class BuscarsBonificacionsController  extends AppController {
//    
        public $helpers = array('Js' => array('Jquery'),'Javascript');
        
        public $paginate = array(
        
        'Bonificacion' => array ('limit' => 25)
    );
        
        public $uses=array('Bonificacion');

        

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

                // filter by Bonificacion	
                //
                if(!empty($this->passedArgs['BuscarsBonificacion.bonTipo'])) {
                    
                    $conditions['Bonificacion.bonTipo LIKE '] = str_replace('*','%',$this->passedArgs['BuscarsBonificacion.bonTipo']);
                    $this->request->data['BuscarsBonificacion']['bonTipo'] = $this->passedArgs['BuscarsBonificacion.bonTipo'];
                    $title[] = __('Bonificacion',true).': '.$this->passedArgs['BuscarsBonificacion.bonTipo'];
                    
                }
               
                
                $this->Bonificacion->recursive = 0;
                $this->set('bonificacions', $this->paginate($conditions));
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
				$this->Session->setFlash(__('La bonificación no se ha guardado. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
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
				$this->Session->setFlash(__('TLa bonificación no se ha guardado. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
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
			$this->Session->setFlash(__('La bonificación se ha eliminado.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('La bonificación no se ha eliminado. Por favor intente nuevamente'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}

<?php
App::uses('AppController', 'Controller');
/**
 * Buscars Controller
 *
 * @property Buscar $Buscar
 * @property PaginatorComponent $Paginator
 */
class BuscarController extends AppController {

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

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	/*FUNCION DE BUSQUEDA*/
function buscar(){
$this->autoRender = false;
$search = $this->data[$this->modelClass]['Buscar'];
$cond ="";
$i=0;
foreach($this->{$this->modelClass}->_schema as $field => $value){
//debug($field);
if($i>0){
$cond = $cond. " OR ";
}
$cond = $cond. " ".$this->modelClass.".".$field." LIKE '%".$search."%' ";
$i++;
}
$conditions = array('limit'=>4,	'conditions'=> $cond);
$this->paginate = $conditions;
$this->set(strtolower($this->name), $this->paginate());
$this->render('index');
}
}

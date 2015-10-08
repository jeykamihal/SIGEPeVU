<?php
App::uses('AppModel', 'Model');
/**
 * Bonificacion Model
 *
 * @property Personal $Personal
 */
class Bonificacion extends AppModel {
	
 var $displayField = 'bonTipo';     // este es el campo m�gico, si se lo saco me muestra el id del grupo

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Personal' => array(
			'className' => 'Personal',
			'joinTable' => 'bonificacions_personals',
			'foreignKey' => 'bonificacion_id',
			'associationForeignKey' => 'personal_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}

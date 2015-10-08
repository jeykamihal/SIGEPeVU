<div class="equiposcomisions view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Equipos en Comision'); ?></h1>
			</div>
		</div>
	</div>

	

<div class="related row">
	<div class="col-md-12">
             <?php
             //print_r($equiposcomisions);
             //echo $equiposcomisions ['Personal']['comision_id'];
             //echo $this->Html->link(__('<span class="glyphicon glyphicon-print"></span>'), array('controller' => 'equiposcomisions', 'action' => 'imprimirequiposxcomision', $equiposcomisions ['Personal']['comision_id']), array('escape' => false, target =>'_blank'));
             //no utilizo la variable $equiposcomisions porque contiene un array con cada una de las filas que devuelve la query desde el controlador
             //si quiero utilizar esta variable puedo acceder a una fila en particular con $equiposcomisions[0]
            echo $this->Html->link(__('<span class="glyphicon glyphicon-print"></span>'), array('controller' => 'equiposcomisions', 'action' => 'imprimirequiposxcomision', $idcomision), array('escape' => false, target =>'_blank'));

            ?>
 
	<?php if (!empty($equiposcomisions)): ?>

	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
	<!--	<th><?php echo __('Id'); ?></th>-->
                <th><?php echo __('Equipo'); ?></th>
                <th><?php echo __('Tipo'); ?></th>
		<th><?php echo __('Agente a Cargo'); ?></th>
	
	</tr>
	<thead>
	<tbody>
	<?php foreach ($equiposcomisions as $personal): ?>
		<tr>
		<!--	<td><?php echo $personal['id']; ?></td> -->
			<td><?php echo $personal['E']['equCodigo']; ?></td>
                        <td><?php echo $personal['E']['equTipo']; ?></td>
                        <td><?php echo $personal['Personal']['Apellido_Nombre']; ?></td>			
		<!--	<td><?php echo $personal['Personal']['comision_id']; ?></td> -->
                        
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
 <h2> <center> <?php else: echo __('No tiene equipos asignados en la comision y/o agentes con equipos asignados'); endif; ?> </center> </h2>

				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>



	</div><!-- end col md 12 -->
</div>

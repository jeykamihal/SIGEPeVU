<div class="contratos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Contrato'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Contrato'), array('action' => 'edit', $contrato['Contrato']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar Contrato'), array('action' => 'delete', $contrato['Contrato']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contrato['Contrato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Contratos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Contrato'), array('action' => 'add'), array('escape' => false)); ?> </li>
<!--		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Personal'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>-->
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
	<!--			<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['id']); ?>
			&nbsp;
		</td> 
</tr>-->
<tr>
		<th><?php echo __('Tipo'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['conTipo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Plazo'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['conPlazo']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fecha Inicio'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['conFecIni']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fecha Fin'); ?></th>
		<td>
			<?php echo h($contrato['Contrato']['conFecFin']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Personal'); ?></th>
		<td>
			<?php echo $this->Html->link($contrato['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $contrato['Personal']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>


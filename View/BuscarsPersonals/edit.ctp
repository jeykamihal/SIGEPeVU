<div class="personals form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Personal'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Personal.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Personal.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Personals'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Comisions'), array('controller' => 'comisions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Comision'), array('controller' => 'comisions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Contratos'), array('controller' => 'contratos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Contrato'), array('controller' => 'contratos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Equipos'), array('controller' => 'equipos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Equipo'), array('controller' => 'equipos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Bonificacions'), array('controller' => 'bonificacions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Bonificacion'), array('controller' => 'bonificacions', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Personal', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Apellido_Nombre', array('class' => 'form-control', 'placeholder' => 'Apellido Nombre'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('DNI', array('class' => 'form-control', 'placeholder' => 'DNI'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Legajo', array('class' => 'form-control', 'placeholder' => 'Legajo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Clase', array('class' => 'form-control', 'placeholder' => 'Clase'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Cargo', array('class' => 'form-control', 'placeholder' => 'Cargo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Estado', array('class' => 'form-control', 'placeholder' => 'Estado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Localidad', array('class' => 'form-control', 'placeholder' => 'Localidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Obra', array('class' => 'form-control', 'placeholder' => 'Obra'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('comision_id', array('class' => 'form-control', 'placeholder' => 'Comision Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('Bonificacion', array('class' => 'form-control', 'placeholder' => 'Comision Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

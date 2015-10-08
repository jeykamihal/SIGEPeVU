<div class="bonificacionsPersonals form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Bonificacions Personal'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Bonificacions Personals'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Personals'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Bonificacions'), array('controller' => 'bonificacions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Bonificacion'), array('controller' => 'bonificacions', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('BonificacionsPersonal', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('pbResolucion', array('class' => 'form-control', 'placeholder' => 'PbResolucion'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('pbCantidad', array('class' => 'form-control', 'placeholder' => 'PbCantidad'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('personal_id', array('class' => 'form-control', 'placeholder' => 'Personal Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bonificacion_id', array('class' => 'form-control', 'placeholder' => 'Bonificacion Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

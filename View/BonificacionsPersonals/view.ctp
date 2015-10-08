<div class="bonificacionsPersonals view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Bonificacions Personal'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Bonificacions Personal'), array('action' => 'edit', $bonificacionsPersonal['BonificacionsPersonal']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Bonificacions Personal'), array('action' => 'delete', $bonificacionsPersonal['BonificacionsPersonal']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bonificacionsPersonal['BonificacionsPersonal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Bonificacions Personals'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Bonificacions Personal'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Personals'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Bonificacions'), array('controller' => 'bonificacions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Bonificacion'), array('controller' => 'bonificacions', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($bonificacionsPersonal['BonificacionsPersonal']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('PbResolucion'); ?></th>
		<td>
			<?php echo h($bonificacionsPersonal['BonificacionsPersonal']['pbResolucion']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('PbCantidad'); ?></th>
		<td>
			<?php echo h($bonificacionsPersonal['BonificacionsPersonal']['pbCantidad']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Personal'); ?></th>
		<td>
			<?php echo $this->Html->link($bonificacionsPersonal['Personal']['id'], array('controller' => 'personals', 'action' => 'view', $bonificacionsPersonal['Personal']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bonificacion'); ?></th>
		<td>
			<?php echo $this->Html->link($bonificacionsPersonal['Bonificacion']['id'], array('controller' => 'bonificacions', 'action' => 'view', $bonificacionsPersonal['Bonificacion']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>


	<div class="comisions view">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1><?php echo __('Comision'); ?> <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-print"></span>'), array('controller' => 'comisions', 'action' => 'imprimircomision', $comision['Comision']['id']), array('escape' => false, target =>'_blank')); ?></h1>
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col-md-3">
				<div class="actions">
					<div class="panel panel-default">
						<div class="panel-heading">Acciones</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Comision'), array('action' => 'edit', $comision['Comision']['id']), array('escape' => false)); ?> </li>
								<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar Comision'), array('action' => 'delete', $comision['Comision']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $comision['Comision']['id'])); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Comisiones'), array('action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Comision'), array('action' => 'add'), array('escape' => false)); ?> </li>
								<!--		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Personals'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>
								</ul>-->
						</div><!-- end body -->
					</div><!-- end panel -->
				</div><!-- end actions -->
			</div><!-- end col md 3 -->

			<div class="col-md-9">
				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<tbody>
						<!--				<tr>
						<th><?php echo __('Id'); ?></th>
						<td>
							<?php echo h($comision['Comision']['id']); ?>
							&nbsp;
						</td>
						</tr>-->
						<tr>
							<th><?php echo __('Nombre'); ?></th>
							<td>
								<?php echo h($comision['Comision']['Nombre']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<th><?php echo __('Lugar'); ?></th>
							<td>
								<?php echo h($comision['Comision']['Lugar']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
				</br>
				<!--            TABLA CON PERSONAL EN COMISION-->
				<div class="related row">
					<div class="col-md-12">
						<h3><?php echo __('Personal en la Comisión');  ?> </h3>
                                                
						<?php if (!empty($comision['Personal'])): ?>
						<table cellpadding = "0" cellspacing = "0" class="table table-striped">
							<thead>
								<tr>
									<!--		<th><?php echo __('Id'); ?></th>-->
									<th><?php echo __('Apellido Nombre'); ?></th>
									<!--		<th><?php echo __('DNI'); ?></th>
												<th><?php echo __('Legajo'); ?></th>
												<th><?php echo __('Clase'); ?></th>
												<th><?php echo __('Cargo'); ?></th>
												<th><?php echo __('Estado'); ?></th>
												<th><?php echo __('Localidad'); ?></th>-->
									<th><?php echo __('Obra'); ?></th>
									<!--		<th><?php echo __('Comision Id'); ?></th>-->
									<th class="actions"></th>
								</tr>
							<thead>
							<tbody>
								<?php foreach ($comision['Personal'] as $personal): ?>
								<tr>
									<!--			<td><?php echo $personal['id']; ?></td>-->
									<td><?php echo $personal['Apellido_Nombre']; ?></td>
									<!--			<td><?php echo $personal['DNI']; ?></td>
													<td><?php echo $personal['Legajo']; ?></td>
													<td><?php echo $personal['Clase']; ?></td>
													<td><?php echo $personal['Cargo']; ?></td>
													<td><?php echo $personal['Estado']; ?></td>
													<td><?php echo $personal['Localidad']; ?></td>-->
									<td><?php echo $personal['Obra']; ?></td>
									<!--			<td><?php echo $personal['comision_id']; ?></td>-->
									<td class="actions">
										<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'personals', 'action' => 'view', $personal['id']), array('escape' => false)); ?>
                                                                            
										<!--<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'personals', 'action' => 'edit', $personal['id']), array('escape' => false)); ?>
					<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'personals', 'action' => 'delete', $personal['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $personal['id'])); ?>-->
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php endif; ?>

	<!--                    <div class="actions">
							<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
						</div>-->
					</div><!-- end col md 12 -->
				</div>


			</div><!-- end col md 9 -->

		</div>
	</div>


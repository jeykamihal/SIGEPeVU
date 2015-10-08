<div class="bonificacions view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Bonificacion'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Bonificacion'), array('action' => 'edit', $bonificacion['Bonificacion']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar Bonificacion'), array('action' => 'delete', $bonificacion['Bonificacion']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bonificacion['Bonificacion']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista de Bonificaciones'), array('action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Bonificacion'), array('action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Personal'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
                    <tr>
                        <!--<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($bonificacion['Bonificacion']['id']); ?>
			&nbsp;
		</td> -->
                    </tr>
                    <tr>
                        <th><?php echo __('Tipo Bonificacion'); ?></th>
                        <td>
                            <?php echo h($bonificacion['Bonificacion']['bonTipo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>
            </br>
            </br>

<!--            TABLA DE PERSONAL CON BONIF-->
            <div class="related row">
                <div class="col-md-12">
                    <h3><?php echo __('Personal con el beneficio de la Bonificacion'); ?></h3>
                    <?php if (!empty($bonificacion['Personal'])): ?>
                    <table cellpadding = "0" cellspacing = "0" class="table table-striped">
                        <thead>
                            <tr>
                                <!--	<th><?php echo __('Id'); ?></th> -->
                                <th><?php echo __('Apellido Nombre'); ?></th>
                                <!--	<th><?php echo __('DNI'); ?></th>
                                        <th><?php echo __('Legajo'); ?></th>
                                        <th><?php echo __('Clase'); ?></th>
                                        <th><?php echo __('Cargo'); ?></th>
                                        <th><?php echo __('Estado'); ?></th>
                                        <th><?php echo __('Localidad'); ?></th>
                                        <th><?php echo __('Obra'); ?></th>
                                        <th><?php echo __('Comision Id'); ?></th> -->
                                <th class="actions"></th>
                            </tr>
                        <thead>
                        <tbody>
                            <?php foreach ($bonificacion['Personal'] as $personal): ?>
                            <tr>
                                <!--	<td><?php echo $personal['id']; ?></td> -->
                                <td><?php echo $personal['Apellido_Nombre']; ?></td>
                                <!--	<td><?php echo $personal['DNI']; ?></td>
                                        <td><?php echo $personal['Legajo']; ?></td>
                                        <td><?php echo $personal['Clase']; ?></td>
                                        <td><?php echo $personal['Cargo']; ?></td>
                                        <td><?php echo $personal['Estado']; ?></td>
                                        <td><?php echo $personal['Localidad']; ?></td>
                                        <td><?php echo $personal['Obra']; ?></td>
                                        <td><?php echo $personal['comision_id']; ?></td> -->
                                <td class="actions">
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'personals', 'action' => 'view', $personal['id']), array('escape' => false)); ?>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>

                    <!--	<div class="actions">
                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
                                </div> -->
                </div><!-- end col md 12 -->
            </div>


        </div><!-- end col md 9 -->

    </div>
</div>


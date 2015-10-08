<div class="personals view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Personal'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Personal'), array('action' => 'edit', $personal['Personal']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar Personal'), array('action' => 'delete', $personal['Personal']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $personal['Personal']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Personal'), array('action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Personal'), array('action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Comisions'), array('controller' => 'comisions', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Comision'), array('controller' => 'comisions', 'action' => 'add'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Contratos'), array('controller' => 'contratos', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Contrato'), array('controller' => 'contratos', 'action' => 'add'), array('escape' => false)); ?> </li>
-->                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Equipos'), array('controller' => 'equipos', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Equipo'), array('controller' => 'equipos', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Bonificaciones'), array('controller' => 'bonificacions', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nueva Bonificacion'), array('controller' => 'bonificacions', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
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
			<?php echo h($personal['Personal']['id']); ?>
			&nbsp;
		</td>
                    </tr>-->
                    <tr>
                        <th><?php echo __('Apellido Nombre'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Apellido_Nombre']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('DNI'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['DNI']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Legajo'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Legajo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Clase'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Clase']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Cargo'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Cargo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Estado'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Estado']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Localidad'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Localidad']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Obra'); ?></th>
                        <td>
                            <?php echo h($personal['Personal']['Obra']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Comision'); ?></th>
                        <td>
                            <?php echo $this->Html->link($personal['Comision']['Nombre'], array('controller' => 'comisions', 'action' => 'view', $personal['Comision']['id'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>

<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Contratos del Personal'); ?></h3>
        <?php if (!empty($personal['Contrato'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <!--		<th><?php echo __('Id'); ?></th>-->
                    <th><?php echo __('Tipo'); ?></th>
                    <th><?php echo __('Plazo'); ?></th>
                    <th><?php echo __('Fecha Fin'); ?></th>
                    <!--		<th><?php echo __('Personal Id'); ?></th>-->
                    <th class="actions"></th>
                </tr>
            <thead>
            <tbody>
                <?php foreach ($personal['Contrato'] as $contrato): ?>
                <tr>
                    <!--			<td><?php echo $contrato['id']; ?></td>-->
                    <td><?php echo $contrato['conTipo']; ?></td>
                    <td><?php echo $contrato['conPlazo']; ?></td>
                    <td><?php echo $contrato['conFecFin']; ?></td>
                    <!--			<td><?php echo $contrato['personal_id']; ?></td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'contratos', 'action' => 'view', $contrato['id']), array('escape' => false)); ?>
<!--                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'contratos', 'action' => 'edit', $contrato['id']), array('escape' => false)); ?>-->
<!--                        <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'contratos', 'action' => 'delete', $contrato['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $contrato['id'])); ?>-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: echo __('No tiene contratos cargados'); endif; ?>

<!--        <div class="actions">
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Contrato'), array('controller' => 'contratos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>-->
    </div><!-- end col md 12 -->
</div>
<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Equipos a Cargo'); ?></h3>
        <?php if (!empty($personal['Equipo'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <!--		<th><?php echo __('Id'); ?></th>-->
                    <th><?php echo __('Codigo'); ?></th>
<!--                    <th><?php echo __('Patente'); ?></th>-->
                    <th><?php echo __('Tipo'); ?></th>
                    <th><?php echo __('Estado'); ?></th>
<!--                    <th><?php echo __('Fecha Revision Tecnica'); ?></th>-->
                    <!--		<th><?php echo __('Personal Id'); ?></th>-->
                    <th class="actions"></th>
                </tr>
            <thead>
            <tbody>
                <?php foreach ($personal['Equipo'] as $equipo): ?>
                <tr>
                    <!--			<td><?php echo $equipo['id']; ?></td>-->
                    <td><?php echo $equipo['equCodigo']; ?></td>
<!--                    <td><?php echo $equipo['equPatente']; ?></td>-->
                    <td><?php echo $equipo['equTipo']; ?></td>
                    <td><?php echo $equipo['equEstado']; ?></td>
<!--                    <td><?php echo $equipo['equFecRevTecnica']; ?></td>-->
                    <!--			<td><?php echo $equipo['personal_id']; ?></td>-->
                    <td class="actions">
                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'equipos', 'action' => 'view', $equipo['id']), array('escape' => false)); ?>
<!--                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'equipos', 'action' => 'edit', $equipo['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'equipos', 'action' => 'delete', $equipo['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $equipo['id'])); ?>-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: echo __('No tiene equipos a cargo'); endif; ?>

<!--        <div class="actions">
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Equipo'), array('controller' => 'equipos', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>-->
    </div><!-- end col md 12 -->
</div>
<div class="related row">
    <div class="col-md-12">
        <h3><?php echo __('Bonificaciones que posee'); ?></h3>
        <?php if (!empty($personal['Bonificacion'])): ?>
        <table cellpadding = "0" cellspacing = "0" class="table table-striped">
            <thead>
                <tr>
                    <!--		<th><?php echo __('Id'); ?></th>-->
                    <th><?php echo __('Tipo'); ?></th>
                    <th class="actions"></th>
                </tr>
            <thead>
            <tbody>
                <?php foreach ($personal['Bonificacion'] as $bonificacion): ?>
                <tr>
                    <!--			<td><?php echo $bonificacion['id']; ?></td>-->
                    <td><?php echo $bonificacion['bonTipo']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'bonificacions', 'action' => 'view', $bonificacion['id']), array('escape' => false)); ?>
<!--                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'bonificacions', 'action' => 'edit', $bonificacion['id']), array('escape' => false)); ?>
                        <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'bonificacions', 'action' => 'delete', $bonificacion['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bonificacion['id'])); ?>-->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: echo __('No tiene bonificaciones asignadas'); endif; ?>

<!--        <div class="actions">
            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nueva Bonificacion'), array('controller' => 'bonificacions', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
        </div>-->
    </div><!-- end col md 12 -->
</div>

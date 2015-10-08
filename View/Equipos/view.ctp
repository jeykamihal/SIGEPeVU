<div class="equipos view">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Equipo'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar Equipo'), array('action' => 'edit', $equipo['Equipo']['id']), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar Equipo'), array('action' => 'delete', $equipo['Equipo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $equipo['Equipo']['id'])); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Equipos'), array('action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Equipo'), array('action' => 'add'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Lista Personal'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Nuevo Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <tbody>
<!--                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <td>
                            <?php echo h($equipo['Equipo']['id']); ?>
                            &nbsp;
                        </td>
                    </tr>-->
                    <tr>
                        <th><?php echo __('Codigo'); ?></th>
                        <td>
                            <?php echo h($equipo['Equipo']['equCodigo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Patente'); ?></th>
                        <td>
                            <?php echo h($equipo['Equipo']['equPatente']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Tipo de Equipo'); ?></th>
                        <td>
                            <?php echo h($equipo['Equipo']['equTipo']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Estado del Equipo'); ?></th>
                        <td>
                            <?php echo h($equipo['Equipo']['equEstado']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Fecha Revision Tecnica'); ?></th>
                        <td>
                            <?php echo h($equipo['Equipo']['equFecRevTecnica']); ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo __('Personal a cargo del equipo'); ?></th>
                        <td>
                            <?php echo $this->Html->link($equipo['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $equipo['Personal']['id'])); ?>
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

        </div><!-- end col md 9 -->

    </div>
</div>


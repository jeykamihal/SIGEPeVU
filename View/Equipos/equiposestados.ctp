<div class="equipos index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Equipos'); ?></h1>
            </div>
        </div><!-- end col md 12 -->
    </div><!-- end row -->



    <div class="row">

        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Acciones</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Equipo'), array('action' => 'add'), array('escape' => false)); ?></li>
                     
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
<!--                    COLUMNAS NOMBRES
                        <th><?php echo 'ID'; ?></th>-->
                        <th><?php echo 'Código/Legajo'; ?></th>
                        <th><?php echo 'Tipo'; ?></th>
                        <th><?php echo 'Estado'; ?></th>
                        <th><?php echo 'Agente a cargo'; ?></th>
                    <th class="actions"></th>
                    </tr>
                </thead>

                <tbody>
                    <!--ESTADO = FUNCIONA-->
                    <?php foreach ($equiposestados as $equipo): ?>
                    <tr>
                       <?php if($equipo['Equipo']['equEstado'] == 'FUNCIONA'){ ?>
<!--                        <td><?php echo h($equipo['Equipo']['id']); ?>&nbsp;</td>-->
                             <td><?php echo h($equipo['Equipo']['equCodigo']); ?>&nbsp;</td>
                            <td><?php echo h($equipo['Equipo']['equTipo']); ?>&nbsp;</td>
                             <td><?php echo h($equipo['Equipo']['equEstado']); ?>&nbsp;</td>
                             <td>
                            <?php echo $this->Html->link($equipo['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $equipo['Personal']['id'])); ?>
                             </td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $equipo['Equipo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $equipo['Equipo']['id'])); ?>
                        </td>
                    </tr>

                    <?php }
                    endforeach; ?>

                    <!--ESTADO = NO FUNCIONA-->
                     <?php foreach ($equiposestados as $equipo): ?>
                    <tr>
                       <?php if($equipo['Equipo']['equEstado'] == 'NO FUNCIONA'){ ?>
<!--                        <td><?php echo h($equipo['Equipo']['id']); ?>&nbsp;</td>-->
                             <td><?php echo h($equipo['Equipo']['equCodigo']); ?>&nbsp;</td>
                            <td><?php echo h($equipo['Equipo']['equTipo']); ?>&nbsp;</td>
                             <td><?php echo h($equipo['Equipo']['equEstado']); ?>&nbsp;</td>
                             <td>
                            <?php echo $this->Html->link($equipo['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $equipo['Personal']['id'])); ?>
                             </td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $equipo['Equipo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $equipo['Equipo']['id'])); ?>
                        </td>
                    </tr>
                    <?php }
                    endforeach; ?>


                    <!--ESTADO = EN REPARACION-->
                     <?php foreach ($equiposestados as $equipo): ?>
                    <tr>
                       <?php if($equipo['Equipo']['equEstado'] == 'EN REPARACION'){ ?>
<!--                        <td><?php echo h($equipo['Equipo']['id']); ?>&nbsp;</td>-->
                             <td><?php echo h($equipo['Equipo']['equCodigo']); ?>&nbsp;</td>
                            <td><?php echo h($equipo['Equipo']['equTipo']); ?>&nbsp;</td>
                             <td><?php echo h($equipo['Equipo']['equEstado']); ?>&nbsp;</td>
                             <td>
                            <?php echo $this->Html->link($equipo['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $equipo['Personal']['id'])); ?>
                             </td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $equipo['Equipo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $equipo['Equipo']['id'])); ?>
                        </td>
                    </tr>

                    <?php }
                    endforeach; ?>

                     <!--ESTADO = NO DEFINIDO-->
                     <?php foreach ($equiposestados as $equipo): ?>
                    <tr>
                       <?php if($equipo['Equipo']['equEstado'] == 'NO DEFINIDO'){ ?>
<!--                        <td><?php echo h($equipo['Equipo']['id']); ?>&nbsp;</td>-->
                             <td><?php echo h($equipo['Equipo']['equCodigo']); ?>&nbsp;</td>
                            <td><?php echo h($equipo['Equipo']['equTipo']); ?>&nbsp;</td>
                             <td><?php echo h($equipo['Equipo']['equEstado']); ?>&nbsp;</td>
                             <td>
                            <?php echo $this->Html->link($equipo['Personal']['Apellido_Nombre'], array('controller' => 'personals', 'action' => 'view', $equipo['Personal']['id'])); ?>
                             </td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $equipo['Equipo']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $equipo['Equipo']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $equipo['Equipo']['id'])); ?>
                        </td>
                    </tr>
                    <?php } //fin if
                    endforeach; ?>
                   
                </tbody>
            </table>

            <p>
                <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
            </p>

            <?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
            <ul class="pagination pagination-sm">
                <?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
            </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->
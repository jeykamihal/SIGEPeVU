<div class="users index">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Usuarios'); ?></h1>
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
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Usuario'), array('action' => 'add'), array('escape' => false)); ?></li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Grupos'), array('controller' => 'groups', 'action' => 'index'), array('escape' => false)); ?> </li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Grupo'), array('controller' => 'groups', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
                    </div><!-- end body -->
                </div><!-- end panel -->
            </div><!-- end actions -->
        </div><!-- end col md 3 -->

        <div class="col-md-9">
            <table cellpadding="0" cellspacing="0" class="table table-striped">
                <thead>
                    <tr>
<!--                        <th><?php echo $this->Paginator->sort('id'); ?></th>-->
                        <th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
<!--                        <th><?php echo $this->Paginator->sort('password', 'Contraseña'); ?></th>-->
                        <th><?php echo $this->Paginator->sort('created', 'Creado'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified', 'Modificado'); ?></th>
                        <th><?php echo $this->Paginator->sort('group_id', 'Grupo'); ?></th>
                        <th class="actions"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
<!--                        <td><?php echo h($user['User']['id']); ?>&nbsp;</td>-->
                        <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
<!--                        <td><?php echo h($user['User']['password']); ?>&nbsp;</td>-->
                        <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                        <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
                        <td>
                            <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
                        </td>
                        <td class="actions">
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
                            <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
                            <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
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
					echo $this->Paginator->prev('&larr; Previo', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Siguiente &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
            </ul>
            <?php } ?>

        </div> <!-- end col md 9 -->
    </div><!-- end row -->


</div><!-- end containing of content -->
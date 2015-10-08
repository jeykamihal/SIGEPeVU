<div class="comisions form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Nueva Comisión'); ?></h1>
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

                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Comisiones'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Personal'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Comision', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('Nombre', array('class' => 'form-control', 'label' => 'Nombre de Comisión', 'placeholder' => 'Nombre'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('Lugar', array('class' => 'form-control', 'label' => 'Lugar de la Comisión', 'placeholder' => 'Lugar'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Guardar'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>

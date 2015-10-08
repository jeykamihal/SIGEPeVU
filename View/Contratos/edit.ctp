<div class="contratos form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Editar Contrato'); ?></h1>
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

                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar'), array('action' => 'delete', $this->Form->value('Contrato.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Contrato.id'))); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Contratos'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Personal'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Contrato', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('conTipo', array('class' => 'form-control', 'label' => 'Tipo Contrato', 'placeholder' => 'Servicio/Directa/Pasante'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('conPlazo', array('class' => 'form-control', 'label' => 'Plazo del Contrato', 'placeholder' => 'Plazo'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('conFecIni', array('class' => 'form-control', 'label' => 'Fecha Inicio', 'placeholder' => 'ConFecIni'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('conFecFin', array('class' => 'form-control', 'label' => 'Fecha Fin', 'placeholder' => 'ConFecFin'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('personal_id', array('class' => 'form-control', 'label' => 'Personal Contratado', 'placeholder' => 'Personal Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Guardar'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>

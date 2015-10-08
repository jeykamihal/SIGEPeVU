<div class="equipos form">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo __('Editar Equipo'); ?></h1>
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

                            <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Borrar'), array('action' => 'delete', $this->Form->value('Equipo.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Equipo.id'))); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Equipos'), array('action' => 'index'), array('escape' => false)); ?></li>
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Lista Personal'), array('controller' => 'personals', 'action' => 'index'), array('escape' => false)); ?> </li>
<!--                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Personal'), array('controller' => 'personals', 'action' => 'add'), array('escape' => false)); ?> </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- end col md 3 -->
        <div class="col-md-9">
            <?php echo $this->Form->create('Equipo', array('role' => 'form')); ?>

            <div class="form-group">
                <?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('equCodigo', array('class' => 'form-control', 'label' => 'Codigo de Equipo', 'placeholder' => 'EquCodigo'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('equPatente', array('class' => 'form-control', 'label' => 'Patente del Equipo', 'placeholder' => 'EquPatente'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('equTipo', array('class' => 'form-control', 'label' => 'Tipo de Equipo', 'placeholder' => 'EquTipo'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('equEstado', array('class' => 'form-control', 'label' => 'Estado del Equipo', 'placeholder' =>  'FUNCIONA/NO FUNCIONA/EN REPARACION/ETC'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('equFecRevTecnica', array('class' => 'form-control',  'label' => 'Fecha ultima Revision Tecnica', 'placeholder' => 'Fecha'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('personal_id', array('class' => 'form-control', 'label' => 'Personal a cargo Equipo', 'placeholder' => 'Personal Id'));?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->submit(__('Guardar'), array('class' => 'btn btn-default')); ?>
            </div>

            <?php echo $this->Form->end() ?>

        </div><!-- end col md 12 -->
    </div><!-- end row -->
</div>

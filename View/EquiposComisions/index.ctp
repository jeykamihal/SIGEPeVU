<?php
echo $this->Javascript->link('jquery-1.8.3.min.js');
echo $this->Javascript->link('select2.min.js');
echo $this->Javascript->link('select2_locale_es.js');
echo $this->Html->css('select2/select2.css', 'stylesheet', array("media"=>"all" ));
echo $this->Html->css('botones_bonitos');
?>

<?php $this->Paginator->options(array('url' => $this->passedArgs)); ?>
<div class="EquiposComisions index">
        <ul id="navexp">
 
        </ul>
        <br/>
        <div class="EquiposComision buscar">
            <?php echo $this->Form->create('EquiposComisions', array('action' => 'eqcomi' , 'class'=>"form-signin")); ?>
            <fieldset>
                <legend><?php echo __('Ingrese la comision'); ?></legend>
                <div class="form-group">
                <?php echo $this->Form->input('comision_id', array('class' => 'form-control', 'placeholder' => 'Comision Id'));?>
            </div>
               
                <?php echo $this->Form->submit('Buscar',array('class'=>"btn btn-primary btn-lg"));?>
                
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
      
 	
</div>

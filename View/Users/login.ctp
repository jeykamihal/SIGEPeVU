<?php
echo $this->Html->image('sigepevu400.png', array('alt' => 'ImagenDVP'));
?>
<div class="users form">
    <div class="container center_div">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-login" >
                <div class="panel-heading">
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $this->Form->create('User'); ?>
                    <?php echo __('Por favor ingrese su Usuario y Contraseña'); ?> 
                </div>
                <div style="padding-top:20px" class="panel-body" >
                <?php echo $this->Form->input('username',array('label'=>'Usuario', placeholder => 'Ingrese el usuario', 'class'=>"form-control"));
                echo $this->Form->input('password',array('label'=>'Contraseña', placeholder => 'Ingrese la contraseña','class'=>"form-control"));
                ?>
</div>
                 <div style="padding-top:20px" class="panel-body" >
                      <?php echo $this->Form->submit('Login',array('class'=>"btn btn-login btn-md"));
                 echo $this->Form->end(); ?>
            </div>
            </div>
        </div>
    </div>
</div>


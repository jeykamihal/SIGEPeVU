<?php
/*
  default.thtml design for CakePHP (http://www.cakephp.org)
  ported from http://contenteddesigns.com/ (open source template)
  ported by Shunro Dozono (dozono :@nospam@: gmail.com)
  2006/7/6
 */
 

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Direcci&oacute;n de Vialidad Urbana - Personal y Equipos <?php echo $title_for_layout ?></title>
        <?php //echo $this->Html->charset('UTF-8')?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<?php
			echo $this->Html->meta('icon');

			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>

		<!-- Latest compiled and minified CSS -->
		<!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"--> 
		<!--link rel="stylesheet" href="//Jess/SiGeViU/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css"-->
		<!--link rel="stylesheet" href="/sigepevu/webroot/css/otros/css-kiko/contented4.css"-->
		<link rel="stylesheet" href="/sigepevu/webroot/css/bootstrap.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!--script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"--></script>
		<script src="/sigepevu/webroot/js/js-boots/bootstrap.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
		  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">
			body{ padding: 70px 0px; }
		</style>
    </head>
    <body>
		
        <div id="header">
			
            <div  id="title">Direcci&oacute;n de Vialidad Urbana</div>

            <div id="slogan">Personal y Equipos</div>

        </div> <!-- end header -->

        <div id="sidecontent">
            <ul id="nav">
                <?php
//$var = $this->Session->read('Auth.User.usuario');
//echo '<h2>Variable Auth'.$var.'</h2>';
//print_r($this->Session->read());
                if (!$this->Session->read('Auth.User.usuario')) {

                    echo $this->Form->create('Usuario', array('action' => 'ingreso'));
                ?>
                    <h2>Ingresar al Sistema</h2>


                    <li> <?php echo $this->Form->input('usuario', array('label' => 'Usuario', 'size' => 12)); ?> </li>
                    <br/>
                    <br/>
                    <li> <?php echo $this->Form->input('password', array('label' => 'Contraseña', 'size' => 9)); ?> </li> </br>
                    <li> <?php echo $this->Form->end(' Entrar '); ?> </li>
                <?php
                } else {
                ?>
                    <h2>Usuario en el Sistema</h2>
                    <li>
                    <?php
                    $nombre = $this->Session->read('Auth.User.nombre');
                    $iduser = $this->Session->read('Auth.User.id');
                    echo $this->Html->link($nombre, array('controller' => 'usuarios', 'action' => 'view', $iduser));
                    echo $this->Html->link('Salir', array('controller' => 'usuarios', 'action' => 'logout'));
                    ?>
                </li>
                <?php
                }
                ?>
            </ul>

            <h2>Navegaci&oacute;n</h2>
            <ul id="nav">
                <li><a class="selected" ><?php echo $this->Html->link('Inicio', '/'); ?> </a></li>
                <?php
                //if ($this->Session->read('Auth.User.group_id')==1)
                //{
                ?>
                <li><a class="selected"> <?php echo $this->Html->link('Personal', '/Personals/index'); ?> </a></li>
                <?php
                //}
                ?>
                <?php
                //if ($this->Session->read('Auth.User.group_id')<3)
                //{
                ?>
                <li><a class="selected"> <?php echo $this->Html->link('Equipos', '/Equipos/index'); ?></a></li>
                <?php
                // }
                ?>
                <li><a class="selected"> <?php echo $this->Html->link('Bonificaciones', '/Bonificacions/index'); ?></a></li>
				 <li><a class="selected"> <?php echo $this->Html->link('Buscar', '/Buscars/index'); ?></a></li>
				 
            </ul>

        </div> <!-- end sidecontent -->
<div> <? php echo $imagen </div>
        <div id="maincontent">
            <?php if ($this->Session->check('Message.flash'))
                    $this->Session->flash(); ?>

            <?php //echo $content_for_layout ?>


            </div> <!-- end maincontent -->

            <div id="footer">

                <div id="copyright">
                    Copyright &copy; 2015 Direcci&oacute;n de Vialidad Urbana  - DVP Chaco|
                    Dise&ntilde;ado por <a href="#"></a>
                </div>

                <div id="footercontact">
                    <a href="/seguimiento/contactos">Contactos</a>
                </div>

            </div>
        <?php echo $this->element('sql_dump'); ?>
    </body>
</html>



<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/sigepevu/">SiGePEVU β</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
               <!-- <li class="active"><a href="/sigepevu/">Inicio</a></li>  -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Personal<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sigepevu/personals"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Ver Personal</a></li>
                        <li><a href="/sigepevu/personals/add"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Personal</a></li>
                        <li><a href="/sigepevu/contratos"><span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;Ver Personal Contratado</a></li>
                        <li><a href="/sigepevu/contratos/add"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Contrato</a></li>
                        <li><a href="/sigepevu/contratos/vencidos"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;&nbsp;Contratos a Vencer</a></li>
                        <li><a href="/sigepevu/buscarspersonals"><span class= "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Buscar un Personal</a></li>
                    </ul>
                </li>
                <!-- EQUIPOS -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Equipos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sigepevu/equipos"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Ver Equipos</a></li>
                        <li><a href="/sigepevu/equipos/add"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Equipo</a></li>
                        <li><a href="/sigepevu/equiposcomisions"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;Equipo en Comision</a></li>
                        <li><a href="/sigepevu/equipos/equiposestados"><span class="glyphicon glyphicon-th"></span>&nbsp;&nbsp;Estados de Equipo</a></li>
                        <li><a href="/sigepevu/buscars"><span class= "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Buscar un Equipos</a></li>
                    </ul>
                </li>
                <!-- COMISIONES -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Comisiones<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sigepevu/comisions"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Ver Comisiones</a></li>
                        <li><a href="/sigepevu/comisions/add"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Comisión</a></li>
                    </ul>
                </li>
                <!-- BONIFICACION -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bonificaciones<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sigepevu/bonificacions"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Ver Bonificaciones</a></li>
                        <li><a href="/sigepevu/bonificacions/add"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Bonificación</a></li>
                        <li><a href="/sigepevu/buscarsbonificacions"><span class= "glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Buscar una Bonificaciones</a></li>
                    </ul>
                </li>
                <!-- BUSCAR -->
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Buscar<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sigepevu/buscars"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Equipos</a></li>
                        <li><a href="/sigepevu/buscarspersonals"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Personal</a></li>
                        <li><a href="/sigepevu/buscarsbonificacions"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Bonificaciones</a></li>
                    </ul>
                </li> -->
              <!-- ADMINISTRACION DE USUARIOS Y PERMISOS -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administracion<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/sigepevu/users"><span class= "glyphicon glyphicon-search"></span>&nbsp;&nbsp;Ver Usuarios</a></li>
                        <li><a href="/sigepevu/users/add"><span class= "glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Usuario</a></li>
                        <li><a href="/sigepevu/groups/add"><span class= "glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nuevo Grupo</a></li>
                        <li><a href="/sigepevu/acl_manager/acl"><span class= "glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Permisos</a></li>
                    </ul>
                </li>

                
            </ul>
                        <ul class="nav navbar-nav navbar-right">
<?php
 if ($this->Session->read('Auth.User')){
     $nombre=$this->Session->read('Auth.User.username');
 ?>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo  $nombre; ?></a></li>
                        <li><a href="/sigepevu/users/logout"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
<?php
}
else{
?>
                            <li><a href="/sigepevu/users/login"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
<?php
}
?>
                        </ul>
                    </div>


</nav>

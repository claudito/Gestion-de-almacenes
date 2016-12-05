<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo PATH; ?>">
      
      Inicio
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transacciones<span class="caret"></span></a>
          <ul class="dropdown-menu">
           <li class=""><a href="<?php echo PATH; ?>pages/validar-carga">Validar Carga</a></li>
           <li class="divider"></li>
          <li><a href="<?php echo PATH ?>pages/carga-inicial">Carga Inicial / Registro de Articulos</a></li>
            <li class="divider"></li>
          <li class=""><a href="<?php echo PATH; ?>pages/salidas-ingresos">Salidas / Ingresos</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo PATH; ?>actualizar-articulos/">Actualizar Articulos</a></li>
        
         
          
          
          </ul>
        </li>
       
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultas <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li class=""><a href="<?php echo PATH; ?>pages/consulta-stock">Stock</a></li>
          <li class="divider"></li>
          <li class=""><a href="<?php echo PATH; ?>pages/ingresos">Ingresos</a></li>
          <li class="divider"></li>
          <li class=""><a href="<?php echo PATH; ?>pages/salidas">Salidas</a></li>
          </ul>
        </li>


      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tabla de Ayuda<span class="caret"></span></a>
      <ul class="dropdown-menu">
      <li><a href="<?php echo PATH; ?>pages/usuario">Usuarios</a></li>
      <li class="divider"></li>
      <li><a href="<?php echo PATH ?>pages/opciones">Opciones del Sistema</a></li>
      <li class="divider"></li>
      <li><a href="<?php echo PATH ?>pages/documentos">Documentos</a></li>
      <li class="divider"></li>
      <li><a href="<?php echo PATH ?>pages/correlativos">Correlativos</a></li>
      <li class="divider"></li>
      <li><a href="<?php echo PATH; ?>pages/guias-salida">Guías de Salida</a></li>
      
      </ul>

      </li>



      </ul>
     <!-- 
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Guia" required="">
        </div>
        <button type="submit" class="btn btn-default">Consultar</button>
      </form>
      -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS]; ?> <i class="glyphicon glyphicon-user text-success"></i></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH; ?>procesos/Logout">Salir</a></li>
            
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
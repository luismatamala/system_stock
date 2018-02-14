      <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('home'); ?>">SCI</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?php echo base_url('venta'); ?>">Venta</a></li>
              <?php if($this->session->tipo_usuario == 'admin')
              {
              ?>
              <li><a href="<?php echo base_url('inventario'); ?>">Inventario</a></li>
              <li><a href="<?php echo base_url('categoria'); ?>">Categorias</a></li>
              <li><a href="<?php echo base_url('informe'); ?>">Informes</a></li>
              <li><a href="<?php echo base_url('usuario'); ?>">Usuarios</a></li>
              <?php
              } ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url('login'); ?>">Salir</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
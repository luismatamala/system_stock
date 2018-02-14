

    <div class="container">
      <div class="row">
          <div class='col-md-3'></div>
          <div class="col-md-6">
              <div class="login-box well">
                  <?php

                  if(isset($_GET['error']))
                  {
                    $error = $_GET['error'];
                  }else {
                    $error = 0;
                  }

                  if($error)
                  {?>
                    <div class="alert alert-warning" role="alert">
                      <a href="#" class="alert-link">Error de inicio de sesion</a>
                    </div>
                  <?php
                  } ?>
                  <form action="login/loginAction" method="post">
                      <legend>Login</legend>
                      <div class="form-group">
                          <label for="username-email">Nombre de usuario</label>
                          <input name="usuario" id="username-email" placeholder="Usuario" type="text" class="form-control" />
                      </div>
                      <div class="form-group">
                          <label for="password">Contraseña</label>
                          <input name="password" id="password" placeholder="Contraseña" type="password" class="form-control" />
                      </div>

                      <div class="form-group">
                          <input type="submit" class="btn btn-default btn-login-submit btn-block m-t-md" value="Ingresar" />
                      </div>
                  </form>
              </div>
          </div>
          <div class='col-md-3'></div>
      </div>
    </div>



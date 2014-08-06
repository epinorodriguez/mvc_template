<div class="container">    
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Iniciar Sesion</h3>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" id="form_iniciar_sesion" >

          

          <div class="form-group" id="rut_group">
            <label for="rut" class="col-sm-2 control-label">RUT</label>
            <div class="col-sm-9" id="rut_div">
              <input type="text" class="form-control" name="rut" placeholder="Escribe aquí tu RUT" required>
            </div>
          </div>

          <div class="form-group" id="password_group">
            <label for="password" class="col-sm-2 control-label">Contraseña</label>
            <div class="col-sm-9" id="password_div" >
             <input type="password" class="form-control" name="password" placeholder="Escribe aquí tu contraseña">            
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
             <input type="hidden" id="token_sesion" name="token" value="<?php echo (isset($_SESSION['token'])) ? $_SESSION['token'] : '';?>" />

             <button type="submit" class="btn btn-primary" id="btn_iniciar">Iniciar</button>
            </div>
          </div>

          
          
          </form>
        </div>
    </div>
    </div>
  <div class="col-md-2"></div>
  </div>
</div>
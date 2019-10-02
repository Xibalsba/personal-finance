<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">¡Crea una cuenta gratis!</h1>
            </div>
            <form class="user" method="post" id="formRegistro" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nombre de usuario</label>
                <input type="text" class="form-control form-control-user" id="nombreUsuarioRegistro" name="nombreUsuarioRegistro" aria-describedby="nombreUsuarioRegistro" placeholder="Nombre de usuario">
              </div>
              <div class="form-group">
                <label>Correo electrónico</label>
                <input type="email" class="form-control form-control-user" id="correoUsuarioRegistro" name="correoUsuarioRegistro" aria-describedby="correoUsuarioRegistro" placeholder="Correo electrónico">
              </div>
              <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control form-control-user" id="contraseniaUsuarioRegistro" name="contraseniaUsuarioRegistro" placeholder="Contraseña">
              </div>
              <label>Foto de perfil</label>
              <input type="file" class="dropify" id="imagenUsuarioRegistro" name="imagenUsuarioRegistro" data-max-file-size-preview="3M" data-allowed-file-extensions = "jpg png" data-height="300"  data-max-height="1000" data-min-width="100" data-max-width ="1500"/>
              <button type="submit" class="btn btn-primary btn-user btn-block mt-4">Ingresar</button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="recuperar-contrasenia">¿Olvidaste la contraseña?</a>
            </div>
            <div class="text-center">
              <a class="small" href="registro">¡Crea una cuenta!</a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

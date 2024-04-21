<div class="container">
  <h2>Login / Registro</h2>

  <div class="row align-items-start">
    <div class="col">
      <h3 class="mb-3">Nuevo usuario</h3>
      <!-- formulario registro nuevo usuario -->
      <form method="post" action="/signup">
        <p class="mb-3">
          <!-- elemento label con el id del input en el atributofor -->
          <label for="signup-email">
            <span class="form-label">Email:</span>
            <span class="input-group">
              <!-- input de tipo email, cambiar a text si no se va a registrar sólo con email. Notar que lleva atributo required -->
              <input type="email" class="form-control" placeholder="Email" id="signup-email" required>
            </span>
          </label>
        </p>

        <p class="mb-3">
          <!-- campo password -->
          <label for="signup-password1">
            <span class="form-label">Contraseña:</span>
            <span class="input-group">
              <input type="password" class="form-control" id="signup-password1" required>
            </span>
          </label>
        </p>

        <p class="mb-3">
          <label for="signup-password2">
            <span class="form-label">Repetir contraseña:</span>
            <span class="input-group">
              <input type="password" class="form-control" id="signup-password2" required>
            </span>
          </label>
        </p>

        <input type="button" class="btn btn-primary" value="Registrarse">
      </form>
    </div>

    <div class="col">
      <h3 class="mb-3">Acceso usuario registrado</h3>
      <!-- formulario login -->
      <form method="post" action="/login">
        <p class="mb-3">
          <label for="login-email">
            <span class="form-label">Email:</span>
            <span class="input-group">
              <input type="text" class="form-control" placeholder="Email" id="login-email" required>
            </span>
          </label>
        </p>

        <p class="mb-3">
          <label for="login-password">
            <span class="form-label">Contraseña:</span>
            <span class="input-group">
              <input type="password" class="form-control" id="login-password" required>
            </span>
          </label>
        </p>

        <input type="button" class="btn btn-primary" value="Acceder">
      </form>

    </div>
  </div>



</div>

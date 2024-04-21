<div class="container">
  <h2>Login / Registro</h2>

  <?php
  if (isset($_SESSION['loginMessage']) and $_SESSION['loginMessage'] === 'signupSuccess') {
    echo '
      <div class="alert alert-success mb-4">
        Registro realizado correctamente, ya puede acceder a su espacio de usuario.
      </div>
    ';
  }
  if (isset($_SESSION['loginMessage']) and $_SESSION['loginMessage'] === 'signupError') {
    echo '
      <div class="alert alert-danger mb-4">
        El registro no pudo realizarse, datos incorrectos.
      </div>
    ';
  }
  if (isset($_SESSION['loginMessage']) and $_SESSION['loginMessage'] === 'loginError') {
    echo '
      <div class="alert alert-danger mb-4">
        Datos de usuario incorrectos.
      </div>
    ';
  }
  $_SESSION['loginMessage'] = null;
  ?>

  <div class="row align-items-start">
    <div class="col">
      <h3 class="mb-3">Nuevo usuario</h3>
      <!-- formulario registro nuevo usuario -->
      <form method="post" action="/registro">
        <p class="mb-3">
          <!-- elemento label con el id del input en el atributofor -->
          <label for="signup-email">
            <span class="form-label">Email:</span>
            <span class="input-group">
              <!-- input de tipo email, cambiar a text si no se va a registrar sólo con email. Notar que lleva atributo required -->
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                id="signup-email"
                name="useremail"
                required
              >
            </span>
          </label>
        </p>

        <p class="mb-3">
          <!-- campo password -->
          <label for="signup-password1">
            <span class="form-label">Contraseña:</span>
            <span class="input-group">
              <input
                type="password"
                class="form-control"
                id="signup-password1"
                name="userpass1"
                required
              >
            </span>
          </label>
        </p>

        <p class="mb-3">
          <label for="signup-password2">
            <span class="form-label">Repetir contraseña:</span>
            <span class="input-group">
              <input
                type="password"
                class="form-control"
                id="signup-password2"
                name="userpass2"
                required
              >
            </span>
          </label>
        </p>

        <input type="submit" class="btn btn-primary" value="Registrarse">
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
              <input type="text" class="form-control" placeholder="Email" id="login-email" name="login-email" required>
            </span>
          </label>
        </p>

        <p class="mb-3">
          <label for="login-password">
            <span class="form-label">Contraseña:</span>
            <span class="input-group">
              <input type="password" class="form-control" id="login-password" name="login-password" required>
            </span>
          </label>
        </p>

        <input type="submit" class="btn btn-primary" value="Acceder">
      </form>

    </div>
  </div>



</div>

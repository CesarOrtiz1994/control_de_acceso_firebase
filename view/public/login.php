<div class="container d-grid he-100">
    <div class="row cartd align-self-center px-5 align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-xl-6 col-lg-5">

        </div>
        <div class="col cartdd p-5">
            <div class="text-end">
                <img src="<?php echo $Base_URL ?>static/img/logo-ch.png" width="50" alt="logo">
            </div>
            <h2 class="fw-bold text-center py-5">Bienvenido</h2>

            <!--login form--> 
            <form class="needs-validation" novalidate>
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group">
                        <span class="input-group-text" id="email-i"><i class="fa-solid fa-envelope icon"></i></span>
                        <input type="text" class="form-control" placeholder="Correo electrónico" name="email_l" id="email_l" required>
                        <div class="invalid-feedback" id="alert_correo">
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text" id="password-i"><i class="fa-solid fa-key icon"></i></span>
                        <input type="password" class="form-control" name="password_l" id="password_l" placeholder="Contraseña" required>
                        <div class="invalid-feedback">
                            La contraseña es requerida
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-grid">
                    <button type="button" onclick="logearse()" class="btn btn-primary"> Iniciar Sesión </button>
                </div>
            </form>
            <br>
            <div id="alerta_mensaje" class="mensaje"></div>
        </div>
    </div>
</div>
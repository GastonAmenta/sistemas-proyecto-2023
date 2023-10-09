<div class="form_container">
    <form class="form_container" action="../controllers/login.php" method="POST">
        <div class="div-login_inputs">
            <input type="text" name="dni" placeholder="Ingrese su DNI"></input> 
        </div>        
       <div class="div-login_inputs">
            <input type="email" name="email" placeholder="Ingrese su email"></input> 
        </div>
        <div class="div-login_inputs">
            <input type="password" name="clave" placeholder="Ingrese su contraseña"></input> 
        </div>
        <div class="div-login_inputs">
            <input type="submit" class="btn-login_form"  value="Iniciar Sesion" ></input> 
        </div>
    </form>
</div>

<div class="div-href_register">
    <label>¿No tenes cuenta?</label>
    <button id="btn-register_href"><a href="register.php">Registrate</a></button>
</div>

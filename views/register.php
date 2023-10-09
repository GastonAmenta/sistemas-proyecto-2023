<div class="container">
    <div class="form_container">
        <form action="../controllers/register.php" method="POST" id="form_register"> 

            <div class="input_reg_form"> <input type="text" name="name" placeholder="Nombre" required> </div>
            <div class="input_reg_form"> <input type="text" name="surname" placeholder="Apellido" required> </div>
            <div class="input_reg_form"> <input type="text" name="username" placeholder="Nombre de usuario" required> </div>
            <div class="input_reg_form"> <input type="email" name="email" placeholder="Email" required> </div>
            <div class="input_reg_form"> <input type="password" name="password" placeholder="Contraseña" required> </div>
            <div class="input_reg_form"> <input type="password" name="conf_password" placeholder="Repetir contraseña" required> </div>
            <div class="input_reg_form"> <input type="text" name="addres" placeholder="Direccion" required> </div>
            <div class="input_reg_form"> <input type="date" name="birth_date" placeholder="Fecha de nacimiento" required> </div>

            <div class="form_container_1">
                <div class="btns_register">
                    <button class="btn_reg_form" id="btn_form_register">Registrarme</button>
                    <div class=div_href_login>
                        <a class="href_login" href="login.php">Iniciar sesion</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
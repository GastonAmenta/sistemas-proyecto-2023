<div class="container">
    <a href="../administracion.php"> <button class="btn_reg_form" id="btn_form_register">Atras</button></a>
    <h1>Agregar un nuevo producto</h1>
    <div class="form_container">
        <form action="../../controllers/administracion/nuevoproducto.php" method="POST" id="form_register" enctype="multipart/form-data" >

            <div class="input_reg_form"> <input type="text" name="nombre" placeholder="Nombre producto" required> </div>
            <div class="input_reg_form"> <input type="text" name="categoria" placeholder="Categoria" required> </div>
            <div class="input_reg_form"> <input type="number" name="precio" placeholder="Precio" required> </div>
            <div class="input_reg_form"> <input type="text" name="talle" placeholder="Talle" required> </div>
            <div class="input_reg_form"> <input type="number" name="stock" placeholder="Stock" required> </div>
            <div class="input_reg_form"> <input type="file" name="imagen" placeholder="imagen" required accept="image/*"> </div>
            <div class="form_container_1">
                <div class="btns_register">
                <input type="submit" class="btn_reg_form" id="btn_form_register"></input>
                   
                </div>
            </div>
        </form>
    </div>
</div>
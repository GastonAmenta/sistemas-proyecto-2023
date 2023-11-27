$(document).ready(function () {
    $.ajax({
        type: 'POST',
        url: '../controllers/api/catalogo.php',    
        dataType: 'JSON',
        success: function (r) {
            if (r.messege == 'Exito') {            
                var div_container_products = $("#container-allproducts");
                console.log(r);
                
                for(var i = 1; i <= (r.cantProductos) ; i++) {    
                    var img_product_addres = r.data[i - 1]["imagen_1"];
                        
                    if(img_product_addres != null || img_product_addres != "null"){                    
                        newImage = img_product_addres.substring(3);
                        actualizarHTML(i,newImage);                                          
                    }else{
                        actualizarHTML(i);
                    }
                }
    
                function actualizarHTML(i, img_addres = "images/not_found.jpg") {
                    var html = `<div class="container-products" id="product-` + (r.data[i-1]["id"]) + `">   
                            <div class="data-product" id="data-product`+ (r.data[i-1]["id"]) + `">
                                    <div id="nombre" ><H4>`+ (r.data[i - 1]["nombre"]) + `</H4></div>
                                    <div id="precio" ><H4>$`+ (r.data[i - 1]["precio"]) + `</H4></div>
                                    <div id="talle" ><H4>`+ (r.data[i - 1]["talle"]) + `</H4></div>
                                    <div class="stock"><H4>STOCK : `+ (r.data[i - 1]["stock"]) + `</H4></div>
                                    <div class="div_comprar"> <button id="` + (r.data[i-1]["id"]) + `" class="btn_comprar">COMPRAR</button> </div>
                                </div>        
                            <div class="img-product" id="img-product-i-1" ><img src="` + img_addres + `" alt="`+ (img_product_addres) + `"></div>
                        </div>`;
                    div_container_products.append(html);
                }                    
                var colorActual = 0;

                $('.btn_comprar').click(function() {

                    if(colorActual === 0){
                        $(this).css('background-color', '#e74c3c');                    
                        colorActual = 1;
                        $(this).empty();
                        $(this).append("CANCELAR");                        
                        ordenCatalogo($(this).attr('id'),colorActual);
                    }else{
                        $(this).css('background-color', '#04AA6D');                    
                        colorActual = 0;
                        $(this).empty();
                        $(this).append("COMPRAR");
                    }

                    
                });
    
            } else {
                alert(r.message);
                location.reload();
            }
        }
    }); 

    function ordenCatalogo (id, flag) {
        $.ajax({
            type: 'POST',
            data: {id: id, flag: flag},
            url: 'api/orden_comptra.php',                            
            dataType: 'JSON',
            success: function (r) {
                if (r.messege == 'Exito') {            

                } else {
                    alert(r.message);
                    location.reload();
                }
            }
        });
    }
});


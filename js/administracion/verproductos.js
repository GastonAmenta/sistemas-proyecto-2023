$(document).ready(function () {
$.ajax({
    type: 'POST',
    url: '../api/verproductos.php',
    //data: {categoria: categoria, seek: seeker},
    dataType: 'JSON',
    success: function (r) {
        if (r.messege == 'Exito') {            
            var div_container_products = $("#container-allproducts");
            console.log(r);
            
            for(var i = 1; i <= (r.cantProductos) ; i++) {    
                var img_product_addres = r.data[i - 1]["imagen_1"];
                    
                if(img_product_addres != null || img_product_addres != "null"){                    
                    actualizarHTML(i,img_product_addres);                                          
                }else{
                    actualizarHTML(i);
                }
            }

            function actualizarHTML(i, img_addres = "../../images/not_found.jpg") {
                var html = `<div class="container-products" id="product-` + (r.data[i-1]["id"]) + `">   
                        <div class="data-product" id="data-product`+ (r.data[i-1]["id"]) + `">
                                <div id="nombre" ><H4>`+ (r.data[i - 1]["nombre"]) + `</H4></div>
                                <div id="precio" ><H4>$`+ (r.data[i - 1]["precio"]) + `</H4></div>
                                <div id="talle" ><H4>`+ (r.data[i - 1]["talle"]) + `</H4></div>
                                <div class="stock"><H4>STOCK : `+ (r.data[i - 1]["stock"]) + `</H4></div>
                            </div>        
                        <div class="img-product" id="img-product-i-1" ><img src="` + img_addres + `" alt="`+ (img_product_addres) + `"></div>
                    </div>`;
                div_container_products.append(html);
            }                    

        } else {
            alert(r.message);
            location.reload();
        }
    }
});
});
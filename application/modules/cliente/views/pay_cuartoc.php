
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
  <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/form.js'; ?>"></script>
  <script>
$(document).ready(function(){

$(".modal").css("height","auto");

 
  
  $("#compra_ser").click(function(event){
        event.preventDefault();
        
    $("#contenido_eve").slideUp('slow');
        $("#contenido_ser").toggle('slow');
    
    });
  
  $("#compra_eve").click(function(event){
        event.preventDefault();
        
    $("#contenido_ser").slideUp('slow');
        $("#contenido_eve").toggle('slow');
    
    });
  
  
    $(".ser-cuartos").click(function(){
        idcu = $(this).attr("cuarto");
        idca = $(this).attr("casa");
        base = $("#img-cuartos").attr("base");
        $.ajax({
           type: 'POST',
           data:{
            idcu:idcu,
            idca:idca
           }, 
           url: base+'index.php/cliente/getServiciosCuarto',
           cache: false,
          success: function(data) {

            var myObject = JSON.parse(data);
             serviciosDiv="<div class='img-p'>"; 
            for (var i = 0; i < myObject.length; i++) {
              serviciosDiv+="<div><img src='"+base+"statics/img/palomita.png' width='30px'/></div><div><p>"+myObject[i].nombre+"</p></div>";
              serviciosDiv+="<div class='div-clean'>&nbsp</div>";
            }

            serviciosDiv+="</div>"; 
            $(".container-modal").html(serviciosDiv);

           
              $(".modal-service").modal({
                 fadeDuration: 1000,
                 fadeDelay: 0.1,
                 escapeClose: false,
                 clickClose: false,
                 showClose: true
               });


           }
        });
      
    });
    
    
    
    
}); 

</script>
 
 
</head>
<body class="fondo_pantalla">

<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12"> &nbsp;</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco"><a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         <img src="<?php echo base_url();?>statics/bootstrap/img/logo_1.png"/>
         </a></div>
        	
     
     </div>
    <div class="col-md-4">
    		
      <span class="bienvenido"> Bienvenido </span> &nbsp; &nbsp; &nbsp; <a href="<?php echo base_url().'index.php/cliente/logout';?>" ><button class="boton_salir" type="button">Salir</button>   </a> 
      <br/>
    
      		<a class=" menu_texto" href="<?php echo base_url().'/index.php/cliente/completa_datos'?>" >
            Mi perfil 
            </a>    
    
    </div>
  </div>
  
  
  <div class="row show-grid">
    <div class="col-md-8">
    
    		<div class="header_nombre color_blanco"><br/>&nbsp;&nbsp; <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/completa_datos'?>" >
			 <?php echo $usuario->usuarioNombre;?>
             </a></div>
            <div class="header_banner "> <!--banner--><?php echo get_banner();?></div>
    		
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">MENSAJES</div>
            <div class="mensajes_ color_blanco">
            	
                
                 <?php if($mensajes!=0  || $mensajes!='0'):?>
            	<?php foreach($mensajes as $mensaje):?>
          	
                <?php if($mensaje->msjStatus==0):?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px;border-color: red; cursor:pointer; " id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                <?php else:?>
                
                    <div style="cursor:pointer;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                
                <?php endif;?>
                <hr/>
          <?php endforeach;?>
          <?php endif;?>
          
          <script>
		$(document).ready(function(){
            $(".abrir_ventana").click(function(event){
				event.preventDefault();
				id = $(event.currentTarget).attr('id');
				flag = $(event.currentTarget).attr('flag');
				url='<?php echo base_url()?>/index.php/cliente/ver_mesaje/'+id;
				url_data='<?php echo base_url()?>/index.php/cliente/cambiar_status/';
				
				
				value_json = $.ajax({
					   type: "POST",
					   url:url_data,
					   data: {id_post: id,id_user:flag},
					   async: false,
					   dataType: "html",
						success: function(data){
							$("#"+id).css({"border-color":"black"});
							
							window.open(url,"","width=200,height=100");
							
						   }
					   }).responseText;
				
				
				
			});
					
       });    	
        </script>
                
                
                
            </div>
    
    </div>
  </div>
  <div class="row show-grid">
    <div class="col-md-8" align="center">
    	
        <div class="btn-group btn-group-justified menu_" >
           <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >SERVICIOS</a>
         <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/mis_compras/'?>">MIS COMPRAS</a>
          <a class="btn btn-default menu_texto"  href="<?php echo base_url().'/index.php/cliente/mis_puntos/'?>">MIS PUNTOS CNX</a>
        </div>
        <div class="btn-group btn-group-justified menu_abajo">
        	 <a class="btn btn-default menu_servicios" href="#"></a>
              <a class="btn"></a>
              <a class="btn"></a>
        </div>
    
    
    </div>
    <div class="col-md-4"></div>
    
  </div>
  <div class="row show-grid">
    <div class="col-md-8">
    
   
    
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    <div align="center" class="textos_al" >Pago de cuarto</div>
    <br/>
              <div id="div-cuartos" align="center" style="background:#fff;">
                 
                  <form method="post" action="<?php echo(base_url())?>/index.php/cliente/save_tipo_pago_cuarto">
                    <div><p id="p-casaid" namee="<?php echo ($dataCuarto[0]['casaNombre']);?>" idca="<?php echo($dataCuarto[0]['casaId']);?>" class="menu_texto">Nombre de la casa:<label class="textos_al"><?php echo ($dataCuarto[0]['casaNombre']);?></label></p></div>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['casaId']);?>" name="idca" id="idca"/>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['casaNombre']);?>" name="casanombre" id="casanombre"/>
                    <div><p id="p-cuartoid" namee="<?php echo ($dataCuarto[0]['sennia']);?>" idcu="<?php echo($dataCuarto[0]['idCuarto']);?>" class="menu_texto">Seña cuarto:
					<label class="textos_al"><?php echo ($dataCuarto[0]['sennia']);?></label></p></div>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['idCuarto']);?>" name="idcu" id="idcu"/>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['sennia']);?>" name="sennia" id="sennia"/>
                    <div><p id="p-costo" namee="<?php echo ($dataCuarto[0]['precio']);?>" class="menu_texto">Costo:
                    <label class="textos_al"> <?php echo ($dataCuarto[0]['precio']);?></label></p></div>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['precio']);?>" name="costo" id="costo"/>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['casaIdCiudad']);?>" name="ciudad" id="ciudad"/>
                    <div><p id="p-total" namee="<?php echo ($dataCuarto[0]['precio']);?>" class="menu_texto">Total:
                    <label class="textos_al"> <?php echo ($dataCuarto[0]['precio']);?></label></p></div>
                    
               
            <div id='pago-tipo'>
         
            <?php if($dataCuarto[0]['casaPagoPayPal']=="1"){?>
             <input  type="radio" name="tipo[pago]" checked ="checked" value="2"/><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?>
            <?php }?>    
           
           
          
             <?php /*if($dataCuarto[0]['casaPagoContado']=="1"){?>
             <input  type="radio" name="tipo[pago]" value="4"/><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?>
               <?php }*/?>   
              </div>
              <div class="div-clean"></div> 
               <div id='btn-reg'><!--input type="image"  src="<?php echo base_url().'/statics/img/btn_registrar.png'?>" name=""  type="submit" value="save"-->
               
               <br/>
               <br/>
               <br/>
                <button type="submit" class="btn btn-primary">PAGAR</button>
                
               </div>  

                  </form>

              </div>
          
        
       
       
     <!-- FIN DE ZONA DE CONTENIDO-->
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">CONTACTO</div>
            <div class="mensajes_ color_blanco" align="center">
            	<img src="<?php echo base_url();?>statics/bootstrap/img/info.png"/>
            </div>
    
    </div>
  </div>
  
  
  
   <div class="row show-grid">
    <div class="col-md-12 color_blanco margen50" align="center" >
    <img src="<?php echo base_url();?>statics/bootstrap/img/footer.png"/>
    </div>
    
    
  </div>
  
  
  
</div>

</body>
</html>
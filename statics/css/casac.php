
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
  <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">



  <?php echo link_tag('statics/css/jquery.confirm.css'); ?>
        <?php echo link_tag('statics/css/menu.css'); ?>
        <?php echo link_tag('statics/css/spaces.css'); ?>
        <?php echo link_tag('statics/css/jquery.modal.css'); ?>
        <?php echo link_tag('statics/css/jquery-ui.css'); ?>
        <?php echo link_tag('statics/css/font.css'); ?>
        <?php echo link_tag('statics/css/jquery.ptTimeSelect.css'); ?>
        <?php echo link_tag('statics/css/createcodigo.css'); ?>
       <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/confirm.jquery.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/base_url.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.textareaCounter.plugin.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery-ui-1.8.16.custom.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/modules/menu.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.modal.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.ptTimeSelect.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.numeric.js';?>"></script>
                <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery-ui-1.8.16.custom.min.js'; ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.switchbutton.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/demo.js'; ?>"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/form.js'; ?>"></script>
  <script>
$(document).ready(function(){

$(".modal").css("height","auto");

 $("#servicios_menu").click(function(event){
        event.preventDefault();
        $("#itinerario_").slideUp('slow');
    $("#mis_eventos_").slideUp('slow');
        $("#servicios_").toggle('slow');
    $("#puntos_").slideUp('slow');
    /* $("#servicios_menu").addClass("menu-seleccionado");
     $("#eventos_menu").removeClass("menu-seleccionado");
     $("#itinerario_menu").removeClass("menu-seleccionado");
     $("#puntos_menu").removeClass("menu-seleccionado");*/
    });
   $("#eventos_menu").click(function(event){
        event.preventDefault();
        $("#itinerario_").slideUp('slow');
    $("#mis_eventos_").toggle('slow');
        $("#servicios_").slideUp('slow');
    $("#puntos_").slideUp('slow');
    /*$("#servicios_menu").removeClass("menu-seleccionado");
     $("#eventos_menu").addClass("menu-seleccionado");
     $("#itinerario_menu").removeClass("menu-seleccionado");
     $("#puntos_menu").removeClass("menu-seleccionado");*/
    });
   $("#itinerario_menu").click(function(event){
        event.preventDefault();
    $("#puntos_").slideUp('slow');
        $("#itinerario_").toggle('slow');
    $("#mis_eventos_").slideUp('slow');
        $("#servicios_").slideUp('slow');
    /*$("#servicios_menu").removeClass("menu-seleccionado");
     $("#eventos_menu").removeClass("menu-seleccionado");
     $("#itinerario_menu").addClass("menu-seleccionado");
     $("#puntos_menu").removeClass("menu-seleccionado");*/
    });
  $("#puntos_menu").click(function(event){
        event.preventDefault();
        $("#puntos_").toggle('slow');
    $("#itinerario_").slideUp('slow');
    $("#mis_eventos_").slideUp('slow');
        $("#servicios_").slideUp('slow');
    /*$("#servicios_menu").removeClass("menu-seleccionado");
     $("#eventos_menu").removeClass("menu-seleccionado");
     $("#itinerario_menu").removeClass("menu-seleccionado");
      $("#puntos_menu").addClass("menu-seleccionado");*/
    });
    $("#servicios_").show();
    
    $("#contenido_eventos").show();
    
    $("#alojaminento_").click(function(event){
        event.preventDefault();
        $("#contenido_alojamiento").toggle('slow');
    $("#contenido_trasporte").slideUp('slow');
    $("#contenido_alimentos").slideUp('slow');
        $("#contenido_eventos").slideUp('slow');
    
    });
  
   $("#trasporte_").click(function(event){
        event.preventDefault();
         $("#contenido_alojamiento").slideUp('slow');
    $("#contenido_trasporte").toggle('slow');
    $("#contenido_alimentos").slideUp('slow');
        $("#contenido_eventos").slideUp('slow');
    
    });
  
   $("#alimentos_").click(function(event){
        event.preventDefault();
         $("#contenido_alojamiento").slideUp('slow');
    $("#contenido_trasporte").slideUp('slow');
    $("#contenido_alimentos").toggle('slow');
        $("#contenido_eventos").slideUp('slow');
    
    });
  
   $("#eventos_").click(function(event){
        event.preventDefault();
         $("#contenido_alojamiento").slideUp('slow');
    $("#contenido_trasporte").slideUp('slow');
    $("#contenido_alimentos").slideUp('slow');
        $("#contenido_eventos").toggle('slow');
    
    });
  
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
 
 
 <style>
 #img-cuartos > div{
  float: left;
}

#div-img{
  width: 40%;
}

#div-cuartos{
  width: 60%;
}

.cuartoscasas > div {
  float: left;
  width: 25%;
}

.mod-line img{
   width: 100%;
}



.container-modal p{
  font-size: 1em;
}

.img-p > div{
  float: left;
}

.div-clean{
  clear: both;
}

.modal-service{
  padding: 10px;
  width: 300px;
  height: 500px;
   background: #ffffff;
}

 </style>
 
</head>
<body class="fondo_pantalla">

<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12"> &nbsp;</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco"> <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         <img src="<?php echo base_url();?>statics/bootstrap/img/logo_1.png"/>
         </a></div>
        	
     
     </div>
    <div class="col-md-4">
    		
      <span class="bienvenido"> Bienvenido </span> &nbsp; &nbsp; &nbsp;<a href="<?php echo base_url().'index.php/cliente/logout';?>" ><button class="boton_salir" type="button">Salir</button>   </a>    
    
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
          <a class="btn btn-default menu_texto">MIS PUNTOS CNX</a>
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
    
   
   
   <style>
   .alojamiento_mod{  background:#fff; width:500px; height:400px; margin:0px; color:#7f8c8d}
   .fondo_h_c{ background:#2980b9; color:#fff; height:30px;}
   </style> 
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    <div align="center" class="textos_al" >Alojamiento-ciudad</div>
    
    <div>
     <div class="alojamiento_imagen color_blanco btn "  >
    
            <br/>
           <?php echo img(array('src'=>$casa->casaImage,'width'=>'200px')); ?>
            <br/>
            <hr/>
            <span> <?php echo $casa->casaNombre;?></span>
     </div>
		
       
      <div class="alojamiento_mod color_blanco btn "  >
       <div class="fondo_h_c"> Cuartos</div>
       
              <div id="img-cuartos" base=<?php echo(base_url());?>>
              
              <div id="div-cuartos">
                <style>
                .test {
    overflow:hidden;
	word-wrap: break-word;
}
                </style>
                <?php 
                      $cuartosDiv="";
                      $base= base_url();
                      if(is_array($casaCuartos)){
                             foreach ($casaCuartos as $cuarto => $campo) {
                            $idcu = $campo["idCuarto"];
                            $idca = $campo["idCasa"];
                            $desc = $campo["sennia"];
                            $precio = $campo["precio"];
							$imagen = $campo["imagen"];
							
							$cuartosDiv.='<div class="cuartos_casas" id=cuarto-'.$idcu.'>
                                         
                                           <div class="test"><p >'.$desc.'</p></div>
										   <div class="cuartoscasas">
                                           <div>$'.$precio.'</div>
                                           <div><p ><a class="ser-cuartos" href="#" casa="'.$idca.'" cuarto="'.$idcu.'">Servicios</a></p></div>
                                         <div><p><a href="'.$base."/index.php/cliente/pay_cuarto/".$idcu.'">Pagar</a></p></div>
                                      </div>  
                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div> 
                                 </div>';
							?>
                            
                            
                            <div class="cuartos_casas" id="cuarto-<?php echo $idcu;?>">
                                         
                                           <div style="width:100px;"><p class="lead text-center">Whether you're new to XML or already an advanced user, the user-friendly views and powerful entry helpers, wizards, and debuggers in XMLSpy are designed to meet your XML and Web development needs from start to finish. New features in Version 2014</p></div>
                                           
                                         <div class="test">Whether you're new to XML or already an advanced user, the user-friendly views and powerful entry helpers, wizards, and debuggers in XMLSpy are designed to meet your XML and Web development needs from start to finish. New features in Version 2014</div>

                                          <div class="cuartoscasas">
                                          <div><a href="<?php echo $base.$imagen;?>">Imagen</a></div>
                                           
										   
                                           <div>$<?php echo $precio;?></div>
                                           <div><p ><a class="ser-cuartos" href="#" casa="<?php echo $idca;?>" cuarto="<?php echo $idcu;?>">Servicios</a></p></div>
                                         <div><p><a href="<?php echo $base."/index.php/cliente/pay_cuarto/".$idcu;?>">Pagar</a></p></div>
                                      </div>  
                                    <div class="mod-line">
                                     <?php echo  img(array("src"=>"statics/img/linea1.png"));?>   
                                    </div> 
                                 </div>
                            
                        
                                 <?php
                       }

                       //echo ($cuartosDiv);



                      }
                  
                  ?>
              </div>
            </div>
            
            
      
            
     </div>
    </div>  
       
       
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






           <div class='modal-service' style='display:none;'>
                    <div class='container-modal' user='0'>
                      
                    </div>
             </div>



</body>
</html>
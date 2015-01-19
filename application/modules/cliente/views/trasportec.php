<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
  <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">
  <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/form.js'; ?>"></script>
   <?php echo link_tag('statics/css/contenido.css'); ?>
        <?php echo link_tag('statics/css/main.css'); ?>
        <?php echo link_tag('statics/css/content.css'); ?>
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
 
<script>
$(document).ready(function(){

 
	
	  $("#datepicker").datepicker();
	   $('#timepicker').ptTimeSelect({
	   	   hoursLabel:     'Hora',
           minutesLabel:   'Minuto',
           setButtonLabel: 'Aceptar',
	   });
	  $(".numeric").numeric();
	  $("#btn-enviar").click(function(){
          aereo=$("#t-aero").val();
          vuelo = $("#t-vuelo").val();
          date = $("#datepicker").val();
          hour = $("#timepicker").val();
          city = $("#t-select").val();
          personas = $("#t-personas").val();

          //alert(date + " -- " + vuelo + " -- " +aero + " -- "+hour + " -- " + city + " -- " + personas);
          if(aereo=="" || vuelo=="" || date=="" || hour=="" || city=="" || personas==""){
          	     $.confirm({
                     'title'     : 'Faltan datos',
                     'message'   : 'Es necesario completar todos los campos',
                     'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
          }

          else{
             
              base = $("#trans-left").attr("base");
              user = $("#trans-left").attr("user");


              $.ajax({
              type: 'POST',
              data:{
              	aereo:aereo,
              	vuelo:vuelo,
              	date:date,
              	hour:hour,
              	city:city,
              	personas:personas,
              	user: user
              },
              url: base+'index.php/cliente/saveTrans',
              cache: false,
              success: function( data ) {
              	var myObject = JSON.parse(data);

                     
                  if(myObject[0].res==true){


                    $.confirm({
                     'title'     : 'Acción realizada',
                     'message'   : 'Los datos del servicio de transporte solicitado han sido guardados.',
                     'buttons'   : { 'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){
                                                $("#t-aero").val("");
                                                $("#t-vuelo").val("");
                                                $("#datepicker").val("");
                                                $("#timepicker").val("");
                                                $("#t-select").val("");
                                                $("#t-personas").val("");
                                            }//do nothing
                                    }
                                  }
                  });

                   }

                  

                  else{


                    $.confirm({
                     'title'     : 'Error',
                     'message'   : 'H ocurrio un problema al hacer la solicitud de transporte. Intente de nuevo',
                     'buttons'   : { 'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){
                                 
                                            }//do nothing
                                    }
                                  }
                  });
           
                  }

                  }


               
            });

          }

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
     	
        <div class="tamano_logo color_blanco"> <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         <img src="<?php echo base_url();?>statics/bootstrap/img/logo_1.png"/>
         </a></div>
         
          <div class="" style="margin-top:20px" ><a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         inicio
         </a>
        
        </div>
        	
     
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
    <div align="center" class="textos_al" >Pick up</div>
    
    <style>
    .txt_b{ background:#f4f4f2;}
	.lab_tra{ color:#7f8c8d;}
    </style>
    <div align="center" style="background:#fff;" id="trans-left" base="<?php echo(base_url());?>" user="<?php echo($usr);?>">
           <div class="row" >
              <div class="col-xs-6">
                <label for="" class="lab_tra">Aerolínea</label>
                
                <input type="text"   id="t-aero" class="form-control txt_"/>
              </div>
              
              <div class="col-xs-6">
              <label for="" class="lab_tra">Fecha de llegada</label>
               
                <input type="text"  id="datepicker"   class="form-control txt_b"/>
              </div>
            </div>
            
            <br/>
            <div class="row" >
              <div class="col-xs-6">
                <label for="" class="lab_tra">No. de vuelo</label><input type="text" class="form-control txt_b" placeholder="" name="user[]" id="t-vuelo">
              </div>
              
              <div class="col-xs-6">
              <label for="" class="lab_tra">Hora</label>
                
                <input type="text"  id="timepicker" name="user[]"  class="form-control txt_b"/>
              </div>
            </div>
            
            <br/>
            <div class="row" >
              <div class="col-xs-6">
                <label for="" class="lab_tra">Ciudad de origen</label>
                
                
                <select style="width:306px;height:30px;" id="t-select" class="form-control txt_b">
                        <?php 
                             if(is_array($ciudades)){
                                 foreach ($ciudades as $ciudad => $campo) {
                                 	$id=$campo["ciudadId"];
                                 	$ciudad = $campo["ciudadNombre"];
                                 	echo("<option value=".$id.">".$ciudad."</option>");
                                   }
                              }

                             else{
                                 echo("<option value=0>No hay ciudades activas</option>");
                             }
                              
                        ?>
                    </select>
              </div>
              
              <div class="col-xs-6">
              <label for="" class="lab_tra">No. personas</label>
               
                <input type="text" class="numeric form-control txt_b"  id="t-personas" />
              </div>
            </div>
            
            <br/>
            <br/>
            
            <button type="button" class="btn btn-primary" id="btn-enviar">ENVIAR</button>
            
            <br/>
            <br/>
    
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
<style>
@font-face {
    font-family: "nexa-bold";
    src: url("../css/font/Nexa Bold.otf");
}

@font-face {
    font-family: "nexa-light";
    src: url("../css/font/Nexa Light.otf");
}

@font-face {
    font-family: "Hiru";
    src: url("../css/font/HirukoBlackAlternate.ttf") ;
}

.font-nexa{
font-family:nexa-light;
}

.font-nexa-bold{
font-family:nexa-bold;
}

.font-hiru{
font-family:Hiru;
}
.contenido_{
	width:100%;
	height:100%;
	/*background:#fff;*/
	}
.contenido_p{
	width:1024px;;
	/*height:1500px;;*/
	/*background:#fff;*/
	
	}	
.conten-{
	height:1100px;
	width:800px;
	/*background:#fff;*/
	/*box-shadow: 3px 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px 3px #bdc3c7;*/
	}	
	
.cuadritos{
	width:200px;
	height:300px;
	margin-left:10px;
	/*background:#95a5a6;*/
	/*background-image:url(../../../../statics/img/barra mensajes.png);*/
	/*margin-left:10px;
	border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
/*-webkit-border-radius:5px; /* Safari y Chrome */


/* box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;*/
	}
	
.cuadritos_con{
	width:200px;
	height:200px;
	margin-left:10px;
	/*background:#95a5a6;*/
	/*margin-left:10px;
	border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
/*-webkit-border-radius:5px; /* Safari y Chrome */


 /*box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;*/
	}	
	
	
.header-1{
	height:50px;
	background:#ecf0f1;
	}	
	
.float-left{ float:left;}
.limpiar-div{ clear:both;}	

.slider-{ height:200px; background:#909}

.menu-1{ width:170px; height:50px; margin-left:10px;
cursor:pointer;
		/*border:1px;
		border-style:solid;
		cursor:pointer;
		border-color:#bdc3c7 #bdc3c7 #fff #bdc3c7;
		border-radius:5px; 
-moz-border-radius:5px; 
-webkit-border-radius:5px;*/ }
.menu-cotenido-{ height:250px; /*background:#bdc3c7;*/}		

.menu-seleccionado{ background:#95a5a6 ; border-color:#bdc3c7 #bdc3c7 #95a5a6 #bdc3c7;}

.menu-1:hover{/*background:#95a5a6*/ }
.color-azul{ color:#34495e;}
.color-blanco{ color:#fff;}
.cursor-pointer{ cursor:pointer;}
.eventos-{
	height:300px;
	background:#CCC;
	overflow-y: auto; 
	}
.servicios_{ /*color:#1abc9c;*/ font-size:18px;}

#mis_eventos_,#itinerario_,#servicios_,#puntos_,#contenido_alojamiento,#contenido_trasporte,#contenido_alimentos,#contenido_eventos,#contenido_ser,#contenido_eve{ display: none}	


.texto_login{ font-family: "Helvetica-ExtraCompressed";
    font-size: 1em;
	}  
#trans-left,#trans-right{
	
  float: left;
  width: 50%;
}

#trans_form input{
	width: 300px;
	font-family: "nexa-light";
}

.trans-field{
	margin-top: 10px;
}

#div-clean{
	clear: both;
}

#trans-btn button{
	border-radius: 10px; 
-moz-border-radius: 10px; 
-webkit-border-radius: 10px; 
 border: 1px solid #cccccc;
 padding:20px;
 width: 170px;
 font-size: 1.5em;
 cursor:pointer;

}

</style>



<script>
$(document).ready(function(){

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


<div class="contenido_" align="center">
	<div class="contenido_p" >
    	<div class="conten- float-left">
        	<div class="header-1">
            	<div align="left">
                	<span class="font-helvetica color-azul"><?php echo $usuario->usuarioNombre;?></span>
                </div>
            	
            </div>
        	
            <div class="slider-">
             <?php echo img(array('src'=>'statics/img/prueba.png')); ?>
            </div>
            <br/>
            <div class="menu-0" align="center">
            	<div  class="menu-1 float-left  texto_login color-azul" id="" style="margin-left:100px;"><a href="<?php echo base_url().'/index.php/cliente/'?>" > <?php echo img(array('src'=>'statics/img/bonton_servicio.png')); ?></a></div>
                <div class="menu-1 float-left texto_login color-azul" id=""> <a href="<?php echo base_url().'/index.php/cliente/mis_compras'?>" ><?php echo img(array('src'=>'statics/img/boton mis compras.png')); ?></a></div>
                <!--div class="menu-1 float-left font-helvetica color-azul" id="itinerario_menu">Mis boletos</div-->
                <div class="menu-1 float-left texto_login color-azul" id=""><?php echo img(array('src'=>'statics/img/boton puntos cnx.png')); ?></div>
            </div>
            <div class="limpiar-div"></div>

            <div class="menu-cotenido-  fondo_registro" id="trans_form">
               <p>TRANSPORTE</p>
         

             <div id="trans-left" base="<?php echo(base_url());?>" user="<?php echo($usr);?>" >

                <div class="trans-field">
                  <div><label>Aerolinea</label></div>
                  <div><input type="text"   id="t-aero" class="texto_login"/></div>
                </div> 
                
                <div class="trans-field">
                  <div><label>No. Vuelo:</label></div>
                  <div><input type="text"   id="t-vuelo" class="texto_login"/></div>
                </div>

                <div class="trans-field">
                  <div><label>Ciudad de Origen</label></div>
                  <div>
                    <select style="width:306px;height:30px;" id="t-select">
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
               </div>

             </div>
                
            <div id="trans-right">

                <div class="trans-field">
                  <div><label>Fecha de llegada</label></div>
                  <div><input type="text"  id="datepicker"   class="texto_login"/></div>
                </div>

                <div class="trans-field">
                  <div><label>Hora</label>
                  <div><input type="text"  id="timepicker" name="user[]"  class="texto_login"/></div>
                </div>
               
                
              <div class="trans-field">
                <div><label>No. Personas</label></div>
                <div><input type="text" class="numeric" style="height:19px;"  id="t-personas" class="texto_login"/></div>
              </div>
            </div>
   
            </div> 
          
          <div class="div-clean"></div>
    
            </div>fgfgfgffgfg
             
           <div id="trans-btn">
           	  <button  id="btn-enviar">Enviar</button>
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
        
        <div class="cuadritos float-left" style="background: rgba(255, 255, 255, 0.5); border-radius: 25px;">
        
         <span style="color:#f6565d; font-weight:bold; font-size:25px;" class="">MENSAJES</span>
          <div style="overflow-y: scroll; margin-bottom: 12px; height:260px; overflow-x: auto; width:190px;">
          <?php foreach($mensajes as $mensaje):?>
                <?php if($mensaje->msjStatus==0):?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px;border-color: red; cursor:pointer; width:150px;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                <?php else:?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px; cursor:pointer;width:150px;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                
                <?php endif;?>
          <?php endforeach;?>
          
          </div>
          
        
        </div>
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         
          <?php echo img(array('src'=>'statics/img/barra contacto.png')); ?>
         	 
                 	
	
	
         
         
         </div>
    </div>

</div>
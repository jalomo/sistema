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
.menu-cotenido-{ height:800px; /*background:#bdc3c7;*/}		

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
    font-size: 20pt;
	}  


</style>
<script>
$(document).ready(function(){
 verificarDisponibilidadOxxo("http://www2.oxxo.com/HTP/oxxo/check?callback=servicioDisponibleOxxo");
    
 var myform;
 hidden = $("#p-total").attr("value");
 total =  parseInt(hidden);
 if(total > 10000){
    $("#r-oxxo").prop( "disabled", true );
 }
else{
    $("#r-oxxo").prop( "disabled", false );
 }


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
	
	
/*	$("#save_user").submit(function(e){
        var option = $("input[@name=tipo]:checked").val();
        if(option==undefined){
              $.confirm({
                    'title'     : 'Seleccione tipo de pago',
                    'message'   : 'Seleccione la casilla correspondiete al tipo de pago.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
            return false;
        }

     
    });  */

  $("#frmOxxoHtp").on('submit', function(e){
        myform = this;
        e.preventDefault();
        var option = $("input[@name=tipo]:checked").val();
        if(option==undefined){
              $.confirm({
                    'title'     : 'Seleccione tipo de pago',
                    'message'   : 'Seleccione la casilla correspondiete al tipo de pago.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
              return false;
           
        }

        else{

          if(option==3){
             
                sendFormPagoOxxo(myform);
           
          

                
          }

          else{
             this.submit();
          }

        }
      
  }); 

  function sendFormPagoOxxo(myform){
   
     var jsonArr = [];
    $(".mod-hidden").each(function(){
        
       jsonArr.push($(this).attr("value"));
    });

    var formData = {
      'tipo[pago]' : "3",
      'idu' : $("#idu").attr("value"),
      'ide' : $("#ide").attr("value"),
      'idc' : $("#idc").attr("value"),
      'cst' : $("#cst").attr("value"),
      'mod' : jsonArr,
      'ptotal' : $("#p-total").attr("value")
      };

    base = $("#content").attr("base");
    $.ajax({
           type: 'POST',
           url: base+'index.php/cliente/save_tipo_pago',
           data:formData,
          
           encode:true,
          
   
           success: function( data ) {
            alert(data);
            res = JSON.parse(data);
            if(res[0].res!=0){
  
              $("#frmOxxoHtp").attr("action","https://www2.oxxo.com:8443/HTP/oxxo/request ");
              $("#oxxo_htp_monto").attr("value", $("#p-total").attr("value"));
              $("#oxxo_htp_referencia").attr("value",res[0].res);
              $("#oxxo_htp_mailcliente").attr("value",res[0].mail);
              desc = $("#p-eventoid").attr("namee") + " : $" + $("#cst").attr("value") + "</br>";
              if(jsonArr.length>0){
                 desc+="Modificadores" + "</br>";
                  $(".mod-hidden").each(function(){
        
                         str = $(this).attr("value");
                         array = str.split("-");
                         desc+=array[1] + " : $"+array[2]+"</br>";

                  });


              }
              
              $("#oxxo_htp_descripcionart").attr("value",desc);

              myform.submit();
            }

            else{

                   $.confirm({
                    'title'     : 'Erro en el servidor',
                    'message'   : 'Ocurrió un erro al guardar sus datos de compra. Intente de nuevo.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
            }
           
            /*var myObject = JSON.parse(data);
            alert(data);*/
           
           }
      });


       
   } 
          
	  
	 
	
    
  
});	

    function verificarDisponibilidadOxxo(url){
     var loader = function(src, handler){
        var script = document.createElement("script");
        script.src= src;
        script.onload = "loaded=1";
        var head = document.getElementsByTagName("head")[0];
        (head || document.body).appendChild( script );
     };

     (function(){
       loader(url,arguments.callee);
     })();
   }
    

  function servicioDisponibleOxxo(varr){
  
   
     if(varr!="ok"){
        $.confirm({
                    'title'     : 'Servicio de pago en Oxxo no disponible',
                    'message'   : 'Por el momento el servicio de pago en Oxxo no esta disponible. Seleccione algún otro método de pago.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });

         $("#r-oxxo").prop( "disabled", true );
     }

      
   }


//  

</script>
<div class="contenido_" align="center" id="content" base ="<?php echo(base_url())?>">
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
            	<div  class="menu-1 float-left  texto_login color-azul" id="" style="margin-left:100px;"><a href="<?php echo base_url().'/index.php/cliente/'?>" ><?php echo img(array('src'=>'statics/img/bonton_servicio.png')); ?></a></div>
                <div class="menu-1 float-left texto_login color-azul" id=""> <a href="<?php echo base_url().'/index.php/cliente/mis_compras'?>" ><?php echo img(array('src'=>'statics/img/boton mis compras.png')); ?></a></div>
                <!--div class="menu-1 float-left font-helvetica color-azul" id="itinerario_menu">Mis boletos</div-->
                <div class="menu-1 float-left texto_login color-azul" id=""><?php echo img(array('src'=>'statics/img/boton puntos cnx.png')); ?></div>
            </div>
            <div class="limpiar-div"></div>
            <div class="menu-cotenido-  fondo_registro" id="servicios_">
             <div align="center" style=" font-weight:bold; font-size:18px;">pago</div>
            
           
             
             
             <?php echo form_open('cliente/save_tipo_pago', array('id'=>'frmOxxoHtp')); ?>
           <table width="600" border="0">
          <tr>
            <td colspan="4">
            <div><p id="p-eventoid" namee="<?php echo $nombre_evento;?>" ide="<?php echo($evento_id);?>">Nombre del evento:<?php echo $nombre_evento;?></p></div>
            <input type="hidden" value="<?php echo($evento_id);?>" name="ide" id="ide"/>
            <br/>
            <div><p id="p-ciudadId" idc="<?php echo($nombre_ciudad);?>">Ciudad de salida:<?php echo $this->clientes->get_ciudades_nombre($nombre_ciudad);?></p></div>
            <input type="hidden" value="<?php echo($nombre_ciudad);?>" name="idc" id="idc"/>
            <br/>
            <div><p id="p-costo" cst="<?php echo($precio_ciudad);?>">Costo:<?php echo $precio_ciudad;?></p></div>
            <input type="hidden" value="<?php echo($precio_ciudad);?>" name="cst" id="cst"/>
            <br/>
            <br/>
            <div id="container-modificadores">
            
            <?php
            if(isset($modificadores)){
            	$tamano1=sizeof($modificadores);
				for($i=0;$i<$tamano1;$i++):
				$arr=$modificadores[$i];
              if($arr!=0){
				$nam1=explode("--",$arr);
				//echo $nam1[0].'-'.$nam1[1].'-'.$nam1[2].'/';
				echo "<div class='mod-item' idm=$nam1[0] txm=$nam1[1] prm=$nam1[2]><p>".$nam1[1].' $'.$nam1[2].'</p></div><br/>';
                echo "<input class='mod-hidden' type='hidden' value='$nam1[0]-$nam1[1]-$nam1[2]' name='mod[]' />";

				}
				endfor;
				}
			?>
            </div>
            
            <br/>
            
            <div><p id="p-preciototal" ptotal="<?php echo($pecio_total);?>">Precio total:<?php echo $pecio_total;?><p></div>
            <input type="hidden" value="<?php echo($pecio_total);?>" id="p-total" name="ptotal" />
            <input type="hidden" value="<?php echo($userId);?>" name="idu" id="idu"/>
            
            </td>
            
          </tr>
          <tr>
            <td>
            <?php if($dato_evento->eventoPagoDeposito==1){?>
            	<input  type="radio" name="tipo[pago]" value="1"/><?php echo img(array('src'=>'statics/img/deposito.png','width'=>'30px')); ?>
            <?php }?>    
            </td>
            <td>
            <?php if($dato_evento->eventoPagoPaypal==1){?>
            	<input  type="radio" name="tipo[pago]" value="2"/><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?>
            <?php }?>    
            </td>
            <td>
            <?php if($dato_evento->eventoPagoOxxo==1){?>
            	<input  type="radio" id="r-oxxo" name="tipo[pago]" value="3"/><?php echo img(array('src'=>'statics/img/oxxo.png','width'=>'80px')); ?>
             <?php }?>      
            </td>
            <td>
             <?php if($dato_evento->eventoPagoContado==1){?>
            	<input  type="radio" name="tipo[pago]" value="4"/><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?>
               <?php }?>     
            </td>
          </tr>
          <tr>
             <td colspan="4">
             <br/>
             <br/>
             	 <input type="image"  src="<?php echo base_url().'/statics/img/btn_registrar.png'?>" name=""  type="submit" value="save">
             </td>
          </tr>
        </table>
           
           
             <input type="hidden" id="oxxo_htp_referencia" name="oxxo_htp_referencia" value="1103249874"/>
       <input type="hidden" id="oxxo_htp_monto"          name="oxxo_htp_monto" value="250.00"/>
       <input type="hidden" id="oxxo_htp_idproveedor"    name="oxxo_htp_idproveedor" value="101614984"/>
       <input type="hidden" id="oxxo_htp_proveedor"      name="oxxo_proveedor" value="conexion gdl"/>
       <input type="hidden" id="oxxo_htp_mailproveedor"  name="oxxo_htp_mailproveedor" value="danyaxel27@gmail.com"/>
       <input type="hidden" id="oxxo_htp_urlproveedor"   name="oxxo_htp_urlproveedor" value="http://www.xcreenlab.com"/>
       <input type="hidden" id="oxxo_htp_fechavigencia"  name="oxxo_htp_fechavigencia" value="25122014"/>
       <input type="hidden" id="oxxo_htp_descripcionart" name="oxxo_htp_descripcionart" value="viaje a jupiter con </br> modifcadores"/>
       <input type="hidden" id="oxxo_htp_mailcliente"    name="oxxo_htp_mailcliente" value="nada"/>
            
          <?php echo form_close(); ?>
               		
            
            </div>
            
             
             
            
            
          
        
        </div>
        <div class="cuadritos float-left">
         <?php echo img(array('src'=>'statics/img/barra mensajes.png')); ?>
        	<!--div align="center" class="color-azul font-helvetica">Mesajes</div>
            
            <?php for($i=0;$i<5;$i++):?>
            	<div class="font-helvetica color-blanco cursor-pointer"></div>
            <?php endfor;?> -->
        	
        </div>
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         
          <?php echo img(array('src'=>'statics/img/barra contacto.png')); ?>
         	 
                 	
	
	
         
         
         </div>
    </div>


           <div class='modal-ficha' style='display:none;'>
                    <div class='container-modal' user='0'>
                      
                    </div>
             </div>

  <div>
     <form  method="POST" action="https://www2.oxxo.com:8443/HTP/oxxo/request ">
       <input type="hidden" id="oxxo_htp_referencia" name="oxxo_htp_referencia" value="1103249874"/>
       <input type="hidden" id="oxxo_htp_monto"      name="oxxo_htp_monto" value="250.00"/>
       <input type="hidden" id="oxxo_htp_idproveedor" name="oxxo_htp_idproveedor" value="110324987"/>
       <input type="hidden" id="oxxo_htp_proveedor" name="oxxo_proveedor" value="conexion gdl"/>
       <input type="hidden" id="oxxo_htp_mailproveedor" name="oxxo_htp_mailproveedor" value="danyaxel27@gmail.com"/>
       <input type="hidden" id="oxxo_htp_urlproveedor" name="oxxo_htp_urlproveedor" value="http://www.xcreenlab.com"/>
       <input type="hidden" id="oxxo_htp_fechavogencia" name="oxxo_htp_fechavigencia" value="25122014"/>
       <input type="hidden" id="oxxo_htp_descripcionart" name="oxxo_htp_descripcionart" value="viaje a jupiter con </br> modifcadores"/>
       <input type="hidden" id="oxxo_htp_mailcliente" name="oxxo_htp_mailcliente" value="danyaxel27@gmail.com"/>
     </form>
  </div>


</div>
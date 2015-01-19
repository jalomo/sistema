
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
  <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">
  <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script-->
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/form.js'; ?>"></script>
   <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery-ui-1.8.16.custom.min.js'; ?>"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
	  'numero' : $("#change_option").val(),
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
           // alert(data);
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
          
	  
	 
	
	
	
	$("#change_option").change(function (event){
		event.preventDefault();
		id=$(this).val();
		valores="";
		//alert(id);
		au=$("#test_total").val();
		au=au*id;
		$("#total_precio_u").val(au);
		$("#p_total").text(au);
		$("#oxxo_htp_monto").val(au);
		//alert($("#p_total").text());
		
		//$("#total_dl_pago").val(0);
		
	});
    
  
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
function number_format(number, decimals, dec_point, thousands_sep) {
  //  discuss at: http://phpjs.org/functions/number_format/
  // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // improved by: davook
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Brett Zamir (http://brett-zamir.me)
  // improved by: Theriault
  // improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // bugfixed by: Michael White (http://getsprink.com)
  // bugfixed by: Benjamin Lupton
  // bugfixed by: Allan Jensen (http://www.winternet.no)
  // bugfixed by: Howard Yeend
  // bugfixed by: Diogo Resende
  // bugfixed by: Rival
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  //  revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
  //  revised by: Luke Smith (http://lucassmith.name)
  //    input by: Kheang Hok Chin (http://www.distantia.ca/)
  //    input by: Jay Klehr
  //    input by: Amir Habibi (http://www.residence-mixte.com/)
  //    input by: Amirouche
  //   example 1: number_format(1234.56);
  //   returns 1: '1,235'
  //   example 2: number_format(1234.56, 2, ',', ' ');
  //   returns 2: '1 234,56'
  //   example 3: number_format(1234.5678, 2, '.', '');
  //   returns 3: '1234.57'
  //   example 4: number_format(67, 2, ',', '.');
  //   returns 4: '67,00'
  //   example 5: number_format(1000);
  //   returns 5: '1,000'
  //   example 6: number_format(67.311, 2);
  //   returns 6: '67.31'
  //   example 7: number_format(1000.55, 1);
  //   returns 7: '1,000.6'
  //   example 8: number_format(67000, 5, ',', '.');
  //   returns 8: '67.000,00000'
  //   example 9: number_format(0.9, 0);
  //   returns 9: '1'
  //  example 10: number_format('1.20', 2);
  //  returns 10: '1.20'
  //  example 11: number_format('1.20', 4);
  //  returns 11: '1.2000'
  //  example 12: number_format('1.2000', 3);
  //  returns 12: '1.200'
  //  example 13: number_format('1 000,50', 2, '.', ' ');
  //  returns 13: '100 050.00'
  //  example 14: number_format(1e-8, 8, '.', '');
  //  returns 14: '0.00000001'

  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
}
</script>
 
 
</head>
<body class="fondo_pantalla">
<div class="" align="center" id="content" base ="<?php echo(base_url())?>"></div>

<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12"> &nbsp;</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco"><a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
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
    <div align="center" class="textos_al" >PAGO</div>
    
    
    <div class="color_blanco">
    
    
    
     <?php echo form_open('cliente/save_tipo_pago', array('id'=>'frmOxxoHtp')); ?>
     
     <br/><br/>
     <div style="margin-left:100px;"><p id="p-eventoid" ide="<?php echo($evento_id);?>" >
         <label class="menu_texto">Nombre del evento:</label>
         <label class="textos_al"><?php echo $nombre_evento;?></label>
         </p>
     </div>
     
            <input type="hidden" value="<?php echo($evento_id);?>" name="ide" id="ide" />
           
     <div style="margin-left:100px;">
     	<p id="p-ciudadId" idc="<?php echo($nombre_ciudad);?>">
        <label class="menu_texto"> Ciudad de salida:</label>
		<label class="textos_al"><?php echo $this->clientes->get_ciudades_nombre($nombre_ciudad);?></label>
        </p>
     </div>
    
            <input type="hidden" value="<?php echo($nombre_ciudad);?>" name="idc" id="idc" />
            
     <div style="margin-left:100px;">
     	<p id="p-costo" cst="<?php echo($precio_ciudad);?>">
        <label class="menu_texto">Costo:</label>
		<label class="textos_al"><?php echo $precio_ciudad;?></label>
        </p>
     </div>
            <input type="hidden" value="<?php echo($precio_ciudad);?>" name="cst" id="cst" />
            
     <div align="center" class="menu_texto" >MODIFICADORES</div>    
     <hr/>   
    <div id="container-modificadores" style="margin-left:100px;">
            
            <?php
            if(isset($modificadores)){
            	$tamano1=sizeof($modificadores);
				for($i=0;$i<$tamano1;$i++):
				$arr=$modificadores[$i];
				  if($arr!=0){
					$nam1=explode("--",$arr);
					//echo $nam1[0].'-'.$nam1[1].'-'.$nam1[2].'/';
					echo "<div class='mod-item textos_al' idm=$nam1[0] txm=$nam1[1] prm=$nam1[2]><p>".$nam1[1].' $'.$nam1[2].'</p></div>';
					echo "<input type='hidden' value='$nam1[0]-$nam1[1]-$nam1[2]' name='mod[]' />";
	
					}
				endfor;
			}
			?>
     </div>
            
     <hr/>
            
           <label class="menu_texto"> Numero de boletos:</label>
            <select class="menu_texto" id="change_option" name="numero" >
            	<?php for($i=1;$i<20;$i++):?>
            	<option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php endfor;?>
            </select>
            
            <div>
              <p id="p-preciototal" ptotal="<?php echo($pecio_total);?>">
             &nbsp;  &nbsp; <label class="menu_texto">Precio total:</label>
			  <label class="textos_al" id="p_total"><?php echo $pecio_total;?></label>
              <p>
           </div>
            <input type="hidden" value="<?php echo($pecio_total);?>" name="ptotal"  id="total_precio_u"/>
            <input type="hidden" value="<?php echo($userId);?>" name="idu" id="idu" />        
     
     		<input type="hidden" value="<?php echo($pecio_total);?>" id="test_total"/>
     
     <hr/>
         <div align="center">
         <?php if($dato_evento->eventoPagoDeposito==1){?>
            	<input  type="radio" name="tipo[pago]" value="1" title="DEPOSITO BANCARIO"/><?php echo img(array('src'=>'statics/img/banco.png','width'=>'30px')); ?> &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
            <?php }?>    
            
            <?php if($dato_evento->eventoPagoPaypal==1){?>
            	<input  type="radio" name="tipo[pago]" value="2" title="PAYPAL"/><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <?php }?>    
            
            <?php if($dato_evento->eventoPagoOxxo==1){?>
            	<input  type="radio" name="tipo[pago]" value="3" title="OXXO"/><?php echo img(array('src'=>'statics/img/oxxo.png','width'=>'80px')); ?>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
             <?php }?>      
           
             <?php if($dato_evento->eventoPagoContado==1){?>
            	<input  type="radio" name="tipo[pago]" value="4" title="LLAMAR A UN EJECUTIVO"/><?php echo img(array('src'=>'statics/img/llamar.png','width'=>'40px')); ?>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
               <?php }?>
          </div>
          
          <BR/>
          <BR/>
          <div align="center">
          <button class="boton_salir"  type="submit">PAGAR</button>  
            </div>
            <BR/>
            <BR/>
            
            
            
            
             <input type="hidden" id="oxxo_htp_referencia" name="oxxo_htp_referencia" value="8861811407"/>
       <input type="text" id="oxxo_htp_monto"          name="oxxo_htp_monto" value="<?php echo number_format($pecio_total, 2, '.', '');?>"/>
       <input type="hidden" id="oxxo_htp_idproveedor"    name="oxxo_htp_idproveedor" value="101614984"/>
       <input type="hidden" id="oxxo_htp_proveedor"      name="oxxo_proveedor" value="conexion gdl"/>
       <input type="hidden" id="oxxo_htp_mailproveedor"  name="oxxo_htp_mailproveedor" value="jalomo@hotmail.es"/>
       <input type="hidden" id="oxxo_htp_urlproveedor"   name="oxxo_htp_urlproveedor" value="http://www.conexionmexico.com/sistema/statics/test.php"/>
       <input type="hidden" id="oxxo_htp_fechavigencia"  name="oxxo_htp_fechavigencia" value="25122014"/>
       <input type="hidden" id="oxxo_htp_descripcionart" name="oxxo_htp_descripcionart" value="<?php echo $nombre_evento;?>"/>
       <input type="hidden" id="oxxo_htp_mailcliente"    name="oxxo_htp_mailcliente" value="jalomo@hotmail.es"/>
       
   
            
          <?php echo form_close(); ?>
    
    
    
    
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







 <div class='modal-ficha' style='display:none;'>
                    <div class='container-modal' user='0'>
                      
                    </div>
             </div>

  <div>
     <form  method="POST" action="https://www2.oxxo.com:8443/HTP/oxxo/request ">
       <input type="hidden" id="oxxo_htp_referencia" name="oxxo_htp_referencia" value="1103249874"/>
       <input type="hidden" id="oxxo_htp_monto"      name="oxxo_htp_monto" value="1.00"/>
       <input type="hidden" id="oxxo_htp_idproveedor" name="oxxo_htp_idproveedor" value="110324987"/>
       <input type="hidden" id="oxxo_htp_proveedor" name="oxxo_proveedor" value="conexion gdl"/>
       <input type="hidden" id="oxxo_htp_mailproveedor" name="oxxo_htp_mailproveedor" value="jalomo@hotmail.es"/>
       <input type="hidden" id="oxxo_htp_urlproveedor" name="oxxo_htp_urlproveedor" value="http://www.conexionmexico.com/sistema/statics/test.php"/>
       <input type="hidden" id="oxxo_htp_fechavogencia" name="oxxo_htp_fechavigencia" value="25122014"/>
       <input type="hidden" id="oxxo_htp_descripcionart" name="oxxo_htp_descripcionart" value="viaje a jupiter con </br> modifcadores"/>
       <input type="hidden" id="oxxo_htp_mailcliente" name="oxxo_htp_mailcliente" value="jalomo@hotmail.es"/>
     </form>
  </div>



</body>
</html>
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
        	
              <a class="btn"></a>
               <a class="btn btn-default menu_servicios" href="#"></a>
              <a class="btn"></a>
        </div>
    
    
    </div>
    <div class="col-md-4"></div>
    
  </div>
  <div class="row show-grid">
    <div class="col-md-8" align="center">
    
   
    
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    <div align="center" class="textos_al" >MIS EVENTOS</div>
    
  		
        
       


            	
               
             
                
               
                
            
 <div align="center" style="background:#fff;">

           <?php 

                  if(is_array($dataEventoUsuario)){
                  	$base = base_url();
                    $img =  $dataEventoUsuario[0]["eventoUrlImage"];
                    $evento =  $dataEventoUsuario[0]["eventoNombre"];
                    $ide = $dataEventoUsuario[0]["eventoId"];
                    $codigo = $dataEventoUsuario[0]["codigoBarras"];
                    $precio = $dataEventoUsuario[0]["euPrecio"];
                    $ciudad = $dataEventoUsuario[0]["ciudadNombre"];
                    $status="";
                    if($dataEventoUsuario[0]["euStatus"]=="0"){
                        $status = "<div align='center'><label><p>No hay pago </p></label></div>";
                    }

                    else if($dataEventoUsuario[0]["euStatus"]=="1"){
                         $status = "<div align='center'><label><p class='pagado'>Pagado </p></label></div>";
                    }

                    else if($dataEventoUsuario[0]["euStatus"]=="2"){
                    	$status = "<div align='center'><label><p>Estatus: Cancelado </p></label></div>";
                    }

                    else if($dataEventoUsuario[0]["euStatus"]=="3"){
                    	$status = "<div align='center'><hr/><label><p>Apartado</p></label></div>";
                    	
                    }
                    echo("<img src='".$base.$img."' width='750px' height='200px' />");
                    echo("<div align='center'><p><label>".$evento."($".$precio."</label>)</p></div>"); 
                    echo("<div align='center'><p><label>Ciudad de salida: ".$ciudad."</label></p></div>"); 
                    echo($status);
                    if($dataEventoUsuario[0]["euStatus"]=="1"){
                       $lnk=base_url()."/index.php/cliente/printBoletoUser/".$idu."/".$idr."/".$ide."/".$codigo;
                       echo("<div align='center'><a href=$lnk target='_blank'>Imprimir boleto</a></div>");



                    } 

                    else{

                          $action =base_url()."index.php/cliente/fichaPagoEvento";
                           echo("<form id='form_ficha_deposito1' method='post' action='".$action."' enctype='multipart/form-data'>
                                    <div ><label>Comprobante de pago</label><input type='file' name='file' id='file'></div>
                                  <div ><input type='submit'  value='Enviar' class='font-nexa'/></div>
                                  <div ><input type='hidden' name='idr' value='".$idr."' /></div>
                                  <div ><input type='hidden' name='ide' value='".$ide."' /></div>
                                  <div ><input type='hidden' name='idu' value='".$idu."' /></div>
                              </form>");


                    } 
                
                    

                    if(is_array($modificadoresEventoUsuario)){
                     
                      echo("<br/><br/><div align='center'><label><p>Modificadores:</p></label></div>"); 
                       foreach ($modificadoresEventoUsuario as $row => $mod) {
                       echo("<div><p>".$mod["modNombre"].":$".$mod["modPrecio"]."</p></div>");
                      }

                    }

                    else{
                    // echo("<div align='center'><p>Agregar modificadores</p></div>"); 
                   }



                   //var_dump($modificadoresEvento);
                   $count=0;
                   $action=base_url()."/index.php/cliente/pay_mod";
                   $modificadores="<div id='add-mod'>

                                      <form method='post' action=$action>";
                   if(is_array($modificadoresEvento)){
                     $chk=0;
                     $slc=0;
                     $select=0;
                     $check=0;
                     $action=base_url()."/index.php/cliente/pay_mod";
                     $modificadores="<div id='add-mod'>
                                        <form method='post' action=$action>";
                    foreach ($modificadoresEvento as $key => $value) {
//echo $value["modificadorNombre"];
                        $nombre = $value["modificadorNombre"];
                        $precio = $value["precio"];
                        $id = $value["modificadorId"];
                        $arrayname="0";
                        $arrayprecio="0";
                        $item="<div>";
                        if (strpos($nombre,'--') !== false) {
                           $arrayname = explode("--", $nombre);
                           $arrayprecio = explode("--", $precio);
                           $item.="<select name=select-$select>";
                           $item.="<option value=0>options</option>";
                        for ($i=0; $i < count($arrayname)-1; $i++) { 
                          $prc = $arrayprecio[$i];
                          $item.="<option value=$id-$prc-$arrayname[$i]>". $arrayname[$i]."</option>";
                         }
                          $item.="</select></div>";
                          $select++;
                         }
                        else{
                         $item.=" <input type='checkbox' name='check-$check' value='$id-$precio-$nombre'>$nombre</div>";
                         $check++;
                        }
                       $modificadores.=$item;

}
$modificadores.=" <input type='hidden' name='flag' value='$select-$check'>";
$modificadores.=" <input type='hidden' name='idu' value='$idu'>";
$modificadores.=" <input type='hidden' name='ide' value='$ide'>";
$modificadores.=" <input type='hidden' name='idr' value='$idr'>";
$modificadores.="<input type='submit' value='Agregar'/>";
$modificadores.="</form><div>";
//echo($modificadores);

                   }
                   
                  /*  if(isset($data_compra[0]["modNombre"])){
                      echo("<div align='center'><p>Modificadores</p></div>"); 
                      foreach ($data_compra as $row => $mod) {
                    	 echo("<div><p>".$mod["modNombre"].":$".$mod["modPrecio"]."</p></div>");
                      }
                   }

                   else{
                   	 echo("<div align='center'><p>Agregar modificadores</p></div>"); 
                   }
                    if($data_compra[0]["euStatus"]=="1"  && $data_compra[0]["codigoBarras"]!="pendiente"){
                    	echo("<div align='center'><p><a href='".$base."/index.php/cliente/printBoletoUser/".$ide."/".$codigo."'>Imprimir boleto</a></p></div>");
                    }*/


                   }
                
           ?>     
            
           
            
             
         
             
             <div id="mod-tickets">

                <?php $total="";$status=""; $precio=""; $index=0; if(is_array($ticketsExtras)): $tickets = count($ticketsExtras);?>

                   <?php for ($i=0;$i<$tickets;$i++):?>
                      
                        <div>
                            <table>
                               <tr>
                                 <th>Modificador</th><th>Precio</th>
                               </tr>
                               <?php $aux="ticket".$index; foreach ($$aux as $key => $value): ?>
                                <tr>
                                 <td align="center"> <?php $total=$value["total"]; $tick=$value["ticket"]; $precio=$value["precio"]; $aux=$value["status"]; if($aux=="1"){$status="Pagado";} else if($aux=="3"){$status="Apartado";} echo($value["nombre"]); ?></td><td align="center"><?php echo($value["precio"]);?></td>
                               </tr>
                               <?php  endforeach;?>

                            </table>
                          <div><span>Total: <?php echo($total); ?></span><span>Status: <?php echo($status); ?></span></div>
                          <div>

                           <?php  if($status!="Pagado"):?>
                             <form id="form_ficha_mod" method="post" action="<?php echo(base_url())?>index.php/cliente/fichaPagoModExtra" enctype="multipart/form-data">
                                    <div ><label>Comprobante de pago</label><input type="file" name="file" id="file"></div>
                                    <div ><input type="hidden" value="<?php echo($tick); ?>" name="ticket" class="font-nexa"/></div>
                                    <div ><input type="submit" value="Enviar" class="font-nexa"/></div>
                              </form></div>
                           <?php  endif;?>
                            
                          
                        </div>
                         
                   <?php $index++; endfor;?> 
                     
                <?php endif;?>


             </div>
             
             
          </div>
          </div>



       
       
     <!-- FIN DE ZONA DE CONTENIDO-->
    
    </div>
    <div class="col-md-4">
    
    		<!--div class="header_mensajes">CONTACTO</div>
            <div class="mensajes_ color_blanco" align="center">
            	<img src="<?php echo base_url();?>statics/bootstrap/img/info.png"/>
            </div-->
    
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
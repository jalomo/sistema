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

.pagado{
	color:green;
}

#mod-tickets  table{
  width: 100%;
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
            <div class="menu-cotenido-  fondo_registro" id="servicios_">
             <div align="center" style=" font-weight:bold; font-size:18px;">EVENTOS</div>
            
           
            
             <div class="limpiar-div"></div> 
             
             <br/>
            <div align="left" class="color-azul font-nexa-bold" style=" font-size: 20pt;color:#636363">
            	
               
             
                
               
                
            
 <div align="center">

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
                        $status = "<div align='center'><p>No hay pago </p></div>";
                    }

                    else if($dataEventoUsuario[0]["euStatus"]=="1"){
                         $status = "<div align='center'><p class='pagado'>Pagado </p></div>";
                    }

                    else if($dataEventoUsuario[0]["euStatus"]=="2"){
                    	$status = "<div align='center'><p>Estatus: Cancelado </p></div>";
                    }

                    else if($dataEventoUsuario[0]["euStatus"]=="3"){
                    	$status = "<div align='center'><p>Apartado</p></div>";
                    	
                    }
                    echo("<img src='".$base.$img."' width='750px' height='200px' />");
                    echo("<div align='center'><p>".$evento."($".$precio.")</p></div>"); 
                    echo("<div align='center'><p>Ciudad de salida: ".$ciudad."</p></div>"); 
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
                     
                      echo("<div align='center'><p>Modificadores</p></div>"); 
                       foreach ($modificadoresEventoUsuario as $row => $mod) {
                       echo("<div><p>".$mod["modNombre"].":$".$mod["modPrecio"]."</p></div>");
                      }

                    }

                    else{
                     echo("<div align='center'><p>Agregar modificadores</p></div>"); 
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
echo($modificadores);

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
            
             
             
            
            
          
        
        </div>
        
    </div>

</div>



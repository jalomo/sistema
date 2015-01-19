
<div id="eventos-clientes">
	<p> <?php echo($evento)?></p>
		<?php 

    if($clientes[0]["usuario"]!="0"){
       foreach ($clientes as $cliente =>$campo) {
 
          $base= base_url();
          $image;
          $idUser= $campo["usuarioId"];
          $codigo=$campo["codigoBarras"];
          $idCliente=$campo["usuarioId"];
          $eventoNombre= $campo["evento"]; 
          $usuario= $campo["usuario"];
          $precio = $campo["eventoPrecio"];
          $pago;
          $status;
       	  echo(
                  "<div class='clientes' id='$idCliente'>".

                     "<p>".$campo["usuario"]."</p>".
                      "<p> Domicilio: ".$campo["domicilio"].". Teléfono:".$campo["telefono"]." País: ".$campo["pais"] ."</p>".
                      "<p><a target='_blank' href='$base/index.php/companies/boleto/$codigo'>Mostrar boleto</a></p>".
                  
                  "</div>"."</br></br>"
       	  	

       	  	);
       	  
       }
    } 
    else{
      echo("<div class='clientes'><p>No hay clientes para el evento $evento</p></div>");
    }   

	?>

</div>

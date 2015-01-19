
<p id="p-eventos">Eventos</p>
<div id="boletos-eventos">
  <?php 
 
     if(is_array($eventos)){
       foreach ($eventos as $evento) {
     
          $base= base_url();

          echo("<a href='$base/index.php/companies/getClientesBoletos/$evento->eventoId?evento=$evento->eventoNombre'>".
                  "<div class='eventos' id='$evento->eventoId'>".

                     "<p>".$evento->eventoNombre."</p>".
                      "<p> Fecha del evento: ".$evento->eventoFecha.". Precio base:".$evento->eventoPrecioBase."</p>".
                  "</div></a>"."</br></br>"
            

            );
          //echo($evento->eventoNombre."</br>");
       }
    }
    else{
      echo("<div class='eventos'><p>No hay eventos para mostrar</p></div>");
    } 
  ?>
</div>
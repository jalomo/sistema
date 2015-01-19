
<p id="p-eventos">Eventos</p>
<div id="clientes-eventos">
	<?php 
 
     if(is_array($eventos)){
       foreach ($eventos as $evento) {
     
       	  $base= base_url();

       	  echo("<a href='$base/index.php/companies/getClientesEvent/$evento->eventoId/'>".
                  "<div class='eventos-item' id='$evento->eventoId'>".

                      "<div><p>".$evento->eventoNombre."</p></div>".
                      "<div><p> Fecha del evento: ".$evento->eventoFecha."</p></div>".
                      "<div class='mod-line'>".
                        img(array('src'=>'statics/img/linea1.png'))."  
                       </div> 
                   </div></a>"
       	  

       	  	);
       	  //echo($evento->eventoNombre."</br>");
       }
    }
    else{
      echo("<div class='eventos'><p>No hay eventos registrados</p></div>");
    } 
	?>
</div>

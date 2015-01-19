
<div id="makeBoletos" class="eve-boletos"  user="<?php echo($userId) ?>" base=<?php echo(base_url())?>>
   <p>Boletos eventos</p>
      <?php 

      $base=base_url();
     if(is_array($eventosBoletos)){

     	$headers="";
     	   $headers.='<div class="eveboletos-headers-container" >
                                    <div class="eveboletos-headers">
                                        <div><p>Evento</p></div>
                                        <div><p>Fecha</p></div>
                                        <div><p>Boletos</p></div>
                                        <div><p>Impresos</p></div>
                                    </div>  
                                 </div>';
        echo($headers);
        echo("<div id='clean-div'>&nbsp</div>");                          
     	foreach ($eventosBoletos as $evento =>$campo) {
            $idEvento= $campo["eventoId"];
            $nameEvento = $campo["eventoNombre"];
            $fechaEvento = $campo["eventoFecha"]; 
            $total = $campo["numeroBoletos"];
            $impresos = $campo["impresos"];
            $print ="<a href='#' class='print-boletos' ide='$idEvento' tot='$total' imp='$impresos'><img width='40px' src='$base/statics/img/print.png'/></a>";
            $headers=""; 
         

         

            $eventosDiv="";
            $eventosDiv.='<div class="eveboletos-container" id=evento-'.$idEvento.'>
                                    <div class="eveboletos">
                                        <div><p>'.$nameEvento.'</p></div>
                                        <div><p>'.$fechaEvento.'</p></div>
                                        <div><p class="p-total">'.$total.'</p></div>
                                        <div><p class="p-impresos">'.$impresos.'</p></div>
                                        <div><p class="img-status">'.$print.'</p></div>
                                    </div>  
                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div> 
                                 </div>';
         
       	  echo($eventosDiv);

     	  }

      }
  ?>

</div>
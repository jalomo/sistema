<?php

$casa=$cuartos[0]["casaNombre"];

?>

<div id="cuartos-casa" class="font-nexa" base=<?php echo(base_url())?>>

  <p><?php echo($casa)?></p>


  <div id="cuartos_item">
  	<?php 
  	$base = base_url();
  	$cuartosDiv="";
  	    if(is_array($cuartos)){
          foreach ($cuartos as $cuarto =>$campo) {
            $idCuarto= $campo["idCuarto"];
            $idCasa = $campo["casaId"];
            $sennia = $campo["sennia"];
            $cuartosDiv.='<div class="eveboletos-container">
                                    <div class="eveboletos">
                                        <div><p>'.$sennia.'</p></div>
                                        <div><p><a class="cuarto-serv" href="#" idcasa="'.$idCasa.'"idcuarto="'.$idCuarto.'">Servicios</a></p></div>
                                        <div><p><a href="'.$base.'/index.php/companies/deleteCuarto/'.$idCasa.'/'.$idCuarto.'">Eliminar</a></p></div>
                                    </div>  
                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div> 
                                 </div>';
         
       	  
  	    }
       echo($cuartosDiv);
  	}

  	    
  	    	?>


           <div class='modal-service' style='display:none; height:250px;'>
                    <div class='container-modal' user='0'>
                      
                    </div>
             </div>

  </div>
</div>
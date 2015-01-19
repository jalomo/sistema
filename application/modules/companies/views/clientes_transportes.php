
<div id="eventos-clientes" base=<?php echo(base_url())?>>

<p>Clientes Transportes<p>

  <?php 
      $base=base_url();
     if(is_array($clientes)){
     	foreach ($clientes as $cliente =>$campo) {
            $idUser= $campo["userId"];
            $transportes = $campo["usuarioTransportes"];
            $transportesDiv="";
            foreach ($transportes as $transporte => $value) {
                $status=$value["status"];
                $idTrans = $value["id"];
                $statusImg="";
                if($status=="1"){
                    $statusImg="<input type='checkbox' idT='$idTrans' idU='$idUser'  class='common'  checked='checked' />";
                }
                else{
                   $statusImg="<input type='checkbox' idT='$idTrans' idU='$idUser' class='common'   />";
                }

               

                $transportesDiv.='<div class="mod-container" id=modificador-'.$value["id"].'>
                                    <div class="trans-izq">
                                        <div><p>'.$value["aerolinea"].'</p></div>
                                        <div><p>'.$value["origen"].'</p></div>
                                        <div><p>'.$value["fecha_llegada"].'</p></div>
                                        <div><p>'.$value["hora_llegada"].'</p></div>
                                        <div><p>'.$value["personas"].'</p></div>
                                        <div>'.$statusImg.'</div>
                                    </div>  
                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div> 
                                 </div>';
               

               }

            
       	  echo( "<div class='cliente'>".
                  "<a href='#' class='do-toggle' user='user$idUser'><div class='name-cliente'><p>".$campo["userName"]."</p></div></a>".
                     "<div style='display:none;' class='toggle-cliente' id='user$idUser'>".
                       "<div  class='datos-clientes' >".
          
                     
                      "<p> Domicilio: ".$campo["userDom"]."</p><p> Teléfono:".$campo["userTel"]."</p>Email: ".$campo["userMail"]."</p>".
       
                  "</div>".
                  "<div><p>Transportes</p></div>".
                  $transportesDiv.
                "</div></div>"
       	  	

       	  	);
       	  
			 echo '<hr/>';
     	  }
		 

      }
  ?>

</div>


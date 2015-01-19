<div id="cuartos-clientes" base=<?php echo(base_url())?> style="float:left;">

<p>Clientes Cuartos<p>

  <?php 
      $base=base_url();

     if(is_array($clientes)){
     	foreach ($clientes as $cliente =>$campo) {
            $idUser= $campo["userId"];
            $name = $campo["userName"];
            $cuartos = $campo["usuarioCuarto"];
            $cuartosDiv="";
            $statusSelect="";
            foreach ($cuartos as $cuarto => $value) {
            	$comprobante="";
                $status=$value["status"];
                $idr = $value["idr"];
                $idCuarto = $value["idCuarto"];
                $idCasa = $value["idCasa"];
                $tipoP = $value["tipoPago"]; 
                $statusImg="";
                if($status=="1"){
                    $statusSelect="<select class='slc-status-cuarto'>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >No hay pago</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' selected='selected'>Pagado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >Cancelado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa'>Apartado</option>
                          </select>";
                }
                else if($status=="0"){
                    $statusSelect="<select class='slc-status-cuarto'>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' selected='selected' >No hay pago</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >Pagado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >Cancelado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa'>Apartado</option>
                          </select>";
                }

                else if($status=="2"){
                    $statusSelect="<select class='slc-status-cuarto'>
                          <option value='$idr-$idUser-$idCuarto-$idCasa'  >No hay pago</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >Pagado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' selected='selected'>Cancelado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa'>Apartado</option>
                          </select>";
                }

                else if($status=="3"){
                    $statusSelect="<select class='slc-status-cuarto'>
                          <option value='$idr-$idUser-$idCuarto-$idCasa'  >No hay pago</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >Pagado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' >Cancelado</option>
                          <option value='$idr-$idUser-$idCuarto-$idCasa' selected='selected'>Apartado</option>
                          </select>";
                }


                if($value["fichaDeposito"]=="pendiente"){
                   $comprobante="Sin comprobante de pago";
                }

                else{
                	$comprobante="<a target='_blank' href='".$base.$value["fichaDeposito"]."'>Comprobante</a>";
                }

                if($tipoP=="1"){
                   $tipoP="Depósito";
                }

                else if($tipoP=="2"){
                   $tipoP="PayPal";
                }

                else if($tipoP=="3"){
                  $tipoP="Oxxo";
                }

                else if($tipoP=="4"){
                	$tipoP="Contado";

                }
               

                $cuartosDiv.='<div class="mod-container" id=modificador-'.$value["idr"].'>
                                    <div class="trans-izq">
                                        <div><p>'.$value["casaNombre"].'</p></div>
                                        <div><p>'.$value["sennia"].'</p></div>
                                        <div><p>$'.$value["costo"].'</p></div>
                                        <div><p>'.$tipoP.'</p></div>
                                        <div><p>'.$comprobante.'</p></div>
                                        <div>'. $statusSelect.'</div>
                                    </div>  
                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div> 
                                 </div>';
               

               }

            
       	  echo( "<div class='cliente'>".
                  "<a href='#' class='do-toggle' user='user$idUser'><div class='name-cliente'><p>".$name."</p></div></a>".
                     "<div style='display:none;' class='toggle-cliente' id='user$idUser'>".
                       "<div  class='datos-clientes' >".
          
                     
                      "<p> Domicilio: ".$campo["userDom"]."</p><p> Teléfono:".$campo["userTel"]."</p>Email: ".$campo["userMail"]."</p>".
       
                  "</div>".
                  "<div><p>Cuartos</p></div>".
                  $cuartosDiv.
                "</div></div>"
       	  	

       	  	);
       	  
				 echo '<hr/>';
     	  }
		 

      }
  ?>

</div>
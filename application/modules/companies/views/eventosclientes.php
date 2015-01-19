<?php $eventoName = $clientes[0]["eventoNombre"]; ?>


<div id="eventos-clientes" base=<?php echo(base_url())?>
	<p> <?php echo($eventoName)?></p>
		<?php 

    if($clientes[0]["usuario"]!="0"){
       foreach ($clientes as $cliente =>$campo) {
          


          $base= base_url();
          $image;
          $user= $campo["usuario"];
          $idUser= $campo["usuarioId"];
          $idRow = $campo["rowId"];
          $img = $campo["image"];
          $idCliente=$campo["usuarioId"];
          $pago;
          $status;
          $modificadores="";
          $eventoId = $campo["eventoId"];
          $servicios="<p id='p-base' base='$base'>Servicios <span><a evento ='$eventoName' idEvento ='$eventoId' username='$user' userid='$idUser' class='open-modal' href='#' >Nuevo</a></span></p>";
          $servicios.="<div class='datagrid'>";
         // $test = $campo["modificadoresUsuario"];
          $sexo = $campo["usuarioSexo"];
          $codigo = $campo["codigoBarras"];
          //if(count($test)>0){
             
          /* $servicios.="<table border='2'>";
           $servicios.="<thead><tr><th>Servicio</th><th>Costo</th><th>Pago</th><th>Status</th><th>Comprobante</th><th>Eliminar</th></tr></thead>";
           $servicios.="<tbody>";*/
            /*foreach ($test as $key => $value) {
            // $user= $value["usuarioId"];
             $modid= $value["modificadorId"];
             $modRegistro = $value["modId"];
             $eventoid = $value["modEventoId"]; 

            $modificadores.='<div class="mod-container" id=registro-'.$value["modId"].'>
                                    <div class="mod-izq">
                                        <div><p>'.$value["modificadorNombre"].'</p></div>
                                        <div><p>'.$value["modStatus"].'</p></div>
                                    </div>
                                    <div class="mod-derecho">
                                       <div><p>Precio base:$'. $value["modPrecio"].'</p></div>
                                       <div><p> <a href="#" class="mod-delete" modRegistro='.$modRegistro.' modid='.$modid.' user='.$idUser.' evento='.$eventoid.' ><img src="'.$base.'/statics/img/eliminar.png" width="40px"/></a>
                                                  </p></div>
                                    </div>

                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div>

            </div>';

            }*/
                 




              /*$comprobante="";
              $pago="";
              $suId=$value['suId'];
              $servicioId=$value['servicioId'];
              $status="";
              $select="";
              $select.="<form method='post' action='$base/index.php/companies/changeStatusServicios'>";
              if($value['suStatus']==0){
                    $select.="
                         <select name='mystatusservice' onchange='this.form.submit()'>
                            <option value='0-$idUser-$servicioId-$suId-$eventoId-$evento' selected='selected'>No hay pago</option>
                            <option value='1-$idUser-$servicioId-$suId-$eventoId-$evento'>Pagado</option>
                            <option value='2-$idUser-$servicioId-$suId-$eventoId-$evento'>Cancelado</option>
                            <option value='3-$idUser-$servicioId-$suId-$eventoId-$evento'>Apartado</option>
                         </select>
                        ";
          
              }
              else if($value['suStatus']== 1){
                    $select.="<select name='mystatusservice' onchange='this.form.submit()'>
                          <option value='0-$idUser-$servicioId-$suId-$eventoId-$evento' >No hay pago</option>
                          <option value='1-$idUser-$servicioId-$suId-$eventoId-$evento' selected='selected'>Pagado</option>
                          <option value='2-$idUser-$servicioId-$suId-$eventoId-$evento'>Cancelado</option>
                          <option value='3-$idUser-$servicioId-$suId-$eventoId-$evento'>Apartado</option>
                       </select>";
                 
    
              }

              else if($value['suStatus']==2){
                  $select.="<select name='mystatusservice' onchange='this.form.submit()'>
                          <option value='0-$idUser-$servicioId-$suId-$eventoId-$evento' >No hay pago</option>
                          <option value='1-$idUser-$servicioId-$suId-$eventoId-$evento' >Pagado</option>
                          <option value='2-$idUser-$servicioId-$suId-$eventoId-$evento' selected='selected'>Cancelado</option>
                          <option value='3-$idUser-$servicioId-$suId-$eventoId-$evento'>Apartado</option>
                       </select>";
            
              }

              else{
                   $select.="<select name='mystatusservice' onchange='this.form.submit()'>
                          <option value='0-$idUser-$servicioId-$suId-$eventoId-$evento' >No hay pago</option>
                          <option value='1-$idUser-$servicioId-$suId-$eventoId-$evento' >Pagado</option>
                          <option value='2-$idUser-$servicioId-$suId-$eventoId-$evento' >Cancelado</option>
                          <option value='3-$idUser-$servicioId-$suId-$eventoId-$evento'selected='selected'>Apartado</option>
                          </select>";
                 
              }
              $select.="</form>";
              if($value['suUrlImage']==""){
                $comprobante="No hay ficha de depósito";
              }
              else{
                $comprobante="<a href='$base".$value['suUrlImage']."' target='_blank'>Ver comprobante</a>";
              }

              if($value['suTipoPago']=="1"){
                $pago="Contado";
              }

              else if ($value['suTipoPago']=="2"){
                $pago="PayPal";
              }
              else{
                $pago="Depósito bancario";
              }

              $servicioItem="";
              $servicioItem="<tr>
                               <td>".$value['servicioNombre']."</td><td>".$value['servicioCosto']."</td><td>".$pago."</td><td>".$select."</td><td>$comprobante</td><td><form method='post' action='$base/index.php/companies/deleteService'><input type='hidden' name='deleted' value='$idUser-$servicioId-$suId-$eventoId-$evento'><input type='submit' value='Eliminar' /></form></td>
                            </tr>";
              $servicios.=$servicioItem;

            }
            $servicios.="</tbody></table></div>";*/
            
         /*}
         else{
           $servicios="";
         }*/

        




          $status_servicios="<div class='status-servicios'>
              
                             <div class='servicios' id='mod-container'>
                               <div class='mod-new'>
                                  <div><button class='addmod' idrow ='$idRow' iduser='$idUser' evento='$eventoName' eventoid=".$eventoId ." sexo=".$sexo. ">Modificadores</button></div>
                                  <div><button  idrow ='$idRow' iduser='$idUser' idevento='$eventoId' class='create-boleto'>Generar boleto</div>
                               </div>
                               <div class='clear'></div>
                                $modificadores
                             </div>
                         </div>";
          
          //Tipo de pago
          if($campo["tipoPago"]==1)
          	 $pago="Depósito";
          else if($campo["tipoPago"]==2)
             $pago="PayPal.";
          else if($campo["tipoPago"]=3)	
          	$pago="Oxxo";
          else if($campo["tipoPago"]=4)  
            $pago="Contado.";



          //Status
          $status="";
          if($campo["status"]==0){
               $status.="<select  class='select-status'>
                          <option value='$idRow-$idUser-$eventoId' selected='selected'>No hay pago</option>
                          <option value='$idRow-$idUser-$eventoId' >Pagado</option>
                          <option value='$idRow-$idUser-$eventoId' >Cancelado</option>
                          <option value='$idRow-$idUser-$eventoId'>Apartado</option>
                          </select>";
          }
      
          else if($campo["status"]==1){
                   $status.="<select class='select-status'>
                          <option value='$idRow-$idUser-$eventoId' >No hay pago</option>
                          <option value='$idRow-$idUser-$eventoId' selected='selected'>Pagado</option>
                          <option value='$idRow-$idUser-$eventoId' >Cancelado</option>
                          <option value='$idRow-$idUser-$eventoId'>Apartado</option>
                          </select>";
          }
        
          else if($campo["status"]==2){
                  $status.="<select class='select-status' >
                          <option value='$idRow-$idUser-$eventoId' >No hay pago</option>
                          <option value='$idRow-$idUser-$eventoId' >Pagado</option>
                          <option value='$idRow-$idUser-$eventoId' selected='selected'>Cancelado</option>
                          <option value='$idRow-$idUser-$eventoId'>Apartado</option>
                          </select>";
          }

          else if($campo["status"]==3){
                  $status.="<select class='select-status' >
                          <option value='$idRow-$idUser-$eventoId' >No hay pago</option>
                          <option value='$idRow-$idUser-$eventoId' >Pagado</option>
                          <option value='$idRow-$idUser-$eventoId' >Cancelado</option>
                          <option value='$idRow-$idUser-$eventoId' selected='selected'>Apartado</option>
                          </select>";
          
          }	
     





          //Depósito
        

          if($campo["tipoPago"]==3){
               if($campo["image"]=="pendiente"){
                      $image="No existe ficha de depósito";
               }
               else{
                  $image="<a target='_blank' href=$base$img>Ver ficha de depósito.</a>";
               }
          }

          else{
             $image="";
          }
          
          $domicilio="";
          if($campo["domicilio"]==""){
              $domicilio="sin domicilio";
          }

          else{
            $domicilio = $campo["domicilio"];
          }
           $url = base_url()."/"."index.php/companies/printBoletoUser/".$idUser."/".$idRow."/".$eventoId."/".$codigo;
           $lnk_comprobantes="<a href='#' idrow ='$idRow' iduser='$idUser' idevento='$eventoId'  class='addmod' > Detalle de compra </a> ";
           $lnk_addmod="<a href=# class='addmod2' idrow ='$idRow' iduser='$idUser' evento='$eventoName' eventoid=".$eventoId ." sexo=".$sexo. ">Agregar modificadores</a> ";
           $lnk_boleto="<a href='$url' target='_blank' >Ver boleto</a> ";
       	  echo( "<div class='cliente'>".
                  "<a href='#' class='do-toggle' user='user-$idUser-$idRow'><div class='name-cliente'><p>".$campo["usuario"]."</p></div></a>".
                     "<div style='display:none;' class='toggle-cliente' id='user-$idUser-$idRow'>".
                       "<div  class='datos-clientes' id='$idCliente'>".
          
                     
                      "<div><p> ".$domicilio."</p></div><div><p> ".$campo["telefono"]."</p></div> <div><p> ".$campo["pais"] ."</p></div>".
                      "<div><p>  </p></div> <div><p>".$lnk_comprobantes." &nbsp&nbsp".$lnk_addmod."&nbsp&nbsp".$lnk_boleto."</p></div>".
                  "</div><div id='clean-mod'></div>".
                 // $status_servicios.
                "</div><div class='mod-line'>".img(array('src'=>'statics/img/linea1.png'))."</div></div>"
       	  	

       	  	);
       	  
       }
       
    } 
    else{
      echo("<div class='clientes'><p>No hay clientes para el evento $eventoName</p></div>");
    } 



	?>

           <div class='modal-service' style='display:none; height:250px;'>
                    <div class='container-modal' user='0'>
                      
                    </div>

                    <div class='container-modal-extras' user='0'>
                      
                    </div>


             </div>

            <div class='modal-addmod' style='display:none; height:250px;'>
                    <div class='container-addmod' user='0'>
                      
                    </div>

              


             </div>

</div>





<!-- <a href='#' class='modal-close'  rel='modal:close'>Close</a> or press ESC-->

      
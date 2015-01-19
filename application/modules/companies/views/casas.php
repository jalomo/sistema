<div id="casas" class="font-nexa" base=<?php echo(base_url())?>>

  <p>Casas</p>
  <div >
     <form id="form_crearcasa" method="post" action="<?php echo(base_url())?>index.php/companies/saveCasa" enctype="multipart/form-data">
         <div id="casa_img"><label>Imágen </label><input type="file" name="file" id="file"></div>
         <div id="casa_desc"><label>Descripción </label> <input id="desc" type="text"  name="desc" /></div>
         <div id="casa_name"><label>Nombre </label> <input type="text" id="name"  name="name" /></div>
         <div id="casa_selec">
           <label>Ciudad</label> 


             <select name="ciudades" style="width:300px; height:40px; overflow-y:scroll;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
               
               <?php 
                    foreach ($ciudades as $ciudad) {
                      $value = $ciudad["ciudadId"];
                      $name = $ciudad["ciudadNombre"];
                      echo("<option value='$value'>$name</option>");

                    }
               ?>

             </select>


         </div>
         <div id="casa_pagos">
              <div id="chk_title"><p>Tipo de pago<p></div>
              <div id="chk_items">
                <div><input type='checkbox' name='tPago[]' value='paypal'  checked="checked"/>PayPal</div>
                <!--div><input type='checkbox' name='tPago[]' value='deposito' />Depósito</div>
                <div><input type='checkbox' name='tPago[]' value='oxxo' />Oxxo</div> 
                <div><input type='checkbox' name='tPago[]' value='contado' />Contado</div-->
              </div>
         </div> 
         <div id="casa_clear">&nbsp</div>
       <div id="casa_btn"><input type="submit" value="Guardar" class="font-nexa"/></div>
     </form>
    
  </div>

  <div id="casas-cuartos">
    
  </div>


   <div class='modal-cuarto' style='display:none; height:250px;'>
      <div class='container-modal' user='0'>
        <form id="form_addcuarto" method="post" action="<?php echo(base_url())?>index.php/companies/addCuarto" enctype="multipart/form-data">
            <div id="cuarto_desc"><label>Descripción </label> <input type="text" id="desc"  name="desc" /></div>
            <div id="cuarto_precio"><label>Precio </label> <input type="text" id="precio"  name="precio" /></div>
            <div> <label>image:</label><input type="file" id="image" name="image"/></div>
            <div id="cuarto_servicios"></div>
            <div id="cuarto_idcasa"></div>
            <div id="casa_btn"><input type="submit" value="Guardar" class="font-nexa"/></div>
       </form>
      </div>
  </div>

</div>



   
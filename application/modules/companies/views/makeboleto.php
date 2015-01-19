


<div id="makeboletos" class="font-nexa" flag=<?php echo($alert)?> base="<?php echo(base_url())?>">

  <p>Generar boletos</p>
  <div >
  	 <form id="form_createBoletos" method="post" action="<?php echo(base_url())?>index.php/companies/saveBoletos" enctype="multipart/form-data">
         <div id="selec">
           <label>Eventos</label> 


             <select name="evento" style="width:300px; height:40px; overflow-y:scroll;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
               
               <?php 
                    foreach ($eventos as $evento) {
                      $value = $evento->eventoId;
                      $name = $evento->eventoNombre;
                      echo("<option value='$value-$name'>$name</option>");

                    }
               ?>

             </select>


         </div>
  	 	 <div id="cant"><label>Cantidad </label> <input id="cantidad" type="number" maxlength="4" name="cantidad"/></div>
       <div id="txt"><label>Texto </label><textarea rows="4" cols="50" class="text-tarea" name="text-boleto" form="form_createBoletos"></textarea></div>
       <div id="img"><input type="file" name="file" id="file"></div>
  	 	 <div id="btn"><input type="submit" value="Guardar" class="font-nexa"/></div>
  	 </form>
    
  </div>
</div>
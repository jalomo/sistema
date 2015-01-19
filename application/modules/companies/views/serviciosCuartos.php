

<div id="servicios" class="font-nexa" base=<?php echo(base_url())?>>

  <p>Servicios</p>
  <div >
  	 <form id="form_crearservicio" method="post" action="<?php echo(base_url())?>index.php/companies/saveServicio" enctype="multipart/form-data">
         <div id="servicios_name"><label>Servicio</label> <input id="name" type="text"  name="name" /></div>
  	 	 <div id="casa_btn"><input type="submit" value="Guardar" class="font-nexa"/></div>
  	 </form>
    
  </div>

  <div id="servicios_cuartos">
  	<?php 
  	$base = base_url();
  	$serviciosDiv="";
  	    if(is_array($servicios)){
  	    	
          foreach ($servicios as $servicio =>$campo) {
            $idServicio= $campo["id"];
            $nombre = $campo["nombre"];
            $serviciosDiv.='<div class="eveboletos-container">
                                    <div class="eveboletos">
                                        <div><p>'.$nombre.'</p></div>
                                        <div><p><a href="'.$base.'/index.php/companies/deleteServicio/'.$idServicio.'">Eliminar</a></p></div>
                                    </div>  
                                    <div class="mod-line">
                                      '. img(array("src"=>"statics/img/linea1.png")).'   
                                    </div> 
                                 </div>';
         
       	  
  	    }

  	}

  	    echo($serviciosDiv);
  	    	?>
  </div>
</div>

<script>
$(document).ready(function(){
	
            $("#reporte_evento").click(function(event){
				event.preventDefault();
				id_evento=$("#evento_id").val();
				
				url_data='<?php echo base_url()?>/index.php/companies/genera_imagenes/'+id_evento;
				
				$.get(url_data);
				
				
				
				
			});
					
});    	
</script>

<div id="reportes-container">
  
    <div class="rep" class="eveboletos-container" id="">
                                    <div class="eveboletos">
                                        <div><label>Reporte de eventos</label></div>
                                        <div>
                                        	
                                            	<?php foreach($eventos as $evento):?>
                                                <a href="<?php echo(base_url())?>index.php/companies/genera_imagenes/<?php echo $evento->eventoId;?>" >Generar reporte <?php echo $evento->eventoNombre;?></a>
                                            	
                                            <?php endforeach;?>
                                            
                                       
                                        	
                                        </div>
                                    </div>  
                                    <div class="mod-line">
                                       <img src="<?php echo(base_url())?>statics/img/linea1.png"/>   
                                    </div> 
                                 </div>	

       <!--div class="rep" class="eveboletos-container" id="">
                                    <div class="eveboletos">
                                        <div><p>Modificadores por evento</p></div>
                                        <div><p>Generar reporte</p></div>
                                    </div>  
                                    <div class="mod-line">
                                       <img src="<?php echo(base_url())?>statics/img/linea1.png"/>   
                                    </div> 
                                 </div>	

        <div class="rep" class="eveboletos-container" id="">
                                    <div class="eveboletos">
                                        <div><p>Reporte de usuarios por evento</p></div>
                                        <div><p>Generar reporte</p></div>
                                    </div>  
                                    <div class="mod-line">
                                       <img src="<?php echo(base_url())?>statics/img/linea1.png"/>   
                                    </div> 
                                 </div>	

           <div class="rep" class="eveboletos-container" id="">
                                    <div class="eveboletos">
                                        <div><p>Reporte de codigos de barras</p></div>
                                        <div><p>Generar reporte</p></div>
                                    </div>  
                                    <div class="mod-line">
                                       <img src="<?php echo(base_url())?>statics/img/linea1.png"/>   
                                    </div> 
                                 </div>	

            <div class="rep" class="eveboletos-container" id="">
                                    <div class="eveboletos">
                                        <div><p>Reporte de vendedores</a></p></div>
                                        <div><p><a href="<?php echo(base_url())?>index.php/companies/reporteVendedores"> Generar reporte</a></p></div>
                                    </div>  
                                    <div class="mod-line">
                                       <img src="<?php echo(base_url())?>statics/img/linea1.png"/>   
                                    </div> 
                                 </div>	

           <div class="rep" class="eveboletos-container" id="">
                                    <div class="eveboletos">
                                        <div><p>Reporte de ventas por vendedor</p></div>
                                        <div><p><a href="<?php echo(base_url())?>index.php/companies/reporteVentasVendedor">Generar reporte</a></p></div>
                                    </div>  
                                    <div class="mod-line">
                                       <img src="<?php echo(base_url())?>statics/img/linea1.png"/>   
                                    </div> 
                                 </div-->	
</div>
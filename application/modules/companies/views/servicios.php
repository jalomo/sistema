

<?php //echo link_tag('statics/css/servicios.css'); ?>

<script>
  $(function() {
   
	
	 $(".editar_").click(function(event){
        event.preventDefault();
		id = $(event.currentTarget).attr('id');
		
		 url = $("#get_id").attr('href');
		value_json = $.ajax({
               type: "GET",
               url:url+"/"+id,
               async: false,
			   dataType: "json",
			    success: function(data){
					if(data==0){
						
						/* $("#componentePacom").val("");
						 $("#equipoPacom").val("");
						 $("#capacidadPacom").val("");
						 $("#modeloSeriePacom").val("");
						 $("#emailUserPacom").val("");
						 $("#userPacom").val("");
						 $("#nombreProductoPacom").val("");
						 $("#tipoMedida").val("kg");
						
						$("#message_buscar_error").fadeIn(900);
    					$("#message_buscar_error").fadeOut(5000);
						*/
						}
						else{
						$("#id_evento").val(data.eventoId);
						$("#datepicker1").val(data.eventoFecha);
						$("#eventoNombre1").val(data.eventoNombre);
						$("#eventoPrecioBase1").val(data.eventoPrecioBase);
						$("#modeloSeriePacom").val(data.equipoModeloSerie);
													 
													 
							} 
				   }
               }).responseText;
		
		
       document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'
    });
	
	 $("#save_servicios").submit(function(){
        var band = 0;
	
        if($("#servicioNombre").val() == '' ){
            $("#servicioNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#servicioNombre").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#servicioCosto").val() ==''){
            $("#servicioCosto").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#servicioCosto").css("border", "1px solid #ADA9A5");
        }
		
		
		
		
		
		

        
        if(band != 0){
            $("#errorMessage1").text("Por favor, verifique los campos marcados.").show();
				
            return false;
        }
        else{
            $("#errorMessage1").hide();
            var opt = {
                success : newEvento1
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });
	
	
	
	$("#get_evento").change(function (event){
		event.preventDefault();
		id=$(this).val();
		
		if(id==2){
		
			 url = $("#get_eventos").attr('href');
			value_json = $.ajax({
				   type: "GET",
				   url:url,
				   async: false,
				   dataType: "html",
					success: function(data){
							
							$("#carga_eventos").empty();
							$("#carga_eventos").html(data);
							$('#ms').change(function() {
								console.log($(this).val());
								
								$("#eventos_id").val($(this).val());
								
							}).multipleSelect();
						
					   }
				   }).responseText;
		}else{
			$("#carga_eventos").empty();
			$("#eventos_id").val("0");
			}
		
		
	});
	
	
	
	
	
  });
  function newEvento1(){
    
    $("#successMessage1").fadeIn(1500);
    $("#successMessage1").fadeOut(3500);
	window.location = "<?php echo base_url()."index.php/companies/servicios";?>";
}
  </script>
  
  <style>
body{ background:#fff !important;
}

</style>  
  
  
  <?php echo link_tag('statics/css/multiple-select.css'); ?>
  <?php echo anchor('companies/get_eventos_servicios/', '', array('id'=>'get_eventos', 'style'=>'display: none')); ?>
 <div style="position:absolute; display: block; bottom: 0px; top: 20px; height:400px; width:900px; margin-left:200px;" class="font-nexa">
    <span style=" font-size:24px;color:#808080">Crear servicio</span>
   <?php echo anchor('companies/get_data_evento/', '', array('id'=>'get_id', 'style'=>'display: none')); ?>
   <?php echo form_open('companies/save_servicios', array('id'=>'save_servicios')); ?>
    <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Servicio guardado correctamente</div>
    	<table width="500" border="0" >
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080" class="font-nexa"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="servicio[servicioNombre]" id="servicioNombre"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Status:</span></td>
            <td>
            	<select name="servicio[servicioStatus]" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" >
                	<option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Precio:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="servicio[servicioCosto]" id="servicioCosto" /></td>
          </tr>
          
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Puntos:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="servicio[servicioPuntos]" id="servicioPuntos" /></td>
          </tr>
          
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Tipo:</span></td>
            <td>
            	<select name="servicio[servicioTipo]" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" id="get_evento" >
                	<option value="1">General</option>
                    <option value="2">Evento</option>
                </select>
                <br/>
                <div id="carga_eventos"></div>
                <input type="hidden" id="eventos_id" name="servicio[servicioIdEventos]"  value="0"/>
            </td>
          </tr>
          
          
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Categoria:  </span></td>
            <td>
            	<select name="servicio[servicioCategoria]" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" id="servicioCategoria" >
                	<option value="1">Alojamiendo</option>
                    <option value="2">Trasporte</option>
                    <option value="3">Alimentos</option>
                </select>
               
            </td>
          </tr>
          
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Descripción:  </span></td>
            <td>
            	<textarea name="servicio[servicioDescripcion]"></textarea>
               
            </td>
          </tr>
          
          
        </table>
	
    
    <table width="100%" border="0">
      <tr>
        <td>
        	<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Guardar</button>
        </td>
        <td align="right"><!--button onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" style="background:#3498db; color:#fff; font-size:15px; width:200px; height:30px;">Añadir modificador</button--></td>
      </tr>
    </table>
 <?php echo form_close(); ?>
    <hr/>
    </div>
     
    <div id="load_proyectos" align="center" style=" position:absolute; display: block; bottom: 0px; top: 350px; height:200px; width:900px; margin-left:200px;">
   		<?php if($servicios !=0):?>
        <?php foreach($servicios as $servicio):?>
        
            <div id="eliminar<?php echo $servicio->servicioId; ?>">
            <table width="900" border="0">
              <tr>
                <td width="500">
                    <div class="font-nexa proyec"><?php echo $servicio->servicioNombre;?></div>
                    <br/>
                    <div class="font-nexa pedido">Costo:$ <?php echo $servicio->servicioCosto;?></div>
                    
                </td>
                <td width="150">
                    <div class="font-nexa pedido">
					<?php if($servicio->servicioStatus==1):?> 
                    Activo
					
                    <?php else:?>
                    Inactivo
                    <?php endif;?>
                    </div>
                   
                </td>
                <td>
                 <?php /*echo anchor('companies',
                                                  img(array('src'=>'statics/img/editar.png',
                                                            'width'=>'50px')),
                                                  array('class'=>'editar_', 'id'=>$servicio->servicioId)); ?>   
                             
                             
                    <?php echo anchor('companies/eliminar_evento/'.$servicio->servicioId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'50px')),
                                                  array('id'=>'delete'.$servicio->servicioId, 'class'=>'eliminar no_text_decoration', 'flag'=>$servicio->servicioId)); ?>     
                                                  
                    <?php echo anchor('companies/ver_modificadores/'.$servicio->servicioId,
                                                  img(array('src'=>'statics/img/ver.png',
                                                            'width'=>'50px')),
                                                  array('class'=>''));*/ ?>                                             
                                               
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <?php echo img(array('src'=>'statics/img/linea1.png')); ?>   
                </td>
                </tr>
            </table>
            </div>
          <?php endforeach;?> 
          <?php endif;?> 
        </div>	
    
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
	
	
	 $("#guarda_modificador").submit(function(){
        var band = 0;
	
        if($("#modificadorNombre").val() == '' ){
            $("#modificadorNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#modificadorNombre").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#modificadorPrecio").val() ==''){
            $("#modificadorPrecio").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#modificadorPrecio").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#modificadorPuntos").val() == ''){
            $("#modificadorPuntos").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#modificadorPuntos").css("border", "1px solid #ADA9A5");
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
	
	
});

 function newEvento1(){
    
    $("#successMessage1").fadeIn(1500);
    $("#successMessage1").fadeOut(3500);
	window.location = "<?php echo base_url()."index.php/companies/ver_modificadores/".$evento->eventoId;?>";
}
  </script>
  <style>
body{ background:#fff !important;
}

</style>  
  <div style="background:#FFF; position:absolute; display: block; bottom: 0px; top: 20px; height:140px; width:900px; margin-left:200px;" class="font-helvetica">
    <span style=" font-size:24px;color:#808080">Modificadores</span>
   <?php echo anchor('companies/get_data_evento/', '', array('id'=>'get_id', 'style'=>'display: none')); ?>
  		<table width="500" border="0" style="font-size:18px; color:#808080">
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080"> Nombre:</span></td>
            <td style="font-size:20px;"><?php echo $evento->eventoNombre;?></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Fecha:</span></td>
            <td style="font-size:20px;"><?php echo $evento->eventoFecha;?></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Precio base:</span></td>
            <td style="font-size:20px;"> <?php echo $evento->eventoPrecioBase;?></td>
          </tr>
        </table>
	<table width="100%" border="0">
      <tr>
        <td>
        	
        </td>
        <td align="right"><button onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" style="background:#8c8c8c; color:#fff; font-size:15px; width:200px; height:30px;">Añadir modificador</button></td>
      </tr>
    </table>
    
    
    </div>
    
    
    
    
    
    
    <div id="load_proyectos" align="center" style=" position:absolute; display: block; bottom: 0px; top: 250px; height:200px; width:900px; margin-left:200px;">
   	<?php if($modificadores!=0):?>
        <?php foreach($modificadores as $modificador):?>
        
            <div id="eliminar<?php echo $modificador->modificadorId; ?>">
            <div>
            <table width="900" border="0">
              <tr>
                <td width="400">
                    <div class="font-helvetica proyec"><?php echo $modificador->modificadorNombre;?></div>
                    <br/>
                    <div class="font-helvetica pedido">Activo:<?php echo $modificador->modificadorActivo;?></div>
                    
                </td>
                <td>
                    <div class="font-helvetica pedido">No. automatico:14534</div>
                   
                </td>
                <td>
                   
                    <?php /*echo anchor('companies',
                                                  img(array('src'=>'statics/img/editar.png',
                                                            'width'=>'50px')),
                                                  array('class'=>'editar_', 'id'=>$evento->eventoId)); ?>   
                             
                             
                    <?php echo anchor('companies/eliminar_evento/'.$evento->eventoId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'50px')),
                                                  array('id'=>'delete'.$evento->eventoId, 'class'=>'eliminar no_text_decoration', 'flag'=>$evento->eventoId));*/ ?>                                 
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <?php echo img(array('src'=>'statics/img/linea1.png')); ?>   
                </td>
                </tr>
            </table>
            </div>
          
        </div>	
         <?php endforeach;?> 
    <?php endif;?>
    </div>
    
    
    
    
    

   <!-- base semi-transparente -->
    <div id="fade" class="overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>
<!-- fin base semi-transparente -->
 
<!-- ventana modal -->  
	<div id="light" class="modal" style=" background:#ecf0f1;">
    	<!--a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">cerrar</a-->
      
       <div class="font-helvetica label_p" align="center">
       	Agregar modificador
       </div> 
       
        <?php echo form_open('companies/guarda_modificador', array('id'=>'guarda_modificador')); ?>
        
        <div id="errorLoginData1" style="color: #FF0000; display: none"></div>
    <div id="successMessage1" style="color:#060; display: none">Evento guardado correctamente</div>
      <table width="70%" border="0" align="center">
          <tr>
            <td align="center">
            	<div class="font-helvetica tamano_" align="left">Nombre</div>
                <div align="left"><input type="text" style="width:300px; height:30px;" name="modificador[modificadorNombre]" id="modificadorNombre"/></div>
            </td>
            <td>
            	<div class="font-helvetica tamano_">Precio</div>
                <div><input type="text" style="width:300px; height:30px;" name="modificador[modificadorPrecio]" id="modificadorPrecio"/></div>
            </td>
          </tr>
          
          <tr>
            <td align="center">
            	<div class="font-helvetica tamano_" align="left">Puntos</div>
                <div align="left"><input type="text" style="width:300px; height:30px;" name="modificador[modificadorPuntos]" id="modificadorPuntos"/></div>
            </td>
           
          </tr>
          
          <tr>
            <td>
            	<div class="font-helvetica tamano_"><input name="modificador[modificadorActivo]" type="checkbox" value="1" id="modificadorActivo">Activo</div>
                <div class="font-helvetica tamano_"><input name="modificador[modificadorAutomatico]" type="checkbox" value="1" id="modificadorAutomatico">Automatico</div>
            </td>
            <td>
            	<div class="font-helvetica tamano_"><input name="modificador[modificadorStatus]" type="radio" value="1">Cantidad <input name="modifica[modificadorStatus]" type="radio" value="2">Porcentaje </div>
                <div></div>
                <input type="hidden"  name="modificador[modificadorIdEvento]" value="<?php echo $evento->eventoId;?>"/>
            </td>
          </tr>
          <tr>
            <td align="center">
            	<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><button style="background:#bdc3c7; color:#fff; font-size:15px; width:200px; height:30px;">Cancelar</button></a>
            </td>
            <td align="center">
            	<button style="background:#8c8c8c; color:#fff; font-size:15px; width:200px; height:30px;" type="submit">Guardar</button>
            </td>
          </tr>
        </table>
      <?php echo form_close(); ?>                       
    </div>
<!-- fin ventana modal -->

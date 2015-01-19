<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script>
  $(function() {
	  
	  
    $( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
	
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
						$("#eventoLugares1").val(data.eventoPuntos);
						$("#eventoPuntos1").val(data.eventoPuntos);
													 
													 
							} 
				   }
               }).responseText;
		
		
       document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'
    });
	
	
	
	
	
	 $("#save_eventos").submit(function(){
        var band = 0;
	
       
		if($("#eventoNombre").val() == '' ){
            $("#eventoNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoNombre").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#datepicker").val() ==''){
            $("#datepicker").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#datepicker").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#eventoPrecioBase").val() == ''){
            $("#eventoPrecioBase").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoPrecioBase").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#eventoLugares").val() == ''){
            $("#eventoLugares").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoLugares").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#eventoPuntos").val() == ''){
            $("#eventoPuntos").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoPuntos").css("border", "1px solid #ADA9A5");
        }
		
		
		

        
        if(band != 0){
            $("#errorMessage").text("Por favor, verifique los campos marcados.").show();
				
            return false;
        }
        else{
            $("#errorMessage").hide();
            var opt = {
                success : newEvento
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });
	
	
	
	
	
	
	$(".agregar_").click(function(event){
        event.preventDefault();
		
		
		aux_indice++;
		aux_radom=Math.floor((Math.random() * 1000) + 1);
        $( "#users tbody" ).append( '<tr id="prod_'+aux_indice+'">' +
								  '<td><?php  $this->Company->get_ciudades();?></td>' +
								  ' <td><input type="text" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" placeholder="Precio Hombre" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								    ' <td><input type="text" name="mod[PrecioM][]" onkeypress="return justNumbers(event);" placeholder="Precio Mujer" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								 
								  
								  '<td><img id="'+aux_indice+'"  class="delete_prod" alt="" style="cursor:pointer;" src="<?php echo base_url();?>/statics/img/bt_eliminar.png"></td>' +
								'</tr>' );
								
								$(".delete_prod").click(function(event){
									event.preventDefault();
									id = $(event.currentTarget).attr('id');
									 $('#prod_'+id).remove();
								});
    });
	aux_indice=1;
	
	
	
	
	
	
	
  });
  
  
  
  
function newEvento(){
    
    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);
	//location.reload();
}

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;

return /\d/.test(String.fromCharCode(keynum));



}





  </script>
  
<style>
body{ background:#fff !important;
}

</style>  


<?php echo form_open_multipart('companies/save_evento_editar/'.$evento->eventoId, array('id'=>'save_eventos')); ?>
 <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
<table width="500" border="0"  class="font-nexa">
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080" class="font-nexa"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;background-color: rgba(0,0,0,0.1); border:1px solid #333333;" name="evento[eventoNombre]" id="eventoNombre" value="<?php echo $evento->eventoNombre;?>"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Fecha:</span></td>
            <td><input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333; " id="datepicker" name="evento[eventoFecha]" value="<?php echo $evento->eventoFecha;?>"  /></td>
          </tr>
          <!--tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Precio base:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1); border:1px solid #333333;" name="evento[eventoPrecioBase]" id="eventoPrecioBase" onkeypress="return justNumbers(event)" /></td>
          </tr-->
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Lugares:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333; " name="evento[eventoLugares]" id="eventoLugares" onkeypress="return justNumbers(event)" value="<?php echo $evento->eventoLugares;?>"  /></td>
          </tr>
          
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Imagen :</span></td>
            <td> 
            	<input type="file" name="image" id="image"/>
            </td>
          </tr>
          
          
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Puntos :</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333; " name="evento[eventoPuntos]" id="eventoPuntos" onkeypress="return justNumbers(event)"  value="<?php echo $evento->eventoPuntos;?>"  /></td>
          </tr>
          
          
          
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Tipo de pago:</span></td>
            <td> 
            <?php if($evento->eventoPagoPaypal==1){?>
            	<input type="checkbox" name="eventoC[eventoPagoPaypal]" checked value="1">PayPal
            <?php }else{?>
            	<input type="checkbox" name="eventoC[eventoPagoPaypal]" value="1">PayPal
            <?php }?>
            
            <?php if($evento->eventoPagoDeposito==1){?>
            	/<input type="checkbox" name="eventoC[eventoPagoDeposito]" checked value="1">Deposito
            <?php }else{?>
            	/<input type="checkbox" name="eventoC[eventoPagoDeposito]" value="1">Deposito
            <?php }?>
            
            <?php if($evento->eventoPagoOxxo==1){?>
            	/<input type="checkbox" name="eventoC[eventoPagoOxxo]" checked value="1">oxxo
            <?php }else{?>
            	/<input type="checkbox" name="eventoC[eventoPagoOxxo]" checked  value="1">oxxo
            <?php }?>
            
            <?php if($evento->eventoPagoContado==1){?>
            	/<input type="checkbox" name="eventoC[eventoPagoContado]"  checked value="1">Contado
            <?php }else{?>
            	/<input type="checkbox" name="eventoC[eventoPagoContado]" value="1">Contado
            <?php }?>
              
              
              
              
            
            </td>
          </tr>
          
          
          
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Ciudad de salida :</span></td>
            <td> 
            
            
           <table id="users" class="">
                    <thead>
                      <tr class="ui-widget-header ">
                        <th>Nombre</th>
                        <th>Precio Hombre</th>
						<th>Precio Mujer</th>
                         <th>
                         	<?php echo img(array('src'=>'statics/img/bt_agregar.png','id'=>'','class'=>'agregar_','style'=>'cursor:pointer;')); ?>
                         </th>
                      </tr>
                      
                      
                     
							
						
                        
                       
                      
                      
                    </thead>
                    
                    <tbody>
                     <?php 
					$tamano=sizeof(explode("--",$evento->eventoCiudad));
					$nam=explode("--",$evento->eventoCiudad);
					$preH=explode("--",$evento->eventoCiudad);
					$preM=explode("--",$evento->eventoCiudad);
					
						for($i=0;$i<$tamano-1;$i++):
						?>
                      <tr id="prod_1">
                        <td>
                            <span class="font-nexa">
							<input type="hidden" name="mod[ciudad][]"  value="<?php  echo $nam[$i];?>" />
                            <input type="text" name=""  value="<?php  echo $this->Company->get_ciudad_id($nam[$i]);?>" placeholder="" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" value="<?php echo $preH[$i];?>" readonly/>
                            </span>
                        </td>
                        <td><input type="text" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" placeholder="Precio Hombre" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" value="<?php echo $preH[$i];?>" readonly/></td>
						 <td><input type="text" name="mod[PrecioM][]"  onkeypress="return justNumbers(event);"placeholder="Precio Mujer" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"  value="<?php echo $preM[$i];?>" readonly/></td>
                        <td><?php echo img(array('src'=>'statics/img/bt_eliminar.png','id'=>'1','style'=>'cursor:pointer;','class'=>'delete_prod')); ?></td>
                      </tr>
                       <?php endfor;?>
                    </tbody>
                    
                    
                    
                    
                  </table>
            
            
            </td>
          </tr>
          
          
        </table>
        
        <br/>
        <?php /*echo anchor('companies/modificadores_nuevo/'.$evento->eventoId,
                                                 'Agregar modificador',
                                                  array('class'=>''));*/ ?>  
        
        <button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Guardar</button>
        
        
        <?php echo anchor('companies/eliminar_evento_id/'.$evento->eventoId,
                                                 'eliminar evento',
                                                  array('id'=>'', 'class'=>'', 'flag'=>'')); ?>     
                                                  
	
   <?php echo form_close(); ?>          

<script>
 $(function() {
$("#get_evento").change(function (event){
		event.preventDefault();
		id=$(this).val();
		
		
		 url = $("#get_eventos").attr('href');
		value_json = $.ajax({
               type: "GET",
               url:url+"/"+id,
               async: false,
			   dataType: "html",
			    success: function(data){
						
						$("#carga_eventos").empty();
						$("#carga_eventos").html(data);
					
				   }
               }).responseText;
		
		
	});
	
	$(".abrir_modificadores").click(function(event){
        event.preventDefault();
      id = $(event.currentTarget).attr('id');
	  
        $("#abrir_"+id).toggle('slow');
    });
});	

</script>
<?php echo anchor('companies/get_specific_eventos/', '', array('id'=>'get_eventos', 'style'=>'display: none')); ?>
<div style="margin-left:210px;">
 
 
 <table width="500" border="0" style="font-size:18px; " >
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080"> Nombre:</span></td>
            <td><?php echo $usuario->usuarioNombre;?></td>
             <td align="right"><span style="font-size:18px;color:#808080"> Sexo:</span></td>
            <td><?php echo $usuario->usuarioSexo;?></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Domicilio:</span></td>
            <td><?php echo $usuario->usuariodomicilio;?></td>
            <td align="right"><span style="font-size:18px;color:#808080"> País:</span></td>
            <td>
            	<?php echo $this->Company->get_name_pais($usuario->usuarioPais);?>
               </td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Telefono:</span></td>
            <td> <?php echo $usuario->usuarioTelefonno;?></td>
            <td align="right"><span style="font-size:18px;color:#808080"> Ciudad:</span></td>
            <td> 
                <?php echo $this->Company->get_name_estado($usuario->usuarioEstado);?>
            
           	 </td>
          </tr>
          
        </table>
        <hr/>

 
 <div>
 Eventos disponibles:
 	<select style="width:300px; height:30px;" id="get_evento" >
    <option value="0">Seleccione un evento</option>
     <?php foreach($eventos as $evento):?>
     <option value="<?php echo $evento->eventoId?>" ><?php echo $evento->eventoNombre;?></option>
     <?php endforeach;?>
   </select>
 </div>
 
 <div id="carga_eventos"></div>
 
 
 <div id="evento_vendidos">
 
 	 <?php if($eventos_comprados !=0):?>
                                    <br/>
									<?php foreach($eventos_comprados as $even):?>
                                    
                                        <div id="eliminar<?php echo $even->euIdEvento; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="">
                                                <div class="font-helvetica " style="font-size:14px"><?php echo $this->Company->get_name_evento( $even->euIdEvento);?></div>
                                              
                                                
                                            </td>
                                           
                                            <td width="50">
                                                 
                                                <!--div class="font-helvetica servicios_">Costo:$<?php echo $this->Company->get_costo_evento( $even->euIdEvento);?></div--> 
                                                                               
                                                                           
                                            </td>
                                            <td width="50">
                                                 
                                                <!--div class="font-helvetica servicios_">Lugares:<?php echo $this->Company->get_lugares_evento( $even->euIdEvento);?></div--> 
                                                                               
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:20px">
                                                <a href="#" title="ver más" style="margin-left:50px" class="abrir_modificadores" id="<?php echo $even->euIdEvento; ?>" flag="<?php echo $even->euIdEvento; ?>">Ver más</a>
                                                
                                               
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="4">
                                            
                                            <div style=" display:none;" id="abrir_<?php echo $even->euIdEvento; ?>">
                                            <?php $modificadores= $this->Company->get_modificador_usuario($even->euIdEvento);?>
                                            	<?php foreach($modificadores as  $modificador):?>
                                                <?php echo $this->Company->get_name_modificador($modificador->modModificadorId);?>
                                                <?php echo ' Precio:$'.$this->Company->get_precio_modificador($modificador->modModificadorId);?>
                                                <br/>
                                                <?php endforeach;?>
                                            </div>
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                      <?php endforeach;?> 
                                      <?php endif;?>  
 </div>
 
 
</div>
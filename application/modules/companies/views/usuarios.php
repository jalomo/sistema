
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
						
						$("#id_usuario").val(data.adminId);
						$("#adminNombre1").val(data.adminNombre);
						$("#adminEmail1").val(data.adminEmail);
						$("#adminUsername1").val(data.adminUsername);
						//$("#adminPassword1").val(data.adminPassword);
						
													 
													 
							} 
				   }
               }).responseText;
		
		
       document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'
    });
	
	 $("#save_usuario").submit(function(){
        var band = 0;
	
        if($("#adminNombre").val() == '' ){
            $("#adminNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#adminNombre").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#adminUsername").val() ==''){
            $("#adminUsername").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#adminUsername").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#adminPassword").val() == ''){
            $("#adminPassword").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#adminPassword").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#adminEmail").val() == ''){
            $("#adminEmail").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#adminEmail").css("border", "1px solid #ADA9A5");
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
	
  });
  function newEvento1(){
    
    $("#successMessage1").fadeIn(1500);
    $("#successMessage1").fadeOut(3500);
	window.location = "<?php echo base_url()."index.php/companies/usuarios";?>";
}
  </script>

<style>
body{ background:#fff !important;
}

</style>  
  


 <div style="; position:absolute; display: block; bottom: 0px; top: 20px; height:300px; width:900px; margin-left:200px;" class="font-nexa">
    <span style=" font-size:24px;color:#808080">Usuarios</span>
   <?php echo anchor('companies/get_usuario_id/', '', array('id'=>'get_id', 'style'=>'display: none')); ?>
  	<?php echo form_open('companies/save_usuario', array('id'=>'save_usuario')); ?>
    <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
    	<table width="500" border="0" >
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080" class="font-nexa"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="usuario[adminNombre]" id="adminNombre"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> email:</span></td>
            <td><input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" id="adminEmail" name="usuario[adminEmail]"  /></td>
          </tr>
          <!--tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Telefono:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="usuario[eventoPrecioBase]" id="eventoPrecioBase" /></td>
          </tr-->
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Username:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="usuario[adminUsername]" id="adminUsername" /></td>
          </tr>
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Password:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="usuario[adminPassword]" id="adminPassword" /></td>
          </tr>
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Tipo:</span></td>
            <td>
            	<select name="usuario[adminTipo]" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
                	<option id="0">Vendedor</option>
                    <option id="1">Adminsitrador</option>
            	</select>
            </td>
          </tr>
        </table>
	
    <br/>
    <br/>
    <table width="100%" border="0">
      <tr>
        <td>
        	<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" type="submit" class="font-nexa">Guardar</button>
        </td>
        <td align="right"><!--button onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" style="background:#3498db; color:#fff; font-size:15px; width:200px; height:30px;">Añadir modificador</button--></td>
      </tr>
    </table>
 <?php echo form_close(); ?>
    
    <hr />
    </div>





 <div id="load_proyectos" align="center" style=" position:absolute; display: block; bottom: 0px; top: 350px; height:200px; width:900px; margin-left:200px;">
   		 <?php foreach($usuarios as $usuario):?>
        
            <div id="eliminar<?php echo $usuario->adminId; ?>">
            <table width="900" border="0">
              <tr>
                <td width="500">
                    <div class="font-nexa proyec"><?php echo $usuario->adminNombre;?></div>
                    <br/>
                    <div class="font-nexa pedido"><?php echo $usuario->adminEmail;?></div>
                    
                </td>
                <td width="150">
                    <div class="font-nexa pedido">Tipo:<?php echo $usuario->adminTipo;?></div>
                   
                </td>
                <td>
                 <?php echo anchor('companies',
                                                  img(array('src'=>'statics/img/editar.png',
                                                            'width'=>'40px')),
                                                  array('class'=>'editar_', 'id'=>$usuario->adminId)); ?>   
                             
                             
                    <?php echo anchor('companies/eliminar_evento/'.$usuario->adminId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'40px')),
                                                  array('id'=>'delete'.$usuario->adminId, 'class'=>'eliminar no_text_decoration', 'flag'=>$usuario->adminId)); ?>     
                                                  
                                                           
                                               
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <?php //echo img(array('src'=>'statics/img/linea1.png')); ?>   
                    <hr/>
                </td>
                </tr>
            </table>
            </div>
          <?php endforeach;?>  
   
   </div>	


   <!-- base semi-transparente -->
    <div id="fade" class="overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>
<!-- fin base semi-transparente -->
 
<!-- ventana modal -->  
	<div id="light" class="modal" style=" background:#ecf0f1;">
    	<!--a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">cerrar</a-->
      
       <div class="font-helvetica label_p" align="center">
       	Editar usuario
       </div> 
       
        <?php echo form_open('companies/edita_usuario', array('id'=>'edita_eventos')); ?>
        
        <div id="errorLoginData1" style="color: #FF0000; display: none"></div>
    <div id="successMessage1" style="color:#060; display: none">Usuario guardado correctamente</div>
       <table width="70%" border="0" align="center">
         <tr>
            <td align="right"><span style="font-size:18px; color:#808080"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;" name="user[adminNombre]" id="adminNombre1"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Email:</span></td>
            <td><input type="text" style="width:300px; height:30px;" id="adminEmail1" name="user[adminEmail]"  /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Username:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="user[adminUsername]" id="adminUsername1" /></td>
          </tr>
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Password:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="user[adminPassword]" id="adminPassword1" /></td>
          </tr>
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Tipo:</span></td>
            <td> </td>
          </tr>
          <tr>
            <td align="center">
            	<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><button style="background:#bdc3c7; color:#fff; font-size:15px; width:200px; height:30px;" type="button">Cancelar</button></a>
            </td>
            <td align="center">
            	<button style="background:#3498db; color:#fff; font-size:15px; width:200px; height:30px;" type="submit">Guardar</button>
            </td>
          </tr>
        </table>
        <input type="hidden" id="id_usuario" name="id_usuario" />
      <?php echo form_close(); ?>                       
    </div>
<!-- fin ventana modal -->

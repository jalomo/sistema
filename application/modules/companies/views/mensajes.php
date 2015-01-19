<script language="javascript">

$(document).ready(function(){

    //Load the library and the functionality of news
    $("#change_opciones").change(function (event){
		event.preventDefault();
		id=$(this).val();
		valores="";
		switch (id) {
			case '1':
				valores='';
				$("#carga_user").empty();
			break;
			case '2':
			    $("#carga_user").empty();
				valores='&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Usuario:<select id="user_" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="usuariotipo">'+
					
						'<option value="1">General</option>'+
						'<option value="2">Individual</option>'+
					'</select>';
			break;
			case '3':
			    $("#carga_user").empty();
				valores=' &nbsp &nbsp &nbsp &nbsp  Vendedor:<select id="vendedor_" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="vendedortipo">'+
					
						'<option value="1">General</option>'+
						'<option value="2">Individual</option>'+
					'</select>';
			break;
			case '4':
			 
                 $("#carga_user").empty();     			    
				 url = $("#get_ciudad").attr('href');
				 valores = $.ajax({
					   type: "GET",
					   url:url,
					   async: false,
					   dataType: "html",
						success: function(data){
							
							valores=data;
						   }
					   }).responseText;
			break;
			case '5':
			     $("#carga_user").empty();
				 url = $("#get_evento").attr('href');
				 valores = $.ajax({
					   type: "GET",
					   url:url,
					   async: false,
					   dataType: "html",
						success: function(data){
							
							valores=data;
						   }
					   }).responseText;
			break;
		}
		$("#carga_opciones").empty();
		$("#carga_opciones").html(valores);
		
		
		
		$("#user_").change(function(event){
        event.preventDefault();
		idU=$(this).val();
		switch (idU) {
			case '1':
				$("#carga_user").empty();
			break;
			case '2':
				 url = $("#get_usuarios").attr('href');
				 value_json = $.ajax({
					   type: "GET",
					   url:url,
					   async: false,
					   dataType: "html",
						success: function(data){
							$("#carga_user").empty();
							$("#carga_user").html(data);
							
						   }
					   }).responseText;
			break;
			
		}

    	});
		
		
		$("#vendedor_").change(function(event){
        event.preventDefault();
		idU=$(this).val();
		switch (idU) {
			case '1':
				$("#carga_user").empty();
			break;
			case '2':
				 url = $("#get_vendedores").attr('href');
				 value_json = $.ajax({
					   type: "GET",
					   url:url,
					   async: false,
					   dataType: "html",
						success: function(data){
							$("#carga_user").empty();
							$("#carga_user").html(data);
							
						   }
					   }).responseText;
			break;
			
		}

    	});
		
		
	});
	
	
	
	
	
	$("#crear_mensaje").submit(function(){
        var band = 0;
	
        if($("#mensajeContenido").val() == '' || $("#mensajeContenido").val() == ""){
            $("#mensajeContenido").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#mensajeContenido").css("border", "1px solid #ADA9A5");
        }
		
		
	
        if(band != 0){
            $("#errorMessage").text("Por favor, verifique los campos marcados.").show();
				
            return false;
        }
        else{
            $("#errorMessage").hide();
            var opt = {
                success : newEncuesta
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });
	
	
});

function newEncuesta(){

    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);
	location.reload();
}
</script>

<style>
body{ background:#fff !important;
}

</style>  
  

<?php echo anchor('companies/get_usuarios_msj/', '', array('id'=>'get_usuarios', 'style'=>'display: none')); ?>
<?php echo anchor('companies/get_vendedor_msj/', '', array('id'=>'get_vendedores', 'style'=>'display: none')); ?>
<?php echo anchor('companies/get_ciudad_msj/', '', array('id'=>'get_ciudad', 'style'=>'display: none')); ?>
<?php echo anchor('companies/get_evento_msj/', '', array('id'=>'get_evento', 'style'=>'display: none')); ?>
<div style="margin-left:210px;">
 <span style=" font-size:24px;color:#808080" class="font-nexa">Mesajes</span>
 <div id="successMessage" style="color:#060; display: none">Mensaje guardado correctamente</div>
 <?php echo form_open('companies/guarda_mensaje', array('id'=>'crear_mensaje')); ?>
	<br/>

	<div  style="" class="font-nexa">
    mendaje para:
    <select id="change_opciones" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="tipo">
    	<option value="1">General</option>
        <option value="2">Usuarios</option>
        <option value="3">Vendedores</option>
        <option value="4">Ciudad</option>
        <option value="5">Evento</option>
    </select>
    	
    </div>
    
    <br/>
    
    <div id="carga_opciones" class="font-nexa"></div>
    
    <br/>
    
     <div id="carga_user" class="font-nexa"></div>
    
    
    <br/>
    
    <br/>
    <div class="font-nexa">
    	Mensaje:
    </div>
    <div>
   
    	<textarea cols="50" rows="10" id="mensajeContenido" name="texto" style="background-color: rgba(0,0,0,0.1);border:1px solid #333333;"></textarea>
    </div>
    <br/>
    <button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Guardar</button>
    <?php echo form_close(); ?>
    
    
    <br/>
    
    <table width="500" border="1" style="border: 1px solid black; border-collapse: collapse;">
      <tr style="background:#CCC">
        <td>Tipo</td>
        <td>Texto</td>
        
      </tr>
     <?php if($mensajes!=0):?> 
     <?php foreach($mensajes as $mensaje):?>
     <?php 
	    $aux_tipo='';
	 	switch ($mensaje->mensajeTipo) {
			case 1:
				$aux_tipo='General';
				break;
			case 2:
				$aux_tipo='Usuarios-General';
				break;
			case 3:
				$aux_tipo='Usuarios-Individual';
				break;
			case 4:
				$aux_tipo= "Vendedores-General";
				break;
			case 5:
				$aux_tipo= "Vendedores-Individual";
				break;
			case 6:
				$aux_tipo= "Ciudad";
				break;	
			case 7:
				$aux_tipo= "Evento";
				break;			
		}
	 ?>
      <tr>
        <td><?php echo $aux_tipo;?></td>
        <td><?php echo $mensaje->mensajeContenido;?></td>
        
      </tr>
      <?php endforeach;?>
     <?php endif;?> 
    </table>

    
    
</div>
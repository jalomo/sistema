
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION-Registro</title>
  <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/form.js'; ?>"></script>
 <script>
$(document).ready(function(){
 
 $("#tipo_").change(function(event){
        event.preventDefault();
		idU=$(this).val();
		switch (idU) {
			case '1':
				$("#contenico_dep").empty();
			break;
			case '2':
				 url = $("#get_deposito").attr('href');
				 value_json = $.ajax({
					   type: "GET",
					   url:url,
					   async: false,
					   dataType: "html",
						success: function(data){
							$("#contenico_dep").empty();
							$("#contenico_dep").html(data);
							
						   }
					   }).responseText;
			break;
			
		}

    	});
	  
	   $("#save_user").submit(function(){
		   
		  
		   
		   
		   
		   
        var band = 0;
		var mai=0;
		
		
		
		if($("#usuarioNombre").val() == '' ){
            $("#usuarioNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioNombre").css("border", "1px solid #ADA9A5");
        }
		
		/*if($("#usuariodomicilio").val() == '' ){
            $("#usuariodomicilio").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuariodomicilio").css("border", "1px solid #ADA9A5");
        }
		*/
		if($("#usuarioTelefonno").val() == '' ){
            $("#usuarioTelefonno").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioTelefonno").css("border", "1px solid #ADA9A5");
        }
		
		if($("#usuarioPassword").val() == '' ){
            $("#usuarioPassword").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioPassword").css("border", "1px solid #ADA9A5");
        }
		
		if($("#usuarioEmail").val() == '' ){
            $("#usuarioEmail").css("border", "1px solid #FF0000");
            band++;
        }
        else{
			
			value_data = $.ajax({
               type: "POST",
               url:  url = $("#val_email").attr('href'),
			   data:{email:$("#usuarioEmail").val()},
        	   dataTypeString:'text',
               async: false,
			   success: function(data){
					
					if(data==1){
						 $("#errorMessage1").text("Email ya existe.").show();
						$("#usuarioEmail").css("border", "1px solid #FF0000");
						band++;	
					}else{
						 $("#usuarioEmail").css("border", "1px solid #ADA9A5");
					}	
						
				   }
               }).responseText; 
			
           
        }
		
		if($("#usuarioPassword2").val() == '' ){
            $("#usuarioPassword2").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioPassword2").css("border", "1px solid #ADA9A5");
        }
		
		if($("#usuarioPassword2").val() != $("#usuarioPassword").val() ){
            $("#usuarioPassword2").css("border", "1px solid #FF0000");
			 $("#usuarioPassword").css("border", "1px solid #FF0000");
			
            band++;
        }
        else{
			
            
        }
		
		
      
        if(band != 0){
            $("#errorMessage").text("Por favor, verifique los campos marcados.").show();
				
            return false;
        }
        else{
            $("#errorMessage").hide();
            var opt = {
                success : newEvento1
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });
	
	
	
	
	$("#pais_").change(function (event){
		event.preventDefault();
		id=$(this).val();
		
		
		 url = $("#get_estados").attr('href');
		value_json = $.ajax({
               type: "GET",
               url:url+"/"+id,
               async: false,
			   dataType: "html",
			    success: function(data){
						
						$("#carga_estados").empty();
						$("#carga_estados").html(data);
					
				   }
               }).responseText;
		
		
	});
	  
	  
});	

function newEvento1(opt){
    
    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);
	//$("#save_user").hide();
	window.location = "<?php echo base_url().'index.php/cliente/'; ?>";
	//$("#datos_").html(opt).show();
	
}

</script>
</head>
<body class="fondo_pantalla">
<?php echo anchor('companies/get_estados_cliente/', '', array('id'=>'get_estados', 'style'=>'display: none')); ?>

<?php echo anchor('cliente/validate_email_user/', '', array('id'=>'val_email', 'style'=>'display: none')); ?>
 
 
<?php echo anchor('cliente//', '', array('id'=>'get_deposito', 'style'=>'display: none')); ?>

<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12"> &nbsp;</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco"> <img src="<?php echo base_url();?>statics/bootstrap/img/logo_1.png"/></div>
        	
     
     </div>
    <div class="col-md-4">
    		
      <span class="bienvenido"> Bienvenido </span> &nbsp; &nbsp; &nbsp;   
    
    </div>
  </div>
  
  
  <div class="row show-grid">
    <div class="col-md-8">
    <br/><br/><br/><br/>
    <div id="datos_"></div>
    		<?php echo form_open('cliente/save_user', array('id'=>'save_user','role'=>'form')); ?>
            
             <div id="errorMessage" style="color: #FF0000; display: none"></div>
             <div id="errorMessage1" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
             
              <div class="row">
              <div class="col-xs-3">
                <label for="">Nombre</label><input type="text" class="form-control" placeholder="Introduce tu nombre" name="user[usuarioNombre]" id="usuarioNombre">
              </div>
              <div class="col-xs-4">
                <label for="">Sexo</label>
                	<select name="user[usuarioSexo]" class="form-control">
                    <option value="Hombre">Hombre</option><option value="Mujer">Mujer</option>
                    </select>
                
              </div>
              <div class="col-xs-5">
              <label for="">Email</label>
                <input type="text" class="form-control" placeholder="introduce tu Email" name="user[usuarioEmail]"  id="usuarioEmail" >
              </div>
            </div>
            
            <br/>
            
             <div class="row">
              <div class="col-xs-3">
                <label for="">País</label>
               <select  name="user[usuarioPais]" id="pais_" class="form-control">
            		<?php foreach($paises as $pais):?>
                    	<?php if($pais->id==42){?>
                    	<option value="<?php echo $pais->id?>" selected="selected"><?php echo $pais->nombre;?></option>
                        <?php }else{?>
                        <option value="<?php echo $pais->id?>" ><?php echo $pais->nombre;?></option>
                        <?php }?>
                    <?php endforeach;?>
                </select>
               
              </div>
              <div class="col-xs-4">
                <label for="">Estado</label>
                	 <div id="carga_estados">
                	<select  name="user[usuarioEstado]" class="form-control">
            		<?php foreach($estados as $estado):?>
                    	
                    	<option value="<?php echo $estado->id?>" selected="selected"><?php echo $estado->nombre;?></option>
                        
                    <?php endforeach;?>
                  </select>
                </div>
                
              </div>
              <div class="col-xs-5">
              <label for="">Ciudad</label>
                <select name="user[usuarioIdCiudad]" class="form-control">
            	<option value="0" selected="selected">Fuera de México</option>
            		<?php foreach($ciudades as $ciudad):?>
                    	
                    	<option value="<?php echo $ciudad->ciudadId?>" ><?php echo $ciudad->ciudadNombre;?></option>
                        
                    <?php endforeach;?>
                  </select>  
              </div>
            </div>
            
            <br/>
            
             <div class="row">
              <div class="col-xs-3">
                <label for="">Teléfono</label><input type="text" class="form-control" placeholder="Introduce tu teléfono" name="user[usuarioTelefonno]" id="usuarioTelefonno">
              </div>
              <div class="col-xs-4">
                
                <label for="">Contraseña</label><input type="text" class="form-control" placeholder="Contraseña" name="user[usuarioPassword]" id="usuarioPassword">
              </div>
              <div class="col-xs-5">
             <label for="">Repetir contraseña</label><input type="text" class="form-control" placeholder="Repetir contraseña" name="" id="usuarioPassword2">
              </div>
            </div>
              
              <br/>
              <br/>
              <button type="submit" class="btn btn-primary">Registrar</button>
            <?php echo form_close(); ?>
    		
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">CONTACTO</div>
            <div class="mensajes_ color_blanco" align="center">
            	<img src="<?php echo base_url();?>statics/bootstrap/img/info.png"/>
            </div>
    
    </div>
  </div>
  <div class="row show-grid">
    <div class="col-md-8" align="center">
    	
       
    
    </div>
    <div class="col-md-4"></div>
    
  </div>
  <div class="row show-grid">
    <div class="col-md-8">
    
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    	
     <!-- FIN DE ZONA DE CONTENIDO-->
    
    </div>
    <div class="col-md-4">
    
    </div>
  </div>
  
  
  
   <div class="row show-grid">
    <div class="col-md-12 color_blanco margen50" align="center" >
    <img src="<?php echo base_url();?>statics/bootstrap/img/footer.png"/>
    </div>
    
    
  </div>
  
  
  
</div>

</body>
</html>
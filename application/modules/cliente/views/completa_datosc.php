<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
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
		
		if($("#usuarioEmail").val() == '' ){
            $("#usuarioEmail").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioEmail").css("border", "1px solid #ADA9A5");
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
	//$("#datos_").html(opt).show();
	
}

</script>
 <?php echo anchor('companies/get_estados_cliente/', '', array('id'=>'get_estados', 'style'=>'display: none')); ?>
 
 
</head>
<body class="fondo_pantalla">

<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12"> &nbsp;</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco">
         <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         <img src="<?php echo base_url();?>statics/bootstrap/img/logo_1.png"/>
         </a>
        </div>
        
         <div class="" style="margin-top:20px" ><a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         inicio
         </a>
        
        </div>
        	
     
     </div>
    <div class="col-md-4">
    		
       <span class="bienvenido"> Bienvenido </span> &nbsp; &nbsp; &nbsp; <a href="<?php echo base_url().'index.php/cliente/logout';?>" ><button class="boton_salir" type="button">Salir</button>   </a> 
      <br/>
    
      		<a class=" menu_texto" href="<?php echo base_url().'/index.php/cliente/completa_datos'?>" >
            Mi perfil 
            </a> 
    
    </div>
  </div>
  
  
  <div class="row show-grid">
    <div class="col-md-8">
    
    		<div class="header_nombre color_blanco"><br/>&nbsp;&nbsp;
             <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/completa_datos'?>" >
			 <?php echo $usuario->usuarioNombre;?>
             </a>
             </div>
            <div class="header_banner "> <!--banner--><?php echo get_banner();?></div>
    		
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">MENSAJES</div>
            <div class="mensajes_ color_blanco">
            	
                
                 <?php if($mensajes!=0  || $mensajes!='0'):?>
            	<?php foreach($mensajes as $mensaje):?>
          	
                <?php if($mensaje->msjStatus==0):?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px;border-color: red; cursor:pointer; " id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                <?php else:?>
                
                    <div style="cursor:pointer;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                
                <?php endif;?>
                <hr/>
          <?php endforeach;?>
          <?php endif;?>
          
          <script>
		$(document).ready(function(){
            $(".abrir_ventana").click(function(event){
				event.preventDefault();
				id = $(event.currentTarget).attr('id');
				flag = $(event.currentTarget).attr('flag');
				url='<?php echo base_url()?>/index.php/cliente/ver_mesaje/'+id;
				url_data='<?php echo base_url()?>/index.php/cliente/cambiar_status/';
				
				
				value_json = $.ajax({
					   type: "POST",
					   url:url_data,
					   data: {id_post: id,id_user:flag},
					   async: false,
					   dataType: "html",
						success: function(data){
							$("#"+id).css({"border-color":"black"});
							
							window.open(url,"","width=200,height=100");
							
						   }
					   }).responseText;
				
				
				
			});
					
       });    	
        </script>
                
                
                
                
            </div>
    
    </div>
  </div>
  <div class="row show-grid">
    <div class="col-md-8" align="center">
    	
        <!--div class="btn-group btn-group-justified menu_" >
           <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >SERVICIOS</a>
          <a class="btn btn-default menu_texto">MIS COMPRAS</a>
          <a class="btn btn-default menu_texto">MIS PUNTOS CNX</a>
        </div>
        <div class="btn-group btn-group-justified menu_abajo">
        	 <a class="btn btn-default menu_servicios" href="#"></a>
              <a class="btn"></a>
              <a class="btn"></a>
        </div-->
    
    
    </div>
    <div class="col-md-4"></div>
    
  </div>
  <div class="row show-grid">
    <div class="col-md-8" align="center">
    
   
    
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    <div align="center" class="textos_al" >MIS DATOS</div>
   <?php echo form_open('cliente/editar_user/'.$usuario->usuarioId, array('id'=>'save_user','role'=>'form')); ?>
            
             <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
             
              <div class="row">
              <div class="col-xs-3">
                <label for="">Nombre</label>
                <input type="text"   name="user[usuarioNombre]" id="usuarioNombre" readonly class="form-control" value="<?php echo $usuario->usuarioNombre;?>"/>
              </div>
              <div class="col-xs-4">
                <label for="">Sexo</label>
                	<?php if(($usuario->usuarioSexo!="")){?>
            <?php //echo $usuario->usuarioSexo;?>
             <input type="text"   name="user[usuarioSexo]" id="usuarioSexo" readonly class="form-control" value="<?php echo $usuario->usuarioSexo;?>"/>
            <?php }else{?>
            <select  name="user[usuarioSexo]" class="form-control">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
            <?php }?>
                
              </div>
              <div class="col-xs-5">
              <label for="">Email</label>
                 <?php if(($usuario->usuarioEmail!="")){?>
                  <input type="text"   name="user[usuarioEmail]" id="usuarioEmail" readonly class="form-control" value="<?php echo $usuario->usuarioEmail;?>"/>
           
            <?php }else{?>
          	<input type="text" name="user[usuarioEmail]"  id="usuarioEmail" class="form-control" />
            <?php }?> 
              </div>
            </div>
            
            <br/>
            
             <div class="row">
              <div class="col-xs-3">
                <label for="">País</label>
                <?php if($usuario->usuarioPais!=0){?>
                 <input type="text"   name="" id="usuarioPais"  class="form-control" value="<?php echo $this->Company->get_name_pais($usuario->usuarioPais);?>"/>
                 <input type="hidden" name="user[usuarioPais]" value="<?php echo $usuario->usuarioPais;?>"/>
            <?php //echo $usuario->usuarioPais;?>
            <?php }else{?>
            
            	<select name="user[usuarioPais]" id="pais_" class="form-control">
            		<?php foreach($paises as $pais):?>
                    	<?php if($pais->id==42){?>
                    	<option value="<?php echo $pais->id?>" selected="selected"><?php echo $pais->nombre;?></option>
                        <?php }else{?>
                        <option value="<?php echo $pais->id?>" ><?php echo $pais->nombre;?></option>
                        <?php }?>
                    <?php endforeach;?>
                </select>
                <?php }?>
               
              </div>
              <div class="col-xs-4">
                <label for="">Estado</label>
                	 <?php if($usuario->usuarioEstado!=0){?>
                      <input type="text"    id="usuarioEstado"  class="form-control" value="<?php echo $this->Company->get_name_estado($usuario->usuarioEstado);?>"/>
                      
                       <input  type="hidden" name="user[usuarioEstado]" id="usuarioEstado"  class="form-control" value="<?php echo $usuario->usuarioEstado;?>"/>
					<?php //echo $usuario->usuarioEstado;?>
                    <?php }else{?>
                        <div id="carga_estados">
                            <select name="user[usuarioEstado]" class="form-control">
                            <?php foreach($estados as $estado):?>
                                
                                <option value="<?php echo $estado->id?>" selected="selected"><?php echo $estado->nombre;?></option>
                                
                            <?php endforeach;?>
                          </select>
                        </div>
                     <?php }?> 
                
              </div>
              <div class="col-xs-5">
             
                <?php if($usuario->usuarioIdCiudad!=0){?>
            
            <?php }else{?>
           <label for="">Ciudad</label>
          	<select name="user[usuarioIdCiudad]" class="form-control">
            	<option value="0" selected="selected">Fuera de México</option>
            		<?php foreach($ciudades as $ciudad):?>
                    	
                    	<option value="<?php echo $ciudad->ciudadId?>" ><?php echo $ciudad->ciudadNombre;?></option>
                        
                    <?php endforeach;?>
                  </select>  
             <?php }?>  
              </div>
            </div>
            
            <br/>
            
             <div class="row">
              <div class="col-xs-3">
                <label for="">Teléfono</label><input type="text" class="form-control" placeholder="Introduce tu teléfono" name="user[usuarioTelefonno]" id="usuarioTelefonno" value="<?php echo $usuario->usuarioTelefonno;?>">
              </div>
              <div class="col-xs-4">
                
                <label for="">Contraseña</label><input type="text" class="form-control" placeholder="Introduce tu teléfono" name="user[usuarioPassword]" id="usuarioPassword"  value="<?php echo $usuario->usuarioPassword;?>">
              </div>
              <div class="col-xs-5">
             <!--label for="">Repetir contraseña</label><input type="text" class="form-control" placeholder="Introduce tu teléfono" name="" id="usuarioPassword2"-->
              </div>
            </div>
              
              <br/>
              <br/>
              <button type="submit" class="btn btn-primary">Editar</button>
            <?php echo form_close(); ?>
       
     <!-- FIN DE ZONA DE CONTENIDO-->
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">CONTACTO</div>
            <div class="mensajes_ color_blanco" align="center">
            	<img src="<?php echo base_url();?>statics/bootstrap/img/info.png"/>
            </div>
    
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
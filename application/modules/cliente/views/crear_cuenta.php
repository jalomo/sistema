
<style>
@font-face {
    font-family: "nexa-bold";
    src: url("../../companies/css/font/Nexa Bold.otf");
}

@font-face {
    font-family: "nexa-light";
    src: url("../../companies/css/font/Nexa Light.otf");
}

@font-face {
    font-family: "Hiru";
    src: url("../../companies/css/font/HirukoBlackAlternate.ttf") ;
}

.font-nexa{
font-family:nexa-light;
}

.font-nexa-bold{
font-family:nexa-bold;
}

.font-hiru{
font-family:Hiru;
}
.contenido_{
	width:100%;
	height:100%;
	/*background:#fff;*/
	}
.contenido_p{
	width:1024px;;
	height:1500px;;
	/*background:#fff;*/
	
	}	
.conten-{
	height:800px;
	width:800px;
	/*background:#fff;*/
	
	/*box-shadow: 3px 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px 3px #bdc3c7;*/
	}	
	
.cuadritos{
	width:200px;
	height:300px;
	background:#95a5a6;
	margin-left:10px;
	border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */


 box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;
	}
	
.cuadritos_con{
	width:200px;
	height:200px;
	margin-left:10px;/*
	background:#95a5a6;
	
	border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
/*-webkit-border-radius:5px; /* Safari y Chrome */

/*
 box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;*/
	}	
	
	
.header-1{
	height:50px;
	/*background:#ecf0f1;*/
	}	
	
.float-left{ float:left;}
.limpiar-div{ clear:both;}	

.slider-{ height:200px; background:#909}

.menu-1{ width:170px; height:50px; background:#fff; margin-left:10px;
		border:1px;
		border-style:solid;
		cursor:pointer;
		border-color:#bdc3c7 #bdc3c7 #fff #bdc3c7;
		border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */}
.menu-cotenido-{ height:500px; /*background:#bdc3c7;*/}		

.menu-seleccionado{ background:#95a5a6 ; border-color:#bdc3c7 #bdc3c7 #95a5a6 #bdc3c7;}

.menu-1:hover{background:#95a5a6 }
.color-azul{ color:#34495e;}
.color-blanco{ color:#fff;}
.cursor-pointer{ cursor:pointer;}
.eventos-{
	height:300px;
	background:#CCC;
	overflow-y: auto; 
	}
.servicios_{ color:##1abc9c; font-size:18px;}

#mis_eventos_,#itinerario_,#servicios_,#puntos_,#contenido_alojamiento,#contenido_trasporte,#contenido_alimentos,#contenido_eventos{ display: none}	


.texto_login{ font-family: "Helvetica-ExtraCompressed";
    font-size: 20pt;
	color:#636363;
	
	width:200px;
	 height:40px; border-radius: 10px;
	 background:#a6a5a5 ; text-align:center;
	}  


</style>
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
	$("#save_user").hide();
	$("#datos_").html(opt).show();
	
}

</script>
 <?php echo anchor('companies/get_estados_cliente/', '', array('id'=>'get_estados', 'style'=>'display: none')); ?>
 
 
<?php echo anchor('cliente//', '', array('id'=>'get_deposito', 'style'=>'display: none')); ?>
<div class="contenido_" align="center">
	<div class="contenido_p" >
    	<div class="conten-  fondo_registro float-left">
        	<div class="header-1">
            	<div align="left">
                	<span class="font-helvetica color-azul"</span>
                </div>
            	
            </div>
        	
            <div class="slider-">
             <?php echo img(array('src'=>'statics/img/prueba.png')); ?>
            </div>
            <br/>
            
            <div class="limpiar-div"></div>
            <div class="menu-cotenido-" id="" align="justify">
             
             <div id="datos_"></div>
             <?php echo form_open('cliente/save_user', array('id'=>'save_user')); ?>
    <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
    	<table width="500" border="0" >
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;" name="user[usuarioNombre]" id="usuarioNombre" class="texto_login"/></td>
             <td align="right"><span style="font-size:18px;color:#808080"> Sexo:</span></td>
            <td> <select style="width:300px; height:30px;" name="user[usuarioSexo]" class="texto_login"><option value="Hombre">Hombre</option><option value="Mujer">Mujer</option></select></td>
          </tr>
          <tr>
            <td align="right"></td>
            <td></td>
            <td align="right"><span style="font-size:18px;color:#808080"> País:</span></td>
            <td>
            	<select style="width:300px; height:30px;" name="user[usuarioPais]" id="pais_" class="texto_login">
            		<?php foreach($paises as $pais):?>
                    	<?php if($pais->id==42){?>
                    	<option value="<?php echo $pais->id?>" selected="selected"><?php echo $pais->nombre;?></option>
                        <?php }else{?>
                        <option value="<?php echo $pais->id?>" ><?php echo $pais->nombre;?></option>
                        <?php }?>
                    <?php endforeach;?>
                </select>
               </td>
          </tr>
          
          
          
          
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Telefono:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="user[usuarioTelefonno]" id="usuarioTelefonno"  class="texto_login"/></td>
            <td align="right"><span style="font-size:18px;color:#808080"> Estado:</span></td>
            <td> 
                <div id="carga_estados">
                	<select style="width:300px; height:30px;" name="user[usuarioEstado]" class="texto_login">
            		<?php foreach($estados as $estado):?>
                    	
                    	<option value="<?php echo $estado->id?>" selected="selected"><?php echo $estado->nombre;?></option>
                        
                    <?php endforeach;?>
                  </select>
                </div>
            
           	 </td>
          </tr>
          
          
          <tr>
         <td align="right"><span style="font-size:18px;color:#808080"> Ciudad:</span></td>
          <td>
          	<select style="width:300px; height:30px;" name="user[usuarioIdCiudad]" class="texto_login">
            	<option value="0" selected="selected">Fuera de México</option>
            		<?php foreach($ciudades as $ciudad):?>
                    	
                    	<option value="<?php echo $ciudad->ciudadId?>" ><?php echo $ciudad->ciudadNombre;?></option>
                        
                    <?php endforeach;?>
          </td>
          
          
          
          
          <td align="right"><span style="font-size:18px;color:#808080"> Email:</span></td>
          <td>
          	<input type="text" style="width:300px; height:30px;" name="user[usuarioEmail]"  id="usuarioEmail" class="texto_login" />
          </td>
          
          
          </tr>
          
        </table>
	
    
    <table width="100%" border="0">
      <tr>
        <td>
        	
             <input type="image"  src="<?php echo base_url().'/statics/img/btn_registrate.png'?>" name=""  type="submit" value="save">
        </td>
        <td align="right"></td>
      </tr>
    </table>
 <?php echo form_close(); ?>
           
            
            
            
            
            
            </div>
            
            
           
          
        
        </div>
        
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         	 <?php echo img(array('src'=>'statics/img/barra contacto.png')); ?>
                 	
	
	
         
         
         </div>
    </div>

</div>
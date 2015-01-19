
<style>
@font-face {
    font-family: "nexa-bold";
    src: url("../css/font/Nexa Bold.otf");
}

@font-face {
    font-family: "nexa-light";
    src: url("../css/font/Nexa Light.otf");
}

@font-face {
    font-family: "Hiru";
    src: url("../css/font/HirukoBlackAlternate.ttf") ;
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
	width:1024px;
	
	/*background:#fff;*/
	
	}	
.conten-{
	height:1100px;
	width:800px;
	/*background:#fff;
	box-shadow: 3px 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px 3px #bdc3c7;*/
	}	
	
.cuadritos{
	width:200px;
	height:300px;
	margin-left:10px;
	/*background:#95a5a6;
	
	border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
/*-webkit-border-radius:5px; /* Safari y Chrome */

/*
 box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;*/
	}
	
.cuadritos_con{
	width:200px;
	height:200px;
	margin-left:10px;
	/*background:#95a5a6;
	
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
	background:#ecf0f1;
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
.menu-cotenido-{ height:500px; background:#bdc3c7;}		

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
	  
	   $("#save_servicio").submit(function(){
        var band = 0;
		
		
		 if($("#image1").val() == '' ){
            $("#image1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#image1").css("border", "1px solid #ADA9A5");
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
	  
	  
});	

function newEvento1(){
    
    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);
	
}

</script>
<?php echo anchor('cliente/get_deposito/', '', array('id'=>'get_deposito', 'style'=>'display: none')); ?>
<div class="contenido_" align="center">
	<div class="contenido_p" >
    	<div class="conten- float-left">
        	<div class="header-1">
            	<div align="left">
                	<span class="font-helvetica color-azul"><?php echo $usuario->usuarioNombre;?></span>
                </div>
            	
            </div>
        	
            <div class="slider-">
             <?php echo img(array('src'=>'statics/img/prueba.png')); ?>
            </div>
            <br/>
            
            <div class="limpiar-div"></div>
            <div class="menu-cotenido-" id="" align="justify">
              <?php echo form_open_multipart('cliente/save_servicio_deposito', array('id'=>'save_servicio')); ?>
              <div id="errorMessage" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
            
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Nombre del servicio:<?php echo $servicio->servicioNombre;?></span>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px;  margin-left:50px;">Costo del servicio:<?php echo $servicio->servicioCosto;?></span>
            <br/>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Datos del deposito:</span>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Banco:</span>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">A nombre de:</span>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Número de cuenta:</span>
            
            <hr/>
            
          <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;"> vendedor : <input type="text" name="save[suIdVendedor]"/></span>
            
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">
            <!--select name="" id="tipo_">
            	<option value="1">Apartar</option>
                <option value="2">Subir ficha de deposito</option>
            </select-->
            </span>
            
           <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">
            <div id="contenico_dep">
            
            </div>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">
            Subir ficha:
           <?php echo  form_upload(array('id'=>'image1',
                                         'class'=>'imagen',
                                         'name'=>'imagen',
                                          'value'=>''));?>
                                           </span>
            </span>
            <br/>
            
           <input type="hidden" name="save[suIdServicio]" value="<?php echo $servicio->servicioId;?>"/>
           <button type="submit" style="margin-left:50px; width:250px; height:40px; margin-top:35px; border-radius:10px; border:2px solid #2c3e50; font-size:25px; background:#2c3e50; color:#ecf0f1;">aceptar</button>
           
           <?php echo form_close(); ?>
            
            </div>
            
             <div class="menu-cotenido-" id="mis_eventos_">
             mis eventos
             </div>
             
              <div class="menu-cotenido-" id="itinerario_">
              mis boletos
             </div>
             <div class="menu-cotenido-" id="puntos_">
              mis puntos
             </div> 
           
          
        
        </div>
        <div class="cuadritos float-left">
        	 <?php echo img(array('src'=>'statics/img/barra mensajes.png')); ?>
        	<!--div align="center" class="color-azul font-helvetica">Mesajes</div>
            
            <?php for($i=0;$i<5;$i++):?>
            	<div class="font-helvetica color-blanco cursor-pointer"></div>
            <?php endfor;?> -->
        	
        	
        </div>
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         	<?php echo img(array('src'=>'statics/img/barra contacto.png')); ?>
	
	
         
         
         </div>
    </div>

</div>
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
	background:#fff;
	}
.contenido_p{
	width:1024px;;
	height:1500px;;
	background:#fff;
	
	}	
.conten-{
	height:1100px;
	width:800px;
	background:#fff;
	box-shadow: 3px 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px 3px #bdc3c7;
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
	background:#95a5a6;
	margin-left:10px;
	border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */


 box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;
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
	  
	   $("#save_evento").submit(function(){
        var band = 0;
		
		
		/* if($("#image1").val() == '' ){
            $("#image1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#image1").css("border", "1px solid #ADA9A5");
        }*/
       
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
	  
	  
	  $("#obtenerTotal").click(function(){
		  
      var total = 0;
            $(':checkbox:checked.precio_chek').each(function () {
                total += +this.id;
            });
            $("#total_").text('$'+total);

		
      	
		
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
              <?php echo form_open_multipart('cliente/save_compra', array('id'=>'save_evento')); ?>
              <div id="errorMessage" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
            
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Nombre del evento:<?php echo $evento->eventoNombre;?></span>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px;  margin-left:50px;">Costo del evento:<?php echo $evento->eventoPrecioBase;?></span>
            
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Lugares disponibles:<?php echo $evento->eventoLugares;?></span>
            <br/>
            <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;">Punto conexion:<?php echo $evento->eventoPuntos;?></span>
            <br/>
        <input type="checkbox" name="" value=""  id="<?php echo $evento->eventoPrecioBase;?>" class="precio_chek">  
            
            <hr/>
            
          <span class="font-helvetica color-azul" style="font-size:18px; margin-left:50px;"> vendedor : <input type="text" name="save[euIdVendedor]"/></span>
            
            <br/>
            
            <hr/>
            modificadores:
            <br/>
           
            <?php foreach($modificadores as $modificador):?>
            	<table width="800">
                	<tr>
                    	<td width="200">
                        	<input type="checkbox" name="modificadores[]" value="<?php echo $modificador->modificadorId;?>"  id="<?php echo $modificador->modificadorPrecio;?>" class="precio_chek" > <?php echo $modificador->modificadorNombre;?>
                        </td>
                        <td width="100">
                        	Precio: <?php echo $modificador->modificadorPrecio;?>
                        </td>
                        <td width="100">
                        	Puntos conexion: <?php echo $modificador->modificadorPuntos;?>
                        </td>
                    </tr>
                </table>
                <hr/>
            <?php endforeach;?>
            
            <br/>
            <div align="right" style="margin-right:100px;">
          <button  type="button"  id="obtenerTotal">obtener total</button><span id="total_"></span><input  type="hidden" id="total_todo"/>
            </div>
            
           
            
            <select id="tipo_"  name="" >
            	<option value="1">Apartar</option>
                <option value="2">Subir ficha</option>
            </select>
            
            <br/>
            <div id="contenico_dep"></div>
            
           <input type="hidden" name="save[euIdEvento]" value="<?php echo $evento->eventoId;?>"/>
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
        	<div align="center" class="color-azul font-helvetica">Mesajes</div>
            
            <?php for($i=0;$i<5;$i++):?>
            	<div class="font-helvetica color-blanco cursor-pointer">texto mensaje...</div>
            <?php endfor;?>
        	
        </div>
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         	 <div class="font-helvetica color-blanco cursor-pointer">Contactanos:</div>	
             <br/>
         	<div class="font-helvetica color-blanco cursor-pointer">Avenida Tepeyac #5920-5 Zapopan,Jal.</div>	
            <br/>
            <div class="font-helvetica color-blanco cursor-pointer">(33)1368-8265</div>	
            <br/>
            <div class="font-helvetica color-blanco cursor-pointer">contacto@conexiongdl.com</div>	
                 	
	
	
         
         
         </div>
    </div>

</div>
<style>
.myButton {
	-moz-box-shadow: 0px 10px 14px -7px #276873;
	-webkit-box-shadow: 0px 10px 14px -7px #276873;
	box-shadow: 0px 10px 14px -7px #276873;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3498db), color-stop(1, #3498db));
	background:-moz-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:-webkit-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:-o-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:-ms-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:linear-gradient(to bottom, #3498db 5%, #3498db 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3498db', endColorstr='#3498db',GradientType=0);
	background-color:#3498db;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:arial;
	font-size:20px;
	font-weight:bold;
	padding:13px 32px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #3498db), color-stop(1, #3498db));
	background:-moz-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:-webkit-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:-o-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:-ms-linear-gradient(top, #3498db 5%, #3498db 100%);
	background:linear-gradient(to bottom, #3498db 5%, #3498db 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3498db', endColorstr='#3498db',GradientType=0);
	background-color:#3498db;
}
.myButton:active {
	position:relative;
	top:1px;
}

.proyec{
	font-size:20px;
	color:#2c3e50;
	}
.pedido{
	font-size:15px;
	color:#7f8c8d;
	}	
	
.nombre{
	font-size:20px;
	color:#3498db;
	}	
	
	
	
.overlay{
     display: none;
     position: absolute;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     background: #000;
     z-index:1001;
     opacity:.50;
     -moz-opacity: 0.75;
     filter: alpha(opacity=75);
}

.modal {
     display: none;
     position: absolute;
     top: 25%;
     left: 25%;
     width: 50%;
     height: 25%;
     padding: 16px;
     background: #fff;
     color: #333;
     z-index:1002;
     overflow: auto;
}	


.label_p {
    
    font-size: 25pt;
	color:#bdc2c6;
}
.tamano_{
	font-size:20px;
	color:#7f8c8d;}	
	
html,body{
      margin:0;
      padding:0;
      height:100%;
      border:none
   }
   
   
 #fondo_c{
	/* IE10 Consumer Preview */ 
background-image: -ms-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);

/* Mozilla Firefox */ 
background-image: -moz-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);

/* Opera */ 
background-image: -o-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);

/* Webkit (Safari/Chrome 10) */ 
background-image: -webkit-gradient(radial, center center, 0, center center, 506, color-stop(0, #FFFFFF), color-stop(1, #ECF0F1));

/* Webkit (Chrome 11+) */ 
background-image: -webkit-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);

/* W3C Markup, IE10 Release Preview */ 
background-image: radial-gradient(circle closest-corner at center, #FFFFFF 0%, #ECF0F1 100%);
	}
  
   
  .contenedorr01 { 

/* Otros estilos */ 
height:50px; width:195px; margin-top:10px; position:absolute; display: block; bottom: 0px; top: 1px;
background:#333333; 

}  
   
   
.contenedorr3 { 
border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */ 

/* Otros estilos */ 
background:#8c8c8c; height:50px; width:195px; margin-top:10px; position:absolute; display: block; bottom: 0px; top: 85px;
font-size:18px;
cursor:pointer;
} 
.contenedorr2 { 
border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */ 

/* Otros estilos */ 
background:#333333; height:50px; width:195px; margin-top:10px; position:absolute; display: block; bottom: 0px; top: 137px;
font-size:18px;
cursor:pointer;
}    
.contenedorr1 { 
border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */ 

/* Otros estilos */ 
background:#333333; height:50px; width:195px; margin-top:10px; position:absolute; display: block; bottom: 0px; top: 189px;
font-size:18px;
cursor:pointer;
}     
.contenedorr0 { 
border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
-webkit-border-radius:5px; /* Safari y Chrome */ 

/* Otros estilos */ 
background:#333333; height:50px; width:195px; margin-top:10px; position:absolute; display: block; bottom: 0px; top: 241px;
font-size:18px;
cursor:pointer;
}  

.contenedorr0:hover{ background:#8c8c8c;}
.contenedorr1:hover{ background:#8c8c8c;}
.contenedorr2:hover{ background:#8c8c8c;}
.contenedorr3:hover{ background:#8c8c8c;}




</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
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
													 
													 
							} 
				   }
               }).responseText;
		
		
       document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'
    });
	
	 $("#edita_eventos").submit(function(){
        var band = 0;
	
        if($("#eventoNombre1").val() == '' ){
            $("#eventoNombre1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoNombre1").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#datepicker1").val() ==''){
            $("#datepicker1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#datepicker1").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#eventoPrecioBase1").val() == ''){
            $("#eventoPrecioBase1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoPrecioBase1").css("border", "1px solid #ADA9A5");
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
	window.location = "<?php echo base_url()."index.php/companies/addEvento";?>";
}
  </script>

<!--script>
document.getElementById('light').style.display='block';
document.getElementById('fade').style.display='block'
</script-->
<table width="100%" height="100%" border="0" style="height:100%; display:table; position:absolute;">
  <tr height="100%">
    <td width="200px;" height="100%">
    <div style="display: block; height:100%; background:#333333; position:inherit;">
    <table width="200" border="0" height="100%" style="width:100%;">
    <tr>
    	<td>
        	 <div class="contenedorr01 font-helvetica" align="center" > 
        	 <?php echo img(array('src'=>'statics/img/logo_2.png',
                                 'width'=>'170px')); ?>
              </div>
        </td>
    </tr>
      <tr>
        <td>
         <div class="contenedorr3 font-helvetica" align="center" > 
         <div style="margin-top:10px;">
        <?php echo anchor('companies/addEvento','Eventos',
                                                  array('style'=>'margin-top:50px; color:#fff;text-decoration:none')); ?>  
         </div>                                          
        	
        </div>
        <div class="contenedorr2 font-helvetica" align="center" > 
        	 <div style="margin-top:10px;">
        	<?php echo anchor('companies/usuarios','Usuarios',
                                                  array('class'=>'', 'style'=>'margin-top:10px; color:#fff;text-decoration:none')); ?>  
             </div>                                     
         </div>
        <div class="contenedorr1 font-helvetica" align="center" > 
        	<div style="margin-top:10px; color:#fff;">
            
            
            	<?php echo anchor('companies/servicios','Servicios',
                                                  array('class'=>'', 'style'=>'margin-top:10px; color:#fff;text-decoration:none')); ?>  
            </div>
        </div>
        <div class="contenedorr0 font-helvetica" align="center" > 
        	<div style="margin-top:10px; color:#fff;">cerrar sesion</div>
        </div>
        </td>
      </tr>
      
    </table>

    </div>
    </td>
    <td id="fondo_c">
   

    
    <div style="background:#FFF; position:absolute; display: block; bottom: 0px; top: 20px; height:200px; width:900px;" class="font-helvetica">
    <span style=" font-size:24px;color:#808080">Crear evento</span>
   <?php echo anchor('companies/get_data_evento/', '', array('id'=>'get_id', 'style'=>'display: none')); ?>
   <?php echo form_open('companies/save_evento', array('id'=>'save_eventos')); ?>
    <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
    	<table width="500" border="0" >
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;" name="evento[eventoNombre]" id="eventoNombre"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Fecha:</span></td>
            <td><input type="text" style="width:300px; height:30px;" id="datepicker" name="evento[eventoFecha]"  /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Precio base:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="evento[eventoPrecioBase]" id="eventoPrecioBase" /></td>
          </tr>
        </table>
	
    
    <table width="100%" border="0">
      <tr>
        <td>
        	<button style="background:#8c8c8c; color:#fff; font-size:15px; width:200px; height:30px;">Guardar</button>
        </td>
        <td align="right"><!--button onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" style="background:#3498db; color:#fff; font-size:15px; width:200px; height:30px;">Añadir modificador</button--></td>
      </tr>
    </table>
 <?php echo form_close(); ?>
    
    </div>
     
    <div id="load_proyectos" align="center" style=" position:absolute; display: block; bottom: 0px; top: 250px; height:200px; width:900px;">
   
        <?php foreach($eventos as $evento):?>
        
            <div id="eliminar<?php echo $evento->eventoId; ?>">
            <table width="900" border="0">
              <tr>
                <td width="500">
                    <div class="font-helvetica proyec"><?php echo $evento->eventoNombre;?></div>
                    <br/>
                    <div class="font-helvetica pedido"><?php echo $evento->eventoFecha;?></div>
                    
                </td>
                <td width="150">
                    <div class="font-helvetica pedido">Precio base:<?php echo $evento->eventoPrecioBase;?></div>
                   
                </td>
                <td>
                 <?php echo anchor('companies',
                                                  img(array('src'=>'statics/img/editar.png',
                                                            'width'=>'50px')),
                                                  array('class'=>'editar_', 'id'=>$evento->eventoId)); ?>   
                             
                             
                    <?php echo anchor('companies/eliminar_evento/'.$evento->eventoId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'50px')),
                                                  array('id'=>'delete'.$evento->eventoId, 'class'=>'eliminar no_text_decoration', 'flag'=>$evento->eventoId)); ?>     
                                                  
                    <?php echo anchor('companies/ver_modificadores/'.$evento->eventoId,
                                                  img(array('src'=>'statics/img/ver.png',
                                                            'width'=>'50px')),
                                                  array('class'=>'')); ?>                                             
                                               
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <?php echo img(array('src'=>'statics/img/linea1.png')); ?>   
                </td>
                </tr>
            </table>
            </div>
          <?php endforeach;?>  
        </div>	
    
    
    
    </td>
  </tr>
</table>




   <!-- base semi-transparente -->
    <div id="fade" class="overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>
<!-- fin base semi-transparente -->
 
<!-- ventana modal -->  
	<div id="light" class="modal" style=" background:#ecf0f1;">
    	<!--a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">cerrar</a-->
      
       <div class="font-helvetica label_p" align="center">
       	Editar evento
       </div> 
       
        <?php echo form_open('companies/edita_evento', array('id'=>'edita_eventos')); ?>
        
        <div id="errorLoginData1" style="color: #FF0000; display: none"></div>
    <div id="successMessage1" style="color:#060; display: none">Evento guardado correctamente</div>
       <table width="70%" border="0" align="center">
         <tr>
            <td align="right"><span style="font-size:18px; color:#808080"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;" name="evento[eventoNombre]" id="eventoNombre1"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Fecha:</span></td>
            <td><input type="text" style="width:300px; height:30px;" id="datepicker1" name="evento[eventoFecha]"  /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Precio base:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="evento[eventoPrecioBase]" id="eventoPrecioBase1" /></td>
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
        <input type="hidden" id="id_evento" name="id_evento" />
      <?php echo form_close(); ?>                       
    </div>
<!-- fin ventana modal -->

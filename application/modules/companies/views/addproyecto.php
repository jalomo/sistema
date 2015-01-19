<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" type="text/javascript"></script-->
<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js" type="text/javascript"></script>
 <link rel='stylesheet' href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css"/>
<script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/jquery.watable.js'; ?>"></script>
<?php echo link_tag('statics/css/watable.css'); ?>



<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <!--link rel="stylesheet" href="/resources/demos/style.css"-->
  <script>
  $(function() {
	  ver_reporte();
	  
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
		
		 if($("#eventoLugares1").val() == ''){
            $("#eventoLugares1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoLugares1").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#eventoPuntos1").val() == ''){
            $("#eventoPuntos1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#eventoPuntos1").css("border", "1px solid #ADA9A5");
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
	
	
	
	
	
	
	$(".agregar_").click(function(event){
        event.preventDefault();
		aux_indice++;
		aux_radom=Math.floor((Math.random() * 1000) + 1);
        $( "#users tbody" ).append( '<tr id="prod_'+aux_indice+'">' +
								  '<td><?php  $this->Company->get_ciudades();?></td>' +
								  ' <td><input type="text" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" placeholder="Precio Hombre" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								  
								    ' <td><input type="text" name="mod[PrecioM][]" onkeypress="return justNumbers(event);" placeholder="Precio Mujer" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
									
									' <td><input type="text" name="mod[PrecioM][]" onkeypress="return justNumbers(event);" placeholder="Lugares" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								 
								  
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
  function newEvento1(){
    
    $("#successMessage1").fadeIn(1500);
    $("#successMessage1").fadeOut(3500);
	location.reload();
}

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;

return /\d/.test(String.fromCharCode(keynum));



}




function ver_reporte(){
       
     
        $('#tableresult').html('');
        w1 = $('#tableresult').WATable(
        {
          url: '<?php echo base_url()?>/index.php/companies/tabla_eventos/',
          pageSizes: [10,25,50,50,100,150,200,250],
          pageSize: 10,
          filter: true,
          debug: false,
          hidePagerOnEmpty: true,
         // columnPicker: true,
          preFill: true,
		  rowClicked: function(data) {      //Fires when a row is clicked (Note. You need a column with the 'unique' property).
                console.log('row clicked');   //data.event holds the original jQuery event.
                console.log(data);            //data.row holds the underlying row you supplied.
                                              //data.column holds the underlying column you supplied.
                                              //data.checked is true if row is checked.
                                              //'this' keyword holds the clicked element.
                if ( $(this).hasClass('adminId') ) {
                  data.event.preventDefault();
                  alert('You clicked userId: ' + data.row.adminId);
                }
				
				
				
				
				
				
            },
			
          dataCreated: function(data) {            
            var total = 0;
            try{                
                $.each(data.rows,function(index,value){
                    total = total + eval(value.amouont);
                });
            }catch(excp){
                
            }        
            $("#tableresult").css('height',eval($(".watable").css('height').replace('px',''))+38);
            //initViewNote();
            //desbloquear();
          }

          
        }).data('WATable');
		
		
    }   
  </script>
  
<style>
body{ background:#fff !important;
}

</style>  
  

 <div style=" bottom: 0px; top: 20px; height:200px; width:900px; margin-left:200px;" class="font-nexa">
    <span style=" font-size:24px;color:#808080">Crear evento</span>
   <?php echo anchor('companies/get_data_evento/', '', array('id'=>'get_id', 'style'=>'display: none')); ?>
   <?php echo form_open_multipart('companies/save_evento', array('id'=>'save_eventos')); ?>
    <div id="errorLoginData" style="color: #FF0000; display: none"></div>
    <div id="successMessage" style="color:#060; display: none">Evento guardado correctamente</div>
    	<table width="500" border="0"  class="font-nexa">
        
          <tr>
            <td align="right"><span style="font-size:18px; color:#808080" class="font-nexa"> Nombre:</span></td>
            <td><input type="text"  style="width:300px; height:30px;background-color: rgba(0,0,0,0.1); border:1px solid #333333;" name="evento[eventoNombre]" id="eventoNombre"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Fecha:</span></td>
            <td><input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333; " id="datepicker" name="evento[eventoFecha]"  /></td>
          </tr>
          <!--tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Precio base:</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1); border:1px solid #333333;" name="evento[eventoPrecioBase]" id="eventoPrecioBase" onkeypress="return justNumbers(event)" /></td>
          </tr-->
          <tr>
            <td align="right"><!--span style="font-size:18px;color:#808080" class="font-nexa"> Lugares:</span--></td>
            <td> <input  type="hidden" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333; " name="evento[eventoLugares]" id="eventoLugares" onkeypress="return justNumbers(event)"  value="0"/></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Puntos :</span></td>
            <td> <input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333; " name="evento[eventoPuntos]" id="eventoPuntos" onkeypress="return justNumbers(event)"  /></td>
          </tr>
          
          
           <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Imagen :</span></td>
            <td> 
            	<input type="file" name="image" id="image"/>
            </td>
          </tr>
          
          
          
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080" class="font-nexa"> Tipo de pago:</span></td>
            <td> 
              <input type="checkbox" name="evento[eventoPagoPaypal]" value="1">PayPal
              /<input type="checkbox" name="evento[eventoPagoDeposito]" value="1">Deposito
              /<input type="checkbox" name="evento[eventoPagoOxxo]" value="1">oxxo
              /<input type="checkbox" name="evento[eventoPagoContado]" value="1">Contado
            
            </td>
          </tr>
          
          
          
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080; " class="font-nexa"> Ciudad de salida :</span></td>
            <td> 
            
            
           <table id="users" class="">
                    <thead>
                      <tr class="ui-widget-header ">
                        <th>Nombre</th>
                        <th>Precio Hombre</th>
						<th>Precio Mujer</th>
                        <th>Lugares</th>
                         <th>
                         	<?php echo img(array('src'=>'statics/img/bt_agregar.png','id'=>'','class'=>'agregar_','style'=>'cursor:pointer;')); ?>
                         </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr id="prod_1">
                        <td><?php  $this->Company->get_ciudades();?></td>
                        <td><input type="text" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" placeholder="Precio Hombre" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>
						 <td><input type="text" name="mod[PrecioM][]"  onkeypress="return justNumbers(event);"placeholder="Precio Mujer" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>
                         
                         <td><input type="text" name="mod[PrecioM][]"  onkeypress="return justNumbers(event);"placeholder="Lugares" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>
                         
                        <td><?php echo img(array('src'=>'statics/img/bt_eliminar.png','id'=>'1','style'=>'cursor:pointer;','class'=>'delete_prod')); ?></td>
                      </tr>
                    </tbody>
                  </table>
            
            
            </td>
          </tr>
          
          
        </table>
	
    
    <table width="100%" border="0">
      <tr>
        <td>
        	<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Guardar</button>
        </td>
        <td align="right"><!--button onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'" style="background:#3498db; color:#fff; font-size:15px; width:200px; height:30px;">Añadir modificador</button--></td>
      </tr>
    </table>
 <?php echo form_close(); ?>
     <hr/> 
    </div>
    
    
   <div id="tableresult" style="width:795px; color:#000; margin-left:200px;   top: 350px; height:200px; width:900px; position:relative;" ></div>
    
    
    <!--div id="load_proyectos" align="center" style=" display: block; bottom: 0px; top: 300px; height:200px; width:900px; margin-left:210px;">
   
        <?php foreach($eventos as $evento):?>
        
            <div id="eliminar<?php echo $evento->eventoId; ?>">
            <table width="900" border="0">
              <tr>
                <td width="500">
                    <div class="font-nexa proyec"><?php echo $evento->eventoNombre;?></div>
                    <br/>
                    <div class="font-nexa pedido"><?php echo $evento->eventoFecha;?></div>
                    
                </td>
                <td width="150">
                    <div class="font-nexa pedido">Precio base:$ <?php echo $evento->eventoPrecioBase;?></div>
                   
                </td>
                <td>
                 <?php echo anchor('companies',
                                                  img(array('src'=>'statics/img/editar.png',
                                                            'width'=>'40px')),
                                                  array('class'=>'editar_', 'id'=>$evento->eventoId)); ?>   
                             
                             
                    <?php echo anchor('companies/eliminar_evento/'.$evento->eventoId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'40px')),
                                                  array('id'=>'delete'.$evento->eventoId, 'class'=>'eliminar no_text_decoration', 'flag'=>$evento->eventoId)); ?>     
                                                  
                    <?php echo anchor('companies/ver_modificadores/'.$evento->eventoId,
                                                  img(array('src'=>'statics/img/ver.png',
                                                            'width'=>'40px')),
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
        </div-->	
    
     
     
     
     
     
  

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
            <td align="right"><span style="font-size:18px;color:#808080"> Lugares:</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="evento[eventoLugares]" id="eventoLugares1" /></td>
          </tr>
          <tr>
            <td align="right"><span style="font-size:18px;color:#808080"> Puntos :</span></td>
            <td> <input type="text" style="width:300px; height:30px;" name="evento[eventoPuntos]" id="eventoPuntos1" /></td>
          </tr>
          <tr>
            <td align="center">
            	<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><button style="background:#bdc3c7; color:#fff; font-size:15px; width:200px; height:30px;" type="button">Cancelar</button></a>
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
   
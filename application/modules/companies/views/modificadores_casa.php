<script>
 $(function() {
$("#change_opciones").change(function (event){
		event.preventDefault();
		id=$(this).val();
		valores="";
		switch (id) {
			case '0':
				valores='';
				$("#carga_valores").empty();
			break;
			case '1':
				
				valores=' <input type="text" name="mod[Nombre][]" placeholder="Nombre" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/>&nbsp; &nbsp; '+
     '<input type="text" placeholder="Precio Hombre" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/>&nbsp; &nbsp; '+
	 '<input type="text" placeholder="Precio Mujer" name="mod[PrecioM][]" onkeypress="return justNumbers(event);" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/>';
					
			break;
			case '2':
				valores='<table id="users" class="">'+
                    '<thead>'+
                      '<tr class="ui-widget-header ">'+
                        '<th>Nombre</th>'+
                        '<th>Precio Hombre</th>'+
						'<th>Precio Mujer</th>'+
                         '<th>'+
                         	'<?php echo img(array('src'=>'statics/img/bt_agregar.png','id'=>'','class'=>'agregar_','style'=>'cursor:pointer;')); ?>'+
                         '</th>'+
                      '</tr>'+
                    '</thead>'+
                    '<tbody>'+
                      '<tr id="prod_1">'+
                        '<td><input type="text" name="mod[Nombre][]" placeholder="Nombre" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>'+
                        '<td><input type="text" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" placeholder="Precio Hombre" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>'+
						 '<td><input type="text" name="mod[PrecioM][]"  onkeypress="return justNumbers(event);"placeholder="Precio Mujer" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>'+
                        '<td><?php echo img(array('src'=>'statics/img/bt_eliminar.png','id'=>'1','style'=>'cursor:pointer;','class'=>'delete_prod')); ?></td>'+
                      '</tr>'+
                    '</tbody>'+
                  '</table>';
			break;
			
		}
		$("#carga_opciones").empty();
		$("#carga_opciones").html(valores);
		
		
		$(".agregar_").click(function(event){
        event.preventDefault();
		aux_indice++;
		aux_radom=Math.floor((Math.random() * 1000) + 1);
        $( "#users tbody" ).append( '<tr id="prod_'+aux_indice+'">' +
								  '<td><input type="text" name="mod[Nombre][]" placeholder="Nombre" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								  ' <td><input type="text" name="mod[PrecioH][]" onkeypress="return justNumbers(event);" placeholder="Precio Hombre" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								    ' <td><input type="text" name="mod[PrecioM][]" onkeypress="return justNumbers(event);" placeholder="Precio Mujer" style="width:100px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></td>' +
								 
								  
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
	
	
	
	
	
	
		
	$("#save_mod").submit(function(){
        var band = 0;
	
        if($("#change_opciones").val() == 0){
            $("#change_opciones").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#change_opciones").css("border", "1px solid #ADA9A5");
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
	
}	




var nav4 = window.Event ? true : false;
function justNumbers(evt){
// Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
var key = nav4 ? evt.which : evt.keyCode;
//alert(key);
return (key <= 13 || (key >= 48 && key <= 57) || key == 46  || key == 0);
}

</script>
<style>
body{ background:#fff !important;
}

</style> 

 <?php echo form_open('companies/save_mod_casa/', array('id'=>'save_mod')); ?> 
 
 
 <div class="font-nexa" style=" font-weight:bold;">
 	MODIFICADORES CASA
 </div>
 <br/>
 
 <div id="errorMessage1" style="color: #FF0000; display: none"></div>
    <div id="successMessage1" style="color:#060; display: none">Casa guardado correctamente</div>
 
<div>
Tipo:
<select id="change_opciones"  name="modificadorTipo" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
    <option value="0">Seleccione una opcion</option>
    <option value="1">Checkbox</option>
    <option value="2">Lista</option>
</select>

<input type="hidden" value="<?php echo $id_casa;?>" name="id_evento_id"/>

<br/>
<!--Puntos Conexion:<input type="text" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/-->

</div>

 <br/>
    
     <div id="carga_opciones" class="font-nexa"></div>
     
     <br/>
     <br/>
     
     
     <button type="submit">guardar</button>
     
<?php echo form_close(); ?>        
     
    
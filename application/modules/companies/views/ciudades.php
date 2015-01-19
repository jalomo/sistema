<script>
  $(function() {
   
	
	
    
 $("#crea_ciudad").submit(function(){
        var band = 0;
	
        if($("#ciudadNombre").val() == ''){
            $("#ciudadNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#ciudadNombre").css("border", "1px solid #ADA9A5");
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
	
	
	$(".eliminar").click(function(event){
        event.preventDefault();
        $.confirm({
                    'title'     : 'Eliminar ciudad',
                    'message'   : 'Desea eliminar la ciudad seleccionada?',
                    'buttons'   : {
                                    'Eliminar' : {
                                        'class' : 'blue',
                                        'action': function(){
                                            id = $(event.currentTarget).attr('flag');
                                            url = $("#delete"+id).attr('href');
                                            $("#eliminar"+id).slideUp();
                                            $.get(url);
                                        }
                                    },
                                    'Cancelar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
    });
	
	
	
	
  });
  function newEvento1(){
    
    $("#successMessage1").fadeIn(1500);
    $("#successMessage1").fadeOut(3500);
	location.reload();
	
}
</script>

<style>
body{ background:#fff !important;
}

</style>  
  
<div style="margin-left:220px;">
 <div id="errorMessage1" style="color: #FF0000; display: none"></div>
    <div id="successMessage1" style="color:#060; display: none">Banner guardado correctamente</div>
<?php echo form_open_multipart('companies/save_ciudades', array('id'=>'crea_ciudad')); ?>
 <span style=" font-size:24px;color:#808080" class="font-nexa">Ciudades</span>
<br/>
<br/>
<div class="font-nexa"></div>
<div>
	
</div>
<br/>
<div> Nombre de la ciudad:<input type="text" name="ciudad[ciudadNombre]"  id="ciudadNombre" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></div>


<div style="margin-top:50px;">

<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" type="submit">Guardar</button>
</div>
 <?php echo form_close(); ?>
 

</div>




<div id="load_proyectos" align="center" style=" display: block; bottom: 0px; top: 350px; height:200px; width:900px; margin-left:200px;">
		<?php if($ciudades!=0):?>
   		 <?php foreach($ciudades as $ciudad):?>
        
            <div id="eliminar<?php echo $ciudad->ciudadId; ?>">
            <table width="900" border="0">
              <tr>
                <td width="500">
                    <div class="font-nexa proyec"><?php echo $ciudad->ciudadNombre;?></div>
                    
                    
                </td>
                
                <td>
                 
                             
                             
                    <?php echo anchor('companies/delete_ciudad/'.$ciudad->ciudadId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'40px')),
                                                  array('id'=>'delete'.$ciudad->ciudadId, 'class'=>'eliminar no_text_decoration', 'flag'=>$ciudad->ciudadId)); ?>     
                                                  
                                                           
                                               
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
   		<?php endif;?>	
   		
   </div>	

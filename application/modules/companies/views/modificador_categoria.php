<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
 
  <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

<script>
  $(function() {
   
	 $( ".sortable" ).sortable({
    update: function(event, ui) {
        $(".ajax-loader").show();
            var orden = $(this).sortable('toArray').toString();
            $.ajax({
                url: '<?php echo base_url();?>index.php/companies/ordena_categoria',
                data: {"data": orden},
                type: 'post'
            }).done(function(data) {
        });
        $(".ajax-loader").hide();
    }
});
$( ".sortable" ).disableSelection();
	
    
 $("#crea_categoria").submit(function(){
        var band = 0;
	
        if($("#categoriaNombre").val() == ''){
            $("#categoriaNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#categoriaNombre").css("border", "1px solid #ADA9A5");
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
                    'title'     : 'Eliminar la categoria',
                    'message'   : 'Desea eliminar la categoria seleccionada?',
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
    <div id="successMessage1" style="color:#060; display: none">Categoria guardado correctamente</div>
<?php echo form_open_multipart('companies/save_categoria/'.$id_evento, array('id'=>'crea_categoria')); ?>
 <span style=" font-size:24px;color:#808080" class="font-nexa">Categoria</span>
<br/>
<br/>
<div class="font-nexa"></div>
<div>
	
</div>
<br/>
<div> Nombre de la categoria:<input type="text" name="categoria[categoriaNombre]"  id="categoriaNombre" style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;"/></div>


<div style="margin-top:50px;">

<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" type="submit">Guardar</button>
</div>
 <?php echo form_close(); ?>
 

</div>


<br/>

<div id="load_proyectos" class="sortable" align="center" style=" display: block; bottom: 0px; top: 350px; height:200px; width:900px; margin-left:200px;">
		<?php if($categorias!=0):?>
   		 <?php foreach($categorias as $categoria):?>
        
            <div id="elemento-<?php echo $categoria->categoriaId; ?>" class="ui-state-default">
            <table width="900" border="0">
              <tr>
                <td width="500">
                    <div class="font-nexa proyec"><?php echo $categoria->categoriaNombre;?></div>
                    
                    
                </td>
                
                <td>
                 
                             
                             
                    <?php echo anchor('companies/delete_categoria/'.$categoria->categoriaId,
                                                  img(array('src'=>'statics/img/eliminar.png',
                                                            'width'=>'40px')),
                                                  array('id'=>'delete'.$categoria->categoriaId, 'class'=>'eliminar no_text_decoration', 'flag'=>$categoria->categoriaId)); ?>     
                                                  
                                                           
                                               
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <hr/>
                </td>
                </tr>
            </table>
            </div>
          <?php endforeach;?>  
   		<?php endif;?>	
   		
   </div>	

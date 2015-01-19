<script>
  $(function() {
   
	
	
    
 $("#crea_banner").submit(function(){
        var band = 0;
	
        if($("#image1").val() == ''){
            $("#image1").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#image1").css("border", "1px solid #ADA9A5");
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
</script>

<style>
body{ background:#fff !important;
}

</style>  
  
<div style="margin-left:220px;">
 <div id="errorMessage1" style="color: #FF0000; display: none"></div>
    <div id="successMessage1" style="color:#060; display: none">Banner guardado correctamente</div>
<?php echo form_open_multipart('companies/save_banner', array('id'=>'crea_banner')); ?>
 <span style=" font-size:24px;color:#808080" class="font-nexa">Banner</span>
<br/>
<br/>
<div class="font-nexa">subir banner (800px * 200px)</div>
<div>
	<?php echo form_upload(array('id'=>'image1',
                                                         'class'=>'images',
                                                         'name'=>'image',
                                                         'value'=>'')); ?>
</div>
<br/>
<div> Link:<input type="text"  style="width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="link"/></div>


<div style="margin-top:50px;">

<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" type="submit">Guardar</button>
</div>
 <?php echo form_close(); ?>

</div>
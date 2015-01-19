$(document).ready(function(){
$("#save_user").submit(function(){
        var band = 0;
	
        if($("#usuarioNombre").val() == '' ){
            $("#usuarioNombre").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioNombre").css("border", "1px solid #ADA9A5");
        }
		
		 if($("#usuariodomicilio").val() ==''){
            $("#usuariodomicilio").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuariodomicilio").css("border", "1px solid #ADA9A5");
        }
		
		
		 if($("#usuarioTelefonno").val() == ''){
            $("#usuarioTelefonno").css("border", "1px solid #FF0000");
            band++;
        }
        else{
            $("#usuarioTelefonno").css("border", "1px solid #ADA9A5");
        }
		
		
		

        
        if(band != 0){
            $("#errorMessage").text("Por favor, verifique los campos marcados.").show();
				
            return false;
        }
        else{
            $("#errorMessage").hide();
            var opt = {
                success : newEvento
            }
            $(this).ajaxSubmit(opt);
            return false;
        }
    });
	
});	


function newEvento(){
    
    $("#successMessage").fadeIn(1500);
    $("#successMessage").fadeOut(3500);
	window.location = "http://localhost:8080/eventos/index.php/companies/ventas";
}



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
						$("#id_usuario").val(data.usuarioId);
						$("#usuarioNombre1").val(data.usuarioNombre);
						$("#usuariodomicilio1").val(data.usuariodomicilio);
						$("#usuarioTelefonno1").val(data.usuarioTelefonno);
						
													 
													 
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

getVal();

$( "#select-evento" ).change( getVal );

function getVal() {
  base = $("#makeboletos").attr("base");
 
   val = $( "#select-evento" ).val();
  
  //alert(singleValues)
        $.ajax({
           type: 'POST',
           data:{
            val:val
           },
           url: base+'index.php/companies/getBoletosAndCiudades',
           cache: false,
          success: function(data) {
            var jsonn = JSON.parse(data);
          options="";
           for (var i = 0; i < jsonn[0].ciudades.length; i++) {
             
               val = jsonn[0].ciudades[i].ciudad+"-"+jsonn[0].ciudades[i].hombres+"-"+jsonn[0].ciudades[i].mujeres;
               options+="<option value='"+val+"'>"+jsonn[0].ciudades[i].ciudad+"</option>";

           }

           modificadores="";
           eveFecha = jsonn[0].ciudades[0].fecha;

        if(jsonn[0].modificadores!="0"){

          for (var i = 0; i < jsonn[0].modificadores.length; i++) {
             
                if(jsonn[0].modificadores[i].tipo==1){
                  //check
                  //("id"=>$row->modificadorId,"nombre"=>$row->modificadorNombre,"hombres"=>$row->modificadorPrecio,"mujeres"=>$row->modificadorPrecioM,"tipo"=>$row->modificadorTipo);
                  value=jsonn[0].modificadores[i].id+"-"+jsonn[0].modificadores[i].nombre+"-"+jsonn[0].modificadores[i].hombres+"-"+jsonn[0].modificadores[i].mujeres;
                  modificadores+="<div><input flag=1 class='input-boletos' type='checkbox' name=chk[] value='"+value+"'/>"+jsonn[0].modificadores[i].nombre+"</div>";

                }
                else{
                  //list
                   aux1 = jsonn[0].modificadores[i].nombre;
                   aux2 = jsonn[0].modificadores[i].hombres;
                   aux3 = jsonn[0].modificadores[i].mujeres;



                   arraynombres = aux1.split("--");
                   arrayhombres = aux2.split("--");
                   arraymujeres = aux3.split("--");
                  

                   modificadores+="<div><select flag=2 class='input-boletos' name=slc[]><option value='0'>Options</option>";
                   for (var j = 0; j < arraynombres.length-1; j++) {
                      value=jsonn[0].modificadores[i].id+"-"+arraynombres[j]+"-"+arrayhombres[j]+"-"+arraymujeres[j];
                      modificadores+="<option  value='"+value+"'>"+arraynombres[j]+"</option>";
   
                     
                   }

                   modificadores+="</select></div>";

                }
           }

        }
      
          
       
           // var jsonn = JSON.parse(data);

            if(jsonn[0].boletos=="0"){
                $("#img-status").attr("src",base+"statics/img/eliminar.png");
                $('#cantidad').attr("disabled", true);
                $('#btn-generar').attr("disabled", true);
            }

            else{
              $("#img-status").attr("src",base+"statics/img/palomita.png");
              $('#cantidad').attr("disabled", false);
              $('#btn-generar').attr("disabled", false);
            }

            $("#cantidad-disponibles").html(jsonn[0].boletos);
            $("#select-ciudades").html("");
            $("#container-mod").html("");
            $("#select-ciudades").append(options);
            $("#container-mod").append(modificadores);

           // boletos = data[0];
            //ciudades = jsonn[1].ciudades;
           // alert(boletos);
           // alert(ciudades);


          }
   });

}

$("#form-print").on('submit', function(e){
  nada = this;
        e.preventDefault();
        if($("#cantidad").val()==""){
                 $.confirm({
                    'title'     : 'Faltan datos',
                    'message'   : 'Ingrese la cantidad de boletos',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
        }

        else{

           can = parseInt($("#cantidad").val());
           dis = parseInt($("#cantidad-disponibles").html());
              if(can>dis){
                    $.confirm({
                    'title'     : 'Boletos insuficientes',
                    'message'   : 'La cantidad de boletos a imprimir es mayor a la cantidad disponible.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
          }

          else{

               
  message="";             //
  sexo="";
  costo="";
  totalmod=0;
  divmod="";
  boletos = $("#cantidad").val();
  var jsonArr = [];
  if($("input[name=sex]:checked", "#form-print").val()=="1"){
     sexo="Hombre";
   }
  else{
    sexo="Mujer";
  }  
  


  str = $("#select-ciudades option:selected").val();

  array = str.split("-");
 
  if(sexo=="Hombre"){
    costo = array[1];
  }
  else{
    costo = array[2];
  }
  
 
  
  $(".input-boletos").each(function(){
      if($(this).attr("flag")=="1"){
         //check
         if($(this).is(':checked')){
           
            jsonArr.push({ mod: $(this).attr("value")});
            
         }
      }

      else{
        //select
        val = this.options[this.selectedIndex].value;
        if(val!="0"){
           jsonArr.push({ mod: this.options[this.selectedIndex].value});
         }


      }
  });
 
  
  for (var i = 0; i < jsonArr.length; i++) {
      if(i==0){
        divmod+="<div class='v-row'>Modificadores</div>";
      }
  
      
      str = jsonArr[i].mod;
     
      if(str!="0"){
      array = str.split("-");
      precio="";
     
      if(sexo=="Hombre"){
        precio=array[2];
        totalmod+= parseInt(array[2]);
      }
      else{
        precio=array[3];
        totalmod+= parseInt(array[3]);
      }

        divmod+="  <div class='v-row'>";
        divmod+="     <div class='v-cell cell-name'>" + array[1]+"</div><div class='v-cell cell-precio'> $"+precio+" </div>";
        divmod+="  </div>";
   }
       

  }
  
  subtotal = parseInt(costo) + totalmod;
  finaltotal = subtotal * boletos;
  message+="<div id='v-title'><p>Detalle de venta</p><div>";
  message+="<div id='v-table-evento'>"
  message+="  <div class='v-row'>Evento";
  message+="  </div>";
  message+="  <div class='v-row'>";
  message+="     <div class='v-cell cell-name'>" + $("#select-evento option:selected").text()+"</div><div class='v-cell cell-precio'> $"+costo+" </div>";
  message+="  </div>";
  message+=divmod;
  message+="  <div class='v-row'>Sub-total $" + subtotal;
  message+="</div>";
  message+="  <div class='v-row'>Boletos " + boletos ;
  message+="</div>";
  message+="  <div class='v-row' >Total a cobrar <span style='font-style:bold;margin-top:20px;'> $" + finaltotal +"</span>" ;
  message+="</div>";
  message+="</div>";

  

  var statesdemo = {
  state0: {
    html:message,
    buttons: { Modificar: false, Imprimir: true },
    focus: 1,
    submit:function(e,v,m,f){
      if(v){
        e.preventDefault();
        $("#hidden-total").val(subtotal);
        $("#hidden-fecha").val(eveFecha);
        nada.submit();
        $.prompt.close();
        base = $("#makeboletos").attr("base");

       
      }
      else{
        $.prompt.close();
      }
      
    }
  },

};

$.prompt(statesdemo);
               //


          
          }
        }
    });






   /* $("#btn-generar").click(function(){
        
        if($("#cantidad").val()==""){
            $.confirm({
                    'title'     : 'Faltan datos',
                    'message'   : 'Ingrese la cantidad de boletos',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
        }

        else{

          //submit
          can = parseInt($("#cantidad").val());
          dis = parseInt($("#cantidad-disponibles").html());
          if(can>dis){
                    $.confirm({
                    'title'     : 'Boletos insuficientes',
                    'message'   : 'La cantidad de boletos a imprimir es mayor a la cantidad disponible.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
          }

          else{

              vendedor = $("#makeboletos").attr("vendedor");
              ciudad = $("#select-ciudades").val();
              sexo= $("input[name='sex']:checked").val();
             
            
              cliente="0";
              val = $( "#select-evento" ).val();
              line = val.indexOf("-");
              ide = val.substring(line+1, val.length);
               alert(sexo + " ciudad "+ ciudad + " ev " + ide);
              cantidad = can;
              base = $("#makeboletos").attr("base");
              $.ajax({
              type: 'POST',
              url: base+'index.php/companies/restBoletos',
              data:{
              idevento:ide,
              cantidad:cantidad,

              },
              cache: false,
              success: function(data) {
              $("#cantidad").val("");
              window.open(base+'/index.php/companies/printBoletosVendedor/'+cantidad+"/"+ide+"/"+vendedor+"/"+cliente+"/"+ciudad+"/"+sexo);
              location.reload();
              
              }
           });

          }

        }
        
        

        

     });   */


	
	$(".eliminar").click(function(event){
        event.preventDefault();
        $.confirm({
                    'title'     : 'Eliminar Usuario',
                    'message'   : 'Desea eliminar el usuario seleccionado?',
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
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });
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

 
<style>
  .clean{
    clear: both;
  }

#v-table-evento{
  display: table;
  border-spacing: 5px;
  width: 100%;
}
.row {
  display: table-row;

  border:1px solid #ffffff;
  margin-left: 20px

}
.v-cell {
  display: table-cell;

}

.cell-name{
  width: 200px;

}

.cell-precio{
  width: 40%;
}

</style>


<div id="makeboletos" class="font-nexa" base="<?php echo(base_url())?>" vendedor="<?php echo($iduser);?>">


  <p>Generar boletos</p>
  <div >
      <form id="form-print" method="POST" action="<?php echo(base_url())?>index.php/companies/printPublicBoleto" target="_blank">
       <div id="selec-boletos">
         <div id="selec">
           <label>Eventos</label> 


             <select id="select-evento" name="evento" style="width:300px; height:40px; overflow-y:scroll;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
               
               <?php 
                    foreach ($boletosD as $evento) {
                      $idR = $evento["id"];
                      $idE = $evento["idEvento"];
                      $name = $evento["eventoNombre"];
                      $texto = $evento["texto"];

                      echo("<option value='$idR-$idE-$name-$texto'>$name</option>");

                    }
               ?>

             </select>


         </div>
         <div id="boletos-d">
              <p> <img id="img-status" src="<?php echo(base_url());?>statics/img/palomita.png" style="width:40px;"><span id="cantidad-disponibles"></span> Disponibles</p>
         </div>
        </div>

          <div id="selec-ciudades">
           <label>Ciudad</label> 


             <select id="select-ciudades" name="ciudad" style="width:300px; height:40px; overflow-y:scroll;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
               
      

             </select>


         </div>
       
        
         
        <div id="cant"><div>Cantidad<input type="number" name="cantidad" id="cantidad"   /></div></div>      
         
          <div id="radio-sex">
            <div><label>Hombre</label><input type="radio" name="sex" checked="checked" value="1"></div>
            <div><label>Mujer</label><input type="radio" name="sex" value="2"></div>
         </div>
         <div class="clean"></div>
         <div id="wrapper-mod">
           <div><label>Modificadores</label></div>
           <div id="container-mod">
               
           </div>
          
           
         </div>
       <div><input id="hidden-total" type="hidden" value="0" name="total" />
            <input id="hidden-fecha" type="hidden" value="0" name="fecha" /></div>
       <div id="btn"><input type="submit" id="btn-generar"   value="Generar" class="font-nexa"/></div>
  </form>
</div>   

        <div class='modal-detalle' style='display:none; height:250px;'>
                    <div class='container-detalle' user='0'>
                      
                    </div>

              


             </div>
<!-- fin ventana modal -->

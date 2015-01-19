$(document).ready(function(){

    getAddedCasas();
    checkCodigo();
    
    addMod();
    getComprobantes();
    check();
    
     $(".print-boletos").click(function(e){
          e.preventDefault()
          ide = $(this).attr("ide");
          total = $(this).attr("tot");
          imp = $(this).attr("imp");
          getCiudadesEvento(ide,total,imp);
         //promptPrint(ide,total,imp);
      }); 
     $('.do-toggle').toggle( 
        // Primer click
        function(e){ 
            
           cliente =  $(this).attr('user');
            $('#'+cliente).slideDown();
            $('#'+cliente + " .common:checkbox").switchbutton({checkedLabel: 'Listo',uncheckedLabel: 'Pendiente'}).change(function(){
                   status=0;
                   ($(this).prop("checked") ? status=1: status=2);
                   idU= $(this).attr("idU");
                   idT = $(this).attr("idT");
                   changeStatusTrans(status,idU,idT);      
              });
            e.preventDefault();
        }, // Separamos las dos funciones con una coma
      
        // Segundo click
        function(e){ 
            
            cliente = $(this).attr('user');
            $('#'+cliente).slideUp();
        e.preventDefault();
                  }
        
    );
    $('#codigo').val("");
   $(".open-modal").click(function(e){
    e.preventDefault();
     idEvento = $(this).attr("idEvento");
     evento = $(this).attr("evento");
     idUser = $(this).attr("userid");
     nameUser = $(this).attr("username");
     getDataServices(idUser,nameUser,idEvento,evento);

      


});



$(".modal-close").click(function(){
    event.preventDefault();
   $(".modal-service").css("display","none");
});

$(".cuarto-serv").click(function(){
   idcuarto = $(this).attr("idcuarto");
   idcasa = $(this).attr("idcasa");
   getServiciosCuarto(idcuarto,idcasa);
});

 

 $( ".select-status" ).change( changeStatusCliente );
  
  $(".create-boleto").click(function(){
      
      idr = $(this).attr("idrow");
      idu = $(this).attr("iduser");
      ide = $(this).attr("idevento");


      $.ajax({
           type: 'POST',
           url: base+'index.php/companies/generateBoletoCliente',
           cache: false,
           data:{
             idr:idr,
             idu:idu,
             ide:ide
           },
          success: function( data ) {
            var mesassage="";
            var myObject = JSON.parse(data);
            if(myObject[0].boletos=="inexistentes"){
              
                        $.confirm({
                          'title'     : 'Boletos no encontrados',
                          'message'   : 'No existen boletos, creados para el evento',
                          'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                             });
            }

            else if(myObject[0].boletos=="insuficientes"){
               
                                 $.confirm({
                                   'title'     : 'Boletos insuficientes',
                                    'message'   : 'Los boletos existentes para el evento son insuficiente. Dirijase al apartado de *Crear boletos* y genere los necesarios',
                                    'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                             });
            }

            else if(myObject[0].boletos=="suficientes"){
              alert("nuevo boleto");
                  window.open(base+'/index.php/companies/printBoletos/'+1+"/"+ide+"/"+0+"/"+idu+"/"+1+"/"+idr);
            }

            else{
              
              window.open(base+'/index.php/companies/rePrintBoleto/'+idr+"/"+ide+"/"+myObject[0].boletos+"/"+idu);
            }

         



          }
      });


  });

$( ".slc-status-cuarto" ).change( changeStatusCuarto );


});

function changeStatusCuarto(){
        val = $(".slc-status-cuarto").val();
        base = $("#cuartos-clientes").attr("base");
        status = $('.slc-status-cuarto option:selected').html();
       
      
       $.ajax({
           type: 'POST',
           url: base+'index.php/companies/changeStatusCuarto',
           cache: false,
           data:{
             values:val,
             sta:status
           },
          success: function( data ) {
            
          }
      });

}

function getCiudadesEvento(ide,total,imp) {
    base = $("#makeBoletos").attr("base");
    $.ajax({
           type: 'POST',
           url: base+'index.php/companies/getCiudadesEvento',
           cache: false,
           data:{
             ide:ide
           },
          success: function( data ) {
            
            promptPrint(ide,total,imp,data);
            /*var myObject = JSON.parse(data);
            alert(data);*/
           
           }
      });

}


function changeStatusCliente(){
        val = $(".select-status").val();
        base = $("#eventos-clientes").attr("base");
        status = $('.select-status option:selected').html();
       
      
       $.ajax({
           type: 'POST',
           url: base+'index.php/companies/changeStatusCliente',
           cache: false,
           data:{
             values:val,
             sta:status
           },
          success: function( data ) {
            
          }
      });
        
  }

function check(){
  flag = $("#makeboletos").attr("flag");
   if(flag=="1"){
         $.confirm({
              'title'     : 'Acción realizada',
              'message'   : 'Se han generado los boletos con éxito',
                    'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
       
 
   }
   
}

function checkCodigo(){
   $('#form-codigo').on('submit', function(e){
          event.preventDefault();
        var cd = $('#codigoo').val();
        len = cd.length;
        if (len == 4) {
            this.submit();
        }
        else{
              $.confirm({
              'title'     : 'Código inválido',
              'message'   : 'El código debe contener 4 cifras.',
                    'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
       
            return false;
        }
        
    });
}

function getDataServices(idUser,nameUser,idEvento,evento){
    base = $("#p-base").attr("base");
       $.ajax({
           type: 'POST',
           url: base+'index.php/companies/getServices',
           cache: false,
          success: function( data ) {
            setDataServices(data,idUser,nameUser,idEvento,evento);
            /*var myObject = JSON.parse(data);
            for(a=0;a<=myObject.length-1;a++){
                alert(myObject[a].nombre);

            }*/

          }
   });
}

function setDataServices(data,idUser,nameUser,idEvento,evento){
  servicios=""; 
  $(".container-modal").html("");
  base = $("#p-base").attr("base");
  servicios="<div><form method='post' action='"+base+"/index.php/companies/saveNewService'>";
  var myObject = JSON.parse(data);
  //alert(myObject[0].nombre);
  for(a=0;a<=myObject.length-1;a++){
  
      servicios+="<input type='checkbox' name='servicio[]' value='"+idUser+"-"+myObject[a].id+"-"+myObject[a].tipo+"-"+myObject[a].categoria+"'>"+myObject[a].nombre+"<br>";

  }

servicios+="<input type='hidden' name='evento' value='"+idEvento+"-"+evento+"'/><input type='submit' value='Agregar' style='margin-left:0px;margin-top:10px;'/></form></div>";

 $(".container-modal").append("<p>Servicios a agregar a  "+nameUser+ " <a style='background-image:url(/eventos/statics/img/close.png);text-decoration:none;' href='#' class='modal-close1'  rel='modal:close'>&nbsp&nbsp&nbsp</a></p>");
 $(".container-modal").append(servicios);


  $(".modal-service").modal({
    fadeDuration: 1000,
    fadeDelay: 0.1,
    escapeClose: false,
    clickClose: false,
    showClose: false
   });
}

function deleteMod(){
  base = $("#eventos-clientes").attr("base");
  user="";
  evento="";
  modid="";
  registro="";
  
      $(".mod-delete").click(function(event){
        event.preventDefault();
         user = $(this).attr("user");
         modid = $(this).attr("modid");
         evento = $(this).attr("evento");
         registro = $(this).attr("idr");
         idmoduser = $(this).attr("idmoduser");
         
        //doDeleteMod(modid,user,evento,registro,idmoduser);
       
        $.confirm({
                    'title'     : 'Eliminar modificador',
                    'message'   : 'Desea eliminar el modificador seleccionado?',
                    'buttons'   : {
                                    'Eliminar' : {
                                        'class' : 'blue',
                                        'action': function(){
                                           doDeleteMod(modid,user,evento,registro,idmoduser);
                                        }
                                    },
                                    'Cancelar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
    });    


}


function doDeleteMod(modid,user,evento,registro,idmoduser){

       base = $("#eventos-clientes").attr("base");
        $.ajax({
           type: 'POST',
           url: base+'index.php/companies/deleteMod',
           data:{
            modId:modid,
            usr:user,
            eve:evento,
            reg:registro,
            idmodusr:idmoduser
           },
           cache: false,
          success: function( data ) {
             var myObject = JSON.parse(data);
             res =  myObject[0].res;
             
                 
                 $("#registro-"+idmoduser).remove();

          }
   });
  
}

function getComprobantes(){
  
  base = $("#eventos-clientes").attr("base");
  sexo="";
  eventoid="";
  evento="";
  iduser="";
  idrow =""; 
  $(".addmod").click(function(event){
     event.preventDefault();
     var sexo = $(this).attr("sexo");
     var idevento = $(this).attr("idevento");
     var evento = $(this).attr("evento");
     var iduser = $(this).attr("iduser");
     var idrow = $(this).attr("idrow");

     
      $.ajax({
           type: 'POST',
           url: base+'index.php/companies/getComprobantes',
           data:{
             sex:sexo,
             ide:idevento,
            idu:iduser,
            idr:idrow
           },
           cache: false,
          success: function( data ) {
            // var myObject = JSON.parse(data);
              setComprobantes(data);


          }

          }); 
    });

}

function setComprobantes(data){
  $(".container-modal-extras").html("");
  base = $("#eventos-clientes").attr("base");
    $(".container-modal").html("");
   var myObject = JSON.parse(data);
   evento = myObject[0].evento;
   iniciales = myObject[0].iniciales;
   extras = myObject[0].extras;
   totaliniciales=0;
   precioevento=0;
   divtotal="";
   ficha="";
   divextras="";
   tipopago=evento[0].tipo;
   if(evento[0].tipo=="1"){
     tipopago="Depósito";
   }
   else if (evento[0].tipo=="2"){
      tipopago="PayPal";
   }
    
   else if(evento[0].tipo=="3"){
     tipopago="Oxxo";
   }
   else if(evento[0].tipo=="4"){
      tipopago="Contado";
   }
    

   divtipopago="";


   divevento="";
   divevento+="<div><p class='headers'>Evento</p></div>";
   divevento+="<div id='wrapper-evento-main'>"
   divevento+="  <div class='row'>"
   divevento+="    <div class='cell cell-name' ><p> "+evento[0].nombre+"</p></div>";
   divevento+="    <div class='cell cell-precio' ><p>$ "+evento[0].precio+"</p></div>";
   divevento+="  </div>";
   divevento+="</div>";
   precioevento = parseInt(evento[0].precio);

   value=evento[0].idr+"-"+evento[0].ide+"-"+evento[0].idu;

   if(evento[0].estatus=="0"){
      status="<select id='status-evento' ><option value='"+value+"' >Pagado</option ><option value='"+value+"' >Canceldo</option><option value='"+value+"' >Apartado</option><option selected='select' value='"+value+"'>No pago</option></select>";
   }
   else if (evento[0].estatus=="1"){
     status="<select id='status-evento' ><option selected='select' value='"+value+"'>Pagado</option><option value='"+value+"'>Canceldo</option><option value='"+value+"'>Apartado</option><option value='"+value+"'>No pago</option></select>";
   }

   else if (evento[0].estatus=="2"){
          status="<select id='status-evento' ><option value='"+value+"'>Pagado</option><option selected='select' value='"+value+"'>Canceldo</option><option value='"+value+"'>Apartado</option><option value='"+value+"'>No pago</option></select>";

   }

  else if (evento[0].estatus=="3"){
        status="<select id='status-evento' ><option value='"+value+"'>Pagado</option><option  value='"+value+"'>Canceldo</option><option selected='select' value='"+value+"'>Apartado</option><option value='"+value+"'>No pago</option></select>";

   }

   if(evento[0].ficha=="pendiente" || evento[0].ficha==""){
       ficha="sin ficha de depósito";
   }

   else{
    ficha="<a href='"+base+"/"+evento[0].ficha+"' target='_blank'>Comprobante de pago</a>";
   }

   diviniciales="";
   if(iniciales!="0"){
   diviniciales+="<div><p class='headers'>Modificadores</p></div>";
   diviniciales+="  <div id='wrapper-iniciales'>"
     for (var i = 0; i < iniciales.length; i++) {
      
         
         diviniciales+="  <div class='row'>"
         diviniciales+="    <div class='cell cell-name' ><p>"+iniciales[i].nombre+"</p></div>";
         diviniciales+="    <div class='cell cell-precio' ><p>$ "+iniciales[i].precio+"</p></div>";
         diviniciales+="  </div>";
         aux = parseInt(iniciales[i].precio);
         totaliniciales+= aux;
     }

      
      diviniciales+="</div>";

   }
   

   divextras="";



   total = totaliniciales + precioevento;

   if(extras!="0"){
        divextras="<div id='div-extras'><p>Modificadores extras</p>";
        divextras+="<select id='select-extras'>";
      for (var i = 0; i < extras.length; i++) {
         aux=i+1;
         value=extras[i].ticket
         divextras+="<option value='"+value+"'>Modificadores extras "+aux +"</option>";  
      }

      divextras+="</select></div>";


   }

   divtotal="<div class='total'><p> Total: $"+ total+"</p></div>";
   divtipopago="<div class='tipo-pago' ><p>Tipo de pago: "+ tipopago+ "&nbsp&nbsp Estatus:" +status+" &nbsp&nbsp"+ficha+" </p></div>";

   $(".container-modal").append(divevento);
   $(".container-modal").append(diviniciales);
   $(".container-modal").append(divtotal);
   $(".container-modal").append(divtipopago);
   $(".container-modal").append(divextras);
   
   $( "#status-evento" ).change(function() {
      option = $( "#status-evento option:selected" ).val();
      text = $( "#status-evento option:selected" ).text();
      
      changeStatusEvento2(option,text,base);
   });


   if(extras!="0"){
    option = $( "#select-extras option:selected" ).val();
    getModExtras(option,base);
   }

   $( "#select-extras" ).change(function() {
     option = $( "#select-extras option:selected" ).val();
      getModExtras(option,base)
   });


   $(".modal-service").modal({
    fadeDuration: 1000,
    fadeDelay: 0.1,
    escapeClose: false,
    clickClose: false,
    showClose: true
   });
  

}

function changeStatusEvento2(option,text,base){
   
    $.ajax({
           type: 'POST',
           url: base+'index.php/companies/changueStatusEvento2',
           data:{
             option:option,
             text:text
        
           },
           cache: false,
          success: function( data ) {

          }

          });


}

function getModExtras(option,base){

     $.ajax({
           type: 'POST',
           url: base+'index.php/companies/getModExtras',
           data:{
             ticket:option
        
           },
           cache: false,
          success: function( data ) {
           if(data!=0){
              setModExtras(data,base);
           }
             


          }

          });



}


function setModExtras(data,base){
  $(".container-modal-extras").html("");
    var myObject = JSON.parse(data);

    divextras="<div>";
    divtotal="";
    total;
    tipopago="";
    status="";
    ficha="";
    ticket="";
    divextras+="  <div id='wrapper-extras-extras'>";
    for (var i = 0; i < myObject.length; i++) {
      
         
         divextras+="  <div class='row'>"
         divextras+="    <div class='cell cell-name' ><p>"+myObject[i].modNombre+"</p></div>";
         divextras+="    <div class='cell cell-precio' ><p>$ "+myObject[i].modPrecio+"</p></div>";
         divextras+="  </div>";
         total=myObject[i].total;
         tipopago= myObject[i].tipo;
         status= myObject[i].estatus;
         ficha = myObject[i].ficha;
         ticket=myObject[i].ticket;
       
     }

     if(status=="0"){
      status="<select id='status-extras' ><option value='"+ticket+"'>Pagado</option><option value='"+ticket+"'>Cancelado</option><option value='"+ticket+"'>Apartado</option><option selected='select' value='"+ticket+"'>No pago</option></select>";
     }
     else if (status=="1"){
     status="<select id='status-extras' ><option selected='select' value='"+ticket+"'>Pagado</option><option value='"+ticket+"'>Cancelado</option><option value='"+ticket+"'>Apartado</option><option value='"+ticket+"'>No pago</option></select>";
     }

     else if (status=="2"){
          status="<select id='status-extras' ><option value='"+ticket+"'>Pagado</option><option selected='select' value='"+ticket+"'>Cancelado</option><option value='"+ticket+"'>Apartado</option><option value='"+ticket+"'>No pago</option></select>";
   
     }

     else if (status=="3"){
        status="<select id='status-extras' ><option value='"+ticket+"'>Pagado</option><option selected='select' value='"+ticket+"'>Cancelado</option><option selected='select' value='"+ticket+"'>Apartado</option><option value='"+ticket+"'>No pago</option></select>";

     }

   if(tipopago=="1"){
     tipopago="Depósito";
   }
   else if (tipopago=="2"){
      tipopago="PayPal";
   }
    
   else if(tipopago=="3"){
     tipopago="Oxxo";
   }
   else if(tipopago=="4"){
      tipopago="Contado";
   }

    if(ficha=="pendiente" || ficha==""){
       ficha="sin ficha de depósito";
   }

   else{
    ficha="<a href='"+base+"/"+ficha+"' target='_blank'>Comprobante de pago</a>";
   }



     divextras+="</div>";
     divtotal="<div class='total'><p> Total: $"+ total+"</p></div>";
     divtipopago="<div class='tipo-pago' ><p>Tipo de pago: "+ tipopago+ "&nbsp&nbsp Estatus:" +status+" &nbsp&nbsp"+ficha+" </p></div>";

     $(".container-modal-extras").append(divextras);
     $(".container-modal-extras").append(divtotal);
     $(".container-modal-extras").append(divtipopago);

   $( "#status-extras" ).change(function() {
      option = $( "#status-extras option:selected" ).val();
      text = $( "#status-extras option:selected" ).text();

      changeStatusExtras(option,text,base);
   });

}

function changeStatusExtras(option,text,base){
  
   
    $.ajax({
           type: 'POST',
           url: base+'index.php/companies/changeStatusExtras',
           data:{
             option:option,
             text:text
        
           },
           cache: false,
          success: function( data ) {
              
          }

          });


}

function addMod(){
  base = $("#eventos-clientes").attr("base");
  sexo="";
  eventoid="";
  evento="";
  iduser="";
  idrow =""; 

  $(".addmod2").click(function(event){

    event.preventDefault();
     var sexo = $(this).attr("sexo");
     var eventoid = $(this).attr("eventoid");
     var evento = $(this).attr("evento");
     var iduser = $(this).attr("iduser");
     var idrow = $(this).attr("idrow");
     
      $.ajax({
           type: 'POST',
           url: base+'index.php/companies/getMod',
           data:{
             sex:sexo,
             eve:eventoid,
            idu:iduser,
            idr:idrow
           },
           cache: false,
          success: function( data ) {
         
               var jsonObject = JSON.parse(data);
            var modexistentes = jsonObject[0].mod;
            var moduser = jsonObject[1].modu;

         if(modexistentes[0].modificadorId!="0"){            
              servicios=""; 
              modificadores="<div><p>Modificadores registrados</p></div>";
               $(".container-addmod").html("");
               servicios="<div>";
               //var myObject = JSON.parse(data);
  //alert(myObject[0].nombre);
            for(a=0;a<=modexistentes.length-1;a++){
                name = modexistentes[a].modificadorNombre;
                var pre = modexistentes[a].precio;
                select="<select class='slc-mod' name='modificador[]' selected='selected'><option value='0-0'>Option</option>";
                var modf;
                var precios;

                if(name.indexOf("-")!=-1){
                   modf = name.split("--");
                   precios = pre.split("--");
                   for (var i =0; i < modf.length-1; i++) {
                      precio=precios[i];
                     

                        value = eventoid+"-"+iduser+"-"+idrow+"-"+modexistentes[a].modificadorId + "-"+ modf[i]+ "-"+precio;
                        select+="<option value='"+value+"'>"+modf[i]+"</option>";
                   }

                   select+="</select></br>";
                  servicios+=select; 

                }

                else{
                  value = eventoid+"-"+iduser+"-"+idrow+"-"+modexistentes[a].modificadorId+"-"+modexistentes[a].modificadorNombre+"-"+modexistentes[a].precio;
                    servicios+="<input class='chk-mod' type='checkbox' name='modificador[]' value='"+value+"'/>"+modexistentes[a].modificadorNombre+"</br>";


                }
                  
                   
           }

        

        servicios+="<div style='margin-top:15px; margin-bottom:15px;'><input class='r-tipo' type='radio' name='r-tipo' value='1' checked='checked'/>Depósito <input class='r-tipo' type='radio' name='r-tipo' value='2' />PayPal <input class='r-tipo' type='radio' name='r-tipo' value='3' />Oxxo <input class='r-tipo' type='radio' name='r-tipo' value='4' />Contado</div>";

         servicios+="<div><input type='hidden' name='evento' value='"+evento+"-"+eventoid+"'/><input id='btn-add-mod' type='button' value='Agregar' style='margin-left:0px;margin-top:10px;'/></div></div>";
          $(".container-addmod").append("<p>Modificadores a agregar</p>");
          $(".container-addmod").append(servicios);
     

          
          $("#btn-add-mod").click(function(){
            var jsonArr = [];
            flag=0;
            pago=0;
              


               $(".chk-mod").each(function(){

                if($(this).is(':checked')) { 
                     jsonArr.push({
                     mod: $(this).val()
                   
                   }); 

                   flag=1;  
                } 

            
                   
               });

              $(".slc-mod").each(function(){
                   if($(this).val()!="0-0"){
                      
                        jsonArr.push({
                           mod: $(this).val()
                   
                        });
                        flag=1;
                   }

                   
               });

            $(".r-tipo").each(function(){

                if($(this).is(':checked')) { 
                
                   pago = $(this).val();
                   
                }

            });

        

           if(flag==1){
              saveAddedMod(jsonArr,pago,base);
               jsonArr=[];
               //alert("por agregar = " + jsonArr);
            }
           else{
              alert("No ha seleccionado modificadores para agregar");
           } 

          });
         


    $(".modal-addmod").modal({
      fadeDuration: 1000,
       fadeDelay: 0.1,
      escapeClose: false,
      clickClose: false,
       showClose: true


    });

    }

    else{

      $.confirm({
              'title'     : 'Sin modificadores',
              'message'   : 'No se encontraron modificadores para el evento',
                    'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });

    }
       }  
           
  
  
     });

  
    
    });
 
}

function saveAddedMod(jsonArr,pago,base) {
   
     $.ajax({
           type: 'POST',
           url: base+'index.php/companies/saveAddedMod',
           data:{
             mod:jsonArr,
             pago:pago
           
        
           },
           cache: false,
          success: function( data ) {
              if(data=="true"){
                alert("Se han agregado los modificadores");
              }


          }

    });


}

function promptPrint(ide,total,imp,data){

  var myObject = JSON.parse(data);
  select='<select name="ciudades" id="ciudades">';
  for (var i =0; i < myObject.length ; i++) {
      select+='<option value="'+myObject[i].ciudad+"-"+myObject[i].hombre+"-"+myObject[i].mujer+'">'+myObject[i].ciudad+'</option>';
  };

  select+="</select>";

var statesdemo = {
  state0: {
    title: 'Boletos a imprimir',
    html:'<label>Cantidad<input type="text" name="fname" value="" id="print-cantidad"></label><br />'+
        '<div class="radio"> '+ 
          '<input id="hombre" type="radio" name="gender" value="hombre" checked="checked"> ' +
         '<label for="hombre">Hombre</label> '+ 
         '<input id="mujer" type="radio" name="gender" value="mujer"> ' +
         '<label for="mujer">Mujer</label>  '+
       ' </div> '+
          '<label>'+select+'</label>',
        
     buttons: { "Aceptar": true, "Cancelar": false },
        submit: function(e,v,m,f){
    // use e.preventDefault() to prevent closing when needed or return false. 
    // e.preventDefault(); 

        //console.log("Value clicked was: "+ v);
        if(v==true){
           //doPrint(ide,total,imp);
           costo="";
           aux =  $( "#ciudades" ).val();
           array = aux.split("-");
           sexo = $('input[name=gender]:checked').val();
           if(sexo=="hombre"){
              costo= array[1];
           }
           else{
             costo = array[2];
           }

           doPrint(ide,total,imp,sexo,costo);

        }
       }
    },
   
    //
  
    //

  }


$.prompt(statesdemo);
}


function doPrint(ide,total,imp,sexo,costo){

  cantidad = $("#print-cantidad").val();
  disponibles = total-imp;

  if(cantidad>disponibles){

         $.confirm({
              'title'     : 'Boletos insuficientes',
              'message'   : 'La cantidad a imprimir es mayor a la cantidad de boletos disponibles',
                    'buttons'   : {
                                    
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
       
       
  }

  else{
        base = $("#makeBoletos").attr("base");
        cliente="0";
        vendedor = $("#makeBoletos").attr("user");;
        $.ajax({
           type: 'POST',
           url: base+'index.php/companies/restBoletos',
           data:{
            idevento:ide,
            cantidad:cantidad
           },
           cache: false,
          success: function(data) {
             var myObject = JSON.parse(data);
              impresos =  myObject[0].impresos;
              $("#evento-"+ide + " .p-impresos").html(impresos);
              window.open(base+'/index.php/companies/printBoletos/'+cantidad+"/"+ide+"/"+vendedor+"/"+cliente+"/"+sexo+"/"+costo);
              
          }
     });
  }
    
  
   


   
 // window.open('http://127.0.0.1/eventos//index.php/companies/printBoletos/');

}

function changeStatusTrans(status,idU,idT){
  base = $("#eventos-clientes").attr("base");
          $.ajax({
            type: 'POST',
            url: base+'index.php/companies/changeStatusTrans',
            data:{
              stat:status,
              iduser:idU,
              idtrans:idT
            },
            cache: false,
            success: function(data) {
            
              
          }
     });

}

function getAddedCasas(){

     base = $("#casas").attr("base");
          $.ajax({
            type: 'POST',
            url: base+'index.php/companies/getAddedCasas',
            cache: false,
            success: function(data) {
              createCasasCuartos(data,base);
              
          }
     });
}

function createCasasCuartos(data,base){
    base = $("#casas").attr("base");
   var myObject = JSON.parse(data);
   casasDiv="";
   cuartos="";
   for(a=0;a<myObject.length;a++){
      total=myObject[a].cuartos;
      if(total==0){
         cuartos= "<div><p>"+myObject[a].cuartos+"</p></div>";
      }

      else{
        cuartos="<div><p><a href='"+base+"index.php/companies/viewCuartos/"+myObject[a].casaId+"' class='view-cuartos'>"+myObject[a].cuartos+"</a></p></div>"

      }
       
      casasDiv+="<div class='eveboletos-container' id='casa-"+myObject[a].casaId+"'>"+
                                    "<div class='eveboletos'>"+
                                        "<div><p>"+myObject[a].casaNombre+"</p></div>"+
                                        cuartos+
                                        "<div><p><a href='#' class='delete-casa' idcasa='"+myObject[a].casaId+"'>Eliminar casa</a></p></div>"+
                                        "<div><p><a href='#' class='add-cuarto' idcasa='"+myObject[a].casaId+"'>Agregar cuarto</a></p></div>"+
                                    "</div>"+ 
                                    "<div class='mod-line'>"+
                                      "<img src='"+base+"statics/img/linea1.png"+"'>"+  
                                    "</div>"+ 
                                 "</div>";

   }

   $("#casas-cuartos").html(casasDiv);
   $(".delete-casa").click(function(event){
         event.preventDefault();
        idCasa = $(this).attr("idcasa");
        deleteCasa(idCasa);
       
   });

    $(".add-cuarto").click(function(event){
       event.preventDefault();
       idCasa = $(this).attr("idcasa");
       newCuarto(idCasa);
   });

}

function newCuarto(idcasa){

   hidden="<input type='hidden' name='idcasa' value='"+idcasa+"'/>";
   $("#cuarto_idcasa").html(hidden);
   base = $("#casas").attr("base");
          $.ajax({
            type: 'POST',
            url: base+'index.php/companies/getServicios',
            cache: false,
            success: function(data) {
              openModalCuarto(data);
              
          }
     });

 

  

}

function openModalCuarto(data){
    var myObject = JSON.parse(data);
   check="<div><p>Servicios</p></div><div id='chk-servicios'>";
   for (var i = 0; i <myObject.length; i++) {
      check+="<div>"+
                 "<input type='checkbox' name='cServicios[]' value='"+myObject[i].id+"' />"+myObject[i].nombre+
              "</div>";
   };
   check+="</div><div id='chk-clean'>&nbsp</div>";
   $("#cuarto_servicios").html(check);
   $(".modal-cuarto").modal({
    fadeDuration: 1000,
    fadeDelay: 0.1,
    escapeClose: false,
    clickClose: false,
    showClose: true
   });


}

function deleteCasa(idcasa){
           $.confirm({
                    'title'     : 'EConfirmar acción',
                    'message'   : '¿Eliminar la casa?',
                    'buttons'   : {
                                    'Eliminar' : {
                                        'class' : 'blue',
                                        'action': function(){
                                           doDeleteCasa(idcasa);
                                        }
                                    },
                                    'Cancelar' : {
                                        'class' : 'gray',
                                        'action': function(){}//do nothing
                                    }
                                  }
                  });
}

function doDeleteCasa(idcasa){
  base = $("#casas").attr("base");
  window.open(base+'/index.php/companies/deleteCasa/'+idcasa);

}

function getServiciosCuarto(idcuarto,idcasa){
     base = $("#cuartos-casa").attr("base");
          $.ajax({
            type: 'POST',
            data:{
              idc:idcuarto
            },
            url: base+'index.php/companies/getServiciosCuarto',
            cache: false,
            success: function(data) {
             // var myObject = JSON.parse(data);
              //alert(myObject.length);
              
              switchResult(data,idcuarto,idcasa);
              
          }
     });
  
  
}

function switchResult(data,idcuarto,idcasa){
   
   var myObject = JSON.parse(data);
   if(myObject[0].servicio==undefined){
      //alert("HAY SERVICIOS PERO EL CUARTO NO TIENE  SERVICIOS");
      setCuartoSinServicios(data,idcuarto,idcasa);
   }

   else{
      if(myObject[0].servicio=="0")
          alert("No hay servicios dados de alta");
       else
          setServiciosCuarto(data,idcuarto,idcasa);
   }
   /*serviciosDiv="<div><p>Servicios</p></div><div>";
   for (var i = 0; i < myObject.length; i++) {
       serviciosDiv+="<div><input type='checkbox' name='serv[]' value='"+myObject[i].
   }

  $(".modal-service").modal({
    fadeDuration: 1000,
    fadeDelay: 0.1,
    escapeClose: false,
    clickClose: false,
    showClose: true
   });*/

}

  function setCuartoSinServicios(data,idcuarto,idcasa){
    serv = [];
    jsonServ= [];
    var myObject = JSON.parse(data);
      serviciosDiv="<div><p>Servicios</p></div><div class='chk-serv'>";
    
      for (var i = 0; i < myObject.length; i++) {
          serviciosDiv+="<div><input type='checkbox' class='chk-item' name='serv[]' value='"+myObject[i].id+"'/>"+myObject[i].nombre+"</div>";
      }

      serviciosDiv+="<div><input type='submit' class='btn-save-serv' value='Guardar' style='margin-left:0px;margin-top:10px;'/></div></div>";
      $(".container-modal").html(serviciosDiv);
      $(".modal-service").modal({
        fadeDuration: 1000,
        fadeDelay: 0.1,
        escapeClose: false,
       clickClose: false,
       showClose: true
       });


      


      $(".btn-save-serv").click(function(event){
          event.preventDefault();
           $(".chk-serv .chk-item").each(function(){
               chk="0"; 
              if($(this).is(':checked')) {  
                  chk="1";  
               } else {  
                chk="0"; 
               } 

  

                serv.push({
                  idcuarto:idcuarto,
                  idcasa: idcasa,
                  idserv:$(this).attr("value"),
                  chk:chk
                 });

               
           });
            jsonServ=[];
            jsonServ = JSON.stringify(serv);
            serv=[];
            updateServCuarto(jsonServ);

      });

      
  }

  function setServiciosCuarto(data,idcuarto,idcasa){
 
    serv = [];
    jsonServ= [];
    var myObject = JSON.parse(data);
      serviciosDiv="<div><p>Servicios</p></div><div class='chk-serv'>";
    
      for (var i = 0; i < myObject.length; i++) {
          if(myObject[i].asignado=="1")
             serviciosDiv+="<div><input type='checkbox' class='chk-item' checked='checked' name='serv[]' value='"+myObject[i].id+"'/>"+myObject[i].servicio+"</div>";
          else
            serviciosDiv+="<div><input type='checkbox' class='chk-item' name='serv[]' value='"+myObject[i].id+"'/>"+myObject[i].servicio+"</div>";

      }

      serviciosDiv+="<div><input type='submit' value='Guardar' class='btn-save-serv' style='margin-left:0px;margin-top:10px;'/></div></div>";
      $(".container-modal").html(serviciosDiv);
      $(".modal-service").modal({
        fadeDuration: 1000,
        fadeDelay: 0.1,
        escapeClose: false,
        clickClose: false,
        showClose: true
       });


      $(".btn-save-serv").click(function(){
           $(".chk-serv .chk-item").each(function(){
               chk="0"; 
              if($(this).is(':checked')) {  
                  chk="1";  
               } else {  
                chk="0"; 
               } 


                 serv.push({
                  idcuarto:idcuarto,
                  idcasa: idcasa,
                  idserv:$(this).attr("value"),
                  chk:chk
                 });

               
           });
            jsonServ=[];
            jsonServ = JSON.stringify(serv);
            serv=[];
            updateServCuarto(jsonServ);
            
      });

     // alert(jsonServ);
  }

  function updateServCuarto(jsonServ){
  
        base = $("#cuartos-casa").attr("base");
          $.ajax({
            type: 'POST',
            data:{
              jsonserv:jsonServ
            },
            url: base+'index.php/companies/updateServCuarto',
            cache: false,
            success: function(data) {
             var myObject = JSON.parse(data);
             res = myObject[0].res;
      
             if(res==true || res==0){
                alert("Los servicios han sido actualizados");
             }

             else{
               alert("Error en el servidor, no se han actualizado los servicios. Intente más tarde");
             }
             
              
             
              
          }
     });
  }

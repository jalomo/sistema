
<script>
   $(document).ready(function(){
   
   
   //	getBoletos();
   	//$( "#select-evento" ).change( getBoletos );
    $("#btn-buscar").click(function(){
             fecha="";
              if($("#datepicker").val()==""){

                       
                             $.confirm({
                    'title'     : 'Introduzca la fecha',
                    'message'   : 'Seleccione la fecha del calendario que se despliega en la caja de fecha',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });

              }

              else{
  
                 fecha = $("#datepicker").val();
                if ($("#chk").is(':checked')){
                   idc = $("#select-evento").val();  
                   loadVenta(idc,fecha);
                 }
                 else{

                   loadVenta("0",fecha);
                 }
              }
    });


function loadVenta(filtro,fecha){

  aux = fecha.split("/");
  date = aux[2]+"-"+aux[0]+"-"+aux[1];
 
     base = $("#ventas-vendedor").attr("base");
     vendedor = $("#ventas-vendedor").attr("vendedor");
        $.ajax({
           type: 'POST',
            data:{
            ide:filtro,
            idv:vendedor,
            fecha:date
           },
           url: base+'index.php/companies/getBoletosVendedor',
           cache: false,
          success: function(data) {
            $("#container-table-venta").html("");
            $("#p-total").html("");
             var jsn;
             table="";
 
            if(data !="0"){
               total=0;
               jsn = JSON.parse(data);
               table+="<table>";
               table+="<tr>";
               table+="  <th>Evento</th><th>Ciudad</th><th>Sexo</th><th>Total</th><th>Boleto</th>";
               table+="</tr>";
               for (var i =0; i < jsn.length; i++) {
                   table+="<tr>";
                   table+="   <td>"+jsn[i].nombreEvento+"</td>"+"<td>"+jsn[i].ciudad+"</td>"+"<td>"+jsn[i].sexo+"</td>"+"<td>"+jsn[i].total+"</td>"+"<td><a href='"+base+"index.php/companies/reprintBoletoVendedor/"+jsn[i].id+"/"+jsn[i].idEvento+"/"+jsn[i].sexo+"/"+jsn[i].codigo+"' target='_blank'>"+jsn[i].codigo+"</a></td>";
                   table+="</tr>";
                   total+= parseInt(jsn[i].total);
               }
               table+="</table>";
               $("#p-total").html("Total de la venta del " + date + " : $"+total);
               $("#container-table-venta").html(table);

            }

            else{

                 $.confirm({
                    'title'     : 'Sin ventas',
                    'message'   : 'No se encontraron ventas para los parámetros de busqueda ingresados.',
                    'buttons'   : {
                                  
                                    'Aceptar' : {
                                        'class' : 'gray',
                                        'action': function(){} //do nothing
                                    }
                                  }
                  });

            }

            


             /*var jso = JSON.parse(data);
             if(jso[0].fila!=undefined){
              boletosDiv="";
              for (var i = 0; i < jso.length; i++) {
                idFila = jso[i].fila;
                idEvento = jso[i].idEvento;
                codigo = jso[i].codigo;


               boletosDiv+="<div class='eveboletos-container' id='boleto-"+jso[i].fila+"'>"+
                                    "<div class='eveboletos'>"+
                                        "<div><p>"+jso[i].eventoNombre+"</p></div>"+
                                        "<div><p>"+codigo+"</p></div>"+
                                        "<div><p><a href='#' class='reprint-boleto' codigo='"+codigo+"' idVendedor='"+vendedor+"' idEvento='"+idEvento+"' idFila='"+idFila+"'>Imprimir boleto</a></p></div>"+
                               
                                    "</div>"+ 
                                    "<div class='mod-line'>"+
                                      "<img src='"+base+"statics/img/linea1.png'"+">"+  
                                    "</div>"+ 
                                 "</div>";
                     //boletosDiv+="FILA " + i;

                  }

                  $("#container-boletos").html(boletosDiv);
                  $(".reprint-boleto").click(function(){
                      base = $("#ventas-vendedor").attr("base");
                      idFila = $(this).attr("idfila");
                      idEvento = $(this).attr("idevento");
                      codigo = $(this).attr("codigo");
                      window.open(base+'/index.php/companies/rePrintBoleto/'+idFila+"/"+idEvento+"/"+codigo);
                  });
            }

             else{

             }*/
             
            }
        });



}



   	  $("#datepicker").datepicker();
   });
</script>


<style>
	#container-boletos{
		float: left;
		margin-left: 10px;
	}

  #form{
    margin-left: 20px;
    float: left;
    margin-top: 20px;
  }

  #form > div{
         margin-bottom: 30px;
  }

  #filtro{
    margin-left: 70px;
  }

  input[type="text"]{
    margin-left: 23px;
  }

.CSSTableGenerator {
  margin:0px;padding:0px;
  width:100%;
  border:1px solid #fcf7f7;
  
  -moz-border-radius-bottomleft:6px;
  -webkit-border-bottom-left-radius:6px;
  border-bottom-left-radius:6px;
  
  -moz-border-radius-bottomright:6px;
  -webkit-border-bottom-right-radius:6px;
  border-bottom-right-radius:6px;
  
  -moz-border-radius-topright:6px;
  -webkit-border-top-right-radius:6px;
  border-top-right-radius:6px;
  
  -moz-border-radius-topleft:6px;
  -webkit-border-top-left-radius:6px;
  border-top-left-radius:6px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
  width:100%;
  height:100%;
  margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
  -moz-border-radius-bottomright:6px;
  -webkit-border-bottom-right-radius:6px;
  border-bottom-right-radius:6px;
}
.CSSTableGenerator table tr:first-child td:first-child {
  -moz-border-radius-topleft:6px;
  -webkit-border-top-left-radius:6px;
  border-top-left-radius:6px;
}
.CSSTableGenerator table tr:first-child td:last-child {
  -moz-border-radius-topright:6px;
  -webkit-border-top-right-radius:6px;
  border-top-right-radius:6px;
}.CSSTableGenerator tr:last-child td:first-child{
  -moz-border-radius-bottomleft:6px;
  -webkit-border-bottom-left-radius:6px;
  border-bottom-left-radius:6px;
}.CSSTableGenerator tr:hover td{
  
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#e5e5e5; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
  vertical-align:middle;
  
  
  border:1px solid #fcf7f7;
  border-width:0px 1px 1px 0px;
  text-align:center;
  padding:15px;
  font-size:14px;
  font-family:Arial;
  font-weight:normal;
  color:#000000;
}.CSSTableGenerator tr:last-child td{
  border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
  border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
  border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
    background:-o-linear-gradient(bottom, #cccccc 5%, #cccccc 100%);  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #cccccc) );
  background:-moz-linear-gradient( center top, #cccccc 5%, #cccccc 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#cccccc");  background: -o-linear-gradient(top,#cccccc,cccccc);

  background-color:#cccccc;
  border:0px solid #fcf7f7;
  text-align:center;
  border-width:0px 0px 1px 1px;
  font-size:23px;
  font-family:Arial;
  font-weight:bold;
  color:#000000;
}
.CSSTableGenerator tr:first-child:hover td{
  background:-o-linear-gradient(bottom, #cccccc 5%, #cccccc 100%);  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #cccccc), color-stop(1, #cccccc) );
  background:-moz-linear-gradient( center top, #cccccc 5%, #cccccc 100% );
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#cccccc", endColorstr="#cccccc");  background: -o-linear-gradient(top,#cccccc,cccccc);

  background-color:#cccccc;
}
.CSSTableGenerator tr:first-child td:first-child{
  border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
  border-width:0px 0px 1px 1px;
}
</style>


<div id="ventas-vendedor"  base="<?php echo(base_url())?>" vendedor="<?php echo($iduser);?>">
	    <div id="form">
           
           <div id="div-fecha"><label>Fecha</label><input type="text"  id="datepicker"   class="texto_login"/></div>
           <div id="filtro"><input id="chk" type="checkbox" name="filtro" value="0">Filtrar por evento</div> 
             <div id="div-eventos"><label>Eventos</label> <select id="select-evento" name="evento" style="width:300px; height:40px; overflow-y:scroll;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">
               
               <?php 
                    foreach ($eventos as $evento) {
                      $id = $evento["eventoId"];
                      $nombre = $evento["eventoNombre"];
                     
                      echo("<option value='$id'>$nombre</option>");

                    }
               ?>

             </select>

         </div>
        <div id="filtro"><button id="btn-buscar">Buscar</button></div> 


         <div id="container-venta"  >

               <div><p id="p-total"></p></div>
         	  
               <div id="container-table-venta" class="CSSTableGenerator" >
            
             
               </div>

         </div>
</div>

</div>


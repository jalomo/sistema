<style>
@font-face {
    font-family: "nexa-bold";
    src: url("../css/font/Nexa Bold.otf");
}

@font-face {
    font-family: "nexa-light";
    src: url("../css/font/Nexa Light.otf");
}

@font-face {
    font-family: "Hiru";
    src: url("../css/font/HirukoBlackAlternate.ttf") ;
}

.font-nexa{
font-family:nexa-light;
}

.font-nexa-bold{
font-family:nexa-bold;
}

.font-hiru{
font-family:Hiru;
}
.contenido_{
  width:100%;
  height:100%;
  /*background:#fff;*/
  }
.contenido_p{
  width:1024px;;
  /*height:1500px;;*/
  /*background:#fff;*/
  
  } 
.conten-{
  height:1100px;
  width:800px;
  /*background:#fff;*/
  /*box-shadow: 3px 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px 3px #bdc3c7;*/
  } 
  
.cuadritos{
  width:200px;
  height:300px;
  margin-left:10px;
  /*background:#95a5a6;*/
  /*background-image:url(../../../../statics/img/barra mensajes.png);*/
  /*margin-left:10px;
  border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
/*-webkit-border-radius:5px; /* Safari y Chrome */


/* box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;*/
  }
  
.cuadritos_con{
  width:200px;
  height:200px;
  margin-left:10px;
  /*background:#95a5a6;*/
  /*margin-left:10px;
  border-radius:5px; 
-moz-border-radius:5px; /* Firefox */ 
/*-webkit-border-radius:5px; /* Safari y Chrome */


 /*box-shadow: 3px 3px 3px #bdc3c7;
   -webkit-box-shadow: 3px 3px 3px #bdc3c7;
   -moz-box-shadow: 3px 3px 3px #bdc3c7;*/
  } 
  
  
.header-1{
  height:50px;
  background:#ecf0f1;
  } 
  
.float-left{ float:left;}
.limpiar-div{ clear:both;}  

.slider-{ height:200px; background:#909}

.menu-1{ width:170px; height:50px; margin-left:10px;
cursor:pointer;
    /*border:1px;
    border-style:solid;
    cursor:pointer;
    border-color:#bdc3c7 #bdc3c7 #fff #bdc3c7;
    border-radius:5px; 
-moz-border-radius:5px; 
-webkit-border-radius:5px;*/ }
.menu-cotenido-{ height:800px; /*background:#bdc3c7;*/}   

.menu-seleccionado{ background:#95a5a6 ; border-color:#bdc3c7 #bdc3c7 #95a5a6 #bdc3c7;}

.menu-1:hover{/*background:#95a5a6*/ }
.color-azul{ color:#34495e;}
.color-blanco{ color:#fff;}
.cursor-pointer{ cursor:pointer;}
.eventos-{
  height:300px;
  background:#CCC;
  overflow-y: auto; 
  }
.servicios_{ /*color:#1abc9c;*/ font-size:18px;}

#mis_eventos_,#itinerario_,#servicios_,#puntos_,#contenido_alojamiento,#contenido_trasporte,#contenido_alimentos,#contenido_eventos,#contenido_ser,#contenido_eve{ display: none} 


.texto_login{ font-family: "Helvetica-ExtraCompressed";
    font-size: 20pt;
  }  




.div-clean{
  clear: both;
}

#pago-tipo{
  width: 90%;
}

#pago-tipo > div {
  float: left;
  width: 25%;
}

#div-clean{
  clear: both;
}

#btn-reg{
  margin-top: 30px;
}



</style>
<script>
$(document).ready(function(){

$(".modal").css("height","auto");

 $("#servicios_menu").click(function(event){
        event.preventDefault();
        $("#itinerario_").slideUp('slow');
    $("#mis_eventos_").slideUp('slow');
        $("#servicios_").toggle('slow');
    $("#puntos_").slideUp('slow');
    /* $("#servicios_menu").addClass("menu-seleccionado");
     $("#eventos_menu").removeClass("menu-seleccionado");
     $("#itinerario_menu").removeClass("menu-seleccionado");
     $("#puntos_menu").removeClass("menu-seleccionado");*/
    });
   $("#eventos_menu").click(function(event){
        event.preventDefault();
        $("#itinerario_").slideUp('slow');
    $("#mis_eventos_").toggle('slow');
        $("#servicios_").slideUp('slow');
    $("#puntos_").slideUp('slow');
    /*$("#servicios_menu").removeClass("menu-seleccionado");
     $("#eventos_menu").addClass("menu-seleccionado");
     $("#itinerario_menu").removeClass("menu-seleccionado");
     $("#puntos_menu").removeClass("menu-seleccionado");*/
    });
   $("#itinerario_menu").click(function(event){
        event.preventDefault();
    $("#puntos_").slideUp('slow');
        $("#itinerario_").toggle('slow');
    $("#mis_eventos_").slideUp('slow');
        $("#servicios_").slideUp('slow');
    /*$("#servicios_menu").removeClass("menu-seleccionado");
     $("#eventos_menu").removeClass("menu-seleccionado");
     $("#itinerario_menu").addClass("menu-seleccionado");
     $("#puntos_menu").removeClass("menu-seleccionado");*/
    });
  $("#puntos_menu").click(function(event){
        event.preventDefault();
        $("#puntos_").toggle('slow');
    $("#itinerario_").slideUp('slow');
    $("#mis_eventos_").slideUp('slow');
        $("#servicios_").slideUp('slow');
    /*$("#servicios_menu").removeClass("menu-seleccionado");
     $("#eventos_menu").removeClass("menu-seleccionado");
     $("#itinerario_menu").removeClass("menu-seleccionado");
      $("#puntos_menu").addClass("menu-seleccionado");*/
    });
    $("#servicios_").show();
    
    $("#contenido_eventos").show();
    
    $("#alojaminento_").click(function(event){
        event.preventDefault();
        $("#contenido_alojamiento").toggle('slow');
    $("#contenido_trasporte").slideUp('slow');
    $("#contenido_alimentos").slideUp('slow');
        $("#contenido_eventos").slideUp('slow');
    
    });
  
   $("#trasporte_").click(function(event){
        event.preventDefault();
         $("#contenido_alojamiento").slideUp('slow');
    $("#contenido_trasporte").toggle('slow');
    $("#contenido_alimentos").slideUp('slow');
        $("#contenido_eventos").slideUp('slow');
    
    });
  
   $("#alimentos_").click(function(event){
        event.preventDefault();
         $("#contenido_alojamiento").slideUp('slow');
    $("#contenido_trasporte").slideUp('slow');
    $("#contenido_alimentos").toggle('slow');
        $("#contenido_eventos").slideUp('slow');
    
    });
  
   $("#eventos_").click(function(event){
        event.preventDefault();
         $("#contenido_alojamiento").slideUp('slow');
    $("#contenido_trasporte").slideUp('slow');
    $("#contenido_alimentos").slideUp('slow');
        $("#contenido_eventos").toggle('slow');
    
    });
  
  $("#compra_ser").click(function(event){
        event.preventDefault();
        
    $("#contenido_eve").slideUp('slow');
        $("#contenido_ser").toggle('slow');
    
    });
  
  $("#compra_eve").click(function(event){
        event.preventDefault();
        
    $("#contenido_ser").slideUp('slow');
        $("#contenido_eve").toggle('slow');
    
    });
  
  
    $(".ser-cuartos").click(function(){
        idcu = $(this).attr("cuarto");
        idca = $(this).attr("casa");
        base = $("#img-cuartos").attr("base");
        $.ajax({
           type: 'POST',
           data:{
            idcu:idcu,
            idca:idca
           }, 
           url: base+'index.php/cliente/getServiciosCuarto',
           cache: false,
          success: function(data) {

            var myObject = JSON.parse(data);
             serviciosDiv="<div class='img-p'>"; 
            for (var i = 0; i < myObject.length; i++) {
              serviciosDiv+="<div><img src='"+base+"statics/img/palomita.png' width='30px'/></div><div><p>"+myObject[i].nombre+"</p></div>";
              serviciosDiv+="<div class='div-clean'>&nbsp</div>";
            }

            serviciosDiv+="</div>"; 
            $(".container-modal").html(serviciosDiv);

           
              $(".modal-service").modal({
                 fadeDuration: 1000,
                 fadeDelay: 0.1,
                 escapeClose: false,
                 clickClose: false,
                 showClose: true
               });


           }
        });
      
    });
    
    
    
    
}); 

</script>
<div class="contenido_" align="center">

 
  <div class="contenido_p" >
      <div class="conten- float-left">
          <div class="header-1">
              <div align="left">
                  <span class="font-helvetica color-azul"><?php echo $usuario->usuarioNombre;?></span>

                </div>
              
            </div>
          
            <div class="slider-">
             <?php echo img(array('src'=>'statics/img/prueba.png')); ?>
            </div>
            <br/>
            <div class="menu-0" align="center">
              <div  class="menu-1 float-left  texto_login color-azul" id="" style="margin-left:100px;"><a href="<?php echo base_url().'/index.php/cliente/'?>" > <?php echo img(array('src'=>'statics/img/bonton_servicio.png')); ?></a></div>
                <div class="menu-1 float-left texto_login color-azul" id=""><a href="<?php echo base_url().'/index.php/cliente/mis_compras'?>" > <?php echo img(array('src'=>'statics/img/boton mis compras.png')); ?></a></div>
                <!--div class="menu-1 float-left font-helvetica color-azul" id="itinerario_menu">Mis boletos</div-->
                <div class="menu-1 float-left texto_login color-azul" id=""><?php echo img(array('src'=>'statics/img/boton puntos cnx.png')); ?></div>
            </div>
            <div class="limpiar-div"></div>

            <div class="menu-cotenido-  fondo_registro" id="servicios_">
             <div align="center" style=" font-weight:bold; font-size:18px;">HOUSING</div>
            
      
              
              <div id="div-cuartos">
                  <p>Pago de cuarto</p>
                  <form method="post" action="<?php echo(base_url())?>/index.php/cliente/save_tipo_pago_cuarto">
                    <div><p id="p-casaid" namee="<?php echo ($dataCuarto[0]['casaNombre']);?>" idca="<?php echo($dataCuarto[0]['casaId']);?>">Nombre de la casa:<?php echo ($dataCuarto[0]['casaNombre']);?></p></div>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['casaId']);?>" name="idca" id="idca"/>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['casaNombre']);?>" name="casanombre" id="casanombre"/>
                    <div><p id="p-cuartoid" namee="<?php echo ($dataCuarto[0]['sennia']);?>" idcu="<?php echo($dataCuarto[0]['idCuarto']);?>">Seña cuarto:<?php echo ($dataCuarto[0]['sennia']);?></p></div>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['idCuarto']);?>" name="idcu" id="idcu"/>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['sennia']);?>" name="sennia" id="sennia"/>
                    <div><p id="p-costo" namee="<?php echo ($dataCuarto[0]['precio']);?>" >Costo <?php echo ($dataCuarto[0]['precio']);?></p></div>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['precio']);?>" name="costo" id="costo"/>
                    <input type="hidden" value="<?php echo($dataCuarto[0]['casaIdCiudad']);?>" name="ciudad" id="ciudad"/>
                    <div><p id="p-total" namee="<?php echo ($dataCuarto[0]['precio']);?>" >Total <?php echo ($dataCuarto[0]['precio']);?></p></div>
                    
               
            <div id='pago-tipo'>
         
            <?php if($dataCuarto[0]['casaPagoPayPal']=="1"){?>
              <div><input  type="radio" name="tipo[pago]" checked ="checked" value="2"/><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?></div>
            <?php }?>    
           
           
          
             <?php if($dataCuarto[0]['casaPagoContado']=="1"){?>
              <div><input  type="radio" name="tipo[pago]" value="4"/><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?></div>
               <?php }?>   
              </div>
              <div class="div-clean"></div> 
               <div id='btn-reg'><input type="image"  src="<?php echo base_url().'/statics/img/btn_registrar.png'?>" name=""  type="submit" value="save"></div>  

                  </form>

              </div>
          
            
             <div class="limpiar-div"></div> 
             
             <br/>
            </div>
            
             
             
            
            
          
        
        </div>
       <script>
    $(document).ready(function(){
            $(".abrir_ventana").click(function(event){
        event.preventDefault();
        id = $(event.currentTarget).attr('id');
        flag = $(event.currentTarget).attr('flag');
        url='<?php echo base_url()?>/index.php/cliente/ver_mesaje/'+id;
        url_data='<?php echo base_url()?>/index.php/cliente/cambiar_status/';
        
        
        value_json = $.ajax({
             type: "POST",
             url:url_data,
             data: {id_post: id,id_user:flag},
             async: false,
             dataType: "html",
            success: function(data){
              $("#"+id).css({"border-color":"black"});
              
              window.open(url,"","width=200,height=100");
              
               }
             }).responseText;
        
        
        
      });
          
       });      
        </script>
        
        <div class="cuadritos float-left" style="background: rgba(255, 255, 255, 0.5); border-radius: 25px;">
        
         <span style="color:#f6565d; font-weight:bold; font-size:25px;" class="">MENSAJES</span>
          <div style="overflow-y: scroll; margin-bottom: 12px; height:260px; overflow-x: auto; width:190px;">
          <?php foreach($mensajes as $mensaje):?>
                <?php if($mensaje->msjStatus==0):?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px;border-color: red; cursor:pointer; width:150px;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                <?php else:?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px; cursor:pointer;width:150px;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                
                <?php endif;?>
          <?php endforeach;?>
          
          </div>
          
        
        </div>
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         
          <?php echo img(array('src'=>'statics/img/barra contacto.png')); ?>
           
                  
  
  
         
         
         </div>
    </div>


           <div class='modal-service' style='display:none;'>
                    <div class='container-modal' user='0'>
                      
                    </div>
             </div>

</div>


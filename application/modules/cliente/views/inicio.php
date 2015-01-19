
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
.menu-cotenido-{ height:500px; background:#bdc3c7;}		

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
.servicios_{ color:##1abc9c; font-size:18px;}

#mis_eventos_,#itinerario_,#servicios_,#puntos_,#contenido_alojamiento,#contenido_trasporte,#contenido_alimentos,#contenido_eventos,#contenido_ser,#contenido_eve{ display: none}	


.texto_login{ font-family: "Helvetica-ExtraCompressed";
    font-size: 20pt;
	}  


</style>
<script>
$(document).ready(function(){
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
            <div class="menu-0">
            	<div  class="menu-1 float-left  texto_login color-azul" id=""><?php echo img(array('src'=>'statics/img/bonton_servicio.png')); ?></div>
                <div class="menu-1 float-left texto_login color-azul" id=""> <?php echo img(array('src'=>'statics/img/boton mis compras.png')); ?></div>
                <!--div class="menu-1 float-left font-helvetica color-azul" id="itinerario_menu">Mis boletos</div-->
                <div class="menu-1 float-left texto_login color-azul" id=""><?php echo img(array('src'=>'statics/img/boton puntos cnx.png')); ?></div>
            </div>
            <div class="limpiar-div"></div>
            <div class="menu-cotenido-" id="servicios_">
            
            <div style="background:#8e44ad; cursor:pointer; height:30px" class="font-helvetica" id="alojaminento_">Alojamiendo</div>
            <div id="contenido_alojamiento" style="background:#8e44ad;height:390px;overflow-y: auto; ">
            
            	<?php if($servicio_alojamiento !=0):?>
                                    
									<?php foreach($servicio_alojamiento as $alojamiento):?>
                                     <?php echo form_open('cliente/do_purchase', array('id'=>'')); ?>
                                        <div id="eliminar<?php echo $alojamiento['servicioId']; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="100">
                                                <div class="font-helvetica servicios_ "><?php echo $alojamiento['servicioNombre'];?></div>
                                               <input type="hidden" name="servicio" value="<?php echo $alojamiento['servicioNombre'];?>" />
                                                
                                            </td>
                                           
                                            <td width="100">
                                                 
                                                <div class="font-helvetica servicios_">Costo:$<?php echo $alojamiento['servicioCosto'];?></div> 
                                                <input type="hidden" name="costo" value="<?php echo $alojamiento['servicioCosto'];?>" />                                 
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:50px">Tipo de pago:
                                                <a href="<?php echo base_url().'index.php/cliente/servicio_deposito/'.$alojamiento['servicioId'].'/1'?>" title="Deposito bancario" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/deposito.png','width'=>'30px')); ?></a>
                                                
                                                <a href="#" title="PayPal" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?></a>
                                                <a href="#" title="oxxo" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/oxxo.png','width'=>'80px')); ?></a>
                                                
                                                <a href="#" title="Contactar vendedor" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?></a>
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                         <?php echo form_close(); ?>
                                      <?php endforeach;?> 
                                      <?php endif;?>
                                      
            
            </div>
            
            <div style="  background:#27ae60; cursor:pointer; height:30px;" class="font-helvetica" id="trasporte_">Trasporte</div>
            <div id="contenido_trasporte" style="background:#27ae60;height:390px;overflow-y: auto; ">
            
            	<?php if($servicio_trasporte !=0):?>
                                    
									<?php foreach($servicio_trasporte as $trasporte):?>
                                     <?php echo form_open('cliente/do_purchase', array('id'=>'')); ?>
                                        <div id="eliminar<?php echo $trasporte['servicioId']; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="100">
                                                <div class="font-helvetica servicios_ "><?php echo $trasporte['servicioNombre'];?></div>
                                               <input type="hidden" name="servicio" value="<?php echo $trasporte['servicioNombre'];?>" />
                                                
                                            </td>
                                           
                                            <td width="100">
                                                 
                                                <div class="font-helvetica servicios_">Costo:$<?php echo $trasporte['servicioCosto'];?></div> 
                                                <input type="hidden" name="costo" value="<?php echo $trasporte['servicioCosto'];?>" />                                 
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:50px">Tipo de pago:
                                                <a href="<?php echo base_url().'index.php/cliente/servicio_deposito/'.$alojamiento['servicioId'].'/2'?>" title="Deposito bancario" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/deposito.png','width'=>'30px')); ?></a>
                                                
                                                <!--a href="#" title="PayPal" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?></a>
                                                <a href="#" title="oxxo" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/oxxo.png','width'=>'80px')); ?></a-->
                                                
                                                <a href="#" title="Contactar vendedor" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?></a>
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                         <?php echo form_close(); ?>
                                      <?php endforeach;?> 
                                      <?php endif;?>
            
            
            </div>
            
            <div style="background:#c0392b; cursor:pointer; height:30px;" class="font-helvetica" id="alimentos_">Alimentos</div>
            <div id="contenido_alimentos" style="background:#c0392b;height:390px;overflow-y: auto; ">
            	<?php if($servicio_aliementos !=0):?>
                                    
									<?php foreach($servicio_aliementos as $alimentos):?>
                                     <?php echo form_open('cliente/do_purchase', array('id'=>'')); ?>
                                        <div id="eliminar<?php echo $alimentos['servicioId']; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="100">
                                                <div class="font-helvetica servicios_ "><?php echo $alimentos['servicioNombre'];?></div>
                                               <input type="hidden" name="servicio" value="<?php echo $alimentos['servicioNombre'];?>" />
                                                
                                            </td>
                                           
                                            <td width="100">
                                                 
                                                <div class="font-helvetica servicios_">Costo:$<?php echo $alimentos['servicioCosto'];?></div> 
                                                <input type="hidden" name="costo" value="<?php echo $alimentos['servicioCosto'];?>" />                                 
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:50px">Tipo de pago:
                                                <a href="<?php echo base_url().'index.php/cliente/servicio_deposito/'.$alojamiento['servicioId'].'/3'?>" title="Deposito bancario" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/deposito.png','width'=>'30px')); ?></a>
                                                
                                                <!--a href="#" title="PayPal" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?></a>
                                                <a href="#" title="oxxo" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/oxxo.png','width'=>'80px')); ?></a-->
                                                
                                                <a href="#" title="Contactar vendedor" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?></a>
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                         <?php echo form_close(); ?>
                                      <?php endforeach;?> 
                                      <?php endif;?>
            
            
            </div>
            
            <div style="background:#f39c12; cursor:pointer; height:30px;" class="font-helvetica" id="eventos_">Eventos</div>
            <div id="contenido_eventos" style="background:#f39c12; height:390px;overflow-y: auto; ">
            
            	<?php if($eventos !=0):?>
                                    <br/>
									<?php foreach($eventos as $evento):?>
                                    
                                        <div id="eliminar<?php echo $evento->eventoId; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="200">
                                                <div class="font-helvetica servicios_ "><?php echo $evento->eventoNombre;?></div>
                                              
                                                
                                            </td>
                                           
                                            <td width="200">
                                                 
                                                <div class="font-helvetica servicios_">Costo:$<?php echo $evento->eventoPrecioBase;?></div> 
                                                                               
                                                                           
                                            </td>
                                            <td width="200">
                                                 
                                                <div class="font-helvetica servicios_">Lugares:<?php echo $evento->eventoLugares;?></div> 
                                                                               
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:20px">
                                                <a href="<?php echo base_url().'index.php/cliente/compra_evento/'.$evento->eventoId?>" title="Deposito bancario" style="margin-left:50px">Ver más</a>
                                                
                                               
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="4">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                      <?php endforeach;?> 
                                      <?php endif;?>  
            		
            
            
            </div>
            
            
									<?php /*if($servicios !=0):?>
                                    <br/>
									<?php foreach($servicios as $servicio):?>
                                     <?php echo form_open('cliente/do_purchase', array('id'=>'')); ?>
                                        <div id="eliminar<?php echo $servicio->servicioId; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="100">
                                                <div class="font-helvetica servicios_ "><?php echo $servicio->servicioNombre;?></div>
                                               <input type="hidden" name="servicio" value="<?php echo $servicio->servicioNombre;?>" />
                                                
                                            </td>
                                           
                                            <td width="100">
                                                 
                                                <div class="font-helvetica servicios_">Costo:$<?php echo $servicio->servicioCosto;?></div> 
                                                <input type="hidden" name="costo" value="<?php echo $servicio->servicioCosto;?>" />                                 
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:50px">Tipo de pago:
                                                <a href="#" title="Deposito bancario" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/deposito.png','width'=>'30px')); ?></a>
                                                
                                                <a href="#" title="PayPal" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/paypal.png','width'=>'100px')); ?></a>
                                                
                                                <a href="#" title="Contactar vendedor" style="margin-left:50px"><?php echo img(array('src'=>'statics/img/contacto.png','width'=>'40px')); ?></a>
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                         <?php echo form_close(); ?>
                                      <?php endforeach;?> 
                                      <?php endif;*/?>             		
            
            </div>
            
             <div class="menu-cotenido-" id="mis_eventos_">
              <div style="background:#8e44ad; cursor:pointer; height:30px" id="compra_ser">Servicios</div>
               <div id="contenido_ser" style="background:#8e44ad; height:390px;overflow-y: auto; ">
               	
               
                <?php if($servicios!=0):?>
                <?php foreach($servicios as $servicio):?>
                <table width="700" border="0">
                                          <tr>
                                            <td width="400">
                                                <div class="font-helvetica servicios_ ">Servicio:<?php echo $this->clientes->get_name_servicio($servicio->suIdServicio);?></div>
                                               
                                                
                                            </td>
                                           
                                            <!--td>
                                                 
                                                <div class="font-helvetica servicios_ ">Tipo pago:<?php echo $servicio->suTipoPago;?></div>                                    
                                                                           
                                            </td-->
                                            
                                            <td>
                                                 
                                                <div class="font-helvetica servicios_ ">
                                                	Estatus:
													<?php if($servicio->suStatus==1){ echo 'verde';}?>
                                                    <?php if($servicio->suStatus==3){ echo 'rojo';}?>
                                                </div>                                    
                                                                           
                                            </td>
                                             <td>
                                                 
                                                <div class="font-helvetica servicios_ ">ver mas</div>                                    
                                                                           
                                            </td>
                                            
                                          </tr>
                                          <tr>
                                            <td colspan="3">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                	
                
                <?php endforeach;?>
               
               <?php endif;?>
               </div>
              <div style="background:#f39c12; cursor:pointer; height:30px" id="compra_eve">Eventos</div>
              <div id="contenido_eve" style="background:#f39c12; height:390px;overflow-y: auto; ">
              		
                      
              <?php if($eventos_comprados !=0):?>
                                    <br/>
									<?php foreach($eventos_comprados as $even):?>
                                    
                                        <div id="eliminar<?php echo $even->euIdEvento; ?>">
                                        <table width="800" border="0">
                                          <tr>
                                            <td width="200">
                                                <div class="font-helvetica servicios_ "><?php echo$this->clientes->get_name_evento( $even->euIdEvento);?></div>
                                              
                                                
                                            </td>
                                           
                                            <td width="200">
                                                 
                                                <div class="font-helvetica servicios_">Costo:$<?php echo$this->clientes->get_costo_evento( $even->euIdEvento);?></div> 
                                                                               
                                                                           
                                            </td>
                                            <td width="200">
                                                 
                                                <div class="font-helvetica servicios_">Lugares:<?php echo$this->clientes->get_lugares_evento( $even->euIdEvento);?></div> 
                                                                               
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                
                                                <div class="font-helvetica " style="margin-left:20px">
                                                <a href="<?php echo base_url().'index.php/cliente/compra_evento/'.$even->euIdEvento?>" title="Deposito bancario" style="margin-left:50px">Ver más</a>
                                                
                                               
                                                </div>  
                                                
                                                                                
                                                                           
                                            </td>
                                          </tr>
                                          <tr>
                                            <td colspan="4">
                                                <hr/>
                                            </td>
                                            </tr>
                                        </table>
                                        </div>
                                      <?php endforeach;?> 
                                      <?php endif;?>  
            		
              
              
               </div>
             </div>
             
              <div class="menu-cotenido-" id="itinerario_">
              mis boletos
             </div>
             <div class="menu-cotenido-" id="puntos_">
              mis puntos
             </div> 
            <!--div class="eventos-">
            
            					<?php if($eventos !=0):?>
                                    <br/>
									<?php foreach($eventos as $evento):?>
                                    
                                        <div id="eliminar<?php echo $evento->eventoId; ?>">
                                        <table width="700" border="0">
                                          <tr>
                                            <td width="400">
                                                <div class="font-helvetica servicios_ "><?php echo $evento->eventoNombre;?></div>
                                               
                                                
                                            </td>
                                           
                                            <td>
                                                 
                                                <div class="font-helvetica servicios_ ">Lugares disponibles:<?php echo $evento->eventoLugares;?></div>                                    
                                                                           
                                            </td>
                                            
                                            <td>
                                                 
                                                <div class="font-helvetica servicios_ "><a href="#"> ver mas</a></div>                                    
                                                                           
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
            </div-->
            
          
        
        </div>
        <div class="cuadritos float-left">
         <?php echo img(array('src'=>'statics/img/barra mensajes.png')); ?>
        	<!--div align="center" class="color-azul font-helvetica">Mesajes</div>
            
            <?php for($i=0;$i<5;$i++):?>
            	<div class="font-helvetica color-blanco cursor-pointer"></div>
            <?php endfor;?> -->
        	
        </div>
        
         <div class="cuadritos_con float-left" style=" margin-top:15px;">
         
          <?php echo img(array('src'=>'statics/img/barra contacto.png')); ?>
         	 
                 	
	
	
         
         
         </div>
    </div>

</div>
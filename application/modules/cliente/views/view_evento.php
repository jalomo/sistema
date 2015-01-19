
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
 <?php echo form_open('cliente/tipo_pago/', array('id'=>'save_mod')); ?> 
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
                <div class="menu-1 float-left texto_login color-azul" id=""> <a href="<?php echo base_url().'/index.php/cliente/mis_compras'?>" ><?php echo img(array('src'=>'statics/img/boton mis compras.png')); ?></a></div>
                <!--div class="menu-1 float-left font-helvetica color-azul" id="itinerario_menu">Mis boletos</div-->
                <div class="menu-1 float-left texto_login color-azul" id=""><?php echo img(array('src'=>'statics/img/boton puntos cnx.png')); ?></div>
            </div>
            <div class="limpiar-div"></div>
            
            
            <div class="menu-cotenido-  " id="servicios_">
             <div align="center" style=" font-weight:bold; font-size:18px;">EVENTOS</div>
            
           
            
             <div class="limpiar-div"></div> 
             
             <br/>
            <div align="left" class="color-azul font-nexa-bold" style=" font-size: 20pt;color:#636363">
            	
               
             
                
           <div align="center">
            
           
            <input type="image"  src="<?php echo base_url().$evento->eventoUrlImage;?>" name=""  type="submit" value="save" width="750px" height="200px;">
          
            
            </div>
            
            
              <div>
              
              
             <div align="center"><?php echo $evento->eventoNombre;?></div>
             
             <br/>
              <span class="font-nexa-bold"> Ciudad de salida:</span>
          <?php
                            
							$tamano1=sizeof(explode("--",$evento->eventoCiudad))-1;
							$nam1=explode("--",$evento->eventoCiudad);
							$preH1=explode("--",$evento->eventoPrecioBase);
							$preM1=explode("--",$evento->eventoPrecioBaseM);
							
								for($i=0;$i<$tamano1;$i++):
									
									if($sexo=='Hombre'){
									$sele1[$preH1[$i].'--'.$nam1[$i].'--'.$evento->eventoId.'--'.$evento->eventoNombre]=$this->clientes->get_ciudades_nombre($nam1[$i]).'/$'.$preH1[$i];
									}
									if($sexo=='Mujer'){
									$sele1[$preM1[$i].'--'.$nam1[$i].'--'.$evento->eventoId.'--'.$evento->eventoNombre]=$this->clientes->get_ciudades_nombre($nam1[$i]).'/$'.$preM1[$i];
									}
									
									if($sexo==""){
										$sele1[$preH1[$i].'--'.$nam1[$i].'--'.$evento->eventoId.'--'.$evento->eventoNombre]=$this->clientes->get_ciudades_nombre($nam1[$i]).'/$'.$preH1[$i];
										
									}
									
								endfor;
								
							   echo form_dropdown('evento[evento]', $sele1, '');
								
							?>
                            
              <br/>              
       
       
       <style>.esconder_{display: none;}</style>
       <script>
       $(document).ready(function(){
       	$(".guardar_categoria").click(function(event){
        event.preventDefault();
		 id = $(event.currentTarget).attr('id');
		  cat=parseInt(id)+1;
           // abrir_
		   $(".abrir_"+cat).toggle('slow');
		   $(".esconder_boton"+id).hide();
		   
		  boton_= <?php echo $total_categorias= count ($categorias);?>;
		  if(boton_==id){
			  $("#guarda_boton").show();
			 }
		   
		  // alert("#abrir_"+id);
       });
	    });
       </script>
       
       
       <?php if($categorias!=0):?>
       <?php $total_categorias= count ($categorias);?>
       <?php $auxtotal=1;?>
       
       
       <?php foreach($categorias as $categoria):?>
       <?php $aux_clase='';?>
       <?php if($auxtotal==1){?>
        <?php $aux_clase='';?>
       <?php }else{?>
        <?php $aux_clase='esconder_';?>
       <?php }?>
       
       <div style="background: rgba(255, 255, 255, 0.5); border-radius: 25px;" class="<?php echo $aux_clase;?>  abrir_<?php echo $auxtotal;?> " id="" align="center">
       
     <div style="color:#006; font-weight:bold;" class="font-nexa-bold">	<?php echo $categoria->categoriaNombre;?>:</div>
     <hr/>
    <?php $modificadores1=$this->clientes->get_modificador_categoria($categoria->categoriaId);?>
             
             
            <?php if($modificadores1!=0):?>
            
                	<?php $aux=0;?>
                	<?php foreach($modificadores1 as $modificador):?>
                    	
                        <?php if($modificador->modificadorTipo==2){?>
                       
                        	<?php
                            
							$tamano=sizeof(explode("--",$modificador->modificadorNombre))-1;
							$nam=explode("--",$modificador->modificadorNombre);
							$preH=explode("--",$modificador->modificadorPrecio);
							$preM=explode("--",$modificador->modificadorPrecioM);
							
							$sele["0"]="optiones";
							
							
								for($i=0;$i<$tamano;$i++):
									
									if($sexo=='Hombre'){
									$sele[$modificador->modificadorId.'--'.$nam[$i].'--'.$preH[$i]]=$nam[$i].'/$'.$preH[$i];
									}
									if($sexo=='Mujer'){
									$sele[$modificador->modificadorId.'--'.$nam[$i].'--'.$preM[$i]]=$nam[$i].'/$'.$preM[$i];
									}
									
									if($sexo==""){
										$sele[$modificador->modificadorId.'--'.$nam[$i].'--'.$preH[$i]]=$nam[$i].'/$'.$preH[$i];
										
									}
									
									if($sexo==''){
									$sele[$modificador->modificadorId.'--'.$nam[$i].'--'.$preH[$i]]=$nam[$i].'/$'.$preH[$i];
									}
									
								endfor;
							   echo form_dropdown('evento[modificador][]', $sele, '');
							   
								$sele='';
							?>
                            
                        <?php }else{?>
                        	
                            <?php if($sexo=='Hombre'){?>
                            <input type="checkbox" value="<?php echo $modificador->modificadorId.'--'.$modificador->modificadorNombre.'--'.$modificador->modificadorPrecio;?>" name="evento[modificador][]"/>
							<?php echo $modificador->modificadorNombre;?>$<?php echo $modificador->modificadorPrecio;?>
                            <?php }?>
                            <?php if($sexo=='Mujer'){?>
                            <input type="checkbox" value="<?php echo $modificador->modificadorId.'--'.$modificador->modificadorNombre.'--'.$modificador->modificadorPrecioM;?>" name="evento[modificador][]"/>
							<?php echo $modificador->modificadorNombre;?>$<?php echo $modificador->modificadorPrecioM;?>
                            <?php }?>
                            
                            
                            
                            
                             <?php if($sexo==''){?>
                            <input type="checkbox" value="<?php echo $modificador->modificadorId.'--'.$modificador->modificadorNombre.'--'.$modificador->modificadorPrecio;?>" name="evento[modificador][]"/>
							<?php echo $modificador->modificadorNombre;?>$<?php echo $modificador->modificadorPrecio;?>
                            <?php }?>
                            
                            
                            
                        <?php }?>
                    
                    
                    <?php if($aux==3){echo '<br/>'; $aux=0;} ?>
                    <?php $aux++;?>
                    /
                    <?php endforeach;?>
                <?php endif;?>
                
                <br/>
                <button type="button" id="<?php echo $auxtotal;?>" class="guardar_categoria esconder_boton<?php echo $auxtotal;?>"  style="background:#77e2dd; border-color:#55a09d; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;">Siguiente</button>
                
        </div>  
        <br/>
        <?php $auxtotal++;?>
           
      <?php endforeach;?>        
             
      <?php endif;?>       
             
          
             
             </div>
            
           
            <br/>
            <div align="center">
             <!--a href="<?php echo base_url().'/index.php/cliente/tipo_pago/'?>"-->
            <input type="image"  src="<?php echo base_url().'/statics/img/btn_registrar.png'?>" name=""  type="submit" value="save" id="guarda_boton" class="esconder_">
            <!--/a-->
            </div>
            
                
            </div> 
            
           
            
           
               		
            
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

</div>

<?php echo form_close(); ?>
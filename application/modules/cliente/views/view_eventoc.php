<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
  <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/form.js'; ?>"></script>
 
 
</head>
<body class="fondo_pantalla">

<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12"> &nbsp;</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco"><a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
         <img src="<?php echo base_url();?>statics/bootstrap/img/logo_1.png"/>
         </a></div>
        	
     
     </div>
    <div class="col-md-4">
    		
       <span class="bienvenido"> Bienvenido </span> &nbsp; &nbsp; &nbsp; <a href="<?php echo base_url().'index.php/cliente/logout';?>" ><button class="boton_salir" type="button">Salir</button>   </a> 
      <br/>
    
      		<a class=" menu_texto" href="<?php echo base_url().'/index.php/cliente/completa_datos'?>" >
            Mi perfil 
            </a>   
    
    </div>
  </div>
  
  
  <div class="row show-grid">
    <div class="col-md-8">
    
    		<div class="header_nombre color_blanco"><br/>&nbsp;&nbsp; <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/completa_datos'?>" >
			 <?php echo $usuario->usuarioNombre;?>
             </a></div>
            <div class="header_banner "> <!--banner--><?php echo get_banner();?></div>
    		
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">MENSAJES</div>
            <div class="mensajes_ color_blanco">
            	
                 <?php if($mensajes!=0  || $mensajes!='0'):?>
            	<?php foreach($mensajes as $mensaje):?>
          	
                <?php if($mensaje->msjStatus==0):?>
                
                    <div style="border-style: solid; border-width: 2px; margin:1px;border-color: red; cursor:pointer; " id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                <?php else:?>
                
                    <div style="cursor:pointer;" id="<?php echo $mensaje->msjIdMensaje;?>" class="abrir_ventana" flag="<?php echo $mensaje->msjIdUser;?>">
                        <?php echo substr($this->clientes->get_texto_mensaje($mensaje->msjIdMensaje), 0, 20).'...';?>
                    </div>
                
                
                <?php endif;?>
                <hr/>
          <?php endforeach;?>
          <?php endif;?>
          
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
                
                
                
            </div>
    
    </div>
  </div>
  <div class="row show-grid">
    <div class="col-md-8" align="center">
    	
        <div class="btn-group btn-group-justified menu_" >
           <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >SERVICIOS</a>
           <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/mis_compras/'?>">MIS COMPRAS</a>
          <a class="btn btn-default menu_texto"  href="<?php echo base_url().'/index.php/cliente/mis_puntos/'?>">MIS PUNTOS CNX</a>
        </div>
        <div class="btn-group btn-group-justified menu_abajo">
        	 <a class="btn btn-default menu_servicios" href="#"></a>
              <a class="btn"></a>
              <a class="btn"></a>
        </div>
    
    
    </div>
    <div class="col-md-4"></div>
    
  </div>
  <div class="row show-grid">
    <div class="col-md-8 ">
    
   
    
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    <?php echo form_open('cliente/opciones/', array('id'=>'save_mod')); ?> 
    
        <div align="center" class="textos_al" >EVENTOS</div>
        <br/>
     <div class="color_blanco"> 
     <br/>
        <div align="center">
         <input type="image"  src="<?php echo base_url().$evento->eventoUrlImage;?>" name=""  type="submit" value="save" width="750px" height="200px;">
        </div>
         
        <div align="center" class="menu_texto"><?php echo $evento->eventoNombre;?></div>
        
        <span class=" menu_texto"> Ciudad de salida:</span>
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
                <div style=" background:#f4f4f2; margin:30px;" class="<?php echo $aux_clase;?>  abrir_<?php echo $auxtotal;?> " id="" align="center">
       
     <div style="color:#fff; background:#bdc3c7; font-weight:bold; font-size:18px;" class="font-nexa-bold">	<?php echo $categoria->categoriaNombre;?>:</div>
     
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
                <br/>
                <button type="button" id="<?php echo $auxtotal;?>" class="guardar_categoria esconder_boton<?php echo $auxtotal;?>  btn"  style="background:#db0a5b; color:#fff; font-size:18px; width:200px; height:30px;">SIGUIENTE</button>
                
        </div>  
        <br/>
        <?php $auxtotal++;?>
           
      <?php endforeach;?>        
             
      <?php endif;?>       
             
             <div align="center">
              <button type="submit" id="guarda_boton" class="esconder_  btn btn-primary"  style="font-size:18px; width:200px; height:30px;">ACEPTAR</button>
             
             <!--input type="image"   name=""  type="submit" value="save" id="guarda_boton" class="esconder_"-->   
             </div>
           
           
        
       
      </div> 
      
      <?php echo form_close(); ?>
     <!-- FIN DE ZONA DE CONTENIDO-->
    
    </div>
    <div class="col-md-4">
    
    		<div class="header_mensajes">CONTACTO</div>
            <div class="mensajes_ color_blanco" align="center">
            	<img src="<?php echo base_url();?>statics/bootstrap/img/info.png"/>
            </div>
    
    </div>
  </div>
  
  
  
   <div class="row show-grid">
    <div class="col-md-12 color_blanco margen50" align="center" >
    <img src="<?php echo base_url();?>statics/bootstrap/img/footer.png"/>
    </div>
    
    
  </div>
  
  
  
</div>

</body>
</html>
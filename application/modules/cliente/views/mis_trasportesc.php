<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONEXION</title>
   <link href="<?php echo base_url();?>statics/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>statics/bootstrap/css/main_estilos.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url().'statics/js/libraries/login.js'; ?>"></script>
 
<style>


.menu12{
position: fixed;
top:0px;
width:100%;
background-color:#00CC00;
color:#fff;
font-size:18px;
font-weight:bold;
}






.CSSTableGenerator {
    margin:0px;
    width:100%;
    border:1px solid #000000;
    
    -moz-border-radius-bottomleft:11px;
    -webkit-border-bottom-left-radius:11px;
    border-bottom-left-radius:11px;
    
    -moz-border-radius-bottomright:11px;
    -webkit-border-bottom-right-radius:11px;
    border-bottom-right-radius:11px;
    
    -moz-border-radius-topright:11px;
    -webkit-border-top-right-radius:11px;
    border-top-right-radius:11px;
    
    -moz-border-radius-topleft:11px;
    -webkit-border-top-left-radius:11px;
    border-top-left-radius:11px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
    width:100%;
    height:100%;
    margin:0px;
    padding: 10px;
}.CSSTableGenerator tr:last-child td:last-child {
    -moz-border-radius-bottomright:11px;
    -webkit-border-bottom-right-radius:11px;
    border-bottom-right-radius:11px;
}
.CSSTableGenerator table tr:first-child td:first-child {
    -moz-border-radius-topleft:11px;
    -webkit-border-top-left-radius:11px;
    border-top-left-radius:11px;
}
.CSSTableGenerator table tr:first-child td:last-child {
    -moz-border-radius-topright:11px;
    -webkit-border-top-right-radius:11px;
    border-top-right-radius:11px;
}.CSSTableGenerator tr:last-child td:first-child{
    -moz-border-radius-bottomleft:11px;
    -webkit-border-bottom-left-radius:11px;
    border-bottom-left-radius:11px;
}.CSSTableGenerator tr:hover td{
    background-color:#ffffff;
        

}
.CSSTableGenerator td{
    vertical-align:middle;
    
    background-color:#e8dfd7;

    border:1px solid #000000;
    border-width:0px 1px 1px 0px;
    text-align:center;
    padding:10px;
    font-size:17px;
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
        background:-o-linear-gradient(bottom, #56524e 5%, #56524e 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #56524e), color-stop(1, #56524e) );
    background:-moz-linear-gradient( center top, #56524e 5%, #56524e 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#56524e", endColorstr="#56524e");  background: -o-linear-gradient(top,#56524e,56524e);

    background-color:#56524e;
    border:0px solid #000000;
    text-align:center;
    border-width:0px 0px 1px 1px;
    font-size:25px;
    font-family:Arial;
    font-weight:bold;
    color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
    background:-o-linear-gradient(bottom, #56524e 5%, #56524e 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #56524e), color-stop(1, #56524e) );
    background:-moz-linear-gradient( center top, #56524e 5%, #56524e 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#56524e", endColorstr="#56524e");  background: -o-linear-gradient(top,#56524e,56524e);

    background-color:#56524e;
}
.CSSTableGenerator tr:first-child td:first-child{
    border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
    border-width:0px 0px 1px 1px;
}
</style>
</head>
<body class="fondo_pantalla">







<div class="container-fluid show-top-margin separate-rows tall-rows tamano1500 fondo_pantalla">

   <div class="row show-grid">
    <div class="col-md-12">
		<br/>
        <br/>
        
</div>
    
  </div>


  <div class="row show-grid">
     <div class="col-md-8">
     	
        <div class="tamano_logo color_blanco"> <a class="btn btn-default menu_texto" href="<?php echo base_url().'/index.php/cliente/'?>" >
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
            <div class="header_banner "> 
            <!-- banner--><?php echo get_banner();?>
            </div>
    		
    
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
        	
              <a class="btn"></a>
               <a class="btn btn-default menu_servicios" href="#"></a>
              <a class="btn"></a>
        </div>
    
    
    </div>
    <div class="col-md-4"></div>
    
  </div>
  <div class="row show-grid">
    <div class="col-md-8">
    
    <!-- AQUI ES DONDE VA HA ESTAR EL CONTENIDO -->
    <div align="center" class="textos_al" >Mis trasportes</div>
    	<div class="margen50" align="center" >
        	
          
          
          
          <div align="center" class="CSSTableGenerator" >

    <table> 
   
     
           <tr>
             <td>Aerolinea</td><td>Ciudad de Salida</td><td>Vuelo</td><td>Fecha llegada</td><td>Hora llegada</td><td>Personas</td>
           </tr>

        <?php if($transportes!=0):?>
        <?php foreach ($transportes as $key => $value):?>

           <tr>
             <td><?php  echo($value["aerolinea"])?></td><td><?php  echo($value["ciudadNombre"])?></td><td><?php  echo($value["vuelo"])?></td><td><?php  echo($value["fecha_llegada"])?></td><td><?php  echo($value["hora_llegada"])?></td><td><?php  echo($value["personas"])?></td>
           </tr>   
        <?php endforeach; ?>
        <?php endif;?>
        
        
         
     
            
        
            </table>
            </div>
             
          
        </div>
        
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
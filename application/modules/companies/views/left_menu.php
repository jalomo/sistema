<?php echo link_tag('statics/css/menu_evento.css'); ?>

<?php echo link_tag('statics/css/menu.css'); ?>


<script>
$(document).ready(function(){

   
    $("#menu_usuarios").click(function(event){
        event.preventDefault();
        //$("#optionsTeams").slideUp('slow');
        
        $(".onption-user").toggle('slow');
		
		$("#menu_user_id").addClass("clase-seleccion");
    });
});	
</script>


<div class="menu- float-">
		<div align="center" style="margin-top:5px;">
         <?php echo img(array('src'=>'statics/img/logo_2.png',
                                 'width'=>'170px')); ?>
		
		</div>
		<div class="margen-top"></div>
        
		<div class="menus-" id="eventos_m">
        <span class="span-top font-nexa"> 
       		 <a href="<?php echo base_url().'/index.php/companies/addEvento'?>" class="menus-texto"> Eventos</a>
        </span></div>
        
       <div class="margen-top"></div>
        
		<div class="menus-" id="usuarios_m">
        <span class="span-top font-nexa"> 
             <a href="<?php echo base_url().'/index.php/companies/usuarios'?>" class="menus-texto"> Usuarios</a>
        </span></div>
        
        <div class="margen-top"></div>
        
        <div class="menus-" id="ciudades_m"><span class="span-top font-nexa"> 
              <a href="<?php echo base_url().'/index.php/companies/ciudades'?>" class="menus-texto"> Ciudades</a>
        </span></div>
        
        <div class="margen-top"></div>
        
		<div class="menus-" id="casa_m"><span class="span-top font-nexa"> 
            <a href="<?php echo base_url().'/index.php/companies/casas'?>" class="menus-texto"> Casas</a>
        </span></div>

        <div class="menus-" id="casasCuartos_m"><span class="span-top font-nexa"> 
             <a href="<?php echo base_url().'/index.php/companies/serviciosCuartos'?>" class="menus-texto" style="font-size:1em;"> Servicios cuartos</a>
        </span></div>

        <div class="menus-" id="codigo_m"><span class="span-top font-nexa"> 
              <a href="<?php echo base_url().'/index.php/companies/createCodigo'?>" class="menus-texto"> Código</a>
       </span></div>

                
        <div class="menus-" id="clientes_eventos_m"><span class="span-top font-nexa"> 
              <a href="<?php echo base_url().'/index.php/companies/clientes'?>" class="menus-texto" style="font-size:1em;"> Clientes eventos</a>
        </span></div>
        
        
        <div class="menus-" id="clientes_trasporte_m"><span class="span-top font-nexa"> 
              <a href="<?php echo base_url().'/index.php/companies/clientes_transportes'?>" class="menus-texto" style="font-size:1em;"> Clientes transportes</a>
        </span></div>
        
        <div class="margen-top"></div>
        
        <div class="menus-" id="clientes_cuartos_m"><span class="span-top font-nexa"> 
        <a href="<?php echo base_url().'/index.php/companies/clientes_cuartos'?>" class="menus-texto" style="font-size:1em;"> Clientes cuartos</a></span></div>

        <div class="margen-top"></div>
        
      
        <div class="menus-" id="crear_boletos_m"><span class="span-top font-nexa"> 
               <a href="<?php echo base_url().'/index.php/companies/crearBoletos'?>" class="menus-texto"> Crear boletos</a>
        </span></div>

        <div class="menus-" id="imprimir_boletos_m"><span class="span-top font-nexa"> 
               <a href="<?php echo base_url().'/index.php/companies/imprimirBoletos'?>" class="menus-texto" style="font-size:1em;">Imprimir boletos</a>
        </span></div>
        
        <!--div class="margen-top"></div>
        
        <div class="menus-" id="trasporte_m"><span class="span-top font-nexa"> 
                <a href="<?php echo base_url().'/index.php/companies/clientes_transportes'?>" class="menus-texto"> Transporte</a>
        </span></div-->
        
        <div class="margen-top"></div>
        
		<div class="menus-" id="mensajes_m"><span class="span-top font-nexa"> 
                <a href="<?php echo base_url().'/index.php/companies/mensajes'?>" class="menus-texto"> mensajes</a>
        </span></div>
        
        <div class="margen-top"></div>
        
		<div class="menus-" id="banner_m"><span class="span-top font-nexa"> 
                <a href="<?php echo base_url().'/index.php/companies/banner'?>" class="menus-texto"> Banner</a></span></div>
        
        <!--div class="margen-top"></div>
        
		<div class="menus-" id="clientes_m"><span class="span-top font-nexa"> 
                <a href="#" class="menus-texto"> Clientes</a>
        </span></div>
        
        <div class="margen-top"></div>
        
		<div class="menus-" id="boletos_m"><span class="span-top font-nexa"> 
                <a href="#" class="menus-texto"> Boletos</a>
        </span></div-->
        
        <div class="margen-top"></div>
        
        <div class="menus-" id="reportes_m"><span class="span-top font-nexa"> 
                <a href="<?php echo base_url().'/index.php/companies/reportes'?>" class="menus-texto"> Reportes</a>
        </span></div>
        
        <div class="margen-top"></div>
        
		<div class="menus-"><span class="span-top font-nexa"> 
                <a href="<?php echo base_url().'/index.php/companies/logout'?>" class="menus-texto"> Salir</a>
        </span></div>


</div>

  <!--<div class="menus-" id="reportes_m"><span class="span-top font-nexa"> <a href="<?php echo base_url().'/index.php/companies/boletos'?>" class="menus-texto"> Boletos</a></span></div> -->
        
<!--div class="menus-" id="servicios_m"><span class="span-top font-nexa"> <a href="<?php echo base_url().'/index.php/companies/servicios'?>" class="menus-texto"> Servicios</a></span></div>
        
        <div class="margen-top"></div-->


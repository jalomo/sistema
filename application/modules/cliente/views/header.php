
<style>
#header_cliente{ width:100%; height:100px; }
.float-left{ float:left;}
.limpiar-div{ clear:both;}
.margen-izquierda100{ margin-right:100px;}

.linea_{ background:#039;}


#menu12{
position: fixed;
top:0px;
width:100%;
background-color:#00CC00;
}
</style>
<div id="header_cliente">
    <div class="float-left">
     <a href="<?php echo base_url().'index.php/cliente/';?>" title="Deposito bancario" style="margin-left:50px">
     <?php /*echo img(array('src'=>'statics/img/logo_1.png',
                                     'width'=>'170px'));*/ ?>
      </a>                               
    </div>
    
    <div align="right" class="margen-izquierda100 font-helvetica">
    
    	
    		Bienvenido  <?php // echo $usuario->usuarioNombre;?>
           
            <a href="<?php echo base_url().'index.php/cliente/logout';?>" title="Deposito bancario" style="margin-left:10px">
    salir
      </a>                               
            
        
    </div>

</div>

<div class="limpiar-div" ></div>

<?php
	$user=$this->clientes->get_info_user($this->session->userdata('id'));
	
	if(isset($user->usuarioTelefonno)&& ($user->usuarioPais!=0) && ($user->usuarioEstado!=0) && isset($user->usuarioSexo) && ($user->usuarioIdCiudad!=0)){
		
		}else{
			echo '<a href="'. base_url().'index.php/cliente/completa_datos" title="Completa tus datos" style=""><div id="menu12" align="center" >COMPLETA TUS DATOS</div></a>';
			}
?>


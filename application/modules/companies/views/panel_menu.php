<style>
.font_login {
    font-family: "Helvetica-ExtraCompressed";
    font-size: 40pt;
	color:#044084;
}

.font_login1 {
    font-family: "Helvetica-ExtraCompressed";
    font-size: 25pt;
	color:#bdc2c6;
}
.div_login{
	background:#ebebeb;
	height:320px;
	width:300px;
	
	border-radius: 25px;
	
	/*background:#ebebeb;*/
	/*height:250px;
	width:300px;
	padding: 10px;
	box-shadow: 4px 4px 4px #c2c6c7;
   -webkit-box-shadow: 4px 4px 4px #c2c6c7;
   -moz-box-shadow: 2px 2px 2px #c2c6c7;*/}
   #div_login::after {
  
  
  opacity: 0.5;
 
}
.texto_login{ font-family: "Helvetica-ExtraCompressed";
    font-size: 20pt;
	color:#636363;
	
	width:200px;
	margin-left:10px;}  
	
.textos_{ width:280px; margin-left:10px; height:40px; border-radius: 10px;}	 


.myButton {
	margin-top:50px;
	background:#3498db;
	color:#fff;
	width:280px;
	margin-left:10px;
	height:35px;
	font-size:18px;
	
}

body{
	
	
	/*background-image:url(../../../../statics/img/fondo pagina 2.png);*/
	
	/* IE10 Consumer Preview */ 
/*background-image: -ms-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);*/

/* Mozilla Firefox */ 
/*background-image: -moz-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);*/

/* Opera */ 
/*background-image: -o-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);*/

/* Webkit (Safari/Chrome 10) */ 
/*background-image: -webkit-gradient(radial, center center, 0, center center, 506, color-stop(0, #FFFFFF), color-stop(1, #ECF0F1));*/

/* Webkit (Chrome 11+) */ 
/*background-image: -webkit-radial-gradient(center, circle closest-corner, #FFFFFF 0%, #ECF0F1 100%);*/

/* W3C Markup, IE10 Release Preview */ 
/*background-image: radial-gradient(circle closest-corner at center, #FFFFFF 0%, #ECF0F1 100%);*/
	}

</style>



<?php echo anchor('companies/checkDataLogin', '', array('id'=>'checkValues', 'style'=>'display: none')); ?>
 <?php echo form_open('companies/mainView', array('onsubmit'=>'return login();')); ?>
 
<table width="500" border="0" align="center">
  <tr>
    <td align="center">
    <div id="errorMessageLogin" style="color: #FF0000; display: none"></div>
            <div id="errorLoginData" style="color: #FF0000; display: none"></div>
             <?php //echo img(array('src'=>'statics/img/bienbenidos.png')); ?>
    	 
    </td>
  </tr>
  <tr>
    <td align="center">
    	<!--span class="font_login">Bienvenido</span-->
    </td>
  </tr>
  <tr>
    <td align="center">
    	<!--span class="font_login1">Por favor ingresa con tu cuenta</span-->
        <?php //echo img(array('src'=>'statics/img/bienbenidos.png')); ?>
       
    </td>
  </tr>
  <tr>
    <td align="center">
    
    	<div class="div_login" align="center">
         <?php echo img(array('src'=>'statics/img/logo_2.png',
                                 'width'=>'170px')); ?>
        	<br/>
        	<!--div class="texto_login" align="left" style="margin-top:20px;">Usuario</div-->
            <div align="center"><input type="text" class="textos_ texto_login"  style="background:#a6a5a5; text-align:center; width:200px; height:30px;" id="loginApplebees" name="Login[adminUsername]" placeholder="USUARIO"/></div>
            <br/>
            <!--div class="texto_login">Contraseña</div-->
            <div align="center"><input type="password" class="textos_ texto_login"  style="background:#a6a5a5 ; text-align:center; width:200px; height:30px;" id="passApplebees" name="Login[adminPassword]" placeholder="CONTRASEÑA"/></div>
            <div> 
            <br/>
            
          <div align="center">
            <input type="image"  src="<?php echo base_url().'/statics/img/boton ingresar.png'?>" name=""  type="submit" value="save"/>
           </div>
     
           <br/>
            </div>
            <div align="center">
            <?php //echo $facebook;?>
            </div>
            <br/>
            
            <!--div align="center"><?php echo anchor('cliente/crea_cuenta', img(array('src'=>'statics/img/btn_registrate.png')), array('id'=>'checkValues', 'style'=>'')); ?> </div-->
            
        </div>
        
    </td>
  </tr>
</table>

<?php echo form_close(); ?>
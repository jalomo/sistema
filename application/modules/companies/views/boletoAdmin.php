

 <!DOCTYPE html>
 <html lang="en">
  <head>
    <meta charset="utf-8">

    <style type="text/css">
      body,html,#wrapper-boleto{
      	width: 100%;
      	height: 100%;
      	margin: 0px;
      	padding: 0px;
      }

      #wrapper_boleto{
      	width: 100%;
      	height: 100%;

      }

      #header-boleto{
         width: 100%;
         height: 15%;
      
         

      }



      #container-boleto{
      	width: 100%;
      	height: 80%;


-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;

      }

      #img-codigo1{
        
        width: 150px;
        height: 70px;
        margin-left: 70px;
        padding-top: -10px;
        padding-bottom: 
        
        
      }

      #footer-boleto{
      	 width: 100%;
        height: 5%;
        margin-top: 0px;
        

      }

      #wrapper-codigo{
        width: 300px;
        margin: 0 auto;
        height: 70px;
        background:#ffffff;
        margin-top: 20px;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
      }

      hr{
        width: 70%;
        margin: 0 auto;
        height: 5px;
        background: #ffffff;
        color:#ffffff;
      }

      #e-nombre p{
        text-align: center;
        color: #ffffff;
        font-size: 5em;
        font-style: bold;

      }

      #e-fecha p{
        text-align: center;
        color: #ffffff;
        font-size: 2.5em;
        font-style: bold;
      }

       #e-precio p {
        text-align: center;
        color: #ffffff;
        font-size: 2.5em;
        font-style: bold;
      }



      #e-link p {
        text-align: center;
        color: #ffffff;
        font-size: 1.5em;
        font-style: bold;
      }

      #p-evento,#p-cliente{
        text-align: center;
      }

      span{
        font-style: bold;
      }
      #mod > div{
         float: left;
      }

      #div-evento{
        margin-top: 0px;
      }

      #wrapper-evento{
        margin-top: -60px;

      }

      #e-hr{
        margin-top: -60px;
      }

      #e-fecha{
        margin-top: -40px;
      }

      #e-precio{
        margin-top: -80px;
      }

      #wrapper-salidas{
        width: 80%;
        margin: 0 auto;
         font-size: 1em;
        font-style: bold;
             background: rgba(255, 255, 255, 0.5);
       color: #000000;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
      }

      #e-salidas{
        text-align: center;
        font-style: bold;
      }

     #wrapper-link{
      margin-top: 30%;
        font-size: 0.6em;

     }
     




    </style>


  </head>
  <body onload="removeItems()">
   
    <div id="wrapper-boleto">
        <div id="header_boleto">
    	   <img src="<?php echo(base_url())?>statics/img_pdf/header_boleto.png"/>
    	  </div>
    	  <div id="container-boleto" style="background:url(<?php echo(base_url()).$dataBoleto[0]['imagen']?>);">

          <div id="wrapper-codigo">
             <div align="center"><?php echo "<img id='img-codigo'  src='codigoBarras_img.php?numero=".$codigo."'/>";?></div>
             <div id="div-evento"><p id="p-evento"><?php echo($dataEvento[0]["eventoNombre"])?></p></div>
               <?php if(is_array($modificadores)):?>
                <div id="mod">
                  <?php foreach ($modificadores as $key => $value):?>

                      <span> 1 <?php echo(" ".$value["nombre"]);?></span>

                   <?php endforeach;?>
                  </div>
               <?php endif;?>
             <div><p id="p-cliente"><span>Cliente: </span><?php echo($nameUser)?></p></div>
          </div>

          <div id="wrapper-evento">
             <div id="e-nombre"><p><?php echo($dataEvento[0]["eventoNombre"]);?></p></div>
             <div id="e-hr"><hr></div>
             <div id="e-fecha"><p><?php echo($dataEvento[0]["eventoFecha"])?></p></div>
             <div id="e-precio"><p>$<?php echo($dataEvento[0]["euPrecio"])?></p></div>
          </div>


          <div id="wrapper-salidas">
             <div id="e-salidas"><p><?php echo($dataBoleto[0]["texto"]);?></p></div>
          </div>


          <div id="wrapper-link">
             <div id="e-link"><p>WWW.CONEXIONMEXICO.COM.MX</p></div>
          </div>



        </div>
    	  <div id="footer-boleto">
    	   <img src="<?php echo(base_url())?>statics/img_pdf/footer_boleto.png"/> 
    	 </div>
    	
    </div>

  </body>
</html>

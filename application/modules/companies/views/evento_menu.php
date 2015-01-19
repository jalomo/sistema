

<style>
body{ background:#fff !important;
}

</style> 

 <span style=" font-size:24px;color:#808080">Menú evento</span>

<br/>
<table width="500" border="0">
  <tr>
    <td> <?php echo anchor('companies/ver_evento/'.$id_evento, 
	'<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Editar evento</button>',
	 array('id'=>'get_id', 'style'=>'')); ?></td>
    <td><?php echo anchor('companies/modificador_categoria/'.$id_evento, 
	'<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Agregar categorias</button>',
	 array('id'=>'get_id', 'style'=>'')); ?></td>
    <td><?php echo anchor('companies/modificadores_nuevo/'.$id_evento, 
		'<button style="background:#34495e; border-color:#34495e; border-radius:5px; color:#fff; font-size:15px; width:200px; height:30px;" class="font-nexa">Agregar modificador</button>',
	 array('id'=>'get_id', 'style'=>'')); ?></td>
    
  </tr>
  
</table>

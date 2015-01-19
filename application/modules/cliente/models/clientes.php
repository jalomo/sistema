<?php
/**

 **/
class clientes extends CI_Model{

    /**

     **/
    public function __construct()
    {
        parent::__construct();
    }
	
	
	public function updata_status($id){
		$this->db->update('eventosusuarios', array('euStatus'=>1), array('codigoBarras'=>$id));		
	}
	
	/*
	* metodo para cambiar el status de un usuario(hombre o mujer)
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function updata_user_tipo($id,$sexo){
		$this->db->update('usuarios', array('usuarioSexo'=>$sexo), array('usuarioId'=>$id));		
	}
	
	/*
	* volcado de categorias.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_categorias($id_evento){
		//$this->db->where('categoriaIdEvento',$id_evento);
		
		//$this->db->order_by("categoriaStatus", "desc");
		 
		$query=$this->db->query(" SELECT *
        FROM modificador_categoria
		where categoriaIdEvento=$id_evento
        ORDER BY categoriaStatus ASC
		
		");
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para obtener los modificadores por categorias.
	*autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_modificador_categoria($id_categori){
	 $this->db->where('modificadorIdCategoria',$id_categori);
	 $query=$this->db->get('modificadores');
	 if($query->num_rows()>0){
		 return $query->result();	 
	  }else{
		    return 0;
	  }
	 
	
	}
	
	/*
	* metodo para obtener los mensajes de un usuarios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_mensajes_user($id_user){
		$this->db->where('msjIdUser',$id_user);	
		$this->db->order_by("msjStatus", "asc"); 
		$query=$this->db->get('mensajesusuarios');
		if($query->num_rows()>0){
			return $query->result();
		}else{
		 return 0;	
		}
	}
	
	/*
	* metodo para modificar la tabla usuariosmensajes.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function modifica_mensaje($id_user,$id_mensaje){
		$this->db->update('mensajesusuarios', array('msjStatus'=>1), array('msjIdUser'=>$id_user,'msjIdMensaje'=>$id_mensaje));		
	}
	
	/*
	* metodo para obtener el texto de un mensaje.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_texto_mensaje($id_mensaje){
		$this->db->where('mensajeId',$id_mensaje);
		$query=$this->db->get('mensajes');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->mensajeContenido;
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para obtener el sexo de un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_sexo($id_user){
		$this->db->where('usuarioId',$id_user);
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->usuarioSexo;
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para seleccionar un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_info_user($id_user){
		$this->db->where('usuarioId',$id_user);
		$query=$this->db->get('usuarios');	
		if($query->num_rows()>0){
			return $query->row();	
		}else{
			return 0;
		}
		
	}
	
	/*
	* metodo para editar un usuario.
	+ autir: jalomo <jalomo@hotmail.es>
	*/
	public function edita_usuario($id,$data){
		$this->db->update('usuarios', $data, array('usuarioId'=>$id));	
	}
	
	/*
	* metodo para obtener el email de un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_email_user($id_user){
		$this->db->where('usuarioId',$id_user);	
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return "";	
		}
	}
	
	/*
	* metodo para obtener las ciudades exvistentes.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_ciudades_(){
		$this->db->where('ciudadStatus',0);
		$query=$this->db->get('ciudades');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para obtener la ciudad.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_ciudades_nombre($id){
		$this->db->where('ciudadId',$id);
		$query=$this->db->get('ciudades');
		if($query->num_rows()>0){
			$res= $query->row();
			return $res->ciudadNombre;
		}else{
			return 0;	
		}	
	}
	
	
	public function get_casas($id){
		$this->db->where('casaIdCiudad',$id);
		$query=$this->db->get('casas');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}	
	}
	
	public function get_casa_id($id){
		$this->db->where('casaId',$id);
		$query=$this->db->get('casas');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;	
		}	
	}
	
	public function save_table($data,$table){
		$this->db->insert($table, $data);
        return $this->db->insert_id();
	}
	
	/*
	*metodo para obtener las ciudades.
	* autor: jalomo <jalomo@hotmail.rd>
	*/
	public function get_ciudades(){
		$this->db->where('ciudadStatus',0);
		$query=$this->db->get('ciudades');
		return $query->result();
	}
	
	/*
	* metodo para obtener un evento con su id.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_evento_id($idevento){
		$this->db->where('eventoId',$idevento);
		$query=$this->db->get('eventos');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para obtener los modificadores de un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_modificadores_eventos($idevento){
		$this->db->where('modificadorIdEvento',$idevento);
		$query=$this->db->get('modificadores');
		if($query->num_rows()>0){
			return $query->result();	
		}else{
			return 0;	
		}	
	}
	
	/*
	* metodo para obtener los datos del cliente.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_data_user($id)
    {
        $this->db->where('usuarioId', $id);
       
        $data = $this->db->get('usuarios');
        return $data->row();
    }
	
	/*
	* metodo para obtener el nombre del servicio.
	+ autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_name_servicio($idservicio){
		$this->db->where('servicioId',$idservicio);
		$query=$this->db->get('servicios');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->servicioNombre;
		}else{
			return 'no disponible';	
		}	
	}
	
	/*
	* metodo para obtener el nombre del eventos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_name_evento($idevento){
		$this->db->where('eventoId',$idevento);
		$query=$this->db->get('eventos');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->eventoNombre;
		}else{
			return 'no disponible';	
		}		
	}
	
	public function get_costo_evento($idevento){
		$this->db->where('eventoId',$idevento);
		$query=$this->db->get('eventos');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->eventoPrecioBase;
		}else{
			return 'no disponible';	
		}		
	}
	
	public function get_lugares_evento($idevento){
		$this->db->where('eventoId',$idevento);
		$query=$this->db->get('eventos');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->eventoLugares;
		}else{
			return 'no disponible';	
		}		
	}
	
	/*
	* metodo para obtener todos los servicios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_servicios(){
		
		$query=$this->db->get('servicios');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}
	
	public function get_servicios_usuarios($iduser){
		$this->db->where('suIdUsuario',$iduser);
		$query=$this->db->get('serviciousuario');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}
	
	/*
	* metodo para obtener los eventos de un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_eventos_usuarios($iduser){
		$this->db->where('euIdUsuario',$iduser);
		$query=$this->db->get('eventosusuarios');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}
	
	
	
	/*
	* metodo para obtener los datos de un servicio.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_servicio_id($id_servicio){
		$this->db->where('servicioId',$id_servicio);
		$query=$this->db->get('servicios');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;	
		}
		
	}
	
	/*
	* metodo para obtener los eventos
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_alla_eventos(){
		$data = $this->db->get('eventos');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	/*
	* metodo para sacar los servicios de un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	
	public function get_servicios_usuario($cadena,$id_cliente){
		$ser=$cadena;	
		$ser=explode(",",$ser);
		
		
		$aux=0;
		$retorna='';
		
		foreach($ser as $servicios):
			$servicios[$aux];
			$si=$this->get_evento_s($id_cliente,$servicios[$aux]);
			if($si==1){
				$retorna=1;
				break;	
			}else{
					$retorna.=$si;
			}
		
		endforeach;
		return $retorna;

	}
	
	
	/*
	* metodo para obtener los servicios de alojamiento de unusuario
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_servicios_alojamiento($id_user){
		$this->db->where('servicioCategoria',1);	
		$query=$this->db->get('servicios');
		if($query->num_rows()>0){
			$response=array();
			foreach($query->result() as $resultado):
			
				
				$res1=$this->get_servicios_usuario($resultado->servicioIdEventos,$id_user);
				if(($res1==1 )|| ($resultado->servicioIdEventos==0) ){
					
					$res=array();
					$res['servicioId']=$resultado->servicioId;
					$res['servicioNombre']=$resultado->servicioNombre;
					$res['servicioCosto']=$resultado->servicioCosto;
					$res['servicioStatus']=$resultado->servicioStatus;
					$res['servicioPuntos']=$resultado->servicioPuntos;
					$res['servicioIdEventos']=$resultado->servicioIdEventos;
					$res['servicioTipo']=$resultado->servicioTipo;
					$res['servicioCategoria']=$resultado->servicioCategoria;
					array_push($response, $res);	
				}
				
				
			endforeach;
			return $response;
			
		}else{
			return 0;	
		}
	}
	
	public function get_servicios_trasporte($id_user){
		$this->db->where('servicioCategoria',2);	
		$query=$this->db->get('servicios');
		if($query->num_rows()>0){
			$response=array();
			foreach($query->result() as $resultado):
			
				
				$res1=$this->get_servicios_usuario($resultado->servicioIdEventos,$id_user);
				if(($res1==1 )|| ($resultado->servicioIdEventos==0) ){
					
					$res=array();
					$res['servicioId']=$resultado->servicioId;
					$res['servicioNombre']=$resultado->servicioNombre;
					$res['servicioCosto']=$resultado->servicioCosto;
					$res['servicioStatus']=$resultado->servicioStatus;
					$res['servicioPuntos']=$resultado->servicioPuntos;
					$res['servicioIdEventos']=$resultado->servicioIdEventos;
					$res['servicioTipo']=$resultado->servicioTipo;
					$res['servicioCategoria']=$resultado->servicioCategoria;
					array_push($response, $res);	
				}
				
				
			endforeach;
			return $response;
			
		}else{
			return 0;	
		}
	}
	
	public function get_servicios_alimentos($id_user){
		$this->db->where('servicioCategoria',3);	
		$query=$this->db->get('servicios');
		if($query->num_rows()>0){
			$response=array();
			foreach($query->result() as $resultado):
			
				
				$res1=$this->get_servicios_usuario($resultado->servicioIdEventos,$id_user);
				if(($res1==1 )|| ($resultado->servicioIdEventos==0) ){
					
					$res=array();
					$res['servicioId']=$resultado->servicioId;
					$res['servicioNombre']=$resultado->servicioNombre;
					$res['servicioCosto']=$resultado->servicioCosto;
					$res['servicioStatus']=$resultado->servicioStatus;
					$res['servicioPuntos']=$resultado->servicioPuntos;
					$res['servicioIdEventos']=$resultado->servicioIdEventos;
					$res['servicioTipo']=$resultado->servicioTipo;
					$res['servicioCategoria']=$resultado->servicioCategoria;
					array_push($response, $res);	
				}
				
				
			endforeach;
			return $response;
			
		}else{
			return 0;	
		}
	}
	
	/*
	* metodo para obtener un eventos del usuario.
	* autor: jalomo <jalomo@htomail.es>
	*/
	public function get_evento_s($idcliente,$idevento){
			$this->db->where('euIdUsuario',$idcliente);
			$this->db->where('euIdEvento',$idevento);
			$query=$this->db->get('eventosusuarios');
			if($query->num_rows()>0){
				return 1;
			}else{
				return 0;	
			}
	}

	//Inicio de funciones DACV

public function getCasaCuartos($id){
      $query="SELECT * FROM cuartos_casas WHERE idCasa = ? ";
      $result;
      $res = $this->db->query($query,array($id));

  	 if($res->num_rows()>0){
  	 	$result= $res->result_array(); 
          /*if($asignados->num_rows>0){
              foreach ($servicios->result() as $srv) {
              	    $flag=0;
              	    $idsrv= $srv->id;
                    foreach ($asignados->result() as $asg) {*/
    }

    else{
      $result="0";
    }

    return $result;

  }

  public function getServiciosCuarto($idcuarto,$idcasa){
  	 $result;
  	 settype($idcuarto, "integer");
  	 settype($idcasa, "integer");
  	 $query="SELECT servicios_cuartos.nombre  
  	 FROM servicios_cuartos,cuartos_servicios 
  	 WHERE servicios_cuartos.id = cuartos_servicios.idServicio 
  	 AND cuartos_servicios.idCuarto = ? 
  	 AND cuartos_servicios.idCasa = ? ";
  	 $res = $this->db->query($query,array($idcuarto,$idcasa));
  	 if($res->num_rows>0){
        $result= $res->result_array();

  	 }
  	 else{
  	 	$result[0]= array("nombre"=>"-1");
  	 }

  	 return $result;
  }

  

    public function saveTrans($aereo,$vuelo,$fecha,$hour,$city,$personas,$user){
          settype($city, "integer");
          settype($user, "integer");
  	      $data = array(
             'aerolinea' => $aereo ,
             'origen' => $city ,
             'vuelo' => $vuelo,
             'fecha_llegada' =>$fecha,
             'hora_llegada'=>$hour,
             'personas'=>$personas,
             'status'=>2,
             'userId'=>$user);

            $res =  $this->db->insert('transportes', $data); 
            return $res;

  }

    public function getCiudades(){
  	$result;
  	$query="SELECT ciudadId, ciudadNombre
  	        FROM ciudades 
  	        WHERE ciudadStatus = 0";
  	$res = $this->db->query($query); 
  	if($res->num_rows>0){
        $result= $res->result_array();

  	 }  

  	 else{
  	 	$result="0";
  	 }  

  	 return $result;  
  }
	
	
	
  public function saveRegPago($tipo,$status,$idu,$ide,$idc,$cst,$mod,$tot){
  	settype($idu, "integer");
  	settype($ide, "integer");
  	settype($idc, "integer");
    
    $codigoBarras = $this->createNewCodigo();

  	$res;
  	$idRow;


    
  	   $data = array(
             'euIdUsuario' => $idu ,
             'euIdEvento' => $ide ,
             'euIdVendedor' => 0,
             'euTipoPago' =>$tipo,
             'euStatus'=>$status,
             'euUrlImage'=>"pendiente",
             'euPrecio'=>$cst,
             'euIdCiudad'=>$idc,
             'codigoBarras'=>$codigoBarras);

              $this->db->insert('eventosusuarios', $data);
			 $res=$this->db->insert_id();
       
           if($res>0){
             $res = $codigoBarras;
           	$last = "SELECT euId FROM eventosusuarios ORDER BY euId DESC LIMIT 1";
           	$r = $this->db->query($last);
           	if($r->num_rows>0){
              foreach ($r->result() as $row) {
                   $idRow = $row->euId;
                   break;  
              }
             } 

              if(is_array($mod)){
                foreach ($mod as $modificador => $value) {
                   $item = explode("-", $value);
                   $data = array(
                    'modModificadorId' => $item[0] ,
                    'modEventoId' => $ide ,
                    'modUserId' => $idu,
                    'modStatus' =>$tipo,
                    'modNombre'=>$item[1],
                    'modPrecio'=>$item[2],
                    'rowEventosUsuarios'=>$idRow
                     );
                 $res2 =  $this->db->insert('moduser', $data);  
           


                }
              }  

           }

           else{
              $res=0;

           }


         return $res;
  }

  public function saveRegPagoCuarto($tipo,$status,$idu,$idca,$casanombre,$idcu,$sennia,$costo,$idc){
    
    settype($idu, "integer");
    settype($idca, "integer");
  	settype($idcu, "integer");
  	settype($idc, "integer");
  	$res;
  	$idRow;
  	$data = array(
             'IdUsuario' => $idu ,
             'IdCasa' => $idca ,
             'casaNombre' => $casanombre,
             'idCuarto' =>$idcu,
             'sennia'=>$sennia,
             'costo'=>$costo,
             'idCiudad'=>$idc,
             'tipoPago'=>$tipo,
             'status'=>$status);

            $res =  $this->db->insert('cuartos_usuarios', $data);

      return $res; 
  }

  public function getDatCuarto($idc){
      settype($idc, "integer");
      $result;
      $query="SELECT casaId, casaNombre, casaIdCiudad, casaPagoPayPal, casaPagoDeposito, casaPagoOxxo,casaPagoContado,
                     idCuarto, sennia, precio 
              FROM   casas, cuartos_casas
              WHERE  cuartos_casas.idCuarto = ? AND cuartos_casas.idCasa = casas.casaId       ";
      $res = $this->db->query($query,array($idc)); 
      if($res->num_rows>0){
        $result= $res->result_array();

  	  } 
  	  else{
  	  	$result=0;
  	  }
      return $result;       

  }

  public function getUserEventos($idUser){
     $result;
     settype($idUser, "integer");
     $query="SELECT eventos.eventoId, eventos.eventoUrlImage, eventosusuarios.euId
          FROM eventos, eventosusuarios 
          WHERE eventos.eventoId = eventosusuarios.euIdEvento AND eventosusuarios.euIdUsuario = ? ";
    $res = $this->db->query($query,array($idUser));
    if($res->num_rows>0){
        $result= $res->result_array();

  	 } 
    else{
 	  $result = 0;
    } 

    return $result;      
	
   }

   public function getDataCompra($ide,$idu,$idr){
     $result;
   	 settype($ide, "integer");
   	 settype($idu, "integer");
   	 settype($idr, "integer");
     $query;

     $test="SELECT * FROM moduser WHERE modEventoId = ? AND modUserId = ? AND rowEventosUsuarios = ?";
     $res = $this->db->query($test,array($ide,$idu,$idr));
     if($res->num_rows>0){
        	 $query="SELECT eventos.eventoId,eventos.eventoNombre,eventos.eventoUrlImage,eventosusuarios.codigoBarras,eventosusuarios.euStatus, eventosusuarios.euPrecio,ciudades.ciudadNombre,moduser.modNombre,moduser.modPrecio   
   	           FROM eventos, eventosusuarios,ciudades, moduser 
   	           WHERE eventos.eventoId = eventosusuarios.euIdEvento AND eventosusuarios.euIdEvento= ? AND eventosusuarios.euIdCiudad = ciudades.ciudadId AND moduser.modUserId = eventosusuarios.euIdUsuario AND moduser.modEventoId = ? AND eventosusuarios.euId = ?";
               $res = $this->db->query($query,array($ide,$ide,$idr));
         if($res->num_rows>0){
             $result= $res->result_array();

  	      } 
         else{
 	       $result = 0;
         } 
  	 }

  	 else{
        
        $query="SELECT eventos.eventoId,eventos.eventoNombre,eventos.eventoUrlImage,eventosusuarios.codigoBarras,eventosusuarios.euStatus, eventosusuarios.euPrecio,ciudades.ciudadNombre  
   	           FROM eventos, eventosusuarios,ciudades
   	           WHERE eventos.eventoId = eventosusuarios.euIdEvento AND eventosusuarios.euIdEvento= ? AND eventosusuarios.euIdCiudad = ciudades.ciudadId AND eventosusuarios.euId = ?";
        $res = $this->db->query($query,array($ide,$idr));
          if($res->num_rows>0){
             $result= $res->result_array();

  	      } 
         else{
 	       $result = 0;
         } 
  	 }

  	}

     public function getModificadoresEventoUsuario($ide,$idu,$idr){
     $result;
   	 settype($ide, "integer");
   	 settype($idu, "integer");
   	 settype($idr, "integer");
     $query="SELECT * FROM moduser WHERE modEventoId = ? AND modUserId = ? AND rowEventosUsuarios = ?";
     $res = $this->db->query($query,array($ide,$idu,$idr));
     if($res->num_rows>0){
     	$result= $res->result_array();
     }

     else{
     	$result =0;
     }
     
    return $result;	 

}

public function getModificadoresEvento($idu,$ide){
	$result=0;
	$sexo;
	 settype($ide, "integer");
   	 settype($idu, "integer");
	$query="SELECT usuariosexo FROM usuarios WHERE usuarioId = ?";
	$res = $this->db->query($query,array($idu));
    if($res->num_rows>0){
         foreach ($res->result() as $row) {
             $sexo = $row->usuariosexo;
             break;  
         }
    } 

    if($sexo=="Hombre"){
     $query="SELECT modificadorId, modificadorNombre, modificadorPrecio AS  precio
             FROM modificadores WHERE modificadorIdEvento = ?";
    }

    else{
       $query="SELECT modificadorId, modificadorNombre, modificadorPrecioM AS precio
             FROM modificadores WHERE modificadorIdEvento = ?";
    }

    $res = $this->db->query($query,array($ide));
    if($res->num_rows>0){
        $result= $res->result_array();
    } 

    return $result;


}

   public function getDataEventoUsuario($ide,$idu,$idr){
   	 
   	 $result;
   	 settype($ide, "integer");
   	 settype($idu, "integer");
   	 settype($idr, "integer");
     $query="SELECT eventos.eventoId,eventos.eventoNombre,eventos.eventoUrlImage,eventosusuarios.codigoBarras,eventosusuarios.euStatus, eventosusuarios.euPrecio,ciudades.ciudadNombre FROM eventos, eventosusuarios,ciudades WHERE eventos.eventoId = eventosusuarios.euIdEvento AND eventosusuarios.euIdEvento= ? AND eventosusuarios.euIdCiudad = ciudades.ciudadId AND eventosusuarios.euId = ?";
     $res = $this->db->query($query,array($ide,$idr));
     if($res->num_rows>0){
     	$result= $res->result_array();
     }

     else{
     	$result =0;
     }
     
    return $result;	

  

  
   }

   public function getDataBoleto($idEvento){
   	  $result;
   	  settype($idEvento, "integer");
  	  $query = "SELECT imagen,texto FROM eventos_boletos WHERE idEvento = ?";
  	  $res = $this->db->query($query,array($idEvento));
  	  if($res->num_rows>0){
        
          $result = $res->result_array();
      }

     else{
     	$result="0";
     }

    return $result;

   }

   public function getNameUser($idu){
     settype($idu, "integer");
      $name;
   	  $query="SELECT usuarioNombre FROM usuarios WHERE usuarioId = ?";
   	  $res = $this->db->query($query,array($idu));
   	  if($res->num_rows>0){
              foreach ($res->result() as $row) {
                     $name = $row->usuarioNombre;  
              }
       }

       else{
       	 $name="0";
       }

       return $name;
   }

   public function getDataEvento($ide,$idu){
   	     settype($ide, "integer");
   	     settype($idu, "integer");
      $data;
   	  $query="SELECT eventos.eventoNombre,eventos.eventoFecha,eventosusuarios.euPrecio 
   	  FROM eventos,eventosusuarios 
   	  WHERE eventos.eventoId = ? AND eventos.eventoId = eventosusuarios.euIdEvento AND eventosusuarios.euIdUsuario = ?";
   	  $res = $this->db->query($query,array($ide,$idu));
   	  if($res->num_rows>0){
              foreach ($res->result() as $row) {
                     $data = $res->result_array(); 
              }
       }

       else{
       	 $data="0";
       }

       return $data;

   }

   public function savePagoModExtras($modificadores,$tipo){
      $idTicket=0; 
      $total=0;
      $res;
      settype($tipo, "integer");
      foreach ($modificadores as $key => $value) {
            
            $array = explode("-", $value);
            $total+= $array[5];


      	
      }

      $referencia = $modificadores[0];
      $array = explode("-",$referencia);
                $data = array(
                    'idUser' => $array[0],
                    'idEvento' => $array[1],
                    'idRow' => $array[2],
                    'status' =>"3",
                    'tipoPago' =>$tipo,
                    'fichaDeposito'=>"pendiente",
                    'total'=> $total
                    
                     );
                 $res =  $this->db->insert('ticket_mod_extras', $data);

       
       if($res==1){
         $last= "SELECT id FROM ticket_mod_extras ORDER BY id DESC LIMIT 1";
         $r = $this->db->query($last);
         if($r->num_rows>0){
              foreach ($r->result() as $row) {
                     $idTicket = $row->id; 
                     break;
              }
        }


       foreach ($modificadores as $key => $value) {
       	   
       	   $array = explode("-", $value);
       	       $data = array(
                    'modificadorId' => $array[3],
                    'modNombre' => $array[4],
                    'modPrecio' => $array[5],
                    'idTicket'=>$idTicket
                    
                     );
                 $res2 =  $this->db->insert('mod_extras', $data);


       }

       }

       else{
       	$res=0;
       }
      return $res;
   }

   public function totalTicketsExtras($idu,$ide,$idr){
   	 $total=0;
   	 $result;
     $query="SELECT id AS ticket FROM ticket_mod_extras WHERE idUser = ? AND idEvento = ? AND idRow = ?";
     $res = $this->db->query($query,array($idu,$ide,$idr));
      if($res->num_rows>0){
              
                  $result = $res->result_array(); 
             
       }

      else{
      	 $result=0;
      } 

      return $result;


   }

   public function dataTicketExtra($idu,$ide,$idr,$ticket){
   	settype($ticket, "integer");
   	settype($idu, "integer");
   	settype($ide, "integer");
   	settype($idr, "integer");
   	$result;
   	 $query="SELECT ticket_mod_extras.id AS ticket, ticket_mod_extras.idUser as idu , ticket_mod_extras.idEvento as ide, ticket_mod_extras.idRow as idr, ticket_mod_extras.status as status, ticket_mod_extras.fichaDeposito as ficha, ticket_mod_extras.total as total, mod_extras.modificadorId as idm, mod_extras.modNombre as nombre, mod_extras.modPrecio as precio
   	         FROM ticket_mod_extras, mod_extras 
   	         WHERE ticket_mod_extras.id  = ?  AND ticket_mod_extras.idUser = ? AND ticket_mod_extras.idEvento = ? AND ticket_mod_extras.idRow = ? AND ticket_mod_extras.id = mod_extras.idTicket AND ticket_mod_extras.status <> 2";
      
     $res = $this->db->query($query,array($ticket,$idu,$ide,$idr)); 
      if($res->num_rows>0){
              
             $result = $res->result_array(); 
             
       }

       return $result;

     

   }

   public function fichaPagoModExtra($path,$ticket){
      
      settype($ticket, "integer");
      $query="UPDATE ticket_mod_extras SET fichaDeposito = ? WHERE id = ?";
      $res = $this->db->query($query,array($path,$ticket)); 
      return $res;

   }

   public function fichaPagoEvento($path,$idu,$ide,$idr){

      settype($idu, "integer");
      settype($ide, "integer");
      settype($idr, "integer");
      $query="UPDATE eventosusuarios SET euUrlImage = ? WHERE euId = ? AND euIdUsuario = ? AND euIdEvento = ?";
      $res = $this->db->query($query,array($path,$idr,$idu,$ide)); 
      return $res;

   }

   //daniel
	public function createNewCodigo(){
		$patron;
        $query="SELECT codigo FROM codigo WHERE id = 1";
        $res= $this->db->query($query);
        foreach ($res->result() as $row) {
         	$patron = $row->codigo;
               
         }

        $left= rand(100,999); 
        $right= rand(100,999);
        $codigo = "".$left.$patron.$right;
        
         $data = array('codigo'=>$patron+1);
         $this->db->where('id',1);
         $res =  $this->db->update('codigo',$data);


        return $codigo;
	}

	public function getModificadoresBoleto($idu,$ide,$idr){
          $modbasicos;
          $modextras;
          $modtotal;
          $index=0;
          $tickets;
          $query="SELECT modNombre as nombre FROM moduser WHERE modUserId = ? and modEventoId = ? AND rowEventosUsuarios = ?";
          $res = $this->db->query($query,array($idu,$ide,$idr));
          if($res->num_rows>0){
              
             foreach ($res->result() as $row){

                   	  $modtotal[$index] = array("nombre"=>$row->nombre);
                   	  $index++;
                   }
             
          }

        


          $query="SELECT id AS ticket FROM ticket_mod_extras WHERE idUser = ? AND idEvento = ? AND idRow = ? AND status = 'Pagado'";
          $tickets = $this->db->query($query,array($idu,$ide,$idr));
          if($tickets->num_rows>0){
              
            // $tickets = $res->result_array(); 

             foreach ($tickets->result() as $row1) {
                
                $query ="SELECT modNombre AS nombre FROM mod_extras WHERE idTicket = ? ";
                $res = $this->db->query($query,array($row1->ticket));
                if($res->num_rows>0){
                  
                   foreach ($res->result() as $row2){

                   	  $modtotal[$index] = array("nombre"=>$row2->nombre);
                   	  $index++;
                   }



                }
             	
             }
             
          }

         

       return $modtotal;


	}

	public function get_clientes_transportes($idu){
	
		$transportes;
		$result;
		$count=0;
		$query="";
		settype($idu, "integer");
        $query="SELECT  usuarios.usuarioId, usuarios.usuarioNombre, transportes.id, transportes.aerolinea,
                        ciudades.ciudadNombre, transportes.vuelo, transportes.fecha_llegada, transportes.hora_llegada,
                        transportes.personas, transportes.status
                FROM usuarios, transportes,ciudades
                WHERE usuarios.usuarioId = ? AND transportes.userId = ? AND transportes.origen = ciudades.ciudadId";
        $res = $this->db->query($query,array($idu,$idu)); 
        if($res->num_rows()>0){
		
	          $transportes = $res->result_array(); 
             
        }

        else{
        	$transportes="0";
        }

        return $transportes;

  }

	
	/*
	* metodo para validar el email del usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function valida_email($email){
		$this->db->where('usuarioEmail',trim($email));
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			return 1;
		}else{
			return 0;	
		}	
	}
	
	 public function getUserCuartos($idu){
   		settype($idu, "integer");
  		$result;
   		$query="SELECT  id, idUsuario, idCasa, casaNombre, idCuarto, sennia, costo, tipoPago, status, ciudades.ciudadNombre  FROM cuartos_usuarios, ciudades WHERE idUsuario = ? AND ciudades.ciudadId = cuartos_usuarios.idCiudad";
   		$res = $this->db->query($query,array($idu));
    	if($res->num_rows>0){
        $result= $res->result_array();

     	} 
    	 else{
      	$result=0;
    	 }

     	return $result;

  }



}

<?php
/**

 **/
class Company extends CI_Model{

    /**

     **/
    public function __construct()
    {
        parent::__construct();
    }
	
	 public function save_casas($data)
    {
        $this->db->insert('casas', $data);
        return $this->db->insert_id();
    }
	
	 public function save_ciudades($data)
    {
        $this->db->insert('ciudades', $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para guardar un mensaje.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_mensaje($data)
    {
        $this->db->insert('mensajes', $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para obtener volcado de todos los mensajes*
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_all_mensajes(){
		$query=$this->db->get('mensajes');	
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}
	}
	
	/*
	* metodo para obtener los usuarios de una dicha ciudad.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_usuario_ciudad($id_ciudad){
		$this->db->where('usuariosIdCiudad',$id_ciudad);	
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			return $queri->result();
		}else{
			return 0;	
		}
	}
	
	/*
	* metodo para obtener el id del usuarios de un evento en espesifico.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_usuario_evento($id_evento){
		$this->db->where('euIdEvento',$id_evento);	
		$query=$this->db->get('eventosusuarios');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;	
		}
	}
	
	/*
	* metodo para guardar en la tablamensajes usuarios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_mensaje_usuarios($data)
    {
        $this->db->insert('mensajesusuarios', $data);
        return $this->db->insert_id();
    }
	
	
	/*
	* metodo para guardar una categoria.
	+ autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_categoria($data)
    {
        $this->db->insert('modificador_categoria', $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para eliminar una categoria.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function delete_categoria($id){
		 $this->db->delete('modificador_categoria', array('categoriaId'=>$id));	
	}
	
	/*
	* metodo para eliminar una ciudad.
	* autor : jalomo <jalomo@hotmail.es>
	*/
	public function delete_ciudad($id){
		$this->db->update('ciudades', array('ciudadStatus'=>1), array('ciudadId'=>$id));	
	}
	
	
	
	/*
	* metodo para mostrar una ciudad con su id.
	* autor <jalomo@hotmail.es>
	*/
	public function get_ciudad_id($id_ciudad){
		$this->db->where('ciudadId',$id_ciudad);
		$query=$this->db->get('ciudades');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->ciudadNombre;
		}else{
			return 0;	
		}
	}
	
	/*
	* metoto para obtener volcado de eventos para watable
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_eventos_table(){
		
		$data=$this->db->get('eventos');
		if($data->num_rows()){
			$resultado=$data->result();
				
				$response=array();
				foreach($resultado as $pregunta):
					$res=array();
					$res['eventoId']=$pregunta->eventoId;
					$res['eventoNombre']=$pregunta->eventoNombre;
					$res['eventoFecha']=$pregunta->eventoFecha;
					$res['eventoLugares']=$pregunta->eventoLugares;
					$res['eventoPuntos']=$pregunta->eventoPuntos;
					array_push($response, $res);
					
				endforeach;
				return $response;
			
		}else{
			return 0;
		}
	}
	
	
	/*
	* metodo para obtener la lista de ciudades.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_ciudades(){
		$user=$this->Company->get_ciudad_eve();
		$resul='<select id="ciudad_id" name="mod[ciudad][]" style=" width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;">';
		foreach($user as $usuario):
			
			$resul.='<option value="'.$usuario->ciudadId.'">'.$usuario->ciudadNombre.'</option>';
		
		endforeach;
		$resul.="</select>";
		echo $resul;
	}
	
	
	/*
	*  metodo para obtener volcado de las casa.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_casas(){
		$query=$this->db->get('casas');
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
	* metodo para ordenar las categorias.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function reordenar($id, $orden) {
   
 
		
		
     $query=$this->db->query("UPDATE modificador_categoria
        SET  	categoriaStatus = $orden
        WHERE categoriaId = $id");		
		
 
    if ($query) return true;
    return false;
	}
	
	
	/*
	* metodo para obtener volcado de todas las ciudades disponibles.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_ciudad_eve(){
		$this->db->where('ciudadStatus',0);
		$data = $this->db->get('ciudades');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	/*
	* metodo para obtener el id del facebook del usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_id_facebook($id){
		$this->db->where('usuarioIdFacebook',$id);	
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			$resultado=$query->row();
			return 	$resultado->usuarioId;
		}else{
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
			
				
				$res=$this->get_servicios_usuario($resultado->servicioIdEventos,$id_user);
				if($res==1){
					array_push($response, $resultado);	
				}
				
				
			endforeach;
			return (object)$response;
			
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
	
	/**/
	public function get_ser_user($id_eventos, $id_user){
		$this->db->where('euIdUsuario', $id_user);	
		$this->db->where('euIdEvento', $id_eventos);
		
		$this->db->select('*');
		$this->db->from('servicios');
		$this->db->join('eventosusuarios', 'eventosusuarios.euIdEvento = servicios.servicioId');
		
		$query = $this->db->get();	
	}
	
	/*
	* metodo paraguasrdar un evento 
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_eventos_($data){
		$this->db->insert('eventos', $data);
        return $this->db->insert_id();
	}
	/*
	* metodo para editar un evento
	*/
	public function edita_evento($data,$id){
	 $this->db->update('eventos', $data, array('eventoId'=>$id));	
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
	* metodo para obtener los datos de un evento
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_evento_id($id){
		$this->db->where('eventoId',$id);
		$query=$this->db->get('eventos');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	/*
	* obyeber los datos de un modificador.
	* autor : jalomo <jalomo@hotmail.es>
	*/
	public function get_modificador_evento($id){
		$this->db->where('modificadorId',$id);
		$query=$this->db->get('modificadores');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	/*
	* metodo para eliminar un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function eliminar_evento($id){
		 $this->db->delete('eventos', array('eventoId'=>$id));	
	}
	
	/*
	* metodo para eliminar una casa.
	* autor : jalomo <jalomo@hotmail.es>
	*/
	public function delete_casa($id){
		 $this->db->delete('casas', array('casaId'=>$id));	
	}
	
	/*
	* metodo para obtener los modificadores de un evento
	* autor; jalomo <jalomo@hotmail.es>
	*/
	public function get_modificador_id($id){
		$this->db->where('modificadorIdEvento',$id);
		$query=$this->db->get('modificadores');
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
	
	public function get_modificador_usuario($id_user){
		$this->db->where('modUserId',$id_user);
		$data = $this->db->get('moduser');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}		
	}
	
	
	/*
	* metodo para obtener el nombre del modificador.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_name_modificador($id_mod){
		$this->db->where('modificadorId',$id_mod);
		$query=$this->db->get('modificadores');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->modificadorNombre;
		}else{
			return 'no disponible';	
		}		
	}
	
	public function get_precio_modificador($id_mod){
		$this->db->where('modificadorId',$id_mod);
		$query=$this->db->get('modificadores');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->modificadorPrecio;
		}else{
			return 'no disponible';	
		}		
	}
	
	/*
	* metoso para guardar un modificador.
	* autor: jalomo<jalomo@hotmail.es>
	*/
	 public function save_modificadores($data){
        $this->db->insert('modificadores', $data);
		return $this->db->insert_id();
    }
	
	/*
	* metddo para obtener losusuarios.
	* autor: jalomo<jalomo@hotmail.es>
	*/
	public function get_all_usuarios(){
		$data = $this->db->get('admin');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	/*
	* metddo para obtener los datos de un usuario
	* autor: jalomo <jalomo@htotmail.es>
	*/
	public function get_usuario_id($id){
		$this->db->where('adminId',$id);
		$query=$this->db->get('admin');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	/*
	* metodo para guardar un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_usuario_($data){
        $this->db->insert('usuarios', $data);
		return $this->db->insert_id();
    }
	
	/*
	* volcado de todos los usuarios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_usuarios($id){
		$this->db->where('usuarioIdAdmin',$id);
		$data = $this->db->get('usuarios');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	
	/*
	* metodo para obtener los datos de un usuario.
	* autor: jalomo<jalomo@hotmail.es>
	*/
	public function get_usuarios_id($id){
		$this->db->where('usuarioId',$id);
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	
	
	/*
	* metodo para guardar servicios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_servicios($data){
		$this->db->insert('servicios', $data);
        return $this->db->insert_id();
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
	
	
	
	
	
	
	
	public function save_banner($data){
		$this->db->insert('banner', $data);
        return $this->db->insert_id();
	}
	
	
	
	/*
	* metos para obtener a todos olos usuarios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_usuarios_msj(){
		
		$data = $this->db->get('usuarios');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	public function get_ciudad_msj(){
		
		$data = $this->db->get('ciudad');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	
	public function get_vendedores_msj(){
		$this->db->where('adminTipo',0);
		$data = $this->db->get('admin');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	/*
	* metodo para obtener los paises.
	* autor: jalomo@hotmail.es
	*/
	public function get_paises(){
		$query=$this->db->get('pais');
		return $query->result();	
	}
	
	/*
	* metodo para obtener los estados.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_estados(){
		$this->db->where('id_pais',42);
		$query=$this->db->get('estado');	
		return $query->result();
	}
	
	/*
	* metodo para obtener los estados de un país 
	+ autor:jalomo <jalomo@hotmail.es>
	*/
	public function get_estados_id($id){
		$this->db->where('id_pais',$id);
		$query=$this->db->get('estado');	
		return $query->result();
	}
	
	/*
	* metodo para obtener el nombre del estado
	*/
	public function get_name_pais($id){
		$this->db->where('id',$id);
		$query=$this->db->get('pais');
		$resultado=$query->row();
		return $resultado->nombre;
			
	}
	
	public function get_name_estado($id){
		$this->db->where('id',$id);
		$query=$this->db->get('estado');
		$resultado=$query->row();
		return $resultado->nombre;
			
	}
	
	
	
	
	
	
	
	/*
	*Metodo para obtener la informacion
	*de las notificaciones
	*autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_notificaciones(){
		$data = $this->db->get('notificaciones');
		if ($data->num_rows() > 0){
        	return $data->result();
		} else {
			return 0;
		}	
	}
	
	/*
	*Metodo para guardar la informacion
	*de las notificaciones
	*autor jalomo <jalomo@hotmail.es>
	*/
	public function save_notificacion($data){
		$this->db->insert('notificaciones', $data);
        return $this->db->insert_id();
	}
	
	/*
	*Metodo para obtener la informacion
	* de las noticias
	autor: jalomo <jalmo@hotmail.es>
	*/
	public function get_noticias(){
		$data = $this->db->get('noticias');
		if ($data->num_rows()>0){
			return $data->result();
		} else {
			return 0;
		}		
	}
	
	/*
	*Metodo para guardar la informacion
	* del registro del administrador
	*autor jalomo <jalomo@hotmail.es>
	*/
	public function save_admin($data){
		$this->db->insert('admin', $data);
        return $this->db->insert_id();
	}
	
	/*
	* metodo para obtener la informacion del admin.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_data_admin($id){
		$this->db->where('adminId',$id);
		$query=$this->db->get('admin');
		if($query->num_rows()>0){
			return $query->row();	
		}else{
				return 0;
			}	
	}
	
	
	
	
	
	/*
	* metodo para obtener un volcado de 
	* todos los eventos
	*/
	public function get_all_eventos(){
        $data = $this->db->get('eventos');
        return $data->result();
    }
	
	
	
	/**
     * Method for get the specific data of the specific
     * news and can show to users for edit or just know
     * what is the information to share the mobile app's users
     *
     * @params int idNews
     * @return array mixedData
     **/
    public function get_specific_news($id){
        $this->db->where('noticiasId', $id);
        $data = $this->db->get('noticias');
        return $data->row();
    }
	
	
	/*
	* funcion para obtener los datos de 
	* un reguistro de la tabla eventos
	*/
	public function get_specific_eventos($id){
        $this->db->where('eventoId', $id);
        $data = $this->db->get('eventos');
        return $data->row();
    }
	
	/**
     * Method for load all the information for can see the data
     * will be update by the user admin and then can show the
     * updates in the mobile app
     *
     * @params array mixedData
     * @params int idNews
     *
     * @return void
     **/
    public function update_news($data, $id){
        $this->db->update('noticias', $data, array('noticiasId'=>$id));
    }
	
	
	/*
	* funcion para editar un registro de la tabla eventos
	*/
	public function update_eventos($data, $id){
        $this->db->update('eventos', $data, array('eventosId'=>$id));
    }
	
	
	
	/**
     * Method for know the data if exists the banners
     * of the system and know if need to delete or not
     * all is by the system
     *
     * @params int status
     * @return void
     **/
    public function count_banners_exists($status)
    {
        $this->db->where('bannerStatus', $status);
        $total = $this->db->count_all_results('banners');
        return $total;
    }
	
	/**
     * Method for get all the information about the data
     * of the banners and need to take all the information
     * for can give them data
     *
     * @return array mixedData
     **/
    public function get_values_banner($restaurante,$sucursal)
    {
        $this->db->where('bannerRestaurante',$restaurante);
		$this->db->where('bannerSucursal',$sucursal);
		$this->db->where('bannerStatus', 1);
        $data = $this->db->get('banners');
        return $data->result();
    }
	
	/**
     * Method used for delete all the exists banners and
     * used for know whats the meaning the values and can 
     * update for the new banners
     *
     * @params int idBanner
     * @return void
     **/
    public function delete_banners_exists($id)
    {
        $this->db->delete('banners', array('bannerId'=>$id));
    }
	
	/**
     * Method for save all the information about the banners and
     * the system can laod this data in the mobil app. This information
     * is important because the user admin need to load the images in the
     * app for the final user can see it
     *
     * @params array mixed
     * @return int id
     **/
    public function save_new_banners($data)
    {
        $this->db->insert('banners', $data);
        return $this->db->insert_id();
    }
	
	/**
     * Method to delete the information selected by the user
     * and can know what won't show to final user anymore
     *
     * @params int idNews
     * @return void
     **/
    public function remove_data_news($id){
        $this->db->delete('noticias', array('noticiasId'=>$id));
    }
	
	/*
	* metodo para eliminar un registro de la tabla
	* eventos.
	*/
	 public function remove_data_evento($id){
        $this->db->delete('eventos', array('eventosId'=>$id));
    }
	
	/*
	* 
	*/
	public function count_results_users($user, $pass)
    {
        $this->db->where('adminUsername', $user);
        $this->db->where('adminPassword', $pass);
        $total = $this->db->count_all_results('admin');
        return $total;
    }
	
	/*
	*
	*/
	public function get_all_data_users_specific($username, $pass)
    {
        $this->db->where('adminUsername', $username);
        $this->db->where('adminPassword', $pass);
        $data = $this->db->get('admin');
		
		if($data->num_rows()>0){
				return $data->row();
		}else{
			return 0;	
		}
        
    }
	
	
	public function count_results_usuarios($user, $pass)
    {
        $this->db->where('usuarioEmail', $user);
        $this->db->where('usuarioPassword', $pass);
        $total = $this->db->count_all_results('usuarios');
        return $total;
    }
	
	public function get_all_data_usuarios_specific($username, $pass)
    {
        $this->db->where('usuarioEmail', $username);
        $this->db->where('usuarioPassword', $pass);
        $data = $this->db->get('usuarios');
		if($data->num_rows()>0){
        return $data->row();
		}else{
			return 0;	
		}
    }
	
	
	
	/*
	* metodo para guardar en la tabla de eventos_images
	* autor: jalomo <jalomo@hotmail.es>
	*/
	 public function save_eventos_image($data){
        $this->db->insert('eventos_images', $data);
		return $this->db->insert_id();
    }
	
	
	
	/*
	* funcion para obtener las imagenes de un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_images_evento($idEvento){
		$this->db->where('imaIdEvento',$idEvento);
		$query=$this->db->get('eventos_images');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return 0;
		}
	}
	
	/*
	* metodopara eliminar una imagen de eventos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function deleteImageEvento($idimage){
		$this->db->delete('eventos_images', array('imaId'=>$idimage));
	}
	
	/*
	* metodo para obtener la informacion de unaimagen de un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function getImageEvento($idImage){
		$this->db->where('imaId',$idImage);
		$query=$this->db->get('eventos_images');
		if($query->num_rows()>0){
			$result=$query->row();
			return $result->imaPath;
		}else{
			return 0;
		}
	}

	//Inicio de funciones Daniel Alejandro Chávez Vazquez

	 //daniel
  public function getCiudades(){
  	$result;
  	$query="SELECT ciudadNombre, ciudadId FROM ciudades WHERE ciudadStatus=0";
  	$res = $this->db->query($query);
  	if($res->num_rows()>0){
       $result = $res->result_array();

  	}

  	else{
  		$result="0";
  	}

    return $result;
  	

  }

    //daniel
  public function saveCasa($name,$desc,$imgCasa,$ciudad,$pagos){
  	$result;
      $data = array(
            'casaNombre' => $name,
             'casaDescripcion' =>$desc,
             'casaImage' => $imgCasa,
              'casaIdCiudad' =>$ciudad);

      $res =  $this->db->insert('casas', $data);   
      if($res==1){
          $query= "SELECT casaId FROM casas ORDER BY casaId DESC LIMIT 1";
          $res = $this->db->query($query);
          if($res->num_rows()>0){
          	  foreach ($res->result() as $row) {
                $result = $row->casaId;
                break;
          	  }

          	foreach ($pagos as $pago => $value) {
           	   if($value=="paypal"){
           	   	   $query="UPDATE casas SET casaPagoPaypal = ? WHERE casaId= ? ";

           	   }

           	   else if($value=="deposito"){
                  $query="UPDATE casas SET casaPagoDeposito=? WHERE casaId= ? ";
           	   }

           	   else if($value=="oxxo"){
                  $query="UPDATE casas SET casaPagoOxxo=? WHERE casaId= ? ";
           	   }

           	   else if($value=="contado"){
                  $query="UPDATE casas SET casaPagoContado=? WHERE casaId= ? ";
           	   }

               $res = $this->db->query($query, array("1",$result));

           }
         }
      }


      
  return $result;

  }

    //daniel
  public function getAddedCasas(){
  	$result;
  	/* $query="SELECT casas.casaId, casas.casaNombre, COUNT(cuartos_casas.IdCasa) AS cuartos
  	 FROM casas 
  	 INNER JOIN cuartos_casas  ON (casas.casaId = cuartos_casas.idCasa) GROUP BY cuartos_casas.IdCasa
     ";*/
      
     $query="SELECT casas.casaId, casas.casaNombre, COUNT(cuartos_casas.IdCasa) AS cuartos FROM casas LEFT JOIN cuartos_casas ON (casas.casaId = cuartos_casas.idCasa) GROUP BY casas.casaId"; 

     $res = $this->db->query($query);
     if($res->num_rows()>0){
       $result = $res->result_array();

  	}

  	else{
  		$result[0] = array("casaId"=>"0");
  	}

    return $result;
  	

  }

  //daniel
  public function getServicios(){
  	$result;
  	$query="SELECT id, nombre FROM servicios_cuartos WHERE status=1";
  	$res = $this->db->query($query);
  	if($res->num_rows()>0){
       $result = $res->result_array();

  	}

  	else{
  		$result="0";
  	}

  	return $result;

  }

   //daniel

  public function deleteServicio($id){
  	$query="DELETE FROM servicios_cuartos WHERE id = ?";
  	$res = $this->db->query($query, array($id));
  	return $res;

  }


   public function addCuarto($desc,$precio,$idcasa,$servicios,$image){
  	$idCuarto;
  	settype($idcasa, "integer");
  	   $data = array(
            'idCasa' => $idcasa,
            'sennia' => $desc,
            'precio' => $precio,
			'imagen'=>$image
            );

      $res =  $this->db->insert('cuartos_casas', $data);
      $query= "SELECT idCuarto FROM cuartos_casas ORDER BY idCuarto DESC LIMIT 1";
      $res = $this->db->query($query);
      if($res->num_rows()>0){
          foreach ($res->result() as $row) {
                $idCuarto = $row->idCuarto;
                break;
          	  }

         foreach ($servicios as $servicio => $value) {
         	settype($value, "integer");
         	$data = array(
            'idCuarto' => $idCuarto,
            'idCasa' => $idcasa,
            'idServicio' => $value
            );
            $res =  $this->db->insert('cuartos_servicios', $data);

         } 	  

  	   }


    return 1;
  }

  public function deleteCuarto($id){
  	$query="DELETE FROM cuartos_casas WHERE idCuarto= ? ";
  	$res = $this->db->query($query,array($id));
  	$query="DELETE FROM cuartos_servicios WHERE idCuarto= ?";
  	$res = $this->db->query($query,array($id));
  	return 1;
  }

  public function deleteCasa($idcasa){
  	 $query="DELETE FROM casas WHERE casaId = ? ";
  	 $res = $this->db->query($query,array($idcasa));
  	 $query="DELETE FROM cuartos_casas WHERE idCasa = ? ";
  	 $res = $this->db->query($query,array($idcasa));
  	 $query="DELETE FROM cuartos_servicios WHERE idCasa = ? ";
  	 $res = $this->db->query($query,array($idcasa));
  	 return 1;

  }

  public function getServiciosCuarto($idcuarto){
  	 $final;
  	 $count=0;
  	 $flag=0;
  	 settype($idcuarto, "integer");
  	 $query="SELECT id, nombre FROM servicios_cuartos WHERE status= 1";
  	 $servicios = $this->db->query($query);
  	 $query="SELECT idServicio FROM cuartos_servicios WHERE idCuarto = ?";
  	 $asignados = $this->db->query($query,array($idcuarto));

  	 if($servicios->num_rows()>0){
          if($asignados->num_rows>0){
              foreach ($servicios->result() as $srv) {
              	    $flag=0;
              	    $idsrv= $srv->id;
                    foreach ($asignados->result() as $asg) {
                    	  $idasg = $asg->idServicio;
                          if($idsrv == $idasg){
                          	   $final[$count] = array("servicio"=>$srv->nombre,"id"=>$srv->id,"asignado"=>"1");
                          	   $flag=1;
                          	   break;
                          	}
                              
          	         }

          	        if($flag==0){
          	        	$final[$count] = array("servicio"=>$srv->nombre,"id"=>$srv->id,"asignado"=>"0");

          	        }

          	        $count++;
          	  }
        
          }

          else{

              $final = $servicios->result_array();

          }
    }

    else{
      $final="0";

    }

    return $final;

  }

 //daniel
  public function updateServCuarto($jsonserv){
     $query="SELECT * FROM cuartos_servicios WHERE idCuarto =  ? AND idCasa =  ? AND idServicio = ?";
     $result="0";
  	 foreach ($jsonserv as $json => $campo) {
  	 	$idcu = $campo["idcuarto"];
  	 	$idca = $campo["idcasa"];
  	 	$idse = $campo["idserv"];
  	 	$chk= $campo["chk"];
  	 	settype($idcu, "integer");
  	 	settype($idca, "integer");
  	 	settype($idse, "integer");
  	 	$res = $this->db->query($query,array($idcu,$idca,$idse));
  	 	if($res->num_rows()>0){
  	 		if($chk=="0"){
                $delete="DELETE FROM cuartos_servicios  WHERE idCuarto =  ? AND idCasa =  ? AND idServicio = ?";
                $result = $this->db->query($delete,array($idcu,$idca,$idse));
  	 		}

  	 	}

  	 	else{
  	 		if($chk=="1"){
                $data = array(
                  'idCuarto' => $idcu,
                  'idCasa' => $idca,
                  'idServicio' => $idse
                );

               $result =  $this->db->insert('cuartos_servicios', $data);
  	 		}
  	 	}


  	 }
     return $result;
  }

    public function viewCuartos($idCasa){
  	$result;
  	settype($idCasa, "integer");
  	$query="SELECT casas.casaNombre, casas.casaId,cuartos_casas.idCuarto,cuartos_casas.sennia, cuartos_casas.precio
  	        FROM casas, cuartos_casas 
  	        WHERE casas.casaId= ? AND cuartos_casas.idCasa = ?";


    $res = $this->db->query($query, array($idCasa,$idCasa));
    if($res->num_rows()>0){
       $result = $res->result_array();

  	}

  	else{
  		$result="0";
  	}

  	return $result;

  }

   //daniel
  public function saveServicio($name){
      $data = array(
            'nombre' => $name,
            'status' => 1
            );

      $res =  $this->db->insert('servicios_cuartos', $data); 
      return $res;
  }

public function saveNewCodigo($codigo){
         $data = array('codigo'=>$codigo);
         $this->db->where('id',1);
        $res =  $this->db->update('codigo',$data);
        return $res;
	}



   //daniel
	public function getClientesEventos($idEvento,$flag){
		   $clientes;
		   $servicios;
		   $idUser=0;
		   $count=0;
		   $query="";
		   $res;
           
           settype($idEvento, "integer");

		   if($flag==0){
		   	$query="SELECT usuarios.usuarioId, usuarios.usuarioNombre, usuarios.usuarioSexo,usuarios.usuariodomicilio, usuarios.usuarioTelefonno, pais.nombre, eventos.eventoNombre, eventos.eventoId, eventos.eventoPrecioBase,eventos.eventoFecha, eventosusuarios.euId, eventosusuarios.euTipoPago, eventosusuarios.euStatus, eventosusuarios.euUrlImage,eventosusuarios.codigoBarras
                   FROM eventosusuarios,usuarios,eventos,pais 
                   WHERE eventosusuarios.euIdEvento= ? AND eventosusuarios.euIdUsuario = usuarios.usuarioId AND eventosusuarios.euIdEvento = eventos.eventoId AND usuarios.usuarioPais = pais.id";     
		   }
		   else{
		   	$query="SELECT usuarios.usuarioId, usuarios.usuarioNombre, usuarios.usuarioSexo, usuarios.usuariodomicilio, usuarios.usuarioTelefonno, pais.nombre, eventos.eventoNombre, eventos.eventoId, eventos.eventoPrecioBase, eventos.eventoFecha, eventosusuarios.euId, eventosusuarios.euTipoPago, eventosusuarios.euStatus, eventosusuarios.euUrlImage, eventosusuarios.codigoBarras
                   FROM eventosusuarios,usuarios,eventos,pais 
                   WHERE eventosusuarios.euIdEvento= ? AND eventosusuarios.euIdUsuario = usuarios.usuarioId AND eventosusuarios.euIdEvento = eventos.eventoId AND usuarios.usuarioPais = pais.id AND eventosusuarios.euStatus=1";  
		   }
            $eventos = $this->db->query($query,array($idEvento));
            if($eventos->num_rows() > 0){
                foreach ($eventos->result() as $row) {
                	   $servicios=null;
                	   $serv;
                	   if($flag==0){
                	   	  $query="";
                          $xx=0;
                          $idUser = $row->usuarioId;
                          $sexoUser = $row->usuarioSexo;
                          if($sexoUser=="Hombre"){
                            /*$query="SELECT moduser.modModificadorId, modificadores.modificadorNombre, modificadores.modificadorPrecio AS modPrecio, moduser.modUserId, moduser.modStatus, moduser.modEventoId
                                    FROM modificadores, moduser, eventos
                                    WHERE moduser.modUserId = ? AND moduser.modModificadorId = modificadores.modificadorId AND  moduser.modEventoId = ?"; */
                                     $query="SELECT modificadores.modificadorId, modificadores.modificadorNombre, modificadores.modificadorPrecio AS modPrecio, usuarios.usuarioId, moduser.modId,moduser.modStatus, moduser.modEventoId
                                    FROM modificadores, moduser, eventos,usuarios
                                    WHERE moduser.modModificadorId = modificadores.modificadorId AND moduser.modUserId = ?  AND usuarios.usuarioId = moduser.modUserId AND  moduser.modEventoId = ? AND moduser.modEventoId = eventos.eventoId ";    
                          
                          }

                          else{
                           $query="SELECT modificadores.modificadorId, modificadores.modificadorNombre, modificadores.modificadorPrecioM AS modPrecio, usuarios.usuarioId, moduser.modId,moduser.modStatus, moduser.modEventoId
                                    FROM modificadores, moduser, eventos,usuarios
                                    WHERE moduser.modModificadorId = modificadores.modificadorId AND moduser.modUserId = ?  AND usuarios.usuarioId = moduser.modUserId AND  moduser.modEventoId = ? AND moduser.modEventoId = eventos.eventoId ";    
                            
                          }

                         /* $query="SELECT servicios.servicioId, servicios.servicioNombre, servicios.servicioCosto, serviciousuario.suId, serviciousuario.suStatus, serviciousuario.suTipoPago, serviciousuario.suUrlImage
                                  FROM servicios, serviciousuario
                                  WHERE serviciousuario.suIdUsuario  = ? AND serviciousuario.suIdServicio = servicios.servicioId";*/
                                 
                          $mod= $this->db->query($query,array($idUser,$idEvento));
                          $res = $mod->result_array();
                          /*if($serv->num_rows() > 0){
                        	foreach ($serv->result() as $ser) {
                        		 $servicios = array("servicioId"=>$ser->servicioId,
                        		 	                     "servicioNombre"=>$ser->servicioNombre,
                        		 	                     "servicioCosto"=>$ser->servicioCosto,
                        		 	                     "servicioStatus"=>$ser->suStatus,
                        		 	                     "servicioTipoPago"=>$ser->suTipoPago,
                        		 	                     "servicioUrlImage"=>$ser->suUrlImage);
                        		 $xx++;
                                  
         
                        	}
  
                        }*/
                         $servicios  = array("servicioNombre"=>"0");


                    }

                    
            	        $clientes[$count] = array("usuarioId" =>$row->usuarioId,
            	        	                   "rowId" =>$row->euId,
            	    	                       "usuario"=>$row->usuarioNombre,
            	    	                       "domicilio" =>$row->usuariodomicilio,
            	    	                       "telefono"=>$row->usuarioTelefonno,
            	    	                       "pais"=>$row->nombre ,
            	    	                       "eventoId"=>$row->eventoId,
            	    	                       "eventoNombre"=>$row->eventoNombre,
            	    	                       "eventoPrecio"=>$row->eventoPrecioBase,
            	    	                       "evento" =>$row->eventoNombre,
            	    	                       "eventoFecha"=>$row->eventoFecha,
            	    	                       "tipoPago"=>$row->euTipoPago,
            	    	                       "status"=>$row->euStatus,
            	    	                       "image"=>$row->euUrlImage,
            	    	                       "usuarioSexo" =>$row->usuarioSexo,
            	    	                       "codigoBarras"=>$row->codigoBarras,
            	    	                       );

            	                               $count++;
                   

                   

                 }  


               

             

                 
             }

             else{
             	$evento;
             	 $query="SELECT eventoNombre FROM eventos WHERE eventoId= ? ";
             	 $res = $this->db->query($query, array($idEvento));
             	 if($res->num_rows()>0){
			          foreach ($res->result() as $row) {
         	 	           $evento = $row->eventoNombre;
               
                         }
	             }

             	 $clientes[0]  = array("usuario"=>"0","eventoNombre"=>$evento);
             }

             return $clientes;
              
             
	}

public function getModUser($ide,$idu,$idr){
	$mod;
	settype($idu, "integer");
	settype($ide, "integer");
	settype($idr, "integer");
    $query="SELECT * FROM moduser WHERE modEventoId = ? AND modUserId= ? AND rowEventosUsuarios = ?";
    $res = $this->db->query($query, array($ide,$idu,$idr));
    if($res->num_rows()>0){
			$mod = $res->result_array();
	}
	else{
		$mod[0] = array("modId"=>"-1");
	}

    return $mod;


}

	public function changeStatus($cliente,$status){
		 $codigo;
         $data = array('euStatus'=>$status);
         $this->db->where('euIdUsuario',$cliente);
         $res =  $this->db->update('eventosusuarios',$data);
         if($status==1){
         	$query="SELECT codigoBarras FROM eventosusuarios WHERE euIdUsuario = ?";
         	$res= $this->db->query($query,array($cliente));
         	 foreach ($res->result() as $row) {
         	 	$codigo = $row->codigoBarras;
               
              }

              if($codigo==""){
                 $codigo = $this->createNewCodigo();
                 $data = array('codigoBarras'=>$codigo);
                 $this->db->where('euIdUsuario',$cliente);
                 $res =  $this->db->update('eventosusuarios',$data);
                 return 1;
              }

              else{
                 return 1;
              }

              
          }

         else{
           return $res;
         } 

       
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

	public function get_clientes_transportes(){
		$transportes="";
		$clientes="";
		$result;
		$count=0;
		$query="";
        $query="SELECT DISTINCT usuarios.usuarioId, usuarios.usuarioNombre, usuarios.usuarioDomicilio, usuarios.usuarioTelefonno,usuarios.usuarioSexo, usuarios.usuarioEmail
                FROM usuarios, transportes 
                WHERE usuarios.usuarioId = transportes.userId";
        $clientes = $this->db->query($query); 
        if($clientes->num_rows()>0){
			foreach ($clientes->result() as $row) {

                  $query="SELECT transportes.id, transportes.aerolinea, ciudades.ciudadNombre AS origen,transportes.vuelo,transportes.fecha_llegada,transportes.hora_llegada, transportes.personas, transportes.status
				          FROM transportes,ciudades
				          WHERE transportes.userId = ? AND transportes.origen = ciudades.ciudadId";
				   $res = $this->db->query($query, array($row->usuarioId));
				   $transportes = $res->result_array();

                    
				   $result[$count] = array("userId"=>$row->usuarioId,
				   	                       "userName"=>$row->usuarioNombre,
				   	                       "userDom"=>$row->usuarioDomicilio,
				   	                       "userTel"=>$row->usuarioTelefonno,
				   	                       "userSexo"=>$row->usuarioSexo,
				   	                       "userMail"=>$row->usuarioEmail,
				   	                       "usuarioTransportes"=>$transportes);
				   $count++;
                

			}
	  
             
        }

        else{
        	$result="0";
        }

        return $result;

  }

   //daniel
	public function getClientesEvent($id="0",$evento="sin nombre"){
		if($id!="0"){
			$clientes = $this->Company->getClientesEventos($id,0);
			$data['clientes']=$clientes;
			$data['evento'] =urldecode($evento);
		    $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/eventosclientes',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));

		}
	}

	  public function saveNewMod($modificadores){
		$res="";
       foreach ($modificadores as $item){
       	 $vars = explode("-",$item);
       	   if($vars[0]=="0")
       	   	  continue;
       	    $data = array(
           'modModificadorId' => $vars[3] ,
           'modEventoId' => $vars[0] ,
           'modUserId' => $vars[1],
           'modStatus'=>'0',
           'modNombre'=>$vars[4],
           'modPrecio'=>$vars[5],
           'rowEventosUsuarios'=>$vars[2]
           );

           $res= $this->db->insert('moduser', $data); 
       
      
          


       }

       return $res;

	}

	public function getMod($sexo,$evento){
		$query="";
		$result="";
		$count=0;
		if($sexo=="Hombre"){
           $query="SELECT modificadores.modificadorId, modificadores.modificadorNombre, modificadores.modificadorPrecio AS precio
                   FROM modificadores
                   WHERE modificadores.modificadorIdEvento = ?";


		 }

		else{
              $query="SELECT modificadores.modificadorId, modificadores.modificadorNombre, modificadores.modificadorPrecioM AS precio
                   FROM modificadores
                   WHERE modificadores.modificadorIdEvento = ?";
		}

	    $res = $this->db->query($query, array($evento));

        if($res->num_rows()>0){
			/*foreach ($res->result() as $row) {
						$result[$count] = array("modid"=>$row->modificadorId,
					                       "nombre" =>$row->modificadorNombre,
					                       "precio"=>$precio
					                      );
				$count++;
			}*/
			$result = $res->result_array();
			
        }

        else{
        	$result[0] = array("modificadorId"=>"0");
        }
		
		
		return $result;
	}

	public function deleteMod($modid,$usr,$eve,$reg,$idmodusr){
		settype($modid, "integer");
		settype($usr, "integer");
		settype($eve, "integer");
		settype($reg, "integer");
		settype($idmodusr, "integer");
	    $query= "DELETE FROM  moduser  WHERE  modId = ? AND rowEventosUsuarios = ? AND modModificadorId = ? AND modUserId= ? AND modEventoId = ?  ";
        $res = $this->db->query($query, array($idmodusr,$reg,$modid,$usr,$eve));


        return $res;
	}

	//daniel
  function changeStatusTrans($stat,$iduser,$idtrans){
    $query="UPDATE transportes SET status = ? 
            WHERE id= ? And userId= ?";
    $res = $this->db->query($query, array($stat, $idtrans,$iduser));
    return $res;

  }

    public function saveBoletos($idEvento,$cantidad,$pathimg,$texto){
  	  if($cantidad==""){
  	  	$cantidad="0";
  	  }
  	  settype($cantidad, "integer");
      $res="";
  	  $query = "SELECT * FROM eventos_boletos WHERE idEvento = ?";
  	  $res = $this->db->query($query, array($idEvento));
  	  if($res->num_rows()>0){
        
           $path="";
           $txt="";
           foreach($res->result() as $row){
                 $path= $row->imagen;
                 $txt = $row->texto;
           }

           if($pathimg==""){
           	  $pathimg = $path;
           }

           if($texto==""){
           	 $texto=$txt;
           }

           $query= "UPDATE eventos_boletos SET numeroBoletos = numeroBoletos+".$cantidad.",imagen = ?,texto = ? WHERE idEvento = ? ";
           $res = $this->db->query($query, array($pathimg,$texto,$idEvento));
  	  }

  	  else{
         
          $data = array(
            'idEvento' => $idEvento ,
             'numeroBoletos' => $cantidad ,
             'imagen' => $pathimg,
              'texto' =>$texto);

            $res =  $this->db->insert('eventos_boletos', $data); 

  	    }

      return $res;
  }

  public function imprimirBoletos(){
   if($this->session->userdata('id'))
    {
	$eventosBoletos = $this->Company->getEventosBoletoss();
	$data['eventosBoletos']=$eventosBoletos;
	$data['userId'] = $this->session->userdata('id');
	$aside = $this->load->view('companies/left_menu', '', TRUE);
	$content = $this->load->view('companies/eventosboletos',$data, TRUE);
	$this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));
}
   else{
   	 redirect('companies');
   }
}

  public function restBoletos($idEvento,$cantidad){
  	settype($cantidad, "integer");
     $query = "SELECT numeroBoletos, impresos FROM eventos_boletos WHERE idEvento = ?";
     $impresos=0;
     $result=-1;
     $tot=0; 
     $res = $this->db->query($query, array($idEvento));
     if($res->num_rows()>0){
         foreach ($res->result() as $row) {
            $tot = $row->numeroBoletos;
            $impresos =  $row->impresos;  
         	$disponibles =  $tot - $impresos;
         	if($cantidad<=$disponibles){
         		$query="UPDATE eventos_boletos SET impresos = impresos + ".$cantidad." WHERE idEvento = ? ";
         		$res = $this->db->query($query, array($idEvento));
         		$impresos = $impresos + $cantidad;
                $result=$impresos;
                break;

                
         	}

         	else{
                $result=2;
                break;
         	}

         } 

  	 }

  	 return $result;

  }

 public function getEventosBoletoss(){
  	$result;
  	$query = "SELECT eventos.eventoNombre, eventos.eventoId, eventos.eventoFecha, eventos_boletos.numeroBoletos, eventos_boletos.impresos
  	          FROM eventos, eventos_boletos
  	          WHERE eventos_boletos.idEvento = eventos.eventoId";
  	$res = $this->db->query($query);   
  	if($res->num_rows()>0){
       $result = $res->result_array();

  	}

  	else{
  		$result="0";
  	}

  	return $result;

  }

  public function saveBoletosImpresos($ide,$vendedor,$cliente,$codigo,$flag,$ideu,$sexo,$costo){
    $result;
    settype($ide, "integer");
    settype($vendedor, "integer");
    if($ideu!=""){
        	     $data = array(
                  'idEvento' => $ide,
                  'idVendedor' =>  $vendedor,
                  'idCliente' => $cliente,
                  'codigo' =>$codigo,
                  'idEU' =>$ideu

         
           );
    }
    else{
         	     $data = array(
                  'idEvento' => $ide,
                  'idVendedor' =>  $vendedor,
                  'idCliente' => $cliente,
                  'codigo' =>$codigo,
                  'idEU' =>"0",
                  'costo' =>$costo,
                  'sexo' =>$sexo
         
           );

    }



      $result =  $this->db->insert('boletos_impresos', $data);

      if($flag=="1"){
         $query="UPDATE eventos_boletos SET impresos = impresos + 1 WHERE idEvento = ?";
         $res = $this->db->query($query,array($ide));

      }
      

      return $result;
  }

  public function getComprobantes($ide,$idu,$idr){
    $modiniciales;
    $evento;
    $tickets;
    $modextras;
    $array;
    
    settype($idr, "integer");
    settype($ide, "integer");
    settype($idu, "integer");


  	$query="SELECT  eventosusuarios.euId as idr, eventosusuarios.euIdEvento as ide, eventosusuarios.euIdUsuario as idu, eventos.eventoNombre as nombre, eventosusuarios.euTipoPago as tipo, eventosusuarios.euStatus as estatus, eventosusuarios.euUrlImage as ficha, eventosusuarios.euPrecio as precio, eventosusuarios.codigoBarras
  	                     
  	                FROM eventosusuarios, eventos WHERE eventosusuarios.euId = ? AND eventosusuarios.euIdUsuario = ? AND eventosusuarios.euIdEvento = ? and eventos.eventoId = eventosusuarios.euIdEvento";
  	$res = $this->db->query($query,array($idr,$idu,$ide));
    if($res->num_rows()>0){
       $evento = $res->result_array();

  	}

  	else{
  		$evento = "0";
  	}

  	$query="SELECT  moduser.modModificadorId as idm, moduser.modEventoId as ide, moduser.modUserId as idu, moduser.rowEventosUsuarios as idr, moduser.modNombre as nombre, moduser.modPrecio as precio
  	                    
  	                FROM moduser WHERE moduser.rowEventosUsuarios = ? AND moduser.modUserId = ? AND moduser.modEventoId = ? ";
  	$res = $this->db->query($query,array($idr,$idu,$ide));
    if($res->num_rows()>0){
       $modiniciales = $res->result_array();

  	}

  	else{
  		$modiniciales = "0";
  	}




  	$query="SELECT ticket_mod_extras.id as ticket, ticket_mod_extras.idUser, ticket_mod_extras.idEvento, ticket_mod_extras.idRow
  	        FROM  ticket_mod_extras 
  	        WHERE ticket_mod_extras.idUser = ? AND ticket_mod_extras.idEvento = ? AND ticket_mod_extras.idRow = ?";
    $res = $this->db->query($query,array($idu,$ide,$idr));
    if($res->num_rows()>0){
       $modextras = $res->result_array();

  	}

  	else{
  		$modextras = "0";
  	}

    $array[0] = array("evento"=>$evento,"iniciales"=>$modiniciales,"extras"=>$modextras);

    return $array;
    


  /*
    $query="SELECT  eventosusuarios.euId as idr, eventosusuarios.euIdEvento as ide, eventosusuarios.euIdUsuario as idu, eventosusuarios.euTipoPago as tipo, eventosusuarios.euStatus as status, eventosusuarios.euUrlImage as ficha, eventosusuarios.euPrecio as precio, eventosusuarios.codigoBarras,
  	                moduser.modModificadorId, moduser.modNombre, moduser.modPrecio     
  	                FROM eventosusuarios, moduser  WHERE eventosusuarios.euId = ? AND eventosusuarios.euIdUsuario = ? AND eventosusuarios.euIdEvento = ? AND eventosusuarios.euId = moduser.rowEventosUsuarios";
  */

  /*	$query="SELECT   ticket_mod_extras.id, ticket_mod_extras.idUser, ticket_mod_extras.idEvento, ticket_mod_extras.idRow,
  	                 ticket_mod_extras.status, ticket_mod_extras.fichaDeposito, ticket_mod_extras.total
  	        FROM  ticket_mod_extras        
  	        WHERE ticket_mod_extras.idEvento = ? AND  ticket_mod_extras.idUser = ? AND ticket_mod_extras.idRow = ?";
  	$res = $this->db->query($query,array($ide,$idu,$idr));
  	if($res->num_rows()>0){
        foreach ($res->result() as $row) {

        	$qq="SELECT * FROM mod_extras WHERE idTicket = ?";

        }

  	}        

  	$query="SELECT   ticket_mod_extras.id, ticket_mod_extras.idUser, ticket_mod_extras.idEvento, ticket_mod_extras.idRow,
  	                 ticket_mod_extras.status, ticket_mod_extras.fichaDeposito, ticket_mod_extras.total,
  	                 mod_extras.modificadorId, mod_extras.modNombre,mod_extras.modPrecio
  	        FROM mod_extras,ticket_mod_extras 
  	        WHERE  ticket_mod_extras.idEvento = ? AND  ticket_mod_extras.idUser = ? AND ticket_mod_extras.idRow = ? AND  ticket_mod_extras.id = mod_extras.idTicket";
  
  */





  }

  public function getModExtras($ticket){
  	settype($ticket, "integer");
    $extras;
    $query="SELECT ticket_mod_extras.id as ticket, ticket_mod_extras.idUser, ticket_mod_extras.idEvento, ticket_mod_extras.idRow,
  	                 ticket_mod_extras.status as estatus, ticket_mod_extras.tipoPago as tipo ,ticket_mod_extras.fichaDeposito as ficha, ticket_mod_extras.total as total,
  	                 mod_extras.modificadorId, mod_extras.modNombre,mod_extras.modPrecio
  	                 FROM mod_extras,ticket_mod_extras 
  	                 WHERE ticket_mod_extras.id = ? AND mod_extras.idTicket = ?";
  	$res = $this->db->query($query,array($ticket,$ticket));
    if($res->num_rows()>0){
       $extras = $res->result_array();

  	}

  	else{
  		$extras="0";
  	}

  	return $extras;

  }

  public function changueStatusEvento2($option,$text){
      
      $array = explode("-", $option);
      $status="";
      if($text=="Pagado"){
      	 $status="1";
      }
      else if($text=="Cancelado"){
      	 $status="2";
      }
      else if($text=="Apartado"){
      	 $status="3";
      }
      else if($text=="No pago"){
      	 $status="0";
      }

      $query="UPDATE eventosusuarios SET euStatus = ? WHERE euId = ? AND euIdUsuario = ? AND euIdEvento = ?";
      $res = $this->db->query($query,array($status,$array[0],$array[2],$array[1]));
      return $res;

  }

    public function changeStatusExtras($option,$text){
      $status="";
       
      if($text=="Pagado"){
      	 $status="1";
      }
      else if($text=="Cancelado"){
      	 $status="2";
      }
      else if($text=="Apartado"){
      	 $status="3";
      }
      else if($text=="No pago"){
      	 $status="0";
      }

      $query="UPDATE ticket_mod_extras SET status = ? WHERE id = ? ";
      $res = $this->db->query($query,array($status,$option));
      return $res;

  }

public function saveAddedMod($mod,$pago){
    $total=0; 
    settype($pago,"integer");
    $ticket=0;
	//$array[0] = json_decode($mod);
	$array = $mod[0]["mod"];
	for ($i=0; $i < count($mod); $i++) { 
		$str = $mod[$i]["mod"];
		$array = explode("-", $str);
		settype($array[5], "integer");
        $total+=$array[5];


	}

	$ref = $mod[0]["mod"];
    $array = explode("-", $ref); 
    $data = array(
                  'idUser' => $array[1],
                  'idEvento' =>  $array[0],
                  'idRow' => $array[2],
                  'status' =>"3",
                  'tipoPago' =>$pago,
                  'fichaDeposito' =>"pendiente",
                  'total' =>$total
         
           );
    $result =  $this->db->insert('ticket_mod_extras', $data);
    if($result=="true"){
        $query= "SELECT id FROM ticket_mod_extras ORDER BY id DESC LIMIT 1";
        $res = $this->db->query($query);
         if($res->num_rows()>0){
           foreach ($res->result() as $row) {
            $ticket = $row->id;
                break;

         	}
            
             for ($i=0; $i < count($mod); $i++) { 
		           $str = $mod[$i]["mod"];
		           $array = explode("-", $str);
		           $data = array(
                  'modificadorId' => $array[3],
                  'modNombre' =>  $array[4],
                  'modPrecio' => $array[5],
                  'idTicket' =>$ticket
                
         
                   );
		        
                   $result =  $this->db->insert('mod_extras', $data);

	            }
            

         }

    }

    

	/*foreach ($mod as $key => $value) {
       
       $aux = $key["mod"];
       $items = explode("-", $aux);
       /*$data = array(
                  'idEvento' => $ide,
                  'idVendedor' =>  $vendedor,
                  'idCliente' => $cliente,
                  'codigo' =>$codigo,
                  'idEU' =>"0",
                  'costo' =>$costo,
                  'sexo' =>$sexo
         
           );
       $result =  $this->db->insert('boletos_impresos', $data);
       settype($items[5], "integer");
       $total+=$items[5];

    }*/

    //$ref = $array[0]["mod"];
    /*$array = explode("-", $ref); 
    $data = array(
                  'idUser' => $array[0],
                  'idEvento' =>  $array[1],
                  'idRow' => $array[2],
                  'status' =>"3",
                  'tipoPago' =>$tipo,
                  'fichaDeposito' =>"pendiente",
                  'total' =>$total
         
           );
       $result =  $this->db->insert('ticket_mod_extras', $data);*/

return $result;
	
	
}

	public function getModificadoresBoleto($idu,$ide,$idr){
          $modbasicos;
          $modextras;
          $modtotal;
          $index=0;
          $flag=0;
          $tickets;
          $query="SELECT modNombre as nombre FROM moduser WHERE modUserId = ? and modEventoId = ? AND rowEventosUsuarios = ?";
          $res = $this->db->query($query,array($idu,$ide,$idr));
          if($res->num_rows>0){
              
             foreach ($res->result() as $row){

                   	  $modtotal[$index] = array("nombre"=>$row->nombre);
                   	  $index++;
                   }
                   $flag=1;
             
          }

        


          $query="SELECT id AS ticket FROM ticket_mod_extras WHERE idUser = ? AND idEvento = ? AND idRow = ? AND status = '1'";
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

                     $flag=1;

                }
             	
             }
             
          }
      

      if($flag==0){
      	$modtotal="0";
      }
         

       return $modtotal;
      


	}

	public function saveBoletoPublico($ide, $nameEvento,$fechaEvento,$precioeve,$idv,$codigo,$totalBoleto,$sexo,$nameCiudad,$hoy,$modificadores){
        $flag="0";
        settype($ide, "integer");
        $disponibles;
        $impresos; 
        $last="0";
        $query="SELECT numeroBoletos, impresos FROM eventos_boletos WHERE idEvento = ?";
        $res = $this->db->query($query,array($ide));
           if($res->num_rows()>0){
             foreach ($res->result() as $row) {
               $disponibles = $row->numeroBoletos;
               $impresos = $row->impresos;
                break;

         	  }
         }

        settype($disponibles, "integer");
        settype($impresos, "integer");
        $aux = $disponibles - $impresos;

        if($aux>=1){
        	$flag="1";
         
         $data = array(
                  'idEvento' => $ide,
                  'nombreEvento' =>  $nameEvento,
                  'fechaEvento' => $fechaEvento,
                  'precioEvento' => $precioeve,
                  'idVendedor' =>$idv,
                  'codigo' => $codigo,
                  'total' => $totalBoleto,
                  'sexo' => $sexo,
                  'ciudad' => $nameCiudad,
                  'fecha' => $hoy
                
         
                   );
		        
                   $result =  $this->db->insert('boletos_publico', $data);

         $query="UPDATE eventos_boletos SET impresos = impresos + 1 WHERE idEvento = ?";
         $res = $this->db->query($query,array($ide));          
        
        if(is_array($modificadores)){
          $query= "SELECT id FROM boletos_publico ORDER BY id DESC LIMIT 1";
          $res = $this->db->query($query);
           if($res->num_rows()>0){
             foreach ($res->result() as $row) {
               $last = $row->id;
                break;

         	  }
              
              foreach ($modificadores as $key => $value) {
              	
              	  $data = array(
                  'modId' => $value["id"],
                  'modNombre' =>  $value["nombre"],
                  'modPrecio' => $value["precio"],
                  'idBoletoPublico' => $last,

                   );
		        
                   $result =  $this->db->insert('mod_publico', $data);

              }  

         }	

        } 

       }

       else{
       	 $flag="0";
       }

       return $flag;

	}



public function getDataBoletoVendedor($id){
	settype($id, "integer");
	$index=0;
    $data;
	$query="SELECT nombreEvento,fechaEvento,precioEvento FROM boletos_publico WHERE id = ? ";
	$res = $this->db->query($query,array($id));
	 if($res->num_rows>0){
        foreach ($res->result() as $row) {
          $data[$index] = array("eventoNombre"=>$row->nombreEvento,"eventoFecha"=>$row->fechaEvento,"euPrecio"=>$row->precioEvento); 
        }

  	 }

  	 return $data;
}

public function getModificadoresBoletoVendedor($id){
	settype($id, "integer");
    $mod;
    $index=0;
	$query="SELECT modNombre FROM mod_publico WHERE idBoletoPublico = ?";
	$res = $this->db->query($query,array($id));
	 if($res->num_rows>0){
        foreach ($res->result() as $row) {
          $mod[$index] = array("nombre"=>$row->modNombre); 
          $index++;
        }

  	 }

  	 else{
       $mod="0";
  	 }

  	 return $mod;

}





  //*****  fUNCIONES DEL VENDEDOR *******//

  public function getBoletosDisponibles(){
  	  $result;
      $query="SELECT id,idEvento,eventoNombre, texto 
      FROM  eventos_boletos,eventos
      WHERE eventos.eventoId = eventos_boletos.idEvento";
       $res = $this->db->query($query);
        if($res->num_rows()>0){
          $result = $res->result_array();
        }

        else{
          $result="0";
        }

        return $result;

  }

  public function getBoletosAndCiudades($idR,$idE){
  	 $disponibles;
  	 $data;
     $ciudad;
  	 $strhombres;
  	 $strmujeres;
  	 $strciudades;
  	 $modificadores;
  	 $idciudad;
  	 $eveFecha;

  	 $ciudad_costo;
  	 settype($idR, "integer");
  	 settype($idE, "integer");
  	 $query="SELECT numeroBoletos, impresos FROM eventos_boletos WHERE id = ? AND idEvento= ?";
  	 $res = $this->db->query($query,array($idR,$idE));
  	 if($res->num_rows>0){
        foreach ($res->result() as $row) {
          $disponibles = $row->numeroBoletos - $row->impresos;
        }

  	 }

  	 else{
  	 	$disponibles="0";
  	 }


  	 $query="SELECT eventoPrecioBase, eventoPrecioBaseM, eventoCiudad, eventoFecha FROM eventos WHERE eventoId= ?";
  	 $res = $this->db->query($query,array($idE));
  	  if($res->num_rows>0){
        foreach ($res->result() as $row) {
          $strhombres = $row->eventoPrecioBase;
          $strmujeres = $row->eventoPrecioBaseM;
          $strciudades = $row->eventoCiudad;
          $eveFecha =   $row->eventoFecha;

        }

        $arrayciudades= explode("--", $strciudades);
        $arrayhombres= explode("--", $strhombres);
        $arraymujeres= explode("--", $strmujeres);
        
        for ($i=0; $i < count($arrayciudades)-1 ; $i++) { 
        	 settype($arrayciudades[$i], "integer");
        	 $query="SELECT ciudadNombre,ciudadId FROM ciudades WHERE ciudadId= ?";
        	 $res = $this->db->query($query,array($arrayciudades[$i]));
        	 if($res->num_rows>0){
                foreach ($res->result() as $row) {
                  $ciudad=$row->ciudadNombre;
                  $idciudad=$row->ciudadId;
                }
 

             }

             $ciudad_costo[$i] = array("ciudad"=>$ciudad,"hombres"=>$arrayhombres[$i],"mujeres"=>$arraymujeres[$i],"fecha"=>$eveFecha);

        }



  	 }

  	 else{
  	 	$ciudad_costo="0";
  	 }
    $index=0;
    $query="SELECT modificadorId , modificadorNombre, modificadorPrecio, modificadorPrecioM, modificadorTipo FROM modificadores WHERE modificadorIdEvento = ?";
    $res = $this->db->query($query,array($idE));
    if($res->num_rows>0){
        foreach ($res->result() as $row) {
          $modificadores[$index] = array("id"=>$row->modificadorId,"nombre"=>$row->modificadorNombre,"hombres"=>$row->modificadorPrecio,"mujeres"=>$row->modificadorPrecioM,"tipo"=>$row->modificadorTipo);
          $index++;

        }
    }

    else{
    	$modificadores="0";
    }


     $data[0] = array("boletos"=>$disponibles,"ciudades"=>$ciudad_costo,"modificadores"=>$modificadores);
  	 
  	 return $data;

  }

  public function getEventos(){
  	 $eventos;
  	 
  	 $query="SELECT  eventoNombre, eventoId
  	         FROM  eventos";
  	 $res = $this->db->query($query);  
  	 if($res->num_rows>0){
         $eventos = $res->result_array();

  	 } 

  	 else{
  	 	$eventos="0";
  	 } 

  	  return $eventos;   

  }

    public function getBoletosVendedor($idv,$ide,$fecha){
     $venta;
  	 settype($idv, "integer");
  	 settype($ide, "integer");
     $query="";
     if($ide!="0"){
     	$query="SELECT * FROM boletos_publico WHERE idVendedor = ? AND idEvento = ? AND fecha = ?";
     	$res = $this->db->query($query,array($idv,$ide,$fecha)); 
     	if($res->num_rows>0){
           $venta = $res->result_array();
         }
        else{
  	 	  $venta=0;
  	    } 

  	 }

  	 else{

  	 	$query="SELECT * FROM boletos_publico WHERE idVendedor = ? AND fecha = ?";
     	$res = $this->db->query($query,array($idv,$fecha)); 
     	if($res->num_rows>0){
           $venta = $res->result_array();
         }
        else{
  	 	  $venta=0;
  	    } 



  	 }

  	 return $venta;


     }
 
  

  	

  	  
  

  public function getDataBoleto($idEvento){
  	$result;
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



  public function reporteEventos(){
  	 $result;
  	 $count=0;
  	 $count2=0;;
  	 $eventos;// = array("usuarioId" =>$row->usuarioId,
            	    	//                       "usuario"=>$row->usuarioNombre,
  	 $query="SELECT * FROM eventos";
  	 $res = $this->db->query($query);
  	if($res->num_rows>0){
        
          foreach ($res->result() as $row) {
             $rowCiudadPrecio="";
             $txtciudad="";
             $ciudadName="";
             $totalCiudades=0;

             $txtciudad= substr($row->eventoCiudad, 0, -2);
             $idsCiudad = explode("--", $txtciudad);
             
             $txtHombre =  substr($row->eventoPrecioBase, 0, -2);
             $preciosHombre = explode("--", $txtHombre);

             $txtMujer= substr($row->eventoPrecioBaseM, 0, -2);
             $preciosMujer = explode("--", $txtMujer);

             $totalCiudades = count($idsCiudad);

              for ($i=0; $i < $totalCiudades;  $i++) { 
              	  settype($idsCiudad[$i], "integer"); 
              	  $query="SELECT ciudadNombre FROM ciudades WHERE ciudadId = ?";
              	  $res = $this->db->query($query,array($idsCiudad[$i]));
              	  foreach ($res->result() as $row2) { 
                     $ciudadName = $row2->ciudadNombre;       
              	  }

              	  $rowCiudadPrecio[$i] = array("ciudad"=>$ciudadName,"hombre"=>$preciosHombre[$i],"mujer"=>$preciosMujer[$i]);
                }

                $paypal = ($row->eventoPagoPaypal==1) ? 'Si' : 'No';
                $deposito = ($row->eventoPagoDeposito==1) ? 'Si' : 'No';
                $oxxo = ($row->eventoPagoOxxo==1) ? 'Si' : 'No';
                $contado = ($row->eventoPagoContado==1) ? 'Si' : 'No';

                $eventos[$count] = array("nombre"=>$row->eventoNombre,
                	                     "fecha"=>$row->eventoFecha,
                	                     "ciudades"=>$rowCiudadPrecio,
                	                     "lugares"=>$row->eventoLugares,
                	                     "puntos"=>$row->eventoPuntos,
                	                     "paypal"=>$paypal,
                	                     "deposito"=>$deposito,
                	                     "oxxo"=>$oxxo,
                	                     "contado"=>$contado); 
                $count++;

                    
          }


    }
    else{
    	$eventos="0";
    }

    return $eventos;


  }

  public function reporteVendedores(){
  	$vendedores;
	$query="SELECT * FROM admin WHERE adminTipo=1";
	$res = $this->db->query($query);
  	if($res->num_rows>0){
       $vendedores = $res->result_array();
  	}

  	 else{
  	 	$vendedores="0";
  	 } 

  	 return $vendedores;

  }

  public function reporteVentasVendedor(){
  	$query="SELECT admin.adminNombre, eventos.eventoNombre, count(boletos_impresos.idVendedor) AS cantidad
  	        FROM admin,eventos,boletos_impresos
  	        WHERE admin.adminId = boletos_impresos.idVendedor GROUP by boletos_impresos.idEvento";
  	        
  }

  public function changeStatusCliente($values,$sta){
     $val = explode("-",$values);
     $res;
     $status=0;
     
     settype($val[0], "integer");
     settype($val[1], "integer");
     settype($val[2], "integer");

     if($sta=="Cancelado"){
     	$status=2;

     }
     elseif ($sta=="No hay pago") {
     		$status=0;
     }
     else if($sta=="Pagado"){
     	$status=1;

     }	
     else if($sta=="Apartado"){
        $status=3;
     }

     $query="UPDATE eventosusuarios SET euStatus= ? WHERE euId = ? AND euIdUsuario= ? AND euIdEvento = ? ";
     $res = $this->db->query($query,array($status,$val[0],$val[1],$val[2])); 
     return $res;
  }

public function checkBoletosEvento($ide){
	settype($ide, "integer");
	$result;
	$query="SELECT * FROM eventos_boletos WHERE idEvento = ?";
	$res = $this->db->query($query,array($ide));
	if($res->num_rows>0){
       $result = $res->result_array();
	}

	else{
		$result=0;
	}

	return $result;

}

public function checkExistBoleto($idr,$idu,$ide){
	$result;
	$codigo="";
	settype($idr, "integer");
	settype($idu,"integer");
	settype($ide,"integer");
	$query="SELECT codigo FROM boletos_impresos WHERE idEvento= ? AND idCliente = ? AND idEU = ? ";
	$res = $this->db->query($query,array($ide, $idu,$idr));
	if($res->num_rows>0){
        foreach ($res->result() as $row) {
        	$codigo= $row->codigo;
        	
        }
	}

	else{
		$codigo="-1";
	}

	return $codigo;
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

   public function getDataEvento($ide){
   	     settype($ide, "integer");
   	     settype($idu, "integer");
      $data;
   	  $query="SELECT eventos.eventoNombre,eventos.eventoFecha 
   	  FROM eventos
   	  WHERE eventos.eventoId = ? ";
   	  $res = $this->db->query($query,array($ide));
   	  if($res->num_rows>0){
              //foreach ($res->result() as $row) {
                     $data = $res->result_array(); 
              //}
       }

       else{
       	 $data="0";
       }

       return $data;

   }


   public function getDataEventoAdmin($ide,$idu){
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

   public function getDataEventoPublico($ide,$sexo,$ciudad){
       settype($ide, "integer");
       settype($ciudad, "integer");
       $result;
       $ciudades;
       $pmujer;
       $phombre;
       $arrayC;
       $arrayM;
       $arrayH;
       $count=0;
       $name;
       $fecha;
       $query="SELECT eventoPrecioBase, eventoNombre, eventoFecha, eventoPrecioBaseM, eventoCiudad FROM eventos WHERE eventoId = ?";
       $res = $this->db->query($query,array($ide));
   	   if($res->num_rows>0){
           foreach ($res->result() as $row) {
                    $ciudades = $row->eventoCiudad;
                    $pmujer = $row->eventoPrecioBaseM;
                    $phombre = $row->eventoPrecioBase;
                    $name = $row->eventoNombre;
                    $fecha = $row->eventoFecha;
            }

            $arrayC = explode("--", $ciudades);
            $arrayH = explode("--",$phombre);
            $arrayM = explode("--",$pmujer);

            for ($count=0; $count < count($arrayC)-1; $count++) { 
            	 
            	 settype($arrayC[$count], "integer"); 
            	  

            	 if($ciudad==$arrayC[$count])
            	 	break;

            }

            if($sexo=="1")
          
                $result[0]=array("euPrecio"=>$arrayH[$count],"eventoNombre"=>$name,"eventoFecha"=>$fecha);
            else
               $result[0]=array("euPrecio"=>$arrayM[$count],"eventoNombre"=>$name,"eventoFecha"=>$fecha);



          
       }

    else{

    }

      return $result;
   }

   public function getCiudadesEvento($ide){
   	  $result;
   	  $arrayciudades;
   	  $arrayfinal;
   	  $query="SELECT eventoPrecioBase, eventoPrecioBaseM, eventoCiudad FROM eventos WHERE eventoId = ?";
   	  $res = $this->db->query($query,array($ide));
   	  if($res->num_rows>0){
             
                 $result= $res->result_array(); 
             
       }

       else{
       	 $result="0";
       }
       

       $ciudades = $result[0]["eventoCiudad"];
       $hombres = explode("--",$result[0]["eventoPrecioBase"]);
       $mujeres = explode("--",$result[0]["eventoPrecioBaseM"]);


       $array = explode("--", $ciudades);
       for ($i=0; $i < count($array)-1; $i++) { 
       	  
       	  if($array[$i]=="--"){
       	  	continue;
       	  }
       	  	
       	  else{
            settype($array[$i], "integer");
            $query= "SELECT ciudadNombre FROM ciudades WHERE ciudadId = ?";
       	    $res = $this->db->query($query,array($array[$i]));
       	    if($res->num_rows>0){
                foreach ($res->result() as $row) {
                    $arrayciudades[$i] = array("ciudad"=>$row->ciudadNombre); 
                    break;
              }
             
            }
            else{
               $arrayciudades[$i] = array("ciudad"=>"0"); 
            }

       	  }
     



       }

      for ($i=0; $i < count($arrayciudades); $i++) { 
       	  
       	  $arrayfinal[$i]= array("ciudad"=> $arrayciudades[$i]["ciudad"],"hombre"=>$hombres[$i],"mujer"=>$mujeres[$i]);

       }

       return $arrayfinal;

   }

	  public function get_clientes_cuartos(){

  		$cuartos="";
		$clientes="";
		$result;
		$count=0;
		$query="";
        $query="SELECT DISTINCT usuarios.usuarioId, usuarios.usuarioNombre, usuarios.usuarioDomicilio, usuarios.usuarioTelefonno,usuarios.usuarioSexo, usuarios.usuarioEmail
                FROM usuarios, cuartos_usuarios
                WHERE usuarios.usuarioId = cuartos_usuarios.idUsuario";
        $clientes = $this->db->query($query); 
        if($clientes->num_rows()>0){
			foreach ($clientes->result() as $row) {

                  $query="SELECT cuartos_usuarios.id as idr, cuartos_usuarios.idUsuario, cuartos_usuarios.idCasa, cuartos_usuarios.casaNombre ,cuartos_usuarios.idCuarto,cuartos_usuarios.sennia,cuartos_usuarios.costo, cuartos_usuarios.tipoPago, cuartos_usuarios.status, cuartos_usuarios.fichaDeposito, ciudades.ciudadNombre
				          FROM cuartos_usuarios,ciudades
				          WHERE cuartos_usuarios.idUsuario = ? AND cuartos_usuarios.idCiudad = ciudades.ciudadId";
				   $res = $this->db->query($query, array($row->usuarioId));
				   $cuartos = $res->result_array();

                    
				   $result[$count] = array("userId"=>$row->usuarioId,
				   	                       "userName"=>$row->usuarioNombre,
				   	                       "userDom"=>$row->usuarioDomicilio,
				   	                       "userTel"=>$row->usuarioTelefonno,
				   	                       "userSexo"=>$row->usuarioSexo,
				   	                       "userMail"=>$row->usuarioEmail,
				   	                       "usuarioCuarto"=>$cuartos);
				   $count++;
                

			}
	  
             
        }

        else{
        	$result="0";
        }

        return $result;

  }


	//Fin de funciones Daniel Alejandro Chávez Vázquez
	
	/*
	* metodo para obtener los usuarios que ya pagaron su boleto de un evento
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function usuarios_boleto($idevento){
			//$this->db->where('euStatus',1);
			$this->db->where('euIdEvento',$idevento);
			$query=$this->db->get('eventosusuarios');
			if($query->num_rows()>0){
				return $query->result();;
			}else{
				return 0;	
			}
	}
	
	/*
	* metodo para obtener los nombres de los usuarios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_nombre_usuario($id_user){
		$this->db->where('usuarioId',$id_user);	
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			$res=$query->row();
			return $res->usuarioNombre;
		}else{
			return 'sin nombre';	
		}
	}
	
	 public function changeStatusCuarto($values,$sta){
     $val = explode("-",$values);
     $res;
     $status=0;
     
     settype($val[0], "integer");
     settype($val[1], "integer");
     settype($val[2], "integer");
     settype($val[3], "integer");

     if($sta=="Cancelado"){
      $status=2;

     }
     elseif ($sta=="No hay pago") {
       $status=0;
     }
     else if($sta=="Pagado"){
      $status=1;

     } 
     else if($sta=="Apartado"){
        $status=3;
     }

     $query="UPDATE cuartos_usuarios SET status= ? WHERE id = ? AND idUsuario= ? AND idCuarto = ? AND  idCasa = ?";
     $res = $this->db->query($query,array($status,$val[0],$val[1],$val[2],$val[3])); 
     return $res;
  }
	
}

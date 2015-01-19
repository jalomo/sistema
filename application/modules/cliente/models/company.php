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
	* metodo para guardar en la tabla de encuestas
	*autor jalomo <jalomo@hotmail.es>
	*/
	public function save_encuesta($data){
		$this->db->insert('encuestas', $data);
        return $this->db->insert_id();
	}
	
	/*
	* metodo para guardar en la tabla de preguntas
	* autor: jalomo<jalomo@hotmail.es>
	*/
	public function save_pregunta($data){
		$this->db->insert('preguntas', $data);
        return $this->db->insert_id();
	}
	
	
	/*
	* metodo para guardar las opciones de la pregunta
	* autor: jalomo<jalomo@hotmail.es>
	*/
	public function save_opciones($data){
		$this->db->insert('opciones', $data);
        return $this->db->insert_id();
	}
	
	/*
	* metodo para eliminar una encuesta
	*/
	public function delete_encuesta($id)
    {
        $this->db->delete('encuestas', array('encuestaId'=>$id));
		$this->db->delete('preguntas', array('preguntaIdEncuesta'=>$id));
		$this->delete_opciones($id);
    }
	
	/*
	* eliminar opciones de una pregunta
	*/
	public function delete_opciones($idEncuesta){
		$this->db->where('preguntaId',$idEncuesta);	
		$query=$this->db->get('preguntas');
		$resultado=$query->row();
		$id=$resultado->preguntaId;
		$this->db->delete('opciones', array('opcionIdPregunta'=>$id));
	}
	/*
	* metodo para obtener el volcado de las encuestas
	* que se encuetran en la base de datos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_all_encuestas()
    {
        $data = $this->db->get('encuestas');
        return $data->result();
    }
	
	/*
	* metodo para obtener la fila de la tabla encuesta
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_encueta_id($id)
    {
        $this->db->where('encuestaId',$id);
		$data = $this->db->get('encuestas');
        return $data->row();
    }
	
	/*
	* metodo para obtener las preguntas de una encuesta
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_preguntas($idencuesta)
    {
        $this->db->where('preguntaIdEncuesta',$idencuesta);
		$data = $this->db->get('preguntas');
        return $data->result();
    }
	
	/**
     * Method for take all the notifications and the user can
     * see the information that was sent before ago.
	 *
     **/
    public function get_all_list_notifications()
    {
        $data = $this->db->get('notificaciones');
        return $data->result();
    }
	
	
	 /**
     * Method for get the specific data of the notifications
     * and can show all the information for the user 
     * and know what is the message to sent
     *
     * @params int idNotification
     * @return array mixedData
     *
     **/
    public function get_specific_notification($id)
    {
        $this->db->where('notificacionId', $id);
        $data = $this->db->get('notificaciones');
        return $data->row();
    }
	
	/**
     * Method for load all the information about the news and can
     * show then in the mobile app, this for can show in the list
     * to the user admin as well.
     *
     * @params mixed arrayData
     * @return int id
     **/
    public function save_news($data){
        $this->db->insert('noticias', $data);
        return $this->db->insert_id();
    }
	
	/*
	* metodo para guardar en la tabla de eventos
	*/
	public function save_eventos($data){
        $this->db->insert('eventos', $data);
        return $this->db->insert_id();
    }

	/**
     * Method to use for get all the information 
     * of the news will be added to a list for show the
     * information to the admin panel
     *
     * @return array mixedData
     **/
    public function get_all_news(){
        $data = $this->db->get('noticias');
        return $data->result();
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
     * Method for delete the specific notification and the user can
     * see how drop or how to hide the information wants to delete
     * once confirm the dialog box
     *
     * @params int idNotification
     * @return void
     **/
    public function delete_specific_notification($id)
    {
        $this->db->delete('notificaciones', array('notificacionId'=>$id));
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
        return $data->row();
    }
	
	
	public function count_results_usuarios($user, $pass)
    {
        $this->db->where('usuarioUsername', $user);
        $this->db->where('usuarioPassword', $pass);
        $total = $this->db->count_all_results('usuarios');
        return $total;
    }
	
	public function get_all_data_usuarios_specific($username, $pass)
    {
        $this->db->where('usuarioUsername', $username);
        $this->db->where('usuarioPassword', $pass);
        $data = $this->db->get('usuarios');
        return $data->row();
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
	
}

<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**

 **/
class Companies extends MX_Controller {

    /**
     
     **/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company', '', TRUE);
        $this->load->library(array('session'));
        $this->load->helper(array('form', 'html', 'companies', 'url'));
    }
	
	
	public function index(){
			$content = $this->load->view('companies/panel_menu', '', TRUE);
             $this->load->view('main/template', array('aside'=>'',
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
	}
	public function index1(){
		
		
		$CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
		
		
        $this->load->library('Facebook', $config);
		
		$user = $this->facebook->getUser();
		
		/*$loginUrl = $this->facebook->getLoginUrl(array(
		 'scope' => 'email,user_birthday'
		));
		echo '<a href="'.$loginUrl.'">Login with Facebook</a>';*/
		
		if($user) {
            try {
                $user_info = $this->facebook->api('/me');
				$logoutUrl = $this->facebook->getLogoutUrl();
				//echo $logoutUrl;
			
				
				
                echo '<pre>'.htmlspecialchars(print_r($user_info, true)).'</pre>'.'<br/>';
				$aux=explode("https://www.facebook.com/",$user_info['link']);
				//echo $aux[1];
				echo "<a href=\"{$this->facebook->destroySession()}\">salir</a>".$user_info['id'];
				$id_usuario=$this->Company->get_id_facebook($user_info['id']);
				print_r($user_info);
				if($id_usuario==0){
					//echo $this->get_aleatoria();
					$data['usuarioNombre']=$user_info['name'];
					$data['usuariodomicilio']='';
					$data['usuarioTelefonno']='';
					$data['usuarioIdAdmin']=0;
					$data['usuarioUsername']='cl-'.$this->get_aleatoria();
					$data['usuarioPassword']=$this->get_aleatoria();
					$data['usuarioPais']='';
					$data['usuarioEstado']='';
					$data['usuarioSexo']='';
					$data['usuarioIdFacebook']=$user_info['id'];
					$data['usuarioEmail']=$user_info['email'];
					$id_user=$this->Company->save_usuario_($data);
					
					$message_to_send="Hola ".$data['usuarioNombre']." bienvenido a conexion , para ingresr tu usuario es:  ".$data['usuarioEmail']."   y yu contraseña es:".$data['usuarioPassword']."";
		
				 $this->load->library('email');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$this->email->initialize($config);											   
	
				//SEND THE EMAIL
				$this->email->from('gregorio@divestis.com', 'REGISTRO CONEXION');
				$this->email->to($data['usuarioEmail']);
				$this->email->subject('usuario y contraseña conexion');
				$this->email->message($message_to_send);
				$this->email->send();
			   // echo $this->email->print_debugger();
				$this->email->clear();
					 

					$array_session = array('id'=>$id_user);
					$this->session->set_userdata($array_session);
					if($this->session->userdata('id'))
					{
						redirect('cliente');
						
					}
					else{
					}
					
					
						
				}else{
					$array_session = array('id'=>$id_usuario);
					$this->session->set_userdata($array_session);
					if($this->session->userdata('id'))
					{
						redirect('cliente');
						
					}
					else{
					}
					
					echo 1;	
				}
				
            } catch(FacebookApiException $e) {
                echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>'.'<br/>';
				
				echo "<a href=\"{$this->facebook->destroySession()}\">logout</a>";
                $user = null;
				
				
				
            }
        } else {
              
			
			 
			 $data['facebook']= "<a href=\"{$this->facebook->getLoginUrl(array(
		 		'scope' => 'email,user_birthday'
				))}\">".img(array('src'=>'statics/img/boton ingresar fb.png'))."</a>";
			 
			 $content = $this->load->view('companies/panel_menu', $data, TRUE);
             $this->load->view('main/template', array('aside'=>'',
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
        }

	}
	
	/*
		* metodo para obtener un usuario aleatorio.
		* autor: jalomo <jalomo@hotmail.es>
		*/
		public function get_aleatoria(){
			
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; //posibles caracteres a usar
			$numerodeletras=2; //numero de letras para generar el texto
			$cadena = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++)
			{
				$cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
			}
			//echo $cadena;
			
			$caracteres = "1234567890"; //posibles caracteres a usar
			$numerodeletras=3; //numero de letras para generar el texto
			$cadena1 = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++)
			{
				$cadena1 .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
			}
			return $cadena.$cadena1;	
		}
		
		
	
		
	/*
	*metodo para crear usuarios 
	*administradores
	*autor: jalomo <jalomo@hotmail.es>
	*/
	public function crear_admin(){
	
        $this->load->view('companies/registro_admin');
  
	}
	
	/**
     *metodo para guardar el registro del
	 *administrador
     * 
     **/
    public function guarda_admin()
    {
        $post = $this->input->post('Registro');
        if($post)
        {
            $pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $post['adminPassword'] = $pass;
            $post['adminStatus'] = 1;
			$post['adminFecha']=date('Y-m-d');
            $id = $this->Company->save_admin($post);
            echo $id;
        }
        else{
        }
    }
	
	/*
	*metodo para checar el login y la contraseña
	*/
	public function checkDataLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if(isset($username) && isset($password) && !empty($password) && !empty($username))
        {
            $str = $post['adminUsername'];
			$cadena=explode("-",$str);
		   if($cadena[0]=="cl"):
				 $total = $this->Company->count_results_usuarios($username, $pass);
				if($total == 1)
				{
					echo "1";
				}
				else{
					echo "0";
				}
			else:
		    $pass = encrypt_password($username,
                                     $this->config->item('encryption_key'),
                                     $password);
            $total = $this->Company->count_results_users($username, $pass);
            if($total == 1)
            {
                echo "1";
            }
            else{
                echo "0";
            }
			endif;
        }
        else{
            redirect('companies');
        }
    }
	
	/*
	*metodo para inicio de session
	*/
	public function mainView()
    {
        $post = $this->input->post('Login');
        if(isset($post) && !empty($post))
        {
            $str = $post['adminUsername'];
			//$cadena=explode("-",$str);
			$dataUser = $this->Company->get_all_data_usuarios_specific($post['adminUsername'],$post['adminPassword']);
			
			if(isset($dataUser1->usuarioId)):
			//if($cadena[0]=="cl"):
					// $dataUser = $this->Company->get_all_data_usuarios_specific($post['adminUsername'],$post['adminPassword']);
					
					if($dataUser!=0){
						$array_session = array('id'=>$dataUser->usuarioId);
						$this->session->set_userdata($array_session);
						if($this->session->userdata('id'))
						{
							redirect('cliente');
							
						}
						else{
							redirect('companies');
							
						}
					}else{
						redirect('companies');
					}
			
			else:
			
			$pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $dataUser = $this->Company->get_all_data_users_specific($post['adminUsername'], $pass);
			if(isset($dataUser->adminId)):
            $array_session = array('id'=>$dataUser->adminId);
            $this->session->set_userdata($array_session);

            if($this->session->userdata('id'))
            {
				
				$tipo = $this->Company->get_data_admin($this->session->userdata('id'));
				if($tipo->adminTipo==0){
					redirect('companies/ventas_boletos');
				}elseif($tipo->adminTipo==1){
				redirect('companies/addEvento');
				}
                /*$aside = $this->load->view('companies/left_menu', '', TRUE);
                $content = $this->load->view('companies/main_view', '', TRUE);
                $this->load->view('main/template', array('aside'=>$aside,
                                                         'content'=>'',
														 'included_js'=>array('statics/js/modules/menu.js')));*/
            }
            else{
            }
			
			else:
			redirect('companies/');
			endif;
			
			endif;
        }
        else{
        }
    }
	
	public function addEvento(){
		
		if($this->session->userdata('id'))
        {
		
		$data['eventos']=$this->Company->get_alla_eventos();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/addproyecto', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));
		}
        else{
            redirect('companies');
        }											   
		
	}
	
	/*
	* metodo para guarda los eventos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_evento(){
		
		if($this->session->userdata('id'))
        {
		$post=$this->input->post('evento');
		
		$mod = $this->input->post('mod');
		$top=sizeof($mod['ciudad']);
			
			 $ciudad='';
			  $precioH='';
			  $precioM='';
			  for($i=0;$i<$top;$i++):
			  
				
				$ciudad.=$mod['ciudad'][$i].'--';
				$precioH.=$mod['PrecioH'][$i].'--';
				$precioM.=$mod['PrecioM'][$i].'--';
			   
				/*if($data['Nombre']=='' && $data['Precio']=='' ){
					
				}else{
					//print_r($data);	
					
					
					//$this->Company->save_productos($data);
					
				}*/
			   endfor;
			   echo $ciudad;
			$post['eventoCiudad']=$ciudad;
			$post['eventoPrecioBase']=$precioH;
			$post['eventoPrecioBaseM']=$precioM;
			
			
			
			if($_FILES['image']['name'] != ''){
                
               // $post['noticiasFecha'] = date('d-m-Y');
                $name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['image']['name']);

                $path_to_save = "statics/img_eventos/";
                move_uploaded_file($_FILES['image']['tmp_name'], $path_to_save.$name);

                $post['eventoUrlImage'] = $path_to_save.$name;

                
            }else{
				$post['eventoUrlImage'] ="";
			
			}
			
			
			
			$reultaod=$this->Company->save_eventos_($post);
		
		}
        else{
            redirect('companies');
        }
		
		
	}
	
	/*
	* metodo para editar un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function edita_evento(){
		
		if($this->session->userdata('id'))
        {
		$post=$this->input->post('evento');
		$id_evento=$this->input->post('id_evento');
		
			$reultaod=$this->Company->edita_evento($post,$id_evento);
		
		}
        else{
            redirect('companies');
        }
		
		
	}
	
	/*
	* metodo para eliminar un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function eliminar_evento($id){
		
		$this->Company->eliminar_evento($id);
	}
	
	
	/*
	* metodo para obtener los datos de un evento.
	*  autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_data_evento($id){
		$resultado=$this->Company->get_evento_id($id);	
		echo json_encode($resultado);
	}
	
	/*
	* metodo de la lista de eventos para agregar modificadores.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function modificadores(){
		
		$data['eventos']=$this->Company->get_alla_eventos();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/modificador', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js')));
		
	}
	
	/*
	* metodo para ver los modificadores de un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function ver_modificadores($id){
		
		$data['evento']=$this->Company->get_evento_id($id);
		$data['modificadores']=$this->Company->get_modificador_id($id);
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/vermodificador', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));
		
	}
	
	/*
	* metodo para guardar un modificador.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function guarda_modificador(){
		
		//if($this->session->userdata('id'))
        //{
		$post=$this->input->post('modificador');
		
			$reultaod=$this->Company->save_modificadores($post);
		
		/*}
        else{
            redirect('companies');
        }*/
		
		
	}
	
	/*
	* obtener los datos de un modificador.
	* autor: jalomo<jalomo@hotmail.es>
	*/
	public function get_data_modificador($id){
		$resultado=$this->Company->get_modificador_id($id);	
		echo json_encode($resultado);
	}
	
	/*
	* metodo de la lista de eventos para agregar modificadores.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function usuarios(){
		
		$data['usuarios']=$this->Company->get_all_usuarios();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/usuarios', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_usuarios.js')));
		
	}
	
	/*
	* metodo para guardar un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_usuario(){
		 $post = $this->input->post('usuario');
        if($post)
        {
            $pass = encrypt_password($post['adminUsername'],
                                     $this->config->item('encryption_key'),
                                     $post['adminPassword']);
            $post['adminPassword'] = $pass;
            $post['adminStatus'] = 1;
			$post['adminFecha']=date('Y-m-d');
            $id = $this->Company->save_admin($post);
            echo $id;
        }
        else{
        }	
	}
	
	/*
	* metoso para obtener los datos de un usuario
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_usuario_id($id){
		$resultado=$this->Company->get_usuario_id($id);	
		echo json_encode($resultado);
	}
	
	/*
	* metodo para crear usuarios.
	+ autor: jalomo <jalomo@hotmail.es>
	*/
	public function ventas(){
		
		$data['paises']=$this->Company->get_paises();
		$data['estados']=$this->Company->get_estados();
		$data['usuarios']=$this->Company->get_usuarios($this->session->userdata('id'));
		$aside = $this->load->view('companies/menu_ventas', '', TRUE);
        $content = $this->load->view('companies/cliente', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/usuarios.js')));
		
	}
	


	/*
	* metodo para obtener los estados de un país.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_estados($idpais){
		
		$estados=$this->Company->get_estados_id($idpais);
		
		$resultado='<select style="width:300px; height:30px;" name="user[usuarioEstado]">';
		foreach($estados as $estado):
			$resultado.='<option values="'.$estado->id.'">'.$estado->nombre.'</opntion>';
		endforeach;
		$resultado.='<select>';
		echo $resultado;
	
	}
	
	public function get_estados_cliente($idpais){
		
		$estados=$this->Company->get_estados_id($idpais);
		
		$resultado='<select style="width:300px; height:30px;" name="user[usuarioEstado]" class="texto_login">';
		foreach($estados as $estado):
			$resultado.='<option values="'.$estado->id.'">'.$estado->nombre.'</opntion>';
		endforeach;
		$resultado.='<select>';
		echo $resultado;
	
	}
	
	
	/*
	* metodo para guardar un usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_user(){
		
		if($this->session->userdata('id'))
        {
		$post=$this->input->post('user');
		$post['usuarioIdAdmin']=$this->session->userdata('id');
		
		
		$caracteres = "1234567890"; //posibles caracteres a usar
			$numerodeletras=3; //numero de letras para generar el texto
			$cadena1 = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++)
			{
				$cadena1 .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
			}
		
		
		
		$post['usuarioUsername']='cl-'.$cadena1;
		
		
			$reultaod=$this->Company->save_usuario_($post);
		
		}
        else{
            redirect('companies');
        }
		
		
	}
	
	public function get_data_usuario($id){
		$resultado=$this->Company->get_usuarios_id($id);	
		echo json_encode($resultado);
	}
	
	
	
	/*
	* metodo para agregar servicios.
	* autor:jalomo <jalomo@hotmail.es>
	*/
	public function servicios(){
		
		if($this->session->userdata('id'))
        {
		$data['servicios']=$this->Company->get_servicios();
		$data['servicio_alojamiento']=$this->Company->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->Company->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->Company->get_servicios_alojamiento($this->session->userdata('id'));
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/servicios', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/libraries/jquery.multiple.select.js','statics/js/modules/usuarios.js','statics/js/modules/m_servicios.js')));
													   
		}else{
            redirect('companies');
        }
		
	}
	
	/*
	* metodo para guardar los servicios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_servicios(){
		
		if($this->session->userdata('id'))
        {
		$post=$this->input->post('servicio');
		//$post['usuarioIdAdmin']=$this->session->userdata('id');
			$reultaod=$this->Company->save_servicios($post);
		
		}
        else{
            redirect('companies');
        }
		
		
	}
	
	/*
	* metodo para obtemer los evetos para los servicios.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_eventos_servicios(){
		
		$estados=$this->Company->get_alla_eventos();
		
		$resultado='<select style="width:300px; height:30px;" name="" id="ms" multiple="multiple" class="form-control">';
		foreach($estados as $estado):
			$resultado.='<option value="'.$estado->eventoId.'">'.$estado->eventoNombre.'</opntion>';
		endforeach;
		$resultado.='<select>';
		echo $resultado;
	
	}
	
	
	
	/*
	* metodo para la vista de subir banners.
	* autor:jalomo <jalomo@homtmail.es>
	*/
	public function banner(){
		
		
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/banner', '', TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_banner.js')));
		
	}
	
	/*
	* metodo para guardar un banner.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_banner(){
		 if($this->session->userdata('id')){
            if($_FILES['image']['name'] != ''){
                
               // $post['noticiasFecha'] = date('d-m-Y');
                $name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['image']['name']);

                $path_to_save = "statics/banner/";
                move_uploaded_file($_FILES['image']['tmp_name'], $path_to_save.$name);

				$link=$this->input->post('link');
                $post['bannerRuta'] = $path_to_save.$name;
				$post['bannerTitulo'] = $link;

                $id = $this->Company->save_banner($post);
            }
        }
        else{
            redirect('companies');
        }	
	}
	
	
	
	/*
	* metodo para mandar mensajes.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function mensajes(){
		if($this->session->userdata('id')){
		$data['mensajes']=$this->Company->get_all_mensajes();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/mensajes', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_mensajes.js')));
		 }
        else{
            redirect('companies');
        }												   
		
	}
	
	/*
	* metodo para guardar un mensaje.
	* 1.-general. 2.-usuarios-general 3.-usuario-individual. 4.-vendedores-general 5.-vendedores-indivudial 6.-ciudad 7.-evento
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function guarda_mensaje(){
			$tipo=$this->input->post('tipo');
			$texto=$this->input->post('texto');
			$usuarios=$this->Company->get_usuarios_msj();
			$vendedores=$this->Company->get_vendedores_msj();
			
			
			switch ($tipo) {
				case 1://general
						
					 $msj['mensajeContenido']=$texto;
			         $msj['mensajeTipo']=1;//general
			         $id_mensaje=$this->Company->save_mensaje($msj);  
					if($usuarios!=0):  
						foreach($usuarios as $usuario):	
						   $data['msjIdUser']=$usuario->usuarioId;
						   $data['msjTipo']='1';//1.-usuario, 2.-vendedor
						   $data['msjStatus']=0;
						   $data['msjIdMensaje']=$id_mensaje;
						   $this->Company->save_mensaje_usuarios($data);
						 endforeach;
					 endif;  
					 
					 if($vendedores!=0):  
						 foreach($vendedores as $vendedor):	
						   $data['msjIdUser']=$vendedor->adminId;
						   $data['msjTipo']='2';//1.-usuario, 2.-vendedor
						   $data['msjStatus']=0;
						   $data['msjIdMensaje']=$id_mensaje;
						   $this->Company->save_mensaje_usuarios($data);
						 endforeach;  
					 endif;
					 
					break;
				case 2://usuarios
				    
				    $tipo_user=$this->input->post('usuariotipo'); 
				    
					
					if($tipo_user==1):
						$msj['mensajeContenido']=$texto;
				        $msj['mensajeTipo']=2;//usuarios-general
				        $id_mensaje=$this->Company->save_mensaje($msj);   
						if($usuarios!=0):
							foreach($usuarios as $usuario):	
							   $data['msjIdUser']=$usuario->usuarioId;
							   $data['msjTipo']='1';//1.-usuario, 2.-vendedor
							   $data['msjStatus']=0;
							   $data['msjIdMensaje']=$id_mensaje;
							   $this->Company->save_mensaje_usuarios($data);
							 endforeach;
						 endif;
						 
				     elseif($tipo_user==2):
					    $msj['mensajeContenido']=$texto;
				        $msj['mensajeTipo']=3;//usuario-individual
				        $id_mensaje=$this->Company->save_mensaje($msj); 
						
					    $id_usuario=$this->input->post('usuario_id'); 
					    $data['msjIdUser']=$id_usuario;
						$data['msjTipo']='1';//1.-usuario, 2.-vendedor
						$data['msjStatus']=0;
						$data['msjIdMensaje']=$id_mensaje;
						$this->Company->save_mensaje_usuarios($data);
					 endif;		 
					 
					
					break;
				case 3://vendedores
					$tipo_user=$this->input->post('vendedortipo'); 
				     
					
					if($tipo_user==1):
					$msj['mensajeContenido']=$texto;
				    $msj['mensajeTipo']=4;//vendedores-general
				    $id_mensaje=$this->Company->save_mensaje($msj);
						  
						if($vendedores!=0): 
							foreach($vendedores as $vendedor):	
							   $data['msjIdUser']=$vendedor->adminId;
							   $data['msjTipo']='2';//1.-usuario, 2.-vendedor
							   $data['msjStatus']=0;
							   $data['msjIdMensaje']=$id_mensaje;
							   $this->Company->save_mensaje_usuarios($data);
							 endforeach;
						 endif;
						 
				     elseif($tipo_user==2):
					    $msj['mensajeContenido']=$texto;
				        $msj['mensajeTipo']=5;//vendedores-indivudial
				        $id_mensaje=$this->Company->save_mensaje($msj);
						
					    $id_usuario=$this->input->post('vendedor_id'); 
					    $data['msjIdUser']=$id_usuario;
						$data['msjTipo']='2';//1.-usuario, 2.-vendedor
						$data['msjStatus']=0;
						$data['msjIdMensaje']=$id_mensaje;
						$this->Company->save_mensaje_usuarios($data);
					 endif;	
					break;
					
				case 4://ciudad
					$tipo_user=$this->input->post('usuariotipo'); 
				    $msj['mensajeContenido']=$texto;
				    $msj['mensajeTipo']=6;//ciudad
				    $id_mensaje=$this->Company->save_mensaje($msj); 
					$ciudad_id=$this->input->post('ciudad_id'); 
					$usuarios=$this->Company->get_usuario_ciudad($ciudad_id);
					    if($usuarios!=0):
							foreach($usuarios as $usuario):	
							   $data['msjIdUser']=$usuario->usuarioId;
							   $data['msjTipo']='1';//1.-usuario, 2.-vendedor
							   $data['msjStatus']=0;
							   $data['msjIdMensaje']=$id_mensaje;
							   $this->Company->save_mensaje_usuarios($data);
							 endforeach;
						 endif;
					
						
					break;	
				case 5://evento
					$tipo_user=$this->input->post('usuariotipo'); 
				    $msj['mensajeContenido']=$texto;
				    $msj['mensajeTipo']=7;//evento
				    $id_mensaje=$this->Company->save_mensaje($msj); 
					$ciudad_id=$this->input->post('evento_id'); 
					$usuarios=$this->Company->get_usuario_evento($ciudad_id);
					    if($usuarios!=0):
							foreach($usuarios as $usuario):	
							   $data['msjIdUser']=$usuario->euIdUsuario;
							   $data['msjTipo']='1';//1.-usuario, 2.-vendedor
							   $data['msjStatus']=0;
							   $data['msjIdMensaje']=$id_mensaje;
							   $this->Company->save_mensaje_usuarios($data);
							 endforeach;
						 endif;
					break;		
			}
			
			
	}
	
	/*
	* metodo para guardar una casa.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	/*public function save_banner(){
		 if($this->session->userdata('id')){
            if($_FILES['image']['name'] != ''){
                
               // $post['noticiasFecha'] = date('d-m-Y');
                $name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['image']['name']);

                $path_to_save = "statics/banner/";
                move_uploaded_file($_FILES['image']['tmp_name'], $path_to_save.$name);

                $post['bannerRuta'] = $path_to_save.$name;

                $id = $this->Company->save_banner($post);
            }
        }
        else{
            redirect('companies');
        }	
	}*/
	
	
	/*
	* metodo para obtener los usuarios para los mensajes.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_usuarios_msj(){
		$user=$this->Company->get_usuarios_msj();
		$resul='<select id="user_id" style="margin-left:115px; width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="usuario_id">';
		foreach($user as $usuario):
			
			$resul.='<option value="'.$usuario->usuarioId.'">'.$usuario->usuarioNombre.'</option>';
		
		endforeach;
		$resul.="</select>";
		echo $resul;
	}
	
	public function get_vendedor_msj(){
		$user=$this->Company->get_vendedores_msj();
		$resul='<select id="user_id" style="margin-left:112px; width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="vendedor_id">';
		foreach($user as $usuario):
			
			$resul.='<option value="'.$usuario->adminId.'">'.$usuario->adminNombre.'</option>';
		
		endforeach;
		$resul.="</select>";
		echo $resul;
	}
	
	
	
	public function get_ciudad_msj(){
		$user=$this->Company->get_ciudad_msj();
		$resul='<select id="user_id" style="margin-left:112px; width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="ciudad_id">';
		foreach($user as $usuario):
			
			$resul.='<option value="'.$usuario->ciudadId.'">'.$usuario->ciudadNombre.'</option>';
		
		endforeach;
		$resul.="</select>";
		echo $resul;
	}
	
	public function get_evento_msj(){
		$user=$this->Company->get_alla_eventos();
		$resul='<select id="user_id" style="margin-left:112px; width:300px; height:30px;background-color: rgba(0,0,0,0.1);border:1px solid #333333;" name="evento_id">';
		foreach($user as $usuario):
			
			$resul.='<option value="'.$usuario->eventoId.'">'.$usuario->eventoNombre.'</option>';
		
		endforeach;
		$resul.="</select>";
		echo $resul;
	}
	
	
	/*
	* metodo para vender .
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function ventas_usuarios(){
		
		//$data['eventos_comprados']=$this->Company->get_eventos_usuarios($id);
		//$data['eventos']=$this->Company->get_alla_eventos();
		$data['eventos']=$this->Company->getEventos();
		$data["iduser"]=$this->session->userdata('id');
		$aside = $this->load->view('companies/menu_ventas', $data, TRUE);
        $content = $this->load->view('companies/ventas_usuarios', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_mensajes.js')));
		
	}

	
	/*
	* eventos
	*/
	public function get_specific_eventos($id){
		$resultado=$this->Company->get_specific_eventos($id);	
		$res='Nombre:'.$resultado->eventoNombre;
		$res.='<br/>';
		$res.='Fecha:'.$resultado->eventoFecha;
		$res.='<br/>';
		$res.='Precio base:'.$resultado->eventoPrecioBase;
		$res.='<br/>';
		$res.='Lugares disponibles:'.$resultado->eventoLugares;
		$res.='<br/>';
		$res.='Puntos:'.$resultado->eventoPuntos;
		$res.='<br/>';
		
		
		$modificadores=$this->Company->get_modificador_id($id);
		if($modificadores!=0):
		foreach($modificadores as $modificador):
			 
			$res.='<br/><input type="checkbox" >'.$modificador->modificadorNombre.'  precio:$'.$modificador->modificadorPrecio.'  Puntos conexion: <br/>';
		endforeach;
		endif;
		$res.='<br/><a href="#">Asignar a usuario</a>';
		
		
		echo $res;
	}
	
	
	/*
	* metodo para cerrar session
	* autor: jalomo <jalomo@hotmail.es>
	*/
	 public function logout(){
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('companies');
    }
	

	//Inicio de funciones Daniel Alejandro Chávez Vázquez
	public function casas(){
		
		if($this->session->userdata('id')){
			
			$data['ciudades']=$this->Company->getCiudades();
            $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/casas',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_casas.js')));

		}
        else{
            redirect('companies');
        }												   
		
	}

	//daniel

public function saveCasa(){
   $desc = $this->input->post("desc");
   $name = $this->input->post("name");
   $ciudad = $this->input->post("ciudades");
   $pagos = $this->input->post("tPago");
   $fileName = $_FILES["file"]["name"];
   $fileSize = $_FILES['file']['size'];
   $fileType = $_FILES['file']['type'];
   if($fileSize/1024 > '2048') {
      echo 'Filesize is not correct it should equal to 2 MB or less than 2 MB.';
      exit();
    } 

    if($fileType != 'image/png' &&
       $fileType != 'image/gif' &&
       $fileType != 'image/jpg' &&
       $fileType != 'image/jpeg' && $fileType != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document ' &&
 $fileType != 'application/zip' &&
 $fileType != 'application/pdf') {
       echo 'Debes seleccionar una imágen con extensión. Jpeg, Gif, PNG, o jpg ';
   
      exit();
 } //file type checking ends here.
 $upFile = $name.'-'.$_FILES['file']['name'];
 move_uploaded_file($_FILES["file"]["tmp_name"],'statics/img-casas/'.$upFile);



   $res = $this->Company->saveCasa($name,$desc,'statics/img-casas/'.$upFile,$ciudad,$pagos);


   redirect('/companies/casas', 'refresh');

 
   //var_dump($res);
}

//daniel
public function getAddedCasas(){
	$res = $this->Company->getAddedCasas();
	echo(json_encode($res));
}

//daniel
public function getServicios(){
	$servicios=$this->Company->getServicios();
	echo(json_encode($servicios));
}

//daniel
	public function deleteService(){
	     if($_SERVER["REQUEST_METHOD"]=="POST"){
			   $deleted = $_POST["deleted"];
			   $vars = explode("-", $deleted);
			   $res = $this->Company->deleteService($vars);
			   if($res==1){
				  $clientes = $this->Company->getClientesEventos($vars[3],0);
			      $data['clientes']=$clientes;
			      $data['evento'] =$vars[4];
		          $aside = $this->load->view('companies/left_menu', '', TRUE);
		          $content = $this->load->view('companies/eventosclientes',$data, TRUE);
		          $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));

			 //$idUser-$servicioId-$suId-$eventoId-$evento
			}
			else{
				echo("Ocurrio un error al eliminar el servicio, intente de nuevo");
			}

			
		}
	}

//daniel
public function addCuarto(){
	
	
	 if($_FILES['image']['name'] != ''){
                
               // $post['noticiasFecha'] = date('d-m-Y');
                $name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['image']['name']);

                $path_to_save = "statics/casas_cuartos/";
                move_uploaded_file($_FILES['image']['tmp_name'], $path_to_save.$name);
				
                $image = $path_to_save.$name;
      }else{
			$image='';  
	  }
	
	$desc = $this->input->post("desc");
	$precio = $this->input->post("precio");
	$idcasa = $this->input->post("idcasa");
	$servicios = $this->input->post("cServicios");
    $res=$this->Company->addCuarto($desc,$precio,$idcasa,$servicios,$image);
    redirect('/companies/casas', 'refresh');

	//echo($desc."</br>".$precio. "</br>".$idcasa."<br/>");
	//var_dump($servicios);

}

//daniel

public function deleteCuarto($idcasa="0",$idcuarto="0"){
   if($idcasa!="0" && $idcuarto!="0"){
   	  settype($idcuarto, "integer");
   	  $res=$this->Company->deleteCuarto($idcuarto); 
      redirect('/companies/viewCuartos/'.$idcasa, 'refresh');
   }
}

//daniel
public function deleteCasa($idcasa="0"){
	if($idcasa!="0"){
       $res=$this->Company->deleteCasa($idcasa);
       redirect('/companies/casas', 'refresh');
	   
	}

	else{
		redirect('/companies/casas', 'refresh');
	}

}

//danaiel
public function serviciosCuartos(){
	        $data['servicios']=$this->Company->getServicios();
            $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/serviciosCuartos',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_casas_cuartas.js')));

}

//daniel
public function saveServicio(){
	$name = $this->input->post("name");
	$res = $this->Company->saveServicio($name);
	redirect('/companies/serviciosCuartos', 'refresh');


}

//daniel
public function deleteServicio($id="0"){
	settype($id, "integer");
	if($id!=0){
		$res = $this->Company->deleteServicio($id);
	}

    redirect('/companies/serviciosCuartos', 'refresh');
	

}


//daniel

public function getServiciosCuarto(){
	$idcuarto = $this->input->post("idc");
	$res=$this->Company->getServiciosCuarto($idcuarto);
	if(!is_array($res)){
	    $res[0]= array("servicio"=>"-1","nombre"=>"-1","asignado"=>"-1");
	}


	echo (json_encode($res));

    
}

//daniel

public function updateServCuarto(){
	$result;
	$jsonserv = json_decode($this->input->post("jsonserv"),true);
    $res=$this->Company->updateServCuarto($jsonserv); 
    $result[0] = array("res"=>$res);
	echo(json_encode($result));
}

//daniel
public function viewCuartos($idCasa="0"){
	        $data["cuartos"] = $this->Company->viewCuartos($idCasa);
	        if(is_array($data["cuartos"])){
              $aside = $this->load->view('companies/left_menu', '', TRUE);
		       $content = $this->load->view('companies/viewCuartos',$data, TRUE);
		       $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));
             }

             else{
             	redirect('/companies/casas', 'refresh');
             }



}

 //daniel alejandro
	public function createCodigo(){
		
		$aside = $this->load->view('companies/left_menu', '', TRUE);
		$content = $this->load->view('companies/createcodigo','', TRUE);
		$this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_codigo.js')));

	}

	public function saveNewCodigo(){
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$codigo = $_POST["codigo"];
			if($codigo!=""){
			   $res=$this->Company->saveNewCodigo($codigo);
			   if($res==1)
			   	   redirect("companies/codigoSaved");
			   	else
			   		$this->codigoFailed();

			   
			 }
			
		}
	}

	public function codigoSaved(){
		   $data["mensaje"]="El codigo ha sido actualizado";
           $aside = $this->load->view('companies/left_menu', '', TRUE);
		   $content = $this->load->view('companies/succes',$data, TRUE);
		   $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));

	}

	public function savedFailed(){
		echo("Se produjo un error al momento de guardar el código, intente nuevamente.");

	}


    //daniel
	public function clientes(){
		$data['eventos']=$this->Company->get_alla_eventos();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
		$content = $this->load->view('companies/clientes',$data, TRUE);
		$this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_clientes_eventos.js')));
	}

	//daniel
	public function clientes_transportes(){
		if($this->session->userdata('id')){
			$data['clientes']=$this->Company->get_clientes_transportes();
			$aside = $this->load->view('companies/left_menu', '', TRUE);
				$content = $this->load->view('companies/clientes_transportes',$data, TRUE);
				$this->load->view('main/template', array('aside'=>$aside,
														   'content'=>$content,
														   'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_clientes_trasportes.js')));
		}else{
			redirect("companies");
		}

	}
    
	
	public function clientes_cuartos(){
		
		if($this->session->userdata('id')){
		    $data['clientes']=$this->Company->get_clientes_cuartos();
		    $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/clientes_cuartos',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_clientes_cuartos.js')));

		}else{
			redirect("companies");
		}
	}
	
	
	public function changeStatusCuarto(){
 $values = $this->input->post("values");
 $sta = $this->input->post("sta");
 $res=$this->Company->changeStatusCuarto($values,$sta); 
 $result[0]= array("res"=>$res);
 echo(json_encode($result));
}
	
    //daniel
	public function getClientesEvent($id="0"){
		if($id!="0"){
			$clientes = $this->Company->getClientesEventos($id,0);
			$data['clientes']=$clientes;
		    $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/eventosclientes',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_clientes_eventos.js')));

		}
	}

    //daniel
	public function changeStatus(){
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			$status = $_POST["status"];
			if($status!=""){
			  $s = substr($status, 0,1);
			  $c = substr($status, 1,strlen($status));
              $res = $this->Company->changeStatus($c,$s);
              if($res==1){
            	 $data["mensaje"]="El status del cliente ha sido actualizado";
                 $aside = $this->load->view('companies/left_menu', '', TRUE);
		         $content = $this->load->view('companies/succes',$data, TRUE);
		         $this->load->view('main/template', array('aside'=>$aside,'content'=>$content, 'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));
               }
              
		     }
		}
		
		
	}

    //daniel
	public function boletos(){
		$data['eventos']=$this->Company->get_alla_eventos();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
		$content = $this->load->view('companies/boletos',$data, TRUE);
		$this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));
	}
    //daniel
		public function getClientesBoletos($id="0"){
		if($id!="0"){
			$clientes = $this->Company->getClientesEventos($id,1);
			$data['clientes']=$clientes;
			$data['evento'] =$_GET["evento"];
		    $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/boletosClientes',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));

		}
	}

	    //daniel
	public function getMod(){
       if($_SERVER["REQUEST_METHOD"]=="POST"){
             $par;
			 $modExistentes = $this->Company->getMod($this->input->post("sex"),$this->input->post("eve"));
			 $modUsuario = $this->Company->getModUser($this->input->post("eve"),$this->input->post("idu"),$this->input->post("idr"));
			 $par[0] = array("mod"=>$modExistentes);
			 $par[1] = array("mod"=>$modUsuario);
             echo (json_encode($par));
		
	
		}
	}

	public function saveAddedMod(){
      
         if($_SERVER["REQUEST_METHOD"]=="POST"){

			 $res = $this->Company->saveAddedMod($this->input->post("mod"),$this->input->post("pago"));
			 
             echo (json_encode($res));
		
	
		}

	}

	public function saveNewMod(){
		 if($_SERVER["REQUEST_METHOD"]=="POST"){
		 	//$servicios= $_POST['servicio'];
		 	if(isset($_POST["modificador"])){
		 		$evento = explode("-",$_POST["evento"]);
		 		
		 		$res = $this->Company->saveNewMod($_POST['modificador']);
		 		if($res==1){
                   redirect('/companies/getClientesEvent/'.$evento[1], 'refresh');
		 		}
		 		else{
		 			echo("Ocurrió un erro al guardar uno o más modificadores o no seleccionó ninguno valido. Intente de nuevo.");
		 		}
		 		

		 	}
		 	else{
		 		echo("No se ha recibido ningun valor");
		 	}
		
     

   }
}

public function deleteMod(){
		if($_SERVER["REQUEST_METHOD"]=="POST"){
			 //$delete = $this->Company->deleteMod($this->input->post("modId"),$this->input->post("usr"),$this->input->post("eve"),$this->input->post("reg"));
			 $modid = $this->input->post("modId");
			 $usr = $this->input->post("usr");
			 $eve =  $this->input->post("eve");
			 $reg = $this->input->post("reg");
			 $idmodusr = $this->input->post("idmodusr");
             $delete = $this->Company->deleteMod($modid,$usr,$eve,$reg,$idmodusr);


             $res[0] = array("res"=>$delete);
             echo (json_encode($res));

	
		}

	}

	//daniel
function changeStatusTrans(){
	$stat = $this->input->post("stat");
	$iduser = $this->input->post("iduser");
	$idtrans = $this->input->post("idtrans");
	$res = $this->Company->changeStatusTrans($stat,$iduser,$idtrans);
	$result[0] = array("res"=>$res);
	echo(json_encode($result));
}

//daniel
public function boleto($codigo=""){
  
  if($codigo!=""){
  	
    $data["codigo"]=$codigo; 
    $html = $this->load->view('boleto_pdf', $data, true); // render the view into HTML
    $this->load->library('pdf');
    $pdf = $this->pdf->load();
    $pdf->WriteHTML($html); // write the HTML into the PDF
    $pdf->Output();
     // save to file because we can
   }
 }

  //daniel
public function crearBoletos($result="0"){
	  
	        $data['eventos']=$this->Company->get_alla_eventos();
            $data["alert"] = $result;
            $aside = $this->load->view('companies/left_menu', '', TRUE);
		    $content = $this->load->view('companies/makeboleto',$data, TRUE);
		    $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_crear_boletos.js')));

}

//daniel
public function saveBoletos(){
	$evento =$_POST['evento'];
	$cantidad = $_POST['cantidad'];
	$texto = $_POST["text-boleto"];
	$fileName = $_FILES["file"]["name"];
	$fileSize = $_FILES['file']['size'];
	$fileType = $_FILES['file']['type'];
    if($fileSize/1024 > '2048') {
      echo 'Filesize is not correct it should equal to 2 MB or less than 2 MB.';
      exit();
    } 

    if($fileType != 'image/png' &&
       $fileType != 'image/gif' &&
       $fileType != 'image/jpg' &&
       $fileType != 'image/jpeg' && $fileType != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document ' &&
 $fileType != 'application/zip' &&
 $fileType != 'application/pdf') {
       echo 'Debes seleccionar una imágen con extensión. Jpeg, Gif, PNG, o jpg ';
   
      exit();
 } //file type checking ends here.
 $upFile = $evento.'-'.$_FILES['file']['name'];
 move_uploaded_file($_FILES["file"]["tmp_name"],'statics/img-boletos/'.$upFile);

 $datos = explode("-",$evento);

 $res = $this->Company->saveBoletos($datos[0],$cantidad,'statics/img-boletos/'.$upFile,$texto);

	//echo($evento."</br>".$cantidad."</br>".$texto."</br>".$fileSize);
   redirect('/companies/crearBoletos/1', 'refresh');
}

public function imprimirBoletos(){
   if($this->session->userdata('id'))
    {
	/*$eventosBoletos = $this->Company->getEventosBoletoss();
	$data['eventosBoletos']=$eventosBoletos;
	$data['userId'] = $this->session->userdata('id');
	$aside = $this->load->view('companies/left_menu', '', TRUE);
	$content = $this->load->view('companies/eventosboletos',$data, TRUE);
	$this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/myscript.js','statics/js/libraries/jquery.modal.min.js','statics/js/libraries/form.js','statics/js/modules/eventos.js','statics/js/modules/m_eventos.js')));*/


   
      
        $data["iduser"] = $this->session->userdata('id');
		$data["ciudades"] = $this->Company->getCiudades();
		$data["boletosD"] = $this->Company->getBoletosDisponibles();
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/cliente', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/usuarios.js','statics/js/modules/myscript.js','statics/js/modules/m_imprimir_boletos.js')));
		

   

}
   else{
   	 redirect('companies');
   }
}

//daniel
public function restBoletos(){
	$result="";
    $cantidad = $this->input->post("cantidad");
    $idEvento = $this->input->post("idevento");
    $res = $this->Company->restBoletos($idEvento,$cantidad);
    $result[0] = array("impresos"=>$res);
    echo(json_encode($result));

}

//daniel generales
function printBoletos($cantidad="",$ide="",$vendedor="",$cliente="",$sexo="",$costo=""){
	if($cantidad!="" && $ide!="" && $vendedor!="" && $cliente!="" && $sexo!="" && $costo!=""){
      
        settype($cantidad, "integer");
        settype($ide, "integer");
        settype($vendedor, "integer");
        settype($cliente, "integer");

         $this->load->library('pdf');
         $pdf = $this->pdf->load();
         $data["dataBoleto"] =$this->Company->getDataBoleto($ide);
         $data["nameUser"]= "Publico en general";
         $data["costo"] = $costo;
         $data["dataEvento"] =$this->Company->getDataEvento($ide);
       
  	 for($a=0;$a<$cantidad;$a++){
         $data["codigo"]=$this->Company->createNewCodigo(); 
         $res = $this->Company->saveBoletosImpresos($ide,$vendedor,$cliente,$data["codigo"],$flag,$ideu, $sexo,$costo);

         $html = $this->load->view('boleto_pdf', $data, true);
         $pdf->WriteHTML($html); // write the HTML into the PDF
         $pdf->AddPage();
    } // save to file because we can
    $pdf->Output();
  

	}

}

function printBoletosVendedor($cantidad,$ide,$idv,$idc,$idci,$sexo){
	if($cantidad!="" && $ide!="" && $sexo!="" ){
        $flag;
        $ideu;
        $data;
        settype($cantidad, "integer");
        settype($ide, "integer");
        settype($idv, "integer");
        settype($idci, "integer");
        settype($idc, "integer");
         
         $ideu="";
         $this->load->library('pdf');
         $pdf = $this->pdf->load();
         $data["dataBoleto"] =$this->Company->getDataBoleto($ide);
         $data["nameUser"]= "Publico en general";
         $data["dataEvento"] =$this->Company->getDataEventoPublico($ide,$sexo,$idci);
  

  	 for($a=0;$a<$cantidad;$a++){
  	 	 $flag="0";
         $data["codigo"]=$this->Company->createNewCodigo(); 
         $res = $this->Company->saveBoletosImpresos($ide,$idv,$idc,$data["codigo"],$flag,$ideu);
           
         $html = $this->load->view('boleto_pdf', $data, true);
         $pdf->WriteHTML($html); // write the HTML into the PDF
         $pdf->AddPage();
    } // save to file because we can
    $pdf->Output();
  

	}

}

function rePrintBoleto($idFila="",$idEvento="",$codigo="",$idu=""){
	if($idFila!="" && $idEvento!="" && $codigo!=""){
        settype($idFila, "integer");
        settype($idEvento, "integer");
       // settype($codigo, "integer");
        settype($idu, "integer");
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $data["dataBoleto"] =$this->Company->getDataBoleto($idEvento);
        $data["codigo"] = $codigo;
        $data["nameUser"]= $this->Company->getNameUser($idu);
        $data["dataEvento"] =$this->Company->getDataEvento($idEvento,$idu);
        $html = $this->load->view('boleto_pdf', $data, true);
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output();


	}



}

	public function ventas_boletos(){
		
		//$data['paises']=$this->Company->get_paises();
		//$data['estados']=$this->Company->get_estados();
		//$data['usuarios']=$this->Company->get_usuarios($this->session->userdata('id'));
		$data["iduser"] = $this->session->userdata('id');
		$data["ciudades"] = $this->Company->getCiudades();
		$data["boletosD"] = $this->Company->getBoletosDisponibles();
		$aside = $this->load->view('companies/menu_ventas',$data,'', TRUE);
        $content = $this->load->view('companies/cliente', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/usuarios.js','statics/js/modules/myscript.js')));
		
	}


   public function getBoletosVendedor(){
	$result;
	$ide= $this->input->post("ide");
	$idv= $this->input->post("idv");
	$fecha= $this->input->post("fecha");
	$res=$this->Company->getBoletosVendedor($idv,$ide,$fecha);
	//$result[0] = array("res"=>$res);
	echo json_encode($res);

}    

public function getBoletosAndCiudades(){
 $result;
 $val= $this->input->post("val");
 
 $aux= explode("-", $val);
    $res=$this->Company->getBoletosAndCiudades($aux[0],$aux[1]); 
    //$result[0] = array("res"=>$res);
    echo (json_encode($res));

} 

public function printPublicBoleto(){
	$data;
	$index=0;
	$ide;
	$sexo="";
	$precioeve;
	$chk;
	$slc;
	$modificadores;
	$strevento = $this->input->post('evento');
	$fecha = $this->input->post('fecha');
	$strciudad = $this->input->post('ciudad');
	$cantidad = $this->input->post('cantidad');


     
     if(isset($_POST["chk"])){
     	$chk = $this->input->post('chk');
     }

     else{
        $chk="-1";
     }

     if(isset($_POST["slc"])){
     	$slc = $this->input->post('slc');
     }

     else{
        $slc="-1";
     }

    

	$sex = $this->input->post('sex');
	$subtotal = $this->input->post('total');
	$hoy = date("Y-m-d");

	settype($cantidad, "integer");
	$arrayevento = explode("-", $strevento);
	$arrayciudad = explode("-",$strciudad);
	if($sex=="1"){
		$sexo="Hombre";
		$precioeve = $arrayciudad[1];
	}
	else{
		$sexo="Mujer";
		$precioeve = $arrayciudad[2];
    }
	$ide = $arrayevento[1];
    
	$dataevento[0] = array("eventoNombre"=>$arrayevento[2],"eventoFecha"=>$fecha,"euPrecio"=>$precioeve);



   if($slc!="-1"){
	for ($i=0; $i <count($slc) ; $i++) { 
		if($slc[$i]!="0"){
			 $strmod =  $slc[$i];
             $arraymod = explode("-", $strmod);
             $precio=0;
             if($sex=="1"){
		           
		            $precio = $arraymod[2];
	          }
	          else{
		
		            $precio = $arraymod[3];
             }
            
             $modificadores[$index] = array("id"=>$arraymod[0],"nombre"=>$arraymod[1],"precio"=>$precio);    
		     $index++;
		}    
		
	}

   }	

    

	if(is_array($chk)){
		
		for ($i=0; $i <count($chk) ; $i++) { 
		if($chk[$i]!="0"){
			 $strmod =  $chk[$i];
             $arraymod = explode("-", $strmod);
             $precio=0;
             if($sex=="1"){
		           
		            $precio = $arraymod[2];
	          }
	          else{
		
		            $precio = $arraymod[3];
             }
            
             $modificadores[$index] = array("id"=>$arraymod[0],"nombre"=>$arraymod[1],"precio"=>$precio);    
		     $index++;
		}    
		
	   }

	}


	
	$data["dataBoleto"] =$this->Company->getDataBoleto($ide);
	$data["nameUser"]= "Publico en general (".$sexo.")";
	$data["dataEvento"] = $dataevento;
	$data["modificadores"] = $modificadores;
    $this->load->library('pdf');
    $pdf = $this->pdf->load();

	for ($i=0; $i < $cantidad; $i++) { 
      
	  $data["codigo"]=$this->Company->createNewCodigo();
	  $res = $this->Company->saveBoletoPublico($ide, $arrayevento[2],$fecha,$precioeve,$this->session->userdata('id'),$data["codigo"],$subtotal,$sexo,$arrayciudad[0],$hoy,$modificadores);
	  if($res=="0"){
        

	  	$pdf->WriteHTML("De los ".$cantidad." boletos solo fue posible generar ".$i." debido a que se agoto la cantidad generada para el evento ".$arrayevento[2].". </br> Pongase en contacto con el administrador para generar los boletos que hagan falta.");
	  	break;
	  }

	  else{
	  	     $html = $this->load->view('boletoAdmin', $data, true);
           $pdf->WriteHTML($html); // write the HTML into the PDF
	  }
 
      
		





	}

	$pdf->Output();

//echo($strevento."</br>".$strciudad);
	
    /*

      $data["dataBoleto"] =$this->Company->getDataBoleto($ide);
      $data["dataEvento"] =$this->Company->getDataEventoAdmin($ide,$idu);
      $data["codigo"] = $codigo;
      $data["modificadores"] = $this->Company->getModificadoresBoleto($idu,$ide,$idr);
      $data["nameUser"]= $this->Company->getNameUser($idu);
    */



}

public function reprintBoletoVendedor($id="",$ide="",$sexo="",$codigo=""){


    $data["dataBoleto"] =$this->Company->getDataBoleto($ide);
	$data["nameUser"]= "Publico en general (".$sexo.")";
	$data["dataEvento"] =$this->Company->getDataBoletoVendedor($id);
	$data["codigo"]= $codigo;
	$data["modificadores"] = $this->Company->getModificadoresBoletoVendedor($id);
	$this->load->library('pdf');
    $pdf = $this->pdf->load();
    $html = $this->load->view('boletoAdmin', $data, true);
    $pdf->WriteHTML($html);
    $pdf->Output();


}


public function reportes() {
        $data["iduser"] = $this->session->userdata('id');
		
		$data['eventos']=$this->Company->get_alla_eventos();
		$aside = $this->load->view('companies/left_menu',$data,'', TRUE);
        $content = $this->load->view('companies/reportes', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		

}

public function changeStatusCliente(){
	$values = $this->input->post("values");
	$sta = $this->input->post("sta");
	$res=$this->Company->changeStatusCliente($values,$sta); 
	$result[0]= array("res"=>$res);
	echo(json_encode($result));

}

public function generateBoletoCliente(){
	$result;
	$idr = $this->input->post("idr");
	$idu = $this->input->post("idu");
	$ide = $this->input->post("ide");
	//$res=$this->Company->checkBoletosEvento($ide);
	$res =$this->Company->checkExistBoleto($idr,$idu,$ide);
	if($res!="-1"){

       $result[0] = array("boletos" =>$res,"existe"=>"1");
       echo(json_encode($result));

	}

	else{
		$res = $this->Company->checkBoletosEvento($ide);
		if(is_array($res)){
           foreach ($res as $row => $field) {
			  if($field["impresos"] >= $field["numeroBoletos"]){
               $result[0] = array("boletos"=>"insuficientes","existe"=>"0");
               echo(json_encode($result));
			  }
			  else{
			  	 $result[0] = array("boletos"=>"suficientes","existe"=>"0");
                 echo(json_encode($result));
			  }

            
		  }

		}

		else{
          $result[0] = array("boletos"=>"inexistentes","existe"=>"0");
		   echo(json_encode($result));
		}
		
	}


}

public function getComprobantes(){

	    if($_SERVER["REQUEST_METHOD"]=="POST"){
             $comprobantes = $this->Company->getComprobantes($this->input->post("ide"),$this->input->post("idu"),$this->input->post("idr"));

             echo(json_encode($comprobantes));
		
	
		}

}

public function getModExtras(){

	    if($_SERVER["REQUEST_METHOD"]=="POST"){
             $extras = $this->Company->getModExtras($this->input->post("ticket"));
            
             echo(json_encode($extras));
		
	
		}
}

public function changueStatusEvento2(){
	  if($_SERVER["REQUEST_METHOD"]=="POST"){
             $res = $this->Company->changueStatusEvento2($this->input->post("option"),$this->input->post("text"));
            
             echo(json_encode($res));
		
	
		}
}

 public function changeStatusExtras(){
  	 	  if($_SERVER["REQUEST_METHOD"]=="POST"){
             $res = $this->Company->changeStatusExtras($this->input->post("option"),$this->input->post("text"));
             echo(json_encode($res));

		}
  }

public function reporteEventos(){
/*	$res=$this->Company->reporteEventos();
	//var_dump($res);
	//var_dump($res);
  ini_set('memory_limit', '300M');
  set_time_limit(240); 
 
   
    //START THE EXCEL CLASS
        $this->load->library('Classes/PHPExcel');
        $phpexcel = new PHPExcel();
        $phpexcel->getActiveSheet()->setTitle('Reporte eventos');
        $phpexcel->setActiveSheetIndex(0);
  
   $objDrawing = new PHPExcel_Worksheet_Drawing();
   $objDrawing->setName('My Image');
   $objDrawing->setDescription('impulsos');
   $objDrawing->setPath('statics/img/logo2.png');
   $objDrawing->setCoordinates('A1');
   $objDrawing->setWorksheet($phpexcel->getActiveSheet());

        $sheet = $phpexcel->getActiveSheet();
        $sheet->getDefaultStyle()->getFont()->setSize(10);
        //$sheet->getColumnDimension('A2:BI2')->setWidth(40);
       // $sheet->getRowDimension(2)->setRowHeight(35);
        
        //$sheet->mergeCells("D1:G1");
  $aux=5; 
  
  $sheet->setCellValue("B4" ,'RUBROS');
  $sheet->getColumnDimension('B')->setWidth(40);
  $sheet->getStyle('B4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('B4')->getFill()->getStartColor()->setRGB('d2ecf9');
  
  
   $periodos=$this->Company->get_periodos($id_proyecto);
   if($periodos !=0):
   
   
   $Contador=4; 
         $Letra='C'; 
   foreach($res as $evento =>$campo):
   
   $sheet->getColumnDimension($Letra)->setWidth(25);
   $sheet->setCellValue($Letra. $Contador, $campo["eventoNombre"].' a '.$periodo->periodoFechaFinal);
   
   $sheet->getStyle($Letra. $Contador)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
         $sheet->getStyle($Letra. $Contador)->getFill()->getStartColor()->setRGB('d2ecf9');
   
   $Letra++; 
   
   
   endforeach;
    $sheet->setCellValue($Letra. $Contador, 'Total');
   endif;
  
  
  
  
  foreach($proyectos as $proyecto):
  
  $aux1=$aux;
  
  $sheet->setCellValue("B".$aux1, $this->Company->get_rubros_name($proyecto->prIdRubro));
  $sheet->getStyle("B".$aux1)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle("B".$aux1)->getFill()->getStartColor()->setRGB('cccccc');
  
  
  
  
   if($periodos !=0):
   
   
   $Contador=$aux1; 
   
   $con1=$Contador+1;
   $con2=$con1+1;
   
         $Letra='C'; 
   
   $p_estimado= $this->Company->get_rubro($proyecto->prIdRubro);
   $p_real= $this->Company->get_facturas_rubro($proyecto->prIdRubro);  
   $total_total=$p_estimado-$p_real;
   foreach($periodos as $periodo):
   
   $estimado= trim($this->Company->get_cantidades($proyecto->prIdRubro,$periodo->periodoId));
   $real= trim($this->Company->get_cantidades_facturas($proyecto->prIdRubro,$periodo->periodoId));
   $total_=$estimado-$real;
  
   $sheet->setCellValue($Letra. $Contador, 'Real:$'.number_format($this->Company->get_cantidades_facturas($proyecto->prIdRubro,$periodo->periodoId),2));
   $sheet->setCellValue($Letra. $con1, 'Estimado:$'.number_format($this->Company->get_cantidades($proyecto->prIdRubro,$periodo->periodoId),2));
   
   $sheet->setCellValue($Letra. $con2, 'Total:$'.number_format($total_,2));
   
    $sheet->getStyle($Letra. $con2)->applyFromArray(array("font"=>array("color"=>array("rgb"=>"000000"),"bold" => true)));
    //$sheet->getStyle('C'.$aux5)->applyFromArray(array("font" => array("bold" => true)));
   
   //$sheet->getStyle('F3')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_DASHDOT);
   
   
   
   $Letra++; 
   
   $aux++;
   
   $sheet->setCellValue($Letra. $con2, 'Total:'."$".number_format($total_total,2));
   $sheet->getStyle($Letra. $con2)->getNumberFormat()->applyFromArray( array( 'code' => PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1 ) );
   $sheet->getColumnDimension($Letra)->setWidth(25);
   endforeach;
   
    $sheet->getStyle('C'.$Contador.':'.$Letra.$con2)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
   
   endif;
  
  
  
  
   
   
   $aux++;
        endforeach;
        endif;
       
        $name_report = 'reporte'.date('Ymd');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$name_report.xls\"");
        header("Cache-Control: max-age=0");
        
        $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, "Excel5");
        $objWriter->save("php://output");
        exit;*/

}

public function reporteVendedores(){
	$res=$this->Company->reporteVendedores();
	var_dump($res);
}

public function reporteVentasVendedor(){
	$res=$this->reporteVentasVendedor();
}

public function getCiudadesEvento(){
	$ide = $this->input->post("ide");
	$res = $this->Company->getCiudadesEvento($ide);
	//$nada = array("na"=>"ww");
	echo(json_encode($res));
}

/*
* idu= id usuario
* idr= fila de la tabla eventosusuarios
* ide= id del evento
* codigo= codigo de barras del boleto
*/
public function printBoletoUser($idu="",$idr="",$ide="",$codigo=""){
	/*if($ide!="" && $codigo!=""){
      $data["dataBoleto"] =$this->clientes->getDataBoleto($ide);
      $data["dataEvento"] =$this->clientes->getDataEvento($ide,$this->session->userdata('id'));
      $data["codigo"] = $codigo;
      $data["nameUser"]= $this->clientes->getNameUser($this->session->userdata('id'));
      $this->load->library('pdf');
      $pdf = $this->pdf->load();
      $html = $this->load->view('boleto_pdf', $data, true);
      $pdf->WriteHTML($html); // write the HTML into the PDF
      $pdf->Output();

	}*/

	 if($idr!="" && $ide!="" && $codigo!=""){
      $data["dataBoleto"] =$this->Company->getDataBoleto($ide);
      $data["dataEvento"] =$this->Company->getDataEventoAdmin($ide,$idu);
      $data["codigo"] = $codigo;
      $data["modificadores"] = $this->Company->getModificadoresBoleto($idu,$ide,$idr);
      $data["nameUser"]= $this->Company->getNameUser($idu);
      $this->load->library('pdf');
      $pdf = $this->pdf->load();
      $html = $this->load->view('boletoAdmin', $data, true);
      $pdf->WriteHTML($html); // write the HTML into the PDF
      $pdf->Output();
   

   
    

     

	}

        
	

}




  //Fin de funciones Daniel Alejandro Chávez Vázquez
	
	/*
	* metodo para eliminar una casa.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function delete_casa($id){
	if($this->session->userdata('id')){
		$this->Company->delete_casa($id);
	}
        else{
            redirect('companies');
        }		
		
	}
	
	public function save_casas(){
		 if($this->session->userdata('id')){
            
				
				
				 if($_FILES['image']['name'] != ''){
                
               // $post['noticiasFecha'] = date('d-m-Y');
                $name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['image']['name']);

                $path_to_save = "statics/casa/";
                move_uploaded_file($_FILES['image']['tmp_name'], $path_to_save.$name);
				$post=$this->input->post('casa');
                $post['casaImage'] = $path_to_save.$name;
				
                $id = $this->Company->save_casas($post);
                
            }
            
        }
        else{
            redirect('companies');
        }	
	}
	
	
	
	/*
	+ modificadores nuevo
	*/
	public function modificadores_nuevo($id_evento){
		
		
		$data['modificadores']=$this->Company->get_modificador_id($id_evento);
		$data['categorias']=$this->Company->get_categorias($id_evento);
		$data['id_evento']=$id_evento;
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/modificadores_nuevo', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js')));
			
	}
	
	/*
	* guarda nuevo modificador.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_mod(){
	
		 $tipo = $this->input->post('modificadorTipo');
		 $modificadorIdCategoria = $this->input->post('modificadorIdCategoria');
		 
		 $mod = $this->input->post('mod');
		  $top=sizeof($mod['Nombre']);
		  
		  $id_evento = $this->input->post('id_evento_id');
		  if($tipo==2){
		  	  $nombre='';
			  $precioH='';
			  $precioM='';
			  for($i=0;$i<$top;$i++):
			  
				
				$nombre.=$mod['Nombre'][$i].'--';
				$precioH.=$mod['PrecioH'][$i].'--';
				$precioM.=$mod['PrecioM'][$i].'--';
			   
				/*if($data['Nombre']=='' && $data['Precio']=='' ){
					
				}else{
					//print_r($data);	
					
					
					//$this->Company->save_productos($data);
					
				}*/
			   endfor;
			   
			   echo $nombre;
			   
			   $data['modificadorNombre']=$nombre;
			   $data['modificadorPrecio']=$precioH;
			   $data['modificadorPrecioM']=$precioM;
			   $data['modificadorStatus']=1;
			   $data['modificadorActivo']=1;
			   $data['modificadorAutomatico']=1;
			   $data['modificadorIdEvento']=$id_evento;
			   $data['modificadorPuntos']=0;
			   $data['modificadorTipo']=2;
			   $data['modificadorIdCategoria']=$modificadorIdCategoria;
			   
			   
			   $reultaod=$this->Company->save_modificadores($data);
			   
			   
			  
			 /* $options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );

			$shirts_on_sale = array('small', 'large');

			echo form_dropdown('shirts', $options, 'large');*/
			
			/*$tamano=sizeof(explode("--",$nombre));
			$nam=explode("--",$nombre);
			$preH=explode("--",$precioH);
			$preM=explode("--",$precioM);
			
				for($i=0;$i<$tamano;$i++):
				
					$sele[$preH[$i]]=$nam[$i].'/'.$preH[$i];
				
				endfor;
			   echo form_dropdown('tipos', $sele, '');
			   */
		  }else{
			  
			  $nombre='';
			  $precioH='';
			  $precioM='';
			  for($i=0;$i<$top;$i++):
			  
				
				$nombre.=$mod['Nombre'][$i];
				$precioH.=$mod['PrecioH'][$i];
				$precioM.=$mod['PrecioM'][$i];
			   
				/*if($data['Nombre']=='' && $data['Precio']=='' ){
					
				}else{
					//print_r($data);	
					
					
					//$this->Company->save_productos($data);
					
				}*/
			   endfor;
			   
			   echo $nombre;
			   
			   $data['modificadorNombre']=$nombre;
			   $data['modificadorPrecio']=$precioH;
			   $data['modificadorPrecioM']=$precioM;
			   $data['modificadorStatus']=1;
			   $data['modificadorActivo']=1;
			   $data['modificadorAutomatico']=1;
			   $data['modificadorIdEvento']=$id_evento;
			   $data['modificadorPuntos']=0;
			   $data['modificadorTipo']=1;
			   $data['modificadorIdCategoria']=$modificadorIdCategoria;
			   
			   
			   $reultaod=$this->Company->save_modificadores($data);
			  
		  }
		
	}
	
	
	
	/*
	* metodo para agregar una ciudad.
	+ autor: jalomo <jalomo@hotmail.es>
	*/
	public function ciudades(){
		if($this->session->userdata('id')){
			
		$data['ciudades']=$this->Company->get_ciudad_eve();	
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/ciudades', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/m_ciudades.js')));
		}
        else{
            redirect('companies');
        }											   
			
	}
	
	/*
	* metodo para guardar una ciudad.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_ciudades(){
		 if($this->session->userdata('id')){
            $post = $this->input->post('ciudad');
                $id = $this->Company->save_ciudades($post);
            
        }
        else{
            redirect('companies');
        }	
	}
	
	
	/*
	* metodo para eliminar una ciudad.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function delete_ciudad($id_ciudad){
		if($this->session->userdata('id')){
            
                $id = $this->Company->delete_ciudad($id_ciudad);
            
        }
        else{
            redirect('companies');
        }	
	}
	
	/*
	* watable eventos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function tabla_eventos(){
	
		$json  = array();
		$json['rows'] = $this->Company->get_eventos_table();
		
		$json['cols']['eventoNombre'] = array('index'=>1, 'type'=>'string', 'friendly'=> 'Nombre');
		$json['cols']['eventoFecha'] = array('index'=>2, 'type'=>'string', 'friendly'=> 'Fecha');
		$json['cols']['eventoLugares'] = array('index'=>3, 'type'=>'string', 'friendly'=> 'Lugares');
		$json['cols']['eventoPuntos'] = array('index'=>4, 'type'=>'string', 'friendly'=> 'Puntos');
		
		$json['cols']['eventoId'] = array('index'=>5, 'type'=>'string', 'friendly'=> 'Opciones','friendly'=> '<i class="icon-user"></i>',"format"=> "<a href='/sistema/index.php/companies/menu_evento/{0}' class='eventoId' target='_blank'>entrar</a>");
	
		$this->load->view('companies/html',array('html'=>json_encode($json)));
	}
	
	
	/*
	* metodo para ver un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function ver_evento($id_evento){
		if($this->session->userdata('id')){
			
		$data['evento']=$this->Company->get_evento_id($id_evento);	
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/evento_single', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
            redirect('companies');
        }											   
			
	}
	
	
	/*
	* metodp para guadar el evento editado.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_evento_editar($id_evento){
		
		if($this->session->userdata('id'))
        {
		$post=$this->input->post('evento');
		
		$mod = $this->input->post('mod');
		$top=sizeof($mod['ciudad']);
			
			 $ciudad='';
			  $precioH='';
			  $precioM='';
			  for($i=0;$i<$top;$i++):
			  
				
				$ciudad.=$mod['ciudad'][$i].'--';
				$precioH.=$mod['PrecioH'][$i].'--';
				$precioM.=$mod['PrecioM'][$i].'--';
			   
			   endfor;
			  // echo $ciudad;
			$post['eventoCiudad']=$ciudad;
			$post['eventoPrecioBase']=$precioH;
			$post['eventoPrecioBaseM']=$precioM;
			
			
			
			if($_FILES['image']['name'] != ''){
                
              
                $name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['image']['name']);

                $path_to_save = "statics/img_eventos/";
                move_uploaded_file($_FILES['image']['tmp_name'], $path_to_save.$name);

                $post['eventoUrlImage'] = $path_to_save.$name;

                
            }else{
				//$post['eventoUrlImage'] ="";
			
			}
			
			$postC=$this->input->post('eventoC');
			if(isset($postC['eventoPagoPaypal'])){
				$post['eventoPagoPaypal']=1;
			}else{
				$post['eventoPagoPaypal']=0;		
			}
			if(isset($postC['eventoPagoDeposito'])){
				$post['eventoPagoDeposito']=1;
			}else{
				$post['eventoPagoDeposito']=0;		
			}
			if(isset($postC['eventoPagoOxxo'])){
				$post['eventoPagoOxxo']=1;
			}else{
				$post['eventoPagoOxxo']=0;		
			}
			if(isset($postC['eventoPagoContado'])){
				$post['eventoPagoContado']=1;
			}else{
				$post['eventoPagoContado']=0;		
			}
			
			
			//print_r($post);
			$reultaod=$this->Company->edita_evento($post,$id_evento);
		
		}
        else{
            redirect('companies');
        }
		
		
	}
	
	
	/*
	* metodo para eliminar un evento .
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function eliminar_evento_id($id){
		
		$this->Company->eliminar_evento($id);
		redirect('companies/addEvento');
	}
	
	
	/*
	+ modificadores para casas
	*/
	public function modificadores_casas($id_casa){
		
		$data['id_casa']=$id_casa;
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/modificadores_casa', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js')));
			
	}
	
	
	/*
	* servicio de trasporte.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function trasporte(){
		
		
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/trasporte', '', TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js','statics/js/modules/eventos.js')));
			
	}
	
	
	/*
	* modificadores categoria.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function modificador_categoria($id_evento){
		
		$data['id_evento']=$id_evento;
		$data['categorias']=$this->Company->get_categorias($id_evento);
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/modificador_categoria', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
			
	}
	
	/*
	+ metodo para modificar la posicion de una categoria.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function ordena_categoria(){
		$post=$this->input->post('data');
		
		if (!empty($post)) {
		$data = $this->input->post('data');
		$orden = 1;
		$array_elementos = explode(',', $data); // separamos por comas y guardamos en un array
		foreach ($array_elementos as $elemento) {
			// recordamos que los elementos se guardaban como "elemento-1", "elemento-2", etc
			$elemento_id = explode('-', $elemento); // en $elemento_id[1] tendríamos la id
			$id = $elemento_id[1];
			$this->Company->reordenar($id, $orden); // reordenamos
			$orden++; // aumentamos 1 al orden
		}
    }
	
	}
	
	/*
	* metodo para visualizar el menu de un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function menu_evento($id_evento){
		
		$data['id_evento']=$id_evento;
		$aside = $this->load->view('companies/left_menu', '', TRUE);
        $content = $this->load->view('companies/evento_menu', $data, TRUE);
        $this->load->view('main/template', array('aside'=>$aside,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		
	}
	
	/*
	* metodo para guardar una categoria.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_categoria($id_evento){
		
		//if($this->session->userdata('id'))
        //{
		$post=$this->input->post('categoria');
		$post['categoriaIdEvento']=$id_evento;
		
			$reultaod=$this->Company->save_categoria($post);
		
		/*}
        else{
            redirect('companies');
        }*/
		
		
	}
	
	/*
	* metodo para eliminar una categoria.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function delete_categoria($id){
	//if($this->session->userdata('id')){
		$this->Company->delete_categoria($id);
	//}
      //  else{
        //    redirect('companies');
        //}		
		
	}
	
	/*
	* metodo para generar las imagenes de los codigos de barras.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function genera_imagenes($id_evento){
		 $eventos=$this->Company->usuarios_boleto($id_evento);
		 $aux=count($eventos);
		 $a=0;	
		 if($eventos!=0):
			 foreach($eventos as $ev):
			   $tx=base_url()."barras_exel.php?numero=".$ev->codigoBarras;
			   //echo $tx;
			  echo " <img id='img-codigo'  src='".base_url()."barras_exel.php?numero=".$ev->codigoBarras."' style='color: #FF0000; display: none'/>";
			  echo 'GENERANDO REPORTE';
			  $a++;
			 /* if($aux==$a){
				   echo '<script>window.location = "'.base_url().'index.php/companies/excel_general/'.$id_evento.'"</script>';
				}
				*/
			 endforeach; 
			 echo '<script>setTimeout(function(){;window.location = "'.base_url().'index.php/companies/excel_general/'.$id_evento.'"}, 3000)</script>';
			
			
			echo $aux.'-'.$a;
		 else:
		 
		 endif;
	}
	
	
	/*
	* reportes.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	 public function excel_general($id_evento=null)
    {
		ini_set('memory_limit', '300M');
		
		set_time_limit(240);
		//base_url()."barras_exel.php?numero=".$codigo;
   //  echo " <img id='img-codigo'  src='".base_url()."barras_exel.php?numero=".$codigo."'/>";
	 // echo base_url()."barras_exel.php?numero=".$codigo;
	//  $ima= $_SERVER['DOCUMENT_ROOT']."/sistema/img_codigo/".$codigo.".png";//6802658469
	   //$proyectos=$this->Company->get_proyectos_excel();
	   //START THE EXCEL CLASS
       $this->load->library('Classes/PHPExcel');
       $phpexcel = new PHPExcel();
       $phpexcel->getActiveSheet()->setTitle('Reporte');
       $phpexcel->setActiveSheetIndex(0);
		
	   $eventos=$this->Company->usuarios_boleto($id_evento);	
	  
	   $aux=2;
	   foreach($eventos as $evento):
		
		//SE CREA EL CODIGO DE BARRAS Y SE INSERTA
		$ima= $_SERVER['DOCUMENT_ROOT']."/sistema/img_codigo/".$evento->codigoBarras.".png";
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('CODIGO');
		$objDrawing->setDescription('conexion');
		$objDrawing->setPath($ima);
		$objDrawing->setCoordinates('B'.$aux);
		$objDrawing->setWorksheet($phpexcel->getActiveSheet());
			
		$sheet = $phpexcel->getActiveSheet();
		$sheet->getRowDimension($aux)->setRowHeight(60);
		$sheet->getColumnDimension('B')->setWidth(15);
		//
		
		$sheet->setCellValue("C".$aux ,$this->Company->get_nombre_usuario($evento->euIdUsuario));
		$sheet->getColumnDimension('C')->setWidth(40);
		$sheet->getStyle('C4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle('C4')->getFill()->getStartColor()->setRGB('d2ecf9');
		
      
	   $aux++;
	   endforeach;
       
        $name_report = 'reporte'.date('Ymd');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$name_report.xls\"");
        header("Cache-Control: max-age=0");
        
        $objWriter = PHPExcel_IOFactory::createWriter($phpexcel, "Excel5");
        $objWriter->save("php://output");
        exit;
		
    }
	
	/*
	* 
	*/
    
	
}

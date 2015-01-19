<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**

 **/
class cliente extends MX_Controller {

    /**
     
     **/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes', '', TRUE);
		$this->load->model('Company', '', TRUE);
        $this->load->library(array('session'));
        $this->load->helper(array('form', 'html', 'companies', 'url'));
    }
	
    /*
	* metodo para enviar correo a un contacto.
	* autor: jalomo <jalomo@hotmail.es> 
    */
    public function contacto_send(){

    	$contac_name=$this->input->post('contac_name');
    	$contac_email=$this->input->post('contac_email');
    	$contac_message=$this->input->post('contac_message');

    	$message_to_send= 'Nombre:'. $contac_name.'<br/>Email:'.$contac_email.'<br/>'.$contac_message;



    	 $this->load->library('email');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$this->email->initialize($config);											   
	
				//SEND THE EMAIL
				$this->email->from('contacto@conexionmexico.com.mx', 'CONTACTO');
				$this->email->to("contacto@conexionmexico.com.mx");
				$this->email->subject('requieren información');
				$this->email->message($message_to_send);
				$this->email->send();
			   // echo $this->email->print_debugger();
				$this->email->clear();

				echo "Mensaje enviado";


    }

	/*
	* metodo para ver mis puntos.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function mis_puntos(){
		 if($this->session->userdata('id'))
        {
	   	$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['servicios']=$this->clientes->get_servicios_usuarios($this->session->userdata('id'));
		$data['eventos']=$this->clientes->get_alla_eventos();
		$data['eventos_comprados']=$this->clientes->get_eventos_usuarios($this->session->userdata('id'));
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$data['servicio_alojamiento']=$this->clientes->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->clientes->get_servicios_trasporte($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->clientes->get_servicios_alimentos($this->session->userdata('id'));
		
		
		// $aside = $this->load->view('cliente/header', $data, TRUE);
		$this->load->view('cliente/mis_puntos', $data );
       
		
		
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/menu_inicio', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
													   */
		}
        else{
            redirect('companies');
        }	
	}
	
	
	/*
	* metodo para visualizar aque tipo de boleto quieren , hombre, mujer.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function evento_tipo($id_evento){
		if($this->session->userdata('id'))
        {
	   	$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['servicios']=$this->clientes->get_servicios_usuarios($this->session->userdata('id'));
		$data['eventos']=$this->clientes->get_alla_eventos();
		$data['eventos_comprados']=$this->clientes->get_eventos_usuarios($this->session->userdata('id'));
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$data['servicio_alojamiento']=$this->clientes->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->clientes->get_servicios_trasporte($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->clientes->get_servicios_alimentos($this->session->userdata('id'));
		
		$data['id_evento']=$id_evento;
		// $aside = $this->load->view('cliente/header', $data, TRUE);
		$this->load->view('cliente/evento_tipo', $data );
       
		
		
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/menu_inicio', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
													   */
		}
        else{
            redirect('companies');
        }	
	}
	
	
	
	public function save_tipo($id_evento){
	if($this->session->userdata('id'))
        {	
			$tipo=$this->input->post('tipo');
			$this->clientes->updata_user_tipo($this->session->userdata('id'),$tipo);
			redirect('cliente/view_evento/'.$id_evento);
		
		}
        else{
            redirect('companies');
        }	
	}
	
	/*
	* metodo del login del usuario.
	* autor:jalomo <jalomo@hotmail.es>
	*/
	public function login_user(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$this->db->where('usuarioEmail',trim($username));
		$this->db->where('usuarioPassword',trim($password));
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			
			
			$res=$query->row();
			
			$array_session = array('id'=>$res->usuarioId);
			$this->session->set_userdata($array_session);
			if($this->session->userdata('id'))
			{
				echo 1;
						
			}
			else{
				echo 2;
			}
			
			
		}else{
			echo 3;	
		}
			
	}
	
	/*
	* metodo para loguearse con facebook.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function login_facebook(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		
		$this->db->where('usuarioEmail',$email);
		$this->db->where('usuarioIdFacebook',$id);
		$query=$this->db->get('usuarios');
		if($query->num_rows()>0){
			
			
			$res=$query->row();
			
			$array_session = array('id'=>$res->usuarioId);
			$this->session->set_userdata($array_session);
			if($this->session->userdata('id'))
			{
				echo 1;
						
			}
			else{
				echo 0;
			}
			
			
		}else{
			        $data['usuarioNombre']=$name;
					$data['usuariodomicilio']='';
					$data['usuarioTelefonno']='';
					$data['usuarioIdAdmin']=0;
					$data['usuarioUsername']='cl-0';
					$data['usuarioPassword']='conexion';
					$data['usuarioPais']='';
					$data['usuarioEstado']='';
					$data['usuarioSexo']='';
					$data['usuarioIdFacebook']=$id;
					$data['usuarioEmail']=$email;
					$id_user=$this->Company->save_usuario_($data);
					
					$message_to_send="Hola ".$data['usuarioNombre']." bienvenido a conexion , para ingresr tu usuario es:  ".$email."   y yu contraseña es:conexion";
		
				 $this->load->library('email');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$this->email->initialize($config);											   
	
				//SEND THE EMAIL
				$this->email->from('gregorio@divestis.com', 'REGISTRO CONEXION');
				$this->email->to($email);
				$this->email->subject('usuario y contraseña conexion');
				$this->email->message($message_to_send);
				$this->email->send();
			   // echo $this->email->print_debugger();
				$this->email->clear();
					 

					$array_session = array('id'=>$id_user);
					$this->session->set_userdata($array_session);
					if($this->session->userdata('id'))
					{
						echo 1;
						
					}
					else{
						echo 0;
					}
		}
		
	}
	
	
	/*
	* resgistro.
	* autor: jalomo<jalomo@hotmail.es>
	*/
	public function registro(){

      
		
		$data['paises']=$this->Company->get_paises();
		$data['estados']=$this->Company->get_estados();
		$data['ciudades']=$this->clientes->get_ciudades();
		//$data['evento']=$this->clientes->get_evento_id($id_evento);
		
		//$data['modificadores']=$this->clientes->get_modificadores_eventos($id_evento);
		//$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
	   // $aside = $this->load->view('cliente/header', $data, TRUE);
		$this->load->view('cliente/registro', $data);
       
													   
		
	}
	
	/*
	* metodo para ver datos del usuario
	*/
	public function completa_datos(){

      if($this->session->userdata('id'))
        {
		
		$data['paises']=$this->Company->get_paises();
		$data['estados']=$this->Company->get_estados();
		$data['ciudades']=$this->clientes->get_ciudades();
		//$data['evento']=$this->clientes->get_evento_id($id_evento);
		
		$data['usuario']=$this->clientes->get_info_user($this->session->userdata('id'));
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$this->load->view('cliente/completa_datosc', $data);
		
		/*
		$content = $this->load->view('cliente/completa_datos', $data, TRUE);
        $this->load->view('main/cliente', array(/*'aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		*/											   
		}
        else{
            redirect('companies');
        }											   
		
													   
		
	}
	
	
	
	/*
	* cerrar la sesion
	*/
	public function logout(){
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
       // redirect('companies');
	   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
    }
	
	public function index(){

       if($this->session->userdata('id'))
        {
	   	$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['servicios']=$this->clientes->get_servicios_usuarios($this->session->userdata('id'));
		$data['eventos']=$this->clientes->get_alla_eventos();
		$data['eventos_comprados']=$this->clientes->get_eventos_usuarios($this->session->userdata('id'));
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$data['servicio_alojamiento']=$this->clientes->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->clientes->get_servicios_trasporte($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->clientes->get_servicios_alimentos($this->session->userdata('id'));
		
		
	   // $aside = $this->load->view('cliente/header', $data, TRUE);
		$this->load->view('cliente/inicioc', $data );
       
		
		
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/menu_inicio', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/modules/login.js')));
													   */
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	
	/*
	* metodo para mostrar un mensaje.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function ver_mesaje($id_mensaje){
		$texto=$this->clientes->get_texto_mensaje($id_mensaje);
			echo $texto;
	}
	
	/*
	* metodo para cambiar el status de un mensaje.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function cambiar_status(){
		$id_mensaje=$this->input->post('id_post');	
		$id_user=$this->input->post('id_user');	
		$this->clientes->modifica_mensaje($id_user,$id_mensaje);
	}
	
	
	public function do_purchase(){

		/*$data=$this->input->post('save');
		if(isset($data)){
			$id=$this->Company->save_data('user_formulario',$data);
			
		}
		*/
		$servicio=$this->input->post('servicio');
		$costo=$this->input->post('costo');
		
		$config['business'] 			='lieriusg.1a@gmail.com';// 'lieriusg.1a@gmail.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= base_url().'index.php/cliente/notify_payment/'; 
		$config['cancel_return'] 		= base_url().'index.php/cliente/cancel_payment/';
		$config['notify_url'] 			= base_url().'index.php/cliente/ipn/';//'process_payment.php'; //IPN Post
		$config['production'] 			= FALSE; //Its false by default and will use sandbox
		$config["invoice"]				= random_string('numeric',8); //The invoice id
		
		$this->load->library('paypal',$config);
		
		
				$this->paypal->add($servicio,$costo);
				
		
		
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		
		/*$this->paypal->add('5 Clases especializadas Aloa
							5 Hrs de Clases de Fabricante
							Entrada al Showroom
							Entrada al Cocktail de Bienvenida
							2 Coffee break diarios
							Comida los días 7 y 8 de Marzo.',2750.00);*/ //First item
		//$this->paypal->add('Pants',40); 	  //Second item
		///$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code
		
		$this->paypal->pay(); //Proccess the payment

	}
	
	
	
	public function ipn($id,$id_user)
    {
       
	   
	   
	 
	  $xp=explode( '-', $id ); 
	  foreach( $xp as $key):
	  $this->clientes->updata_status($key);
	  endforeach;
	   
	   $datos=$this->input->post();
	   
	  $payment['paymentIdUser']=$id;
	   $payment['paymentFechaCreacion']=date('Y-m-d');
	   $payment['payment_gross']=$datos['payment_gross'];
	   $payment['payment_date']=$datos['payment_date'];
	   $payment['payer_email']=$datos['payer_email'];
	   $payment['txn_id']=$datos['txn_id'];
	   $payment['verify_sign']=$datos['verify_sign'];
	   $payment['payer_id']=$datos['payer_id'];
	  
	  
	   $idpay=$this->clientes->save_table($payment,'payment');
	   
	   
	   
	          $this->load->library('email');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$this->email->initialize($config);											   
	
				//SEND THE EMAIL
				$this->email->from('jalomo@hotmail.es', 'REGISTRO CONEXION');
				$this->email->to('jalomo@hotmail.es');
				$this->email->subject('usuario y contraseña conexion');
				$this->email->message('REGISTRO CONEXION');
				$this->email->send();
			   // echo $this->email->print_debugger();
				$this->email->clear();
	   
	  
		
		
    }
	
	
	
	public function notify_payment(){

		/*$received_data = print_r($this->input->post(),TRUE);

		echo "<pre>".$received_data."</pre>";
		
		
		$this->clientes->updata_status(1707);
		
		echo $this->session->userdata('id');
		//redirect('companies/confirmacion_paypal');
			*/
		redirect('cliente/mis_eventos');
		
		//echo "pago realizado con exito";
		//redirect('cliente');
	}

	public function cancel_payment($id){
		//$this->Company->updata_status($id,6);
			
			redirect('cliente/eventos');
			
			
			redirect('cliente');
	}
	
	
	/*
	* login facebook
	*/
	public function index_php()
    {
      	
		$CI = & get_instance();
        $CI->config->load("facebook",TRUE);
        $config = $CI->config->item('facebook');
        $this->load->library('Facebook', $config);
		
		
		
			 $user = $this->facebook->getUser();
        if($user) {
            try {
                $user_info = $this->facebook->api('/me');
                echo '<pre>'.htmlspecialchars(print_r($user_info, true)).'</pre>'.'<br/>';
				$aux=explode("https://www.facebook.com/",$user_info['link']);
				//echo $aux[1];
				echo "<a href=\"{$this->facebook->destroySession()}\">salir</a>".$user_info['id'];
				/* $existe= $this->Muser->checar_face($aux[1]);
				if($existe!=0){
					$data['datos']=$this->Muser->datos_cliente($existe);
					$data['idusuario']=$existe;
					//$data['salir']="<a href=\"{$this->facebook->destroySession()}\">salir</a>";
					$data['page'] = 'inicio';		
					$this->load->view('plantilla_cliente',$data);
					//echo 'si existe';
				}else{
				
					//echo 'no existe';
					
					$this->data['boton']="El facebook proporcionado no existe en nuestra base de datos"."<br/><a href=\"{$this->facebook->destroySession()}\">salir</a>";
					$this->data['page'] = 'login';
					$this->load->view('plantillalogin',$this->data);
						}
				*/
				 
            } catch(FacebookApiException $e) {
                echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>'.'<br/>';
				
				echo "<a href=\"{$this->facebook->destroySession()}\">logout</a>";
                $user = null;
            }
        } else {
              
			/* $this->data['boton']="<a href=\"{$this->facebook->getLoginUrl()}\">logu&eacute;ate usando Facebook</a>";
			 $this->data['page'] = 'login';
			 $this->load->view('plantillalogin',$this->data);*/
			 
			 //echo "<a href=\"{$this->facebook->getLoginUrl()}\">logu&eacute;ate usando Facebook</a>";
			 
			

        }
								  														  
    }
	
	/*
	* metodo para pagar servicio de alojamiento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function servicio_deposito($id_servicio,$tipo){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['id_servicio']=$id_servicio;
		$data['servicio']=$this->clientes->get_servicio_id($id_servicio);
		$data['tipo']=$tipo;
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
	    $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/compra', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	/*
	* metodo para obtener el boton de subir imagen .
	* esto es para el deposito bancario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function get_deposito(){
		
		$subir=form_upload(array('id'=>'image1',
                                         'class'=>'imagen',
                                         'name'=>'imagen',
                                          'value'=>''));
										  
	   echo $subir;										  	
	}
	
	
	/*
	* metodo para guardar la ficha del usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	 public function save_servicio_deposito(){
        if($this->session->userdata('id')){
			
			 $post = $this->input->post('save');
			if(isset($_FILES['imagen']['name'])){
				
				if($_FILES['imagen']['name'] != ''){
				   
				   // $post['noticiasFecha'] = date('d-m-Y');
					$name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['imagen']['name']);
	
					$path_to_save = "statics/img_fichas/";
					move_uploaded_file($_FILES['imagen']['tmp_name'], $path_to_save.$name);
	
					$post['suUrlImage'] = $path_to_save.$name;
					$post['suIdUsuario']=$this->session->userdata('id');
					$post['suTipoPago']=3;
					$post['suStatus']=3;
	
					$id = $this->clientes->save_table($post,'serviciousuario');
				}else{
					$post['suUrlImage'] = '';
					$post['suIdUsuario']=$this->session->userdata('id');
					$post['suTipoPago']=3;
					$post['suStatus']=3;
					$id = $this->clientes->save_table($post,'serviciousuario');	
				}
			}else{
				$post['suUrlImage'] = '';
				$post['suIdUsuario']=$this->session->userdata('id');
				$post['suTipoPago']=3;
				$post['suStatus']=3;
				$id = $this->clientes->save_table($post,'serviciousuario');		
			}
        }
        else{
            redirect('companies');
        }
    }
	
	
	/*
	*  metodo para comprar un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function compra_evento($id_evento){

       if($this->session->userdata('id'))
        {
	   	
		
		
		$data['evento']=$this->clientes->get_evento_id($id_evento);
		
		$data['modificadores']=$this->clientes->get_modificadores_eventos($id_evento);
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
	    $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/compra_evento', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	/*
	* metodo para guardar la compra de un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_compra(){
		 $post = $this->input->post('evento');
		 $modificadores = $this->input->post('modificadores');
		  if($this->session->userdata('id')){
			
			 $post = $this->input->post('save');
			if(isset($_FILES['imagen']['name'])){
				
				if($_FILES['imagen']['name'] != ''){
				   
				   // $post['noticiasFecha'] = date('d-m-Y');
					$name = date('dmyHis').'_'.str_replace(" ", "", $_FILES['imagen']['name']);
	
					$path_to_save = "statics/img_fichas/";
					move_uploaded_file($_FILES['imagen']['tmp_name'], $path_to_save.$name);
	
					$post['euUrlImage'] = $path_to_save.$name;
					$post['euIdUsuario']=$this->session->userdata('id');
					$post['euTipoPago']=3;
					$post['euStatus']=3;
	
					$id = $this->clientes->save_table($post,'eventosusuarios');
				}else{
					$post['euUrlImage'] = '';
					$post['euIdUsuario']=$this->session->userdata('id');
					$post['euTipoPago']=3;
					$post['euStatus']=3;
					$id = $this->clientes->save_table($post,'eventosusuarios');	
				}
			}else{
				$post['euUrlImage'] = '';
				$post['euIdUsuario']=$this->session->userdata('id');
				$post['euTipoPago']=3;
				$post['euStatus']=3;
				$id = $this->clientes->save_table($post,'eventosusuarios');		
			}
			
			//var_dump($modificadores);
			
			foreach($modificadores as $modificador):
			
				echo $modificador;
				$data['modModificadorId']=$modificador;
				$data['modEventoId']=$post['euIdEvento'];
				$data['modUserId']=$this->session->userdata('id');
				$id = $this->clientes->save_table($data,'moduser');		
			endforeach;
			
			
        }
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
		
		
		
		 
	}
	
	
	
	/*
	* metodo para crear una cuenta de usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function crea_cuenta(){

      
		
		$data['paises']=$this->Company->get_paises();
		$data['estados']=$this->Company->get_estados();
		$data['ciudades']=$this->clientes->get_ciudades();
		//$data['evento']=$this->clientes->get_evento_id($id_evento);
		
		//$data['modificadores']=$this->clientes->get_modificadores_eventos($id_evento);
		//$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
	   // $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/crear_cuenta', $data, TRUE);
        $this->load->view('main/cliente', array(/*'aside'=> $aside ,*/
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		
													   
		
	}
	
	
	public function save_user(){
		
		
		$post=$this->input->post('user');
		$post['usuarioIdAdmin']=0;
		
		
		$caracteres = "1234567890"; //posibles caracteres a usar
			$numerodeletras=5; //numero de letras para generar el texto
			$cadena1 = ""; //variable para almacenar la cadena generada
			for($i=0;$i<$numerodeletras;$i++)
			{
				$cadena1 .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
			entre el rango 0 a Numero de letras que tiene la cadena */
			}
		
		
		
		//$post['usuarioUsername']=$post['usuarioNombre'];//'cl-'.$cadena1;
		//$post['usuarioPassword']=$post['usuarioPassword'];//$this->get_aleatoria();
		
		
			$reultaod=$this->Company->save_usuario_($post);
		/*$aux_msj=' <div style="font-size:70px; color:#003; font-family: Helvetica-ExtraCompressed;" class="" align="center">BIENVENIDO</div><br/>'.
		' Bienvenido a conexion, este es tu nombre de usuario  usuario:'.$post['usuarioEmail'].'y contrasena:'.$post['usuarioPassword'];
		
		echo $aux_msj;*/
		
		$message_to_send="Hola ".$post['usuarioNombre']." Bienvenido a conexion, este es tu nombre de usuario :  ".$post['usuarioEmail']."   y yu contraseña :".$post['usuarioPassword']."";
		
				 $this->load->library('email');
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$this->email->initialize($config);											   
	
				//SEND THE EMAIL
				$this->email->from('gregorio@divestis.com', 'REGISTRO CONEXION');
				$this->email->to($post['usuarioEmail']);
				$this->email->subject('usuario y contraseña conexion');
				$this->email->message($message_to_send);
				$this->email->send();
			   // echo $this->email->print_debugger();
				$this->email->clear();
				
			
		  $array_session = array('id'=>$reultaod);
					$this->session->set_userdata($array_session);
					if($this->session->userdata('id'))
					{
						//redirect('cliente');
						
					}
					else{
					}
		   
			
		
		
		
		
	}
	
	
	
	
	public function get_aleatoria(){
			
			$caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; //posibles caracteres a usar
			$numerodeletras=3; //numero de letras para generar el texto
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
	* cerrar la sesion
	*/
	/*public function logout(){
        $this->session->unset_userdata('id');
        $this->session->sess_destroy();
        redirect('companies');
    }
	*/
	
	/*
	* metodo para obtener las ciudades.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function ciudades(){

       if($this->session->userdata('id'))
        {
	   	
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['servicios']=$this->clientes->get_servicios_usuarios($this->session->userdata('id'));
		$data['eventos']=$this->clientes->get_alla_eventos();
		$data['eventos_comprados']=$this->clientes->get_eventos_usuarios($this->session->userdata('id'));
		
		$data['servicio_alojamiento']=$this->clientes->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->clientes->get_servicios_trasporte($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->clientes->get_servicios_alimentos($this->session->userdata('id'));
		
		
		$data['ciudades']=$this->clientes->get_ciudades_();
		
		
	    $aside = $this->load->view('cliente/ciudadesc', $data);
		
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/ciudades', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	
	
	
	/*
	* alojamiento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function alojamiento($id_ciudad=null){

       if($this->session->userdata('id') && isset($id_ciudad))
        {
	   	
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['servicios']=$this->clientes->get_servicios_usuarios($this->session->userdata('id'));
		$data['eventos']=$this->clientes->get_alla_eventos();
		$data['eventos_comprados']=$this->clientes->get_eventos_usuarios($this->session->userdata('id'));
		
		$data['servicio_alojamiento']=$this->clientes->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->clientes->get_servicios_trasporte($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->clientes->get_servicios_alimentos($this->session->userdata('id'));
		
		
		$data['casas']=$this->clientes->get_casas($id_ciudad);
		
		
	   $this->load->view('cliente/alojamientoc', $data);
		
	    /*$aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/alojamiento', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
          //  redirect('companies');
		  echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	/*
	* metodo para ver una casa
	*/
	public function casa($id){

       if($this->session->userdata('id'))
        {
	   	
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['servicios']=$this->clientes->get_servicios_usuarios($this->session->userdata('id'));
		$data['eventos']=$this->clientes->get_alla_eventos();
		$data['eventos_comprados']=$this->clientes->get_eventos_usuarios($this->session->userdata('id'));
		
		$data['servicio_alojamiento']=$this->clientes->get_servicios_alojamiento($this->session->userdata('id'));
		$data['servicio_trasporte']=$this->clientes->get_servicios_trasporte($this->session->userdata('id'));
		$data['servicio_aliementos']=$this->clientes->get_servicios_alimentos($this->session->userdata('id'));
		
		
			
		$data['casa']=$this->clientes->get_casa_id($id);
		$data["casaCuartos"] = $this->clientes->getCasaCuartos($id);
		
		
	 $this->load->view('cliente/casac', $data);
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/casa', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));*/
													   
		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}

	public function pay_cuarto($idc){
      
         if($this->session->userdata('id')){
               $data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
              $data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
              $data['dataCuarto']=$this->clientes->getDatCuarto($idc);
			  
			  $aside = $this->load->view('cliente/pay_cuartoc', $data);
	       	 
              
			  /*$aside = $this->load->view('cliente/header', $data, TRUE);
	       	  $content = $this->load->view('cliente/pay_cuarto', '', TRUE);
              $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */

        }  

       else{
          //redirect('companies');
		  echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        	}

	}
	
	
	
	/*
	* tipo de pago
	*/
	public function tipo_pago(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		
		$post = $this->input->post('evento');
		
		if($this->input->post('evento')):
		//print_r($data['modificador']);
		
		//echo $data['evento'];
		
		$ciuda=explode("--",$post['evento']);
		$nombre_ciudad=$ciuda[1];
		$precio_ciudad=$ciuda[0];
		$evento_id=$ciuda[2];
		$nombre_evento=$ciuda[3];
		$total=0;
		if(isset($post['modificador'])):
		$tamano1=sizeof($post['modificador']);
		//$total=0;
		
		for($i=0;$i<$tamano1;$i++):
		$arr=$post['modificador'][$i];
	    if($arr!=0){
		$nam1=explode("--",$arr);
		//echo $nam1[0].'-'.$nam1[1].'-'.$nam1[2].'/';
		$total+=(float)$nam1[2];
     	}
		endfor;
		endif;
		$total+=(float)$precio_ciudad;
		
		if(isset($post['modificador'])){}else{$post['modificador']=0;}
		
		$data['pecio_total']=$total;
		$data['nombre_ciudad']=$nombre_ciudad;
		$data['precio_ciudad']=$precio_ciudad;
		$data['evento_id']=$evento_id;
		$data['nombre_evento']=$nombre_evento;
		$data['modificadores']=$post['modificador'];
		$data['userId'] = $this->session->userdata('id');
		$data['dato_evento']=$this->clientes->get_evento_id($evento_id);
		
	    $this->load->view('cliente/pago_tipoc', $data);
		
	   // $aside = $this->load->view('cliente/header', $data, TRUE);
		//$content = $this->load->view('cliente/pago_tipo', '', TRUE);
        //$this->load->view('main/cliente', array('aside'=> $aside ,
          //                                             'content'=>$content,
            //                                           'included_js'=>array('statics/js/libraries/form.js')));
													   
			else:
			
			redirect('cliente');
			endif;												   
		}
        else{
          //  redirect('companies');
		  echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}

	/*
    * metodo para elegir una opcion de pago.
    * autor: jalomo <jalomo@hotmail.es>
	*/
	public function opciones(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		
		$post = $this->input->post('evento');
		
		if($this->input->post('evento')):
		//print_r($data['modificador']);
		
		//echo $data['evento'];
		
		$ciuda=explode("--",$post['evento']);
		$nombre_ciudad=$ciuda[1];
		$precio_ciudad=$ciuda[0];
		$evento_id=$ciuda[2];
		$nombre_evento=$ciuda[3];
		$total=0;
		if(isset($post['modificador'])):
		$tamano1=sizeof($post['modificador']);
		//$total=0;
		
		for($i=0;$i<$tamano1;$i++):
		$arr=$post['modificador'][$i];
	    if($arr!=0){
		$nam1=explode("--",$arr);
		//echo $nam1[0].'-'.$nam1[1].'-'.$nam1[2].'/';
		$total+=(float)$nam1[2];
     	}
		endfor;
		endif;
		$total+=(float)$precio_ciudad;
		
		if(isset($post['modificador'])){}else{$post['modificador']=0;}
		
		$data['pecio_total']=$total;
		$data['nombre_ciudad']=$nombre_ciudad;
		$data['precio_ciudad']=$precio_ciudad;
		$data['evento_id']=$evento_id;
		$data['nombre_evento']=$nombre_evento;
		$data['modificadores']=$post['modificador'];
		$data['userId'] = $this->session->userdata('id');
		$data['dato_evento']=$this->clientes->get_evento_id($evento_id);
		
	    $this->load->view('cliente/opciones', $data);
		
	   // $aside = $this->load->view('cliente/header', $data, TRUE);
		//$content = $this->load->view('cliente/pago_tipo', '', TRUE);
        //$this->load->view('main/cliente', array('aside'=> $aside ,
          //                                             'content'=>$content,
            //                                           'included_js'=>array('statics/js/libraries/form.js')));
													   
			else:
			
			redirect('cliente');
			endif;												   
		}
        else{
          //  redirect('companies');
		  echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	

	/*
    * metodo para seleccionar una opcion de pago.
    * autor: jalomo <jalomo@hotmail.es>
	*/
	public function seleccion_pago(){
		if($this->session->userdata('id'))
        {
        	$opcion = $this->input->post('opciones');

        	$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		    $data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));

        	$pecio_total = $this->input->post('pecio_total');
        	$nombre_ciudad = $this->input->post('nombre_ciudad');
        	$precio_ciudad = $this->input->post('precio_ciudad');
        	$evento_id = $this->input->post('evento_id');
        	$nombre_evento = $this->input->post('nombre_evento');
        	$modificadores = $this->input->post('modificadores');
        	$userId = $this->input->post('userId');
        	$dato_evento = $this->input->post('dato_evento');

        	$data['pecio_total']=$pecio_total;
			$data['nombre_ciudad']=$nombre_ciudad;
			$data['precio_ciudad']=$precio_ciudad;
			$data['evento_id']=$evento_id;
			$data['nombre_evento']=$nombre_evento;
			$data['modificadores']=$modificadores;
			$data['userId'] = $this->session->userdata('id');
			$data['dato_evento']=$this->clientes->get_evento_id($evento_id);



        	switch ($opcion) 
        	{
			    case 1:
			        $this->load->view('cliente/pago_tipoc', $data); 
			        break;
			    case 2:
			        echo "i es igual a 1";
			        break;
			    case 3:
			        echo "i es igual a 2";
			        break;
			}
        }
        else
        {
          //  redirect('companies');
		  echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }

	}

	/*
	
	* validar tipo de pago
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_tipo_pago(){
	$id_usuario=$this->session->userdata('id');
       if($this->session->userdata('id'))
        {
        	
	   	
		
		 $tipo = $this->input->post('tipo');
		 
		 switch ($tipo['pago']) {
			case 1:
					
					
			       $numero = $this->input->post('numero');	
				
				$num='';
				for($x=1;$x<=$numero;$x++):
				   
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                  $resSave =  $this->clientes->saveRegPago(1,3,$idu,$ide,$idc,$cst,$mod,$tot); 
				  $num.=$resSave.'-';
			   endfor; 
                if($resSave!=0){
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					//redirect('cliente/email');  
					
					$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		   			$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
					$data['total']=$tot;
		
					$aside = $this->load->view('cliente/header', $data, TRUE);
					$content = $this->load->view('cliente/email_enviadoc', '', TRUE);
					$this->load->view('main/cliente', array('aside'=> $aside ,
																   'content'=>$content,
																   'included_js'=>array('statics/js/libraries/form.js')));

                }

                else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				break;
			case 2:
				
				
				/*$data=$this->input->post('save');
				if(isset($data)){
					$id=$this->Company->save_data('user_formulario',$data);
					
				}
				*/
				$numero = $this->input->post('numero');	
				
				$num='';
				for($x=1;$x<=$numero;$x++):
				   
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                  $resSave =  $this->clientes->saveRegPago(2,3,$idu,$ide,$idc,$cst,$mod,$tot); 
				  $num.=$resSave.'-';
			   endfor;
			   
			   
			   
			    if($resSave!=0){

				 $nombre_del_evento=$this->clientes->get_name_evento($ide);	
					
				  $config['business'] 			='lieriusg.1a@gmail.com';// 'lieriusg.1a@gmail.com';
				  $config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
				  $config['return'] 				= base_url().'index.php/cliente/notify_payment/'; 
				  $config['cancel_return'] 		= base_url().'index.php/cliente/cancel_payment/';
				  $config['notify_url'] 			= base_url().'index.php/cliente/ipn/'.$num.'/'.$id_usuario;//'process_payment.php'; //IPN Post
				  $config['production'] 			= false; //Its false by default and will use sandbox
				  $config["invoice"]				= random_string('numeric',8); //The invoice id
				
				  $this->load->library('paypal',$config);
				
				
						//$this->paypal->add($servicio,$costo);
						
				
				
				#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
				
				  $this->paypal->add($nombre_del_evento,$tot); //First item
				//$this->paypal->add('Pants',40); 	  //Second item
				///$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code
				
				  $this->paypal->pay(); //Proccess the payment
				}
				else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }
				
				
				
				
				
				break;
			case 3:
					
					
				$numero = $this->input->post('numero');	
				
				
				for($x=1;$x<=$numero;$x++):
				   
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                  $resSave =  $this->clientes->saveRegPago(3,3,$idu,$ide,$idc,$cst,$mod,$tot); 
				  
			   endfor;
					
			      /* $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal'); 
                   $resSave =  $this->clientes->saveRegPago(3,3,$idu,$ide,$idc,$cst,$mod,$tot); */
				   
                   $aux=$this->clientes->get_email_user($this->session->userdata('id'));
                   $mail = $aux->usuarioEmail;
				   $nada[0] = array("tipo"=>$tipo["pago"],"nombre"=>"oxxo","res"=>$resSave,"mail"=>$mail);
				   echo(json_encode($nada));
				break;
			case 4:
				
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                $resSave =  $this->clientes->saveRegPago(4,3,$idu,$ide,$idc,$cst,$mod,$tot);  
			    if($resSave!=0){
                  
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					redirect('cliente/email');  

			    }

			    else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }
				






				break;	
				
				
				case 5:
					
					
			       $numero = $this->input->post('numero');	
				
				$num='';
				for($x=1;$x<=$numero;$x++):
				   
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                  $resSave =  $this->clientes->saveRegPago(1,3,$idu,$ide,$idc,$cst,$mod,$tot); 
				  $num.=$resSave.'-';
			   endfor; 
                if($resSave!=0){
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					//redirect('cliente/email');  
					
					$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		   			$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
					$data['total']=$tot;
		
					$aside = $this->load->view('cliente/header', $data, TRUE);
					$content = $this->load->view('cliente/reservar', '', TRUE);
					$this->load->view('main/cliente', array('aside'=> $aside ,
																   'content'=>$content,
																   'included_js'=>array('statics/js/libraries/form.js')));

                }

                else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				break;
				
				
				case 6:
					
					
			       $numero = $this->input->post('numero');	
				
				$num='';
				for($x=1;$x<=$numero;$x++):
				   
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                  $resSave =  $this->clientes->saveRegPago(1,3,$idu,$ide,$idc,$cst,$mod,$tot); 
				  $num.=$resSave.'-';
			   endfor; 
                if($resSave!=0){
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        
					/*$this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					//redirect('cliente/email');  
					*/
					$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
					$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
					$data['rps']=$this->Company->get_vendedores_msj();			
					$aside = $this->load->view('cliente/header', $data, TRUE);
					$content = $this->load->view('cliente/rps', '', TRUE);
					$this->load->view('main/cliente', array('aside'=> $aside ,
																   'content'=>$content,
																   'included_js'=>array('statics/js/libraries/form.js')));

                }

                else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				break;
				
				
				
				
		}
		 
		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	/*
	* metodo para mostrar los rps que existen.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function rps(){
		
		if($this->session->userdata('id'))
        {
	   	
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['rps']=$this->Company->get_vendedores_msj();			
	    $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/rps', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
		
	}

	public function save_tipo_pago_cuarto(){

       if($this->session->userdata('id'))
        {
        	
	   	
		
		 $tipo = $this->input->post('tipo');
		 
		 switch ($tipo['pago']) {
			case 2: //paypal
			       $idu = $this->session->userdata('id');
			       $idca  = $this->input->post('idca');
                   $casanombre = $this->input->post('casanombre');
                   $idcu = $this->input->post('idcu');
                   $sennia = $this->input->post('sennia');
                   $costo = $this->input->post('costo');
                   $idc = $this->input->post('ciudad');


                $resSave =  $this->clientes->saveRegPagoCuarto(2,1,$idu,$idca,$casanombre,$idcu,$sennia,$costo,$idc);  
            
                if($resSave==1){
                   

				 $config['business'] 			='lieriusg.1a@gmail.com';// 'lieriusg.1a@gmail.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= base_url().'index.php/cliente/notify_payment_cuarto/'; 
		$config['cancel_return'] 		= base_url().'index.php/cliente/cancel_payment_cuarto/';
		$config['notify_url'] 			= base_url().'index.php/cliente/ipn_cuarto/'.$this->session->userdata('id');//'process_payment.php'; //IPN Post
		$config['production'] 			= FALSE; //Its false by default and will use sandbox
		$config["invoice"]				= random_string('numeric',8); //The invoice id
		
		$this->load->library('paypal',$config);
		
		
				$this->paypal->add($casanombre,$costo);
				
		
		
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		
		/*$this->paypal->add('5 Clases especializadas Aloa
							5 Hrs de Clases de Fabricante
							Entrada al Showroom
							Entrada al Cocktail de Bienvenida
							2 Coffee break diarios
							Comida los días 7 y 8 de Marzo.',2750.00);*/ //First item
		//$this->paypal->add('Pants',40); 	  //Second item
		///$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code
		
		$this->paypal->pay(); //Proccess the payment

                }

                else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				break;
			case 4: //contado
				
				
				/*$data=$this->input->post('save');
				if(isset($data)){
					$id=$this->Company->save_data('user_formulario',$data);
					
				}
				*/

				   $idu = $this->session->userdata('id');
			       $idca  = $this->input->post('idca');
                   $casanombre = $this->input->post('casanombre');
                   $idcu = $this->input->post('idcu');
                   $sennia = $this->input->post('sennia');
                   $costo = $this->input->post('costo');
                   $idc = $this->input->post('ciudad');


                 $resSave =  $this->clientes->saveRegPagoCuarto(2,3,$idu,$idca,$casanombre,$idcu,$sennia,$costo,$idc);   
			    if($resSave==1){

				      $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					redirect('cliente/email');  
				}
				else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }
				
				
				
				
				
				break;
			case 3:

			       $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal'); 
                   $resSave =  $this->clientes->saveRegPago(3,3,$idu,$ide,$idc,$cst,$mod,$tot); 
                   $aux=$this->clientes->get_email_user($this->session->userdata('id'));
                   $mail = $aux->usuarioEmail;
				   $nada[0] = array("tipo"=>$tipo["pago"],"nombre"=>"oxxo","res"=>$resSave,"mail"=>$mail);
				   echo(json_encode($nada));
				break;
			case 1:
				
				   $idu  = $this->input->post('idu');
                   $ide = $this->input->post('ide');
                   $idc = $this->input->post('idc');
                   $cst = $this->input->post('cst');
                   $mod = $this->input->post('mod');
                   $tot = $this->input->post('ptotal');


                $resSave =  $this->clientes->saveRegPago(4,3,$idu,$ide,$idc,$cst,$mod,$tot);  
			    if($resSave!=0){
                  
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					redirect('cliente/email');  

			    }

			    else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }
				






				break;	
		}
		 
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}

	public function savePagoModExtras(){

       if($this->session->userdata('id'))
        {
        	
	   	
		
		 $tipo = $this->input->post('tipo');
		 
		 switch ($tipo['pago']) {
			case 1: //deposito
			 
               $modificadores = $this->input->post("modificadores");
               $total = $this->input->post("total");
        

                $res = $this->clientes->savePagoModExtras($modificadores,1);
                if($res==1){
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					redirect('cliente/email');  

                }

                else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				break;
			case 2:


                 $modificadores = $this->input->post("modificadores");
                 $total = $this->input->post("total");
                 $res = $this->clientes->savePagoModExtras($modificadores,2);
			    if($res==1){


				  $config['business'] 			='lieriusg.1a@gmail.com';// 'lieriusg.1a@gmail.com';
				  $config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
				  $config['return'] 				= base_url().'index.php/cliente/notify_payment/'; 
				  $config['cancel_return'] 		= base_url().'index.php/cliente/cancel_payment/';
				  $config['notify_url'] 			= base_url().'index.php/cliente/ipn/';//'process_payment.php'; //IPN Post
				  $config['production'] 			= false; //Its false by default and will use sandbox
				  $config["invoice"]				= random_string('numeric',8); //The invoice id
				
				  $this->load->library('paypal',$config);
				
				
						//$this->paypal->add($servicio,$costo);
						
				
				
				#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
				
				  $this->paypal->add('5 Clases especializadas Aloa
									5 Hrs de Clases de Fabricante
									Entrada al Showroom
									Entrada al Cocktail de Bienvenida
									2 Coffee break diarios
									Comida los días 7 y 8 de Marzo.',2750.00); //First item
				//$this->paypal->add('Pants',40); 	  //Second item
				///$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code
				
				  $this->paypal->pay(); 

				   
				}
				else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				break;
			case 3:
				echo "pago oxxo no aplica";
				break;
			case 4:
			//contado

			   $modificadores = $this->input->post("modificadores");
               $total = $this->input->post("total");
        

                $res = $this->clientes->savePagoModExtras($modificadores,$tipo);
                if($res==1){
                    $res=$this->clientes->get_email_user($this->session->userdata('id'));
				    $email=$res->usuarioEmail;
				    $message_to_send=" favor de depositar a la cuenta:   ";
			        $this->load->library('email');
				    $config['mailtype'] = 'html';
				    $config['charset'] = 'utf-8';
				    $this->email->initialize($config);											   
	
				    //SEND THE EMAIL
				    $this->email->from('danyaxel27@gmail.com', 'CONEXION PAGO');
				    $this->email->to($email);
				    $this->email->subject('Datos de la cuenta bancaria');
				    $this->email->message($message_to_send);
				    $this->email->send();
			        // echo $this->email->print_debugger();
				    $this->email->clear();
					redirect('cliente/email');  

                }

                else{
                  echo("Ocurrió un erro al guardar sus datos de compra. Intente de nuevo");
                }

				
				break;	
		}
		 
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }

         
            


	}
	
	
	/*
	* EMAIL ENVIADO CON EXITO
	*/
	public function email(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		
		
	
		
		
	    $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/email_enviadoc', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	/*
	* METODO PARA COMPRAR TRASPORTE.
	* AUTOR: JALOMO <JALOMO@HOTMAIL.ES>
	*/
	public function trasporte(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		$data["usr"] = $this->session->userdata('id');
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
	
		$data['ciudades']=$this->clientes->getCiudades();
		
	    $this->load->view('cliente/trasportec', $data);
		
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/trasporte', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	
	
	
	/*
	* metodo para los eventos.
	* autor: jalomo <jalomo@hotmail.rs>
	*/
	public function eventos(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		
		$data['eventos']=$this->clientes->get_alla_eventos();
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
		
	   $this->load->view('cliente/eventosc', $data);
	   /* $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/eventos', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	/*
	* metodo para ver un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function view_evento($id){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		$data['id_evento']=$id;
		
		$data['evento']=$this->clientes->get_evento_id($id);
		
		$data['modificadores']=$this->clientes->get_modificadores_eventos($id);
		
		$data['sexo']=$this->clientes->get_sexo($this->session->userdata('id'));
		
		$data['categorias']=$this->clientes->get_categorias($id);
		
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		
	    $this->load->view('cliente/view_eventoc', $data);
		
	    /*$aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/view_evento', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	
	/*
	* MIS COMPRAS
	*/
	public function mis_compras(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		
		
		
	    $data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));

	    $data['user_eventos'] =$this->clientes->getUserEventos($this->session->userdata('id'));
		
		$this->load->view('cliente/mis_comprasc', $data);
	    /*$aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/mis_compras', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	public function mis_eventos(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['user_eventos'] =$this->clientes->getUserEventos($this->session->userdata('id'));
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		 $this->load->view('cliente/mis_eventosc', $data);
	    /*$aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/mis_eventos', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
													   */
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}

    public function mis_trasporte(){

       if($this->session->userdata('id'))
        {
	   	
		
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		$data['transportes']=$this->clientes->get_clientes_transportes($this->session->userdata('id'));
		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
	    
		
		$this->load->view('cliente/mis_trasportesc', $data);
		/*
		$aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/mis_trasportes', $data, TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
             
                                                       'included_js'=>array('statics/js/libraries/form.js')));   
													   */

		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}

    public function mis_alojamiento(){

       if($this->session->userdata('id'))
        {
	   	
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
  		$data['user_cuartos'] =$this->clientes->getUserCuartos($this->session->userdata('id'));
 		$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
     	
		$aside = $this->load->view('cliente/header', $data, TRUE);
  		$content = $this->load->view('cliente/mis_alojamiento', '', TRUE);
        $this->load->view('main/cliente', array(/*'aside'=> $aside ,*/
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
           // redirect('companies');
		   echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}
	
	
	/*
	* VER UN EVENTO YA COMPRADO
	*/
	public function view_evento_compra($idr,$ide){

       if($this->session->userdata('id'))
        {
	   	$data['mensajes']=$this->clientes->get_mensajes_user($this->session->userdata('id'));
		$index=0;
		$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
		//$data['data_compra'] = $this->clientes->getDataCompra($ide,$this->session->userdata('id'),$idr);
		$data['dataEventoUsuario'] = $this->clientes->getDataEventoUsuario($ide,$this->session->userdata('id'),$idr);
        $data['modificadoresEventoUsuario'] = $this->clientes->getModificadoresEventoUsuario($ide,$this->session->userdata('id'),$idr);
		$data['modificadoresEvento'] = $this->clientes->getModificadoresEvento($this->session->userdata('id'),$ide);
        $data["ticketsExtras"] = $this->clientes->totalTicketsExtras($this->session->userdata('id'),$ide,$idr);
        if(is_array($data["ticketsExtras"])){

        	foreach ($data["ticketsExtras"] as $key => $value) {
        		$data["ticket".$index] = $this->clientes->dataTicketExtra($this->session->userdata('id'),$ide,$idr,$value["ticket"]);
        		$index++;
        	}
        } 
        $data["idr"] = $idr;
        $data["ide"] = $ide;
        $data["idu"] = $this->session->userdata('id');  
	
		 $this->load->view('cliente/view_evento_comprac', $data);
		
	    /*$aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/view_evento_compra', '', TRUE);
        $this->load->view('main/cliente', array('aside'=> $aside ,
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));*/
													 
		}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
													   
		
	}

	public function pay_mod(){
if($this->session->userdata('id'))
{

$idu = $this->input->post("idu");
$ide = $this->input->post("ide");
$idr = $this->input->post("idr"); 
$flag = $this->input->post("flag");
$arrayflag = explode("-",$flag);
$select= $arrayflag[0];
$check= $arrayflag[1];
settype($select, "integer");
settype($check, "integer");
$index=0;
$modificadores;
$strpost;
$arraypost;
$flag=0;

if($select>0){
   for ($i=0; $i <$select ; $i++) { 
     $strpost = $this->input->post("select-".$i);
     if($strpost=="0")
     	continue;
     else{
     	  $flag=1;
     	  $arraypost = explode("-",$strpost);
          $modificadores[$index]= array("idu"=>$idu,"ide"=>$ide,"idr"=>$idr,"idm"=>$arraypost[0],"precio"=>$arraypost[1],"nombre"=>$arraypost[2]);
           $index++;
     }
   
    }
}



if($check>0){
  
    for ($i=0; $i <$check; $i++) { 
         if(isset($_POST["check-".$i])){
         	$flag=1;
               $strpost = $this->input->post("check-".$i);
               $arraypost = explode("-",$strpost);
               $modificadores[$index]= array("idu"=>$idu,"ide"=>$ide,"idr"=>$idr,"idm"=>$arraypost[0],"precio"=>$arraypost[1],"nombre"=>$arraypost[2]);
                $index++;

         }

         else{
         	continue;
         }
           
    }



}

if($flag!=0){
	$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
    $data["idu"]=$idu;
    $data["ide"]=$ide;
    $data["idr"]=$idr;
    $data["modificadores"] = $modificadores;
    $data['dato_evento']=$this->clientes->get_evento_id($ide);
    $aside = $this->load->view('cliente/header', $data, TRUE);
    $content = $this->load->view('cliente/paymod', '', TRUE);
    $this->load->view('main/cliente', array('aside'=> $aside ,
   'content'=>$content,
   'included_js'=>array('statics/js/libraries/form.js')));
}

else{
	 redirect('/cliente/view_evento_compra/'.$idr.'/'.$ide, 'refresh');
}



}


else{
//redirect('companies');
echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
}




}


public function fichaPagoModExtra(){
   $ticket = $this->input->post("ticket");
   $name="modificadores_ticket".$ticket;  
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
 move_uploaded_file($_FILES["file"]["tmp_name"],'statics/img_fichas/'.$upFile);



  $res = $this->clientes->fichaPagoModExtra('statics/img_fichas/'.$upFile,$ticket);
  if($res==1){
  	 echo("Se ha cargado exitosamente el comprobante d epago. Enseguida será revisado por el administrador");
  }
  else{
  	echo("Ocurrió un erro al subir el comprobante de pago. Intente nuevamente.");
  }


   
}

public function fichaPagoEvento(){
  $idu = $this->input->post("idu");
  $idr = $this->input->post("idr");
  $ide = $this->input->post("ide");

   $name="depositoevento_".$idu."_".$ide."_".$idr;  
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
 move_uploaded_file($_FILES["file"]["tmp_name"],'statics/img_fichas/'.$upFile);



  $res = $this->clientes->fichaPagoEvento('statics/img_fichas/'.$upFile,$idu,$ide,$idr);
  if($res==1){
  	 echo("Se ha cargado exitosamente el comprobante de pago. Enseguida será revisado por el administrador");
  }
  else{
  	echo("Ocurrió un erro al subir el comprobante de pago. Intente nuevamente.");
  }


   
}
	
	
	/*
	* metodo para crear una cuenta de usuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	/*public function completa_datos(){

      if($this->session->userdata('id'))
        {
		
		$data['paises']=$this->Company->get_paises();
		$data['estados']=$this->Company->get_estados();
		$data['ciudades']=$this->clientes->get_ciudades();
		//$data['evento']=$this->clientes->get_evento_id($id_evento);
		
		$data['usuario']=$this->clientes->get_info_user($this->session->userdata('id'));
		
		//$data['modificadores']=$this->clientes->get_modificadores_eventos($id_evento);
		//$data['usuario']=$this->clientes->get_data_user($this->session->userdata('id'));
	   // $aside = $this->load->view('cliente/header', $data, TRUE);
		$content = $this->load->view('cliente/completa_datos', $data, TRUE);
        $this->load->view('main/cliente', array(
                                                       'content'=>$content,
                                                       'included_js'=>array('statics/js/libraries/form.js')));
		}
        else{
            redirect('companies');
        }											   
		
													   
		
	}*/
	
	/*
	* metodo para editar un cliente.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function editar_user($id_user){
		 if($this->session->userdata('id'))
        {	
			$data = $this->input->post('user');
			$this->clientes->edita_usuario($id_user,$data);
			
			redirect('cliente');
			}
        else{
            //redirect('companies');
			echo '<script>window.location = "http://www.conexionmexico.com.mx/"</script>';
        }
		
	}
	
	/*
	* metodo para guardar un un evento.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function save_evento_usuario(){
		$data = $this->input->post('evento');
		//print_r($data['modificador']);
		
		//echo $data['evento'];
		
		$ciuda=explode("--",$data['evento']);
		$nombre_ciudad=$ciuda[1];
		$precio_ciudad=$ciuda[0];
		
		$tamano1=sizeof($data['modificador']);
		//echo $tamano1;
		//$nam1=explode("--",$data['modificador']);
		
							
								for($i=0;$i<$tamano1;$i++):
								$arr=$data['modificador'][$i];
									$nam1=explode("--",$arr);
									//echo $nam1[0].'-'.$nam1[1].'-'.$nam1[2].'/';
									
									
									
								endfor;
								
								
								
		
		
		
	}

	
	/*Inicio de functiones creadas por Daniel Alejandro Chávez Vázquez*/

	public function getServiciosCuarto(){
	   $result;
	   $idcuarto = $this->input->post("idcu");
	   $idcasa = $this->input->post("idca");
	   $result=$this->clientes->getServiciosCuarto($idcuarto,$idcasa);
	   if(!is_array($result)){
	      $result[0]= array("nombre"=>"-1");
	    }


	   echo(json_encode($result));

    
}

public function saveTrans(){
	$result;
	$aereo = $this->input->post("aereo");
	$vuelo = $this->input->post("vuelo");
	$date = $this->input->post("date");
	$hour = $this->input->post("hour");
	$city = $this->input->post("city");
	$personas = $this->input->post("personas");
    $user = $this->input->post("user");
    $aux = explode("/", $date);
    $fecha = $aux[2]."-".$aux[0]."-".$aux[1];
    $res=$this->clientes->saveTrans($aereo,$vuelo,$fecha,$hour,$city,$personas,$user);
    $result[0]= array("res"=>$res);

   
     echo(json_encode($result));
	 
	 
	 
	  $user=$this->clientes->get_info_user($this->session->userdata('id'));
	 
	 
	  $this->load->library('email');
	   $config['mailtype'] = 'html';
	   $config['charset'] = 'utf-8';
	   $this->email->initialize($config);											   
	
	   //SEND THE EMAIL
		$this->email->from('jalomo@hotmail.es', 'TRASPORTE CONEXION');
		$this->email->to($user->usuarioEmail);
		$this->email->subject('TRASPORTE');
		$this->email->message('Tu solicitud está siendo procesada, nos comunicamos contigo en las próximas 24 horas.');
		$this->email->send();
		// echo $this->email->print_debugger();
		$this->email->clear();
		
		
		
		
		$html='Aerolinea:'.$aereo.'<br/>'.
			  'Vuelo:'.$vuelo.'<br/>'.
			  'Fecha de llegada:'.$date.'<br/>'.
			  'Ciudad de Origen:'.$city.'<br/>'.
			  'Personas:'.$personas.'<br/>'.
			  'Usuario:'.$user->usuarioNombre.'<br/>'.
			  'Telefono:'.$user->usuarioTelefonno.'<br/>'.
			  'Email:'.$user->usuarioEmail;
		 //SEND THE EMAIL
		$this->email->from('jalomo@hotmail.es', 'TRASPORTE-nuevaso licitud');
		$this->email->to('jalomo@hotmail.es');
		$this->email->subject('TRASPORTE-nuevaso licitud');
		$this->email->message($html);
		$this->email->send();
		// echo $this->email->print_debugger();
		$this->email->clear();
	 



}

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
   header('Content-Type: text/html; charset=UTF-8'); 
	 if($idr!="" && $ide!="" && $codigo!=""){
      $data["dataBoleto"] =$this->clientes->getDataBoleto($ide);
      $data["dataEvento"] =$this->clientes->getDataEvento($ide,$this->session->userdata('id'));
      $data["codigo"] = $codigo;
      $data["modificadores"] = $this->clientes->getModificadoresBoleto($this->session->userdata('id'),$ide,$idr);
      $data["nameUser"]= $this->clientes->getNameUser($this->session->userdata('id'));
      $this->load->library('pdf');
      $pdf = $this->pdf->load();
      $html = $this->load->view('boleto_pdf', $data, true);
      $pdf->WriteHTML($html); // write the HTML into the PDF
      $pdf->Output();
    

     

	}

        
	

}



	/* Fin de funciones creadas por Daniel Alejandro Chávez Vázquez */
	
	
	/*
	* metodo para pagar un curato por paypal.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function pagar_cuarto(){

		
	
		
		$config['business'] 			='lieriusg.1a@gmail.com';// 'lieriusg.1a@gmail.com';
		$config['cpp_header_image'] 	= ''; //Image header url [750 pixels wide by 90 pixels high]
		$config['return'] 				= base_url().'index.php/cliente/notify_payment_cuarto/'; 
		$config['cancel_return'] 		= base_url().'index.php/cliente/cancel_payment_cuarto/';
		$config['notify_url'] 			= base_url().'index.php/cliente/ipn_cuarto/';//'process_payment.php'; //IPN Post
		$config['production'] 			= FALSE; //Its false by default and will use sandbox
		$config["invoice"]				= random_string('numeric',8); //The invoice id
		
		$this->load->library('paypal',$config);
		
		
				$this->paypal->add($servicio,$costo);
				
		
		
		#$this->paypal->add(<name>,<price>,<quantity>[Default 1],<code>[Optional]);
		
		/*$this->paypal->add('5 Clases especializadas Aloa
							5 Hrs de Clases de Fabricante
							Entrada al Showroom
							Entrada al Cocktail de Bienvenida
							2 Coffee break diarios
							Comida los días 7 y 8 de Marzo.',2750.00);*/ //First item
		//$this->paypal->add('Pants',40); 	  //Second item
		///$this->paypal->add('Blowse',10,10,'B-199-26'); //Third item with code
		
		$this->paypal->pay(); //Proccess the payment

	}
	
	
	public function ipn_cuarto($id)
    {
       $datos=$this->input->post();
	   
	   $payment['paymentIdUser']=$id;
	   $payment['paymentFechaCreacion']=date('Y-m-d');
	   $payment['payment_gross']=$datos['payment_gross'];
	   $payment['payment_date']=$datos['payment_date'];
	   $payment['payer_email']=$datos['payer_email'];
	   $payment['txn_id']=$datos['txn_id'];
	   $payment['verify_sign']=$datos['verify_sign'];
	   $payment['payer_id']=$datos['payer_id'];
	   $idpay=$this->clientes->save_table($payment,'payment');
	   
	   
	   $user=$this->clientes->get_info_user($id);
	   
	   $this->load->library('email');
	   $config['mailtype'] = 'html';
	   $config['charset'] = 'utf-8';
	   $this->email->initialize($config);											   
	
	   //SEND THE EMAIL
		$this->email->from('jalomo@hotmail.es', 'PAGO CONEXION');
		$this->email->to($user->usuarioEmail);
		$this->email->subject('Pago de cuarto');
		$this->email->message('Tu cuarto ha sido pagado ');
		$this->email->send();
		// echo $this->email->print_debugger();
		$this->email->clear();
	   
		
    }
	
	/*
	* metodo para cuando el usuario cancela al momento de pagar un cuarto.
	* autir: jalomo <jalomo@hotmail.es>
	*/
	public function cancel_payment_cuarto($id){
		//$this->Company->updata_status($id,6);
			
			redirect('cliente/eventos');
			
			
			//redirect('cliente');
	}
	
	public function notify_payment_cuarto(){

		/*$received_data = print_r($this->input->post(),TRUE);

		echo "<pre>".$received_data."</pre>";
		
		
		$this->clientes->updata_status(1707);
		
		echo $this->session->userdata('id');
		//redirect('companies/confirmacion_paypal');
			*/
		redirect('cliente/');
		
		//echo "pago realizado con exito";
		//redirect('cliente');
	}
	
	
	/*
	* metodo para validar un email delusuario.
	* autor: jalomo <jalomo@hotmail.es>
	*/
	public function  validate_email_user(){
		$email = $this->input->post("email");
		$res=$this->clientes->valida_email($email);	
		echo $res;
	}
}

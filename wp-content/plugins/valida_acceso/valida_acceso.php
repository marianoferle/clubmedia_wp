<?php
/**
 * @package Bennu
 * @version 1.1.0
 */
/*
Plugin Name: Validacion de Acceso
Plugin URI: http://bennu.tv
Author: Pablo Mussari, Alejandro Porte
Description: Valida la cookie de navegacion del usuario para permitir el acceso al portal o dirigir a landing.
Version: 1.1.0
Author URI: http://bennu.tv
*/

// test.sosmujer.tv
// Agregar en el Footer del THEME < ?php wp_footer(); ? >
// Agregar portales a reCaptcha de Google (produccion y testeo)

class ValidacionNavegacion {

	const KEY = 'krt';

	private $habilitado = false;
	private $isMobile = null;
	private $tipo_app = null;

	// Se asignan en "Ajustes->Acceso Portal" del panel admin
	private $cantidad_visitas;
	private $cookie_name;
	private $id_servicio;
	private $nombre_portal;
	private $carpeta;
	private $url_portal;
	private $url_app_ios;
	private $url_app_android;

	public function __construct() {
		add_action( 'admin_menu', array($this,'administracion_plugin') );
		add_action( 'admin_init', array($this,'registra_variables') );
																																								// Valores de ejemplo para portal SOSMujer
		$this->cantidad_visitas = get_option('valida_acceso_cant_visitas'); 				// 3
    $this->cookie_name = get_option('valida_acceso_nombre_cookie_visitante'); 	// 'control_acceso'
 	  $this->id_servicio = get_option('valida_acceso_id_servicio'); 							// 51
 	  $this->nombre_portal = get_option('valida_acceso_nombre_portal'); 					// 'SosMujerPortal'
 	  $this->carpeta = get_option('valida_acceso_nombre_carpeta'); 								// 'sosmujer'
 	  $this->url_portal = get_option('valida_acceso_nombre_url_portal'); 					// 'test.wordpress.site'
 	  $this->url_app_ios = get_option('valida_acceso_nombre_url_app_ios'); 				// 'www.itunes.com/test'
		$this->url_app_android = get_option('valida_acceso_nombre_url_app_android'); 		// 'www.google.com/play'

		$this->es_movil();

		if($this->tiene_cookie_habilitado()){
			return;
		} elseif ($this->tieneLlave()){
			$this->habilita_cookie_suscripto();
			return;
		} elseif ($this->isMobile && !$this->es_wifi()){
			header('Location: http://wap.bennu.tv/eventos/landing_portal.php?id_servicio='.$this->id_servicio.'&callback='.$this->url_portal);
		  die();
		} else {
			$this->dar_acceso_limitado();
		}
  }

	function dar_acceso_limitado(){
		add_action( 'template_redirect', array($this,'valida_navegacion') );
		add_action( 'wp_enqueue_scripts', array($this,'bloqueo_sitio') );
	}

	function bloqueo_sitio(){
		if (is_user_logged_in())return;
		if (!$this->habilitado){
			add_action( 'wp_footer', array($this,'cubierta_pin') );
			wp_enqueue_style('valida_style', plugins_url() . '/valida_acceso/css/'.$this->carpeta.'/style.css');
			wp_enqueue_script('recaptcha_script', 'https://www.google.com/recaptcha/api.js', array(), '1.0.0', true);
			wp_enqueue_script('valida_script', plugins_url() . '/valida_acceso/js/'.$this->carpeta.'/script.js', array(), '1.0.0', true);
		}
	}

	function es_movil(){
		require_once("Mobile_Detect.php");
		$detect = new Mobile_Detect();
		if( $detect->isMobile() ){
			$this->isMobile = true;
			if ($detect->isiOS()) $this->tipo_app = 'ios';
			if ($detect->isAndroidOS()) $this->tipo_app = 'android';
			return true;
		}else{
			$this->isMobile = false;
			return false;
		}
	}

	function es_wifi(){
		if (isset($_COOKIE['CookieWIFI'])){
			return true;
		} elseif(array_key_exists('landing_portal', $_REQUEST)){
				if ($_REQUEST['landing_portal'] == 'wifi') {
					setcookie('CookieWIFI', time() , time()+3600, '/');
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
	}

	function tiene_cookie_habilitado(){
		return isset($_COOKIE[$this->nombre_portal]);
	}

	public function habilita_cookie_suscripto(){
		return setcookie($this->nombre_portal, time() , time()+3600, '/');
	}

	function tieneLlave(){
		if( array_key_exists(self::KEY,$_REQUEST) ){
			$time = substr($_REQUEST[self::KEY],0,10);
			$servicio = substr($_REQUEST[self::KEY],10);
			if( time() - $time < 300 && $servicio == $this->id_servicio){
				return true;
			}
		}
		return false;
	}

	function cubierta_pin(){
		echo file_get_contents(plugins_url() . '/valida_acceso/html/'.$this->carpeta.'/codigo.html');
		echo '<input type="hidden" id="id_servicio" value="'. $this->id_servicio .'">';
		echo '<input type="hidden" id="tarifa1" value="'. get_option('valida_acceso_nombre_tarifa1') .'">';
		echo '<input type="hidden" id="tarifa2" value="'. get_option('valida_acceso_nombre_tarifa2') .'">';
		echo '<input type="hidden" id="tarifa3" value="'. get_option('valida_acceso_nombre_tarifa3') .'">';
		if ($this->isMobile){
			if($this->tipo_app == 'ios' && $this->url_app_ios != ""){
				echo '<input type="hidden" id="urlApp" value="'. $this->url_app_ios .'">';
			} elseif($this->tipo_app == 'android' && $this->url_app_android != ""){
				echo '<input type="hidden" id="urlApp" value="'. $this->url_app_android .'">';
			}
		}
	}

	function valida_navegacion(){
		if (is_user_logged_in())return;
		if ($this->get_visitas() < $this->cantidad_visitas){
			if (is_singular()){
				$this->actualiza_cookie();
			}
			$this->habilitado = true;
			return;
		} else {
			$this->inhabilitado();
		}
	}

	function inhabilitado(){
		$this->habilitado = false;
	}

	function actualiza_cookie(){
		$cookie = $this->get_visitas();
		setcookie($this->cookie_name,++$cookie,time() + (10 * 365 * 24 * 60 * 60),'/');
	}

	function get_visitas(){
		if (array_key_exists($this->cookie_name,$_COOKIE)){
			if (isset($_COOKIE[$this->cookie_name])){
				return $_COOKIE[$this->cookie_name];
			}
		}
		$this->habilita_cookie_visitante();
		return 0;
	}

	function habilita_cookie_visitante(){
		setcookie($this->cookie_name,0,time() + (10 * 365 * 24 * 60 * 60),'/');
	}

function administracion_plugin() {
	add_options_page( 'Valida Acceso del Portal', 'Acceso Portal', 'manage_options', 'menu_valida_acceso', array($this,'opciones_plugin') );
}

function registra_variables(){
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_id_servicio' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_cant_visitas' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_cookie_visitante' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_portal' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_carpeta' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_url_portal' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_tarifa1' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_tarifa2' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_tarifa3' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_url_app_ios' );
	register_setting( 'grupo_opciones_valida_acceso', 'valida_acceso_nombre_url_app_android' );
}

function setDatos(){
	echo "SET DATOS";
	if ( isset($_POST['Guardar'] ) ){
		echo "OK";
	}
}

function opciones_plugin() {
	// if ( !current_user_can( 'manage_options' ) )  {
	// 	wp_die( __( 'Esta sección está habilitada sólo para administradores del portal.' ) );
	// }
	?>
    <div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
				<form method="post" action="options.php">
				    <?php settings_fields( 'grupo_opciones_valida_acceso' ); ?>
				    <?php do_settings_sections( 'grupo_opciones_valida_acceso' ); ?>
				    <table class="form-table">

							<tr valign="top">
								<th scope="row">Nombre Portal</th>
								<td>
									<select id="nombre_servicio" name="valida_acceso_nombre_portal" onchange="actualizaServicio();">
											<option value="PinkcrushPortal" <?php if (get_option('valida_acceso_nombre_portal') == "PinkcrushPortal") echo "selected"; ?>>PinkcrushPortal</option>
											<option value="SosMujerPortal" <?php if (get_option('valida_acceso_nombre_portal') == "SosMujerPortal") echo "selected"; ?>>SosMujerPortal</option>
											<option value="BizarroPortal" <?php if (get_option('valida_acceso_nombre_portal') == "BizarroPortal") echo "selected"; ?>>BizarroPortal</option>
											<option value="RecopadoPortal" <?php if (get_option('valida_acceso_nombre_portal') == "RecopadoPortal") echo "selected"; ?>>RecopadoPortal</option>
											<option value="VecinitasPortal" <?php if (get_option('valida_acceso_nombre_portal') == "VecinitasPortal") echo "selected"; ?>>VecinitasPortal</option>
											<option value="PlayboyPortal" <?php if (get_option('valida_acceso_nombre_portal') == "PlayboyPortal") echo "selected"; ?>>PlayboyPortal</option>
											<option value="VenusPortal" <?php if (get_option('valida_acceso_nombre_portal') == "VenusPortal") echo "selected"; ?>>VenusPortal</option>
											<option value="FormanPortal" <?php if (get_option('valida_acceso_nombre_portal') == "FormanPortal") echo "selected"; ?>>FormanPortal</option>
											<option value="PenthousePortal" <?php if (get_option('valida_acceso_nombre_portal') == "PenthousePortal") echo "selected"; ?>>PenthousePortal</option>
											<option value="SerPositivoPortal" <?php if (get_option('valida_acceso_nombre_portal') == "SerPositivoPortal") echo "selected"; ?>>SerPositivoPortal</option>
											<option value="SosMujerDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "SosMujerDiarioPortal") echo "selected"; ?>>SosMujerDiarioPortal</option>
											<option value="ClubBizarroDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubBizarroDiarioPortal") echo "selected"; ?>>ClubBizarroDiarioPortal</option>
											<option value="ClubPenthouseDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubPenthouseDiarioPortal") echo "selected"; ?>>ClubPenthouseDiarioPortal</option>
											<option value="ClubFormanDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubFormanDiarioPortal") echo "selected"; ?>>ClubFormanDiarioPortal</option>
											<option value="ClubVenusDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubVenusDiarioPortal") echo "selected"; ?>>ClubVenusDiarioPortal</option>
											<option value="ClubPlayboyDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubPlayboyDiarioPortal") echo "selected"; ?>>ClubPlayboyDiarioPortal</option>
											<option value="PinkCrushDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "PinkCrushDiarioPortal") echo "selected"; ?>>PinkCrushDiarioPortal</option>
											<option value="ClubRecopadoDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubRecopadoDiarioPortal") echo "selected"; ?>>ClubRecopadoDiarioPortal</option>
											<option value="ClubVecinitasDiarioPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClubVecinitasDiarioPortal") echo "selected"; ?>>ClubVecinitasDiarioPortal</option>
											<option value="SignoYaPortal" <?php if (get_option('valida_acceso_nombre_portal') == "SignoYaPortal") echo "selected"; ?>>SignoYaPortal</option>
											<option value="EpaPortal" <?php if (get_option('valida_acceso_nombre_portal') == "EpaPortal") echo "selected"; ?>>EpaPortal</option>
											<option value="FitnessPortal" <?php if (get_option('valida_acceso_nombre_portal') == "FitnessPortal") echo "selected"; ?>>FitnessPortal</option>
											<option value="ChatPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ChatPortal") echo "selected"; ?>>ChatPortal</option>
											<option value="AtrevidaPortal" <?php if (get_option('valida_acceso_nombre_portal') == "AtrevidaPortal") echo "selected"; ?>>AtrevidaPortal</option>
											<option value="TropicalisimaPortal" <?php if (get_option('valida_acceso_nombre_portal') == "TropicalisimaPortal") echo "selected"; ?>>TropicalisimaPortal</option>
											<option value="MusicaPortal" <?php if (get_option('valida_acceso_nombre_portal') == "MusicaPortal") echo "selected"; ?>>MusicaPortal</option>
											<option value="SoyFunPortal" <?php if (get_option('valida_acceso_nombre_portal') == "SoyFunPortal") echo "selected"; ?>>SoyFunPortal</option>
											<option value="ClanMacabroPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ClanMacabroPortal") echo "selected"; ?>>ClanMacabroPortal</option>
											<option value="SosRecetasPortal" <?php if (get_option('valida_acceso_nombre_portal') == "SosRecetasPortal") echo "selected"; ?>>SosRecetasPortal</option>
											<option value="ElArteDeVivirPortal" <?php if (get_option('valida_acceso_nombre_portal') == "ElArteDeVivirPortal") echo "selected"; ?>>ElArteDeVivirPortal</option>
											<option value="EpaNewsPortal" <?php if (get_option('valida_acceso_nombre_portal') == "EpaNewsPortal") echo "selected"; ?>>EpaNewsPortal</option>
									</select>
								</td>
							</tr>

								<tr valign="top">
								<th scope="row">ID Servicio</th>
								<td><input type="text" id="opcionIdServicio" name="valida_acceso_id_servicio" value="<?php echo esc_attr( get_option('valida_acceso_id_servicio') ); ?>"/> El ID del Portal (se asigna automáticamente.)</td>
								</tr>

								<tr valign="top">
								<th scope="row">Cantidad de Lecturas Permitidas</th>
								<td><input type="text" name="valida_acceso_cant_visitas" value="<?php echo esc_attr( get_option('valida_acceso_cant_visitas') ); ?>" /> Cantidad de lecturas permitidas.</td>
								</tr>

								<tr valign="top">
								<th scope="row">Nombre Cookie Visitante</th>
								<td><input type="text" name="valida_acceso_nombre_cookie_visitante" value="<?php echo esc_attr( get_option('valida_acceso_nombre_cookie_visitante') ); ?>" /> Dar un nombre diferente para cada portal.</td>
								</tr>

								<tr valign="top">
								<th scope="row">Nombre Carpeta</th>
								<td>
									<select id="nombre_servicio" name="valida_acceso_nombre_carpeta">
											<option value="generico" <?php if (get_option('valida_acceso_nombre_carpeta') == "generico") echo "selected"; ?>>generico</option>
											<option value="sosmujer" <?php if (get_option('valida_acceso_nombre_carpeta') == "sosmujer") echo "selected"; ?>>sosmujer</option>
											<option value="sosrecetas" <?php if (get_option('valida_acceso_nombre_carpeta') == "sosrecetas") echo "selected"; ?>>sosrecetas</option>
											<option value="serpositivo" <?php if (get_option('valida_acceso_nombre_carpeta') == "serpositivo") echo "selected"; ?>>serpositivo</option>
											<option value="epaclub" <?php if (get_option('valida_acceso_nombre_carpeta') == "epaclub") echo "selected"; ?>>epaclub</option>
											<option value="epanews" <?php if (get_option('valida_acceso_nombre_carpeta') == "epanews") echo "selected"; ?>>epanews</option>
											<option value="soyfun" <?php if (get_option('valida_acceso_nombre_carpeta') == "soyfun") echo "selected"; ?>>soyfun</option>
									</select>
									Carpeta donde se encuentra el diseño del bloqueo. Si no hay diseño seleccionar "generico".
							  </td>
								</tr>

								<tr valign="top">
								<th scope="row">URL Portal</th>
								<td>http://www.<input type="text" name="valida_acceso_nombre_url_portal" value="<?php echo esc_attr( get_option('valida_acceso_nombre_url_portal') ); ?>" />/</td>
								</tr>

								<tr valign="top">
									<th scope="row">Tarifa Personal</th>
									<td><input type="text" name="valida_acceso_nombre_tarifa3" value="<?php echo esc_attr( get_option('valida_acceso_nombre_tarifa3') ); ?>" /> Ej. $ 14,5</td>
								</tr>

								<tr valign="top">
									<th scope="row">Tarifa Movistar</th>
									<td><input type="text" name="valida_acceso_nombre_tarifa2" value="<?php echo esc_attr( get_option('valida_acceso_nombre_tarifa2') ); ?>" /> Ej. $ 15</td>
								</tr>

								<tr valign="top">
								<th scope="row">Tarifa Claro</th>
								<td><input type="text" name="valida_acceso_nombre_tarifa1" value="<?php echo esc_attr( get_option('valida_acceso_nombre_tarifa1') ); ?>" /> Ej. $ 15</td>
								</tr>

								<tr valign="top">
								<th scope="row">URL App iOS</th>
								<td><input type="text" name="valida_acceso_nombre_url_app_ios" value="<?php echo esc_attr( get_option('valida_acceso_nombre_url_app_ios') ); ?>" /> (opcional) URL completa como aparece en el navegador.</td>
								</tr>

								<tr valign="top">
								<th scope="row">URL App Android</th>
								<td><input type="text" name="valida_acceso_nombre_url_app_android" value="<?php echo esc_attr( get_option('valida_acceso_nombre_url_app_android') ); ?>" /> (opcional) URL completa como aparece en el navegador.</td>
								</tr>

				    </table>

				    <?php submit_button('Guardar'); ?>

				</form>
				<script>
				function actualizaServicio(){
					var nombreServicio = document.getElementById('nombre_servicio').value;
					switch (nombreServicio) {
						case 'PinkcrushPortal':
							document.getElementById('opcionIdServicio').value = 69;
						break;
						case 'SosMujerPortal':
							document.getElementById('opcionIdServicio').value = 51;
						break;
						case 'BizarroPortal':
							document.getElementById('opcionIdServicio').value = 52;
						break;
						case 'RecopadoPortal':
							document.getElementById('opcionIdServicio').value = 55;
						break;
						case 'VecinitasPortal':
							document.getElementById('opcionIdServicio').value = 49;
						break;
						case 'PlayboyPortal':
							document.getElementById('opcionIdServicio').value = 56;
						break;
						case 'VenusPortal':
							document.getElementById('opcionIdServicio').value = 57;
						break;
						case 'FormanPortal':
							document.getElementById('opcionIdServicio').value = 58;
						break;
						case 'PenthousePortal':
							document.getElementById('opcionIdServicio').value = 59;
						break;
						case 'SerPositivoPortal':
							document.getElementById('opcionIdServicio').value = 118;
						break;
						case 'SosMujerDiarioPortal':
							document.getElementById('opcionIdServicio').value = 121;
						break;
						case 'ClubBizarroDiarioPortal':
							document.getElementById('opcionIdServicio').value = 122;
						break;
						case 'ClubPenthouseDiarioPortal':
							document.getElementById('opcionIdServicio').value = 123;
						break;
						case 'ClubFormanDiarioPortal':
							document.getElementById('opcionIdServicio').value = 124;
						break;
						case 'ClubVenusDiarioPortal':
							document.getElementById('opcionIdServicio').value = 125;
						break;
						case 'ClubPlayboyDiarioPortal':
							document.getElementById('opcionIdServicio').value = 126;
						break;
						case 'PinkCrushDiarioPortal':
							document.getElementById('opcionIdServicio').value = 127;
						break;
						case 'ClubRecopadoDiarioPortal':
							document.getElementById('opcionIdServicio').value = 128;
						break;
						case 'ClubVecinitasDiarioPortal':
							document.getElementById('opcionIdServicio').value = 129;
						break;
						case 'SignoYaPortal':
							document.getElementById('opcionIdServicio').value = 130;
						break;
						case 'EpaPortal':
							document.getElementById('opcionIdServicio').value = 131;
						break;
						case 'FitnessPortal':
							document.getElementById('opcionIdServicio').value = 133;
						break;
						case 'ChatPortal':
							document.getElementById('opcionIdServicio').value = 135;
						break;
						case 'AtrevidaPortal':
							document.getElementById('opcionIdServicio').value = 137;
						break;
						case 'TropicalisimaPortal':
							document.getElementById('opcionIdServicio').value = 138;
						break;
						case 'MusicaPortal':
							document.getElementById('opcionIdServicio').value = 145;
						break;
						case 'SoyFunPortal':
							document.getElementById('opcionIdServicio').value = 146;
						break;
						case 'ClanMacabroPortal':
							document.getElementById('opcionIdServicio').value = 148;
						break;
						case 'SosRecetasPortal':
							document.getElementById('opcionIdServicio').value = 150;
						break;
						case 'ElArteDeVivirPortal':
							document.getElementById('opcionIdServicio').value = 159;
						break;
						case 'EpaNewsPortal':
							document.getElementById('opcionIdServicio').value = 160;
						break;

					}

				}
				</script>
    </div>
    <?php
	}

}

$vn = new ValidacionNavegacion();

add_action( 'wp_ajax_nopriv_validate_captcha_ajax', 'validate_captcha_ajax' );
// add_action( 'wp_ajax_validate_captcha_ajax', 'validate_captcha_ajax' ); // Acceso al ajax desde el panel de control

function validate_captcha_ajax() {

	$response = $_REQUEST['response'];
	$secret = $_REQUEST['secret'];

	$params=['response'=>$response, 'secret'=>$secret];
	$defaults = array(
		CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => http_build_query($params),
    CURLOPT_RETURNTRANSFER => true
	);
	$ch = curl_init();
	curl_setopt_array($ch, $defaults);
	$response  = curl_exec($ch);
	curl_close($ch);

	echo $response;
	wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_nopriv_get_pincode_ajax', 'get_pincode_ajax' );
// add_action( 'wp_ajax_get_pincode_ajax', 'get_pincode_ajax' ); // Acceso al ajax desde el panel de control

function get_pincode_ajax() {

	$id_servicio = $_REQUEST['id_servicio'];
	$id_operadora = $_REQUEST['id_operadora'];
	$msisdn = $_REQUEST['msisdn'];

	$params=['id_servicio'=>$id_servicio, 'id_operadora'=>$id_operadora, 'msisdn'=>$msisdn];
	$defaults = array(
		CURLOPT_URL => 'http://wap.bennu.tv/eventos/pincode.php',
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => http_build_query($params),
    CURLOPT_RETURNTRANSFER => true
	);
	$ch = curl_init();
	curl_setopt_array($ch, $defaults);
	$response  = curl_exec($ch);
	curl_close($ch);
	$response = json_decode($response);
	if(array_key_exists('suscripto',$response)){
		$nombre = get_option('valida_acceso_nombre_portal');
		setcookie(get_option('valida_acceso_nombre_portal'), time() , time()+604800, '/'); // Coloca o actualiza Cookie Suscripto
	}
	echo json_encode($response);
	wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_nopriv_validate_pincode_ajax', 'validate_pincode_ajax' );
// add_action( 'wp_ajax_validate_pincode_ajax', 'validate_pincode_ajax' ); // Acceso al ajax desde el panel de control

function validate_pincode_ajax() {

	$id_servicio = $_REQUEST['id_servicio'];
	$id_operadora = $_REQUEST['id_operadora'];
	$msisdn = $_REQUEST['msisdn'];
	$pincode = $_REQUEST['pincode'];

	$params=['id_servicio'=>$id_servicio, 'id_operadora'=>$id_operadora, 'msisdn'=>$msisdn, 'pincode'=>$pincode];
	$defaults = array(
		CURLOPT_URL => 'http://wap.bennu.tv/eventos/alta-web-pincode.php',
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => http_build_query($params),
    CURLOPT_RETURNTRANSFER => true
	);
	$ch = curl_init();
	curl_setopt_array($ch, $defaults);
	$response  = curl_exec($ch);
	curl_close($ch);
	$response = json_decode($response);
	if(array_key_exists('suscripto',$response)){
		setcookie(get_option('valida_acceso_nombre_portal'), time() , time()+604800, '/'); // Coloca o actualiza Cookie Suscripto
	}
	echo json_encode($response);
	wp_die(); // this is required to terminate immediately and return a proper response
}

?>

<?php

//require __DIR__ . '/include/restApi/lib.php';
require_once(dirname(__FILE__) . "/include/restApi/lib.php");





//--------------------------------------------
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



//---------------------------------------
add_theme_support( 'post-thumbnails' );






if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_autores',
		'title' => 'Autores',
		'fields' => array (
			array (
				'key' => 'field_583446f776c5a',
				'label' => 'autores',
				'name' => 'autores',
				'type' => 'checkbox',
				'instructions' => 'Seleccion de los autores para el post',
				'choices' => array (
					'acidomc' => 'Ácido MC',
					'alejoigoa' => 'Alejo Igoa',
					'alexby' => 'AlexBy',
					'annlook' => 'Ann Look',
					'aventurassofia' => 'Las aventuras de Sofía',
					'azumakeup' => 'Azu Makeup',
					'balentina' => 'Balentina Villagra',
					'briefr9' => 'Briefr9',
					'celopan' => 'Celopan',
					'cheeto' => 'Sr. Cheeto',
					'chinocastro' => 'Chino Castro',
					'chodis' => 'Chodis',
					'daihernandez' => 'Daiana Hernández',
					'davidmontoya' => 'David Montoya',
					'dimenacho' => 'Dime Nacho',
					'drkrapula' => 'Dr Krápula',
					'dross' => 'Dross',
					'dustin' => 'Dustin Luke',
					'eccentrico' => 'Eccéntrico',
					'elchuiucal' => 'El Chuiucal',
					'elvisa' => 'Elvisa',
					'fernanfloo' => 'Fernanfloo',
					'freakout' => 'Freak Out',
					'giggsymakeup' => 'Giggsy Makeup',
					'giovillalba' => 'Gio Villalba',
					'gonzafonseca' => 'Gonza Fonseca',
					'guidomoran' => 'Guido Morán',
					'ignaciobuiatti' => 'Ignacio Buiatti',
					'ilonqueen' => 'Ilonqueen',
					'internautismo' => 'Internautismo Crónico',
					'iviween' => 'Iviween',
					'jeloz' => 'Jeloz',
					'julianero' => 'Julianero',
					'julianserrano' => 'Julián Serrano',
					'kevsho' => 'Kevsho',
					'kikanieto' => 'Kika Nieto',
					'kikaysantamadre' => 'Kika & Santamadre',
					'kion' => 'Kion anda suelto',
					'kronno' => 'Kronno Zomber',
					'lana' => 'Lana',
					'laurasanchez' => 'Laura Sánchez',
					'lismoreno' => 'Lis Moreno',
					'lookingup' => 'Looking Up',
					'luciapm' => 'Lucía PM',
					'luisitorey' => 'Luisito Rey',
					'luzu' => 'Luzu',
					'magnus' => 'Magnus Mefisto',
					'mangel' => 'Mangel',
					'mariacadepe' => 'María Cadepe',
					'martinalapeligrosa' => 'Martina La Peligrosa',
					'mox' => 'Mox',
					'nicoarrieta' => 'Nico Arrieta',
					'nitanzorron' => 'Nitan Zorrón',
					'olliegamer' => 'Olliegamer',
					'orni' => 'Orni',
					'primantes' => 'Primantes',
					'random' => 'Random',
					'rubius' => 'elRubiusOMG',
					'rushsmith' => 'Rush Smith',
					'staxx' => 'StaXx',
					'tattoxtreme' => 'Tattoxtreme',
					'vardoc' => 'Vardoc',
					'vedito' => 'Vedito',
					'vegetta' => 'Vegetta777',
					'werevertumorro' => 'Werevertumorro',
					'willyrex' => 'Willyrex',
					'xoda' => 'Xoda',
					'yaninasantamadre' => 'Yanina Santamadre',
					'yellowmellow' => 'Yellow Mellow',
					'yoana' => 'Yoana Marlén Style',
					'zarcort' => 'Zarcort',
					'zeus' => 'Zeus Santorini',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_subtit',
		'title' => 'SubTit',
		'fields' => array (
			array (
				'key' => 'field_58345f0e24129',
				'label' => 'Subtit',
				'name' => 'subtit',
				'type' => 'text',
				'instructions' => 'Subtitulo del post',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
	register_field_group(array (
		'id' => 'acf_mas-info',
		'title' => 'mas info',
		'fields' => array (
			array (
				'key' => 'field_58345f51e4b40',
				'label' => 'masinfo',
				'name' => 'masinfo',
				'type' => 'textarea',
				'instructions' => 'Mas información para el post',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 4,
	));
	register_field_group(array (
		'id' => 'acf_url-video',
		'title' => 'url video',
		'fields' => array (
			array (
				'key' => 'field_58346060517d6',
				'label' => 'url_video',
				'name' => 'url_video',
				'type' => 'text',
				'instructions' => ' VIMEO --> https://vimeo.com/		190104700	<----- id de url video',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));
	register_field_group(array (
		'id' => 'acf_url-image-video',
		'title' => 'Url Image Video',
		'fields' => array (
			array (
				'key' => 'field_583460db2f041',
				'label' => 'url img video',
				'name' => 'url_img_video',
				'type' => 'text',
				'instructions' => 'nombre de la imagen subida al server Amazon S3 para el post --> ej:	alejo-desafio.JPG',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 6,
	));
	register_field_group(array (
		'id' => 'acf_categorias',
		'title' => 'categorias',
		'fields' => array (
			array (
				'key' => 'field_583461bf0d6c9',
				'label' => 'categorias',
				'name' => 'categorias',
				'type' => 'checkbox',
				'instructions' => 'Categorias para el post',
				'choices' => array (
					'clubmediafest' => 'Club Media Fest',
					'humor' => 'Humor',
					'musica' => 'Música',
					'belleza' => 'Belleza',
					'lifestyle' => 'Lifestyle',
					'gamers' => 'Gamers',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_583463134443d',
				'label' => 'sub categorias clubmediafest',
				'name' => 'sub_categorias_clubmediafest',
				'type' => 'checkbox',
				'instructions' => 'sub categorias para club media fest',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_583461bf0d6c9',
							'operator' => '==',
							'value' => 'clubmediafest',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'entrevistas' => 'entrevistas',
					'backstage' => 'backstage',
					'argentina_abril_2015' => 'argentina_abril_2015',
					'chile_octubre_2015' => 'chile_octubre_2015',
					'argentina_octubre_2015' => 'argentina_octubre_2015',
					'perú_noviembre_2016' => 'perú_noviembre_2016',
					'chile_noviembre_2016' => 'chile_noviembre_2016',
					'argentina_diciembre_2016' => 'argentina_diciembre_2016',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_583463d225365',
				'label' => 'sub categorias humor',
				'name' => 'sub_categorias_humor',
				'type' => 'checkbox',
				'instructions' => 'sub categorias para humor',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_583461bf0d6c9',
							'operator' => '==',
							'value' => 'humor',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'bloopers' => 'bloopers',
					'fails' => 'fails',
					'bizarro' => 'bizarro',
					'sketch' => 'sketch',
					'vines' => 'vines',
					'parodias' => 'parodias',
					'chistes' => 'chistes',
					'standUp' => 'standUp',
					'desafíos' => 'desafíos',
					'random' => 'random',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_58346402f93a7',
				'label' => 'sub categorias musica',
				'name' => 'sub_categorias_musica',
				'type' => 'checkbox',
				'instructions' => 'sub categorias para humor',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_583461bf0d6c9',
							'operator' => '==',
							'value' => 'musica',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'playlist' => 'playlist',
					'bandas' => 'bandas',
					'en_vivo' => 'en_vivo',
					'acústico' => 'acústico',
					'lanzamientos' => 'lanzamientos',
					'reviews' => 'reviews',
					'ensayos' => 'ensayos',
					'hit' => 'hit',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_583465d7f8cb5',
				'label' => 'sub categorias belleza',
				'name' => 'sub_categorias_belleza',
				'type' => 'checkbox',
				'instructions' => 'sub categorías para belleza',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_583461bf0d6c9',
							'operator' => '==',
							'value' => 'belleza',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'makeUp' => 'makeUp',
					'uñas' => 'uñas',
					'peinados' => 'peinados',
					'look' => 'look',
					'moda' => 'moda',
					'accesorios' => 'accesorios',
					'tips' => 'tips',
					'desfiles' => 'desfiles',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5834670c96f2d',
				'label' => 'sub categorias lifestyle',
				'name' => 'sub_categorias_lifestyle',
				'type' => 'checkbox',
				'instructions' => 'sub categorias para lifestyle',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_583461bf0d6c9',
							'operator' => '==',
							'value' => 'lifestyle',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'viajes' => 'viajes',
					'cocina' => 'cocina',
					'DIY' => 'DIY',
					'cine' => 'cine',
					'deco' => 'deco',
					'bares' => 'bares',
					'vlogs' => 'vlogs',
					'libros' => 'libros',
					'películas' => 'películas',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5834675fe468f',
				'label' => 'sub categorias gamers',
				'name' => 'sub_categorias_gamers',
				'type' => 'checkbox',
				'instructions' => 'sub categorias para gamers',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_583461bf0d6c9',
							'operator' => '==',
							'value' => 'gamers',
						),
					),
					'allorany' => 'all',
				),
				'choices' => array (
					'trucos' => 'trucos',
					'combates' => 'combates',
					'juego en vivo' => 'juego en vivo',
					'reviews' => 'reviews',
					'tecnología' => 'tecnología',
					'lanzamientos' => 'lanzamientos',
					'testeo' => 'testeo',
					'tutoriales' => 'tutoriales',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 7,
	));
}












?>

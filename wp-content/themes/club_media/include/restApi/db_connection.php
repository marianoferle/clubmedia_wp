<?php

// DATABASE connection script
// database Connection variables

//-------localhost................................
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'bd_artfest'); // Database name
define('CHARSET', 'utf8');


/* //-------productivo.............................
define('HOST', 'moob.ciu90etoysbv.sa-east-1.rds.amazonaws.com'); // Database host name ex. localhost
define('USER', 'contenido'); // Database user. ex. root ( if your on local server)
define('PASSWORD', '9U?xtH0ukd%(Kw!4S['); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'club_media_bd'); // Database name
define('CHARSET', 'utf8');
*/

/* //----------test...............................
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'soporte'); // Database user. ex. root ( if your on local server)
define('PASSWORD', 'jf3w974tuy75'); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'club_media_bd'); // Database name
define('CHARSET', 'utf8');
*/


function DB(){

    static $instance;
    if ($instance === null) {
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
        $instance = new PDO($dsn, USER, PASSWORD, $opt);
    }
    return $instance;
}

?>

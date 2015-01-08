<?php

require_once 'vendor/autoload.php';

$f3 = BASE::instance();

//Set TimeZone to UTC.
$f3->set( 'TZ', 'UTC' );

//Load the configuration
$f3->config( 'app/config/config.ini' );

//  Load the routes
$f3->config( 'app/config/routes.ini' );

//Define some constants set in the configuration file.
define( 'DEBUG',          $f3->get( 'DEBUG'          ) );

// Constants for expressing human-readable intervals
// in their respective number of seconds.
define( 'MINUTE_IN_SECONDS', 60 );
define( 'HOUR_IN_SECONDS',   60 * MINUTE_IN_SECONDS );
define( 'DAY_IN_SECONDS',    24 * HOUR_IN_SECONDS   );
define( 'WEEK_IN_SECONDS',    7 * DAY_IN_SECONDS    );
define( 'YEAR_IN_SECONDS',  365 * DAY_IN_SECONDS    );

//Set this dir as the Absolute path
define( 'ABSPATH',  __DIR__    );

//Set Error Reporting
if( DEBUG ) {
	//  Turn on error reporting in DEBUG mode
	error_reporting( E_ALL & ~E_NOTICE );
	ini_set( 'display_errors', 'On' );
} else {
	//  ...otherwise SHUT UP!
	error_reporting( 0 );
	ini_set( 'display_errors', 'Off' );
}

//Enable caching ONLY in production
$cache = \Cache::instance();
$isCacheActive = ( ! DEBUG ? true : false );
$cache->load( $isCacheActive );

//Set up Twig Templating engine
global $twig;

$twig_loader = new Twig_Loader_Filesystem( $f3->get( 'UI' ) );
$twig = new Twig_Environment($twig_loader, array(
	'cache' => DEBUG ? false : ABSPATH . '/tmp/twig-cache',
	'auto_reload' => true,
	'strict_variables' => true,
	'debug' => true
));

if ( DEBUG ) {
	$twig->addExtension( new Twig_Extension_Debug() );
}

$twig->addExtension(new Twig_F3_Extension());

$f3->run();
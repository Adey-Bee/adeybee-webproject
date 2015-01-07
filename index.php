<?php

require_once '/vendor/autoload.php';

$f3 = BASE::instance();

$f3->route("GET|POST /", function() {
	echo "Welcome to our web project";
});

$f3->run();

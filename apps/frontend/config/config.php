<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'  => 'mysql',
		'host'     => 'localhost',
		'username' => 'root',
		'password' => '',
		'name'     => DB_NAME,
	),
	'application' => array(
		'controllersDir' => __DIR__ . '/../controllers/',
		'modelsDir' => __DIR__ . '/../models/',
		'viewsDir' => __DIR__ . '/../views/',
	)
));

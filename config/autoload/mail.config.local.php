<?php
return array(
	'mail' => array(
		'transport' => array(
			'options' => array(
				'host'              => '',
				'connection_class'  => 'login',
				'connection_config' => array(
					'username' => '',
					'password' => '',
                                        'port' => 465,
					'ssl' => ''
				),
			),  
		),
	),
);

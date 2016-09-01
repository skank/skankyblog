<?php 
return [
	'default' => [
		'namespace'=>'App',
		'action'   =>'index'
	],
	'paginator'=>[
		'limit'=>3,
		'range'=>5
	],
	'routes' =>[
		'/' => [
			'options'=>[
				'controller' => 'Post',
				'action'     => 'index',
				'namespace'  => 'App'
			]
		]
	],
	'form'=>[
		'class'=>[
			'div'      => 'field',
			'input'    => 'field-input',
			'label'    => 'field-label',
			'textarea' => 'field-textarea',
			'button'   => 'btn-submit'
		]
	],
	'Auth'=>[
		'redirectAction' => [
			'controller' => 'User',
			'action'     => 'login',
			'namespace'  => 'App'
		],
		'cookieTimer'  => WEEK,
		'accessDenied' => false,
		'userEntity'   => 'App\Model\Document\User'
	],
	'class' => [
		'helper' => [
			'Size' => 'App\View\Helper\SizeHelper',
			'Time' => 'App\View\Helper\TimeHelper',
		],
		'behavior' => [
			'Owner' => 'App\Model\Behavior\OwnerBehavior'
		],
		'listener' => [
			'Users' => 'App\Listener\UsersListener'
		],
		'tools' => [
			'Mail' => 'App\Controller\Tools\MailTool',
		]
	],
	'listener'=> [
		'Debug'
	],
	'app'=>[
		'timehelper'=> [
			'format'=>'H:i:s d/m/Y',
			'timezone'=>'Europe/Paris'
		],
	]
];

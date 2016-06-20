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
				'controller' => 'Home',
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
			'Size' => 'App\View\Helper\SizeHelper'
		],
		'behavior' => [
			'Owner' => 'App\Model\Behavior\OwnerBehavior'
		],
		'listener' => [
			'Users' => 'App\Listener\UsersListener'
		]
	],
	'listener'=> [
		'Debug'
	]
];
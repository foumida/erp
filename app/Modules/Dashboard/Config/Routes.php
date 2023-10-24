<?php
$routes->group('', ['namespace' => 'App\Modules\Dashboard\Controllers'], function($routes) {
	$routes->get('dashboard', 'Dashboard::index');
	
	$routes->post('dashboard_ajax', 'Dashboard::ajax');

});
?>
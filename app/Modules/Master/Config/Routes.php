<?php
$routes->group('', ['namespace' => 'App\Modules\Master\Controllers'], function($routes) {
	$routes->get('admin/branches', 'Master::branches');
	$routes->get('admin/branch', 'Master::branch');
});
?>
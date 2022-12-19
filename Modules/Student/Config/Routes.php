<?php

$routes->group('student',['namespace' => '\Modules\Student\Controllers'], function($routes){
    // list student page
	$routes->get('/', 'StudentController::index');

	// add student form + post data
	$routes->match(['get', 'post'], 'add-student', 'StudentController::addStudent');

    // edit student form + post data
	$routes->match(['get', 'put'], 'edit-student/(:num)', 'StudentController::editStudent/$1');

	// delete student
	$routes->delete('delete-student/(:num)', 'StudentController::deleteStudent/$1');
});


$routes->group('api', ['namespace' => '\Modules\Student\Controllers'], function ($routes) {

	$routes->resource('student', ['controller' => 'ApiController']);
});
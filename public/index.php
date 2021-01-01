<?php

require __DIR__.'/../vendor/autoload.php';

(new Todo\DotEnv(__DIR__.'/../.env'))->load();

$segments = $_SERVER['REQUEST_URI'] ?? '';

$segments = explode('/', $segments);
$segments = array_filter($segments);
$segments = array_values($segments);


if ('init-database' == ($segments[0] ?? false)
	&& 'GET' == ($_SERVER['REQUEST_METHOD'] ?? false)) {
	\Todo\Controllers\InitDatabaseController::factory()->up();
	return;
}
if ('drop-database' == ($segments[0] ?? false)) {
	\Todo\Controllers\InitDatabaseController::factory()->down();
	return;
}

if (empty($segments[0])
	&& 'GET' == ($_SERVER['REQUEST_METHOD'] ?? false)) {
	\Todo\Controllers\TodosController::factory()->status();
	return;
}

if ('todos' == ($segments[0] ?? false)
	&& !isset($segments[1])
	&& 'GET' == ($_SERVER['REQUEST_METHOD'] ?? false)) {
	\Todo\Controllers\TodosController::factory()->index();
	return;
}

if ('todos' == ($segments[0] ?? false)
	&& ($segments[1] ?? null)
		&& !isset($segments[2])
		&& 'GET' == ($_SERVER['REQUEST_METHOD'] ?? false)) {
	\Todo\Controllers\TodosController::factory()->show($segments[1]);
	return;
}


if ('todos' == ($segments[0] ?? false)
	&& !isset($segments[1])
	&& 'POST' == ($_SERVER['REQUEST_METHOD'] ?? false)) {
	\Todo\Controllers\TodosController::factory()->store();
	return;
}


die('exit');



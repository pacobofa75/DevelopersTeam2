<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(
    '/' => 'task#index',
    '/create' => 'task#createTask',
    '/editTask.php' => 'task#editTask',
    '/showTasks.php' => 'task#showTasks',
    '/deleteTask.php' => 'task#deleteTask',
    '/createTask.php' => 'task#createTask',
    '/index.php' => 'task#index'
);

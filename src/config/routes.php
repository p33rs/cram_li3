<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * The routes file is where you define your URL structure, which is an important part of the
 * [information architecture](http://en.wikipedia.org/wiki/Information_architecture) of your
 * application. Here, you can use _routes_ to match up URL pattern strings to a set of parameters,
 * usually including a controller and action to dispatch matching requests to. For more information,
 * see the `Router` and `Route` classes.
 *
 * @see lithium\net\http\Router
 * @see lithium\net\http\Route
 */
use lithium\net\http\Router;
use lithium\core\Environment;

Router::connect('/', ['controller' => 'Users', 'action' => 'land']);
Router::connect('/register', ['controller' => 'Users', 'action' => 'register', 'type' => 'json']);
Router::connect('/login', ['controller' => 'Users', 'action' => 'login', 'type' => 'json']);
Router::connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
Router::connect('/account', ['controller' => 'Users', 'action' => 'account']);

Router::connect('/home', ['controller' => 'Photos', 'action' => 'index']);
Router::connect('/user/{:id}', ['controller' => 'Photos', 'action' => 'index']);
Router::connect('/photo/upload', ['controller' => 'Photos', 'action' => 'add']);
Router::connect('/photo/delete', ['controller' => 'Photos', 'action' => 'delete', 'type' => 'json']);
Router::connect('/photo/{:id}', ['controller' => 'Photos', 'action' => 'view']);

?>
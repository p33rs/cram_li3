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

Router::connect('/', 'Users::land');
Router::connect('/register', 'Users::register');
Router::connect('/login', 'Users::login');
Router::connect('/logout', 'Users::logout');
Router::connect('/account', 'Users::account');

Router::connect('/home', 'Photos::index');
Router::connect('/user/{:id}', 'Photos::index');
Router::connect('/photo/upload', 'Photos::add');
Router::connect('/photo/delete', 'Photos::delete');
Router::connect('/photo/{:id}', 'Photos::view');

?>
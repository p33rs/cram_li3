<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2013, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

/**
 * This configures your session storage. The Cookie storage adapter must be connected first, since
 * it intercepts any writes where the `'expires'` key is set in the options array.
 * The default name is based on the lithium app path. Remember, if your app is numeric or has
 * special characters you might want to use Inflector::slug() or set this manually.
 */
use lithium\storage\Session;

$name = basename(LITHIUM_APP_PATH);
Session::config(array(
	'default' => array('adapter' => 'Php', 'session.name' => $name)
));
Session::write('start', true);
?>
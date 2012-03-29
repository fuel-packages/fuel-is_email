<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

require_once __DIR__.'/vendor/is_email/is_email.php';

Autoloader::add_core_namespace('Is_Email');

Autoloader::add_classes(array(
	'Is_Email\\Validation' => __DIR__.'/classes/validation.php',
));


/* End of file bootstrap.php */

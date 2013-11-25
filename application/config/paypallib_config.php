<?php
/**
 *
 * Package: ci_demo
 * Filename: paypallib_config.php
 * Author: solidstunna101
 * Date: 25/11/13
 * Time: 14:24
 *
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Ppal (Paypal IPN Class)
// ------------------------------------------------------------------------

// If (and where) to log ipn to file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

// Where are the buttons located at
$config['paypal_lib_button_path'] = 'buttons';

// What is the default currency?
$config['paypal_lib_currency_code'] = 'USD';

// Enable Sandbox mode?
$config['paypal_lib_sandbox_mode'] = TRUE;
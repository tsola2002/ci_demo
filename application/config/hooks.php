<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

//there willbe a filename in hooks folder called profiler.php
//at post_controller_constructor hook point, it will load specified file using specified path
//call the specified function

$hook['post_controller_constructor'] = array(

                                //'class'    => 'MyClass',
                                'function' => 'profiler_hook',
                                'filename' => 'profiler.php',
                                'filepath' => 'hooks',
                                //'params'   => array('beer', 'wine', 'snacks')

);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */
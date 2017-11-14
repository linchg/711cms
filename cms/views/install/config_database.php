defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'	        => '<?php echo $default['dsn']; ?>',
    'hostname'      => '<?php echo $default['hostname']; ?>',
    'username'      => '<?php echo $default['username']; ?>',
    'password'      => '<?php echo $default['password']; ?>',
    'database'      => '<?php echo $default['database']; ?>',
    'dbdriver'      => '<?php echo $default['dbdriver']; ?>',
    'dbprefix'      => '<?php echo $default['dbprefix']; ?>',
    'port'          => '<?php echo $default['port']; ?>',
    'pconnect'      => FALSE,
    'db_debug'      => TRUE,
    'cache_on'      => FALSE,
    'cachedir'      => '',
    'char_set'      => 'utf8',
    'dbcollat'      => 'utf8_general_ci',
    'swap_pre'      => '',
    'encrypt'       => FALSE,
    'compress'      => FALSE,
    'stricton'      => FALSE,
    'failover'      => array(),
    'save_queries'  => TRUE
);

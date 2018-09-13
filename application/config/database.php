<?php
defined('BASEPATH') or exit('No direct script access allowed');

$active_group = 'localhost';
$query_builder = true;

$db['localhost'] = array(
    'dsn'	=> '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'tna*013cram',
    'database' => 'sigalerta',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
);

$db['homologation'] = array(
    'dsn'	=> '',
    'hostname' => 'mysql.sigalerta.com',
    'username' => 'sigalerta01',
    'password' => 'a1b2c309',
    'database' => 'sigalerta01',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
);

$db['production'] = array(
    'dsn'	=> '',
    'hostname' => '50.62.176.146',
    'username' => 'sigalerta',
    'password' => 'MhD1ac4k1Dsitdi',
    'database' => 'sigalerta',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
);

$db['production_gm_server'] = array(
    'dsn'	=> '',
    'hostname' => 'mysql.sigalerta.com',
    'username' => 'sigalerta',
    'password' => 'a1b2c309',
    'database' => 'sigalerta',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => false,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => false,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => false,
    'compress' => false,
    'stricton' => false,
    'failover' => array(),
    'save_queries' => true
);
<?php

/* 
 * @CODOLICENSE
 */

defined('IN_CODOF') or die();

$installed=true;

function get_codo_db_conf() {


    $config = array (
  'driver' => 'mysql',
  'host' => 'db569840501.db.1and1.com',
  'database' => 'db569840501',
  'username' => 'dbo569840501',
  'password' => 'codoforum',
  'prefix' => '',
  'charset' => 'utf8',
  'collation' => 'utf8_unicode_ci',
);

    return $config;
}

$DB = get_codo_db_conf();

$CONF = array (
    
  'driver' => 'Custom',
  'UID'    => '550bfb80b7c04',
  'SECRET' => '550bfb80b7c40',
  'PREFIX' => ''
);

<?php
defined('BASEPATH') or exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('email', 'database', 'session', 'table', 'upload', 'user_agent', 'form_validation', 'encrypt');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'common_helper', 'mail_helper',  'form', 'html', 'date' , 'security' , 'post');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('CommonModal' , 'Dashboard_model' );

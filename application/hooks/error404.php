<?php defined('SYSPATH') or die('No direct script access.');

Event::clear('system.404');
Event::add('system.404', 'error404');

function error404() 
{
	new Error_Controller;
}
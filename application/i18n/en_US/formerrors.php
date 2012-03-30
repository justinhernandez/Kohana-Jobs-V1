<?php defined('SYSPATH') or die('No direct script access.');

$lang = array
(
	'company' => array
	(
		'required' => 'Company name can\'t be blank.',
		'length'   => 'Company name must not be longer than 100 characters.',
	),
	'location' => array
	(
		'required' => 'Location can\'t be blank.',
		'length'   => 'Location must not be longer than 100 characters.',
	),
	'website' => array
	(
		'url'    => 'Website URL is invalid.',
		'length' => 'Website URL must not be longer than 100 characters.',
	),
	'email' => array
	(
		'required' => 'E-mail address can\'t be blank.',
		'email'    => 'E-mail address is invalid.',
		'length'   => 'E-mail address must not be longer than 100 characters.',
	),
	'title' => array
	(
		'required' => 'Job title can\'t be blank.',
		'length'   => 'Job title must not be longer than 100 characters.',
	),
	'description' => array
	(
		'required' => 'Job description can\'t be blank.',
		'length'   => 'Job description must not be longer than 5000 characters.',
	),
	'apply' => array
	(
		'required' => '“How to apply” can\'t be blank.',
		'length'   => '“How to apply” must not be longer than 200 characters.',
	),
	'terms' => array
	(
		'required' => 'Agree to the terms of use in order to post a job.',
	),
);
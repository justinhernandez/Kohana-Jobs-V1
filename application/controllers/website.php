<?php defined('SYSPATH') or die('No direct script access.');

abstract class Website_Controller extends Template_Controller {

	// Main template
	public $template = 'layout';

	// Library instances
	// public $db;
	public $session;

	// Model instances
	public $jobs;

	// Constructor
	public function __construct()
	{
		// Loads template view and auto-rendering
		parent::__construct();

		// Load profiler
		! IN_PRODUCTION and new Profiler;

		// Load libraries
		// $this->db = Database::instance();
		$this->session = Session::instance();

		// Load models
		$this->job = new Job_Model;

		// Job garbage collection trigger
		if (mt_rand(1, 100) <= Kohana::config('jobs.gc_probability'))
		{
			$this->job->remove_expired();
		}

		// Initialize template variables
		$this->template->pagetitle = '';
		$this->template->layout = '';
		$this->template->content = '';
		$this->template->sidebar = new View('elements/sidebar');
	}
}
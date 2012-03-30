<?php defined('SYSPATH') or die('No direct script access.');

class Error_Controller extends Website_Controller {

	// URL: /error
	public function __construct()
	{
		// Load Website_Controller
		parent::__construct();

		// Send the right HTTP response header
		header('HTTP/1.1 404 File Not Found');

		// Setup 404 template
		$this->template->pagetitle = 'Error 404';
		$this->template->layout = 'error';
		$this->template->content = new View('content/error');

		// Output manually because Template auto-rendering will only be executed
		// in system.post_controller, which is after the exit from the 404 hook.
		$this->template->render(TRUE);

		// Exit script execution here to prevent this controller from being
		// loaded multiple times.
		exit;
	}
}
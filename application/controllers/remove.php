<?php defined('SYSPATH') or die('No direct script access.');

class Remove_Controller extends Website_Controller {

	// URL: /remove/id/reversed-password
	public function __call($method, $args)
	{
		$this->template->pagetitle = 'Remove your job listing';

		// Retrieve job id and password from URL
		$id = (int) $this->uri->segment(2);
		$password = md5(str_rot13(strrev($this->uri->segment(3))).Kohana::config('encryption.key'));

		// Search db for job
		$this->job->where('id', $id)->where('password', $password)->find();

		// Invalid job id
		if ($this->job->id === 0)
			Event::run('system.404');

		// Setup template
		$this->template->content = new View('content/remove');
		$this->template->content->job = $this->job;
		$this->template->content->password = str_rot13(strrev($this->uri->segment(3))); // password needed for edit link

		// Form submitted
		if ($_POST)
		{
			// Remove job
			$this->job->delete();

			// Cleanup cache
			Cache::instance()->delete('rss');

			// Redirect to homepage
			$this->session->set_flash('flash', 'Your job listing is gone now. Thank you for using HiGreenhouse.com/jobs!');
			url::redirect();
		}
	}
}
<?php defined('SYSPATH') or die('No direct script access.');

class Confirm_Controller extends Website_Controller {

	// URL: /confirm/id/password
	public function __call($method, $args)
	{
		$this->template->pagetitle = 'Confirm your job listing';

		// Retrieve job id and password from URL
		$id = (int) $this->uri->segment(2);
		$password = md5($this->uri->segment(3).Kohana::config('encryption.key'));

		// Search db for job
		$this->job->where('id', $id)->where('password', $password)->find();

		// Invalid job id
		if ($this->job->id === 0)
			Event::run('system.404');

		// Job already confirmed
		if ($this->job->confirmed === 1)
			url::redirect('jobs/'.$this->job->id);

		// Generate new password for edit link
		$password = text::random();

		// Confirm job
		$this->job->confirmed = 1;
		$this->job->password = md5($password.Kohana::config('encryption.key'));
		$this->job->date = date('Y-m-d H:i:s');
		$this->job->save();

		// Original password for edit link
		$this->job->password = $password;

		// Send thanks and edit link
		$sent = email::send
		(
			array($this->job->email, $this->job->company),
			array(Kohana::config('email.general'), 'HiGreenhouse.com'),
			'Thanks for your job listing',
			View::factory('mail/post-confirmed', array('job' => $this->job))
		);

		// Technical problem
		if ( ! $sent)
		{
			exit('Error - Mail with edit and remove links could not be sent due to some technical problem. Please contact '.Kohana::config('email.geert'));
		}

		// Cleanup cache
		Cache::instance()->delete('rss');

		// Redirect to job page
		$this->session->set_flash('flash', 'Yay! Your job listing has been published. Look below.');
		url::redirect('jobs/'.$this->job->id);
	}
}
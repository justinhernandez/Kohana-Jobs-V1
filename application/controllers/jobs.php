<?php defined('SYSPATH') or die('No direct script access.');

class Jobs_Controller extends Website_Controller {

	// URL: [/jobs[/index]]
	public function index()
	{
		$this->template->pagetitle = 'Work opportunities for Hawaii';
		$this->template->content = new View('content/jobs');
		$this->template->content->jobs = $this->job->where('confirmed', 1)->orderby('date', 'desc')->find_all();
	}

	// URL: /jobs/id
	public function __call($method, $args)
	{
		// Extract job id from URL
		$job_id = (int) $this->uri->segment(2);

		// Don't allow anything after id
		if ($this->uri->segment(3) !== FALSE)
			url::redirect('jobs/'.$job_id);

		// Find confirmed job with id from URL
		$this->job->where('id', $job_id)->where('confirmed', 1)->find();

		// Invalid job id
		if ($this->job->id === 0)
			Event::run('system.404');

		// Initialize template
		$this->template->pagetitle = $this->job->title;
		$this->template->content = new View('content/job');
		$this->template->content->job = $this->job;
	}
}
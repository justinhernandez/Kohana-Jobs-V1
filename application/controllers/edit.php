<?php defined('SYSPATH') or die('No direct script access.');

class Edit_Controller extends Website_Controller {

	// URL: /edit/id/password
	public function __call($method, $args)
	{
		$this->template->pagetitle = 'Edit your job listing';

		// Retrieve job id and password from URL
		$id = (int) $this->uri->segment(2);
		$password = md5($this->uri->segment(3).Kohana::config('encryption.key'));

		// Search db for job
		$this->job->where('id', $id)->where('password', $password)->where('confirmed', 1)->find();

		// Invalid job id
		if ($this->job->id === 0)
			Event::run('system.404');

		// Use post view
		$this->template->content = new View('content/post-edit', array('new' => FALSE, 'preview' => FALSE));
		$this->template->content->password = str_rot13(strrev($this->uri->segment(3))); // password needed for remove link

		// Initialize all form fields
		$form = array
		(
			'company'		=> $this->job->company,
			'location'		=> $this->job->location,
			'website'		=> $this->job->website,
			'email'			=> $this->job->email,
			'title'			=> $this->job->title,
			'description'	=> $this->job->description,
			'apply'			=> $this->job->apply,
		);

		// Form not submitted
		if ( ! $_POST)
		{
			// Intialize (empty) form fields in view
			$this->template->content->set('job', $this->job);
		}

		// Form submitted
		else
		{
			// Set validation rules
			$post = Validation::factory($_POST)
				->pre_filter('trim')
				->pre_filter('format::url', 'website')
				->add_rules('company', 'required', 'length[1,100]')
				->add_rules('location', 'required', 'length[1,100]')
				->add_rules('website', 'url', 'length[1,100]')
				->add_rules('email', 'required', 'email', 'length[1,100]')
				->add_rules('title', 'required', 'length[1,100]')
				->add_rules('description', 'required', 'length[1,5000]')
				->add_rules('apply', 'required', 'length[1,200]');

			// Run validation (filters and rules)
			$validate = $post->validate();

			// Overwrite allowed form values
			$form = arr::overwrite($form, $post->as_array());

			// Add id and date now, not allowing them to be overriden above
			$form['id'] = $this->job->id;
			$form['date'] = $this->job->date;

			// Repopulate form (needed in case of error messages or preview)
			$this->template->content->set('job', (object) $form);

			// Errors
			if ( ! $validate)
			{
				// Show error messages
				foreach ($post->errors() as $field => $error)
				{
					$formerrors[$field] = Kohana::lang('formerrors.'.$field.'.'.$error);
				}
				$this->template->content->formerrors = $formerrors;
			}

			// No errors and preview
			elseif (isset($_POST['preview']))
			{
				$this->template->content->set('preview', TRUE);
			}

			// No errors and no preview
			else
			{
				// Load form values into ORM
				foreach ($form as $field => $value)
				{
					$this->job->$field = $value;
				}

				// Update last edit date
				$this->job->edited = date('Y-m-d H:i:s');

				// Save new unconfirmed job
				$this->job->save();

				// Cleanup cache
				Cache::instance()->delete('rss');

				// Redirect to further instructions
				$this->session->set_flash('flash', 'Your job listing has successfully been edited.');
				url::redirect('jobs/'.$this->job->id);
			}
		}
	}
}
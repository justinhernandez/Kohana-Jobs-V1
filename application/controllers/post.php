<?php defined('SYSPATH') or die('No direct script access.');

class Post_Controller extends Website_Controller {

	// URL: /post[/index]
	public function index()
	{
		$this->template->pagetitle = 'Create a new job listing';
		$this->template->content = new View('content/post-edit', array('new' => TRUE, 'preview' => FALSE));

		// Initialize all form fields
		$form = array
		(
			'company'		=> '',
			'location'		=> '',
			'website'		=> 'http://',
			'email'			=> '',
			'title'			=> '',
			'description'	=> '',
			'apply'			=> '',
			'terms'			=> FALSE,
		);

		// Form not submitted
		if ( ! $_POST)
		{
			// Intialize (empty) form fields in view
			$this->template->content->set('job', (object) $form);
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
				->add_rules('website', 'valid::url', 'length[1,100]')
				->add_rules('email', 'required', 'email', 'length[1,100]')
				->add_rules('title', 'required', 'length[1,100]')
				->add_rules('description', 'required', 'length[1,5000]')
				->add_rules('apply', 'required', 'length[1,200]')
				->add_rules('terms', 'required');

			// Run validation (filters and rules)
			$validate = $post->validate();

			// Overwrite allowed form values
			$form = arr::overwrite($form, $post->as_array());

			// Add current date in mysql format
			$form['date'] = date('Y-m-d H:i:s');

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
				// No terms field exists in database
				unset($form['terms']);

				// Load form values into ORM
				foreach ($form as $field => $value)
				{
					$this->job->$field = $value;
				}

				// Generate password
				$password = text::random();

				// Store salted md5 password in database
				$this->job->password = md5($password.Kohana::config('encryption.key'));

				// Save new unconfirmed job
				$this->job->save();

				// Need original password back for mail
				$this->job->password = $password;

				// Send confirmation mail
				$sent = email::send
				(
					array($this->job->email, $this->job->company),
					array(Kohana::config('email.general'), 'KohanaJobs.com'),
					'Confirm your job listing',
					View::factory('mail/post-confirm', array('job' => $this->job))
				);

				// Technical problem
				if ( ! $sent)
				{
					exit('Error - Confirmation mail could not be sent due to some technical problem. Please contact '.Kohana::config('email.geert'));
				}

				// Redirect to homepage
				$this->session->set_flash('flash', 'Please check your mailbox for a confirmation link. Thanks.');
				url::redirect();
			}
		}
	}
}
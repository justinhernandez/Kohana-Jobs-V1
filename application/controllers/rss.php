<?php defined('SYSPATH') or die('No direct script access.');

class Rss_Controller extends Controller {

	/**
	 * RSS feed cache is deleted after any job record is updated:
	 *  - a new job is published;
	 *  - an existing job is edited;
	 *  - an existing job is removed (by lifetime expiration or manually).
	 * That is why the cache file expiration time is set rather high.
	 */
	public function index()
	{
		// Send the right content-type http header
		header('Content-type: text/xml; charset=UTF-8');

		// Load cache library
		$cache = Cache::instance();

		// No cached rss feed found
		if ( ! $feed = $cache->get('feed'))
		{
			// Build and cache the rss feed
			$feed = new View('rss/feed');
			$feed->jobs = ORM::factory('job')
				->where('confirmed', 1)
				->orderby('date', 'desc')
				->limit(Kohana::config('jobs.feed_job_count'))
				->find_all();

			$feed = $feed->render();

			$cache->set('feed', $feed, NULL, 86400); // 1 day
		}

		// Display the feed
		echo $feed;
	}
}
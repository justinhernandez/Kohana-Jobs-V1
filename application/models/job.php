<?php defined('SYSPATH') or die('No direct script access.');

class Job_Model extends ORM {

	/**
	 * Completely removes all expired jobs.
	 *
	 * @return  integer  number of rows deleted
	 */
	public function remove_expired()
	{
		// Delete expired jobs from database
		$rows = Database::instance()
			->query('DELETE FROM jobs WHERE date < NOW() - INTERVAL ? DAY', Kohana::config('jobs.lifetime'))
			->count();

		// Delete the rss feed cache if needed
		if ($rows > 0)
		{
			Cache::instance()->delete('rss');
		}

		// Return number of deleted jobs
		return $rows;
	}
}
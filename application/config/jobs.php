<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Number of days after which jobs will be automatically removed.
 */
$config['lifetime'] = 100;

/**
 * Percentage probability that the gc (garbage collection) routine is started.
 */
$config['gc_probability'] = 2;

/**
 * Number of days after post that jobs are considered "new"
 */
$config['new'] = 5;

/**
 * Full URL for the RSS feed
 */
$config['feed_url'] = 'http://feeds2.feedburner.com/kohanajobs';

/**
 * Maximum number of jobs in RSS feed
 */
$config['feed_job_count'] = 50;
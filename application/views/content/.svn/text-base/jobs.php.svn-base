<?php if ($jobs->count() == 0) { ?>

	<h1>No jobs available</h1>

	<h2>Looking <span>for</span> work?</h2>
	<p>
		Please check back later, or <a href="<?php echo Kohana::config('jobs.feed_url') ?>">subscribe to the RSS feed</a> now.
	</p>

	<h2>Looking <span>for</span> a freelancer?</h2>
	<p>
		Oh, yeah! You could be the first one to <a href="<?php echo url::site('post') ?>">create a job listing</a>!
	</p>

<?php } else { ?>

	<p id="rss-jobs">
		<a class="clean" href="<?php echo Kohana::config('jobs.feed_url') ?>" title="Subscribe to the RSS feed">
			<img alt="RSS feed" src="<?php echo url::site('img/layout/feed-icon-10x10.png') ?>" width="10" height="10" />
			RSS
		</a>
	</p>

	<h1><?php echo ucfirst(text::num2str($jobs->count())) ?> <?php echo inflector::plural('job', $jobs->count()) ?> available</h1>

	<table cellspacing="0" summary="List of all Kohana jobs (most recent first)">
		<tr class="skip">
			<th>Date</th>
			<th>Job</th>
		</tr>

		<?php foreach ($jobs as $job) { ?>

			<tr class="<?php echo text::alternate('alt1', 'alt2') ?>">
				<td class="date">
					<?php echo date('M j', strtotime($job->date)) ?>
				</td>
				<td>
					<?php if (strtotime($job->date) > time() - 86400 * Kohana::config('jobs.new')) { ?>
						<img alt="new" width="22" height="9" src="<?php echo url::site('img/layout/new.gif') ?>" />
					<?php } ?>
					<strong><a href="<?php echo url::site('jobs/'.$job->id) ?>" title="Location: <?php echo html::specialchars($job->location) ?>"><?php echo text::widont(html::specialchars($job->title)) ?></a></strong>
					<br /><span class="minor">at</span> <?php echo html::specialchars($job->company) ?>
				</td>
			</tr>

		<?php } ?>

	</table>

<?php } ?>
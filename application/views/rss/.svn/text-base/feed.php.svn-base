<?php echo '<?' ?>xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>

	<title>KohanaJobs.com</title>
	<description>Work opportunities for Kohana PHP freelancers</description>
	<link>http://www.kohanajobs.com/</link>
	<language>en</language>
	<copyright>2008 KohanaJobs.com</copyright>

	<?php foreach ($jobs as $job) { ?>

		<item>
			<title><?php echo html::specialchars($job->title) ?></title>
			<description>
				<![CDATA[
				<?php echo text::auto_p(text::strongify(text::auto_link(html::specialchars($job->description)))) ?>
				<h2>Apply for this job:</h2>
				<p><?php echo text::auto_link(html::specialchars($job->apply)) ?></p>
				]]>
			</description>
			<link><?php echo url::site('jobs/'.$job->id) ?></link>
			<guid><?php echo url::site('jobs/'.$job->id) ?></guid>
			<pubDate><?php echo date('r', strtotime($job->date)) ?></pubDate>
		</item>

	<?php } ?>

</channel>
</rss>
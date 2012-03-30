<h1><?php echo text::widont(html::specialchars($job->title)) ?></h1>

<p class="minor intro">
	<span class="date"><?php echo date('F jS, Y', strtotime($job->date)) ?></span>

	Job at
	<?php if ($job->website == '') { ?>
		<?php echo html::specialchars($job->company) ?>
	<?php } else { ?>
		<a class="printurl" href="<?php echo html::specialchars($job->website) ?>"><?php echo html::specialchars($job->company) ?></a>
	<?php } ?>
</p>

<?php echo text::auto_p('<strong>'.html::specialchars($job->location).'</strong> — '.text::strongify(text::auto_link(html::specialchars($job->description)))) ?>

<h2>How <span>to</span> apply</h2>

<p><strong><?php echo text::auto_link(html::specialchars($job->apply)) ?></strong></p>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Kohana Jobs • <?php echo html::specialchars($pagetitle) ?></title>
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo url::site('css/reset.css') ?>" />
	<link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo url::site('css/layout.css') ?>" />
	<!--[if lte IE 6]><link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo url::site('css/ie/layout-ie6.css') ?>" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo url::site('css/ie/layout-ie7.css') ?>" /><![endif]-->
	<link rel="stylesheet" type="text/css" media="print" href="<?php echo url::site('css/print.css') ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php echo Kohana::config('jobs.feed_job_count') ?> most recent Kohana jobs" href="<?php echo Kohana::config('jobs.feed_url') ?>" />
	<link rel="shortcut icon" href="<?php echo url::site('img/layout/favicon.png') ?>" />
</head>

<body class="<?php echo $layout ?>">

	<div id="header">
		<p id="identity">
			<a href="<?php echo url::site() ?>">
				<img alt="Kohana Jobs" src="<?php echo url::site('img/layout/kohanajobs.png') ?>" />
			</a>
		</p><!-- #identity -->

		<?php if ($this->uri->segment(1) !== 'post') { ?>
			<p id="post">
				<a href="<?php echo url::site('post') ?>" title="It's free!">
					<img alt="Post a new job" src="<?php echo url::site('img/layout/post.png') ?>" />
				</a>
			</p><!-- #post -->
		<?php } ?>
	</div><!-- #header -->

	<?php include Kohana::find_file('views', 'elements/flash') ?>

	<div id="main" class="clearfix">
		<div id="content">
			<?php echo $content ?>
		</div><!-- #content -->

		<div id="sidebar">
			<?php echo $sidebar ?>
		</div><!-- #sidebar -->
	</div><!-- #main -->

	<div id="footer" class="clearfix">
		<p id="credits">
			<strong>© Copyright 2008 &mdash; KohanaJobs.com</strong>
			<a class="clean" href="<?php echo Kohana::config('jobs.feed_url') ?>" title="Subscribe to the RSS feed"><img alt="RSS" src="<?php echo url::site('img/layout/feed-icon-10x10.png') ?>" width="10" height="10" /></a><br />
			This site is powered by <a href="http://kohanaphp.com/" title="Kohana PHP framework">Kohana</a>
			and is an initiative and creation of <a href="http://www.geertdedeckere.be/">Geert De Deckere</a> from <a href="http://www.idoe.be/">idoe studios</a>.
		</p>

		<p id="rss">
			<a href="<?php echo Kohana::config('jobs.feed_url') ?>" title="Subscribe to the RSS feed">
				<img alt="RSS feed" width="88" height="26" src="http://feeds.feedburner.com/~fc/kohanajobs?bg=046380&amp;fg=ffffff&amp;anim=0" />
			</a>
		</p>
	</div><!-- #footer -->

	<?php IN_PRODUCTION and include Kohana::find_file('views', 'elements/analytics') ?>

</body>
</html>

<!-- Do you want such beautiful markup and CSS as well? Contact me: <?php echo str_replace('@', '{at}', Kohana::config('email.geert')) ?> -->
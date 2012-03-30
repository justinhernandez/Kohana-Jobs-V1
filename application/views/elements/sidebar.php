<p class="intro">
	This site is the official <span>Greenhouse</span> job board.
</p>

<h2>What <span>is</span> the Greenhouse?</h2>
<p>
	<a href="http://higreenhouse.com">The Greenhouse</a> is a kick-ass Coworking spot located in Kaka'ako, Hawaii.
	<a href="http://higreenhouse.com">(more)</a>
</p>

<?php if ($this->uri->segment(1) !== 'post') { ?>

	<h2>Why <span>post</span> here?</h2>
	<p>
		You are specifically targeting people in Hawaii.
		And it's free.
		<a href="<?php echo url::site('post') ?>">Post!</a>
	</p>

<?php } else { ?>

	<h2>How long <span>will</span> my job listing run?</h2>
	<p>
		<?php echo Kohana::config('jobs.lifetime') ?> days at most.
		You can edit or remove it at any time.
	</p>

	<h2>What <span>does it</span> cost?</h2>
	<p>It's free. Just say “thank you”.</p>

<?php } ?>

<?php if ($this->uri->segment(1) !== 'faq') { ?>
	<p class="push-down"><a href="<?php echo url::site('faq') ?>">More <abbr title="Frequently Asked Questions">FAQ</abbr></a></p>
<?php } ?>
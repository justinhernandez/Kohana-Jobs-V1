<p class="intro">
	This site is the official Kohana job board.
</p>

<h2>What <span>is</span> Kohana?</h2>
<p>
	<a href="http://kohanaphp.com">Kohana</a> is a kick-ass PHP&nbsp;5 framework.
	It is small, fast, and uses the <abbr title="Model View Controller">MVC</abbr> pattern.
	<a href="http://kohanaphp.com">(more)</a>
</p>

<?php if ($this->uri->segment(1) !== 'post') { ?>

	<h2>Why <span>post</span> here?</h2>
	<p>
		You are specifically targeting PHP developers with Kohana experience.
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
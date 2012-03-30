<h1>Nothing to see here</h1>

<img id="alert" alt="error" src="<?php echo url::site('img/layout/big-alert.png') ?>" />

<p class="intro">
	We are sorry.
	The page you are looking for could not be found.
	And that is why you are seeing that big fat alert sign.
</p>

<ul class="spaced">
	<li>
		Maybe you made a typo in the URL.
		Hey, I am not saying you <em>did</em>.
		You just might have.
		Well, okay, probably not.
	</li>
	<li>
		Maybe you clicked on an outdated link and the thing you are looking for once was here, but not anymore.
	</li>
	<li>
		In case you are quite sure that the error is actually caused by <em>this</em> site,
		we would appreciate it if you could inform us at <?php echo html::mailto(Kohana::config('email.geert')) ?>. Thank&nbsp;you.
	</li>
</ul>

<p class="push-down"><strong><a href="<?php echo url::site() ?>">Go back to the homepage</a></strong></p>
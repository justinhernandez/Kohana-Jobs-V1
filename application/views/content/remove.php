<h1>Remove your job listing</h1>

<p class="intro">
	You are about to remove your job listing:<br />
	<a href="<?php echo url::site('jobs/'.$job->id) ?>">“<?php echo html::specialchars($job->title) ?>”</a>.
</p>

<form id="jobform" action="<?php echo url::site(url::current()) ?>" method="post">

	<p>
		<label>Are you sure?</label>
		<strong>This action can not be undone.</strong>
	</p>

	<p>
		<input class="main" type="submit" name="remove" value="Remove" />
		or <a href="<?php echo url::site('edit/'.$job->id.'/'.$password) ?>">cancel</a>
	</p>

</form>
<h1><?php echo ($new) ? 'Create a new job listing' : 'Edit your job listing'; if ($preview) echo ' (preview)' ?></h1>

<?php if ($preview) { ?>

	<p><a href="#jobform">Skip preview</a></p>

	<div id="preview">
		<?php include Kohana::find_file('views', 'elements/job') ?>
	</div>

<?php } ?>

<form id="jobform" action="<?php echo url::site(url::current()) ?>#formerrors" method="post">

	<?php include Kohana::find_file('views', 'elements/formerrors') ?>

	<?php if ( ! $new) { ?>
		<fieldset>
			<legend>Remove</legend>

			<p><a class="delete" href="<?php echo url::site('remove/'.$job->id.'/'.$password) ?>">remove this job listing</a></p>
		</fieldset>
	<?php } ?>

	<fieldset>
		<legend>About you</legend>

		<p class="clearfix <?php if (isset($formerrors['company'])) echo 'error' ?>">
			<label for="company">Company name<abbr title="required">*</abbr></label>
			<input id="company" name="company" type="text" value="<?php echo html::specialchars($job->company) ?>" maxlength="100" size="30" />
			<small>Example: “idoe studios” (or your personal name)</small>
		</p>

		<p class="clearfix <?php if (isset($formerrors['location'])) echo 'error' ?>">
			<label for="location">Location<abbr title="required">*</abbr></label>
			<input id="location" name="location" type="text" value="<?php echo html::specialchars($job->location) ?>" maxlength="100" size="30" />
			<small>Example: “Miami, FL” or “Paris, France”</small>
		</p>

		<p class="clearfix <?php if (isset($formerrors['website'])) echo 'error' ?>">
			<label for="website">Website</label>
			<input id="website" name="website" type="text" value="<?php echo html::specialchars($job->website) ?>" maxlength="100" size="30" />
			<small>Example: “http://www.kohanaphp.com/”</small>
		</p>

		<p class="clearfix <?php if (isset($formerrors['email'])) echo 'error' ?>">
			<label for="email">E-mail<abbr title="required">*</abbr></label>
			<input id="email" name="email" type="text" value="<?php echo html::specialchars($job->email) ?>" maxlength="100" size="30" />
			<small>This e-mail address will not be made public. <?php if ($new) echo '<br />We will just send you a confirmation link.' ?></small>
		</p>
	</fieldset>

	<fieldset>
		<legend>About the job</legend>

		<p class="clearfix <?php if (isset($formerrors['title'])) echo 'error' ?>">
			<label for="title">Job title<abbr title="required">*</abbr></label>
			<input id="title" name="title" type="text" value="<?php echo html::specialchars($job->title) ?>" maxlength="100" size="50" />
			<small>Example: “PHP/MySQL developer for e-commerce project”</small>
		</p>

		<p class="clearfix <?php if (isset($formerrors['description'])) echo 'error' ?>">
			<label for="description">Description<abbr title="required">*</abbr></label>
			<textarea id="description" name="description" cols="50" rows="10"><?php echo html::specialchars($job->description) ?></textarea>
			<small>No HTML allowed, only **bold text**</small>
		</p>

		<p class="clearfix <?php if (isset($formerrors['apply'])) echo 'error' ?>">
			<label for="apply">How to apply<abbr title="required">*</abbr></label>
			<input id="apply" name="apply" type="text" value="<?php echo html::specialchars($job->apply) ?>" maxlength="200" size="50" />
			<small>Example: “Send your portfolio to jobs@company.com”</small>
		</p>
	</fieldset>

	<fieldset>
		<legend>Submit</legend>

		<?php if ($new) { ?>
			<p class="switch clearfix <?php if (isset($formerrors['terms'])) echo 'error' ?>">
				<input id="terms" name="terms" type="checkbox" <?php if ($job->terms) echo 'checked="checked"' ?> />
				<label for="terms">I understand that my listing may be removed if it is for a position that involves adult content or an illegitimate work opportunity.</label>
			</p>
		<?php } ?>

		<p>
			<input class="main" type="submit" value="<?php echo ($new) ? 'Post' : 'Edit' ?>" />
			or <input name="preview" type="submit" value="Preview" />
		</p>
	</fieldset>

</form>
<?php if ( ! empty($formerrors)) { ?>

	<div id="formerrors" class="errorbox">
		<h2>Review the form</h2>
		<ul>
			<?php foreach ($formerrors as $field => $error) { ?>
				<li>
					<label for="<?php echo $field ?>"><?php echo html::specialchars($error) ?></label>
				</li>
			<?php } ?>
		</ul>
	</div>

<?php } ?>
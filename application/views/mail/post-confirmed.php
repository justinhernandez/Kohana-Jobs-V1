Thank you!

Your job listing “<?php echo $job->title ?>” has just been published.

To VIEW it, click this link:
<?php echo url::site('jobs/'.$job->id) ?> 

To EDIT or remove it, click this link:
<?php echo url::site('edit/'.$job->id.'/'.$job->password) ?> 


Job listings will automatically be removed after <?php echo Kohana::config('jobs.lifetime') ?> days.
Please store this e-mail carefully.


www.higreenhouse.com/jobs
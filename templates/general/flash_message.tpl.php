<?php if ($message): ?>
    <div class="flashMessage default"><?php echo $message; ?></div>
<?php endif; ?>

<?php if($errorMessage): ?>
	<div class="flashMessage error">
		<?= $errorMessage ?>

		<?php if(!empty($errorArray)):?>

			<ul>
				<?php foreach($errorArray AS $error):?> 
					<li><?= $error?></li>
				<?php endforeach; ?>
			</ul>
			
		<?php	endif; ?>
	</div>
<?php endif; ?>

<?php if($successMessage): ?>
	<div class="flashMessage success">
		<?= $successMessage ?>
	</div>
<?php endif; ?>


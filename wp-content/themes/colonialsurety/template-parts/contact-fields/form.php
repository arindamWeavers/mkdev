<?php 
// Fields
$sidebar_exists = get_sub_field('sidebar_exists');
$select_form = get_sub_field('select_form');
?>

<section class="contact-form <?php if($sidebar_exists) { echo 'side'; } else { echo 'full'; } ?>">
	<div class="form">
		<?php echo $select_form; ?>
	</div>
</section>
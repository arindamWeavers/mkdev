<?php 
// Fields
$header = get_sub_field('header');
$copy = get_sub_field('copy');
$link = get_sub_field('link');
?>

<section class="contact-sidebar">
	<div class="sidebar__inner-box">
		<h4 class="inner-box__header">
			<?php echo $header; ?>
		</h4>
		<div class="inner-box__copy">
			<?php echo $copy; ?>
		</div>
		<div class="inner-box__link">
			<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
		</div>
	</div>
</section> <!-- end .sidebar -->
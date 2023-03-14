<?php
// Fields
$title = get_sub_field('title');
// $icon_boxes = get_sub_field('icon_boxes');
$subtext = get_sub_field('subtext');

?>

<section class="contact-marquee">
	<h1 class="marquee__title">
		<?php echo $title; ?>
	</h1>

<?php if(have_rows('icon_boxes')) : ?>
	<div class="marquee__icon-boxes">

	<?php while(have_rows('icon_boxes')) : the_row();
	$icon = get_sub_field('icon');
	$title = get_sub_field('title');
	$copy = get_sub_field('copy');
	?>

		<div class="iconbox__single">
			<img class="icon__image" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
			<h2 class="icon__title">
				<?php echo $title; ?>
			</h2>
			<div class="icon__copy">
				<?php echo $copy; ?>
			</div>
		</div>

	<?php endwhile; ?>

	</div> <!-- end marquee__icon-boxes -->
<?php endif; ?>

	<div class="marquee__subtext">
		<?php echo $subtext; ?>
	</div>

</section>
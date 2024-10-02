<?php get_template_part( 'template-parts/cart-drawer' ); ?>

<?php get_template_part( 'template-parts/js--details' ); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
	const swiper = new Swiper('.hero-swiper', {
		// Optional parameters
		direction: 'horizontal',
		loop: true,

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		}
	});
</script>
<footer>

	<div class="attribution">
		<p>Copyright &copy; Throne Audio <?php echo date('Y'); ?></p>
		<p>Website by <a href="https://throne.work">Throne Studio</a></p>
	</div>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'footermenu',
			'menu_id'        => 'footer-menu',
		)
	);
	?>

</footer>

<script>
	jQuery('.open-drawer').on('click', function() {
		jQuery('.cart-drawer').addClass('open-drawer');
	});

	jQuery('.close-drawer').on('click', function() {
		jQuery('.cart-drawer').removeClass('open-drawer');
	});
</script>

<script>
	jQuery('.hamburger').on('click', function() {
		if ( jQuery(this).attr('data-open') == 'open' ) {
			jQuery(this).attr('data-open', '');

			jQuery('.mobile-menu').css({
				left: '-100vw',
				right: '100vw'
			});
		} else {
			jQuery(this).attr('data-open', 'open');
			
			jQuery('.mobile-menu').css({
				left: '0vw',
				right: '0vw'
			});
		}
	});
</script>

<script>
	jQuery('.remove_item').on( 'click', function() {
		setTimeout(function() {
			window.location.reload();
		}, 1500);
	});
</script>
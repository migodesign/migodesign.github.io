<?php

function fondness_style( $args = array() ) {
	$options = fondness_get_theme_options();
	?>
	<style type="text/css">

		.trail-item a, .trail-item span{
			font-size: 22px;
		}

		<?php if ( $options['single_post_hide_banner'] == true ): ?>
		.page header#masthead,
		.single header#masthead {
			top: 0px !important;

		}
		.page .header-wrapper,
		.single .header-wrapper{
			background-color: #eee;
			padding: 30px;
			margin-top: 100px; 
		}
	<?php endif ?>

	<?php if ( $options['hide_banner'] == true ): ?>
	.archive header#masthead {
		top: 0px !important;

	}
	.archive .header-wrapper{
		background-color: #eee;
		padding: 30px;
		margin-top: 100px; 
	}
<?php endif ?>

<?php if( $options['hide_banner'] == 'true' ) :?>

	.blog .header-wrapper,
	.archive .header-wrapper {
		background-color: #c7c6c6;
		padding: 30px;
		margin-top: 150px;
	}

<?php endif; ?>

<?php if( $options['single_post_hide_banner'] == 'true' ) :?>

	.single .header-wrapper {
		background-color: #c7c6c6;
		padding: 30px;
		margin-top: 150px;
	}

<?php endif; ?>

</style>

<?php }

add_action( 'wp_head', 'fondness_style' );
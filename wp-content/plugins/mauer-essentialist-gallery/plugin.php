<?php
/*
Plugin Name: Mauer Essentialist Gallery
Plugin URI: http://essentialist.mauer.co/galleries-showcase
Description: Adds a custom Gutenberg block for use with Mauer Themes' Essentialist. Has legacy support (via the [gallery] shortcode).
Author: Mauer Themes
Version: 1.2.1
Author URI: http://mauer.co
Text Domain: mauer-essentialist-gallery
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {exit;}

$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
define ( 'PLUGIN_VER', $plugin_data['Version'] );





if (!function_exists('mauer_essentialist_gallery_plugin_init')) :
	function mauer_essentialist_gallery_plugin_init() {
		load_plugin_textdomain('mauer-essentialist-gallery', false, dirname( plugin_basename( __FILE__ ) ) . '/lang');
	}
endif;
add_action('init', 'mauer_essentialist_gallery_plugin_init');





if (!function_exists('mauer_essentialist_gallery_enqueue_scripts_and_styles')) :
	function mauer_essentialist_gallery_enqueue_scripts_and_styles() {
		// styles
		wp_enqueue_style('photoswipe', plugins_url('/includes/photoSwipe/photoswipe.css', __FILE__ ), array(), PLUGIN_VER);
		wp_enqueue_style('photoswipe-default-skin', plugins_url('/includes/photoSwipe/default-skin/default-skin.css', __FILE__ ), array(), PLUGIN_VER);
		// scripts
		wp_enqueue_script('photoswipe', plugins_url('/includes/photoSwipe/photoswipe.min.js', __FILE__ ), array('jquery'), PLUGIN_VER, true);
		wp_enqueue_script('photoswipe-ui-default', plugins_url('/includes/photoSwipe/photoswipe-ui-default.min.js', __FILE__ ), array('photoswipe'), PLUGIN_VER, true);
		wp_enqueue_script('mauer-essentialist-gallery-photoswipe-builder', plugins_url('/js/photoSwipeGalleryBuilder.js', __FILE__ ), array('photoswipe-ui-default'), PLUGIN_VER, true);
	}
endif;
add_action('wp_enqueue_scripts', 'mauer_essentialist_gallery_enqueue_scripts_and_styles');





if (!function_exists('mauer_essentialist_gallery_assets')) :
	function mauer_essentialist_gallery_assets() {
		wp_enqueue_style('mauer_essentialist_gallery-style-css', plugins_url( '/css/style.css', __FILE__ ), array(), PLUGIN_VER);
	}
endif;
add_action( 'enqueue_block_assets', 'mauer_essentialist_gallery_assets' );





if (!function_exists('mauer_essentialist_gallery_editor_assets')) :
	function mauer_essentialist_gallery_editor_assets() {
		wp_enqueue_script('mauer_essentialist_gallery-build-js', plugins_url( '/dist/blocks.build.js', __FILE__ ), array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-plugins', 'wp-components', 'wp-editor', 'wp-edit-post', 'wp-api' ), PLUGIN_VER, true);
		wp_enqueue_script('mauer_essentialist_gallery-filters-js', plugins_url( '/js/blockFilters.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), PLUGIN_VER);
		wp_enqueue_style('mauer_essentialist_gallery-editor-css', plugins_url( '/css/editor.css', __FILE__ ), array( 'wp-edit-blocks' ), PLUGIN_VER);
	}
endif;
add_action( 'enqueue_block_editor_assets', 'mauer_essentialist_gallery_editor_assets' );





if (!function_exists('mauer_essentialist_gallery_add_pswp_markup')) :

function mauer_essentialist_gallery_add_pswp_markup() {
	ob_start(); ?>

	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="pswp__bg"></div>
		<div class="pswp__scroll-wrap">

			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<div class="pswp__ui pswp__ui--hidden">
				<div class="pswp__top-bar">
					<button class="pswp__button pswp__button--close" title="<?php esc_attr_e('Close (Esc)', 'mauer-essentialist-gallery'); ?>"></button>
					<button class="pswp__button pswp__button--share" title="<?php esc_attr_e('Share', 'mauer-essentialist-gallery'); ?>"></button>
					<button class="pswp__button pswp__button--fs" title="<?php esc_attr_e('Toggle fullscreen', 'mauer-essentialist-gallery'); ?>"></button>
					<button class="pswp__button pswp__button--zoom" title="<?php esc_attr_e('Zoom in/out', 'mauer-essentialist-gallery'); ?>"></button>
					<div class="pswp__counter"></div>
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div>
				</div>
				<button class="pswp__button pswp__button--arrow--left" title="<?php esc_attr_e('Previous (arrow left)', 'mauer-essentialist-gallery'); ?>">
				</button>
				<button class="pswp__button pswp__button--arrow--right" title="<?php esc_attr_e('Next (arrow right)', 'mauer-essentialist-gallery'); ?>">
				</button>
				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<?php
	echo ob_get_clean();
}

endif;

add_action( 'wp_footer', 'mauer_essentialist_gallery_add_pswp_markup', 100 );





// [gallery] shortcode handler for legacy support (if you're not using the Gutenberg block)
if (!function_exists('mauer_essentialist_gallery_shortcode_handler')) :

	function mauer_essentialist_gallery_shortcode_handler($output, $atts) {
			global $post;

			$atts = shortcode_atts(array(
					'order' => 'ASC',
					'orderby' => 'menu_order ID',
					'id' => $post->ID,
					'itemtag' => 'dl',
					'icontag' => 'dt',
					'captiontag' => 'dd',
					'columns' => 3,
					'size' => 'thumbnail',
					'include' => '',
					'exclude' => ''
			), $atts);

			$id = intval($atts['id']);
			if ('RAND' == $atts['order']) {$atts['orderby'] = 'none';};

			if ( ! empty( $atts['include'] ) ) {
				$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

				$attachments = array();
				foreach ( $_attachments as $key => $val ) {
					$attachments[$val->ID] = $_attachments[$key];
				}
			} elseif ( ! empty( $atts['exclude'] ) ) {
				$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
			} else {
				$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
			}

			if (empty($attachments)) return 'No images attached';
			$output = "<div class=\"mauer-essentialist-gallery-pswp-wrapper\">\n";
			$output .= "<div class=\"mauer-essentialist-gallery-pswp\" itemscope itemtype=\"http://schema.org/ImageGallery\">\n";

			$img_num = 0;

			foreach ($attachments as $id => $attachment) {
				$img_num++;
				$figureClass = "";
				$post_alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true);

				// even number of images in the gallery
				if (count($attachments) % 2 == 0) {
					if ($img_num % 2 != 0) {$figureClass = "mauer-essentialist-gallery-pswp-tile-1-of-2";}
					else {$figureClass = "mauer-essentialist-gallery-pswp-tile-2-of-2";}
				}
				// odd number of images in the gallery
				if (count($attachments) % 2 != 0 && count($attachments) != 1) {
					// not the last three
					if (count($attachments) - $img_num >= 3) {
						if ($img_num % 2 != 0) {$figureClass = "mauer-essentialist-gallery-pswp-tile-1-of-2";}
						else {$figureClass = "mauer-essentialist-gallery-pswp-tile-2-of-2";}
					}
					// the last three
					if (count($attachments) - $img_num < 3) {
						if (count($attachments) - $img_num == 2) {$figureClass = "mauer-essentialist-gallery-pswp-tile-1-of-3";}
						elseif (count($attachments) - $img_num == 1) {$figureClass = "mauer-essentialist-gallery-pswp-tile-2-of-3";}
						elseif (count($attachments) - $img_num == 0) {$figureClass = "mauer-essentialist-gallery-pswp-tile-3-of-3";}
					}
				}
				// just one image in the gallery
				if (count($attachments) == 1) {
					$figureClass = "mauer-essentialist-gallery-pswp-tile-1-and-only";
				}

				$figureClass .= " mauer-essentialist-gallery-pswp-tile";

				if (count($attachments) == 1) {$img_reg = wp_get_attachment_image_src($id, 'large');}
				else {$img_reg = wp_get_attachment_image_src($id, 'mauer_thumb_4');}
				$img_full = wp_get_attachment_image_src($id, 'mauer_grand_softcropped');

				$output .="<figure class='" . $figureClass . "' itemprop='associatedMedia' itemscope itemtype='http://schema.org/ImageObject'>";
				$output .=	"<a href='" . esc_url($img_full[0]) . "' itemprop='contentUrl' data-size='" . $img_full[1] . "x" . $img_full[2] . "'>";
				$output .= 		"<img class='mauer-essentialist-gallery-pswp-img' src='" . esc_url($img_reg[0]) . "' itemprop='thumbnail' alt='" . esc_attr( $post_alt ) . "' />";
				$output .=	"</a>";
				$output .=	"<figcaption itemprop='caption description'>" . esc_attr( get_post($id)->post_excerpt) . "</figcaption>";
				$output .="</figure>";

			}
			$output .= "</div>\n";
			$output .= "<div class='clearfix'></div>\n";
			$output .= "</div>\n";
			return $output;

	}

endif;

add_filter('post_gallery', 'mauer_essentialist_gallery_shortcode_handler', 10, 2);


?>
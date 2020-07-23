<?php
include_once get_template_directory() . '/theme-includes.php';
if (!function_exists('barista_edge_styles')) {
	/**
	 * Function that includes theme's core styles
	 */
	function barista_edge_styles()
	{
		wp_register_style('barista-edge-blog', EDGE_ASSETS_ROOT . '/css/blog.min.css');

		//include theme's core styles
		wp_enqueue_style('barista-edge-default-style', EDGE_ROOT . '/style.css');
		wp_enqueue_style('barista-edge-modules-plugins', EDGE_ASSETS_ROOT . '/css/plugins.min.css');
		wp_enqueue_style('barista-edge-modules', EDGE_ASSETS_ROOT . '/css/modules.min.css');

		barista_edge_icon_collections()->enqueueStyles();

		if (barista_edge_load_blog_assets()) {
			wp_enqueue_style('barista-edge-blog');
		}

		if (barista_edge_load_blog_assets() || is_singular('portfolio-item')) {
			wp_enqueue_style('wp-mediaelement');
		}

		//is woocommerce installed?
		if (barista_edge_is_woocommerce_installed()) {
			if (barista_edge_load_woo_assets() || barista_edge_is_ajax_enabled()) {

				//include theme's woocommerce styles
				wp_enqueue_style('barista-edge-woocommerce', EDGE_ASSETS_ROOT . '/css/woocommerce.min.css');
			}
		}

		//define files afer which style dynamic needs to be included. It should be included last so it can override other files
		$style_dynamic_deps_array = array();
		if (barista_edge_load_woo_assets() || barista_edge_is_ajax_enabled()) {
			$style_dynamic_deps_array = array('barista-edge-woocommerce', 'barista-edge-woocommerce-responsive');
		}

		if (file_exists(EDGE_ROOT_DIR . '/assets/css/style_dynamic.css') && barista_edge_is_css_folder_writable() && !is_multisite()) {
			wp_enqueue_style('barista-edge-style-dynamic', EDGE_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(EDGE_ROOT_DIR . '/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
		}

		//is responsive option turned on?
		if (barista_edge_is_responsive_on()) {
			wp_enqueue_style('barista-edge-modules-responsive', EDGE_ASSETS_ROOT . '/css/modules-responsive.min.css');
			wp_enqueue_style('barista-edge-blog-responsive', EDGE_ASSETS_ROOT . '/css/blog-responsive.min.css');

			//is woocommerce installed?
			if (barista_edge_is_woocommerce_installed()) {
				if (barista_edge_load_woo_assets() || barista_edge_is_ajax_enabled()) {

					//include theme's woocommerce responsive styles
					wp_enqueue_style('barista-edge-woocommerce-responsive', EDGE_ASSETS_ROOT . '/css/woocommerce-responsive.min.css');
				}
			}

			//include proper styles
			if (file_exists(EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css') && barista_edge_is_css_folder_writable() && !is_multisite()) {
				wp_enqueue_style('barista-edge-style-dynamic-responsive', EDGE_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime(EDGE_ROOT_DIR . '/assets/css/style_dynamic_responsive.css'));
			}
		}

		//include Visual Composer styles
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style('js_composer_front');
		}
	}

	add_action('wp_enqueue_scripts', 'barista_edge_styles');
}

if (!function_exists('barista_edge_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function barista_edge_google_fonts_styles()
	{
		$font_simple_field_array = barista_edge_options()->getOptionsByType('fontsimple');
		if (!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
			$font_simple_field_array = array();
		}

		$font_field_array = barista_edge_options()->getOptionsByType('font');
		if (!(is_array($font_field_array) && count($font_field_array) > 0)) {
			$font_field_array = array();
		}

		$available_font_options = array_merge($font_simple_field_array, $font_field_array);
		$font_weight_str        = '100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic';

		//define available font options array
		$fonts_array = array();
		foreach ($available_font_options as $font_option) {
			//is font set and not set to default and not empty?
			$font_option_value = barista_edge_options()->getOptionValue($font_option);
			if (barista_edge_is_font_option_valid($font_option_value) && !barista_edge_is_native_font($font_option_value)) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;
				if (!in_array($font_option_string, $fonts_array)) {
					$fonts_array[] = $font_option_string;
				}
			}
		}

		wp_reset_postdata();

		$fonts_array         = array_diff($fonts_array, array('-1:' . $font_weight_str));
		$google_fonts_string = implode('|', $fonts_array);

		//default fonts should be separated with %7C because of HTML validation
		$default_font_string = 'Oswald:' . $font_weight_str . '|Merriweather:' . $font_weight_str . '|Open Sans:' . $font_weight_str;
		$protocol            = is_ssl() ? 'https:' : 'http:';

		//is google font option checked anywhere in theme?
		if (count($fonts_array) > 0) {

			//include all checked fonts
			$fonts_full_list      = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
			$fonts_full_list_args = array(
				'family' => urlencode($fonts_full_list),
				'subset' => urlencode('latin,latin-ext'),
			);

			$barista_edge_fonts = add_query_arg($fonts_full_list_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('barista-edge-google-fonts', esc_url_raw($barista_edge_fonts), array(), '1.0.0');
		} else {
			//include default google font that theme is using
			$default_fonts_args = array(
				'family' => urlencode($default_font_string),
				'subset' => urlencode('latin,latin-ext'),
			);
			$barista_edge_fonts = add_query_arg($default_fonts_args, $protocol . '//fonts.googleapis.com/css');
			wp_enqueue_style('barista-edge-google-fonts', esc_url_raw($barista_edge_fonts), array(), '1.0.0');
		}
	}

	add_action('wp_enqueue_scripts', 'barista_edge_google_fonts_styles');
}



if (!function_exists('barista_edge_scripts')) {
	/**
	 * Function that includes all necessary scripts
	 */
	function barista_edge_scripts()
	{
		global $wp_scripts;

		//init theme core scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('wp-mediaelement');
		wp_enqueue_script('jquery-ui-datepicker');

		wp_enqueue_script('modernizr', EDGE_ASSETS_ROOT . '/js/modules/plugins/modernizr.custom.85257.js', array('jquery'), false, true);
		wp_enqueue_script('appear', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array('jquery'), false, true);
		wp_enqueue_script('hoverintent', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array('jquery'), false, true);
		wp_enqueue_script('jquery-plugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array('jquery'), false, true);
		wp_enqueue_script('countdown', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.countdown.min.js', array('jquery'), false, true);
		wp_enqueue_script('owl-carousel', EDGE_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array('jquery'), false, true);
		wp_enqueue_script('parallax', EDGE_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array('jquery'), false, true);
		wp_enqueue_script('select2', EDGE_ASSETS_ROOT . '/js/modules/plugins/select2.min.js', array('jquery'), false, true);
		wp_enqueue_script('easypiechart', EDGE_ASSETS_ROOT . '/js/modules/plugins/easypiechart.js', array('jquery'), false, true);
		wp_enqueue_script('waypoints', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array('jquery'), false, true);
		wp_enqueue_script('chart', EDGE_ASSETS_ROOT . '/js/modules/plugins/Chart.min.js', array('jquery'), false, true);
		wp_enqueue_script('counter', EDGE_ASSETS_ROOT . '/js/modules/plugins/counter.js', array('jquery'), false, true);
		wp_enqueue_script('fluidvids', EDGE_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array('jquery'), false, true);
		wp_enqueue_script('prettyphoto', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array('jquery'), false, true);
		wp_enqueue_script('nicescroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.nicescroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('scrolltoplugin', EDGE_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array('jquery'), false, true);
		wp_enqueue_script('tweenlite', EDGE_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array('jquery'), false, true);
		wp_enqueue_script('mixitup', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.mixitup.min.js', array('jquery'), false, true);
		wp_enqueue_script('waitforimages', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array('jquery'), false, true);
		wp_enqueue_script('infinitescroll', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.infinitescroll.min.js', array('jquery'), false, true);
		wp_enqueue_script('easing', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array('jquery'), false, true);
		wp_enqueue_script('skrollr', EDGE_ASSETS_ROOT . '/js/modules/plugins/skrollr.js', array('jquery'), false, true);
		wp_enqueue_script('slick', EDGE_ASSETS_ROOT . '/js/modules/plugins/slick.min.js', array('jquery'), false, true);
		wp_enqueue_script('bootstrapcarousel', EDGE_ASSETS_ROOT . '/js/modules/plugins/bootstrapCarousel.js', array('jquery'), false, true);
		wp_enqueue_script('touchswipe', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.touchSwipe.min.js', array('jquery'), false, true);
		wp_enqueue_script('hoverdir', EDGE_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverdir.js', array('jquery'), false, true);
		wp_enqueue_script('typed', EDGE_ASSETS_ROOT . '/js/modules/plugins/typed.js', array('jquery'), false, true);

		wp_enqueue_script('isotope', EDGE_ASSETS_ROOT . '/js/jquery.isotope.min.js', array('jquery'), false, true);
		wp_enqueue_script('packery', EDGE_ASSETS_ROOT . '/js/packery-mode.pkgd.min.js', array('jquery'), false, true);

		if (barista_edge_is_smoth_scroll_enabled()) {
			wp_enqueue_script("barista-edge-smooth-page-scroll", EDGE_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
		}

		if (barista_edge_is_woocommerce_installed()) {
			wp_enqueue_script('select2');
		}

		//include google map api script
		if (barista_edge_options()->getOptionValue('google_maps_api_key') != '') {
			$google_maps_api_key = barista_edge_options()->getOptionValue('google_maps_api_key');
			wp_enqueue_script('barista-edge-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
		}

		wp_enqueue_script('barista-edge-modules', EDGE_ASSETS_ROOT . '/js/modules.min.js', array('jquery'), false, true);

		if (barista_edge_load_blog_assets()) {
			wp_enqueue_script('barista-edge-blog', EDGE_ASSETS_ROOT . '/js/blog.min.js', array('jquery'), false, true);
		}

		//include comment reply script
		$wp_scripts->add_data('comment-reply', 'group', 1);
		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script("comment-reply");
		}

		//include Visual Composer script
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_script('wpb_composer_front_js');
		}
	}

	add_action('wp_enqueue_scripts', 'barista_edge_scripts');
}



if (!function_exists('barista_edge_is_ajax_request')) {
	/**
	 * Function that checks if the incoming request is made by ajax function
	 */
	function barista_edge_is_ajax_request()
	{

		return isset($_POST["ajaxReq"]) && $_POST["ajaxReq"] == 'yes';
	}
}

if (!function_exists('barista_edge_is_ajax_enabled')) {
	/**
	 * Function that checks if ajax is enabled
	 */
	function barista_edge_is_ajax_enabled()
	{

		return false;
	}
}

if (!function_exists('barista_edge_ajax_meta')) {
	/**
	 * Function that echoes meta data for ajax
	 *
	 * @since 4.3
	 * @version 0.2
	 */
	function barista_edge_ajax_meta()
	{

		$id = barista_edge_get_page_id();

		$page_transition = get_post_meta($id, "edgtf_page_transition_type", true);
?>

		<div class="edgtf-seo-title"><?php echo wp_get_document_title(); ?></div>

		<?php if ($page_transition !== '') { ?>
			<div class="edgtf-page-transition"><?php echo esc_html($page_transition); ?></div>
		<?php } else if (barista_edge_options()->getOptionValue('default_page_transition')) { ?>
			<div class="edgtf-page-transition"><?php echo esc_html(barista_edge_options()->getOptionValue('default_page_transition')); ?></div>
		<?php }
	}

	add_action('barista_edge_ajax_meta', 'barista_edge_ajax_meta');
}

if (!function_exists('barista_edge_no_ajax_pages')) {
	/**
	 * Function that echoes pages on which ajax should not be applied
	 *
	 * @since 4.3
	 * @version 0.2
	 */
	function barista_edge_no_ajax_pages($global_variables)
	{

		//is ajax enabled?
		if (barista_edge_is_ajax_enabled()) {
			$no_ajax_pages = array();

			//get posts that have ajax disabled and merge with main array
			$no_ajax_pages = array_merge($no_ajax_pages, barista_edge_get_objects_without_ajax());

			//is wpml installed?
			if (barista_edge_is_wpml_installed()) {
				//get translation pages for current page and merge with main array
				$no_ajax_pages = array_merge($no_ajax_pages, barista_edge_get_wpml_pages_for_current_page());
			}

			//is woocommerce installed?
			if (barista_edge_is_woocommerce_installed()) {
				//get all woocommerce pages and products and merge with main array
				$no_ajax_pages = array_merge($no_ajax_pages, barista_edge_get_woocommerce_pages());
			}
			//do we have some internal pages that want to be without ajax?
			if (barista_edge_options()->getOptionValue('internal_no_ajax_links') !== '') {
				//get array of those pages
				$options_no_ajax_pages_array = explode(',', barista_edge_options()->getOptionValue('internal_no_ajax_links'));

				if (is_array($options_no_ajax_pages_array) && count($options_no_ajax_pages_array)) {
					$no_ajax_pages = array_merge($no_ajax_pages, $options_no_ajax_pages_array);
				}
			}

			//add logout url to main array
			$no_ajax_pages[] = wp_specialchars_decode(wp_logout_url());

			$global_variables['no_ajax_pages'] = $no_ajax_pages;
		}

		return $global_variables;
	}

	add_filter('barista_edge_js_global_variables', 'barista_edge_no_ajax_pages');
}

if (!function_exists('barista_edge_get_objects_without_ajax')) {
	/**
	 * Function that returns urls of objects that have ajax disabled.
	 * Works for posts, pages and portfolio pages.
	 * @return array array of urls of posts that have ajax disabled
	 *
	 * @version 0.1
	 */
	function barista_edge_get_objects_without_ajax()
	{
		$posts_without_ajax = array();

		$posts_args = array(
			'post_type'   => array('post', 'portfolio-item', 'page'),
			'post_status' => 'publish',
			'meta_key'    => 'edgtf_page_transition_type',
			'meta_value'  => 'no-animation'
		);

		$posts_query = new WP_Query($posts_args);

		if ($posts_query->have_posts()) {
			while ($posts_query->have_posts()) {
				$posts_query->the_post();
				$posts_without_ajax[] = get_permalink(get_the_ID());
			}
		}

		wp_reset_postdata();

		return $posts_without_ajax;
	}
}


//defined content width variable
if (!isset($content_width)) {
	$content_width = 1060;
}

if (!function_exists('barista_edge_theme_setup')) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function barista_edge_theme_setup()
	{
		//add support for feed links
		add_theme_support('automatic-feed-links');

		//add support for post formats
		add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

		//add theme support for post thumbnails
		add_theme_support('post-thumbnails');

		//add theme support for title tag
		add_theme_support('title-tag');

		//define thumbnail sizes
		add_image_size('barista_edge_square', 550, 550, true);
		add_image_size('barista_edge_landscape', 800, 600, true);
		add_image_size('barista_edge_portrait', 600, 800, true);
		add_image_size('barista_edge_large_width', 1000, 500, true);
		add_image_size('barista_edge_large_height', 500, 1000, true);
		add_image_size('barista_edge_large_width_height', 1000, 1000, true);

		load_theme_textdomain('baristawp', get_template_directory() . '/languages');
	}

	add_action('after_setup_theme', 'barista_edge_theme_setup');
}

if (!function_exists('barista_edge_enqueue_editor_customizer_styles')) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function barista_edge_enqueue_editor_customizer_styles()
	{
		wp_enqueue_style('barista-edge-modules-admin', EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/qodef-modules-admin.css');
		wp_enqueue_style('barista-edge-editor-customizer-style', EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css');
	}

	// add google font
	add_action('enqueue_block_editor_assets', 'barista_edge_google_fonts_styles');
	// add action
	add_action('enqueue_block_editor_assets', 'barista_edge_enqueue_editor_customizer_styles');
}


if (!function_exists('barista_edge_rgba_color')) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function barista_edge_rgba_color($color, $transparency)
	{
		if ($color !== '' && $transparency !== '') {
			$rgba_color = '';

			$rgb_color_array = barista_edge_hex2rgb($color);
			$rgba_color      .= 'rgba(' . implode(', ', $rgb_color_array) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}


if (!function_exists('barista_edge_wp_title')) {
	/**
	 * Function that outputs title tag. It checks if _wp_render_title_tag function exists
	 * and if it does'nt it generates output. Compatible with versions of WP prior to 4.1
	 */
	function barista_edge_wp_title()
	{
		if (!function_exists('_wp_render_title_tag')) { ?>
			<title><?php wp_title(''); ?></title>
		<?php }
	}
}

if (!function_exists('barista_edge_header_meta')) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function barista_edge_header_meta()
	{ ?>

		<meta charset="<?php bloginfo('charset'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<?php if (is_singular() && pings_open(get_queried_object())) : ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php endif; ?>

		<?php }

	add_action('barista_edge_header_meta', 'barista_edge_header_meta');
}

if (!function_exists('barista_edge_user_scalable_meta')) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to barista_edge_header_meta action
	 */
	function barista_edge_user_scalable_meta()
	{
		//is responsiveness option is chosen?
		if (barista_edge_is_responsive_on()) { ?>
			<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<?php } else { ?>
			<meta name="viewport" content="width=1200,user-scalable=yes">
<?php }
	}

	add_action('barista_edge_header_meta', 'barista_edge_user_scalable_meta');
}

if (!function_exists('barista_edge_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see barista_edge_is_woocommerce_installed()
	 * @see barista_edge_is_woocommerce_shop()
	 */
	function barista_edge_get_page_id()
	{
		if (barista_edge_is_woocommerce_installed() && barista_edge_is_woocommerce_shop()) {
			return barista_edge_get_woo_shop_page_id();
		}

		if (is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if (!function_exists('barista_edge_is_default_wp_template')) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function barista_edge_is_default_wp_template()
	{
		return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
	}
}

if (!function_exists('barista_edge_get_page_template_name')) {
	/**
	 * Returns current template file name without extension
	 * @return string name of current template file
	 */
	function barista_edge_get_page_template_name()
	{
		$file_name = '';

		if (!barista_edge_is_default_wp_template()) {
			$file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

			if ($file_name_without_ext !== '') {
				$file_name = $file_name_without_ext;
			}
		}

		return $file_name;
	}
}

if (!function_exists('barista_edge_has_shortcode')) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function barista_edge_has_shortcode($shortcode, $content = '')
	{
		$has_shortcode = false;

		if ($shortcode) {
			//if content variable isn't past
			if ($content == '') {
				//take content from current post
				$page_id = barista_edge_get_page_id();
				if (!empty($page_id)) {
					$current_post = get_post($page_id);

					if (is_object($current_post) && property_exists($current_post, 'post_content')) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if (stripos($content, '[' . $shortcode) !== false) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}


if (!function_exists('barista_edge_get_dynamic_sidebar')) {
	/**
	 * Return Custom Widget Area content
	 *
	 * @return string
	 */
	function barista_edge_get_dynamic_sidebar($index = 1)
	{
		ob_start();
		dynamic_sidebar($index);
		$sidebar_contents = ob_get_clean();

		return $sidebar_contents;
	}
}

if (!function_exists('barista_edge_get_sidebar')) {
	/**
	 * Return Sidebar
	 *
	 * @return string
	 */
	function barista_edge_get_sidebar()
	{

		$id = barista_edge_get_page_id();

		$sidebar = "sidebar";

		if (get_post_meta($id, 'edgtf_custom_sidebar_meta', true) != '') {
			$sidebar = get_post_meta($id, 'edgtf_custom_sidebar_meta', true);
		} else {
			if (is_single() && barista_edge_options()->getOptionValue('blog_single_custom_sidebar') != '') {
				$sidebar = esc_attr(barista_edge_options()->getOptionValue('blog_single_custom_sidebar'));
			} elseif ((barista_edge_is_product_category() || barista_edge_is_product_tag()) && barista_edge_get_woo_shop_page_id()) {
				$shop_id = barista_edge_get_woo_shop_page_id();
				if (get_post_meta($shop_id, 'edgtf_custom_sidebar_meta', true) != '') {
					$sidebar = esc_attr(get_post_meta($shop_id, 'edgtf_custom_sidebar_meta', true));
				}
			} elseif ((is_archive() || (is_home() && is_front_page())) && barista_edge_options()->getOptionValue('blog_custom_sidebar') != '') {
				$sidebar = esc_attr(barista_edge_options()->getOptionValue('blog_custom_sidebar'));
			} elseif (is_page() && barista_edge_options()->getOptionValue('page_custom_sidebar') != '') {
				$sidebar = esc_attr(barista_edge_options()->getOptionValue('page_custom_sidebar'));
			}
		}

		return $sidebar;
	}
}


if (!function_exists('barista_edge_sidebar_columns_class')) {

	/**
	 * Return classes for columns holder when sidebar is active
	 *
	 * @return array
	 */

	function barista_edge_sidebar_columns_class()
	{

		$sidebar_class  = array();
		$sidebar_layout = barista_edge_sidebar_layout();

		switch ($sidebar_layout):
			case 'sidebar-33-right':
				$sidebar_class[] = 'edgtf-two-columns-66-33';
				break;
			case 'sidebar-25-right':
				$sidebar_class[] = 'edgtf-two-columns-75-25';
				break;
			case 'sidebar-33-left':
				$sidebar_class[] = 'edgtf-two-columns-33-66';
				break;
			case 'sidebar-25-left':
				$sidebar_class[] = 'edgtf-two-columns-25-75';
				break;

		endswitch;

		$sidebar_class[] = 'clearfix';

		return barista_edge_class_attribute($sidebar_class);
	}
}


if (!function_exists('barista_edge_sidebar_layout')) {

	/**
	 * Function that check is sidebar is enabled and return type of sidebar layout
	 */
	function barista_edge_sidebar_layout()
	{

		$sidebar_layout = '';
		$page_id        = barista_edge_get_page_id();

		$page_sidebar_meta = get_post_meta($page_id, 'edgtf_sidebar_meta', true);

		if (($page_sidebar_meta !== '') && $page_id !== -1) {
			if ($page_sidebar_meta == 'no-sidebar') {
				$sidebar_layout = '';
			} else {
				$sidebar_layout = $page_sidebar_meta;
			}
		} else {
			if (is_single() && barista_edge_options()->getOptionValue('blog_single_sidebar_layout')) {
				$sidebar_layout = esc_attr(barista_edge_options()->getOptionValue('blog_single_sidebar_layout'));
			} elseif ((is_archive() || (is_home() && is_front_page())) && barista_edge_options()->getOptionValue('archive_sidebar_layout')) {
				$sidebar_layout = esc_attr(barista_edge_options()->getOptionValue('archive_sidebar_layout'));
			} elseif (is_page() && barista_edge_options()->getOptionValue('page_sidebar_layout')) {
				$sidebar_layout = esc_attr(barista_edge_options()->getOptionValue('page_sidebar_layout'));
			} elseif (!empty($sidebar_layout) && !is_active_sidebar(barista_edge_get_sidebar())) {
				$sidebar_layout = '';
			}
		}

		return $sidebar_layout;
	}
}


if (!function_exists('barista_edge_page_custom_style')) {

	/**
	 * Function that print custom page style
	 */
	function barista_edge_page_custom_style()
	{
		$style = array();
		$style = apply_filters('barista_edge_add_page_custom_style', $style);

		if (is_array($style) && count($style) > 0) {
			wp_add_inline_style('barista-edge-modules', implode(' ', $style));
		}
	}

	add_action('wp_enqueue_scripts', 'barista_edge_page_custom_style');
}

if (!function_exists('barista_edge_container_style')) {

	/**
	 * Function that return container style
	 */

	function barista_edge_container_style($style)
	{
		$id           = barista_edge_get_page_id();
		$class_prefix = barista_edge_get_unique_page_class();

		$container_selector = array(
			$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-container:not(.edgtf-container-bottom-navigation)',
			$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-full-width',
		);

		$container_class       = array();
		$page_backgorund_color = get_post_meta($id, "edgtf_page_background_color_meta", true);

		if ($page_backgorund_color) {
			$container_class['background-color'] = $page_backgorund_color;
		}

		$current_style = barista_edge_dynamic_css($container_selector, $container_class);
		$style[]       = $current_style;

		return $style;
	}

	add_filter('barista_edge_add_page_custom_style', 'barista_edge_container_style');
}

if (!function_exists('barista_edge_get_unique_page_class')) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * @return string
	 */
	function barista_edge_get_unique_page_class()
	{
		$id         = barista_edge_get_page_id();
		$page_class = '';

		if (is_single()) {
			$page_class = '.postid-' . $id;
		} elseif ($id === barista_edge_get_woo_shop_page_id()) {
			$page_class = '.archive';
		} elseif (is_home()) {
			$page_class .= '.home';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if (!function_exists('barista_edge_page_padding')) {

	/**
	 * Function that return container style
	 */

	function barista_edge_page_padding($style)
	{

		$id           = barista_edge_get_page_id();
		$class_prefix = barista_edge_get_unique_page_class();

		if (get_post_meta($id, "edgtf_page_content_top_padding_mobile", true) == 'no') {
			$page_selector = array(
				'html:not(.touch) ' . $class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-container:not(.edgtf-container-bottom-navigation) > .edgtf-container-inner',
				'html:not(.touch) ' . $class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner'
			);
		} else {
			$page_selector = array(
				$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-container:not(.edgtf-container-bottom-navigation) > .edgtf-container-inner',
				$class_prefix . ' .edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner'
			);
		}

		$page_css      = array();
		$content_class = array();

		$page_padding_top    = get_post_meta($id, "edgtf_page_content_top_padding", true);
		$page_padding_right  = get_post_meta($id, "edgtf_page_content_right_padding", true);
		$page_padding_bottom = get_post_meta($id, "edgtf_page_content_bottom_padding", true);
		$page_padding_left   = get_post_meta($id, "edgtf_page_content_left_padding", true);

		if ($page_padding_top !== '') {
			if (get_post_meta($id, "edgtf_page_content_top_padding_mobile", true) == 'yes') {
				$content_class['padding-top'] = barista_edge_filter_px($page_padding_top) . 'px!important';
			} else {
				$content_class['padding-top'] = barista_edge_filter_px($page_padding_top) . 'px';
			}
		}

		if ($page_padding_bottom !== '') {
			$content_class['padding-bottom'] = barista_edge_filter_px($page_padding_bottom) . 'px';
		}
		if ($page_padding_left !== '') {
			$content_class['padding-left'] = barista_edge_filter_px($page_padding_left) . 'px';
		}
		if ($page_padding_right !== '') {
			$content_class['padding-right'] = barista_edge_filter_px($page_padding_right) . 'px';
		}

		$page_css = barista_edge_dynamic_css($page_selector, $content_class);

		$style[] = $page_css;

		return $style;
	}

	add_filter('barista_edge_add_page_custom_style', 'barista_edge_page_padding');
}

if (!function_exists('barista_edge_page_boxed_style')) {

	/**
	 * Function that return container style
	 */

	function barista_edge_page_boxed_style($style)
	{

		$id           = barista_edge_get_page_id();
		$class_prefix = barista_edge_get_unique_page_class();

		$page_selector = array(
			$class_prefix . '.edgtf-boxed .edgtf-wrapper'
		);
		$page_css      = array();

		$page_background_color           = get_post_meta($id, 'edgtf_page_background_color_in_box_meta', true);
		$page_background_image           = get_post_meta($id, 'edgtf_boxed_background_image_meta', true);
		$page_background_image_repeating = get_post_meta($id, 'edgtf_boxed_background_image_repeating_meta', true);

		if ($page_background_color !== '') {
			$page_css['background-color'] = $page_background_color;
		}
		if ($page_background_image !== '' && $page_background_image_repeating != '') {
			$page_css['background-image']  = 'url(' . $page_background_image . ')';
			$page_css['background-repeat'] = $page_background_image_repeating;

			if ($page_background_image_repeating == 'no') {
				$page_css['background-position'] = 'center 0';
				$page_css['background-repeat']   = 'no-repeat';
			} else {
				$page_css['background-position'] = '0 0';
				$page_css['background-repeat']   = 'repeat';
			}
		}

		$current_style = barista_edge_dynamic_css($page_selector, $page_css);

		$style[] = $current_style;

		return $style;
	}

	add_filter('barista_edge_add_page_custom_style', 'barista_edge_page_boxed_style');
}

if (!function_exists('barista_edge_print_custom_css')) {
	/**
	 * Prints out custom css from theme options
	 */
	function barista_edge_print_custom_css()
	{
		$custom_css = barista_edge_options()->getOptionValue('custom_css');

		if ($custom_css !== '') {
			wp_add_inline_style('barista-edge-modules', $custom_css);
		}
	}

	add_action('wp_enqueue_scripts', 'barista_edge_print_custom_css');
}

if (!function_exists('barista_edge_print_custom_js')) {
	/**
	 * Prints out custom css from theme options
	 */
	function barista_edge_print_custom_js()
	{
		$custom_js = barista_edge_options()->getOptionValue('custom_js');


		if ($custom_js !== '') {
			wp_add_inline_script('barista-edge-modules', $custom_js);
		}
	}

	add_action('wp_enqueue_scripts', 'barista_edge_print_custom_js');
}


if (!function_exists('barista_edge_get_global_variables')) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function barista_edge_get_global_variables()
	{

		$global_variables      = array();
		$element_appear_amount = -150;

		$global_variables['edgtfAddForAdminBar']      = is_admin_bar_showing() ? 32 : 0;
		$global_variables['edgtfElementAppearAmount'] = barista_edge_options()->getOptionValue('element_appear_amount') !== '' ? barista_edge_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
		$global_variables['edgtfFinishedMessage']     = esc_html__('No more posts', 'baristawp');
		$global_variables['edgtfMessage']             = esc_html__('Loading new posts...', 'baristawp');

		$global_variables = apply_filters('barista_edge_js_global_variables', $global_variables);

		wp_localize_script('barista-edge-modules', 'edgtfGlobalVars', array(
			'vars' => $global_variables
		));
	}

	add_action('wp_enqueue_scripts', 'barista_edge_get_global_variables');
}

if (!function_exists('barista_edge_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function barista_edge_per_page_js_variables()
	{
		$per_page_js_vars = apply_filters('barista_edge_per_page_js_vars', array());

		wp_localize_script('barista-edge-modules', 'edgtfPerPageVars', array(
			'vars' => $per_page_js_vars
		));
	}

	add_action('wp_enqueue_scripts', 'barista_edge_per_page_js_variables');
}

if (!function_exists('barista_edge_content_elem_style_attr')) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function barista_edge_content_elem_style_attr()
	{
		$styles = apply_filters('barista_edge_content_elem_style_attr', array());

		barista_edge_inline_style($styles);
	}
}

if (!function_exists('barista_edge_is_woocommerce_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function barista_edge_is_woocommerce_installed()
	{
		return function_exists('is_woocommerce');
	}
}

if (!function_exists('barista_edge_is_revolution_slider_installed')) {
	/**
	 * Function that checks if woocommerce is installed
	 * @return bool
	 */
	function barista_edge_is_revolution_slider_installed()
	{
		return class_exists('RevSliderFront');
	}
}

if (!function_exists('barista_edge_visual_composer_installed')) {
	/**
	 * Function that checks if visual composer installed
	 * @return bool
	 */
	function barista_edge_visual_composer_installed()
	{
		//is Visual Composer installed?
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			return true;
		}

		return false;
	}
}


if (!function_exists('barista_edge_contact_form_7_installed')) {
	/**
	 * Function that checks if contact form 7 installed
	 * @return bool
	 */
	function barista_edge_contact_form_7_installed()
	{
		//is Contact Form 7 installed?
		if (defined('WPCF7_VERSION')) {
			return true;
		}

		return false;
	}
}

if (!function_exists('barista_edge_is_wpml_installed')) {
	/**
	 * Function that checks if WPML plugin is installed
	 * @return bool
	 *
	 * @version 0.1
	 */
	function barista_edge_is_wpml_installed()
	{
		return defined('ICL_SITEPRESS_VERSION');
	}
}

if (!function_exists('barista_edge_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function barista_edge_max_image_width_srcset()
	{
		return 1920;
	}

	add_filter('max_srcset_image_width', 'barista_edge_max_image_width_srcset');
}

if (!function_exists('barista_edge_get_user_custom_fields')) {
	/**
	 * Function returns links and icons for author social networks
	 *
	 * return array
	 *
	 */
	function barista_edge_get_user_custom_fields($id)
	{

		$user_social_array    = array();
		$social_network_array = array('twitter', 'facebook', 'instagram', 'linkedin', 'googleplus');

		foreach ($social_network_array as $network) {
			if (get_the_author_meta($network, $id) != '') {
				$$network = array(
					'name'  => $network,
					'link'  => get_the_author_meta($network, $id),
					'class' => 'social_' . $network
				);

				$user_social_array[$network] = $$network;
			}
		}

		return $user_social_array;
	}
}

if (!function_exists('barista_edge_get_module_part')) {
	function barista_edge_get_module_part($module)
	{
		return $module;
	}
}

if (!function_exists('barista_edge_is_gutenberg_installed')) {
	/**
	 * Function that checks if Gutenberg plugin installed
	 * @return bool
	 */
	function barista_edge_is_gutenberg_installed()
	{
		return function_exists('is_gutenberg_page') && is_gutenberg_page();
	}
}

if (!function_exists('barista_edge_is_gutenberg_editor')) {
	/**
	 * Function that checks if Gutenberg editor from core is active
	 * @return bool
	 */
	function barista_edge_is_gutenberg_editor()
	{
		return class_exists('WP_Block_Type');
	}
}

if (!function_exists('barista_edge_get_separator_html')) {
	/**
	 * Calls separator shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function barista_edge_get_separator_html($params = array())
	{
		if (barista_edge_core_installed()) {
			$separator_html = barista_edge_execute_shortcode('edgtf_separator', $params);
		} else {
			$separator_html = '<div class="edgtf-separator-holder clearfix  edgtf-sidebar-title-separator edgtf-separator-left"> <div class="edgtf-separator"></div></div>';
		}

		$separator_html = str_replace("\n", '', $separator_html);

		return $separator_html;
	}
}

if (!function_exists('barista_edge_get_button_html')) {
	/**
	 * Calls button shortcode with given parameters and returns it's output
	 *
	 * @param $params
	 *
	 * @return mixed|string
	 */
	function barista_edge_get_button_html($params)
	{
		if (barista_edge_core_installed()) {
			$button_html = barista_edge_execute_shortcode('edgtf_button', $params);
			$button_html = str_replace("\n", '', $button_html);
		} else {
			$button_html = '<input type="submit" name="submit" value="Submit" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid">';
		}

		return $button_html;
	}
}

// //add_filter( 'woocommerce_checkout_fields' , 'no_required_checkout_fields' );
// function no_required_checkout_fields( $fields ) {
// 	$fields['billing']['billing_last_name']['required'] = false;  // Фамилия
// //	$fields['billing']['billing_first_name']['required'] = false; // Имя
// //	$fields['billing']['billing_phone']['required'] = false;      // Телефон
// 	$fields['billing']['billing_email']['required'] = false;      // Почта
// 	$fields['billing']['billing_address_1']['required'] = false;  // Адрес строка 2
// 	$fields['billing']['billing_state']['required'] = false;      // Область
// 	$fields['billing']['billing_city']['required'] = false;       // Город
// 	$fields['billing']['billing_country']['required'] = false;    // Страна
// 	$fields['billing']['billing_postcode']['required'] = false;   // Индекс
// 	return $fields;
// }

// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields', 100 );
// function custom_override_checkout_fields( $fields ) {
//         /* Добавили нужные поля */
// 	$fields['billing']['billing_phone_client'] = array(
// 		'label'     => __('Телефон получателя', 'woocommerce'), 
// 		'placeholder'   => _x('Введите номер', 'placeholder', 'woocommerce'), 
// 		'required'  => true, // Обязательно, false - необязательно
// 		'class'     => array('form-row-wide'), // Какие классы добавить полю
// 		'clear'     => false,
// 		'priority'  => 111 // Приоритет - нужный нам порядок
// 	);
// 	$fields['billing']['billing_adress_client'] = array(
// 		'label'     => __('Адрес доставки', 'woocommerce'),
// 		'placeholder'   => _x('Введите адрес', 'placeholder', 'woocommerce'),
// 		'required'  => true,
// 		'class'     => array('form-row-wide'),
// 		'clear'     => false,
// 		'priority'  => 112
// 	);

//         /*Убрали ненужные поля*/
// 	unset($fields['billing']['billing_last_name']); // Фамилия
// 	unset($fields['billing']['billing_company']); // Компания
// //	unset($fields['billing']['billing_first_name']); // Имя
// 	unset($fields['billing']['billing_phone']); // Телефон
// 	unset($fields['billing']['billing_email']); // Почта
// //	unset($fields['billing']['billing_address_1']); // Адрес строка 1
// 	unset($fields['billing']['billing_country']); // Страна
// 	unset($fields['billing']['billing_address_2']); // Адрес строка 2
// 	unset($fields['billing']['billing_state']); // Область
// 	unset($fields['billing']['billing_postcode']); // Индекс
// 	unset($fields['billing']['billing_city']); // Город

// 	return $fields;
// }

// add_action( 'woocommerce_before_order_notes', 'my_custom_checkout_field2' );

// function my_custom_checkout_field2( $checkout ) {

// 	echo __('Текст для карточки');

// 	woocommerce_form_field( 'my_card_text', array(
// 		'type'          => 'textarea',
// 		'class'         => array('my-card-text form-row-wide'),
// //		'label'         => __('Fill in this field'),
// 		'placeholder'   => __('Введите текст для карточки получателя'),
// 	), $checkout->get_value( 'my_card_text' ));

// }

// // Это поле требует сохранения!

// add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

// function my_custom_checkout_field_update_order_meta( $order_id ) {
// 	if ( ! empty( $_POST['my_card_text'] ) ) {
// 		update_post_meta( $order_id, 'my_card_text', sanitize_text_field( $_POST['my_card_text'] ) );
// 	}
// }

// add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

// function my_custom_checkout_field_display_admin_order_meta($order){
// 	echo __('Телефон получателя').': ' . get_post_meta( $order->get_id(), '_billing_phone_client', true );
// 	echo __('Адрес доставки').': ' . get_post_meta( $order->get_id(), '_billing_adress_client', true );
// }

// add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta2', 10, 2 );

// function my_custom_checkout_field_display_admin_order_meta2($order){
// 	echo __('Текст для карточки').': ' . get_post_meta( $order->id, 'my_card_text', true );
// }


// function action_woocommerce_order_item_meta_start( $order ) {

// 	echo "Телефон получателя: " . get_post_meta( $order->get_id(), '_billing_phone_client', true );
// 	echo "Адрес доставки: " . get_post_meta( $order->get_id(), '_billing_adress_client', true );
// 	echo "Текст для карточки: " . get_post_meta( $order->get_id(), 'my_card_text', true );
// };

// add_action( 'woocommerce_email_after_order_table', 'action_woocommerce_order_item_meta_start', 10, 1 );

// add_filter('woocommerce_checkout_fields','remove_checkout_fields');
// function remove_checkout_fields($fields){
//     //unset($fields['billing']['billing_first_name']); 
//     //unset($fields['billing']['billing_last_name']);
//     unset($fields['billing']['billing_company']); // Отключено
//     //unset($fields['billing']['billing_address_1']);
//     unset($fields['billing']['billing_address_2']); // Отключено
//     unset($fields['billing']['billing_city']); // Отключено
//     unset($fields['billing']['billing_postcode']); // Отключено
//     unset($fields['billing']['billing_country']); // Отключено
//     unset($fields['billing']['billing_state']); // Отключено
//     //unset($fields['billing']['billing_phone']);
//     //unset($fields['order']['order_comments']);
//     //unset($fields['billing']['billing_email']);
//     unset($fields['account']['account_username']); // Отключено
//     unset($fields['account']['account_password']); // Отключено
//     unset($fields['account']['account_password-2']); // Отключено
//     unset($fields['shipping']['billing_company']);
//     return $fields;
// }
// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' ); 
// function custom_override_checkout_fields( $fields ) {

// unset($fields['billing']['billing_postcode']);
// unset($fields['billing']['billing_country']);
// unset($fields['billing']['billing_company']);
// unset($fields['billing']['billing_state']);
// unset($fields['shipping']['shipping_postcode']);
// unset($fields['shipping']['shipping_country']);
// unset($fields['shipping']['shipping_company']);
// unset($fields['shipping']['shipping_state']);
//   unset($fields['billing']['billing_country']); // Отключаем страны оплаты
//   unset($fields['shipping']['shipping_country']);// Отключаем страны доставки
//   return $fields;
// }

// add_filter( 'woocommerce_checkout_fields' , 'new_woocommerce_checkout_fields', 10, 1 );
// function new_woocommerce_checkout_fields($fields){
// unset($fields['billing']['billing_postcode']);
// unset($fields['billing']['billing_country']);
// unset($fields['billing']['billing_company']);
// unset($fields['billing']['billing_state']);
// return $fields;
// }



if (!function_exists('barista_edge_get_module_part')) {
	function barista_edge_get_module_part($module)
	{
		return $module;
	}
}





add_filter('woocommerce_checkout_fields', 'misha_print_all_fields');

function misha_print_all_fields($fields)
{
	return $fields;
}

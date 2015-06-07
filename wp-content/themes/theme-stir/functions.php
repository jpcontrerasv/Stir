<?php
/**
 * Twenty Thirteen functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

add_filter('acf/options_page/settings', 'my_options_page_settings');
function my_options_page_settings( $options ){
	$options['title'] = ('Global');
	$options['pages'] = array(
		__('Home'),
		__('Footer'),
	);
	return $options;
}


/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
	$content_width = 604;

/**
 * Twenty Thirteen only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';


/*
WooCommerce
*/
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Twenty Thirteen setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_setup() {
	/*
	 * Makes Twenty Thirteen available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Thirteen, use a find and
	 * replace to change 'twentythirteen' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'twentythirteen', get_template_directory() . '/languages' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentythirteen_fonts_url() ) );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Navigation Menu', 'twentythirteen' ) );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Return the Google font stylesheet URL, if available.
 *
 * The use of Source Sans Pro and Bitter by default is localized. For languages
 * that use characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentythirteen_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'twentythirteen' );

	/* Translators: If there are characters in your language that are not
	 * supported by Bitter, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$bitter = _x( 'on', 'Bitter font: on or off', 'twentythirteen' );

	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';

		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds Masonry to handle vertical alignment of footer widgets.
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );

	// Loads JavaScript file with functionality specific to Twenty Thirteen.
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2014-06-08', true );

	// Add Source Sans Pro and Bitter fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'twentythirteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'twentythirteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
*
* @since Twenty Thirteen 1.0
*/
function twentythirteen_post_nav() {
	global $post;

	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'twentythirteen' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' );
	else
		$format_prefix = '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_the_attached_image() {
	/**
	 * Filter the image attachment size to use.
	 *
	 * @since Twenty thirteen 1.0
	 *
	 * @param array $size {
	 *     @type int The attachment height in pixels.
	 *     @type int The attachment width in pixels.
	 * }
	 */
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$post                = get_post();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'twentythirteen_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Twenty Thirteen 1.4
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function twentythirteen_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentythirteen_excerpt_more' );
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';

	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';

	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_content_width() {
	global $content_width;

	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JavaScript handlers to make the Customizer preview
 * reload changes asynchronously.
 *
 * @since Twenty Thirteen 1.0
 */
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );


function is_role($role="project"){
	$user = wp_get_current_user();
	if( in_array( $role, (array) $user->roles )) {
	    //The user has the "author" role
	    return true;
	}
	return false;
}
function is_acondition(){
	
	if(isset($_SESSION['project']['id'])){
		// si existe un projecto en curso & acepto terminos
		if(have_draft()){
				return true;
		}
		return false;
	} else{
		// si existe un projecto en curso & acepto terminos
		if(have_draft()){
			return true;
		}
		return false;
	}
	return false;
}

function have_draft(){
	$user = wp_get_current_user();
	$project = new WP_Query(array('post_type'=>'project','author'=>$user->ID,'post_status' => 'draft','post_per_page'=>1,'order'=>'DESC'));
	if($project->found_posts>0){
		if($project->have_posts()) { $project->the_post();
			$_SESSION['project']['id'] = get_the_ID();
			
			return true;
		}
	}
	@session_destroy();	
	
	return false;
}
function publish_to_draft(){
	global $wpdb;
	if(isset(user_current_project()->ID)){
		if(!empty(user_current_project()->ID)){
			$wpdb->query( 
			    $wpdb->prepare( 
			        "UPDATE $wpdb->posts SET post_status = 'draft' WHERE ID = %d", 
			        user_current_project()->ID
			    )
			);
	      }
	 
	}
}


add_action('init', 'session_go');
function session_go() {
    if(!session_id()) {
        session_start();
    }
}

add_action('wp_ajax_project_save', 'project_save');
/*
	code 00: correcto
	code 01: error insert
	code 02: error funcion dinamica
	code 03: no acepto termino condiciones o no es un proyecto draft
 */
function project_save(){
	$_POST = clearHack($_POST);
	try {
		extract($_POST,EXTR_SKIP);
		call_user_func($step);
	} catch(Exception $e){
		die(json_encode(array('code'=>'02','message'=>$e->getMessage())));
	}
}
function elegibility(){
	if(!isset($_SESSION['project']['id'])){
		$_SESSION['project'] = array();
		$user = wp_get_current_user();
		if($post_id = wp_insert_post(array(
				'post_name' => sanitize_title("Temp Project {$user->ID}"),
				'post_title'=> "",
				'post_status'=>'draft',
				'post_type' => 'project',
				'post_author'=>$user->ID 
		))){
			update_post_meta($post_id, 'conditions ','1');
			$id_item_id = get_mid_by_key($post_id,'conditions ');
			global $wpdb;
			$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
			 VALUES ( $id_item_id, 'conditions' , 1,1 ,$post_id )");
			$_SESSION['project']['id'] = $post_id;
			die(json_encode(array('code'=>'00','url'=> get_permalink(14))));
		} else {
			die(json_encode(array('code'=>'01')));
		}
	}
	die(json_encode(array('code'=>'00')));
}

function basics(){
	if(have_draft()){
		try{

			$post_id = $_SESSION['project']['id'];
			$post_update = array(
			      'ID'           => $_SESSION['project']['id'],
			      'post_title' => $_POST['post_title'],
			      'post_name' => sanitize_title($_POST['post_title'])
			  );
			wp_update_post($post_update);
			global $wpdb;
			update_post_meta($post_id, 'describe_project ',$_POST['describe']);
			$id_item_id = get_mid_by_key($post_id,'describe_project ');
			$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
			VALUES ( $id_item_id, 'describe_project' , 1,1 ,$post_id )");
			update_post_meta($post_id, 'type_project_product_or_service',0);
			update_post_meta($post_id, 'type_project_event_or_expo',0);
			update_post_meta($post_id, 'type_project_non_profit',0);
			if((int) $_POST['checkboxes']==1){
				update_post_meta($post_id, 'type_project_product_or_service',1);
				$id_item_id = get_mid_by_key($post_id,'type_project_product_or_service ');
				$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
				VALUES ( $id_item_id, 'type_project_product_or_service' , 1,1 ,$post_id )");
			} else if((int) $_POST['checkboxes']==2){
				update_post_meta($post_id, 'type_project_event_or_expo',1);
				$id_item_id = get_mid_by_key($post_id,'type_project_event_or_expo');
				$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
				VALUES ( $id_item_id, 'type_project_event_or_expo' , 1,1 ,$post_id )");
			} else if((int) $_POST['checkboxes']==3){
				update_post_meta($post_id, 'type_project_non_profit',1);
				$id_item_id = get_mid_by_key($post_id,'type_project_non_profit');
				$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
				VALUES ( $id_item_id, 'type_project_non_profit' , 1,1 ,$post_id )");
			}
			if(@is_array($_POST['file'])){
				update_post_meta($post_id, 'logo_project  ',end($_POST['file']));
				$id_item_id = get_mid_by_key($post_id,'logo_project  ');
				$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
				VALUES ( $id_item_id, 'logo_project' , 1,1 ,$post_id )");
			}

			delete_mf2($post_id,'choose_a_colour');
			insert_mf2($post_id,'choose_a_colour',$_POST['choose_a_colour']);
			
			$permalink = ($_POST['option']=="continue")? get_permalink(17):"";
			die(json_encode(array('code'=>'00','url'=>$permalink)));
		 } catch(Exception $e){
			die(json_encode(array('code'=>'01','message'=>$e->getMessage())));
		}
	}
	die(json_encode(array('code'=>'03')));
}

function details(){
	if(have_draft()){
		try{
			global $wpdb;
			$post_id = (int) $_SESSION['project']['id'];	
			update_post_meta($post_id, 'detail_of_project_detailed',$_POST['detail_of_project_detailed']);
			$id_item_id = get_mid_by_key($post_id,'detail_of_project_detailed ');
			$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
			VALUES ( $id_item_id, 'detail_of_project_detailed' , 1,1 ,$post_id )");
			
			update_post_meta($post_id, 'detail_of_project_for',$_POST['detail_of_project_for']);
			$id_item_id = get_mid_by_key($post_id,'detail_of_project_for');
			$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
			VALUES ( $id_item_id, 'detail_of_project_for' , 1,1 ,$post_id )");
			$serial = $_POST['detail_of_project_old_people'];
			
			update_post_meta($post_id, 'detail_of_project_old_people',$serial);
	
			$id_item_id = get_mid_by_key($post_id,'detail_of_project_old_people');
			$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
			VALUES ( $id_item_id, 'detail_of_project_old_people' , 1,1 ,$post_id )");
		
			if(@is_array($_POST['file'])){
				update_post_meta($post_id, 'logo_project  ',end($_POST['file']));
				$id_item_id = get_mid_by_key($post_id,'logo_project  ');
				$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
				VALUES ( $id_item_id, 'logo_project' , 1,1 ,$post_id )");
			}
			$permalink = ($_POST['option']=="continue")? get_permalink(19):"";
			die(json_encode(array('code'=>'00','url'=>$permalink)));
		 } catch(Exception $e){
			die(json_encode(array('code'=>'01','message'=>$e->getMessage())));
		}
	}
	die(json_encode(array('code'=>'03')));
}

function visuals(){
	if(have_draft()){
		try{
			global $wpdb;
			$post_id = (int) $_SESSION['project']['id'];
			update_post_meta($post_id, 'visuals_project_url_video',$_POST['visuals_project_url_video']);
			$id_item_id = get_mid_by_key($post_id,'visuals_project_url_video ');
			$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
			VALUES ( $id_item_id, 'visuals_project_url_video' , 1,1 ,$post_id )");
			
			if(@is_array($_POST['visuals_project_find_project'])){
				$contador = 1;
				delete_mf2($post_id, 'visuals_project_find_project');
				foreach($_POST['visuals_project_find_project'] as $key => $value){
					insert_mf2($post_id,'visuals_project_find_project',$_POST['visuals_project_find_project'][$key],$contador);
					$contador++;
				}
				
			}
			$contador = 0;
			$aditionalcontar = 1;
			if(@is_array($_POST['file']['visuals_project_display']) ){
				delete_mf2($post_id, 'visuals_project_display');
				add_post_meta($post_id, 'visuals_project_display',@end($_POST['file']['visuals_project_display']));
				$id_item_id =  $wpdb->insert_id;
				$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
				VALUES ( $id_item_id, 'visuals_project_display' , 1,1 ,$post_id )");
			}
			if(@is_array($_POST['file']['visuals_project_aditional_photos'])){
				
				delete_mf2($post_id, 'visuals_project_aditional_photos');
				foreach($_POST['file']['visuals_project_aditional_photos'] as $key => $value){
						add_post_meta($post_id, 'visuals_project_aditional_photos',$_POST['file']['visuals_project_aditional_photos'][$key]);
						$id_item_id =  $wpdb->insert_id;
						$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
						VALUES ( $id_item_id, 'visuals_project_aditional_photos' , $aditionalcontar,1 ,$post_id )");
						$aditionalcontar++;
					
				}

			}
			$permalink = ($_POST['option']=="continue")? get_permalink(21):"";
			die(json_encode(array('code'=>'00','url'=>$permalink)));
		}catch(Exception $e){
			die(json_encode(array('code'=>'01','url'=>'','message'=>$e->getMessage())));
		}
	}
	die(json_encode(array('code'=>'03','url'=>'')));
}

function team (){
	if(have_draft()){
		try{
			global $wpdb;
			$post_id = (int) $_SESSION['project']['id'];

			delete_mf2($post_id,'team_project_old');
			insert_mf2($post_id,'team_project_old',$_POST['team_project_old']);

			delete_mf2($post_id,'team_project_sex');
			insert_mf2($post_id,'team_project_sex',$_POST['team_project_sex']);

			delete_mf2($post_id,'team_project_role');
			insert_mf2($post_id,'team_project_role',$_POST['team_project_role']);
			
			delete_mf2($post_id,'team_project_skills');
			insert_mf2($post_id,'team_project_skills',$_POST['team_project_skills']);
			
			


			if(isset($_POST['file']['team_project_profile_picture'][0])){
				if(!empty($_POST['file']['team_project_profile_picture'][0])){
					delete_mf2($post_id,'team_project_profile_picture');
					insert_mf2($post_id,'team_project_profile_picture',@end($_POST['file']['team_project_profile_picture']));
				}	
			}

			if(isset($_POST['file']['team_project_proof_id'][0])){
				if(!empty($_POST['file']['team_project_proof_id'][0])){
					delete_mf2($post_id,'team_project_proof_id');
					insert_mf2($post_id,'team_project_proof_id',@end($_POST['file']['team_project_proof_id']));
				}	
			}
			delete_mf2($post_id,'team_project_find_people');
			insert_mf2($post_id,'team_project_find_people',$_POST['team_project_find_people']);

			delete_mf2($post_id,'member_project_other_people');
			insert_mf2($post_id,'member_project_other_people',$_POST['member_project_other_people']);
			if(!empty($_POST['member_project_project_password'])){
				delete_mf2($post_id,'member_project_project_password');
				insert_mf2($post_id,'member_project_project_password',$_POST['member_project_project_password']);
			}
			$contador = 1;
			

			delete_mf2($post_id,'other_member_project_role');
			delete_mf2($post_id,'other_member_project_age');
			delete_mf2($post_id,'other_member_project_gender');
			delete_mf2($post_id,'other_member_project_skills');			
			foreach($_POST['other_member_project_role'] as $key => $value){
				insert_mf2($post_id,'other_member_project_role',$_POST['other_member_project_role'][$key],1,$contador);
				insert_mf2($post_id,'other_member_project_age',$_POST['other_member_project_age'][$key],1,$contador);
				insert_mf2($post_id,'other_member_project_gender',$_POST['other_member_project_gender'][$key],1,$contador);
				insert_mf2($post_id,'other_member_project_skills',$_POST['other_member_project_skills'][$key],1,$contador);
				$contador++;
			}
			$contador = 1;
			if(is_array($_POST['file']['other_member_project_picture'])){
				delete_mf2($post_id,'other_member_project_picture');
				foreach($_POST['file']['other_member_project_picture'] as $key => $value){
					insert_mf2($post_id,'other_member_project_picture',$_POST['file']['other_member_project_picture'][$key],1,$contador);	
					$contador++;
				}
			}
			$contador = 1;
			if(is_array($_POST['file']['other_member_project_proof_id'])){
				delete_mf2($post_id,'other_member_project_proof_id');
				foreach($_POST['file']['other_member_project_proof_id'] as $key => $value){
					insert_mf2($post_id,'other_member_project_proof_id',$_POST['file']['other_member_project_proof_id'][$key],1,$contador);	
					$contador++;
				}
			}
			
			$permalink = ($_POST['option']=="continue")? get_permalink(23):"";
			die(json_encode(array('code'=>'00','url'=>$permalink)));
		} catch(Exception $e){
			die(json_encode(array('code'=>'01','url'=>'','message'=>$e->getMessage())));
		}
	}
	die(json_encode(array('code'=>'03','url'=>'')));

}

function plan(){
	if(have_draft()){
		try{
			global $wpdb;
			$post_id = (int) $_SESSION['project']['id'];

			
			

			delete_mf2($post_id,'plan_project_stir_money');
			insert_mf2($post_id,'plan_project_stir_money',$_POST['plan_project_stir_money']);

			delete_mf2($post_id,'plan_project_support');
			insert_mf2($post_id,'plan_project_support',$_POST['plan_project_support']);

			delete_mf2($post_id,'plan_project_future');
			insert_mf2($post_id,'plan_project_future',$_POST['plan_project_future']);
			$permalink = "";
			$permalink = ($_POST['option']=="continue")? get_permalink(41):$permalink;
			$permalink = ($_POST['option']=="publish")? get_permalink($post_id):$permalink;
			

			die(json_encode(array('code'=>'00','url'=>$permalink)));
		} catch(Exception $e){
			die(json_encode(array('code'=>'01','url'=>'','message'=>$e->getMessage())));
		}
	}
	die(json_encode(array('code'=>'03','url'=>'')));
}

function preview(){
	try{
	
		if(have_draft()){
			
			$post_id = (int) $_SESSION['project']['id'];
			$user = wp_get_current_user();
			$post_update = array(
			      'ID'           => $post_id,
			      'post_status' => "pending",
			      'post_author'=>$user->ID 
			  );
			wp_update_post($post_update);
			$permalink = "";
			
			$permalink = ($_POST['option']=="publish")? get_bloginfo('url'):$permalink;
			die(json_encode(array('code'=>'00','url'=>$permalink)));
		}
		
	} catch(Exception $e){
		die(json_encode(array('code'=>'01','url'=>'','message'=>$e->getMessage())));
	}
}

function get_project(){
	$post_id = (have_draft())? $_SESSION['project']['id'] : (int) $_GET['project_id'];
	$project = array('id'=>1,'post_title'=>'','logo'=>'','describe'=>'','detail_of_project_detailed'=>'','choose_a_colour'=>'',
		'detail_of_project_old_people'=>'','detail_of_project_for'=>'','checkboxes'=>'','visuals_project_display'=>''
		,'visuals_project_aditional_photos'=>"",'visuals_project_url_video'=>'','visuals_project_find_project'=>"",
		'team_project_old' => '', 'team_project_sex'=>'', 'team_project_role'=>'','team_project_skills'=>'',
		'team_project_profile_picture'=>'', 'team_project_find_people'=>'','member_project_other_people'=>'','member_project_project_password',
		'member_project_member_email'=>'','plan_project_stir_money'=>'','plan_project_support'=>'','plan_project_future'=>'','members'=>'','team_project_proof_id'=>''
		);
	if($post_id != 0 && !empty($post_id)){
		$user = wp_get_current_user();
		
		wp_reset_query();
		wp_reset_postdata();
		$project = new WP_Query(array('post_type'=>'project','author'=>$user->ID,'p'=>$post_id,'post_status' => 'draft','post_per_page'=>1));
		if($project->found_posts > 0){
				if($project->have_posts()){ $project->the_post();
					$checkboxes = 0;
					if(get('type_project_non_profit')==1) $checkboxes = 3;
					if(get('type_project_event_or_expo')==1) $checkboxes = 2;
					if(get('type_project_product_or_service')==1) $checkboxes = 1;

					$project = array(
						'id'=>get_the_ID(),
						'post_title'=>get_the_title(),
						'logo' => get('logo_project'),
						'describe'=> get('describe_project'),
						'checkboxes' => $checkboxes,
						'choose_a_colour'=>get('choose_a_colour'),
						'detail_of_project_detailed'=> get('detail_of_project_detailed'),
						'detail_of_project_old_people'=> get('detail_of_project_old_people'),
						'detail_of_project_for'=> get('detail_of_project_for'),
						'visuals_project_display'=> get('visuals_project_display'),
						'visuals_project_url_video'=>get('visuals_project_url_video'),
						'team_project_old' => get('team_project_old'),
						'team_project_sex'=> get('team_project_sex'),
						'team_project_role'=> get('team_project_role'),
						'team_project_skills'=> get('team_project_skills'),
						'team_project_profile_picture'=> get('team_project_profile_picture'),
						'team_project_find_people'=> get('team_project_find_people'),
						'member_project_other_people'=> get('member_project_other_people'),
						'member_project_project_password'=> get('member_project_project_password'),
						'plan_project_stir_money'=> get('plan_project_stir_money'),
						'plan_project_support'=>get('plan_project_support'),
						'plan_project_future'=> get('plan_project_future'),
						'team_project_proof_id'=>get('team_project_proof_id')
					);
					$visual_project_photo = get_order_field('visuals_project_aditional_photos');
					foreach($visual_project_photo as $photo){
						$project['visuals_project_aditional_photos'][] =get('visuals_project_aditional_photos',1,$photo);
					}
					$visuals_project_find_project = get_order_field('visuals_project_find_project');
					foreach($visuals_project_find_project as $find){
						$project['visuals_project_find_project'][] =get('visuals_project_find_project',1,$find);
					}
					$member_project_member_email = get_order_field('member_project_member_email');
					foreach($member_project_member_email as $member){
						$project['member_project_member_email'][] =get('member_project_member_email',1,$member);
					} 
					$contador = 0;
					$other_member_project_role = get_order_group('other_member_project_role');
					foreach($other_member_project_role as $member){
						$project['members'][$contador]['other_member_project_role'] = get('other_member_project_role',$member);
						$project['members'][$contador]['other_member_project_age'] = get('other_member_project_age',$member);
						$project['members'][$contador] ['other_member_project_gender']= get('other_member_project_gender',$member);
						$project['members'][$contador]['other_member_project_picture'] = get('other_member_project_picture',$member);
						$project['members'][$contador]['other_member_project_skills'] = get('other_member_project_skills',$member);
						$contador++;
					}

				}
			} 
	} 
	
	return $project;
	
}

add_action('wp_ajax_upload_files', 'upload_files');
function upload_files(){
	
	$imagesExts = array(
	  'image/gif',
	  'image/jpeg',
	  'image/pjpeg',
	  'image/png',
	  'image/x-png'
	);
	$resp = array();

	foreach($_FILES as $key => $value){
	 	if(!empty($_FILES[$key]['tmp_name']) && !is_array($_FILES[$key]['tmp_name']) ){
	 		 if(in_array($_FILES[$key]["type"],$imagesExts)){
			 	if($_FILES[$key]['size'] <4194304){
			 		 $special_chars = array(' ','`','"','\'','\\','/'," ","#","$","%","^","&","*","!","~","‘","\"","’","'","=","?","/","[","]","(",")","|","<",">",";","\\",",","+","-");
			          $filename = str_replace($special_chars,'',$_FILES[$key]['name']);
			          $filename = round(microtime(true) * 100) . $filename;
			          @move_uploaded_file( $_FILES[$key]['tmp_name'], MF_FILES_DIR . $filename );
			          @chmod(MF_FILES_DIR . $filename, 0644);
			          $info = pathinfo(MF_FILES_DIR . $filename);
			          $resp[] = array(
			            'error' => false, 
			            'name' => $filename,
			            'file_path' => MF_FILES_DIR . $filename,
			            'file_url' => MF_FILES_URL . $filename,
			             'key_file' => $key,
			            'encode_file_url' => urlencode(MF_FILES_URL . $filename)
			          );
			   	} else{
			   		unset($_FILES[$key]);
			   	}
		    } else{
		    	unset($_FILES[$key]);
		    }
	 	} else if(!empty($_FILES[$key]['tmp_name']) && is_array($_FILES[$key]['tmp_name']) ){
		 		foreach($_FILES[$key]['tmp_name'] as $keyc => $valuec){
		 			if(in_array($_FILES[$key]["type"][$keyc],$imagesExts)){	
		 				if($_FILES[$key]['size'][$keyc] <4194304){
				 		  $special_chars = array(' ','`','"','\'','\\','/'," ","#","$","%","^","&","*","!","~","‘","\"","’","'","=","?","/","[","]","(",")","|","<",">",";","\\",",","+","-");
				          $filename = str_replace($special_chars,'',$_FILES[$key]['name'][$keyc]);
				          $filename = round(microtime(true) * 100) . $filename;
				          @move_uploaded_file( $_FILES[$key]['tmp_name'][$keyc], MF_FILES_DIR . $filename );
				          @chmod(MF_FILES_DIR . $filename, 0644);
				          $info = pathinfo(MF_FILES_DIR . $filename);
				          $resp[] = array(
				            'error' => false, 
				            'name' => $filename,
				            'file_path' => MF_FILES_DIR . $filename,
				            'file_url' => MF_FILES_URL . $filename,
				            'key_file' => $key,
				            'encode_file_url' => urlencode(MF_FILES_URL . $filename)
				          );
				        }
			        }
		        }
		    
	 	}
		 
	}
	die(json_encode($resp));
}
function get_mid_by_key( $post_id, $meta_key ) {
  global $wpdb;
  $mid = $wpdb->get_var( $wpdb->prepare(
  		"SELECT meta_id FROM $wpdb->postmeta WHERE post_id = %d AND meta_key = %s", $post_id, $meta_key)
  	 );
  if( $mid != '' )
    return (int)$mid;
 
  return false;
}


function insert_mf2($post_id,$meta_key,$meta_value,$field_count=1,$group_count=1){
	global $wpdb;
	try{
		add_post_meta($post_id, $meta_key ,$meta_value);
		$id_item_id =  $wpdb->insert_id;
	
		$wpdb->query("INSERT INTO wp_mf_post_meta ( meta_id, field_name, field_count, group_count, post_id )
		VALUES ( $id_item_id, '$meta_key' , $field_count,$group_count ,$post_id )");
		return true;
	} catch(Exception $e){
		return false;
	}
	return false;
}

function delete_mf2($post_id, $meta_key){
	global $wpdb;
	try{
		$wpdb->query( "DELETE FROM ". MF_TABLE_POST_META ." WHERE post_id= {$post_id} 
					and field_name='$meta_key' " );
		delete_post_meta($post_id, $meta_key);
		return true;
	} catch(Exception $e){
		return false;
	}
	return false;
}

add_filter('pre_get_posts', 'posts_for_current_author');
function posts_for_current_author($query) {
	if($query->is_admin && is_role('project')) {
		global $user_ID;
		$query->set('author',  $user_ID);
	}
	return $query;
}

function clearHack($_post){
	foreach ($_post as $key => $value){
		if(is_array($_post[$key])){
			$_post[$key]=clearHack($_post[$key]);
		}else{
			$_post[$key] = xss_clean($value);
		}
	}
	return $_post;
}
function xss_clean($data)
{
	// Fix &entity\n;
	$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

	// Remove any attribute starting with "on" or xmlns
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	// Remove javascript: and vbscript: protocols
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

	// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

	// Remove namespaced elements (we do not need them)
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

	do
	{
	        // Remove really unwanted tags
	        $old_data = $data;
	        $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml|script)[^>]*+>#i', '', $data);
	}
	while ($old_data !== $data);

	// we are done...
	return $data;
}
function strposa($haystack, $needles=array(), $offset=0) { 
	$chr = array(); 
	foreach($needles as $key => $needle) {
		$res = strpos($haystack, $needle); 
		if ($res !== false) $chr[] = $needle; 
	} 
	if(count($chr) > 0){
		 return json_encode($chr);
	 } else{ 
	 	return false;
	 } 
}
/*
 *	code 00: support
 *	code 01: isset support 
 *  code 02: not support you project
 *	code 03: catch out
 */
add_action('wp_ajax_support', 'support');
function support(){
	global $wpdb;
	$user = wp_get_current_user();
	$post_id = (int) $_POST["post_id"];
	try{
		$support  = $wpdb->get_var( "SELECT COUNT(*) FROM wp_project_support 
			WHERE id_project=".$post_id." and id_user=".(int)$user->ID );
		$project = new WP_Query(array('post_type'=>'project','author'=>$user->ID,
			'post_status' => array('publish','draft'),'p'=>$post_id));
		
		if($project->found_posts==0){
			if($support==0){
				$wpdb->insert( 
				'wp_project_support', 
					array( 
						'id_user' => $user->ID, 
						'id_project' => $post_id,
						'age' => $_POST['age'],
						'cool' => $_POST['cool'],
						'clear' => $_POST['clear'],
						'capable'=> $_POST['capable'],
						'support'=> $_POST['support'],
						'comment' => $_POST['comment'],
						'city'	=> $_POST['city']
					), 
					array( 
						'%d', 
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s'
					) 
				);
				update_post_meta( $post_id, '_count_support', support_count($post_id));	
				die(json_encode(array('code'=>'00','message'=>'Thanks for supporting this project','state'=>'success')));
			}
			die(json_encode(array('code'=>'01','message'=>'You already support this project','state'=>'error')));
		} else{
			die(json_encode(array('code'=>'02','message'=>'You can not give support to your project','state'=>'error')));
		}
	} catch(Exception $e){
		die(json_encode(array('code'=>'03','message'=>$e->getMessage(),'state'=>'error')));
	}
}
function user_publishproject(){
	$user = wp_get_current_user();
	$args = array(
	    'author'      => $user->ID,
	    'post_status' => array(
	        'publish',
	        'pending'
	        
	    ),
	    'post_type'=>'project'
	);
	$posts = new WP_Query($args);
	
	$post_count = $posts->found_posts;
	if($post_count>0)
		return true;
	return false;
	
}
function support_count($id_project=0){
	global $wpdb;
	$count  = $wpdb->get_var( "SELECT COUNT(*) FROM wp_project_support WHERE id_project=".$id_project);
	return $count;
}
function support_project($id_project= 0){
	global $wpdb;
	$support =  $wpdb->get_results( "SELECT * FROM wp_project_support WHERE id_project=".$id_project, OBJECT);
	return $support;
}
function stat_project($id_project=0,$market_age=""){
	global $wpdb;
	$support =  $wpdb->get_results( "SELECT * FROM wp_project_support  ", OBJECT);
	$market_support = $market_age;
    $count = 0;
    $count_all = 0;
    $all_market_cool =0;
    $all_market_clear =0;
    $all_market_capable =0;
    $total_market_cool = 0;
    $total_market_clear = 0;
    $total_market_capable = 0;
    foreach($support as $supported){
        

        if(is_array($market_support)){
	         if(in_array( "0-5 (TODDLERS)",$market_support) && ($supported->age >= 0 || $supported->age <=5) && $id_project== $supported->id_project ){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( in_array("6-12 (CHILDREN)",$market_support) &&($supported->age >= 6 || $supported->age <=12) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( in_array("13-17 (TEENAGERS)",$market_support) &&($supported->age >= 13 || $supported->age <=17) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	         if(in_array("18-25 (YOUNG ADULTS)", $market_support) && ($supported->age >= 18 || $supported->age <=25) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( in_array("26-35 (ADULTS)",$market_support) &&($supported->age >= 26 || $supported->age <=35) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	         if(in_array("36-50 (MIDDLE-AGED)",$market_support) &&($supported->age >= 36 || $supported->age <=50) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( in_array("50-65 (MATURE)",$market_support) &&($supported->age >= 50 || $supported->age <=65) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( in_array("66+ (SENIOR)",$market_support) &&($supported->age >= 66) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	    } else{
	    	if($market_support == "0-5 (TODDLERS)" && ($supported->age >= 0 || $supported->age <=5) && $id_project== $supported->id_project ){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( $market_support=="6-12 (CHILDREN)" &&($supported->age >= 6 || $supported->age <=12) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( $market_support=="13-17 (TEENAGERS)" &&($supported->age >= 13 || $supported->age <=17) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	         if( $market_support=="18-25 (YOUNG ADULTS)" &&($supported->age >= 18 || $supported->age <=25) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( $market_support=="26-35 (ADULTS)" &&($supported->age >= 26 || $supported->age <=35) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	         if( $market_support=="36-50 (MIDDLE-AGED)" &&($supported->age >= 36 || $supported->age <=50) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( $market_support=="50-65 (MATURE)" &&($supported->age >= 50 || $supported->age <=65) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }
	        if( $market_support=="66+ (SENIOR)" &&($supported->age >= 66) && $id_project== $supported->id_project){
	            $total_market_cool = $total_market_cool + $supported->cool;
	            $total_market_clear = $total_market_clear + $supported->clear;
	            $total_market_capable = $total_market_capable + $supported->capable; 
	            $count++;
	        }

	    }
        $all_market_cool = $all_market_cool + $supported->cool;
        $all_market_clear = $all_market_clear + $supported->clear;
        $all_market_capable = $all_market_capable + $supported->capable;                                   
        $count_all++;


    }
	$stat['count_project'] = $count;
	$stat['count_all_project'] = $count_all;
	$stat['all_market_cool'] = $all_market_cool;
	$stat['all_market_clear'] = $all_market_clear;
	$stat['all_market_capable'] = $all_market_capable;
	$stat['total_market_cool'] = $total_market_cool;
	$stat['total_market_clear'] = $total_market_clear;
	$stat['total_market_capable'] = $total_market_capable;
	return $stat;

}
add_action( 'admin_menu', 'adjust_the_wp_menu', 999 );
function adjust_the_wp_menu() {
  if(is_role('project')){
  	$page = remove_menu_page('edit.php?post_type=project' );
  	$page = remove_submenu_page( 'edit.php?post_type=project', 'post-new.php?post_type=project' );
  	$page = remove_submenu_page( 'edit.php?post_type=project', 'edit.php?post_type=project' );
  	
  }
}
function hide_buttons()
{
	global $current_screen;
	if(is_role('project')){
		if($current_screen->id == 'page');
		{
			echo '<style>.add-new-h2{display: none;}.wrap .subsubsub{display:none;}#wp-admin-bar-new-content{display:none;}</style>';
		}
		show_admin_bar(false);
	}
// for posts the if statement would be:
// if($current_screen->id == 'edit-post' && !current_user_can('publish_posts'))
}
add_action('admin_head','hide_buttons');

add_action('after_setup_theme', 'remove_admin_bar');

// auto login
/*function auto_login_new_user( $user_id ) {
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id);
            // You can change home_url() to the specific URL,such as 
        //wp_redirect( 'http://www.wpcoke.com' );
        wp_redirect( 'http://causeastir.com.au/#welcome' );
        exit;
    }
add_action( 'user_register', 'auto_login_new_user' );
*/	



function remove_admin_bar() {

	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

function user_current_project(){
	$user = wp_get_current_user();
	$project = new WP_Query(array('post_type'=>'project','post_status' => 'any','author'=>$user->ID,'post_per_page'=>1));
	return $project->post;
}

add_action( 'admin_menu', 'register_menu_my_project' );

function register_menu_my_project() {
	if(is_role('project')){
		add_menu_page( 'My Project', 'My Project', 'edit_projects','/post.php?post='.user_current_project()->ID.'&action=edit', '','dashicons-welcome-write-blog',10 );
	}
}

add_action('init', 'admin_project_access');
function admin_project_access() {
	if( defined('DOING_AJAX') && DOING_AJAX ) {
	        //Allow ajax calls
	        return;
	 }	
	if(is_admin()){
    	if(is_role('project')){
    		$current_user = user_current_project();
    		wp_redirect(get_bloginfo('url'));
    	}
    }
}

function support_orderby_desc($orderby) {
	global $wpdb;
	$orderby = "wp_postmeta.meta_value+0 DESC";
	return $orderby;
}

if(is_role('administrator')){
	  add_action( 'save_post', 'featured_project_save_post', 10, 2 );
	  add_action( 'add_meta_boxes', 'featured_project_add_post_meta_boxes' );
}

function featured_project_add_post_meta_boxes() {
		  add_meta_box(
		    'super-feature-post',      // Unique ID
		    esc_html__( 'Feature Post', 'Feature Post' ),    // Title
		    'feature_post_fc',   // Callback function
		    'project',         // Admin page (or post type)
		    'side',         // Context
		    'default'         // Priority
		  );
}


function feature_post_fc( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p><?php $featured =  get_post_meta( $object->ID, 'featured_project', true ) ;  ?>
    <label for="featured_project"><?php _e( "Featured Project", 'example' ); ?></label> &nbsp;&nbsp;<input type="checkbox"  name="featured_project" id="featured_project" value="1" <?php if($featured=="1") echo "checked";?>>
   
  </p>
<?php }

function featured_project_save_post( $post_id, $post ) {
  /* Verify the nonce before proceeding. */

  if ( !isset( $_POST['featured_project'] )  )
 		$_POST['featured_project'] ='2';

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['featured_project'] ) ? sanitize_html_class( $_POST['featured_project'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'featured_project';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}


function wpse18703_posts_where( $where, &$wp_query )
{
    global $wpdb;
    if ( $wpse18703_title = $wp_query->get( 'project_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $wpse18703_title ) ) . '%\'';
    }
    return $where;
}
add_filter( 'posts_where', 'wpse18703_posts_where', 10, 2 );

function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
function get_vimeo_id($url) {
    return (int) substr(parse_url($url, PHP_URL_PATH), 1);
}

function getFrameVideo($url) {
	if(!empty($url)){
	    if (strpos($url, 'youtube') > 0) {
	        return '<iframe id="ytplayer"  width="100%" height="390" src="http://www.youtube.com/embed/'.getYoutubeIdFromUrl($url).'"></iframe>';
	    } elseif (strpos($url, 'vimeo') > 0) {
	        return '<iframe src="//player.vimeo.com/video/'.get_vimeo_id($url).'" width="100%" height="390" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
	    } else {
	        return '';
	    }
    }
}

add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( home_url() );
  exit();
}

add_action('admin_menu', 'menu_review');
function menu_review(){
    add_menu_page('Support Project', 'Support Project', 'edit_pages', 'review-support', 'review_support','dashicons-admin-page',64 );
    add_submenu_page('Review Support', 'Review Support', 'Review Support', 'edit_pages', 'review-support','review_support' );
    add_menu_page('Donate Project', 'Donate Project', 'edit_pages', 'donate-project', 'donate_project','dashicons-admin-page',65);
    add_submenu_page('Donate Project', 'Donate Project', 'Donate Project', 'edit_pages', 'donate-project','donate_project' );
}
function donate_project(){

global $wpdb;
	

	$paged = (isset($_GET['paged']) && $_GET['paged']>0) ? (int) $_GET['paged'] : 1;
	$termino = (isset($_GET['termino'])) ? @$_GET['termino'] : @$_POST['termino'];
    $post_per_page = 20; //6
	$offset = ($paged - 1)*$post_per_page;
	
	$query = "SELECT wpr.*, wpo.post_title, wpo.ID as id_project FROM  {$wpdb->prefix}project_donate as wpr
			  LEFT JOIN {$wpdb->prefix}posts as wpo ON wpr.id_project = wpo.ID
			  ORDER by wpr.id DESC
			  ";
	
	$total_result = count($wpdb->get_results( $query, OBJECT));	
	$max_num_pages = ceil($total_result / $post_per_page);	
	
	$query = $query . " LIMIT ".$offset.", ".$post_per_page."; ";
	
	$donates = $wpdb->get_results($query,OBJECT);
	
	?>
	<style> 
		.button-primary.red,.button-primary.red:hover{ background:#FF424F;border-color:#AC0037;box-shadow:none;-webkit-box-shadow:none }
		.filtro{margin-top:10px; margin-bottom: 10px;}
	</style>
	<div class="wrap">
	<h2>Project Donate</h2><br/>
	<?php if(count($donates)>0){;?>
	<table class="wp-list-table widefat fixed posts">
		<thead>
			<tr>
				<th class="manage-column" width="50">#</th>
				
				<th class="manage-column">ID PayPal Donate</th>
				<th class="manage-column">Email Donate</th>
				<th class="manage-column">Name Donate</th>
				<th class="manage-column">Country Donate</th>
				<th class="manage-column">Zip Donate</th>
				<th class="manage-column">State Donate</th>
				<th class="manage-column">City Donate</th>
				<th class="manage-column">Street Donate</th>
				<th class="manage-column">Amount Donate</th>				
				<th class="manage-column">Amount Shipping</th>
				<th class="manage-column">Payment Amount</th>
				<th class="manage-column">Project</th>
				<th class="manage-column">Owner</th>
				<th class="manage-column">Date Operation</th>
				
			</tr>
		</thead>
		<tbody>
	<?php
		$contador=0;

		foreach($donates as $donate){
			//$user_info = get_userdata($donate->id_user);
			//$url_delete = admin_url("admin.php?page=review-support&paged={$paged}&delete={$review->id}");
	?>
		<tr <?php if($contador%2):?>class="alternate"<?php endif;?>>
			<td><?php echo $donate->id;?></td>
			
			<td><?php echo $donate->payer_id;?></td>
			<td><?php echo $donate->payer_email;?></td>
			<td><?php echo $donate->payer_name;?></td>
			<td><?php echo $donate->address_country;?></td>
			<td><?php echo $donate->address_zip;?></td>
			<td><?php echo $donate->address_state;?></td>
			<td><?php echo $donate->address_city;?></td>
			<td><?php echo $donate->address_street;?></td>
			<td><?php echo @($donate->payment_amount - $donate->shipping_amount);?></td>	
			<td><?php echo $donate->shipping_amount;?></td>	
			<td><?php echo $donate->payment_amount;?></td>		
			<td><?php echo $donate->post_title;?></td>
			<td><a href="<?php bloginfo('url');?>/wp-admin/user-edit.php?user_id=<?php echo get_post($donate->id_project)->post_author;?>">
					<?php echo the_author_meta('user_login',get_post($donate->id_project)->post_author);?>
				</a>
			</td>
			<td><?php echo $donate->date_operation;?></td>
			
		</tr>
	<?php
			$contador++;
		}
	?>
		</tbody>
	</table>
	<?php }?>
	</div>
	<?php
	
	global  $wp_query, $max_page, $page;
	$_GET['paged'] > 1 ? $current = (int) $_GET['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $max_num_pages,
		'current' => $current,
		'prev_text' => __('PREV'),
		'next_text' => __('NEXT'),
		'end_size' => 1,
		'mid_size' => 2,
		'show_all' => false,
		'type' => 'plain',

	);
	if(!empty($termino )) $pagination['add_args'] = array('termino'=>$termino);
?>
	<div class="tablenav-pages"><?php echo paginate_links( $pagination );?></div>
<?php
	
}

function review_support(){
	global $wpdb;
	
	if(isset($_GET['delete']) && (int) @$_GET['delete']>0)  delete_review((int) $_GET['delete']);
	$paged = (isset($_GET['paged']) && $_GET['paged']>0) ? (int) $_GET['paged'] : 1;
	$termino = (isset($_GET['termino'])) ? @$_GET['termino'] : @$_POST['termino'];
    $post_per_page = 20; //6
	$offset = ($paged - 1)*$post_per_page;
	
	$query = "SELECT wpr.*, wpo.post_title, wpo.ID as id_project FROM  {$wpdb->prefix}project_support as wpr
			  LEFT JOIN {$wpdb->prefix}posts as wpo ON wpr.id_project = wpo.ID
			  LEFT JOIN {$wpdb->prefix}users as wpu ON wpr.id_user = wpu.ID
			  ";
	$query = (!empty($termino)) ? $query ." WHERE wpu.user_email LIKE '%".$termino."%' ": $query ." ";
	$total_result = count($wpdb->get_results( $query, OBJECT));	
	$max_num_pages = ceil($total_result / $post_per_page);	
	
	$query = $query . " LIMIT ".$offset.", ".$post_per_page."; ";
	
	$reviews = $wpdb->get_results($query,OBJECT);
	
	?>
	<style> 
		.button-primary.red,.button-primary.red:hover{ background:#FF424F;border-color:#AC0037;box-shadow:none;-webkit-box-shadow:none }
		.filtro{margin-top:10px; margin-bottom: 10px;}
	</style>
	<div class="wrap">
	<h2>Reviews Support</h2><br/>
	<div class="filtro"> <form method="POST"><label>Search mail:</label> <input type="text" name="termino" value="<?php echo @$termino;?>"> <button class="button-primary" type="submit">Search</button></form></div>
	<?php if(count($reviews)>0){;?>
	<table class="wp-list-table widefat fixed posts">
		<thead>
			<tr>
				<th class="manage-column" width="50">#</th>
				<th class="manage-column">User Support</th>
				<th class="manage-column">Email Support</th>
				
				<th class="manage-column">Comment</th>
				<th class="manage-column">Project</th>
				<th class="manage-column">Owner</th>
				<th class="manage-column" width="150">Action</th>
			</tr>
		</thead>
		<tbody>
	<?php
		$contador=0;
		foreach($reviews as $review){
			$user_info = get_userdata($review->id_user);
			$url_delete = admin_url("admin.php?page=review-support&paged={$paged}&delete={$review->id}");
	?>
		<tr <?php if($contador%2):?>class="alternate"<?php endif;?>>
			<td><?php echo $review->id;?></td>
			<td><a href="<?php bloginfo('url');?>/wp-admin/user-edit.php?user_id=<?php echo $review->id_user;?>"><?php echo $user_info->user_login;?></a></td>
			<td><?php echo $user_info->user_email;?></td>
			
			<td><?php echo $review->comment;?></td>
			<td><?php echo $review->post_title;?></td>
			<td><a href="<?php bloginfo('url');?>/wp-admin/user-edit.php?user_id=<?php echo get_post($review->id_project)->post_author;?>">
					<?php echo the_author_meta('user_login',get_post($review->id_project)->post_author);?>
				</a>
			</td>
			<td><a href="<?php echo $url_delete;?>" class="button-primary red">Delete</a></td>
		</tr>
	<?php
			$contador++;
		}
	?>
		</tbody>
	</table>
	<?php }?>
	</div>
	<?php
	
	global  $wp_query, $max_page, $page;
	$_GET['paged'] > 1 ? $current = (int) $_GET['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $max_num_pages,
		'current' => $current,
		'prev_text' => __('PREV'),
		'next_text' => __('NEXT'),
		'end_size' => 1,
		'mid_size' => 2,
		'show_all' => false,
		'type' => 'plain',

	);
	if(!empty($termino )) $pagination['add_args'] = array('termino'=>$termino);
?>
	<div class="tablenav-pages"><?php echo paginate_links( $pagination );?></div>
<?php
	
}

function delete_review($id){
	$id = (int) $id;
	global $wpdb;
	$query = "DELETE FROM  {$wpdb->prefix}project_support WHERE id={$id}";
	if($wpdb->query($query)){
?>
	<div id="message" class="updated below-h2" style="margin:15px 15px 0px 0;"><p>Review was delete :) </p></div>
<?php 
	}
}

add_filter('wp_dropdown_users', 'MySwitchUser');
function MySwitchUser($output)
{

    global $post;
    if($post->post_type=='project'){
        $user = get_user_by('id',$post->post_author);
        $output = $user->user_email;
    }
    return $output;

}


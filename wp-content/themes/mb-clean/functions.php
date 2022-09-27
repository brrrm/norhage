<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function html5blank_nav_mobile()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'mobile-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

function html5blank_nav_small()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu-small',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu-small',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
//Footer menu
function html5blank_nav_footer()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'footer-menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}
// HTML5 Blank navigation
function extra_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'extra-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}


// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!
        
        wp_register_script('slickJS', get_template_directory_uri() . '/js/slick.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('slickJS'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

         wp_register_script('CustomJS', get_stylesheet_directory_uri() . '/js/customJS.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('CustomJS'); // Enqueue it!

        wp_register_script('menuExpander', get_stylesheet_directory_uri() . '/js/menuExpander.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('menuExpander'); // Enqueue it!
        
        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
	
	          wp_register_style('SlickCSS', get_template_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
    wp_enqueue_style('SlickCSS'); // Enqueue it!
    
      wp_register_style('slick-theme', get_template_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');
    wp_enqueue_style('slick-theme'); // Enqueue it!
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', '/wp-content/themes/mb-clean/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
         'mobile-menu' => __('Mobile Menu', 'html5blank'), // Main Navigation
        'header-menu-small' => __('Header Menu Small', 'html5blank'),
        'footer-menu' => __('Footer menu', 'html5blank'),
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 30;
}
// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Läs mer', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


// kategorijos pagal id

function my_home_category( $query ) {
 if ( $query->is_home() && $query->is_main_query() ) {
 $query->set( 'cat', '1');
 }
}
add_action( 'pre_get_posts', 'my_home_category' );

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


add_filter( 'wp_nav_menu_top-menu_items', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = ' <span class="arrow_delimiter">></span> ';
	return $defaults;
}
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
add_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',15);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
add_action('woocommerce_custom_title','woocommerce_template_single_title',5);
/*remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);*/
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);


add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" ><i class="icofont-plus"></i></button></div>';
}
  
add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<div class="qselect"><button type="button" class="minus" ><i class="icofont-minus"></i></button>';
}  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">
           
      jQuery(document).ready(function($){   
           
         $('form.cart').on( 'click', 'button.plus, button.minus', function() {
  
            // Get current quantity values
            var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
  
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
              
         });
           
      });
           
      </script>
   <?php
}

function my_remove_email_field_from_comment_form($fields) {
    if(isset($fields['email'])) unset($fields['email']);
    return $fields;
}
add_filter('comment_form_default_fields', 'my_remove_email_field_from_comment_form');

function wpb_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$comment_field2 = $fields['cookies'];
unset( $fields['cookies'] );
$fields['comment'] = $comment_field;
return $fields;
}
 
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );




function override_billing_checkout_fields( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Telefon*';
    $fields['billing']['billing_email']['placeholder'] = 'E-postadress*';
    return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'override_billing_checkout_fields', 20, 1 );

function override_default_address_checkout_fields( $address_fields ) {
	$address_fields['first_name']['placeholder'] = 'Förnamn*';
	$address_fields['last_name']['placeholder'] = 'Efternamn*';
	$address_fields['company']['placeholder'] = 'Företagsnamn (valfritt)';
	$address_fields['address_1']['placeholder'] = 'Gatuadress*';
	$address_fields['address_2']['placeholder'] = 'Gatuadress';
	$address_fields['postcode']['placeholder'] = 'Postnummer*';
	$address_fields['city']['placeholder'] = 'Ort*';
	unset($address_fields['state']);
    return $address_fields;
}
add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1)



?>
<?php  


add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_text', 10, 3);
function woocommerce_custom_sale_text($text, $post, $_product)
{
   return ;
   }

add_action( 'woocommerce_register_form_start', 'bbloomer_add_name_woo_account_registration' );
 
function bbloomer_add_name_woo_account_registration() {
    ?>
 
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
 
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
 
    <div class="clear"></div>
 
    <?php
}
add_action( 'woocommerce_register_form', 'bbloomer_add_name_woo_account_registration2' );
 
function bbloomer_add_name_woo_account_registration2() {
    ?>
 
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_billing_address_1"><?php _e( 'Address', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
    </p>
 
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_billing_postcode"><?php _e( 'Postcode', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
    </p>
     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_billing_city"><?php _e( 'City', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php if ( ! empty( $_POST['billing_city'] ) ) esc_attr_e( $_POST['billing_city'] ); ?>" />
    </p>
 	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?> <span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>
    <div class="clear"></div>
 
    <?php
}

 
///////////////////////////////
// 2. VALIDATE FIELDS
 
add_filter( 'woocommerce_registration_errors', 'bbloomer_validate_name_fields', 10, 3 );
 
function bbloomer_validate_name_fields( $errors, $username, $email ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
        $errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
        $errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
	 if ( isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {
        $errors->add( 'billing_postcode_error', __( '<strong>Error</strong>: Postcode is required!.', 'woocommerce' ) );
    }
	  if ( isset( $_POST['billing_city'] ) && empty( $_POST['billing_city'] ) ) {
        $errors->add( 'billing_city_error', __( '<strong>Error</strong>: City is required!.', 'woocommerce' ) );
    }
 if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
        $errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );
    }
	
    return $errors;
}
 
///////////////////////////////
// 3. SAVE FIELDS
 
add_action( 'woocommerce_created_customer', 'bbloomer_save_name_fields' );
 
function bbloomer_save_name_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
        update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
        update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']) );
    }
    if ( isset( $_POST['billing_last_name'] ) ) {
        update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
        update_user_meta( $customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']) );
    }
if ( isset( $_POST['billing_country'] ) ) {
        update_user_meta( $customer_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ) );
    }
if ( isset( $_POST['billing_postcode'] ) ) {
        update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
    }
if ( isset( $_POST['billing_city'] ) ) {
        update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
    }
if ( isset( $_POST['billing_phone'] ) ) {
        update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }
 
}

function wc_cart_item_name_hyperlink( $link_text, $product_data ) {
    $title = get_the_title($product_data['product_id']);
    $g = 0;
	
    $info = json_decode($product_data['variationsA'], true);
    if (!empty($info)) {
        $title .= "<div class='cbb'>";
        foreach($info as $key => $item) {
            if($item['width'] > 0) {
                $title .= "<div style='line-height:15px;padding-right:20px;'>";
                $title .= "<span style='font-weight: 600;'>Bredde (m): {$item['width']}</span> ";
                $title .= "<span style='font-weight: 600;'>Lengde (m): {$item['height']}</span></div>";
            }
        }
        $title .= "</div>";
    }

	$info2 = json_decode($product_data['additionalProducts'], true);
	if (!empty($info2)) {
        $title .= "<div class='cbb'>";
		 $title .= "<div style='line-height:15px;padding-right:20px;'>";
        foreach($info2 as $key => $item) {
            if($item['quantity'] > 0) {
                $title .= "<span style='font-weight: 300; line-height: 1.5;'>{$item['name']}: {$item['quantity']}</span></br>";
            }
        }
        $title .= "</div></div>";
    }
	

    return $title;
}
add_filter( 'woocommerce_cart_item_name', 'wc_cart_item_name_hyperlink', 10, 2 );

add_filter( 'woocommerce_order_item_name', 'so_29985124_order_item_title', 10, 2 );

function so_29985124_order_item_title( $title, $order_item) {

 

$get_id = $order_item->get_id();

	$meta_value3 = get_post_meta($get_id,'_additionalProducts');
	
	
	
		$info2 = json_decode($meta_value3[0], true);
	if (!empty($info2)) {
        $title .= "<div class='cbb'>";
		 $title .= "<div style='line-height:15px;padding-right:20px;'>";
        foreach($info2 as $key => $item) {
        	$item['name'] = Utf8_ansi($item['name']);
			
            if($item['quantity'] > 0) {
                $title .= "<span style='font-weight: 300; line-height: 1.5;'>{$item['name']}: {$item['quantity']}</span></br>";
            }
        }
        $title .= "</div></div>";
    }

 	
	$meta_value = get_post_meta($get_id,'_item_cutting');
$order_item['product_id'];
	$info = json_decode($meta_value[0], true);
    if (count($info) > 0) {
        $title .= "<div style='clear:both;'>";
        foreach($info as $key => $item) {
            if($item['width'] > 0) {
                $title .= "<div style='line-height:15px;padding-right:20px;'>";
                $title .= "<span style='font-weight: 600;'>Bredde (m): {$item['width']}</span> ";
                $title .= "<span style='font-weight: 600;'>Lengde (m): {$item['height']}</span></div>";
            }
        }
        $title .= "</div>";
    }

   return $title;

}

add_action( 'woocommerce_cart_item_price', 'filter_cart_item_price', 9999990, 2 );
function filter_cart_item_price( $price, $cart_item ) {
	
	
    if ( isset($cart_item['additionalProducts_price']) ) {


        return wc_price( $cart_item['additionalProducts_price'] );
    }
    return $price;
}

add_action( 'woocommerce_before_calculate_totals', 'add_custom_price' , 80, 2);
function add_custom_price( $cart_obj ) {

    //  This is necessary for WC 3.0+

    foreach ( $cart_obj->get_cart() as $key => $value ) {
    	if(!empty($value['additionalProducts'])){
    		 $json = json_decode($value['additionalProducts'], true);
			$price = $value['data']->get_regular_price();
    		foreach ($json as $item) {
            	if($item['quantity'] > 0){
                $price +=  $item['quantity']*$item['price'];
                }
            }

    		$value['data']->set_price($price);
    	}
		
        if(!empty($value['variationsA'])) {
            $json = json_decode($value['variationsA'], true);
            $sum = 0;
			$price = $value['data']->get_regular_price();
			$cutting_fee = get_field( "cutting_fee", $value['product_id']);
			
            foreach ($json as $item) {
            	if($item['width'] > 0 && $item['height'] > 0){
                $sum =  $price * ($item['width'] * $item['height']) + $cutting_fee;
				$sum =(int)$sum;
                }
            }
            $value['data']->set_price($sum);
        }
    }
}


//Store the custom field
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_custom_data_vase', 10, 2 );
function add_cart_item_custom_data_vase( $cart_item_meta, $product_id  ) {
    global $woocommerce;
	
	
	 if(isset($_POST['varQuantity'])) {
	 	$stuff = get_field( "stuff", $product_id);
		 
		 $newData = array();
		 
		 foreach ($stuff as $key => $value){
		 	
			$newData[] = array(
			'quantity' => $_POST['varQuantity'][$key],
			'price' => $value['kaina'],
			'name' => $value['pavadinimas']
			);
		 	
		 }
		 
        $json = json_encode($newData);
		
		$variable_product = wc_get_product($_POST['variation_id']);
		$price = $variable_product->get_regular_price();
    		foreach ($newData as $item) {
            	if($item['quantity'] > 0){
                $price +=  $item['quantity']*$item['price'];
                }
            }
		
		$cart_item_meta['additionalProducts_price'] = $price;
		
        $cart_item_meta['additionalProducts'] = $json;
    }
	
    if(isset($_POST['var'])) {
    	if(isset($_POST['variation_id'])){
    		$variable_product = wc_get_product($_POST['variation_id']);
			$price = $variable_product->get_regular_price();
    	}else{
    		
			$variable_product = wc_get_product($product_id);
			$price = $variable_product->get_regular_price();
			
    	}
		
		
		
		
		
        $_POST['var']['product_id'] = $product_id;
        $json = json_encode($_POST['var']);
        $cart_item_meta['variationsA'] = $json;
		$cutting_fee = get_field( "cutting_fee", $product_id);
		
		 foreach ($_POST['var'] as $item) {
            	if($item['width'] > 0 && $item['height'] > 0){
                $sum =  $price * ($item['width'] * $item['height']) + $cutting_fee;
				$sum =(int)$sum;
                }
            }
		$cart_item_meta['additionalProducts_price'] = $sum;
		
    }
    return $cart_item_meta;
}



// Add order item meta.
add_action( 'woocommerce_add_order_item_meta', 'add_order_item_meta' , 10, 3 );
function add_order_item_meta ( $item_id, $cart_item, $cart_item_key ) {
	if ( isset( $cart_item[ 'additionalProducts' ] ) ) {
		add_post_meta( $item_id, "_additionalProducts", $cart_item['additionalProducts'] );
		}
	
    if ( isset( $cart_item[ 'variationsA' ] ) ) {
        $idas = json_decode($cart_item['variationsA'], true)['product_id'];
        add_post_meta( $item_id, "_item_cutting", $cart_item['variationsA'] );
    }
}

add_action( 'woocommerce_after_order_itemmeta', 'order_meta_customized_display',10, 3 );

function order_meta_customized_display( $item_id, $item, $product ){

$orderID = get_the_ID();




	$meta_value3 = get_post_meta($item_id,'_additionalProducts');
	
	
	
		$info2 = json_decode($meta_value3[0], true);
	if (!empty($info2)) {
        $title .= "<div class='cbb'>";
		 $title .= "<div style='line-height:15px;padding-right:20px;'>";
        foreach($info2 as $key => $item) {
        	$item['name'] = Utf8_ansi($item['name']);
			
            if($item['quantity'] > 0) {
                $title .= "<span style='font-weight: 300; line-height: 1.5;'>{$item['name']}: {$item['quantity']}</span></br>";
            }
        }
        $title .= "</div></div>";
    }


	$meta_value = get_post_meta($item_id,'_item_cutting');
$order_item['product_id'];
	$info = json_decode($meta_value[0], true);
    if (!empty($info)) {
        $title .= "<div style='clear:both;'>";
        foreach($info as $key => $item) {
            if($item['width'] > 0) {
                $title .= "<div style='line-height:15px;padding-right:20px;'>";
                $title .= "<span style='font-weight: 600;'>Bredde (m): {$item['width']}</span>";
                $title .= "<span style='font-weight: 600;'>Lengde (m): {$item['height']}</span></div>";
            }
        }
        $title .= "</div>";
    }

echo $title;



}


 function Utf8_ansi($valor='') {

    $utf8_ansi2 = array(
    "u00c0" =>"À",
    "u00c1" =>"Á",
    "u00c2" =>"Â",
    "u00c3" =>"Ã",
    "u00c4" =>"Ä",
    "u00c5" =>"Å",
    "u00c6" =>"Æ",
    "u00c7" =>"Ç",
    "u00c8" =>"È",
    "u00c9" =>"É",
    "u00ca" =>"Ê",
    "u00cb" =>"Ë",
    "u00cc" =>"Ì",
    "u00cd" =>"Í",
    "u00ce" =>"Î",
    "u00cf" =>"Ï",
    "u00d1" =>"Ñ",
    "u00d2" =>"Ò",
    "u00d3" =>"Ó",
    "u00d4" =>"Ô",
    "u00d5" =>"Õ",
    "u00d6" =>"Ö",
    "u00d8" =>"Ø",
    "u00d9" =>"Ù",
    "u00da" =>"Ú",
    "u00db" =>"Û",
    "u00dc" =>"Ü",
    "u00dd" =>"Ý",
    "u00df" =>"ß",
    "u00e0" =>"à",
    "u00e1" =>"á",
    "u00e2" =>"â",
    "u00e3" =>"ã",
    "u00e4" =>"ä",
    "u00e5" =>"å",
    "u00e6" =>"æ",
    "u00e7" =>"ç",
    "u00e8" =>"è",
    "u00e9" =>"é",
    "u00ea" =>"ê",
    "u00eb" =>"ë",
    "u00ec" =>"ì",
    "u00ed" =>"í",
    "u00ee" =>"î",
    "u00ef" =>"ï",
    "u00f0" =>"ð",
    "u00f1" =>"ñ",
    "u00f2" =>"ò",
    "u00f3" =>"ó",
    "u00f4" =>"ô",
    "u00f5" =>"õ",
    "u00f6" =>"ö",
    "u00f8" =>"ø",
    "u00f9" =>"ù",
    "u00fa" =>"ú",
    "u00fb" =>"û",
    "u00fc" =>"ü",
    "u00fd" =>"ý",
    "u00ff" =>"ÿ");

    return strtr($valor, $utf8_ansi2);      

}

function my_add_metadata_on_line_item( $response, $post, $request ) {

    $order_data = $response->get_data();

    foreach ( $order_data['line_items'] as $key => $item ) {
        $order_data['line_items'][ $key ]['custom_metadata'] = get_post_meta($item['id'],'_item_cutting');
    	
		$info2 = get_post_meta($item['id'],'_additionalProducts');
		$info2 = json_decode($info2[0], true);
		$new_array = array();
	if (!empty($info2)) {
        foreach($info2 as $keys => $item) {
        	$item['name'] = Utf8_ansi($item['name']);
			if($item['quantity'] > 0){
        		
			$new_array[] = $item;
				
        	}

        }
    }
		
    	if(!empty($new_array)){
			$order_data['line_items'][ $key ]['custom_metadata_additional'] = json_encode($new_array,256);
		}else{
			$order_data['line_items'][ $key ]['custom_metadata_additional'] = NULL;
		}
	}

    $response->data = $order_data;

    return $response;
}
add_filter( 'woocommerce_rest_prepare_shop_order_object', 'my_add_metadata_on_line_item', 10, 3 );

add_filter( 'woocommerce_quantity_input_args', 'custom_woocommerce_quantity_input_args' );

function custom_woocommerce_quantity_input_args( $args ) {
if ( is_singular( 'product' ) ) {
  $args['input_value'] = 1;
}
return $args;
}

add_image_size( 'custom-thumb', 100, 100 );

add_filter('wp_get_attachment_image_attributes', 'change_attachement_image_attributes', 20, 2);

function change_attachement_image_attributes( $attr, $attachment ){
    // Get post parent
    $parent = get_post_field( 'post_parent', $attachment);

    // Get post type to check if it's product
    $type = get_post_field( 'post_type', $parent);
    if( $type != 'product' ){
        return $attr;
    }

    /// Get title
    $title = get_post_field( 'post_title', $parent);

    $attr['alt'] = $title;
    $attr['title'] = $title;

    return $attr;
}
/**********************CUSTOM EXCERPT******************/
/***Custom excerpt lenght****/
function custom_excerpt_length( $length ) {
    return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/*********************************CUSTOM TABS***********************/
/**Custom description tab***/
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';
	$tabs['description']['title'] = __('Description');
	$tabs['description']['priority'] = 10;

	return $tabs;
}
function woo_custom_description_tab_content() {
	global $post;
	if (!(empty($post->post_content))) {
		echo $post->post_content;
	} 
}
/****Custom attributes tab**/
add_filter( 'woocommerce_product_tabs', 'woo_custom_attributes_tab', 98 );
function woo_custom_attributes_tab( $tabs ) {
	$tabs['additional_information']['title'] = __('Teknisk information');
	$tabs['additional_information']['priority'] = 5;

	return $tabs;
}
/***Remove comments tab****/
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {
	unset( $tabs['reviews'] ); 			// Remove the reviews tab
    return $tabs;
}
/**Custom Instruction Tab****/
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['instruction'] = array(
		'title' 	=> __( 'Instruction', 'woocommerce' ),
		'priority' 	=> 15,
		'callback' 	=> 'woo_new_product_tab_instruction'
	);

	return $tabs;
}
function woo_new_product_tab_instruction() {
	if(!empty(get_field('instruction')) )
	{
    	echo the_field('instruction');
	}
	else
	{
    	echo "<style>.instruction_tab { display:none !important; }</style>";
	}
	
}
/**Custom Video Tab****/
add_filter( 'woocommerce_product_tabs', 'woo_new_video_tab' );
function woo_new_video_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['video'] = array(
		'title' 	=> __( 'Video', 'woocommerce' ),
		'priority' 	=> 20,
		'callback' 	=> 'woo_new_product_tab_video'
	);

	return $tabs;
}
function woo_new_product_tab_video() {
	if(!empty(get_field('video')) )
	{
		$src = get_field('video');
    	/*echo "<iframe width='420' height='315' src='$src'></iframe>";*/
		echo "<div class='video-content-block'><object>
		<param name='movie' value='http://www.youtube.com/v/$src'></param>
  <embed
    src='http://www.youtube.com/v/$src'
    wmode='transparent'
    type='application/x-shockwave-flash'
	width='800' height='450' 
    allow='autoplay; encrypted-media; picture-in-picture'
    allowfullscreen
    title='Keyboard Cat'
  ></object>
</div>";
		
		
			
	}
	else
	{
    	echo "<style>.video_tab { display:none !important; }</style>";
	}	
}
/**Custom FAQ Tab****/
add_filter( 'woocommerce_product_tabs', 'woo_new_faq_tab' );
function woo_new_faq_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['faq'] = array(
		'title' 	=> __( 'FAQ', 'woocommerce' ),
		'priority' 	=> 25,
		'callback' 	=> 'woo_new_product_tab_faq'
	);

	return $tabs;
}
function woo_new_product_tab_faq() {
	if( have_rows('faq') ) {
		echo "<div class = 'faq-block'>";
		while ( have_rows('faq') ) : the_row();
			echo "<div class = 'question-and-answer'><div class='question'>";
				echo the_sub_field('question');
				echo "</div>";
				echo "<div class='answer'>";
				echo the_sub_field('answer');
				echo "</div>";   
				echo "</div>";    
		endwhile;
		echo "</div>";
	}
	else{
		echo "<style>.faq_tab { display:none !important; }</style>";
	}	
}
add_filter( 'woocommerce_product_tabs', 'am_ninja_remove_product_tabs', 98 );

function am_ninja_remove_product_tabs( $tabs ) {

    global $product;
    $id = $product->get_id(); // change this to $product->id fro WC less than 2.7

    $my_custom_data = get_post_meta($id, 'am_ninja', true );
	$variation = $product->is_type('variable');

    if(empty($my_custom_data) && (!($variation)) && (!($product->has_attributes())) && (!($product->has_dimensions())) && (!($product->has_weight()))) {
        unset( $tabs['additional_information'] );   // Remove the additional information tab
    }

    return $tabs;
}
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
add_action('woocommerce_after_single_product','woocommerce_output_related_products',20);

// Prasideda Krepselio programavimas

add_shortcode ('woo_cart_but', 'woo_cart_but' );
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <div class="cart-contents">
    	<i class="eurofont icon-cart"></i>
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?>
	    <div class="mincartcontent">
			<div id="closeCX"><i class="fas fa-times"></i></div>
			<div id="mini_zone_cart"><?php	woocommerce_mini_cart(); ?></div>
		</div>
    </div>
        <?php
	        
    return ob_get_clean();
 
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <div class="cart-contents">
    	<i class="eurofont icon-cart"></i>
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?>
	    <div class="mincartcontent">
			<div id="closeCX"><i class="fas fa-times"></i></div>
			<div id="mini_zone_cart"><?php	woocommerce_mini_cart(); ?></div>
		</div>
    </div>
    <?php
 
    $fragments['div.cart-contents'] = ob_get_clean();
     
    return $fragments;
}


add_action('wp_enqueue_scripts', 'override_woo_frontend_scripts');
function override_woo_frontend_scripts() {
    wp_deregister_script('wc-add-to-cart');
    wp_enqueue_script('wc-add-to-cart', get_stylesheet_directory_uri()  . '/woocommerce/js/frontend/add-to-cart.js', array('jquery', 'woocommerce', 'wc-country-select', 'wc-address-i18n'), null, true);
	wp_localize_script('wc-add-to-cart', 'my_script_vars', array(
            'woo_checkout_url' => get_permalink( wc_get_page_id( 'checkout' ) )
        )
    );
}

add_filter( 'wc_add_to_cart_message_html', '__return_false' );

function ace_ajax_add_to_cart_handler() {
	WC_Form_Handler::add_to_cart_action();
	WC_AJAX::get_refreshed_fragments();
}
add_action( 'wc_ajax_ace_add_to_cart', 'ace_ajax_add_to_cart_handler' );
add_action( 'wc_ajax_nopriv_ace_add_to_cart', 'ace_ajax_add_to_cart_handler' );

// Remove WC Core add to cart handler to prevent double-add
remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );

function ajax_qty_cart() {

    // Set item key as the hash found in input.qty's name
    $cart_item_key = $_POST['hash'];

    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );

    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );

    // Update the quantity of the item in the cart
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }

    // Refresh the page
$car_total = WC()->cart->get_cart_total();
$skirtumas = $freeshiping_from - $car_total;
$procentas = round($car_total*100/$freeshiping_from);

  $cart_count = WC()->cart->cart_contents_count;
 
 if ($cart_count > 0){
 	 $values_parse['content_count'] = $cart_count;
 } else {
 	 $values_parse['content_count'] = 0;
 }
 
 $values_parse['total'] = $car_total;
 
 
 echo json_encode($values_parse);
 die();
}

add_action('wp_ajax_qty_cart', 'ajax_qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'ajax_qty_cart');
add_action( 'woocommerce_after_mini_cart', 'woocommerce_cross_sell_display' );
add_filter( 'woocommerce_cross_sells_columns', 'bbloomer_change_cross_sells_columns' );
 
function bbloomer_change_cross_sells_columns( $columns ) {
return 4;
}

add_filter( 'woocommerce_cross_sells_total', 'bbloomer_change_cross_sells_product_no' );
  
function bbloomer_change_cross_sells_product_no( $columns ) {
return 4;
}

add_filter('woocommerce_add_to_cart_fragments', 'mm_string_replace_add_to_cart_fragments');

function mm_string_replace_add_to_cart_fragments($fragments){
		
	$fragments['div.widget_shopping_cart_content'] = '';



    return $fragments;

}
function cfwc_validate_custom_field( $passed, $product_id, $quantity ) {	
		 $product = wc_get_product( $product_id );	
		 $value = get_field( "ar_rodyti_variantus", $product_id );	
	 if( empty( $_POST['var'][1][width] ) && $value ) {	
	 // Fails validation	
	 $passed = false;	
	 wc_add_notice( __( 'Gör produktval innan du lägger till produkten i din kundvagn.', 'woocommerce' ), 'error' );	
	 }elseif(empty( $_POST['var'][1][height] ) && $value ){	
	 	 // Fails validation	
	 $passed = false;	
	 wc_add_notice( __( 'Gör produktval innan du lägger till produkten i din kundvagn.', 'woocommerce' ), 'error' );	
	 }	
	 return $passed;	
	}	
	add_filter( 'woocommerce_add_to_cart_validation', 'cfwc_validate_custom_field', 10, 3 );

?>
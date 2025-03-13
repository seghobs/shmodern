<?php
if (!defined('ABSPATH')) exit;

// Theme Setup
function blogsr10_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'blogsr10'),
        'footer'  => esc_html__('Footer Menu', 'blogsr10'),
    ));
}
add_action('after_setup_theme', 'blogsr10_setup');

// Register Widget Areas
function blogsr10_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'blogsr10'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'blogsr10'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'blogsr10'),
        'id'            => 'footer-1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'blogsr10'),
        'id'            => 'footer-2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'blogsr10'),
        'id'            => 'footer-3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-semibold mb-4">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'blogsr10_widgets_init');

// Enqueue scripts and styles
function blogsr10_scripts() {
    // Ana stil dosyası
    wp_enqueue_style('blogsr10-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Tailwind CSS CDN
    wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4.1');
    
    // Custom styles
    wp_enqueue_style('blogsr10-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0');

    // Comments JavaScript - sadece tekil sayfalarda ve yorumlar açıksa yükle
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
        wp_enqueue_script('blogsr10-comments', get_template_directory_uri() . '/assets/js/comments.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'blogsr10_scripts');

// Calculate Reading Time
function reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Ortalama okuma hızı: dakikada 200 kelime

    return sprintf(
        _n('%d dakika okuma', '%d dakika okuma', $reading_time, 'blogsr10'),
        $reading_time
    );
}

// Add custom classes to menu items
function blogsr10_menu_classes($classes, $item, $args) {
    if($args->theme_location === 'primary') {
        $classes[] = 'px-4 py-2 rounded-full hover:bg-gray-100 transition duration-300';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'blogsr10_menu_classes', 10, 3);

function blogsr10_comment_callback($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    <div id="comment-<?php comment_ID(); ?>" <?php comment_class('flex space-x-4'); ?>>
        <div class="flex-shrink-0">
            <?php echo get_avatar($comment, 60, '', '', array('class' => 'rounded-full')); ?>
        </div>
        <div class="flex-grow">
            <div class="comment-meta mb-2">
                <div class="comment-author font-semibold text-gray-900">
                    <?php echo get_comment_author_link(); ?>
                </div>
                <div class="comment-metadata text-sm text-gray-500">
                    <time datetime="<?php echo get_comment_date('c'); ?>">
                        <?php
                        printf(
                            esc_html__('%1$s, %2$s', 'blogsr10'),
                            get_comment_date(),
                            get_comment_time()
                        );
                        ?>
                    </time>
                    <?php edit_comment_link(esc_html__('Düzenle', 'blogsr10'), ' · '); ?>
                </div>
            </div>

            <?php if ($comment->comment_approved == '0') : ?>
                <p class="comment-awaiting-moderation text-yellow-600 italic mb-2">
                    <?php esc_html_e('Yorumunuz moderatör onayı bekliyor.', 'blogsr10'); ?>
                </p>
            <?php endif; ?>

            <div class="comment-content prose max-w-none">
                <?php comment_text(); ?>
            </div>

            <div class="reply mt-2">
                <?php
                comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<span class="text-sm text-blue-600 hover:text-blue-800 transition duration-300">',
                    'after'     => '</span>'
                )));
                ?>
            </div>
        </div>
    </div>
    <?php
}

// Yorum formunu özelleştir
function blogsr10_comment_form_defaults($defaults) {
    $defaults['comment_notes_before'] = '<p class="comment-notes text-sm text-gray-600 mb-4">' . 
        sprintf(
            '%s <span class="required">*</span>',
            __('E-posta adresiniz yayımlanmayacak. Gerekli alanlar işaretlendi', 'blogsr10')
        ) . 
    '</p>';

    return $defaults;
}
add_filter('comment_form_defaults', 'blogsr10_comment_form_defaults');

// Yorum gönderildikten sonraki mesajı özelleştir
function blogsr10_comment_success_message($location) {
    return add_query_arg('comment-success', '1', $location);
}
add_filter('comment_post_redirect', 'blogsr10_comment_success_message');

// Başarılı yorum mesajını göster
function blogsr10_show_comment_success_message() {
    if (isset($_GET['comment-success'])) {
        echo '<div class="comment-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <p>Yorumunuz başarıyla gönderildi. Onay bekliyor.</p>
              </div>';
    }
}
add_action('comment_form_before', 'blogsr10_show_comment_success_message');

/**
 * AJAX Load More Posts
 */
function blogsr10_load_more_posts() {
    $page = $_POST['page'];
    $posts_per_page = $_POST['posts_per_page'];

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $page
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <article <?php post_class('bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="block aspect-w-16 aspect-h-9 overflow-hidden">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-full object-cover transform hover:scale-105 transition-transform duration-300')); ?>
                </a>
                <?php endif; ?>

                <div class="p-6">
                    <!-- Categories -->
                    <?php if (has_category()) : ?>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" 
                                class="text-xs px-3 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full hover:from-blue-700 hover:to-purple-700 transition duration-300">' 
                                . esc_html($category->name) . '</a>';
                        }
                        ?>
                    </div>
                    <?php endif; ?>

                    <!-- Title -->
                    <h2 class="text-xl font-bold mb-3 hover:text-blue-600 transition-colors duration-300">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <!-- Excerpt -->
                    <div class="text-gray-600 mb-4 line-clamp-3">
                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                    </div>

                    <!-- Meta -->
                    <div class="flex items-center text-sm text-gray-500 gap-4">
                        <!-- Author -->
                        <div class="flex items-center">
                            <?php echo get_avatar(get_the_author_meta('ID'), 24, '', '', array('class' => 'rounded-full mr-2')); ?>
                            <span><?php the_author(); ?></span>
                        </div>

                        <!-- Date -->
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span><?php echo get_the_date(); ?></span>
                        </div>

                        <!-- Comments -->
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span><?php comments_number('0', '1', '%'); ?></span>
                        </div>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;

    die();
}
add_action('wp_ajax_load_more_posts', 'blogsr10_load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'blogsr10_load_more_posts'); 
<?php get_header(); ?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-b from-blue-50 to-white">
    <!-- Decorative Elements -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.blue.100),white)] opacity-30"></div>
        <div class="absolute inset-y-0 right-1/2 -left-72 bg-gradient-to-r from-blue-50 to-white blur-2xl transform -rotate-12"></div>
        <div class="absolute inset-y-0 right-1/2 bg-gradient-to-r from-blue-50 to-transparent blur-xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 pt-20 pb-16 sm:px-6 lg:px-8 lg:pt-24 lg:pb-20">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-6 animate-fade-in">
                <?php
                $blog_description = get_bloginfo('description');
                if (!empty($blog_description)) {
                    echo esc_html($blog_description);
                } else {
                    esc_html_e('Modern ve Şık Blog Teması', 'blogsr10');
                }
                ?>
            </h1>
            <p class="text-xl text-gray-600 mb-8 animate-fade-in-up">
                <?php esc_html_e('Düşüncelerinizi, hikayelerinizi ve tutkularınızı paylaşabileceğiniz modern bir platform.', 'blogsr10'); ?>
            </p>
            
            <!-- Search Form -->
            <div class="max-w-2xl mx-auto relative animate-fade-in-up">
                <?php get_search_form(); ?>
            </div>

            <!-- Featured Categories -->
            <div class="mt-12 flex flex-wrap justify-center gap-3 animate-fade-in-up">
                <?php
                $categories = get_categories(array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'number' => 5
                ));

                foreach ($categories as $category) :
                ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                       class="inline-flex items-center px-4 py-2 rounded-full bg-white shadow-md hover:shadow-lg transition-all duration-300 group">
                        <span class="text-sm font-medium bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent group-hover:opacity-75">
                            <?php echo esc_html($category->name); ?>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Wave Shape Divider -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg class="w-full h-12 md:h-16 lg:h-20 text-white fill-current" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
    </div>
</section>

<!-- Add custom styles for animations -->
<style>
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 1s ease-out;
        animation-fill-mode: both;
    }
    
    .animate-fade-in-up:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .animate-fade-in-up:nth-child(3) {
        animation-delay: 0.4s;
    }
</style>

<!-- Main Content -->
<main class="container mx-auto px-4 py-12">
    <div class="max-w-7xl mx-auto">
        <!-- Grid Layout for Posts -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_per_page = 6; // 3x2 grid için 6 yazı

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged
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
            else :
                ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-600">Henüz yazı bulunmuyor.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Load More Button -->
        <?php if ($query->max_num_pages > 1) : ?>
        <div class="text-center" id="load-more-container">
            <button id="load-more" 
                class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                data-page="1"
                data-max="<?php echo $query->max_num_pages; ?>">
                <svg class="w-5 h-5 mr-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
                Daha Fazla Yükle
            </button>
            <div id="loading-spinner" class="hidden">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600 mx-auto"></div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>

<!-- Lazy Loading Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const loadMoreBtn = document.getElementById('load-more');
    const postsContainer = document.querySelector('.grid');
    const loadingSpinner = document.getElementById('loading-spinner');

    if (!loadMoreBtn) return;

    loadMoreBtn.addEventListener('click', function() {
        const currentPage = parseInt(this.dataset.page);
        const maxPages = parseInt(this.dataset.max);

        if (currentPage >= maxPages) {
            this.remove();
            return;
        }

        // Show loading spinner
        loadMoreBtn.classList.add('hidden');
        loadingSpinner.classList.remove('hidden');

        // Fetch next page
        fetch(`<?php echo admin_url('admin-ajax.php'); ?>`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `action=load_more_posts&page=${currentPage + 1}&posts_per_page=<?php echo $posts_per_page; ?>`
        })
        .then(response => response.text())
        .then(html => {
            // Insert new posts
            postsContainer.insertAdjacentHTML('beforeend', html);
            
            // Update button page number
            this.dataset.page = currentPage + 1;

            // Hide loading spinner and show button
            loadingSpinner.classList.add('hidden');
            loadMoreBtn.classList.remove('hidden');

            // If we've reached the max pages, remove the button
            if (currentPage + 1 >= maxPages) {
                loadMoreBtn.remove();
            }
        });
    });
});
</script>

<?php get_footer(); ?> 
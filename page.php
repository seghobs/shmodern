<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
        <!-- Hero Section -->
        <?php if (has_post_thumbnail()) : ?>
        <div class="relative rounded-2xl overflow-hidden mb-8 aspect-w-16 aspect-h-9">
            <?php 
            the_post_thumbnail('full', array(
                'class' => 'w-full h-[500px] object-cover'
            )); 
            ?>
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
            <div class="absolute bottom-8 left-8 right-8">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4"><?php the_title(); ?></h1>
                
                <!-- Meta -->
                <div class="flex flex-wrap items-center text-white/90 gap-4">
                    <!-- Last Modified Date -->
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span><?php echo get_the_modified_date(); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php else : ?>
        <!-- Title without Featured Image -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-8"><?php the_title(); ?></h1>
        <?php endif; ?>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12 mb-8 prose prose-lg max-w-none">
            <?php 
            the_content();
            
            // If there are multiple pages for this post
            wp_link_pages(array(
                'before' => '<div class="page-links mt-4 pt-4 border-t border-gray-100">',
                'after'  => '</div>',
                'link_before' => '<span class="px-3 py-1 bg-gray-100 rounded-full mr-2">',
                'link_after'  => '</span>',
            ));
            ?>
        </div>

        <?php 
        // If comments are open or we have at least one comment
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?> 
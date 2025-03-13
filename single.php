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
                <!-- Categories -->
                <?php if (has_category()) : ?>
                <div class="flex flex-wrap gap-2 mb-4">
                    <?php
                    $categories = get_the_category();
                    foreach ($categories as $category) {
                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" 
                            class="px-4 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-medium 
                            rounded-full shadow-lg hover:from-blue-700 hover:to-purple-700 transition duration-300">' 
                            . esc_html($category->name) . '</a>';
                    }
                    ?>
                </div>
                <?php endif; ?>
                
                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4"><?php the_title(); ?></h1>
                
                <!-- Meta -->
                <div class="flex flex-wrap items-center text-white/90 gap-4">
                    <!-- Author -->
                    <div class="flex items-center">
                        <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', array('class' => 'rounded-full mr-2')); ?>
                        <span><?php the_author(); ?></span>
                    </div>

                    <!-- Date -->
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span><?php echo get_the_date(); ?></span>
                    </div>

                    <!-- Reading Time -->
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span><?php echo reading_time(); ?></span>
                    </div>

                    <!-- Comments Count -->
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span><?php comments_number('0 yorum', '1 yorum', '% yorum'); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12 mb-8 prose prose-lg max-w-none">
            <?php the_content(); ?>

            <?php if (has_tag()) : ?>
            <div class="border-t border-gray-100 mt-8 pt-8">
                <h3 class="text-lg font-semibold mb-4">Etiketler:</h3>
                <div class="flex flex-wrap gap-2">
                    <?php
                    $tags = get_the_tags();
                    if ($tags) {
                        foreach ($tags as $tag) {
                            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" 
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-full hover:bg-gray-200 transition duration-300">#' 
                                . esc_html($tag->name) . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Author Box -->
        <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12 mb-8">
            <div class="flex items-center">
                <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-full')); ?>
                <div class="ml-6">
                    <h3 class="text-xl font-semibold mb-2"><?php the_author(); ?></h3>
                    <p class="text-gray-600"><?php echo get_the_author_meta('description') ?: esc_html__('Yazar hakkında bilgi bulunmuyor.', 'blogsr10'); ?></p>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12">
            <?php 
            // If comments are open or we have at least one comment
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>
    </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?> 
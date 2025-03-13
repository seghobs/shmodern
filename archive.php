<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
    <header class="max-w-4xl mx-auto text-center mb-12">
        <?php
        if (is_category()) {
            ?>
            <span class="inline-block px-4 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-medium rounded-full shadow-lg mb-4">
                <?php esc_html_e('Kategori', 'blogsr10'); ?>
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4"><?php single_cat_title(); ?></h1>
            <?php
            $category_description = category_description();
            if (!empty($category_description)) {
                echo '<div class="prose prose-lg max-w-none text-gray-600">' . $category_description . '</div>';
            }
        } elseif (is_tag()) {
            ?>
            <span class="inline-block px-4 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-medium rounded-full shadow-lg mb-4">
                <?php esc_html_e('Etiket', 'blogsr10'); ?>
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">#<?php single_tag_title(); ?></h1>
            <?php
            $tag_description = tag_description();
            if (!empty($tag_description)) {
                echo '<div class="prose prose-lg max-w-none text-gray-600">' . $tag_description . '</div>';
            }
        } elseif (is_author()) {
            ?>
            <div class="flex justify-center mb-4">
                <?php echo get_avatar(get_the_author_meta('ID'), 120, '', '', array('class' => 'rounded-full shadow-lg')); ?>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4"><?php the_author(); ?></h1>
            <?php
            $author_description = get_the_author_meta('description');
            if (!empty($author_description)) {
                echo '<div class="prose prose-lg max-w-none text-gray-600">' . $author_description . '</div>';
            }
        } else {
            ?>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900"><?php the_archive_title(); ?></h1>
            <?php
        }
        ?>
    </header>

    <?php if (have_posts()) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-2'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="aspect-w-16 aspect-h-9 relative group">
                            <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover transition duration-300 group-hover:scale-105')); ?>
                            <?php if (has_category()) : ?>
                                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                    <?php
                                    $categories = get_the_category();
                                    foreach ($categories as $category) {
                                        echo '<span class="px-3 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-medium rounded-full shadow-lg">' . esc_html($category->name) . '</span>';
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6">
                        <header class="mb-4">
                            <h2 class="text-2xl font-bold mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600 transition duration-150 ease-in-out">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="flex items-center text-sm text-gray-500 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <?php echo get_the_date(); ?>
                                </span>
                            </div>
                        </header>

                        <div class="prose prose-sm max-w-none mb-4 text-gray-600 line-clamp-3">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="flex items-center justify-between mt-6">
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 hover:text-purple-600 transition duration-150 ease-in-out">
                                <?php esc_html_e('Devamını Oku', 'blogsr10'); ?>
                                <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </footer>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="mt-12">
            <?php
            the_posts_pagination(array(
                'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>',
                'next_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>',
                'class' => 'flex justify-center gap-4',
                'mid_size' => 2,
            ));
            ?>
        </div>
    <?php else : ?>
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm p-8 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="text-2xl font-bold text-gray-900 mb-2"><?php esc_html_e('İçerik Bulunamadı', 'blogsr10'); ?></h2>
                <p class="text-gray-600"><?php esc_html_e('Maalesef, aradığınız kriterlere uygun içerik bulunamadı.', 'blogsr10'); ?></p>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?> 
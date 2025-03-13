<footer class="bg-gradient-to-b from-gray-50 to-white mt-12 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20">
        <div class="blur-[106px] h-56 bg-gradient-to-br from-blue-600 to-purple-400"></div>
        <div class="blur-[106px] h-32 bg-gradient-to-r from-purple-400 to-blue-600"></div>
    </div>

    <div class="container mx-auto px-4 relative">
        <!-- Newsletter Section -->
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold text-center mb-2 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        <?php esc_html_e('Yeniliklerden Haberdar Olun', 'blogsr10'); ?>
                    </h2>
                    <p class="text-gray-600 text-center mb-8">
                        <?php esc_html_e('En son blog yazılarımızdan ve güncellemelerimizden haberdar olmak için bültenimize kayıt olun.', 'blogsr10'); ?>
                    </p>
                    <form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                        <input type="email" class="flex-1 px-6 py-3 rounded-full border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="<?php esc_attr_e('E-posta adresiniz', 'blogsr10'); ?>">
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300">
                            <?php esc_html_e('Kayıt Ol', 'blogsr10'); ?>
                        </button>
                    </form>
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 opacity-50"></div>
            </div>
        </div>

        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 py-12">
            <!-- Brand Column -->
            <div class="space-y-6">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else: ?>
                    <div class="flex items-center space-x-2">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            ?>
                            <h3 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                <?php bloginfo('name'); ?>
                            </h3>
                            <?php
                        }
                        ?>
                    </div>
                    <p class="text-gray-600">
                        <?php esc_html_e('Modern ve şık bir WordPress teması ile web sitenizi öne çıkarın.', 'blogsr10'); ?>
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="group">
                            <span class="sr-only">Facebook</span>
                            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300">
                                <svg class="h-5 w-5 text-gray-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                                </svg>
                            </div>
                        </a>
                        <a href="#" class="group">
                            <span class="sr-only">Instagram</span>
                            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300">
                                <svg class="h-5 w-5 text-gray-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                                </svg>
                            </div>
                        </a>
                        <a href="#" class="group">
                            <span class="sr-only">Twitter</span>
                            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300">
                                <svg class="h-5 w-5 text-gray-600 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Widget Columns -->
            <div class="space-y-6">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else: ?>
                    <h4 class="text-lg font-semibold text-gray-900"><?php esc_html_e('Hızlı Bağlantılar', 'blogsr10'); ?></h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300"><?php esc_html_e('Hakkımızda', 'blogsr10'); ?></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300"><?php esc_html_e('İletişim', 'blogsr10'); ?></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-300"><?php esc_html_e('Blog', 'blogsr10'); ?></a></li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="space-y-6">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else: ?>
                    <h4 class="text-lg font-semibold text-gray-900"><?php esc_html_e('İletişim', 'blogsr10'); ?></h4>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-600"><?php esc_html_e('İstanbul, Türkiye', 'blogsr10'); ?></span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-600">info@example.com</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-600">+90 555 123 45 67</span>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <!-- Recent Posts -->
            <div class="space-y-6">
                <h4 class="text-lg font-semibold text-gray-900"><?php esc_html_e('Son Yazılar', 'blogsr10'); ?></h4>
                <div class="space-y-4">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 3,
                        'post_status' => 'publish'
                    ));
                    
                    foreach($recent_posts as $post) : ?>
                        <a href="<?php echo get_permalink($post['ID']); ?>" class="flex items-center space-x-3 group">
                            <?php if (has_post_thumbnail($post['ID'])) : ?>
                                <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                                    <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail', array('class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-300')); ?>
                                </div>
                            <?php endif; ?>
                            <div class="flex-1">
                                <h5 class="text-sm font-medium text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                                    <?php echo $post['post_title']; ?>
                                </h5>
                                <p class="text-xs text-gray-500">
                                    <?php echo get_the_date('', $post['ID']); ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-200 mt-12 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <p class="text-gray-600 text-sm">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. 
                        <?php esc_html_e('Tüm hakları saklıdır.', 'blogsr10'); ?>
                    </p>
                </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'flex flex-wrap justify-center space-x-6 text-sm text-gray-500',
                    'fallback_cb' => false,
                    'link_before' => '<span class="hover:text-blue-600 transition-colors duration-300">',
                    'link_after' => '</span>'
                ));
                ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 
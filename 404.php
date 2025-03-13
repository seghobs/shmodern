<?php get_header(); ?>

<main class="container mx-auto px-4 py-12">
    <div class="max-w-2xl mx-auto text-center">
        <div class="bg-white rounded-2xl shadow-sm p-8 md:p-12">
            <div class="mb-8">
                <svg class="w-24 h-24 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">404</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mb-6"><?php esc_html_e('Sayfa Bulunamadı', 'blogsr10'); ?></h2>
            <p class="text-gray-600 mb-8"><?php esc_html_e('Aradığınız sayfa taşınmış, silinmiş veya hiç var olmamış olabilir.', 'blogsr10'); ?></p>
            
            <div class="space-y-6">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transition duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <?php esc_html_e('Ana Sayfaya Dön', 'blogsr10'); ?>
                </a>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500"><?php esc_html_e('veya', 'blogsr10'); ?></span>
                    </div>
                </div>

                <form role="search" method="get" class="mt-8" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="flex rounded-full shadow-sm">
                        <input type="search" name="s" class="flex-1 px-6 py-3 rounded-l-full border-0 focus:ring-2 focus:ring-blue-600" placeholder="<?php esc_attr_e('Arama yapın...', 'blogsr10'); ?>">
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-r-full hover:from-blue-700 hover:to-purple-700 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 
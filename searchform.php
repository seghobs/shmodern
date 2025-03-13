<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="flex rounded-full shadow-sm">
        <input type="search" name="s" 
            class="flex-1 px-6 py-3 rounded-l-full border-0 focus:ring-2 focus:ring-blue-600" 
            placeholder="<?php echo esc_attr_x('Arama yapın...', 'placeholder', 'blogsr10'); ?>"
            value="<?php echo get_search_query(); ?>"
            title="<?php echo esc_attr_x('Arama', 'label', 'blogsr10'); ?>"
        >
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-r-full hover:from-blue-700 hover:to-purple-700 transition duration-300">
            <span class="sr-only"><?php echo esc_html_x('Ara', 'submit button', 'blogsr10'); ?></span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
    </div>
</form> 
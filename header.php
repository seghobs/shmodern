<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <?php wp_head(); ?>

    <!-- Logo Animasyonları için Özel CSS -->
    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes pulse-shadow {
            0% { text-shadow: 0 0 5px rgba(37, 99, 235, 0.1); }
            50% { text-shadow: 0 0 15px rgba(147, 51, 234, 0.3); }
            100% { text-shadow: 0 0 5px rgba(37, 99, 235, 0.1); }
        }

        .animated-logo {
            background: linear-gradient(
                90deg, 
                #2563eb, /* blue-600 */
                #9333ea, /* purple-600 */
                #2563eb  /* blue-600 */
            );
            background-size: 200% auto;
            animation: gradient 3s ease infinite,
                       pulse-shadow 2s ease-in-out infinite;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            position: relative;
            display: inline-block;
        }

        .animated-logo::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #2563eb, #9333ea);
            transition: width 0.3s ease;
        }

        .animated-logo:hover::after {
            width: 100%;
        }

        .animated-logo:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Hareket efekti için özel sınıf */
        .text-shimmer {
            position: relative;
            overflow: hidden;
        }

        .text-shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transform: skewX(-25deg);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 200%; }
        }
    </style>
</head>
<body <?php body_class('bg-gray-50'); ?>>
<?php wp_body_open(); ?>

<!-- Search Overlay -->
<div id="search-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden transition-opacity duration-300">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-2xl transform scale-95 opacity-0 transition-all duration-300" id="search-container">
            <form role="search" method="get" class="search-form group" action="<?php echo home_url('/'); ?>">
                <div class="relative">
                    <input type="search" 
                           class="w-full h-16 px-6 text-2xl text-white bg-transparent border-2 border-white rounded-full outline-none placeholder-white/70"
                           placeholder="<?php echo esc_attr_x('Ara...', 'placeholder', 'blogsr10'); ?>"
                           value="<?php echo get_search_query(); ?>"
                           name="s">
                    
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2">
                        <svg class="w-8 h-8 text-white transition-transform duration-300 transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </form>
            
            <button id="close-search" class="absolute top-4 right-4 text-white hover:text-gray-300 transition-colors duration-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Header -->
<header class="sticky top-0 z-40 bg-white/80 backdrop-blur-lg border-b border-gray-200">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       class="text-2xl font-bold animated-logo text-shimmer">
                        <?php bloginfo('name'); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-1">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex items-center space-x-1',
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <!-- Search & Mobile Menu Buttons -->
            <div class="flex items-center space-x-4">
                <!-- Search Button -->
                <button id="search-toggle" class="p-2 rounded-full hover:bg-gray-100 transition duration-300 group">
                    <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-toggle" class="md:hidden p-2 rounded-full hover:bg-gray-100 transition duration-300 group">
                    <svg class="w-5 h-5 text-gray-600 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'space-y-2',
                'fallback_cb'    => false,
            ));
            ?>
        </div>
    </div>
</header>

<!-- Search Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchOverlay = document.getElementById('search-overlay');
    const searchContainer = document.getElementById('search-container');
    const searchToggle = document.getElementById('search-toggle');
    const closeSearch = document.getElementById('close-search');
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    // Arama overlay'ini aç
    function openSearch() {
        searchOverlay.classList.remove('hidden');
        // Opacity animasyonu için setTimeout kullan
        setTimeout(() => {
            searchOverlay.classList.add('opacity-100');
            searchContainer.classList.remove('scale-95', 'opacity-0');
            searchContainer.classList.add('scale-100', 'opacity-100');
            // Input'a otomatik fokus
            searchContainer.querySelector('input[type="search"]').focus();
        }, 10);
    }

    // Arama overlay'ini kapat
    function closeSearchOverlay() {
        searchOverlay.classList.remove('opacity-100');
        searchContainer.classList.remove('scale-100', 'opacity-100');
        searchContainer.classList.add('scale-95', 'opacity-0');
        // Opacity animasyonu bittikten sonra gizle
        setTimeout(() => {
            searchOverlay.classList.add('hidden');
        }, 300);
    }

    // Mobil menüyü aç/kapat
    function toggleMobileMenu() {
        mobileMenu.classList.toggle('hidden');
    }

    // Event listeners
    searchToggle.addEventListener('click', openSearch);
    closeSearch.addEventListener('click', closeSearchOverlay);
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);

    // ESC tuşu ile arama overlay'ini kapat
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeSearchOverlay();
        }
    });

    // Overlay'e tıklandığında kapat (form hariç)
    searchOverlay.addEventListener('click', function(e) {
        if (e.target === searchOverlay) {
            closeSearchOverlay();
        }
    });
});
</script>

<div class="pt-20"><!-- Spacer for fixed header --></div> 
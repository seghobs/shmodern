<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <!-- Yorum Başlığı ve Sayısı -->
        <div class="flex items-center justify-between mb-12">
            <h2 class="comments-title text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                <?php
                $comment_count = get_comments_number();
                if ($comment_count === '1') {
                    echo '1 Yorum';
                } else {
                    printf(
                        '%s Yorum',
                        number_format_i18n($comment_count)
                    );
                }
                ?>
            </h2>
            <?php if (comments_open()) : ?>
                <a href="#respond" class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Yorum Yaz
                </a>
            <?php endif; ?>
        </div>

        <!-- Yorum Listesi -->
        <div class="comment-list space-y-8">
            <?php
            wp_list_comments(array(
                'style'      => 'div',
                'short_ping' => true,
                'callback'   => 'blogsr10_comment_callback',
                'avatar_size'=> 60,
            ));
            ?>
        </div>

        <!-- Yorum Navigasyonu -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav class="comment-navigation mt-12 flex justify-between items-center">
            <div class="nav-previous">
                <?php previous_comments_link(
                    '<div class="flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Önceki Yorumlar
                    </div>'
                ); ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link(
                    '<div class="flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-300">
                        Sonraki Yorumlar
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>'
                ); ?>
            </div>
        </nav>
        <?php endif; ?>

        <?php if (!comments_open()) : ?>
        <div class="mt-8 p-6 bg-yellow-50 border border-yellow-100 rounded-xl">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-yellow-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <p class="text-yellow-700 font-medium">
                    <?php esc_html_e('Bu yazı için yorumlar kapatıldı.', 'blogsr10'); ?>
                </p>
            </div>
        </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php
    comment_form(array(
        'class_form'         => 'comment-form mt-12 space-y-6 bg-gray-50 p-8 rounded-2xl border border-gray-100',
        'title_reply'        => '<span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Yorum Yazın</span>',
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title text-2xl font-bold mb-6">',
        'title_reply_after'  => '</h3>',
        'class_submit'       => 'submit px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1',
        'comment_field'      => '<div class="comment-form-comment">
                                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-2">' . _x('Yorumunuz', 'noun', 'blogsr10') . '</label>
                                    <textarea id="comment" name="comment" rows="5" 
                                        class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow duration-300 resize-y" 
                                        required></textarea>
                                </div>',
        'fields'            => array(
            'author' => '<div class="comment-form-author">
                            <label for="author" class="block text-sm font-medium text-gray-700 mb-2">' . __('İsim', 'blogsr10') . ($req ? ' <span class="text-red-500">*</span>' : '') . '</label>
                            <input id="author" name="author" type="text" 
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow duration-300" 
                                value="' . esc_attr($commenter['comment_author']) . '" size="30"' . ($req ? ' required' : '') . '>
                        </div>',
            'email'  => '<div class="comment-form-email">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">' . __('E-posta', 'blogsr10') . ($req ? ' <span class="text-red-500">*</span>' : '') . '</label>
                            <input id="email" name="email" type="email" 
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow duration-300" 
                                value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . ($req ? ' required' : '') . '>
                        </div>',
            'url'    => '<div class="comment-form-url">
                            <label for="url" class="block text-sm font-medium text-gray-700 mb-2">' . __('Website', 'blogsr10') . '</label>
                            <input id="url" name="url" type="url" 
                                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition-shadow duration-300" 
                                value="' . esc_attr($commenter['comment_author_url']) . '" size="30">
                        </div>',
            'cookies' => '<div class="comment-form-cookies-consent flex items-start mt-6">
                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" 
                                class="mt-1 h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition duration-300">
                            <label for="wp-comment-cookies-consent" class="ml-3 block text-sm text-gray-600">' . 
                                __('Bir dahaki sefere yorum yaptığımda kullanılmak üzere adımı ve e-posta adresimi bu tarayıcıya kaydet.', 'blogsr10') . 
                            '</label>
                        </div>'
        ),
        'comment_notes_before' => '<p class="comment-notes text-sm text-gray-600 mb-6 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    E-posta adresiniz yayımlanmayacak. Gerekli alanlar işaretlendi <span class="text-red-500 ml-1">*</span>
                                  </p>',
        'comment_notes_after'  => '<p class="form-allowed-tags text-xs text-gray-500 mt-4">
                                    HTML etiketleri ve özellikler kullanabilirsiniz: <code class="text-gray-700">' . allowed_tags() . '</code>
                                  </p>'
    ));
    ?>
</div>

<!-- Yorum Başarılı/Hata Mesajları için Stil -->
<style>
    .comment-success {
        animation: slideIn 0.5s ease-out;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .comment-form input:focus,
    .comment-form textarea:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .comment-form .submit:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
    }
</style> 
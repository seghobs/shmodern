document.addEventListener('DOMContentLoaded', function() {
    // Yorum formunu seç
    const commentForm = document.querySelector('.comment-form');
    if (!commentForm) return;

    // Form gönderildiğinde
    commentForm.addEventListener('submit', function(e) {
        const submitButton = commentForm.querySelector('.submit');
        if (submitButton) {
            submitButton.disabled = true;
            submitButton.value = 'Gönderiliyor...';
        }
    });

    // Yanıtla butonları için
    const replyLinks = document.querySelectorAll('.comment-reply-link');
    replyLinks.forEach(link => {
        link.classList.add('text-blue-600', 'hover:text-blue-800', 'transition', 'duration-300');
    });

    // Yorum alanı için karakter sayacı
    const commentTextarea = document.querySelector('#comment');
    if (commentTextarea) {
        const counterDiv = document.createElement('div');
        counterDiv.classList.add('text-sm', 'text-gray-500', 'mt-2');
        commentTextarea.parentNode.appendChild(counterDiv);

        function updateCounter() {
            const remaining = 65535 - commentTextarea.value.length;
            counterDiv.textContent = `Kalan karakter: ${remaining}`;
        }

        commentTextarea.addEventListener('input', updateCounter);
        updateCounter();
    }

    // Form alanları için canlı doğrulama
    const inputs = commentForm.querySelectorAll('input[required], textarea[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('border-red-500');
                
                // Hata mesajı göster
                let errorMsg = this.parentNode.querySelector('.error-message');
                if (!errorMsg) {
                    errorMsg = document.createElement('p');
                    errorMsg.classList.add('error-message', 'text-red-500', 'text-sm', 'mt-1');
                    this.parentNode.appendChild(errorMsg);
                }
                errorMsg.textContent = 'Bu alan zorunludur.';
            } else {
                this.classList.remove('border-red-500');
                const errorMsg = this.parentNode.querySelector('.error-message');
                if (errorMsg) errorMsg.remove();
            }
        });

        input.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('border-red-500');
                const errorMsg = this.parentNode.querySelector('.error-message');
                if (errorMsg) errorMsg.remove();
            }
        });
    });
}); 
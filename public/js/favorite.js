document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.favorite-button').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const slug = this.getAttribute('data-slug');
            const heartIcon = this.querySelector('i');

            fetch("{{ route('favorites.toggle') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ slug: slug })
            })
            .then(response => response.json())
            .then(data => {
                if (data.favorited) {
                    button.classList.add('favorited');
                } else {
                    button.classList.remove('favorited');
                }
            })
            .catch(error => console.error('Chyba pri pridaní do obľúbených:', error));
        });
    });
});

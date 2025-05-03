@extends('layouts.app')

@section('content')
<section class="products">
    <h2>Moje obľúbené</h2>

    @forelse($favorites as $product)
        <div class="product-item">
            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}" class="product-image">
            </a>
            <h3>{{ $product->nazov }}</h3>
            <p>{{ $product->popis }}</p>
            <p class="price">{{ number_format($product->cena, 2) }}€</p>

            {{-- AJAXové srdiečko --}}
            <form class="favorite-form" method="POST">
                @csrf
                <button class="heart-icon favorite-button favorited" data-slug="{{ $product->slug }}">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
        </div>
        @empty
        <div class="no-favorites-message">
            Nemáte žiadne obľúbené produkty.
        </div>
    @endempty


</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.favorite-button').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');

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
                        // Voliteľne: odstrániť produkt zo stránky
                        button.closest('.product-item').remove();
                    }
                })
                .catch(error => console.error('Chyba pri úprave obľúbených:', error));
            });
        });
    });
</script>
@endpush

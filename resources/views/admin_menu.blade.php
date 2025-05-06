@extends('layouts.app')

@section('content')

@if(session('success'))
    <div id="popup-success" class="popup-success-wrapper">
        <div class="popup-success-content">
            <p>{{ session('success') }}</p>
            <button onclick="closeSuccessPopup()">OK</button>
        </div>
    </div>
@endif


<div class="admin-container">
    <h2>Ste prihlásený ako administrátor</h2>

    <nav class="admin-menu">
        <ul>
            <li><a href="{{ route('admin.products.create') }}">Pridať nový produkt</a></li>
            <li><a href="#" onclick="openPopup()">Upraviť alebo vymazať produkt</a></li>
        </ul>
    </nav>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Odhlásiť sa</button>
    </form>
</div>

<div id="editDeletePopup" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h2>Zadaj ID produktu</h2>
        <input type="text" id="productId" placeholder="ID produktu">
        <div class="modal-buttons">
            <button onclick="editProduct()">Upraviť</button>
            <button onclick="deleteProduct()">Vymazať</button>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    function closeSuccessPopup() {
        document.getElementById("popup-success").style.display = "none";
    }

    // Auto-zatvorenie po 3 sekundách
    window.addEventListener('load', function () {
        setTimeout(() => {
            const popup = document.getElementById("popup-success");
            if (popup) popup.style.display = "none";
        }, 3000);
    });

    function openPopup() {
        document.getElementById("editDeletePopup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("editDeletePopup").style.display = "none";
    }

    function editProduct() {
        var productId = document.getElementById("productId").value;
        if (productId) {
            window.location.href = "{{ url('admin/products/edit') }}/" + productId;
        } else {
            alert("Zadajte ID produktu!");
        }
    }

    function deleteProduct() {
        var productId = document.getElementById("productId").value;
        if (productId) {
            if (confirm("Naozaj chcete vymazať produkt s ID " + productId + "?")) {
                const url = "{{ url('admin/products/delete') }}/" + productId;

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        alert("Produkt bol vymazaný.");
                        closePopup();
                    } else {
                        return response.json().then(data => {
                            alert("Chyba: " + (data.message || "Nepodarilo sa vymazať produkt."));
                        });
                    }
                })
                .catch(error => {
                    console.error("Chyba:", error);
                    alert("Nastala chyba pri spracovaní požiadavky.");
                });
            }
        } else {
            alert("Zadajte ID produktu!");
        }
    }
</script>
@endpush

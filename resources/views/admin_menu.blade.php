@extends('layouts.app')

@section('content')
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

<script>
    function openPopup() {
        document.getElementById("editDeletePopup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("editDeletePopup").style.display = "none";
    }

    function editProduct() {
        var productId = document.getElementById("productId").value;
        if (productId) {
            window.location.href = "{{ url('admin/produkty/edit') }}/" + productId;
        } else {
            alert("Zadajte ID produktu!");
        }
    }

    function deleteProduct() {
        var productId = document.getElementById("productId").value;
        if (productId) {
            if (confirm("Naozaj chcete vymazať produkt s ID " + productId + "?")) {
                fetch("{{ url('admin/produkty/delete') }}/" + productId, {
                    method: 'POST',
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
                        alert("Chyba pri mazaní produktu.");
                    }
                });
            }
        } else {
            alert("Zadajte ID produktu!");
        }
    }
</script>
@endsection

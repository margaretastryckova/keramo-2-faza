@extends('layouts.app')

@section('content')
<div class="admin-product-container">
    <h2>Upraviť produkt</h2>

    <form class="add-product-form" method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('POST') {{-- Alebo PUT ak nastavíš route s PUT --}}
        
        <div class="add-product-layout">
            <div class="image-upload-group">
                <label for="hlavna_fotka">Hlavná fotka produktu:</label>
                <div class="image-upload-row">
                    <div class="image-upload-box">
                        <input type="file" id="hlavna_fotka" name="hlavna_fotka" accept="image/*">
                        <p>Aktuálna fotka: <a href="{{ asset($product->obrazok) }}" target="_blank">Zobraziť</a></p>
                    </div>
                </div>
            </div>

            <div class="form-fields">
                <div class="form-group">
                    <label for="nazov">Názov produktu:</label>
                    <input type="text" id="nazov" name="nazov" value="{{ old('nazov', $product->nazov) }}" required>
                </div>

                <div class="form-group">
                    <label for="kratky_popis">Krátky popis:</label>
                    <input type="text" id="kratky_popis" name="kratky_popis" value="{{ old('kratky_popis', $product->popis) }}" required>
                </div>

                <div class="form-group">
                    <label for="detailny_popis">Detailný popis:</label>
                    <textarea id="detailny_popis" name="detailny_popis" rows="5">{{ old('detailny_popis', $product->detail) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="cena">Cena (€):</label>
                    <input type="number" id="cena" name="cena" value="{{ old('cena', $product->cena) }}" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="kategoria">Kategória:</label>
                    <select id="kategoria" name="kategoria" required>
                        <option value="">-- Vyberte kategóriu --</option>
                        @foreach(['pohare', 'taniere', 'misky', 'sety', 'ine'] as $kat)
                            <option value="{{ $kat }}" {{ old('kategoria', $product->kategoria) == $kat ? 'selected' : '' }}>{{ ucfirst($kat) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="objem">Objem:</label>
                    <input type="text" id="objem" name="objem" value="{{ old('objem', $product->objem) }}">
                </div>

                <div class="form-group">
                    <label for="rozmer">Rozmer:</label>
                    <input type="text" id="rozmer" name="rozmer" value="{{ old('rozmer', $product->rozmer) }}">
                </div>

                <div class="form-group">
                    <label for="farba">Farba:</label>
                    <input type="text" id="farba" name="farba" value="{{ old('farba', $product->farba) }}">
                </div>
            </div>
        </div>

        <div class="form-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-admin">Zrušiť</a>
            <button type="submit" class="btn-admin">Uložiť zmeny</button>
        </div>
    </form>
</div>
@endsection

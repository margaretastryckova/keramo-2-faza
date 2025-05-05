@extends('layouts.app')

@section('content')
<div class="admin-product-container">
    <h2>Pridať nový produkt</h2>

    <form class="add-product-form" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="add-product-layout">
            <div class="image-upload-group">
                <label for="hlavna_fotka">Hlavná fotka produktu:</label>
                <div class="image-upload-row">
                    <div class="image-upload-box">
                        <input type="file" id="hlavna_fotka" name="hlavna_fotka" accept="image/*" required>
                    </div>
                </div>

                <label for="dopl_fotky">Doplnkové fotky produktu:</label>
                <div class="image-upload-row">
                    <div class="image-upload-box">
                        <input type="file" id="dopl_fotka_1" name="dopl_fotky[]" accept="image/*" required>
                    </div>
                    <div class="image-upload-box">
                        <input type="file" id="dopl_fotka_2" name="dopl_fotky[]" accept="image/*">
                    </div>
                    <div class="image-upload-box">
                        <input type="file" id="dopl_fotka_3" name="dopl_fotky[]" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="form-fields">
                <div class="form-group">
                    <label for="nazov">Názov produktu:</label>
                    <input type="text" id="nazov" name="nazov" value="{{ old('nazov') }}" required>
                </div>

                <div class="form-group">
                    <label for="kratky_popis">Krátky popis:</label>
                    <input type="text" id="kratky_popis" name="kratky_popis" value="{{ old('kratky_popis') }}" required>
                </div>

                <div class="form-group">
                    <label for="detailny_popis">Detailný popis:</label>
                    <textarea id="detailny_popis" name="detailny_popis" rows="5" required>{{ old('detailny_popis') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="cena">Cena (€):</label>
                    <input type="number" id="cena" name="cena" value="{{ old('cena', 0) }}" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="kategoria">Kategória:</label>
                    <select id="kategoria" name="kategoria" required>
                        <option value="">-- Vyberte kategóriu --</option>
                        <option value="pohare">Poháre</option>
                        <option value="taniere">Taniere</option>
                        <option value="misky">Misky</option>
                        <option value="sety">Sety</option>
                        <option value="ine">Iné</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-admin">Zrušiť</a>
            <button type="submit" class="btn-admin">Uložiť produkt</button>
        </div>
    </form>
</div>
@endsection

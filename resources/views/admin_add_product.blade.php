@extends('layouts.app')

@section('content')
<div class="admin-product-container">
    <h2>Pridať nový produkt</h2>

    <form class="add-product-form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="add-product-layout">
            <div class="image-upload-group">
                <label for="hlavna-fotka">Hlavná fotka produktu:</label>
                <div class="image-upload-row">
                    <div class="image-upload-box">
                        <label for="hlavna-fotka" class="upload-placeholder">+</label>
                        <input type="file" id="hlavna-fotka" name="hlavna_fotka" accept="image/*" required>
                    </div>
                </div>

                <label for="dopl-fotka-1">Doplnkové fotky produktu:</label>
                <div class="image-upload-row">
                    <div class="image-upload-box">
                        <label for="dopl-fotka-1" class="upload-placeholder">+</label>
                        <input type="file" id="dopl-fotka-1" name="dopl_fotky[]" accept="image/*">
                    </div>
                    <div class="image-upload-box">
                        <label for="dopl-fotka-2" class="upload-placeholder">+</label>
                        <input type="file" id="dopl-fotka-2" name="dopl_fotky[]" accept="image/*">
                    </div>
                    <div class="image-upload-box">
                        <label for="dopl-fotka-3" class="upload-placeholder">+</label>
                        <input type="file" id="dopl-fotka-3" name="dopl_fotky[]" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="form-fields">
                <div class="form-group">
                    <label for="nazov">Názov produktu:</label>
                    <input type="text" id="nazov" name="nazov" value="{{ old('nazov') }}" required>
                </div>

                <div class="form-group">
                    <label for="kratky-popis">Krátky popis:</label>
                    <input type="text" id="kratky-popis" name="kratky_popis" value="{{ old('kratky_popis') }}" required>
                </div>

                <div class="form-group">
                    <label for="detailny-popis">Detailný popis:</label>
                    <textarea id="detailny-popis" name="detailny_popis" rows="5" required>{{ old('detailny_popis') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="cena">Cena (€):</label>
                    <input type="number" id="cena" name="cena" value="{{ old('cena') }}" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="kategoria">Kategória:</label>
                    <select id="kategoria" name="kategoria" required>
                        <option value="" disabled selected>Vyberte kategóriu</option>
                        <option value="pohare" {{ old('kategoria') == 'pohare' ? 'selected' : '' }}>Poháre</option>
                        <option value="taniere" {{ old('kategoria') == 'taniere' ? 'selected' : '' }}>Taniere</option>
                        <option value="misky" {{ old('kategoria') == 'misky' ? 'selected' : '' }}>Misky</option>
                        <option value="sety" {{ old('kategoria') == 'sety' ? 'selected' : '' }}>Sety</option>
                        <option value="ine" {{ old('kategoria') == 'ine' ? 'selected' : '' }}>Iné</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-admin">Zrušiť</a>
            <button type="submit" class="btn-admin">Pridať produkt</button>
        </div>
    </form>
</div>
@endsection

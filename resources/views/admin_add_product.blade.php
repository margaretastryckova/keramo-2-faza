@extends('layouts.app')

@section('content')
<div class="admin-product-container">
    <h2>Pridať nový produkt</h2>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="add-product-form">
        @csrf
        <div class="add-product-layout">
            <div class="image-upload-group">

                <label for="obrazok">Hlavná fotka produktu:</label>
                <div class="image-upload-box">
                    <label for="obrazok" class="upload-placeholder">+</label>
                    <input type="file" id="obrazok" name="obrazok" accept="image/*" required>
                    <img id="hlavnyNahlad" style="margin-top:10px; max-height:200px;" />
                </div>

                <label for="detail">Detailná fotka produktu:</label>
                <div class="image-upload-box">
                    <label for="detail" class="upload-placeholder">+</label>
                    <input type="file" id="detail" name="detail" accept="image/*" required>
                    <img id="detailNahlad" style="margin-top:10px; max-height:200px;" />
                </div>
            </div>

            <div class="form-fields">
                <label for="nazov">Názov produktu:</label>
                <input type="text" name="nazov" required>

                <label for="popis">Popis:</label>
                <textarea name="popis" rows="4" required></textarea>

                <label for="cena">Cena (€):</label>
                <input type="number" name="cena" step="0.01" required>

                <label for="objem">Objem:</label>
                <input type="text" name="objem">

                <label for="rozmer">Rozmer:</label>
                <select id="rozmer" name="rozmer" required>
                    <option value="" disabled selected>Vyberte rozmer</option>
                    <option value="malý" {{ old('rozmer') == 'malý' ? 'selected' : '' }}>Malý</option>
                    <option value="stredný" {{ old('rozmer') == 'stredný' ? 'selected' : '' }}>Stredný</option>
                    <option value="veľký" {{ old('rozmer') == 'veľký' ? 'selected' : '' }}>Veľký</option>

                </select>

                <label for="farba">Farba:</label>
                <select id="farba" name="farba" required>
                    <option value="" disabled selected>Vyberte farbu</option>
                    <option value="červená" {{ old('farba') == 'červená' ? 'selected' : '' }}>Červená</option>
                    <option value="modrá" {{ old('farba') == 'modrá' ? 'selected' : '' }}>Modrá</option>
                    <option value="hnedá" {{ old('farba') == 'hnedá' ? 'selected' : '' }}>Hnedá</option>
                    <option value="zelená" {{ old('farba') == 'zelená' ? 'selected' : '' }}>Zelené</option>
                    <option value="biela" {{ old('farba') == 'biela' ? 'selected' : '' }}>Biela</option>
                    <option value="žltá" {{ old('farba') == 'žltá' ? 'selected' : '' }}>Žltá</option>
                    <option value="ružová" {{ old('farba') == 'ružová' ? 'selected' : '' }}>Ružová</option>
                </select>

                <label for="kategoria">Kategória:</label>
                <select name="kategoria" required>
                    <option value="" disabled selected>Vyber kategóriu</option>
                    <option value="pohare">Poháre</option>
                    <option value="taniere">Taniere</option>
                    <option value="misky">Misky</option>
                    <option value="sety">Sety</option>
                    <option value="ine">Iné</option>
                </select>
            </div>
        </div>

        <div class="form-buttons">
            <a href="{{ route('admin.index') }}" class="btn-admin">Zrušiť</a>
            <button type="submit" class="btn-admin">Pridať produkt</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('obrazok').addEventListener('change', function(e) {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('hlavnyNahlad').src = URL.createObjectURL(file);
    }
});

document.getElementById('detail').addEventListener('change', function(e) {
    const [file] = e.target.files;
    if (file) {
        document.getElementById('detailNahlad').src = URL.createObjectURL(file);
    }
});
</script>
@endpush

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
                        <img id="hlavnyNahlad" style="margin-top:10px; max-height:200px;" />
                    </div>
                </div>

                <label for="dopl-fotka">Doplnková fotka produktu:</label>
                <div class="image-upload-row">
                    <div class="image-upload-box">
                        <label for="dopl-fotka" class="upload-placeholder">+</label>
                        <input type="file" id="dopl-fotka" name="dopl_fotky[]" accept="image/*" required>
                        <img id="doplnkovyNahlad" style="margin-top:10px; max-height:200px;" />
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

                <!-- <div class="form-group">
                    <label for="detailny-popis">Detailný popis:</label>
                    <textarea id="detailny-popis" name="detailny_popis" rows="5" required>{{ old('detailny_popis') }}</textarea>
                </div> -->

                <div class="form-group">
                    <label for="farba">Farba:</label>
                    <input type="text" id="farba" name="farba" value="{{ old('farba') }}" required>
                </div>

                <div class="form-group">
                    <label for="rozmer">Rozmer:</label>
                    <input type="text" id="rozmer" name="rozmer" value="{{ old('rozmer') }}" required>
                </div>

                <div class="form-group">
                    <label for="objem">Objem:</label>
                    <input type="text" id="objem" name="objem" value="{{ old('objem') }}" required>
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

@push('scripts')
<script>
    // Náhľad hlavnej fotky
    document.getElementById('hlavna-fotka').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('hlavnyNahlad').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Náhľad doplnkovej fotky
    document.getElementById('dopl-fotka').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('doplnkovyNahlad').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

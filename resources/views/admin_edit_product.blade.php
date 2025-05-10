@extends('layouts.app')

@section('content')
<div class="admin-product-container">
    <h2>Upraviť produkt</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="add-product-form" method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="add-product-layout">
            <div class="image-upload-group">
                <label for="hlavna_fotka_input">Hlavná fotka produktu:</label>
                <div class="image-upload-box" id="hlavna_fotka_box">                    @php
                        $hlavnaFotkaPath = strpos($product->obrazok, 'products/') === 0
                            ? asset('storage/' . $product->obrazok)
                            : asset($product->obrazok);

                        $detailFotkaPath = $product->detail
                            ? (strpos($product->detail, 'products/') === 0 ? asset('storage/' . $product->detail) : asset($product->detail))
                            : null;
                    @endphp
                    @if($product->obrazok)
                        <p>Aktuálna hlavná fotka:</p>
                        <img id="hlavna_fotka_preview" src="{{ $hlavnaFotkaPath }}" alt="Hlavná fotka" style="max-width: 260px;">
                    @endif
                </div>
                <div style="margin-top: 5px;">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('hlavna_fotka_input').click(); document.getElementById('hlavna_fotka_preview')?.remove();">Upraviť</a>
                    <input type="file" id="hlavna_fotka_input" name="hlavna_fotka" accept="image/*" style="display: none;">
                </div>
            </div>

            <div class="image-upload-group">
                <label for="detail_fotka_input">Detailná fotka produktu:</label>
                <div class="image-upload-box" id="detail_fotka_box">                    @if($product->detail)
                        <p>Aktuálna detailná fotka:</p>
                        <img id="detail_fotka_preview" src="{{ $detailFotkaPath }}" alt="Detail fotka" style="max-width: 260px;">
                    @endif
                </div>
                <div style="margin-top: 5px;">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('detail_fotka_input').click(); document.getElementById('detail_fotka_preview')?.remove();">Upraviť</a>
                    <input type="file" id="detail_fotka_input" name="dopl_fotka" accept="image/*" style="display: none;">
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
                    <label for="farba">Farba:</label>
                    <select id="farba" name="farba" required>
                        <option value="">-- Vyberte farbu --</option>
                        @foreach(['červená', 'biela', 'hnedá', 'modrá', 'zelená', 'žltá', 'ružová'] as $farba)
                            <option value="{{ $farba }}" {{ old('farba', $product->farba) == $farba ? 'selected' : '' }}>
                                {{ ucfirst($farba) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="rozmer">Rozmer:</label>
                    <select id="rozmer" name="rozmer" required>
                        <option value="">-- Vyberte rozmer --</option>
                        @foreach(['malý', 'stredný', 'veľký'] as $rozmer)
                            <option value="{{ $rozmer }}" {{ old('rozmer', $product->rozmer) == $rozmer ? 'selected' : '' }}>
                                {{ ucfirst($rozmer) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="objem">Objem:</label>
                    <input type="text" id="objem" name="objem" value="{{ old('objem', $product->objem) }}">
                </div>

                <div class="form-group">
                    <label for="cena">Cena (€):</label>
                    <input type="number" id="cena" name="cena" value="{{ old('cena', $product->cena) }}" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="rozmer">Rozmer:</label>
                    <select id="rozmer" name="rozmer" required>
                        <option value="">-- Vyberte rozmer --</option>
                        @foreach(['malý', 'stredný', 'veľký'] as $rozmer)
                            <option value="{{ $rozmer }}" {{ old('rozmer', $product->rozmer) == $rozmer ? 'selected' : '' }}>
                                {{ ucfirst($rozmer) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-buttons">
            <a href="{{ route('admin.index') }}" class="btn-admin">Zrušiť</a>
            <button type="submit" class="btn-admin">Uložiť zmeny</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Náhľad hlavnej fotky
    document.getElementById('hlavna_fotka_input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.style.maxWidth = '210px';
                preview.classList.add('preview');
                const container = document.getElementById('hlavna_fotka_box');
                const existingPreview = container.querySelector('img.preview');
                if (existingPreview) existingPreview.remove();
                container.appendChild(preview);
            };
            reader.readAsDataURL(file);
        }
    });

    // Náhľad detailnej fotky
    document.getElementById('detail_fotka_input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.style.maxWidth = '210px';
                preview.style.marginTop = '10px';
                preview.classList.add('preview');
                const container = document.getElementById('detail_fotka_box');
                const existingPreview = container.querySelector('img.preview');
                if (existingPreview) existingPreview.remove();
                container.appendChild(preview);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
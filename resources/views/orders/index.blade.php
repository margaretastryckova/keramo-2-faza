@extends('layouts.app')

@section('content')
<style>
    .order-items {
        margin-top: 10px;
        padding: 10px;
        background-color: #f8f9fa;
        border-radius: 6px;
        border: 1px solid #ddd;
    }

    .order-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .order-item img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        margin-right: 15px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .order-item-info {
        font-size: 14px;
    }

    .order-separator {
        height: 1px;
        background-color: #dee2e6;
        margin: 20px 0;
    }

    .order-table {
        width: 100%;
        margin-bottom: 30px;
    }

    .order-table th, .order-table td {
        padding: 10px;
        text-align: left;
    }
</style>

<div class="container">
    <h2>Moje objednávky</h2>

    @if ($orders->isEmpty())
        <p>Nemáte žiadne objednávky.</p>
    @else
        <table class="table order-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dátum</th>
                    <th>Spôsob platby</th>
                    <th>Spôsob doručenia</th>
                    <th>Celková cena</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>{{ ucfirst($order->payment) }}</td>
                        <td>{{ ucfirst($order->delivery) }}</td>
                        <td>{{ number_format($order->total, 2) }} €</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div class="order-items">
                                <h4>Produkty v tejto objednávke:</h4>
                                <ul class="list-unstyled">
                                    @foreach (json_decode($order->items, true) as $item)
                                        <li class="order-item">
                                            <img src="{{ asset($item['obrazok']) }}" alt="{{ $item['nazov'] }}">
                                            <div class="order-item-info">
                                                <strong>{{ $item['nazov'] }}</strong><br>
                                                {{ $item['quantity'] }} × {{ number_format($item['cena'], 2) }} €
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

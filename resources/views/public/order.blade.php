@extends('layouts.app')

@section('title')
Kreiraj narudžbinu
@endsection

@section('content')
<div class="container mt-5">
    <div class="bg-primary text-white p-4 rounded shadow-sm">
        <h1 class="display-5"><strong>Kreirajte narudžbinu</strong></h1>
        <hr class="border-light w-25">
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zatvori"></button>
    </div>
    @endif

    <div class="mt-4">
        <form action="{{ route('public.order') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="product_id" class="form-label"><strong>Izaberite proizvod</strong></label>
                <select name="product_id" id="product_id" class="form-select" required>
                    <option value="">-- Izaberite --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->name }} - {{ number_format($product->price, 2) }} RSD
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label"><strong>Količina</strong></label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-danger px-4">
                    Pošalji narudžbinu
                </button>
                <a href="{{ route('public.profile') }}" class="btn btn-secondary px-4">
                    Otkaži
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

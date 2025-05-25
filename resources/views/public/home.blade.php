@extends("layouts.app")

@section("title")
Početna - Ribolovački savez
@endsection

@section("content")
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">Ribolovačka oprema</h1>
        <h2 class="text-primary fw-bold">Istaknuti proizvodi</h2>
        <hr class="border-5 border-primary mx-auto" style="width: 60px;">
    </div>

    <div class="row">
        @foreach($products as $product)
            @if($product->is_featured)
                <div class="col-md-4 mb-4 d-flex">
                    <div class="card h-100 shadow-sm w-100 d-flex flex-column">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="alert alert-primary text-center py-2">
                                <strong>25% POPUSTA</strong><br>
                                <span class="fs-5">Cena: {{ number_format($product->price, 2) }} RSD</span>
                            </div>
                            <p class="card-text flex-grow-1" style="min-height: 80px;">{{ $product->description }}</p>
                            <a href="{{ route('public.single', $product->id) }}" class="btn btn-primary mt-auto">Detalji</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

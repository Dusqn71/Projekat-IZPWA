@extends("layouts.app")

@section("title")
{{ $product->name }}
@endsection

@section("content")
<div class="w3-container" style="margin-top:80px">
    <h1 class="w3-jumbo w3-center"><b>Detalji proizvoda</b></h1>
    <hr style="width:100px;border:5px solid #2196F3" class="w3-round w3-center">
</div>

<div class="w3-container w3-padding-64">
    <div class="w3-row-padding w3-card-4 w3-white w3-round-large" style="padding: 32px;">
        <div class="w3-half w3-center">
            <img src="{{ asset($product->image) }}" alt="{{ $product->naziv }}" 
                 style="width:100%; max-width:400px; object-fit:cover;" 
                 class="w3-image w3-border w3-padding w3-hover-opacity">
        </div>

        <div class="w3-half">
            <h2 class="w3-text-blue"><b>{{ $product->naziv }}</b></h2>
            
            <div class="w3-panel w3-pale-blue w3-leftbar w3-border-blue w3-padding-16 w3-round-large">
                <h3 class="w3-center w3-margin">
                    <span class="w3-large">Cena:</span><br>
                    <span class="w3-xxlarge w3-text-blue"><strong>{{ number_format($product->price, 2) }} RSD</strong></span>
                </h3>
            </div>

            <div class="w3-panel w3-light-grey w3-padding-large w3-round-large w3-margin-top">
                <h4 class="w3-text-grey">Opis proizvoda</h4>
                <p>{{ $product->description }}</p>
            </div>

            <a href="{{ route('public.ponuda') }}" class="w3-button w3-blue w3-large w3-margin-top w3-round-large">
                <i class="fa fa-arrow-left"></i> Nazad na ponudu
            </a>
        </div>
    </div>
</div>
@endsection

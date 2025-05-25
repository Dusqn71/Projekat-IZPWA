@extends("layouts.app")

@section("title")
Kontakt
@endsection

@section("content")
<style>
    .bgimg {
        background-image: url('{{ asset("images/forestbridge.jpg") }}');
        min-height: 100vh;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        color: white;
    }

    .overlay-content {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }
</style>

<div class="bgimg d-flex align-items-center justify-content-center py-5">
    <div class="overlay-content w-100">
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold text-primary">Kontaktirajte nas</h1>
            <hr class="border-primary border-3 w-25 mx-auto">
        </div>

        <div class="row">
            <!-- Kontakt podaci -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">Kontakt podaci Ribolovačkog saveza</h4>
                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item">
                                <strong>Adresa:</strong><br>
                                Balkanska 19, Beograd
                            </li>
                            <li class="list-group-item">
                                <strong>Telefon:</strong><br>
                                +381 12 321 456
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong><br>
                                <a href="mailto:ribolovackisavez@gmail.com">ribolovackisavez@gmail.com</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Radno vreme:</strong><br>
                                Ponedeljak - Petak: 08:00 - 16:00
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Google mapa -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">Nađite nas na mapi</h4>
                        <div class="ratio ratio-4x3 mt-3">
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.489480354875!2d20.4608706!3d44.811591899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aba833c5ead%3A0xf1f5acc8f3b91e8c!2sSamo%20Pivo!5e0!3m2!1ssr!2srs!4v1747826381870!5m2!1ssr!2srs" 
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

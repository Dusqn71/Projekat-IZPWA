@extends("layouts.app")

@section("title")
Login stranica
@endsection

@section("content")
<div class="container" style="margin-top: 80px;">
    <h1 class="display-4 fw-bold text-primary">Prijava</h1>
    <hr style="width: 50px; border: 4px solid #0d6efd;" class="rounded">

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            {{-- Flash poruke --}}
            @if (session("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session("success") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zatvori"></button>
                </div>
            @endif

            @if (session("error"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session("error") }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zatvori"></button>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Prijavite se</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeLogin') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label"><b>Email</b></label>
                            <input type="email" id="email" name="email" class="form-control" 
                                   placeholder="Unesite email adresu" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label"><b>Lozinka</b></label>
                            <input type="password" id="password" name="password" class="form-control" 
                                   placeholder="Unesite svoju šifru" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <b>PRIJAVI SE</b>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends("layouts/admin")

@section("title")
Izmena korisnika
@endsection

@section("content")

@if(session("error"))
    <div class="alert alert-danger">
        {{ session("error") }}
    </div>
@endif

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="">Ime</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="">Lozinka</label>
                        <input type="text" class="form-control" value="Lozinka je zaštićena" disabled>
                        <small class="text-muted">Lozinku nije moguće menjati sa ove stranice.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
                    <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

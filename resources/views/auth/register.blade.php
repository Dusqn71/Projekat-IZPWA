@extends("layouts/admin")

@section("title")
Registracija
@endsection

@section("content")

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <div class="mb-5 text-center">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Register</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeRegister') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Naziv</label>
                            <input type="text" name="name" placeholder="Unesite svoj naziv" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Unesite svoj email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Unesite svoju sifru" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
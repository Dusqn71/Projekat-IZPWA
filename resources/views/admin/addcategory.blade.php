@extends("layouts/admin")

@section("title")
Dodaj novu kategoriju
@endsection

@section("content")
<div class="container mt-4">
    <h2>Dodavanje nove kategorije</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.addcategory') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naziv kategorije</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Unesite naziv kategorije" required>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj</button>
        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection

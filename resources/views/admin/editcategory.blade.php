@extends("layouts/admin")

@section("title")
    Izmena kategorije
@endsection

@section("content")

@if(session("error"))
    <div class="alert alert-danger">
        {{ session("error") }}
    </div>
@endif

@if(session("success"))
    <div class="alert alert-success">
        {{ session("success") }}
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mt-4">
            <div class="card-header">
                <h4>Izmeni kategoriju</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.editcategory', $category->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Naziv kategorije</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
                    <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Nazad</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

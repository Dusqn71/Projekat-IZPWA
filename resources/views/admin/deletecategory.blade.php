@extends("layouts/admin")

@section("title")
    Provera za brisanje kategorije
@endsection

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-6 text-center ">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Delete category
                    </h5>
                </div>
                <div class="card-body">
                    <p>Da li ste sigurni da zelite da obirsete kategoriju?</p>
                    <form action="{{ route('admin.deletecategory', $id) }}" method="post">
                        @csrf
                        <button class="btn btn-danger">
                            Obrisi kategoriju
                        </button>
                        <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
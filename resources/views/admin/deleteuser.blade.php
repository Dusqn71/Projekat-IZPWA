@extends("layouts/admin")

@section("title")
    Provera za brisanje korisnika
@endsection

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-6 text-center ">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Delete user
                    </h5>
                </div>
                <div class="card-body">
                    <p>Da li ste sigurni da zelite da obirsete korisnika?</p>
                    <form action="{{ route('admin.deleteuser', $id) }}" method="post">
                        @csrf
                        <button class="btn btn-danger">
                            Obrisi korisnika
                        </button>
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends("layouts/admin")

@section("title")
    Lista korisnika - Admin Panel
@endsection

@section("content")
<div class="container-fluid px-4">
    @if(session("success"))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session("error"))
        <div class="alert alert-danger alert-dismissible fade show mt-3">
            {{ session("error") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h1 class="fw-bold mb-0"><i class="fas fa-users me-2"></i>Lista Korisnika</h1>
        <a href="{{ route('register') }}" class="btn btn-success">
            <i class="fas fa-user-plus me-1"></i> Dodaj Korisnika
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="usersTable" class="table table-hover table-striped w-100">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Ime</th>
                            <th width="25%">Email</th>
                            <th width="15%">Uloga</th>
                            <th width="15%">Registrovan</th>
                            <th width="20%" class="text-center">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role->name == 'Admin' ? 'danger' : 'primary' }} rounded-pill">
                                    {{ $user->role->name ?? 'Nedefinisano' }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d.m.Y.') }}</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.edituser', $user->id) }}" 
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip" title="Izmeni">
                                        <i class="fas fa-edit">Izmeni</i>
                                    </a>
                                    <a href="{{ route('admin.deleteuser', $user->id) }}" 
                                       class="btn btn-sm btn-outline-danger"
                                       data-bs-toggle="tooltip" title="Obriši"
                                       onclick="return confirm('Da li ste sigurni da želite obrisati ovog korisnika?')">
                                        <i class="fas fa-trash-alt">Obrisi</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#usersTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
        },
        columnDefs: [
            { orderable: false, targets: [5] },
            { searchable: false, targets: [5] } 
        ]
    });

    $('[data-bs-toggle="tooltip"]').tooltip();
});
</script>
@endsection
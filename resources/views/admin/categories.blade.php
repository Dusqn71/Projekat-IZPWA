@extends("layouts/admin")

@section("title")
    Lista kategorija - Admin Panel
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
        <h1 class="fw-bold mb-0"><i class="fas fa-tags me-2"></i>Lista Kategorija</h1>
         <a href="{{ route('admin.addcategory') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> Dodaj Kategoriju
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="categoriesTable" class="table table-hover table-striped w-100">
                    <thead class="table-dark">
                        <tr>
                            <th width="10%">ID</th>
                            <th width="70%">Naziv</th>
                            <th width="20%" class="text-center">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                   <a href="{{ route('admin.editcategory', $category->id) }}" 
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip" title="Izmeni">
                                        <i class="fas fa-edit">Izmeni</i>
                                    </a>
                                    <a href="{{ route('admin.deletecategory', $category->id) }}" 
                                       class="btn btn-sm btn-outline-danger"
                                       data-bs-toggle="tooltip" title="Obriši"
                                       onclick="return confirm('Da li ste sigurni da želite obrisati ovu kategoriju?')">
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
    $('#categoriesTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
        },
        columnDefs: [
            { orderable: false, targets: [2] },
            { searchable: false, targets: [2] }
        ],
        order: [[1, 'asc']]
    });

    $('[data-bs-toggle="tooltip"]').tooltip();
});
</script>
@endsection
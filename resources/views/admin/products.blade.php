@extends("layouts/admin")

@section("title")
    Lista proizvoda - Admin Panel
@endsection

@section("content")
<div class="container-fluid px-4">
    @if(session("success"))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session("info"))
        <div class="alert alert-info alert-dismissible fade show mt-3">
            {{ session("info") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
        <h1 class="fw-bold mb-0"><i class="fas fa-boxes me-2"></i>Lista Proizvoda</h1>
             <a href="{{ route('admin.addproduct') }}" class="btn btn-success">
            <i class="fas fa-plus-circle me-1"></i> Dodaj Proizvod
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table id="productsTable" class="table table-hover table-striped w-100">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="10%">Slika</th>
                            <th width="15%">Naziv</th>
                            <th width="20%">Opis</th>
                            <th width="10%">Cena</th>
                            <th width="15%">Kategorija</th>
                            <th width="10%">Istaknut</th>
                            <th width="15%" class="text-center">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" 
                                     class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit(strip_tags($product->description), 50) }}</td>
                            <td class="fw-bold">{{ number_format($product->price, 2) }} RSD</td>
                            <td>
                                <span class="badge bg-primary">{{ $product->category->name ?? 'N/A' }}</span>
                            </td>
                            <td class="text-center">
                                @if($product->is_featured)
                                    <span class="badge bg-success rounded-pill"><i class="fas fa-check"></i> DA</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill"><i class="fas fa-times"></i> NE</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.edit', $product->id) }}"  
                                       class="btn btn-sm btn-outline-primary"
                                       data-bs-toggle="tooltip" title="Izmeni">
                                        <i class="fas fa-edit"></i> Izmeni
                                    </a>
                                    <a href="{{ route('admin.delete', $product->id) }}" 
                                       class="btn btn-sm btn-outline-danger"
                                       data-bs-toggle="tooltip" title="Obriši"
                                       onclick="return confirm('Da li ste sigurni?')">
                                        <i class="fas fa-trash-alt"></i> Obriši
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
    $('#productsTable').DataTable({
        responsive: true,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/sr-SP.json'
        }
    });

    $('[data-bs-toggle="tooltip"]').tooltip();
});
</script>
@endsection
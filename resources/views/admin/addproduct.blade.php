@extends("layouts/admin")

@section("title")
Dodavanje proizvoda
@endsection

@section("content")

@if(session("error"))
    <div class="alert alert-danger">
        {{ session("error") }}
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Naziv</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="">Opis</label>
                        <textarea name="description" id="summernote" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Cena</label>
                        <input type="number" name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Slika</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-3">
                        <label for="">Kategorija</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured">
                        <label for="is_featured" class="form-check-label">Istaknuti proizvod</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
                    <a href="{{ route('admin.products') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>




<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['para', ['ul', 'ol']],
            ['insert', ['link', 'picture']]
        ]
    });
});
</script>
@endsection

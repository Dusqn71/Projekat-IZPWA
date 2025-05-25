@extends("layouts/admin")

@section("title")
Izmena proizvoda
@endsection

@section("content")

@if(session("error"))
    <div class="alert alert-danger">
        {{session("error")}}
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="">Naziv proizvoda</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>

                    <div class="mb-3">
                        <label for="">Opis</label>
                        <textarea name="description" id="summernote" class="form-control">{{ (strip_tags($product->description)) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="">Kategorija</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? "selected" : "" }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="">Istaknut?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
                            <label class="form-check-label">Da</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="">Trenutna slika</label><br>
                        <img src="{{ asset($product->image) }}" width="120" height="120" class="img-thumbnail mb-2">
                    </div>

                    <div class="mb-3">
                        <label for="">Nova slika (opciono)</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
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
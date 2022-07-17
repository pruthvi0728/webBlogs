@extends('app')
@section('content')
    <div class="container bg-light pt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10 card-title">
                        <h3>Create Blog</h3>
                    </div>
                    <div class="col-md-2 card-toolbar">
                        <a href="{{route('blogs.index')}}" class="btn btn-primary">
                        <span class="svg-icon svg-icon-md svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="32" height="32"
                            viewBox="0 0 32 32"
                            style=" fill:#000000;"><path d="M 13 4 L 13 6 L 9 6 L 9 8 L 5 8 L 5 10 L 2 10 L 2 11 L 2 12 L 2 13 L 4 13 L 4 28 L 28 28 L 28 13 L 30 13 L 30 12 L 30 11 L 30 10 L 27 10 L 27 9 L 27 8 L 27 4 L 25 4 L 25 8 L 23 8 L 23 6 L 19 6 L 19 4 L 13 4 z M 14 7 L 18 7 L 18 8 L 18 9 L 22 9 L 22 10 L 22 11 L 26 11 L 26 12 L 26 13 L 26 26 L 22 26 L 22 14 L 10 14 L 10 26 L 6 26 L 6 13 L 6 12 L 6 11 L 10 11 L 10 10 L 10 9 L 14 9 L 14 8 L 14 7 z M 12 16 L 20 16 L 20 20 L 18 20 L 18 22 L 20 22 L 20 26 L 12 26 L 12 16 z"></path></svg>
                        </span>Blogs List</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('blogs.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                        @error('title')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('title') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                        @error('description')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label">Select Category</label>
                        <select class="form-select @error('categories') is-invalid @enderror" id="categories" name="categories[]" multiple>
                            @foreach ($categories as $categoryId => $categoryName)
                                <option value="{{$categoryId}}">{{$categoryName}}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3"></div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
@endsection
@section('page-Js')
<script>
    $(document).ready(function() {
        $('#categories').select2();
    });
</script>
@endsection
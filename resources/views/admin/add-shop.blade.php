@extends('layouts.main')

@section('container')

    <div class="row justify-content-center my-3">
        <h3 class="text-center">Add Shop</h3>
    
        <form method="post" action="/add-shop" class="col-lg-6" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="3" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="inputImage" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn text-light" style="background-color: #00A19D">Add Shop</button>
        </form>        
    </div>


@endsection
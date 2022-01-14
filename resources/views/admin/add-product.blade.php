@extends('layouts.main')

@section('container')

    <div class="row justify-content-center my-3">
        <h3 class="text-center">Add Product</h3>
    
        <form method="post" action="/add-product" class="col-lg-6" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputCategory" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" name="category">
                    <option value="" selected>Choose a Category!</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"  {{ old('category') == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="shop" class="form-label">Shop</label>
                <select class="form-select @error('shop') is-invalid @enderror" name="shop">
                    <option value="" selected>Choose a Shop!</option>
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}"  {{ old('shop') == $shop->id ? ' selected' : '' }}>{{ $shop->name }}</option>
                    @endforeach
                </select>
                @error('shop')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPrice" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{ old('price') }}" min="0">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                {{-- <input class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="3" name="description" value="{{ old('description') }}"> --}}
                <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="3" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputImage" class="form-label">Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="inputImage" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn text-light" style="background-color: #00A19D">Add Product</button>
        </form>        
    </div>


@endsection
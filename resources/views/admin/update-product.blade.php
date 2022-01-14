@extends('layouts.main')

@section('container')
    
    <div class="my-3">
        <div class="col p-1 mb-2" style="background-color: #00A19D">
            <h4 class="text-white">Update Product</h4>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-5" >
                <img src="{{asset('storage/images/Product/'.$product[0]->image)}}" class="card-img-top mb-5 mb-md-0">
            </div>
            <div class="col-md-7">
                <form method="post" action="/admin/update-product/{{ $product[0]->id }}" class="col-lg-8 ms-4" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col mb-3">
                        <label for="inputCategory" class="form-label">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                            @foreach ($categories as $category)
                                @if (old('category_id', $product[0]->category_id) == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else  
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name',$product[0]->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPrice" class="form-label">Product Price ($)</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="inputPrice" name="price" value="{{ $product[0]->price }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputDescription" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" rows="3" name="description">{{ $product[0]->description }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputImage" class="form-label">Product Image</label>
                        <input type="hidden" name="oldImage" value="{{ $product[0]->image }}">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="inputImage" name="newImage" value="">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-white" style="background-color: #00A19D">Update</button>
                </form>
            </div>
        </div>
    </div>


@endsection
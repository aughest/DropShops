@extends('layouts.main')

@section('container')


  
  <form action="/updateProfile" method="POST" enctype="multipart/form-data">
    <div class="row justify-content-center mb-3">
      @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
          {{ session('success') }}
        </div>
      @endif
    </div>
    @csrf
    @method('put')
    <div class="row justify-content-center">
      <div class="col-md-2 border-right mb-3">
        <div class="d-flex flex-column align-items-center text-center">
          @if (Auth::user()->image != "")
            <img class="img-preview img-fluid rounded-circle mb-3 col-sm-12" width="150px" src="{{ asset('storage/images/Profile/'.Auth::user()->image) }}">
          @else
            <img class="img-preview img-fluid rounded-circle mb-3 col-sm-12" src="{{ asset('storage/images/Profile/profile-photo.png') }}"> 
          @endif
          <div class="my-3">
            <input type="hidden" name="oldImage" value="{{ Auth::user()->image }}">
            <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          </div>
          <span class="font-weight-bold">{{ Auth::user()->username }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
          <a href="/change-password" class="btn text-light mt-3" style="background-color: #00A19D">Change Password</a>
        </div>
      </div>
      <div class="col-md-5 border-right">
        <div class="">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Profile</h4>
          </div>
            <div class="mb-4">
              <h5>Biodata</h5>
              <div class="col-md-12">
                <label class="labels">Full Name</label>
                <input type="text" class="form-control @error('full_name') is-invalid @enderror" value="{{ Auth::user()->full_name }}" name="full_name">
                @error('full_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-12">
                <label class="labels">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ Auth::user()->username }}">
                @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div>
              <h5>Contact</h5>
              <div class="col-md-12">
                <label class="labels">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" class="form-control" value="{{ Auth::user()->email }}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-12">
                <label class="labels">Phone Number</label>
                <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" class="form-control" value="{{ Auth::user()->phoneNumber }}">
                @error('phoneNumber')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mt-5 text-center">
              <button class="btn profile-button text-light" style="background-color: #00A19D" type="submit">Save Profile</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
    
<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
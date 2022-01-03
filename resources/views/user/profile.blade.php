@extends('layouts.main')

@section('container')

<div class="container rounded bg-white">
  <div class="row justify-content-center">
    <div class="col-md-2 border-right">
      <div class="d-flex flex-column align-items-center text-center">
        <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
        <span class="font-weight-bold">{{ Auth::user()->username }}</span><span class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
        <a href="/change-password" class="btn text-light mt-3" style="background-color: #00A19D">Change Password</a>
      </div>
    </div>
    <div class="col-md-5 border-right">
      <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="text-right">Profile</h4>
        </div>
        <div class="mb-2">
          <h5>Biodata</h5>
          <div class="col-md-12">
            <label class="labels">Username</label>
            <input type="text" class="form-control" placeholder="{{ Auth::user()->username }}">
          </div>
          <div class="col-md-12">
            <label class="labels">Full Name</label>
            <input type="text" class="form-control" placeholder="{{ Auth::user()->username }}">
          </div>
        </div>
        <div>
          <h5>Contact</h5>
          <div class="col-md-12">
            <label class="labels">Email</label>
            <input type="text" class="form-control" placeholder="{{ Auth::user()->email }}" disabled>
          </div>
          <div class="col-md-12">
            <label class="labels">Phone Number</label>
            <input type="text" class="form-control" placeholder="{{ Auth::user()->phoneNumber }}" disabled>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
          <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
        </div>
          <div class="mt-5 text-center"><button class="btn profile-button text-light" style="background-color: #00A19D" type="submit">Save Profile</button></div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
    
@endsection
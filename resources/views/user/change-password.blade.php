@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <h3 class="text-center">Change Password</h3>
    
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        <form method="post" action="/change-password" class="col-lg-6" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="currPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control @error('currPassword') is-invalid @enderror" id="currPassword" name="currPassword" value="{{ old('currPassword') }}">
                @error('currPassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control @error('newPassword') is-invalid @enderror" id="newPassword" name="newPassword" value="{{ old('newPassword') }}">
                @error('newPassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newConfirmPassword" class="form-label">New Confirm Password</label>
                <input type="password" class="form-control @error('newConfirmPassword') is-invalid @enderror" id="newConfirmPassword" name="newConfirmPassword" value="{{ old('newConfirmPassword') }}">
                @error('newConfirmPassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class=" d-flex justify-content-center">
                <button type="submit" class="btn text-light" style="background-color: #00A19D">Update Password</button>
            </div>
        </form>
        
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
    </div>


@endsection
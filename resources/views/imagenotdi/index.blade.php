@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Upload image</div>
        <div class="card-body">
          @if ($errors->any())
          <ul id="errors" class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          <form action="{{ route('imagenotdi.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Image:</label>
              <input type="file" name="profile_image" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <img src="{{ asset('storage/test.png') }}" alt="Uploaded image" />
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

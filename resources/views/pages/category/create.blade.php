@extends('layouts.admin')

@push('styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Add New Category</h1>
  <p class="mb-4">Discovering a new set of categories for restaurant?</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add new Category</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-input type="text"
                id="name" placeholder="Category name" name="name"
                :value="old('name')"
                :error="$errors->first('name')" />
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-input type="text"
                id="description" placeholder="Menu description"
                name="description" :value="old('description')"
                :error="$errors->first('description')" />
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Icon <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-input type="file" accept="image/png, image/gif, image/jpeg"
                id="icon" name="icon"
                :error="$errors->first('icon')" />
            </div>
          </div>

          <button class="btn btn-primary btn-block">Add</button>
        </form>
      </div>
  </div>

@endsection

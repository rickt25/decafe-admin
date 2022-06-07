@extends('layouts.admin')

@push('styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Add menu</h1>
  <p class="mb-4">Having a new menu on the restaurant?</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Add new {{ $category->name }}</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-input type="text"
                id="name" placeholder="Menu name" name="name"
                :value="old('name')"
                :error="$errors->first('name')" />
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-select name="category_id">
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}" @if(old('category_id', $category->id) == $cat->id) selected @endif>{{ $cat->name }}</option>
                @endforeach
              </x-select>
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
            <label for="price" class="col-sm-2 col-form-label">Price <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-input type="number"
                id="price" placeholder="Menu price"
                name="price" :value="old('price')"
                :error="$errors->first('price')" />
            </div>
          </div>
          <div class="form-group row">
            <label for="discounted_price" class="col-sm-2 col-form-label">Discounted Price</label>
            <div class="col-sm-10">
              <x-input type="number"
                id="discounted_price" placeholder="Discounted Price"
                name="discounted_price" :value="old('discounted_price')"
                :error="$errors->first('discounted_price')" />
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Image <span class="text-danger">*</span></label>
            <div class="col-sm-10">
              <x-input type="file" accept="image/png, image/gif, image/jpeg"
                id="image" name="image"
                :error="$errors->first('image')" />
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="checkbox" name="is_available" id="is_available" checked>
              <label for="is_available" class="mr-4">Available</label>

              <input type="checkbox" name="is_promo" id="is_promo">
              <label for="is_promo">Promo menu</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block">Add</button>
        </form>
      </div>
  </div>

@endsection

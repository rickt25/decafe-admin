@extends('layouts.admin')

@push('styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Menus</h1>
  <p class="mb-4">All {{ $category->name }} in resto</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">{{ $category->name }} list</h6>
          <a href="{{ route('menu.create') }}?category={{ Str::slug($category->name) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                  class="fas fa-plus text-white-50"></i> Add new menu</a>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th class="fit">Image</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th class="fit">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($menus as $menu)
                        <tr>
                          <td><img class="menu-icon" src="{{ asset($menu->image) }}" alt=""></td>
                          <td>{{ $menu->name }}</td>
                          <td>{{ $menu->description }}</td>
                          <td class="fit">
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-success btn-sm">Edit</a>
                              <button type="submit" class="btn btn-danger btn-sm btnDelete">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

      </div>
  </div>

@endsection

@push('scripts')
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });

    $(".btnDelete").each(function() {
      $(this).click(function() {
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $(this).closest("form").submit();
          }else{
            return false;
          }
        });
        return false;
      });
    });
  </script>
@endpush

@extends('layouts.admin')

@push('styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Categories</h1>
  <p class="mb-4">Categories of available type of foods in resto.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Category List </h6>
      <a href="{{ route('category.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-plus text-white-50"></i> Add new category</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="fit">Icon</th>
              <th>Name</th>
              <th>Description</th>
              <th class="fit">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr>
                <td><img class="box-icon" src="{{ asset($category->icon) }}" alt=""></td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td class="fit">
                  <form id="formDelete" action="{{ route('category.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('menu.index', ['category' => $category->slug]) }}"
                      class="btn btn-info btn-sm">Menus</a>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-success btn-sm">Edit</a>
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
            } else {
              return false;
            }
          });
          return false;
        });
      });
    });
  </script>
@endpush

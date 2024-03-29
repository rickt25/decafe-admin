@extends('layouts.admin')

@push('styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Transactions</h1>
  <p class="mb-4">List of transactions</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Transactions list</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th class="fit">Order Id</th>
                          <th>Date Time</th>
                          <th>Subtotal</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($transactions as $transaction)
                        <tr>
                          <td class="fit">{{ $transaction->id }}</td>
                          <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('d/m/Y') }}</td>
                          <td>{{ "Rp " . number_format($transaction->grand_total,2,',','.') }}</td>
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
  </script>
@endpush

@extends('layouts.admin')

@push('styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Orders</h1>
  <p class="mb-4">Current orders in resto today</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Order list</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="tableOrder" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th class="fit">Order Id</th>
                          <th>Table No.</th>
                          <th>Subtotal</th>
                          <th>Status</th>
                          <th class="fit">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($pendingOrders as $order)
                        <tr>
                          <td class="fit">{{ $order->id }}</td>
                          <td>{{ $order->number ?? "-" }}</td>
                          <td>{{ "Rp " . number_format($order->grand_total,2,',','.') }}</td>
                          <td>{{ $order->status }}</td>
                          <td class="fit">
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmCancel({{ $order->id }})" style="width: 30px"><i class="fas fa-times"></i></button>
                            <button type="button" class="btn btn-success btn-sm" onclick="confirmFinish({{ $order->id }})" style="width: 50px"><i class="fas fa-check"></i></button>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>

              <form id="formStatus" action="{{ route('order.change-status') }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" id="idStatus" name="id">
                <input type="hidden" id="status" name="status">
              </form>
          </div>
      </div>
  </div>

  {{-- Finished Orders --}}

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Finished Orders</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableFinish" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="fit">Order Id</th>
                        <th>Table No.</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finishedOrders as $order)
                      <tr>
                        <td class="fit">{{ $order->id }}</td>
                        <td>{{ $order->number ?? "-" }}</td>
                        <td>{{ "Rp " . number_format($order->grand_total,2,',','.') }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  {{-- Cancelled Orders --}}

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Cancelled Orders</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tableCancel" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="fit">Order Id</th>
                        <th>Table No.</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cancelledOrders as $order)
                      <tr>
                        <td class="fit">{{ $order->id }}</td>
                        <td>{{ $order->number ?? "-" }}</td>
                        <td>{{ "Rp " . number_format($order->grand_total,2,',','.') }}</td>
                        <td>{{ $order->status }}</td>
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
      $('#tableOrder').DataTable();
      $('#tableFinish').DataTable();
      $('#tableCancel').DataTable();

      $("#btnDelete").on('click', function(){
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
            $("#formDelete").submit();
          }
        })
      })
    });

    function confirmFinish(id){
        Swal.fire({
          title: 'Change status of order to Finish?',
          text: "Confirm that the order is finished and ready to serve",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirm'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#idStatus").val(id)
            $("#status").val('Finish');
            $("#formStatus").submit();
          }
        })
      }

      function confirmCancel(id){
        Swal.fire({
          title: 'Change status of order to Cancel?',
          text: "Confirm that the order is cancelled and won't be served",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirm'
        }).then((result) => {
          if (result.isConfirmed) {
            $("#idStatus").val(id)
            $("#status").val('Cancel');
            $("#formStatus").submit();
          }
        })
      }
  </script>
@endpush

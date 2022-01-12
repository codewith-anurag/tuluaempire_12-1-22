@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="successmessage"></div>
            <div class="page-header">
                <h3 class="page-title">
                   Contact Setting
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Contact Setting</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">  Contact Setting</h4>
                    <div class="row">
                        <div class="col-12">
                        <a href="{{route('createcontactsetting')}}" class="btn btn-primary btn-rounded btn-fw float-right" style="margin-top: -50px;">Add Contact Setting</a>
                            <div class="table-responsive">
                                <table id="slider_table" class="table dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Phone2</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach($setings_data as $setings_data_value)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$setings_data_value->barnch_name}}</td>
                                                <td>{{$setings_data_value->address}}</td>
                                                <td>{{$setings_data_value->phone1}}</td>
                                                <td>{{$setings_data_value->phone2}}</td>
                                                <td>{{$setings_data_value->email}}</td>
                                                <td>
                                                    <a href="{{ route('edit_contactsetting',CryptoCode::encrypt($setings_data_value->id)) }}" class="btn btn-success" style="height:35px;"><i class="fas fa-pencil-alt mt-2"></i></a>
                                                    <a  href="{{ route('delete_contactsetting',CryptoCode::encrypt($setings_data_value->id)) }}" onclick="return confirm('Are you sure want to Delete this record ?')"  class="btn btn-danger" style="height: 35px;"><i class="fas fa-trash mt-2"></i></a>
                                                </td>

                                            </tr>
                                              <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="{{asset('js/admin/data-table.js')}}"></script>
<script src="{{asset('js/admin/alerts.js')}}"></script>

<script type="text/javascript">
    (function($) {
  'use strict';
  $(function() {
    $('#slider_table').DataTable({
      "order": [[ 0, "desc" ]],
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]


      ],
      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });
    $('#slider_table').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);


</script>

@endsection

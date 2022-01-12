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
                    Packages
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Packages</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Packages</h4>
                    <div class="row">
                        <div class="col-12">
                        <a href="{{route('create-packages')}}" class="btn btn-primary btn-rounded btn-fw float-right" style="margin-top: -50px;" width="250px">Add Packages</a>
                            <div class="table-responsive">
                                <table id="package" class="table dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Tour Overview</th>
                                        <th>Tour Highligts</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                        @foreach($package as $package_value)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$package_value->package_title}}</td>
                                                <td>{{$package_value->tour_overview}}</td>
                                                <td>{!! $package_value->tour_highligts !!}</td>
                                                <td>
                                                @if($package_value->status == 1)
                                                <label class="switch">
                                                    <input type="checkbox" id="package_status_{{$package_value->id}}" checked onclick="return showSwal('success-message'),change_status({{$package_value->id}})" value="0">
                                                    <span class="slider round"></span>
                                                </label>
                                                @else
                                                <label class="switch">
                                                    <input type="checkbox" id="package_status_{{$package_value->id}}" onclick="return change_status({{$package_value->id}})" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                                @endif
                                                    <a href="{{route('subpackages',CryptoCode::encrypt($package_value->id))}}" class="btn btn-info" style="height:35px;" title="View SubPackges"><i class="fa fa-eye mt-2"></i></a>
                                                    <a href="{{ route('edit-packages',CryptoCode::encrypt($package_value->id)) }}" class="btn btn-success" style="height:35px;"><i class="fas fa-pencil-alt mt-2"></i></a>
                                                    <a  href="{{ route('delete-packages',CryptoCode::encrypt($package_value->id)) }}" onclick="return confirm('Are you sure want to Delete this record ?')" class="btn btn-danger" style="height: 35px;"><i class="fas fa-trash mt-2"></i></a>
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
<script src="{{asset('js/admin/data-table.js')}}"></script>
<script src="{{asset('js/admin/alerts.js')}}"></script>

<script type="text/javascript">
    (function($) {
  'use strict';
  $(function() {
    $('#package').DataTable({
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
    $('#package').each(function() {
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
<script>
function change_status(id) {
    var status  = $("#package_status_"+id).val();
    var _token  = '{{ csrf_token() }}';
    swal({
            title: 'Are you sure want to Change status?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3f51b5',
            cancelButtonColor: '#ff4081',
            confirmButtonText: 'Great ',
            buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "btn btn-danger",
                closeModal: true,
            },
            confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "btn btn-primary",
                closeModal: true
            }
            }
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: "POST",
                url: "{{url('admin/packages_changestatus')}}",
                data : {
                    _token: _token,
                    id : id,
                    status:status
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data.response.status);
                    if(data.response.status == true){
                        $(".successmessage").empty();
                        $(".successmessage").html('<div class="alert alert-success" role="alert"> Package Status Change Successfully</div>');
                        setTimeout(function(){ location.reload();   }, 2000);

                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }else{
            setTimeout(function(){ location.reload();   }, 2000);
        }
    })
}
</script>
@endsection

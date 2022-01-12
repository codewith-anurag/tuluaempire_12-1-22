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
                   Sub Themes
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('themes')}}">Themes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Themes</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Sub Themes</h4>
                    <div class="row">
                        <div class="col-12">
                        <a href="{{route('create-subthemes',collect(request()->segments())->last())}}" class="btn btn-primary btn-rounded btn-fw float-right" style="margin-top: -50px;">Add Sub Themes</a>
                            <div class="table-responsive">
                                <table id="slider_table" class="table dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Theme</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach($subtheme as $subtheme_value)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$theme}}</td>
                                                <td>{{$subtheme_value->title}}</td>
                                                <td><img src="{{asset('subtheme_image/'.$subtheme_value->image)}}" alt="" class="img img-thumbnail" style="width:100px; height:100px;" ></td>
                                                <td>
                                                    @if($subtheme_value->status == 1)
                                                    <label class="switch">
                                                        <input type="checkbox" id="slider_status_{{$subtheme_value->id}}" checked onclick="return showSwal('success-message'),change_status({{$subtheme_value->id}})" value="0">
                                                        <span class="slider round"></span>
                                                    </label>
                                                    @else
                                                        <label class="switch">
                                                            <input type="checkbox" id="slider_status_{{$subtheme_value->id}}" onclick="return change_status({{$subtheme_value->id}})" value="1">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    @endif
                                                        <a href="{{ route('edit-subthemes',CryptoCode::encrypt($subtheme_value->id)) }}" class="btn btn-success" style="height:35px;"><i class="fas fa-pencil-alt mt-2"></i></a>
                                                        <a  href="{{ route('delete-subthemes',CryptoCode::encrypt($subtheme_value->id).'/'.request()->segment(count(request()->segments()))) }}" onclick="return confirm('Are you sure want to Delete this record ?')"  class="btn btn-danger" style="height: 35px;"><i class="fas fa-trash mt-2"></i></a>
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
<script>
function change_status(id) {
    var status  = $("#slider_status_"+id).val();
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
                className: "btn btn-danger btn-flat",
                closeModal: true,
            },
            confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "btn btn-primary btn-flat",
                closeModal: true
            }
            }
    }).then(function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: "POST",
                url: "{{ url('admin/subthemes-change-status') }}",
                data : {
                    _token: _token,
                    id : id,
                    status:status
                },
                dataType: 'json',
                success: function (data) {
                     //console.log(data);
                     //console.log(data.response.status);
                    if(data.response.status == true){
                        $(".successmessage").empty();
                        $(".successmessage").html('<div class="alert alert-success" role="alert"> Sub Theme Status Change Successfully</div>');
                        setTimeout(function(){ location.reload();   }, 3000);
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

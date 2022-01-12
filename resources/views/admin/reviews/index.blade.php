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
                   Reviews
                </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Reviews</h4>
                    <div class="row">
                        <div class="col-12">
                        <a href="{{route('create-reviews')}}" class="btn btn-primary btn-rounded btn-fw float-right" style="margin-top: -50px;" width="250px">Add Reviews</a>
                            <div class="table-responsive">
                                <table id="about_dubai_category" class="table dataTable no-footer">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Images</th>
                                        <th>Ratting</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1;?>
                                        @foreach($review as $review_value)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>{{$review_value->name}}</td>
                                                <td style="width:700px !important;"><img src='{{asset("review_image/".$review_value->review_image)}}' style="height:100px;width:100px;" class="img img-thumbnail"></td>
                                                <td>{{$review_value->ratting}}</td>
                                                <td>
                                                @if($review_value->status == 1)
                                                <label class="switch">
                                                    <input type="checkbox" id="category_status_{{$review_value->id}}" checked onclick="return showSwal('success-message'),change_status({{$review_value->id}})" value="0">
                                                    <span class="slider round"></span>
                                                </label>
                                                @else
                                                <label class="switch">
                                                    <input type="checkbox" id="category_status_{{$review_value->id}}" onclick="return change_status({{$review_value->id}})" value="1">
                                                    <span class="slider round"></span>
                                                </label>
                                                @endif
                                                    <a href="{{ route('edit-reviews',CryptoCode::encrypt($review_value->id)) }}" class="btn btn-success" style="height:35px;"><i class="fas fa-pencil-alt mt-2"></i></a>
                                                    <a  href="{{ route('delete-reviews', CryptoCode::encrypt($review_value->id)) }}" onclick="return confirm('Are you sure want to Delete this record ?')" class="btn btn-danger" style="height: 35px;"><i class="fas fa-trash mt-2"></i></a>
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
    $('#about_dubai_category').DataTable({
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
    $('#about_dubai_category').each(function() {
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
    var status  = $("#category_status_"+id).val();
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
                url: "{{url('admin/reviews_changestatus')}}",
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
                        $(".successmessage").html('<div class="alert alert-success" role="alert"> Review Status Change Successfully</div>');
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

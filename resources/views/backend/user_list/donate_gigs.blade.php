@extends('backend.layouts.app')

@section('title', __('Donoate Gigs'))

@section('content')
    

<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h5 class="mt-3 fw-600">Volunteer Informations&nbsp;</h5>                   
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <h6 > Name: {{$agent->first_name}} {{$agent->last_name}}</h6>
                            <h6 > Email: {{$agent->email}}</h6>
                            <h6 > Country: {{$agent->country}}</h6>
                        </div>
                        <div class="col-3">
                            <h6 > City: {{$agent->city}}</h6>
                            <h6 > Contact Number: {{$agent->contact_number}}</h6>
                            <h6 > Alternate Contact Number: {{$agent->contact_number_two}}</h6>
                        </div>
                        <div class="col-6 text-right mt-3">
                        <a href="{{route('admin.agent.index')}}" type="button" class="btn rounded-pill px-4 py-2 me-2 btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <strong>Donoate Gigs&nbsp;</strong>
                   
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Fund</th>
                                <th scope="col">OTP Code</th>
                                <th scope="col">Paid</th>
                                <th scope="col">Status</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
    

     <!-- Modal delete -->
     <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this?</h5>
                        </div>                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>
    

    <script type="text/javascript">
        $(function () {
            var table = $('#villadatatable').DataTable({
                processing: true,
                ajax: "{{route('admin.donate_gigs_details',$agent->id)}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'fund', name: 'fund'},
                    {data: 'otp_code', name: 'otp_code'},
                    {data: 'is_paid', name: 'is_paid'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
 
            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
            $.ajax({
            url:"country/delete/"+user_id,
            
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#villadatatable').DataTable().ajax.reload();
                });
            }
            })
            });
          
        });
    </script>



@endsection

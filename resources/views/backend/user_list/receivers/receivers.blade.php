@extends('backend.layouts.app')

@section('title', __('Receivers'))

@section('content')


<div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h5 class="mt-3 fw-600">Agent Informations&nbsp;</h5>
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
                    <strong>Receivers&nbsp;</strong>

                    @if(get_settings('donation_per_agent') <= count(App\Models\Auth\User::where('assigned_agent_id',$agent->id)->where('user_type','Receiver')->get()) )
                        <a  class="btn btn-warning pull-right ml-4" disabled>Maximum 5</a>
                    @else
                        <a href="{{route('admin.receiver.create',$agent->id)}}" class="btn btn-success pull-right ml-4">Add New</a>
                    @endif
                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Country</th>
                                <th scope="col">City</th>
                                <th scope="col">Requirement/Package</th>
                                <th scope="col">Options</th>
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
                ajax: "{{route('admin.receivers_details',$agent->id)}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'country', name: 'country'},
                    {data: 'city', name: 'city'},
                    {data: 'requirement', name: 'requirement'},
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

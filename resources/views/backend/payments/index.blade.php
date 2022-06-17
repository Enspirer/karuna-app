@extends('backend.layouts.app')

@section('title', __('Payments'))

@section('content')


    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Payments&nbsp;</strong>


                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Volunteer Name</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Package</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
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
                            <h5>Are you sure you want to remove This?</h5>
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
                ajax: "{{route('admin.payment.get_details')}}",
                serverSide: true,
                order: [[0, "desc"]],
                columns: [
                    {data: 'donor_name', name: 'donor_name'},
                    {data: 'agent_name', name: 'agent_name'},
                    {data: 'receiver_name', name: 'receiver_name'},
                    {data: 'amount', name: 'amount'},
                    {data: 'requirement', name: 'requirement'},
                    {data: 'created_at', name: 'created_at'},
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
                    url:"package/delete/"+user_id,

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

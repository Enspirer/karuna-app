@extends('backend.layouts.app')

@section('title', __('Module Explorer'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mt-12 tab-card">
                <div class="card-header tab-card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Explorer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Installed</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">

                        <div class="row">
                            @foreach($explorer_modules as $explorer_module)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            {{$explorer_module['module_name']}}
                                        </div>
                                        <div class="card-body">
                                            {{$explorer_module['meta_details']->description}}
                                        </div>
                                        <div class="card-header">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#install">Install</button>                                       
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                        <div class="row">
                            @foreach($installed_modules as $moule)
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            {{$moule['module_name']}}
                                        </div>
                                        <div class="card-body">
                                            {{$moule['meta_details']->description}}
                                        </div>
                                        <div class="card-header">                                            
                                            <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#uninstall">Uninstall</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@foreach($explorer_modules as $explorer_module)

    <div class="modal fade" id="install" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                
                <form action="{{route('admin.module.install')}}" method="post">
                {{csrf_field()}}
                    <div class="modal-header">
                        <h4 class="modal-title" style="color:red">Warning!</h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> 
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-3" style="line-height:30px">You are trying to install the "{{$explorer_module['module_name']}}" module.</h5>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="module_name" value="{{$explorer_module['module_name']}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Install</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endforeach

@foreach($installed_modules as $moule)

    <div class="modal fade" id="uninstall" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                
                <form action="{{route('admin.module.uninstall')}}" method="post">
                {{csrf_field()}}
                                                
                    <div class="modal-header">
                        <h4 class="modal-title" style="color:red">Warning!</h4>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button> 
                    </div>
                    <div class="modal-body">
                        <h5 class="mb-3" style="line-height:30px">You are trying to uninstall the "{{$moule['module_name']}}" module. If unistalled, all the data in {{$moule['module_name']}} module will be deleted.</h5>
                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="module_name" value=" {{$moule['module_name']}}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Uninstall</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endforeach

@endsection

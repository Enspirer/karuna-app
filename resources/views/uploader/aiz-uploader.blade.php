<div class="modal fade" id="aizUploaderModal" data-backdrop="static" role="dialog" aria-hidden="true" style="">
    <div class="modal-dialog modal-adaptive" role="document" style="width: 80% !important;max-width: 100% !important;z-index: 1040;display: block;">
        <div class="modal-content h-100">
            <div class="modal-header pb-0 bg-light">
                <div class="uppy-modal-nav">
                    <ul class="nav nav-tabs nav-tabs-mobile border-0">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-medium text-dark" data-toggle="tab" href="#aiz-select-file">Select File</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-medium text-dark" data-toggle="tab" href="#aiz-upload-new">Upload New</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content h-100">
                    <div class="tab-pane active h-100" id="aiz-select-file">
                        <div class="aiz-upload-msg" aiz-upload-msg>
                            <div class="inner-wrapper">
                                <div class="title">Follow the guides below</div>
                                <ol class="aiz-list">
                                    <li>To upload a new file, click the "<span>Upload New</span>" window</li>
                                    <li>
                                    After finishing the upload come back to the "<span>Select File</span>"
                                    window and select your desired files
                                    </li>
                                    <li>Finally, click the "<span>Add Files</span>" button to continue</li>
                                </ol>
                                <button type="button" class="cta-btn" onclick="document.querySelector('[aiz-upload-msg]').style.display = 'none'">
                                    Continue
                                </button>
                            </div>
                        </div>
                        <div class="aiz-uploader-filter pt-1 pb-3 border-bottom mb-4">
                            <div class="row mobile-filters align-items-center gutters-5 gutters-md-10 position-relative">
                                <div class="col-xl-2 col-md-3 col-5 filter-col">
                                    <div class="">
                                        <!-- Input -->
                                        <select class="form-control form-control-xs aiz-selectpicker" name="aiz-uploader-sort">
                                            <option value="newest" selected>Sort by newest</option>
                                            <option value="oldest">Sort by oldest</option>
                                            <option value="smallest">Sort by smallest</option>
                                            <option value="largest">Sort by largest</option>
                                        </select>
                                        <!-- End Input -->
                                    </div>
                                </div>
                                <div class="col-md-3 col-5 filter-col">
                                    <div class="custom-control custom-radio">
                                        <input type="checkbox" class="custom-control-input" name="aiz-show-selected" id="aiz-show-selected" name="stylishRadio">
                                        <label class="custom-control-label" for="aiz-show-selected">
                                            Selected Only
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 col-xl-3 ml-auto mr-0 col-2 position-static filter-col">
                                    <div class="aiz-uploader-search text-right">
                                        <input type="text" class="form-control form-control-xs" name="aiz-uploader-search" placeholder="Search your files">
                                        <i class="search-icon d-md-none"><span></span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="aiz-uploader-all clearfix c-scrollbar-light">
                            <div class="align-items-center d-flex h-100 justify-content-center w-100">
                                <div class="text-center">
                                    <h3>No files found</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane h-100" id="aiz-upload-new">
                        <div class="aiz-new-upload-msg" aiz-new-upload-msg>
                            <div class="title">Follow the guides below</div>
                            <ul class="aiz-list">
                                <li>Now, choose your desired files from your device</li>
                            </ul>
                        </div>
                        <div id="aiz-upload-files" class="h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between bg-light">
                <div class="flex-grow-1 overflow-hidden d-flex">
                    <div class="">
                        <div class="aiz-uploader-selected">0 File Selected</div>
                        <button type="button" class="btn-link btn btn-sm p-0 aiz-uploader-selected-clear">Clear</button>
                    </div>
                    <div class="mb-0 ml-3">
                        <button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn">Prev</button>
                        <button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn">Next</button>
                    </div>
                </div>
                @if(is_mobile(request()->header('user-agent')) == false)
                    <h4 class="mr-4 mt-1" style="color:red">Go to select file and choose your file</h4>
                @endif
                <button type="button" class="btn btn-sm btn-primary" data-toggle="aizUploaderAddSelected" disabled>Add Files</button>
            </div>
        </div>
    </div>
</div>

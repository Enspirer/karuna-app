<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ getBaseURL() }}">
        <meta name="file-base-url" content="{{ getFileBaseURL() }}"> 
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Splide JS -->
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/splide.min.css">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <!-- fontawesom -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Telephone Input -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/js/intlTelInput.min.js" integrity="sha512-Po9nSdYOcWIcoADdRjkAbRYPpR8OHjxzA/3RDUERZcDewTLzRTxbG4bUX7Sr7lVEcO3wTCzphdOBWgNFKVmxaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.16/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!-- Custom CSS-->
        <link rel="stylesheet" href="{{url('css/dashboard_main.css')}}">
                
        <!-- ACH image viewer-->
        <link rel="stylesheet" href="{{url('css/ach_img_viewer.css')}}">
        <script src="{{url('js/ach-img-viewer.js')}}"></script>

        <link rel="stylesheet" href="{{url('css/aiz-core.css')}}">    
        <link rel="stylesheet" href="{{url('css/vendors.css')}}"> 


        <script>
            var AIZ = AIZ || {};
            AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
            }
        </script>

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}

        @stack('after-styles')
    </head>
    <body>
        @include('includes.partials.read-only')

        <div id="app">
            <div class="dashboard-layout">

                @include('frontend.user.includes.nav')

                <div class="dashboard-body">
                    <div class="dashboard-container">
                        @include('frontend.user.includes.header')
                        @include('includes.partials.logged-in-as')
                        @yield('content')

                                    
                        <!-- Image viewer -->
                        <div id="achImgViewer">
                            <button class="img-close">&#10005;</button>
                            <img>
                        </div>

                         <!-- video viewer -->
                        <div id="achVideoViewer">                    
                        </div>

                        <!-- audio viewer -->
                        <div id="achAudioViewer">                    
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>

    <!-- Custom JS -->
    <script src="{{url('js/dashboard_main.js')}}"></script>

    <script src="{{url('js/vendors.js')}}"></script>
    <script src="{{url('js/aiz-core.js')}}"></script>

    <!-- <script>

    $(document).on('change','#country',function(){

        let country = $('#country').val();
            // console.log(country);

        let name;
        let template;
       
        if(country.includes('-')){
            name = country.replace("-", " ");
        } else {
            name = country;
        }

        $.ajax({
            "type": "POST",
            "url": "https://countriesnow.space/api/v0.1/countries/cities",
            "data": {
                "country": name
            }
        }).done(function (d) {

            for(let i = 0; i < d['data'].length; i++) {
                template+= `
                    <option value="${d['data'][i]}">${d['data'][i]}</option>
                `
            }

            $(".cities").html(template);
            // console.log(d);
        });
    });
    
</script> -->

<script>
    function package_type(that) {
        
        if (that.value == 'Other') {
            document.getElementById("other_description_hide").style.display = "block";
        } else {
            document.getElementById("other_description_hide").style.display = "none";
        }
    
        // if (that.value == 'Other') {
        //     document.getElementById("account_details").style.display = "block";
        // } else {
        //     document.getElementById("account_details").style.display = "none";
        // }
        
    }
</script> 

<script>
    function package_type_edit(that) {
        
        if (that.value == 'Other') {
            document.getElementById("other_description_hide_edit").style.display = "block";
        } else {
            document.getElementById("other_description_hide_edit").style.display = "none";
        }
    
        // if (that.value == 'Other') {
        //     document.getElementById("account_details_edit").style.display = "block";
        // } else {
        //     document.getElementById("account_details_edit").style.display = "none";
        // }
        
    }
</script> 

<script>
    $(document).ready(function(){
        if($('#requirement_edit').val() == 'Other'){
            $('#other_description_hide_edit').css('display','block');
            // $('#account_details_edit').css('display','block');
        }
        else{
            $('#other_description_hide_edit').css('display','none');
            // $('#account_details_edit').css('display','none');
        }            
    });
</script>

<script>
    const aizUploader = document.querySelectorAll('[data-toggle="aizuploader"]')

    aizUploader.forEach((btn) => {
        btn.addEventListener('click', () => {       

            setTimeout(() => {
                const aizModal = document.querySelectorAll('[data-dismiss="modal"]')

                aizModal.forEach((modal) => {
                    modal.setAttribute('data-bs-dismiss','modal')
                    modal.removeAttribute('data-dismiss')
                })
            },1000)
        })
    })
</script>


<script>
const requirement = document.getElementById('requirement')
const RecReqFields = ['other_description', 'account_number', 'bank_name', 'branch_name']

requirement.addEventListener('change', () => {
    if (requirement.value == 'Other') {
        RecReqFields.forEach((field) => {
            document.getElementById(field).setAttribute('required', '')
        })
    }
})
</script>


</html>

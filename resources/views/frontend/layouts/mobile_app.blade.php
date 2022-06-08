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

        <!-- Recaptcha -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- Custom CSS-->
        <link rel="stylesheet" href="{{url('css/mobile_main.css')}}">

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
            <section class="mobile-body">
                @include('includes.partials.logged-in-as')
                @yield('content')
                @include('frontend.mobile.includes.bottom_nav')

                <!-- <div class="modal fade mobile-cap-warning" id="mobileCapWarning" tabindex="-1" aria-labelledby="mobileCapWarningLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="inner-wrapper">
                                <i class="bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close"></i>
                                <div class="title">Caution !</div>
                                <img src="{{url('images/mobile/screen-rotate.png')}}" alt="" class="modal-img">
                                <p>Please use landscape orientation ONLY if you're taking a photo from your camera, portrait will not be accepted by the system</p>
                                <button class="btn-continue aizModalBtn">Continue</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="mobile-cap-warning" id="mobileCapWarning">
                    <div class="content-block">
                        <div class="inner-wrapper">
                            <i class="bi bi-x-lg modal-close"></i>
                            <div class="title">Caution !</div>
                            <img src="{{url('images/mobile/screen-rotate.png')}}" alt="" class="modal-img">
                            <p>Please use landscape orientation ONLY if you're taking a photo from your camera, portrait will not be accepted by the system</p>
                            <button class="btn-continue modal-close">Continue</button>
                        </div>
                    </div>
                </div>
            </section>
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
    <script src="{{url('js/mobile_main.js')}}"></script>
    <script src="{{url('js/vendors.js')}}"></script>
    <script src="{{url('js/aiz-core.js')}}"></script>

    <script>
const aizUploader = document.querySelectorAll('[data-toggle="aizuploader"]')

aizUploader.forEach((btn) => {
    btn.addEventListener('click', () => {

        setTimeout(() => {
            const aizModal = document.querySelectorAll('[data-dismiss="modal"]')
            const warningTrigger = document.querySelector('#aizUploaderModal .uppy-modal-nav .nav-tabs .nav-item:nth-child(2)')
            const warningModal = document.getElementById('mobileCapWarning')
            const modalClose = warningModal.querySelectorAll('.modal-close')

            aizModal.forEach((modal) => {
                modal.setAttribute('data-bs-dismiss', 'modal')
                modal.removeAttribute('data-dismiss')
            })

            warningTrigger.addEventListener('click', () => {
                warningModal.style.display = 'block'
            } , {once : true})

            modalClose.forEach((btn) => {
                btn.addEventListener('click', () => {
                    warningModal.style.display = 'none'
                })
            })
        }, 1000)
    })
})
    </script>
    
</html>

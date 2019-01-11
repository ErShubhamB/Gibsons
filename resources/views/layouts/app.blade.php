<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('images/icon.png')}}" type="image/png" sizes="16x16"/>
        <title>GST App</title>
        <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/pnotify.custom.min.css')}}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" />
        <link href="{{asset('css/gsts.css')}}" rel="stylesheet">

        </head>
        <body class="app">
            <div id="loader">
                <div class="spinner"></div>
            </div>
            <script type="text/javascript">
                window.addEventListener('load', () => {
                    const loader = document.getElementById('loader');
                    setTimeout(() => {
                      loader.classList.add('fadeOut');
                    }, 300);
                });
                window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>
            </script>
            @if(Request::is('login') || Request::is('register'))
                @yield('content')
            @else
            <div>
                    <!-- include sidebar here -->
                    @include('layouts.sidebar')
                    
                    <!-- sidebar end-->
                    <div class="page-container">
                        <!-- include header here-->
                        @include('layouts.header')
                        <!-- header end -->
                        <main class="main-content bgc-grey-100">
                            <div id="mainContent">
                                
                                    
                                    <!-- include main centent here -->
                                    @yield('content')
                               
                            </div>
                        </main>
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
            <span>Copyright © {{date('Y')}} | All rights reserved.
            </span>
        </footer>
    </div>
</div>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pnotify/3.2.1/pnotify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.min.js"></script>
<script type="text/javascript" src="{{asset('js/gst.js')}}"></script>
<script type="text/javascript" src="{{asset('js/vendor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bundle.js')}}"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <title>@yield('title', 'Avios CMS')</title>
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e75c398de.js"></script>
    <script src="{{asset('/ace/ace.js')}}"></script>
    <script src="{{asset('/ace/mode-html.js')}}"></script>
    <script src="{{asset('/ace/theme-monokai.js')}}"></script>
    <!-- Fonts -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>

        button#sidebarCollapse {
            color: #333;
            padding: 0px;
            width: 100%;
            /* border-bottom: 1px solid white; */
            border-radius: 0px;
            padding-left: 10px;
            button#sidebarCollapse
            background-color: rgba(255,255,255,0.05);

        }

        #sidebar ul li a span {
            padding-left: 5px;
            font-size: 0.9em;
         }

        #bodyeditor {
            min-height: 300px;
        }

        #csseditor {
            min-height: 300px;
        }

        #headeditor {
            min-height: 300px;
        }
        body {
            font-family: 'Open Sans', sans-serif;
            background: #fafafa;
        }

        #inlinespan {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }
        p {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            z-index: 160;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        i,
        span {
            display: inline-block;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            align-items: stretch;
            padding-top: 30px;
        }

        #sidebar:before {
            position: absolute;
            content: '';
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: black;
            opacity: 0.7;


        }

        #sidebar * {
            position: inherit;
            z-index: 100;
        }

        #sidebar {
            background-image: url(/images/sidebar-2.jpg);
            background-size: cover;
            background-position: left;
            position: relative;

            min-width: 160px;
            max-width: 160px;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            min-width: 80px;
            max-width: 80px;
            text-align: center;
        }

        #sidebar.active .sidebar-header h3,
        #sidebar.active .CTAs {
            display: none;
        }

        #sidebar.active .sidebar-header strong {
            display: block;
        }

        #sidebar ul li a {
            text-align: left;
        }

        #sidebar.active ul li a {
            padding: 20px 10px;
            text-align: center;
            font-size: 0.85em;
        }

        #sidebar.active ul li a i {
            margin-right: 0;
            display: block;
            font-size: 1.8em;
            margin-bottom: 5px;
        }

        #sidebar.active ul ul a {
            padding: 10px !important;
        }

        #sidebar.active .dropdown-toggle::after {
            top: auto;
            bottom: 10px;
            right: 50%;
            -webkit-transform: translateX(50%);
            -ms-transform: translateX(50%);
            transform: translateX(50%);
        }

        #sidebar .sidebar-header {
            padding: 20px;
        }

        #sidebar .sidebar-header strong {
            display: none;
            font-size: 1.8em;
        }

        #sidebar ul.components {
            padding: 20px 0;
            padding-top: 0px;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul li a {
            padding: 10px;
            padding-left: 15px;
            font-size: 15px;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #007bff!important;
            background: #fff;
        }


        #sidebar ul li a i {
            margin-right: 10px;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background-color: rgba(255,255,255,0.1);

        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: rgba(0,0,0,0.6);
        }

        ul.CTAs {
            padding: 20px;
            display: none;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #007bff !important;
        }

        #sidebar.active ul li a svg {
            font-size: 20px;
            padding: 0px;
        }

        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                min-width: 80px;
                max-width: 80px;
                text-align: center;
                margin-left: -80px !important;
            }
            .dropdown-toggle::after {
                top: auto;
                bottom: 10px;
                right: 50%;
                -webkit-transform: translateX(50%);
                -ms-transform: translateX(50%);
                transform: translateX(50%);
            }
            #sidebar.active {
                margin-left: 0 !important;
            }
            #sidebar .sidebar-header h3,
            #sidebar .CTAs {
                display: none;
            }
            #sidebar .sidebar-header strong {
                display: block;
            }
            #sidebar ul li a {
                padding: 20px 10px;
            }
            #sidebar ul li a span {
                font-size: 0.85em;
            }
            #sidebar ul li a i {
                margin-right: 0;
                display: block;
            }
            #sidebar ul ul a {
                padding: 10px !important;
            }
            #sidebar ul li a i {
                font-size: 1.3em;
            }
            #sidebar {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
        }

        #sidebar.active ul li a span {
            display: none;
        }


        .navbar {
            position: fixed;
            width: 100vw;

            height: 30px;
            background-color: #f2f2f2;
            padding-top: 0px!important;
        }

        .navlinks {
            color: #333;
            list-style: none;
            font-size: 12px;
            line-height: 30px;
            display: inline-flex;
        }

        .navlinks li {
            padding: 0 5px;
        }

        #sidebarCollapse {
            background-color: rgba(255,255,255,0.05);
        }

        .card {
            margin-bottom: 20px;
        }

        .submit {
            background-color: #333333;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            padding: 5px 30px;
            margin-top: 20px;
            float: right;
        }
    </style>

    <link rel="stylesheet" src="{{ asset('css/main.css') }}">

    <script src="{{ asset('ace/ace.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('ace/theme-monokai.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('ace/mode-html.js') }}" type="text/javascript" charset="utf-8"></script>
    @yield('head')
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div style="padding-left: 0px;" class="container-fluid">
        <div style="    width: 100%;" class="row">
            <div style="display:inline-flex; text-align: left;padding-left: 0px" class="col-sm-1">
                <button style="padding-left: 0px;height: 30px;" type="button" id="sidebarCollapse" class="btn ">
                    <i class="fas fa-align-left"></i>
                    <span style="font-size: 12px;padding-left: 5px;" >Toggle</span>
                </button>
            </div>
            <div class="col-sm-11" style="text-align: right;">
                <ul class="navlinks" style="">
                    <li>View Site</li>
                    <li>Admin</li>
                    <li>Log Out</li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="wrapper">
    <!-- Sidebar  -->
    <div class="navwrapper">

        <nav style="position:fixed;    position: fixed;
    height: 100vh;
    z-index: 9999;"  id="sidebar">

            <div style="position: relative;">
                <!--<div class="sidebar-header">
                    <h3>Alvato</h3>
                    <strong>A</strong>
                </div>-->

                <ul class="list-unstyled components">

                    <li class="active">
                        <a href="#">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-copy"></i>
                            <span>Pages</span>
                        </a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>

                                <a href="/admin/site/@if(isset($site->id )){{ $site->id }}@endif/pages">Pages</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="#templateSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="fas fa-copy"></i>
                            <span>Templates</span>

                        </a>
                        <ul class="collapse list-unstyled" id="templateSubmenu">
                            <li>
                                <a href="/admin/site/@if(isset($site->id )){{ $site->id }}@endif/template/">Templates</a>
                            </li>
                            <!--<li>
                                <a href="/admin/site/@if(isset($site->id )){{ $site->id }}@endif/sub-template/">Subtemplates</a>
                            </li>
                            <li>
                                <a href="/admin/site/@if(isset($site->id )){{ $site->id }}@endif/themes/">Themes</a>
                            </li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/site/@if(isset($site->id )){{ $site->id }}@endif/media/">
                            <i class="fas fa-image"></i>
                            <span>Media</span>
                        </a>
                        <a href="/admin/site/@if(isset($site->id )){{ $site->id }}@endif/settings/">
                            <i class="fas fa-briefcase"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-question"></i>
                            <span>FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-paper-plane"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
                    </li>
                    <li>
                        <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
    <nav class="fakesidebar" id="sidebar">
    </nav>
    <!-- Page Content  -->
<div id="content">
    @yield('content')
</div>

</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {

            $('#sidebar').toggleClass('active');
            $('.fakesidebar').toggleClass('active');



        });
    });
</script>

</body>
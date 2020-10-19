<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ '/css/libs/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ '/css/libs/bootstrap-select.css' }}">
    <link rel="stylesheet" href="{{ '/css/libs/toastr.min.css' }}">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        a{
            margin-right: 20px;
        }
    </style>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ '/css/admin.css' }}">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('post')}}">Home Page</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{route('logout')}}">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link post-menu" href="/admin/post">
                            <span data-feather="airplay"></span>
                            Đề Tài
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link user-menu" href="/admin/user">
                            <span data-feather="airplay"></span>
                            Tài khoản
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link topicReport-menu" href="/admin/report">
                            <span data-feather="airplay"></span>
                            Báo cáo
                        </a>
                    </li>
                    @can('viewany',\App\UserPost::class)
                        <li class="nav-item">
                            <a class="nav-link list-post-menu" href="/admin/list">
                                <span data-feather="airplay"></span>
                                Danh sách sinh viên đăng ký
                            </a>
                        </li>
                    @endcan
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <span data-feather="file-text"></span>
                            Current month
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ '/js/libs/jquery-3.4.1.min.js' }}"></script>
<script src="{{ '/js/libs/bootstrap.bundle.min.js' }}"></script>
<script src="{{ '/js/libs/feather.min.js' }}"></script>
<script src="{{ '/js/libs/toastr.min.js' }}"></script>
<script>
    feather.replace();

    @if(isset($activeMenu))
    $('.{{ $activeMenu }}').addClass('active');
    @endif

    @if(session('success'))
    toastr.success('{{ session('success') }}');
    @endif

    @if(isset($error))
    toastr.error('{{ $error }}');
    @endif

</script>
@yield('script')
</body>
</html>

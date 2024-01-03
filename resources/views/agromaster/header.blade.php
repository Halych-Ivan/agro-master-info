@php
    $nav[0][0] = ['href' => 'home', 'title' => 'Головна'];
    $nav[1][0] = ['href' => 'admission', 'title' => 'Вступ'];
        $nav[1][1] = ['href' => 'admission/confirmation', 'title' => 'Підвердження вступу'];
    $nav[2][0] = ['href' => 'home', 'title' => 'Навчання'];
        $nav[2][1] = ['href' => 'schedule', 'title' => 'Розклад занять'];
        $nav[2][2] = ['href' => 'session', 'title' => 'Розклад іспитів'];
{{--        $nav[2][3] = ['href' => 'tolerances', 'title' => 'Допуски до сесії'];--}}
        $nav[2][4] = ['href' => 'lists', 'title' => 'Списки груп'];
        $nav[2][5] = ['href' => 'details', 'title' => 'Реквізити оплати за навчання'];
        $nav[2][6] = ['href' => 'reference', 'title' => 'Довідки'];
    $nav[3][0] = ['href' => 'science', 'title' => 'Наука'];
        $nav[3][1] = ['href' => 'science', 'title' => 'Конференції'];
        $nav[3][2] = ['href' => 'science/vsdemm', 'title' => 'ВСДЕММ'];
    $nav[4][0] = ['href' => 'contact', 'title' => 'Контакти'];
@endphp

<header class="header-area">

    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper d-flex flex-wrap justify-content-sm-between">
                <div class="header-top-left">
                    <ul class="header-meta">
                        <li><a href="mailto://agromaster.info@ukr.net">agromaster.info@ukr.net</a></li>
                    </ul>
                </div>
                <div class="header-top-right">
                    <div class="header-link">
                        <a class="notice" href="notice.html">Notice</a>
                        <a class="login" href="login">Login</a>
                        <a class="register" href="register">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="navigation" class="navigation navigation-landscape">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="header-logo">
                        <a href="{{route('home')}}"><img src="{{asset('/images/logo.svg')}}" height="50" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-7 position-static">
                    <div class="nav-toggle"></div>
                    <nav class="nav-menus-wrapper">
                        <ul class="nav-menu">
@foreach($nav as $key => $value)
                            <li>
                                <a class="" href="{{route($value[0]['href'])??'#'}}">{{$value[0]['title']}}</a>
@if(isset($value[1]))
                                <ul class="nav-dropdown nav-submenu">
@foreach($value as $key => $item)
@continue($key == 0)
                                    <li><a class="" href="{{route($item['href'])}}">{{$item['title']}}</a></li>
@endforeach
                                </ul>
@endif
                            </li>
@endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 position-static">
                    <div class="header-search">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

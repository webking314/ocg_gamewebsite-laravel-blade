@inject('bannersService', "Models\Banners\BannersService")
@inject('pricingService', "Models\Pricing\PricingService")

<!DOCTYPE html>
<html class="dark">
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        @yield('meta')

        <meta name="author" content="OCG - Online Casino Games">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{!! mix('compiled/css/shared.css') !!}">
        <link rel="stylesheet" href="{!! mix('compiled/porto/porto.css') !!}">

        @yield('styles')

        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />

        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="{{ env('GOOGLE_CLIENT_ID') }}">
        <script src="https://apis.google.com/js/platform.js"></script>
    </head>
    <body data-google-logout-route="{{ route('logout.social.google') }}">
        @if (Session::has('flash_message'))
        <div id="flash-notifier" class="flash-notifier alert alert-{{ Session::get('flash_type') }} alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><i class="fas {{ Session::get('flash_icon') }}"></i> {!! Session::get('flash_message') !!}</p>
        </div>
        @endif

        <div id="success-notifier" class="flash-notifier alert alert-success" role="alert" style="display: none">
            <p><i class="fas fa-check"></i> <span class="notifier-text-content"></span></p>
        </div>

        <div id="info-notifier" class="flash-notifier alert alert-info" role="alert" style="display: none">
            <p><i class="fas fa-info-circle"></i> <span class="notifier-text-content"></span></p>
        </div>

        <div id="warning-notifier" class="flash-notifier alert alert-warning" role="alert" style="display: none">
            <p><i class="fas fa-info-circle"></i> <span class="notifier-text-content"></span></p>
        </div>

        <div id="danger-notifier" class="flash-notifier alert alert-danger" role="alert" style="display: none">
            <p><i class="fas fa-times"></i> <span class="notifier-text-content"></span></p>
        </div>

        @if ($errors->any())
        <div id="validation-errors" class="flash-notifier alert alert-danger alert-dismissible" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @include('frontend.partials.news-bubble')

        {{--<div class="body">--}}
            <header id="header" class="header-transparent" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1', 'stickyChangeLogo': false}">
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="{{ route('home') }}">
                                        <img alt="{{ trans('app.meta.short_title') }}" height="60" data-sticky-height="60" data-sticky-top="33" src="{{ asset('img/logo.png') }}">
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-nav">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                            <nav class="text-center">
                                                <ul class="nav nav-pills navbar-center navbar-custom">
                                                    @if (Auth::check())
                                                    <li class="{{ set_active('user.dashboard.index') }}">
                                                        <a href="{{ route('user.dashboard.index') }}">
                                                            {!! transdata('app.menu.dashboard') !!}
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="#">
                                                            {!! transdata('app.menu.money') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('*game*') }}">
                                                        <a href="{{ route('user.games.index') }}">
                                                            {!! transdata('frontend/game.casino_games') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('*lottery*') }}">
                                                        <a href="{{ route('lottery.index') }}">
                                                            {!! transdata('app.menu.lottery') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('*tournaments*') }}">
                                                        <a href="{{ route('home.tournaments') }}">
                                                            {!! transdata('frontend/tournaments.meta.title') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('home.bonuses') }}">
                                                        <a href="{{ route('home.bonuses') }}">
                                                            {!! transdata('app.menu.bonuses') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('*settings*') }}">
                                                        <a href="{{ route('user.settings.index') }}">
                                                            {!! transdata('app.menu.settings') !!}
                                                        </a>
                                                    </li>
                                                    @if(Session::has('orig_user'))
                                                    <li class="">
                                                        <a href="{{ route('switch.stop') }}">
                                                            {!! transdata('app.menu.back_to_admin') !!}
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @else
                                                    <li class="">
                                                        <a data-hash data-hash-offset="100" href="@if (Request::route()->getName() == 'home') #demos @else {{ route('home') }}#demos @endif">
                                                            {!! transdata('frontend/game.casino_games') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('lottery.index') }}">
                                                        <a href="{{ route('lottery.index') }}">
                                                            {!! transdata('app.menu.lottery') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('*tournaments*') }}">
                                                        <a href="{{ route('home.tournaments') }}">
                                                            {!! transdata('frontend/tournaments.meta.title') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('home.bonuses') }}">
                                                        <a href="{{ route('home.bonuses') }}">
                                                            {!! transdata('app.menu.bonuses') !!}
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>

                                                <ul class="nav nav-pills navbar-right navbar-custom">
                                                    <li class="dropdown">
                                                        <a class="dropdown-toggle" href="#">
                                                            <i class="fas fa-globe"></i> {!! transdata('app.menu.language') !!}
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#">
                                                                    English
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Español
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Türkçe
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>

                                                    @if (Auth::check())
                                                    <li class="dropdown dropdown-mega">
                                                        <a class="dropdown-toggle" href="#">
                                                            <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <div class="dropdown-mega-content user-info-menu">
                                                                    <div class="row mt-md">
                                                                        <div class="col-md-4 text-center">
                                                                            <img class="img-responsive margin-auto avatar-img {{ Auth::user()->isMale() ? 'avatar-male' : 'avatar-female' }}" src="{{ asset(Auth::user()->formatted_avatar) }}" />
                                                                            <span class="dropdown-mega-sub-title"><img class="valign-top" src="{{ asset(Auth::user()->flag_icon) }}" width="32"/> {{ Auth::user()->nickname }}</span>
                                                                        </div>
                                                                        <div class="col-md-8 mt-md">
                                                                            @include('user.partials.balance', ['user' => Auth::user()])
                                                                            {{--<h2 class="text-center">My Balance</h2>--}}
                                                                            {{--<h3 class="text-center"><span class="money-earned"><i class="fas fa-coins"></i> {{ number_format(Auth::user()->credits, 2) }}</span> <span class="text-blue">&mdash;</span> @price($pricingService->exchangeCredits(Auth::user()->credits, Auth::user()->currency_code), Auth::user()->currency_code)</h3>--}}
                                                                            <hr>
                                                                            <ul class="dropdown-mega-sub-nav text-center">
                                                                                <li>
                                                                                    <a href="{{ route('home.user.profile', ['username' => Auth::user()->nickname]) }}">
                                                                                        <i class="fas fa-user"></i> {!! transdata('app.menu.my_public_profile') !!}
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <i class="fas fa-plus-circle"></i> {!! transdata('app.menu.add_money') !!}
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="#">
                                                                                        <i class="fas fa-minus-circle"></i> {!! transdata('app.menu.withdraw_money') !!}
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a @if (Auth::check() && Auth::user()->isGoogleUser()) data-social-login="google" @endif href="{{ route('home.logout') }}">
                                                                                        <i class="fas fa-sign-out-alt"></i> {!! transdata('app.menu.logout') !!}
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    @else
                                                    <li class="{{ set_active('home.login') }}">
                                                        <a href="{{ route('home.login') }}">
                                                            <i class="fas fa-user"></i> {!! transdata('auth.login.title') !!}
                                                        </a>
                                                    </li>
                                                    <li class="{{ set_active('home.register') }} register-link">
                                                        <a href="{{ route('home.register') }}">
                                                            {!! transdata('app.menu.sign_up') !!}
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--@if (($headerNews = $bannersService->getLatestHeaderNews(3))->count() > 0)--}}
                        {{--<div class="header-row clearfix header-news">--}}
                            {{--<div class="header-column">--}}
                                {{--<p class="mb-none text-light text-center">--}}
                                    {{--@foreach ($headerNews as $news)--}}
                                    {{--<span>&middot; <a title="{{ $news->name }}" href="{{ route('news.details', ['news' => $news]) }}">{{ mb_strimwidth($news->name, 0, 30, '...') }}</a> --}}{{--<small><i class="fas fa-calendar-alt"></i> @datetime($news->date_from)</small>--}}{{--</span>--}}
                                    {{--@endforeach--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    </div>
                </div>
            </header>

            @yield('content')

            @include('frontend.partials.recent_winners')

            @include('frontend.partials.bonus_content')

            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-ribbon">
                            <span>{!! transdata('frontend/contact.get_in_touch') !!}</span>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-details">
                                <h4>{!! transdata('frontend/contact.contact_us') !!}</h4>
                                <ul class="contact">
                                    <li><p><i class="fa fa-map-marker"></i> <strong>{!! transdata('frontend/contact.address') !!}:</strong> 1234 Street Name, City Name, United States</p></li>
                                    <li><p><i class="fa fa-phone"></i> <strong>{!! transdata('frontend/contact.phone') !!}:</strong> (123) 456-789</p></li>
                                    <li><p><i class="fa fa-envelope"></i> <strong>{!! transdata('frontend/contact.email') !!}:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4>{!! transdata('frontend/news_bubble.latest_news') !!}</h4>
                            <div id="news" class="twitter">
                                <ul>
                                    @forelse ($bannersService->getLatestNews() as $news)
                                        <li><a href="{{ route('news.details', ['news' => $news]) }}">{!! htmlspecialchars(trim(strip_tags(mb_strimwidth($news->content, 0, 178, '...'))))  !!}</a></li>
                                    @empty
                                        <li>{!! transdata('frontend/news_bubble.no_news_to_show') !!}</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <a href="{{ route('home') }}" class="logo">
                                    <img width="80" alt="OCG - Online Casino Games" class="img-responsive" src="{{ asset('img/logo.png') }}">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <p>{!! transdata('app.copyright_footer', ['date' => date('Y')]) !!}</p>
                            </div>
                            <div class="col-md-4">
                                <nav id="sub-menu">
                                    <ul class="inline-block">
                                        <li><a href="{{ route('home.terms') }}">{!! transdata('legal.terms_conditions.title') !!}</a></li>
                                        <li><a href="{{ route('home.policy') }}">{!! transdata('legal.privacy_policy.title') !!}</a></li>
                                    </ul>

                                    <a class="hidden-mobile visible scroll-top" href="#"><i class="fa fa-chevron-up"></i></a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        {{--</div>--}}

        @include('partials.footer')
        
        <script src="{!! mix('compiled/js/shared.js') !!}"></script>
        <script src="{!! mix('compiled/porto/porto.js') !!}"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
            window.addEventListener("load", function(){
                window.cookieconsent.initialise({
                    "palette": {
                        "popup": {
                            "background": "#252e39"
                        },
                        "button": {
                            "background": "#14a7d0"
                        }
                    },
                    "position": "bottom-left",
                    "showLink": false,
                    "content": {
                        "message": '{!! trans('app.cookie_consent.text', ['policy' => route('home.policy'), 'terms' => route('home.terms')]) !!}',
                        "dismiss": "{{ trans('app.cookie_consent.i_accept') }}"
                    }
                })});
        </script>

        <!-- Smartsupp Live Chat script -->
        
       <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '7c8c11e4b7cfa34ebd0f687bdd68f3bcc629c948';
        _smartsupp.alignX = "right";
        window.smartsupp || (function (d) {
            var s, c, o = smartsupp = function () {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
          smartsupp('language','{{ App::getLocale() }}');
          smartsupp('theme:options', {
            widgetWidth: 150,
            widgetHeight: 42
          });
          smartsupp('on', 'status', function (status) {
            if (status == 'online' || status == 'away') {
              smartsupp('theme:colors', {
                widget: '#2ecc71',
                primary: '#2ecc71'
              });
            } else {
              smartsupp('theme:colors', {
                widget: '#c0392b',
                primary: '#c0392b'
              });
            }
       });

        @if (Auth::check() && Auth::user()->isTranslator())
            $(document).ready(function() {
                new Overlay({
                    source_language: 'en',
                    target_language: '{{ Auth::user()->locale_translator }}',
                    save_translation_route: '{{ route('user.translations.save') }}',
                    get_page_translations_route: '{{ route('user.translations.get_page') }}',
                    get_orphan_translations_route: '{{ route('user.translations.get_orphan') }}'
                });
            });
        @endif
        </script>
        @yield('scripts')

    </body>
</html>
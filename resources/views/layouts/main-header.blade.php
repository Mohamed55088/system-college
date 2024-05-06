<!--=================================
header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}" style="    margin-left: 0px;padding-right: 1.2%;"
        id="nn11"><img width="48" height="48" id="nn21" src="https://img.icons8.com/fluency/48/school.png"
            alt="school" /></a>
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}" id="nn12"><img id="nn22"
                src="{{ URL::asset('assets/images/college.png') }}" alt=""></a>



    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        {{--    // <li class="nav-item">
        //     <div class="search">
        //         <a class="search-btn not_click" href="javascript:void(0);"></a>
        //         <div class="search-box not-click">
        //             <input type="text" class="not-click form-control" placeholder="Search" value=""
        //                 name="search">
        //             <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
        //         </div>
        //     </div>
        // </li> --}}
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">

        <div class="btn-group mb-1">
            <button type="button"
                style="display: flex;
            align-content: center;
            align-items: center;"
                class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>{{ trans('trans.notifications') }}</strong>
                    <span class="badge badge-pill badge-warning">05</span>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">New registered user <small
                        class="float-right text-muted time">Just now</small> </a>
                <a href="#" class="dropdown-item">New invoice received <small
                        class="float-right text-muted time">22 mins</small> </a>
                <a href="#" class="dropdown-item">Server error report<small class="float-right text-muted time">7
                        hrs</small> </a>
                <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1
                        days</small> </a>
                <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2
                        days</small> </a>
            </div>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big">
                <div class="dropdown-header">
                    <strong>{{ trans('trans.quick_links') }}</strong>
                </div>
                <div class="dropdown-divider"></div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                        <h5>{{ trans('trans.new_tasks') }}</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                        <h5>{{ trans('trans.assign_task') }}</h5>
                    </a>
                </div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                        <h5>{{ trans('trans.add_orders') }}</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                        <h5>{{ trans('trans.new_orders') }}</h5>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="https://extension.harvard.edu/wp-content/uploads/sites/8/2020/10/computer-programming.jpg"
                    alt="avatar">


            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">mohamed ramadan </h5>
                            <span>mohamedramadan@utopia.com</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i
                        class="text-secondary ti-reload"></i>{{ trans('trans.activitys') }}</a>
                <a class="dropdown-item" href="#"><i
                        class="text-success ti-email"></i>{{ trans('trans.messages') }}</a>
                <a class="dropdown-item" href="#"><i
                        class="text-warning ti-user"></i>{{ trans('trans.profile') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i
                        class="text-info ti-settings"></i>{{ trans('trans.setting') }}</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="text-danger ti-unlock"></i>{{ trans('trans.logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    @include('notify::components.notify')
</nav>

<!--=================================
header End-->

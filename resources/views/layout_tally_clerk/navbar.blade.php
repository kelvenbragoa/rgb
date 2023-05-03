<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle d-flex">
  <i class="hamburger align-self-center"></i>
</a>


        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">

                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="languageDropdown" data-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="globe"></i>
                            
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="languageDropdown">
                        
                        <div class="list-group">
                            <form method="POST" action="{{route('lang.store')}}">
                                @csrf
                            <div class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-warning" data-feather="globe"></i>
                                        
                                    </div>
                                    <div class="col-10">
                                        
                                        <input type="radio" @if (auth()->user()->lang == 'pt') checked @endif class="form" name="lang" value="pt">{{__('text.portuguese')}}
                                        <input type="radio" @if (auth()->user()->lang == 'en') checked @endif class="form" name="lang" value="en">{{__('text.english')}}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="dropdown-menu-footer">
                                
                                <button type="submit" class="btn btn-primary" class="text-muted">{{__('text.submit')}}</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </li>
               
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="bell"></i>
                            <span class="indicator">{{count(Auth::user()->unreadNotifications)}}</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                        <div class="dropdown-menu-header">
                            <a href="{{route('tallyclerk-notification.index')}}" class="text-muted">{{count(Auth::user()->unreadNotifications)}} {{__('text.notification')}}</a>
                        </div>
                        <div class="list-group">
                            @foreach (Auth::user()->unreadNotifications as $item)
                            <a href="{{route('tallyclerk-notification.index')}}" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-warning" data-feather="bell"></i>
                                    </div>
                                    <div class="col-10">
                                        
                                        <div class="text-muted small mt-1">{{ Str::words($item->data['data'], 10) }}</div>
                                        <div class="text-muted small mt-1">{{$item->created_at}}</div>
                                        <div class="text-muted small mt-1"></div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            
                            
                           
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="{{route('tallyclerk-notification.index')}}" class="text-muted">{{__('text.show_notification')}}</a> <br>
                        
                        </div>
                    </div>
                </li>

            
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                        <img src="/file/img/sys/logoinogesticon.png" class="avatar img-fluid rounded mr-1"/> <span class="text-dark">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('tallyclerk-configuration.index')}}"><i class="align-middle mr-1" data-feather="settings"></i>{{__('text.config')}}</a>
                       
                      
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">{{__('text.log_out')}}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
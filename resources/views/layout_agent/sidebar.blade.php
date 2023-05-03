<nav id="sidebar" class="sidebar" >
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
          <span class="align-middle">InoGest</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                {{__('text.pages')}}
            </li>
            <li class="sidebar-item">
                <a href="#dashboard" data-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{__('text.dashboard')}}</span>
                </a>
                <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="{{URL::to('/home')}}">{{__('text.dashboard')}}</a></li>
                 
                
                </ul>
            </li>
            <li class="sidebar-header">
                {{__('text.operation')}}
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('agent-ship.index')}}">
                <i class="align-middle" data-feather="truck"></i> <span class="align-middle">{{__('text.ship')}}</span>
                </a>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('tallyclerk-ship.index')}}">
                <i class="align-middle" data-feather="truck"></i> <span class="align-middle">{{__('text.ship_operation')}}</span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="">
                <i class="align-middle" data-feather="activity"></i> <span class="align-middle">{{__('text.reports')}}</span>
                </a>
            </li> --}}

            <li class="sidebar-header">
                {{__('text.support')}}
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{route('agent-configuration.index')}}">
                <i class="align-middle" data-feather="settings"></i> <span class="align-middle">{{__('text.config')}}</span>
                </a>
            </li>
                
          

            

          
        </ul>

        <!--<div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <a href="https://adminkit.io/pricing" target="_blank" class="btn btn-primary btn-block">Upgrade to Pro</a>
            </div>
        </div>-->
    </div>
</nav>
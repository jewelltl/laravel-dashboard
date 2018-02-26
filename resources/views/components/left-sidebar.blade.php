<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{url('/')}}" class="padding-0 logo-dashboard"><img src="{{asset('images/logo.png')}}"></a>
                </li>
                <li class="nav-devider"></li>
                <li class="{{$page_info['menu'] == 'DASHBOARD' ? 'active' : ''}}">
                    <a class="waves-effect waves-dark text-capitalize" href="{{route('client.dashboard')}}"><i class="icon-Car-Wheel"></i><span class="hide-menu"> Dashboard </a>
                </li>
                <li class="{{$page_info['menu'] == 'BALANCE' ? 'active' : ''}}">
                    <a class="waves-effect waves-dark text-capitalize" href="{{route('client.balance')}}"><i class="icon-Money-2"></i><span class="hide-menu"> Balance <span class="balance">${{ $balance }}</span></a>
                </li>
                <li class="{{$page_info['menu'] == 'CONFIGURATION' ? 'active' : ''}}">
                    <a class="waves-effect waves-dark text-capitalize" href="{{route('client.configuration')}}"><i class="icon-Gears-2"></i><span class="hide-menu"> Configuration </a>
                </li>
                
            </ul>
            <ul class="pull-right navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                        Sign Out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

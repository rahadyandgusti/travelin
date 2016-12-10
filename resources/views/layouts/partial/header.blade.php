<header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">☰</button>
            <a class="navbar-brand" href="{{url('/')}}" style="background-size: 225px auto !important;background-image: url('{{asset('images/PLN-home.png')}}') !important;width: 240px">
                <img src="" width="100px">
            </a>
            <ul class="nav navbar-nav hidden-md-down">
                <!-- <li class="nav-item">
                    <a class="nav-link " href="#">&nbsp</a>
                </li> -->
                @if(Auth::user()->group=='keuangan' || Auth::user()->group=='superadmin')
                <li class="nav-item px-1 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Keuangan</a>
                    <div class="dropdown-menu dropdown-menu-left">
                        <a class="dropdown-item" href="{{ route('skko.index') }}">
                            <i class="fa fa-file-o"></i> Kelola SKKO 
                        </a>
                        <a class="dropdown-item" href="{{ route('contract.index') }}">
                            <i class="fa fa-files-o"></i> Kelola Surat Perjanjian 
                        </a>
                        <a class="dropdown-item" href="{{ route('paymentPlan.index') }}">
                            <i class="fa fa-credit-card"></i> Kelola Rencana Pembayaran 
                        </a>
                        <a class="dropdown-item" href="{{ route('bill.keuangan.index') }}">
                            <i class="fa fa-envelope-o"></i> Kelola Tagihan 
                        </a>
                        <a class="dropdown-item" href="{{ route('ppfa.index') }}">
                            <i class="fa fa-money"></i> Kelola PPFA 
                        </a>
                    </div>
                </li>
                @endif
                @if(Auth::user()->group=='sdm' || Auth::user()->group=='superadmin')
                <li class="nav-item px-1 ">
                    <a class="nav-link" href="{{ route('bill.sdm.index') }}">
                        SDM
                    </a>
                </li>
                @endif
                @if(Auth::user()->group=='logum' || Auth::user()->group=='superadmin')
                <li class="nav-item px-1 ">
                    <a class="nav-link" href="{{ route('bill.logum.index') }}">
                        Logistik Umum
                    </a>
                </li>
                @endif
            </ul>
            <ul class="nav navbar-nav float-xs-right hidden-md-down" style="margin-right: 10px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{!! asset('assets/dist/img/avatars/4.jpg') !!}" class="img-avatar" alt="admin@bootstrapmaster.com"> --}}
                        <span class="hidden-md-down">{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="margin-right:10px">
                        @if(Auth::user()->group=='superadmin')

                        <a class="dropdown-item" href="{{ route('user.index') }}"><i class="fa fa-users"></i> Users</a>
                        @endif

                        <a class="dropdown-item" href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>

            </ul>
        </div>
    </header>
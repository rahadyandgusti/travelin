<div class="sidebar">

        <nav class="sidebar-nav">
            <ul class="nav">
                @if(Auth::user()->group=='keuangan' || Auth::user()->group=='superadmin')
                <li class="nav-title">
                    Menu Keuangan
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('skko.index') }}"><i class="icon-calculator"></i> Kelola SKKO </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contract.index') }}"><i class="icon-calculator"></i> Kelola Surat Perjanjian </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paymentPlan.index') }}"><i class="icon-calculator"></i> Kelola Rencana Pembayaran </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bill.keuangan.index') }}"><i class="icon-calculator"></i> Kelola Tagihan </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ppfa.index') }}"><i class="icon-calculator"></i> Kelola PPFA </a>
                </li>
                @endif
                @if(Auth::user()->group=='sdm' || Auth::user()->group=='superadmin')
                <li class="nav-title">
                    Menu SDM
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bill.sdm.index') }}"><i class="icon-calculator"></i> Monitoring Tagihan </a>
                </li>
                @endif
                @if(Auth::user()->group=='logum' || Auth::user()->group=='superadmin')
                <li class="nav-title">
                    Menu Logistik Umum
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bill.logum.index') }}"><i class="icon-calculator"></i> Monitoring Tagihan </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
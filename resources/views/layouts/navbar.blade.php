<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('shops.index') ? 'active' : '' }}" href="{{ route('shops.index') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Shops</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('debtors.index') ? 'active' : '' }}" href="{{ route('debtors.index') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Debtors</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('debts.index') ? 'active' : '' }}" href="{{ route('debts.index') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Debts</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('payments.index') ? 'active' : '' }}" href="{{ route('payments.index') }}">
                <i class="bi bi-file-earmark"></i>
                <span>Payments</span>
            </a>
        </li>

    </ul>

</aside>

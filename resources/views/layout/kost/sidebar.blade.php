<li class="nav-item" style="{{ request()->routeIs('branch')  ?: '' }}">
    <a class="nav-link" href="{{ route('branch') }}"
        style="{{ request()->routeIs('branch') || request()->routeIs('indexaddbranch') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-code-branch" style="color: inherit;"></i>
        <span>Branch</span>
    </a>
</li>
<li class="nav-item" style="{{ request()->routeIs('calendar') ?: '' }}">
    <a class="nav-link" href="{{ route('calendar') }}"
        style="{{ request()->routeIs('calendar') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-calendar-week" style="color: inherit;"></i>
        <span>Calendar</span>
    </a>
</li>
<li class="nav-item" style="{{ request()->routeIs('kostproperty') ?: '' }}">
    <a class="nav-link" href="{{ route('kostproperty') }}"
        style="{{ request()->routeIs('kostproperty') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-home" style="color: inherit;"></i>
        <span>Property</span>
    </a>
</li>
<li class="nav-item" style="{{ request()->routeIs('kostpayment') ?: '' }}">
    <a class="nav-link" href="{{ route('kostpayment') }}"
        style="{{ request()->routeIs('kostpayment') || request()->routeIs('indexaddpaymentkost') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-money-bill-wave" style="color: inherit;"></i>
        <span>Payment</span>
    </a>
</li>
<li class="nav-item" style="{{ request()->routeIs('kostcustomer') ?: '' }}">
    <a class="nav-link" href="{{ route('kostcustomer') }}"
        style="{{ request()->routeIs('kostcustomer') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-user" style="color: inherit;"></i>
        <span>Customer</span>
    </a>
</li>

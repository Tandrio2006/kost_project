<li class="nav-item" style="{{ request()->routeIs('property') || request()->routeIs('invoice') ?: '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#residenceMenu"
        aria-expanded="true" aria-controls="collapseBootstrap"
        style="{{ request()->routeIs('property') || request()->routeIs('invoice') || request()->routeIs('indexaddproperty') || request()->routeIs('indexaddinvoice') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-home" style="color: inherit;"></i>
        <span>Property</span>
    </a>
    <div id="residenceMenu" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="py-2 collapse-inner rounded">
            <h6 class="collapse-header">Property</h6>
            <a class="collapse-item" href="{{ route('property') }}"
                style="{{ request()->routeIs('property') || request()->routeIs('indexaddproperty') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                Data Property
            </a>
            <a class="collapse-item" href="{{ route('invoice') }}"
                style="{{ request()->routeIs('invoice') || request()->routeIs('indexaddinvoice') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                Invoice
            </a>
        </div>
    </div>
</li>

<li class="nav-item" style="{{ request()->routeIs('payment') ?: '' }}">
    <a class="nav-link" href="{{ route('payment') }}"
        style="{{ request()->routeIs('payment') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-money-bill-wave" style="color: inherit;"></i>
        <span>Payment</span>
    </a>
</li>

<li class="nav-item" style="{{ request()->routeIs('customer') ?: '' }}">
    <a class="nav-link" href="{{ route('customer') }}"
        style="{{ request()->routeIs('customer') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-user" style="color: inherit;"></i>
        <span>Customer</span>
    </a>
</li>

<li class="nav-item" style="{{ request()->routeIs(patterns: 'proyek') ?: '' }}">
    <a class="nav-link" href="{{ route('proyek') }}"
        style="{{ request()->routeIs('proyek') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-project-diagram" style="color: inherit;"></i>
        <span>Proyek</span>
    </a>
</li>
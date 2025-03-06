<li class="nav-item" style="{{ request()->routeIs('payment') ?: '' }}">
    <a class="nav-link" href="{{ route('payment') }}"
        style="{{ request()->routeIs('payment') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
        <i class="fas fa-money-bill-wave" style="color: inherit;"></i>
        <span>Branch</span>
    </a>
</li>

@extends('layout.app')

@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <!-- Logo Sidebar -->
            <a class=" sidebar-brand d-flex align-items-center justify-content-center border-bottom
                    border-dark" href="index.html"
                style="background-color: white; color: black; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">

                <div class="sidebar-brand-icon">
                    <div class="bukuslogo py-2 px-3" style="background-color: white; border-radius: 10px;">
                        {{-- <img src="{{ asset('RuangAdmin/img/logo/logo4.png') }}"> --}}
                        <img src="" alt="Company Logo">
                    </div>
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item"
                style="{{ request()->routeIs('property') || request()->routeIs('invoice') ?  : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#residenceMenu"
                    aria-expanded="true" aria-controls="collapseBootstrap" style="{{ request()->routeIs('property') || request()->routeIs('invoice') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                    <i class="fas fa-home" style="color: inherit;"></i>
                    <span>Property</span>
                </a>
                <div id="residenceMenu" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Property</h6>
                        <a class="collapse-item" href="{{ route('property') }}"
                            style="{{ request()->routeIs('property') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                            Data Property
                        </a>
                        <a class="collapse-item" href="{{ route('invoice') }}"
                            style="{{ request()->routeIs('invoice') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                            Invoice
                        </a>
                    </div>
                </div>
            </li>

            <li class="nav-item" style="{{ request()->routeIs('payment') ? : '' }}">
                <a class="nav-link" href="{{ route('payment') }}"
                    style="{{ request()->routeIs('payment') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                    <i class="fas fa-money-bill-wave"
                        style="color: inherit;"></i>
                    <span>Payment</span>
                </a>
            </li>

            <li class="nav-item" style="{{ request()->routeIs('customer') ? : '' }}">
                <a class="nav-link" href="{{ route('customer') }}"
                    style="{{ request()->routeIs('customer') ? 'color: #45a9ea; font-weight: bold;' : '' }}">
                    <i class="fas fa-user" style="color: inherit;"></i>
                    <span>Customer</span>
                </a>
            </li>


            <!-- <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-globe-asia"></i>
                        <span>Tracking</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-truck-loading"></i>
                        <span>Driver</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-wallet"></i>
                        <span>Top Up</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="">
                        <i class="fas fa-people-carry"></i>
                        <span>Pickup</span>
                    </a>
                </li> -->

            <!-- 
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customerMenu"
                        aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="fas fa-user"></i>
                        <span>Customer</span>
                    </a>
                    <div id="customerMenu" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Customer</h6>
                            <a class="collapse-item" href="">Invoice</a>
                            <a class="collapse-item " href="">Delivery / Pickup</a>
                            <a class="collapse-item " href="">Payment</a>
                            <a class="collapse-item" href="">Credit Note</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listMenuAccounting"
                        aria-expanded="true" aria-controls="listMenuAccounting">
                        <i class="fas fa-money-bill-wave-alt"></i>
                        <span>Accounting</span>
                    </a>
                    <div id="listMenuAccounting" class="collapse" aria-labelledby="headingBootstrap"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Accounting</h6>
                            <a class="collapse-item " href="">COA</a>
                            <a class="collapse-item " href="">Journal</a>
                            <a class="collapse-item " href="">Asset</a>
                            <a class="collapse-item " href="">Accounting Setting</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listreport" aria-expanded="true"
                        aria-controls="listreport">
                        <i class="fas fa-file-alt fa-lg"></i>
                        <span>Report</span>
                    </a>
                    <div id="listreport" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Report</h6>
                            <a class="collapse-item " href="">Asset Report</a>
                            <a class="collapse-item" href="">Top Up Report</a>
                            <a class="collapse-item " href="">Penerimaan Kas Report</a>
                            <a class="collapse-item " href="">SOA Customer</a>
                            <a class="collapse-item" href="">SOA Vendor</a>
                            <a class="collapse-item" href="">Ongoing Invoice</a>
                            <a class="collapse-item " href="">Piutang</a>
                            <a class="collapse-item" href="">Sales</a>
                        </div>
                    </div>
                </li>


                <li class="nav-item ">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#listreport" aria-expanded="true"
                        aria-controls="listreport">
                        <i class="fas fa-file-alt fa-lg"></i>
                        <span>Report</span>
                    </a>
                    <div id="listreport" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Report</h6>

                            <a class="collapse-item " href="">Top Up Report</a>

                        </div>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrapsVendor"
                        aria-expanded="true" aria-controls="collapseBootstrapsVendor">
                        <i class="fas fa-truck"></i>
                        <span>Vendor</span>
                    </a>
                    <div id="collapseBootstrapsVendor" class="collapse" aria-labelledby="headingBootstrap"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Vendor</h6>
                            <a class="collapse-item " href="">Invoice</a>
                            <a class="collapse-item " href="">Payment</a>
                            <a class="collapse-item" href="">Debit Note</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                        aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-fw fa-window-maximize"></i>
                        <span>Master Data</span>
                    </a>
                    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Master Data</h6>
                            <a class="collapse-item " href="">Costumers</a>
                            <a class="collapse-item " href="">Driver</a>
                            <a class="collapse-item " href="">Rate</a>
                            <a class="collapse-item " href="">Category</a>
                            <a class="collapse-item " href="">User</a>
                            <a class="collapse-item " href="">Vendor</a>
                            <a class="collapse-item" href="">Periode</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item ">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstraps"
                        aria-expanded="true" aria-controls="collapseBootstraps">
                        <i class="fas fa-tasks"></i>
                        <span>Content</span>
                    </a>
                    <div id="collapseBootstraps" class="collapse" aria-labelledby="headingBootstrap"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu</h6>
                            <a class="collapse-item " href="">Hero Page</a>
                            <a class="collapse-item " href="">Information</a>
                            <a class="collapse-item " href="">About</a>
                            <a class="collapse-item " href="">Why</a>
                            <a class="collapse-item " href="">Service</a>
                            <a class="collapse-item " href="">Advertisement</a>
                            <a class="collapse-item " href="">Popup</a>
                            <a class="collapse-item " href="">Contact</a>
                            <a class="collapse-item" href="">Whatsapp</a>
                            <a class="collapse-item " href="">WA Broadcast</a>
                        </div>
                    </div>
                </li> -->
        </ul>


        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand  topbar mb-4 static-top border-bottom border-dark"
                    style="background-color: white;">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-1">
                        <i class="fa fa-bars" style="color: black;"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="invoiceDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Notification">
                                <i class="fas fa-bell fa-fw" style="color: black;"></i>
                                <span class="badge badge-danger badge-counter" id="unpaid-invoice-count"
                                    style="display: none;">0</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="invoiceDropdown">
                                <h6 class="dropdown-header" style="background-color: black; color: white;  border: none;">
                                    Notification</h6>
                                <div id="invoice-notifications" style="max-height: 300px; overflow-y: auto;">
                                    <p class="dropdown-item text-center small text-gray-500">No Notification</p>
                                </div>
                                <a class="dropdown-item text-center small text-gray-500" href="">View All Notification</a>
                            </div>
                        </li>

                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                                                <a class="nav-link dropdown-toggle" href="#" id="kuotaDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                    title="Kuota Notifications">
                                                    <i class="fas fa-comment-dollar" style="color: black;"></i>
                                                    <span class="badge badge-danger badge-counter" id="unpaid-kuota-count"
                                                        style="display: none;">0</span>
                                                </a>
                                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                    aria-labelledby="kuotaDropdown">
                                                    <h6 class="dropdown-header" style="background-color: black; color: white; border: none;">
                                                        Kuota</h6>
                                                    <div id="kuota-notifications" style="max-height: 300px; overflow-y: auto;">
                                                        <p class="dropdown-item text-center small text-gray-500">No data kuota</p>
                                                    </div>
                                                    <a class="dropdown-item text-center small text-gray-500" href="">View all
                                                        Kuota</a>
                                                </div>
                                            </li> -->


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('RuangAdmin/img/boy.png') }}"
                                    style="max-width: 70px">
                                <div class="ml-3 text-dark">
                                    <div class="font-weight-bold">Tandrio</div>
                                    <div class="small">TLID: 23455</div>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('index') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Back
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                @yield('main')

            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> - developed by
                            {{-- <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b> --}}
                            <b>SmartAppCare</b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>
@endsection
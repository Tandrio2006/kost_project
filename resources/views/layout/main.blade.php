@extends('layout.app')

@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <!-- Logo Sidebar -->
            <a class=" sidebar-brand d-flex align-items-center justify-content-center border-bottom
                    border-dark"
                href="index.html" style="background-color: white; color: black; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">

                <div class="sidebar-brand-icon">
                    <div class="bukuslogo py-2 px-3" style="background-color: white; border-radius: 10px;">
                        {{-- <img src="{{ asset('RuangAdmin/img/logo/logo4.png') }}"> --}}
                        <img src="" alt="Company Logo">
                    </div>
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            @if (session('active_menu') == 'kost')
                @include('layout.kost.sidebar')
            @elseif (session('active_menu') == 'developer')
                @include('layout.developer.sidebar')
            @endif

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
                                <a class="dropdown-item text-center small text-gray-500" href="">View All
                                    Notification</a>
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

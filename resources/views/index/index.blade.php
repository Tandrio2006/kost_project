@extends('layout.app')

@section('title', 'index')

@push('styles')
<style>
    body {
        background: #45a9ea !important;
    }

    .logout-button {
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .box {
        width: 200px;
        height: 200px;
        background-color: white;
        border: 1px solid #000;
        display: flex;
        flex-direction: column;
        /* Susun vertikal */
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        text-align: center;
        padding: 20px;
        border-radius: 5px;
    }

    .box img {
        width: 140px;
        height: 140px;
    }
</style>

@section('content')
    <div id="content-wrapper" class="d-flex flex-column" style="background-color: #45a9ea;">
        <div id="content">
            <!-- Logo -->

            <nav class="navbar navbar-expand  topbar mb-4 static-top border-bottom border-dark"
                style="background-color: white;">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                    <div class="sidebar-brand-icon">
                        <div class="bukuslogo py-2 px-3" style=" border-radius: 10px;">
                            <img src="" alt="Company Logo">
                        </div>
                    </div>
                </a>
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- <div class="logout-button">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Logout</button>
                                                </form>
                                            </div> -->
            <div class="container d-flex align-items-center justify-content-center" style="height: 600px;">
                <div class="d-flex justify-content-center w-100">
                    <div class="mr-5">
                        <div class="box text-center" id="menuDev">
                            <img src="img/icon-developer.png" alt="Developer Icon">
                            <span>DEVELOPER</span>
                        </div>
                    </div>
                    <div>
                        <div class="box text-center" id="menuKost">
                            <img src="img/icon-kost.png" alt="Kost Icon">
                            <span>KOST</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
    @section('script')
        <script>
            var userRole = @json(Auth::user()->role);

            $("#menuDev").click(function () {
                if (userRole === 'developer' || userRole === 'admin') {
                    window.location.href = '/property';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Akses Ditolak!',
                        text: 'Anda tidak memiliki izin untuk mengakses halaman ini.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK',
                        backdrop: false
                    });
                }
            });

            $("#menuKost").click(function () {
                if (userRole === 'kost' || userRole === 'admin') {
                    window.location.href = '/branch';
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Akses Ditolak!',
                        text: 'Anda tidak memiliki izin untuk mengakses halaman ini.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK',
                        backdrop: false
                    });
                }
            });
        </script>
    @endsection
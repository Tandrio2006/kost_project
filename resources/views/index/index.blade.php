@extends('layout.app')

@section('title', 'index')

@push('styles')
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #45a9ea;
        }

        .logout-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .box {
            width: 200px;
            height: 200px;
            background-color: #f0f0f0;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    <div class="logout-button">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="box" id="menuDev">DEVELOPER</div>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <div class="box" id="menuKost">KOST</div>
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
                window.location.href = '/kost';
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

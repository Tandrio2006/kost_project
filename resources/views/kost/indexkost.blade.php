@extends('layout.app')

@section('title', 'kost')

@section('content')

    <div class="p-4 mt-2">
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn btn-secondary me-3" onclick="window.location.href='{{ route('index') }}'">
                ← Back
            </button>

            <div class="d-flex align-items-center mx-auto">
                <div class="input-group" style="width: 550px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-white" style="background-color: #45a9ea;">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                    <input id="txSearch" type="text" class="form-control" placeholder="Search">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 px-5">
        <div class="card flex-row shadow-lg p-5">
            <!-- Gambar di Kiri -->
            <img src="https://via.placeholder.com/200" class="img-fluid rounded-start" alt="Gambar"
                style="width: 250px; height: auto; object-fit: cover;">

            <!-- Konten di Kanan -->
            <div class="card-body">
                <h5 class="card-title">Judul Card</h5>
                <p class="card-text">Ini adalah deskripsi singkat untuk card ini. Bisa berisi informasi tambahan.</p>
                <button class="btn btn-primary">Detail</button>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script>

    </script>
@endsection
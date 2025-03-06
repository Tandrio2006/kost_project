@extends('layout.main')

@section('title', 'Property')

@section('main')
<style>
        .seat-container {
            display: grid;
            grid-template-columns: repeat(18, 50px);
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        .seat {
            width: 35px;
            height: 35px;
            text-align: center;
            line-height: 35px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .available {
            background-color: white;
            border:solid 1px black;
        }
        .confirmed {
            background-color: #45a9ea; 
            color: white;
        }
        .reserved {
            background-color: yellow;
            color: white;
        }
        .unavailable{
            background-color: gray;
            color: white;
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Property</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Property</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-links nav-link active" aria-current="page" href="#" data-tab="newton">Newton</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links nav-link" href="#" data-tab="newtonNew">Newton New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links nav-link" href="#" data-tab="pilar12">Pilar 12</a>
                    </li>
                </ul>
                <div class="card shadow-lg border-0 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <img id="kostImage" src="img/kost1.jpeg" class="kost-image" alt="Kost Image" width="350px"
                                    height="250px">
                                <div class="mt-3">
                                    <button class="btn btn-primary" onclick="prevImage()">&#8592; Previous</button>
                                    <button class="btn btn-primary" onclick="nextImage()">Next &#8594;</button>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <h3 class="text-primary font-weight-bold">Deskripsi Kost</h3>
                                <p id="kostDescription">
                                    Newton Kost adalah pilihan sempurna untuk Anda yang mencari hunian nyaman dengan
                                    fasilitas lengkap. Terletak di lokasi strategis, dekat dengan pusat perbelanjaan,
                                    transportasi umum, dan tempat hiburan.
                                </p>
                                <ul>
                                    <li><strong>Lokasi:</strong> Jl. Newton No. 12, Jakarta</li>
                                    <li><strong>Fasilitas:</strong> WiFi, AC, Laundry, Parkir</li>
                                    <li><strong>Harga Sewa:</strong> Mulai dari Rp1.500.000/bulan</li>
                                    <li><strong>Kontak:</strong> +62 812-3456-7890</li>
                                </ul>
                            </div>
                        </div>

                        <div class="container text-center mt-5">
                            <h2 class="text-primary"><b>Pilih Kost</b></h2>

                            <div class="seat-container">
                                <div class="seat confirmed">A1</div>
                                <div class="seat available" >A2</div>
                                <div class="seat available" >A3</div>
                                <div class="seat available" >A4</div>
                                <div class="seat available" >A5</div>
                                <div class="seat available" >A6</div>

                                <div class="seat unavailable" >B1</div>
                                <div class="seat available" >B2</div>
                                <div class="seat confirmed">B3</div>
                                <div class="seat available" >B4</div>
                                <div class="seat available" >B5</div>
                                <div class="seat available" >B6</div>

                                <div class="seat available" >C1</div>
                                <div class="seat available" >C2</div>
                                <div class="seat available" >C3</div>
                                <div class="seat available" >C4</div>
                                <div class="seat confirmed">C5</div>
                                <div class="seat available" >C6</div>

                                <div class="seat available" >D1</div>
                                <div class="seat confirmed">D2</div>
                                <div class="seat available" >D3</div>
                                <div class="seat available" >D4</div>
                                <div class="seat available" >D5</div>
                                <div class="seat reserved" >D6</div>
                                <div class="seat confirmed">A1</div>
                                <div class="seat available" >A2</div>
                                <div class="seat unavailable" >A3</div>
                                <div class="seat available" >A4</div>
                                <div class="seat available" >A5</div>
                                <div class="seat available" >A6</div>

                                <div class="seat available" >B1</div>
                                <div class="seat available" >B2</div>
                                <div class="seat confirmed">B3</div>
                                <div class="seat unavailable" >B4</div>
                                <div class="seat available" >B5</div>
                                <div class="seat available" >B6</div>

                                <div class="seat available" >C1</div>
                                <div class="seat reserved" >C2</div>
                                <div class="seat available" >C3</div>
                                <div class="seat available" >C4</div>
                                <div class="seat confirmed">C5</div>
                                <div class="seat available" >C6</div>

                                <div class="seat available" >D1</div>
                                <div class="seat confirmed">D2</div>
                                <div class="seat available" >D3</div>
                                <div class="seat reserved" >D4</div>
                                <div class="seat available" >D5</div>
                                <div class="seat available" >D6</div>

                                <div class="seat confirmed">A1</div>
                                <div class="seat available" >A2</div>
                                <div class="seat available" >A3</div>
                                <div class="seat available" >A4</div>
                                <div class="seat reserved" >A5</div>
                                <div class="seat available" >A6</div>

                                <div class="seat available" >B1</div>
                                <div class="seat unavailable" >B2</div>
                                <div class="seat confirmed">B3</div>
                                <div class="seat available" >B4</div>
                                <div class="seat reserved" >B5</div>
                                <div class="seat available" >B6</div>

                                <div class="seat reserved" >C1</div>
                                <div class="seat available" >C2</div>
                                <div class="seat available" >C3</div>
                                <div class="seat available" >C4</div>
                                <div class="seat confirmed">C5</div>
                                <div class="seat available" >C6</div>

                            </div>

                            <button class="btn btn-success mt-3">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection


    @section('script')
        <script>
            const images = [
                "img/kost1.jpeg",
                "img/kost2.jpg",
                "img/kost3.jpg"
            ];

            let currentImageIndex = 0;

            function prevImage() {
                currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                document.getElementById("kostImage").src = images[currentImageIndex];
            }

            function nextImage() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                document.getElementById("kostImage").src = images[currentImageIndex];
            }
        </script>
    @endsection
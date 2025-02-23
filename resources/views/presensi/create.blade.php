@extends('layouts.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader bg-primary text-light">
  <div class="left">
    <a href="javascript:;" class="headerButton goBack">
      <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
  </div>
  <div class="pageTitle">E-Presensi</div>
  <div class="right"></div>
</div>
<!-- * App Header -->

<style>
#map {
  height: 200px;
}

.jam-digital-malasngoding {

  background-color: #27272783;
  position: absolute;
  top: 65px;
  right: 10px;
  z-index: 9999;
  width: 150px;
  border-radius: 10px;
  padding: 5px;
}



.jam-digital-malasngoding p {
  color: #fff;
  font-size: 16px;
  text-align: center;
  margin-top: 0;
  margin-bottom: 0;
}
</style>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
<div class="row" style="margin-top: 60px">
  <div class="col">
    <input type="hidden" id="lokasi">
    <!-- Elemen untuk webcam -->
    <div class="webcam-capture"></div>
  </div>
</div>
<div class="jam-digital-malasngoding">
  <p>{{ date('d-m-Y') }}</p>
  <p id="jam"></p>
  <p>{{ $jamkerja->nama_jam_kerja }}</p>
  <p>Mulai : {{ date('H:i', strtotime($jamkerja->awal_jam_masuk)) }}</p>
  <p>Masuk : {{ date('H:i', strtotime($jamkerja->jam_masuk)) }}</p>
  <p>Akhir : {{ date('H:i', strtotime($jamkerja->akhir_jam_masuk)) }}</p>
  <p>Pulang : {{ date('H:i', strtotime($jamkerja->jam_pulang)) }}</p>
</div>
<div class="row" style="margin-top: 20px;">
  <div class="col">
    @if ($cek > 0)
    <button id="takeabsen" class="btn btn-danger btn-block" style="margin-top: 20px;">
      <ion-icon name="camera-outline"></ion-icon>
      Absen Pulang
    </button>
    @else
    <button id="takeabsen" class="btn btn-primary btn-block" style="margin-top: 20px;">
      <ion-icon name="camera-outline"></ion-icon>
      Absen Masuk
    </button>
    @endif
  </div>
</div>
<div class="row mt-2">
  <div class="col">
    <div id="map"></div>
  </div>
</div>

<!-- Audio notifikasi -->
<audio id="notif_in" src="{{ asset('assets/sound/in.mp3') }}" type="audio/mpeg">
</audio>
<audio id="notif_out" src="{{ asset('assets/sound/out.mp3') }}" type="audio/mpeg">
</audio>
<audio id="notif_radius" src="{{ asset('assets/sound/radius.mp3') }}" type="audio/mpeg">
</audio>
@endsection

@push('myscript')
<script type="text/javascript">
window.onload = function() {
  jam();
}

function jam() {
  var e = document.getElementById('jam'),
    d = new Date(),
    h, m, s;
  h = d.getHours();
  m = set(d.getMinutes());
  s = set(d.getSeconds());

  e.innerHTML = h + ':' + m + ':' + s;

  setTimeout('jam()', 1000);
}

function set(e) {
  e = e < 10 ? '0' + e : e;
  return e;
}
</script>
<!-- Mengimpor pustaka webcam.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>

<style>
.webcam-capture,
.webcam-capture video {
  display: block;
  width: 100% !important;
  height: auto !important;
  margin: auto;
  border-radius: 15px;
}
</style>

<script>
var notif_in = document.getElementById('notif_in');
var notif_out = document.getElementById('notif_out');
var notif_radius = document.getElementById('notif_radius');

// Setel properti webcam
Webcam.set({
  width: 540,
  height: 430,
  image_format: 'jpeg',
  jpeg_quality: 80
});

Webcam.attach('.webcam-capture');

var lokasi = document.getElementById('lokasi');

// Inisialisasi Map dengan Leaflet
var lokasi_kantor = "{{ $lok_kantor->lokasi_cabang }}";
var lok = lokasi_kantor.split(",");
var lat_kantor = lok[0];
var long_kantor = lok[1];
var map = L.map('map').setView([lat_kantor, long_kantor], 16);
var radius = "{{ $lok_kantor->radius_cabang }}";
// Mengambil tile map dari OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 23,
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

//menandai radius
var circle = L.circle([lat_kantor, long_kantor], {
  color: 'red',
  fillColor: '#f03',
  fillOpacity: 0.5,
  radius: radius
}).addTo(map);
// Menandai lokasi kantor
var kantorIcon = L.icon({
  iconUrl: "{{ asset('assets/img/planetarium.png') }}",
  iconSize: [40, 40],
});
var kantorMarker = L.marker([lat_kantor, long_kantor], {
  icon: kantorIcon
}).addTo(map);



// Mengambil lokasi user
navigator.geolocation.getCurrentPosition(function(position) {
  var lat = position.coords.latitude;
  var long = position.coords.longitude;

  lokasi.value = lat + "," + long;

  var userMarker = L.marker([lat, long]).addTo(map)
    .bindPopup('Lokasi Anda Sekarang')
    .openPopup();

  map.setView([lat, long], 16);
});

$("#takeabsen").click(function(e) {
  e.preventDefault();

  // Mengambil gambar dari webcam
  Webcam.snap(function(uri) {
    image = uri;
  });

  // Mengirim data melalui AJAX
  $.ajax({
    type: 'POST',
    url: '/presensi/store',
    data: {
      _token: "{{ csrf_token() }}",
      image: image,
      lokasi: $("#lokasi").val()
    },
    success: function(response) {
      if (response.status === "success") {
        if (response.type === "in") {
          notif_in.play();
        } else {
          notif_out.play();
        }
        Swal.fire({
          title: 'Berhasil!',
          text: response.message,
          icon: 'success',
          confirmButtonText: 'OK'
        });
        setTimeout(function() {
          window.location.href = '/dashboard';
        }, 3000);
      } else {
        if (response.type === "radius") {
          notif_radius.play();
        }
        Swal.fire({
          title: 'Error!',
          text: response.message,
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }
    },
    error: function(xhr) {
      var response = JSON.parse(xhr.responseText);
      if (response.type === "radius") {
        notif_radius.play();
      }
      Swal.fire({
        title: 'Error!',
        text: response.message,
        icon: 'error',
        confirmButtonText: 'OK'
      });
    }
  });
});
</script>
@endpush
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page {
    size: A4
  }

  h3 {
    font-family: 'Times New Roman', Times, serif font-size: 14px;
    font-weight: 600;
  }

  .thin-font {
    font-size: 14px;
    font-weight: 300;
  }

  .tabeldatakaryawan {
    margin-top: 40px;
  }

  .tabeldatakaryawan tr td {
    padding: 3px;
  }

  .tabelpresensi {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
  }

  .tabelpresensi tr th {
    border: 1px solid #000000;
    padding: 8px;
    background-color: #a4c2b2
  }

  .tabelpresensi tr td {
    border: 1px solid #000000;
    padding: 8px;
    font-size: 14px;
  }

  .foto {
    width: 40px;
    height: 30px;
  }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A4">
  <?php
  use Carbon\Carbon;

  // Set locale to Indonesian
  Carbon::setLocale('id');

  // Get current date
  $currentDate = Carbon::now();

  // Format date to 'tanggal bulanIndonesia tahun'
  $formattedDate = $currentDate->translatedFormat('d F Y');
  function selisih($jam_masuk, $jam_keluar)
  {
  // Mengambil jam, menit, dan detik dari waktu masuk
  [$h, $m, $s] = explode(':', $jam_masuk);
  $dtAwal = mktime($h, $m, $s, '1', '1', '1');

  // Mengambil jam, menit, dan detik dari waktu keluar
  [$h, $m, $s] = explode(':', $jam_keluar);
  $dtAkhir = mktime($h, $m, $s, '1', '1', '1');

  // Menghitung selisih dalam detik
  $dtSelisih = $dtAkhir - $dtAwal;

  // Menghitung total menit
  $totalmenit = $dtSelisih / 60;

  // Menghitung jam dan menit
  $jml_jam = floor($totalmenit / 60); // Menggunakan floor untuk mendapatkan jam
  $sisamenit = $totalmenit % 60; // Menggunakan modulus untuk mendapatkan sisa menit

  // Format output jam:menit
  return sprintf('%d:%02d', $jml_jam, $sisamenit);
  }
  ?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <table style="width: 100%">
      <tr>
        <td style="width: 30px">
          <img src="{{ asset('assets/img/login/walisongo.png') }}" width="60" height="80">
        </td>
        <td>
          <h3>LAPORAN PRESENSI PEGAWAI PKWT PLANETARIUM DAN OBSERVATORIUM UIN WALISONGO SEMARANG<br>
            <span class="thin-font">PERIODE {{ strtoupper($namabulan[$bulan]) }}
              {{ $tahun }}</span><br>
          </h3>
        </td>
      </tr>
    </table>
    <table class="tabeldatakaryawan">
      <tr>
        <td rowspan="6">
          @php
          $path = Storage::url('uploads/karyawan/' . $karyawan->foto);
          @endphp
          <img src="{{ url($path) }}" alt="" width="120px" height="120">
        </td>
      </tr>
      <tr>
        <td>No ID</td>
        <td>:</td>
        <td>{{ $karyawan->nik }}</td>
      </tr>
      <tr>
        <td>Nama Pegawai</td>
        <td>:</td>
        <td>{{ $karyawan->nama_lengkap }}</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>{{ $karyawan->jabatan }}</td>
      </tr>
      <tr>
        <td>Unit Kerja</td>
        <td>:</td>
        <td>{{ $karyawan->nama_dept }}</td>
      </tr>
      <tr>
        <td>No. HP</td>
        <td>:</td>
        <td>{{ $karyawan->no_hp }}</td>
      </tr>
    </table>
    <table class="tabelpresensi">
      <tr>
        <th>No. </th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Pulang</th>
        <th>Keterangan</th>
        <th>Jumlah Jam Kerja</th>
      </tr>
      @foreach ($presensi as $d)
      @php
      $jamterlambat = selisih('07:30:00', $d->jam_in);
      @endphp
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ date('d-m-Y', strtotime($d->tgl_presensi)) }}</td>
        <td>{{ $d->jam_in }}</td>
        <td>{{ $d->jam_out != null ? $d->jam_out : 'Belum Absen' }}</td>

        <td>
          @if ($d->jam_in > '07:30')
          Terlambat {{ $jamterlambat }}
          @else
          Tepat Waktu
          @endif
        </td>
        <td>
          @if ($d->jam_out != null)
          @php
          $jmljamkerja = selisih($d->jam_in, $d->jam_out);
          @endphp
          {{ $jmljamkerja }}
          @else
          Belum Absen
          @endif
        </td>
      </tr>
      @endforeach
    </table>

    <table width="100%" style="margin-top: 50px; margin-bottom: 50px;">
      <tr>
        <td colspan="2" style="text-align: right; padding-right: 30px; padding-bottom: 50px;">Semarang,
          {{ $formattedDate }}</td>
      </tr>
      <tr>
        <td style="text-align: center; vertical-align: bottom; padding-top: 80px;">
        </td>
        <td style="text-align: center; vertical-align: bottom; padding-top: 80px;">
          <b>Kepala Laboratorium Terpadu</b>
          <br><br>
          <u>Nama Direktur</u>
        </td>
      </tr>
    </table>

  </section>

</body>

</html>
@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <!--- Page pre-title --->

        <h2 class="page-title">
          Data Karyawan
        </h2>
      </div>
    </div>
  </div>
</div>
<div class="page-body">
  <div class="container-xl">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-12">
                    @if (session('success'))
                    <div class="alert alert-success">
                      {{ session('success') }}
                    </div>
                    @endif

                    @if (session('warning'))
                    <div class="alert alert-warning">
                      {{ session('warning') }}
                    </div>
                    @endif
                  </div>
                </div>

              </div>
            </div>
            @role('administrator', 'user')
            <div class="row">
              <div class="col-12">
                <a href="#" class="btn btn-primary" id="btnTambahKaryawan">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                  </svg>
                  Tambah Data
                </a>
              </div>
            </div>
            @endrole
            <div class="row mt-2">
              <div class="col-12">
                <form action="/karyawan" method="GET">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control"
                          placeholder="Nama Karyawan" value="{{ Request('nama_karyawan') }}">
                      </div>
                    </div>
                    @role('administrator', 'user')
                    <div class="col-3">
                      <div class="form-group">
                        <select name="kode_dept" id="kode_dept" class="form-select">
                          <option value="">Unit</option>
                          @foreach ($departemen as $d)
                          <option {{ Request('kode_dept') == $d->kode_dept ? 'selected' : '' }}
                            value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <select name="kode_cabang" class="form-select" id="">
                          <option value="">Lokasi Kerja</option>
                          @foreach ($cabang as $d)
                          <option {{ Request('kode_cabang') == $d->kode_cabang ? 'selected' : '' }}
                            value="{{ $d->kode_cabang }}">{{ $d->nama_cabang }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    @endrole
                    <div class="col-2">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                          </svg>
                          Cari
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <table class="table table-bordered" style="table-layout: auto; width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>No. HP</th>
                      <th>Foto</th>
                      <th>Unit</th>
                      <th>Lokasi Kerja</th>
                      <th style="width: 135px;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($karyawan as $d)
                    @php
                    $path = Storage::url('uploads/karyawan/' . $d->foto);
                    @endphp
                    <tr>
                      <td>{{ $loop->iteration + $karyawan->firstItem() - 1 }}</td>
                      <td>{{ $d->nik }}</td>
                      <td>{{ $d->nama_lengkap }}</td>
                      <td>{{ strtoupper($d->jabatan) }}</td>
                      <td>{{ $d->no_hp }}</td>
                      <td>
                        @if (empty($d->foto))
                        <img src="{{ asset('assets/img/no_photo.png') }}" class="avatar" alt="">
                        @else
                        <img src="{{ url($path) }}" class="avatar" alt="">
                        @endif
                      </td>
                      <td>{{ $d->nama_dept }}</td>
                      <td>{{ $d->nama_cabang }}</td>
                      <td>
                        <div class="d-flex button-group gap-1">
                          <div>
                            <a href="#" class="edit btn btn-primary btn-sm" nik="{{ $d->nik }}" title="Edit">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icon-tabler-edit">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" />
                              </svg>
                            </a>
                            <a href="/konfigurasi/{{ $d->nik }}/setjamkerja" class="btn btn-success btn-sm">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icon-tabler-settings">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                  d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                              </svg>
                            </a>
                            <a href="/karyawan/{{ Crypt::encrypt($d->nik) }}/resetpassword"
                              class="btn btn-sm btn-warning">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-key">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                  d="M14.52 2c1.029 0 2.015 .409 2.742 1.136l3.602 3.602a3.877 3.877 0 0 1 0 5.483l-2.643 2.643a3.88 3.88 0 0 1 -4.941 .452l-.105 -.078l-5.882 5.883a3 3 0 0 1 -1.68 .843l-.22 .027l-.221 .009h-1.172c-1.014 0 -1.867 -.759 -1.991 -1.823l-.009 -.177v-1.172c0 -.704 .248 -1.386 .73 -1.96l.149 -.161l.414 -.414a1 1 0 0 1 .707 -.293h1v-1a1 1 0 0 1 .883 -.993l.117 -.007h1v-1a1 1 0 0 1 .206 -.608l.087 -.1l1.468 -1.469l-.076 -.103a3.9 3.9 0 0 1 -.678 -1.963l-.007 -.236c0 -1.029 .409 -2.015 1.136 -2.742l2.643 -2.643a3.88 3.88 0 0 1 2.741 -1.136m.495 5h-.02a2 2 0 1 0 0 4h.02a2 2 0 1 0 0 -4" />
                              </svg>
                            </a>
                          </div>
                          @role('administrator', 'user')
                          <div>
                            <form action="/karyawan/{{ $d->nik }}/delete" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm delete-confirm" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="icon icon-tabler icon-tabler-trash">
                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                  <path d="M4 7l16 0" />
                                  <path d="M10 11l0 6" />
                                  <path d="M14 11l0 6" />
                                  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                              </button>
                            </form>
                          </div>
                          @endrole
                        </div>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{ $karyawan->links('vendor.pagination.bootstrap-5') }}
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

</div>
<div class="modal modal-blur fade" id="modal-inputkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/karyawan/store" method="POST" id="frmKaryawan" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-barcode">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                    <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                    <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                    <path d="M5 11h1v2h-1z" />
                    <path d="M10 11l0 2" />
                    <path d="M14 11h1v2h-1z" />
                    <path d="M19 11l0 2" />
                  </svg>
                </span>
                <input type="text" maxlength="15" value="" id="nik" class="form-control" placeholder="NIK" name="nik">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                  </svg>
                </span>
                <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap"
                  placeholder="Nama Lengkap">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-briefcase">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                    <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                    <path d="M12 12l0 .01" />
                    <path d="M3 13a20 20 0 0 0 18 0" />
                  </svg>
                </span>
                <input type="text" id="jabatan" class="form-control" name="jabatan" placeholder="Jabatan">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="input-icon mb-3">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                  </svg>
                </span>
                <input type="text" id="no_hp" value="" class="form-control" name="no_hp" placeholder="No. HP">
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <input type="file" name="foto" class="form-control">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <select name="kode_dept" id="kode_dept" class="form-select">
                <option value="">Pilih Departemen</option>
                @foreach ($departemen as $d)
                <option value="{{ $d->kode_dept }}">{{ $d->nama_dept }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <select name="kode_cabang" id="kode_cabang" class="form-select">
                <option value="">Pilih Cabang</option>
                @foreach ($cabang as $d)
                <option value="{{ $d->kode_cabang }}">{{ strtoupper($d->nama_cabang) }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12">
              <div class="form-group">
                <button class="btn  btn-primary w-100">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-send">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 14l11 -11" />
                    <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                  </svg>
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

{{-- Modal Edit --}}
<div class="modal modal-blur fade" id="modal-editkaryawan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="loadeditform">

      </div>

    </div>
  </div>
</div>
@endsection

@push('myscript')
<script>
$(function() {
  // Memunculkan modal saat tombol tambah karyawan diklik
  $("#nik").mask("000000000000000");
  $("#no_hp").mask("0000000000000");
  $("#btnTambahKaryawan").click(function() {
    $("#modal-inputkaryawan").modal("show");
  });

  // Mengedit karyawan
  $(".edit").click(function() {
    var nik = $(this).attr('nik'); // Menggunakan data-attribute untuk mendapatkan nik
    $.ajax({
      type: 'POST',
      url: '/karyawan/edit',
      cache: false,
      data: {
        _token: "{{ csrf_token() }}",
        nik: nik
      },
      success: function(respond) {
        $("#loadeditform").html(respond); // Memasukkan respons ke dalam elemen
        $("#modal-editkaryawan").modal(
          "show"); // Menampilkan modal setelah load
      },
    });
  });

  $(".delete-confirm").click(function(e) {
    var form = $(this).closest('form');
    e.preventDefault();
    Swal.fire({
      title: "Apakah Anda Yakin Menghapus Data Ini?",
      text: "Data Akan Dihapus Permanen",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "Delete!",
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
        Swal.fire('Deleted!', 'Data Berhasil Dihapus', 'success')
      }
    });
  });

  // Validasi form sebelum submit
  $("#frmKaryawan").submit(function(e) {
    var nik = $("#nik").val();
    var nama_lengkap = $("#nama_lengkap").val();
    var jabatan = $("#jabatan").val();
    var no_hp = $("#no_hp").val();
    var kode_dept = $("#frmKaryawan").find("#kode_dept")
      .val(); // Perbaikan: gunakan ID yang benar
    var kode_cabang = $("#frmKaryawan").find("#kode_cabang")
      .val(); // Perbaikan: gunakan ID yang benar

    // Validasi jika NIK kosong
    if (nik == "") {
      Swal.fire({
        title: 'Warning!',
        text: 'NIK Harus Diisi',
        icon: 'warning',
        confirmButtonText: 'Ok'
      }).then(() => {
        $("#nik").focus();
      });

      e.preventDefault(); // Mencegah form dikirim jika ada kesalahan
      return false;
    } else if (nama_lengkap == "") {
      Swal.fire({
        title: 'Warning!',
        text: 'Nama Harus Diisi',
        icon: 'warning',
        confirmButtonText: 'Ok'
      }).then(() => {
        $("#nama_lengkap").focus();
      });

      e.preventDefault();
      return false;
    } else if (jabatan == "") {
      Swal.fire({
        title: 'Warning!',
        text: 'Jabatan Harus Diisi',
        icon: 'warning',
        confirmButtonText: 'Ok'
      }).then(() => {
        $("#jabatan").focus();
      });

      e.preventDefault();
      return false;
    } else if (no_hp == "") {
      Swal.fire({
        title: 'Warning!',
        text: 'No. HP Harus Diisi',
        icon: 'warning',
        confirmButtonText: 'Ok'
      }).then(() => {
        $("#no_hp").focus();
      });

      e.preventDefault();
      return false;
    } else if (kode_dept == "") {
      Swal.fire({
        title: 'Warning!',
        text: 'Departemen Harus Diisi',
        icon: 'warning',
        confirmButtonText: 'Ok'
      }).then(() => {
        $("#kode_dept").focus();
      });

      e.preventDefault();
      return false;
    } else if (kode_cabang == "") {
      Swal.fire({
        title: 'Warning!',
        text: 'Cabang Harus Diisi',
        icon: 'warning',
        confirmButtonText: 'Ok'
      }).then(() => {
        $("#kode_cabang").focus();
      });

      e.preventDefault();
      return false;
    }
  });
});
</script>
@endpush
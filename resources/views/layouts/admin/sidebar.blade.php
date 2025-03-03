<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
      aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <h1 class="navbar-brand navbar-brand-autodark">
      <a href=".">
        <img src="{{ asset('tabler/static/logo.svg') }}" width="110" height="32" alt="Tabler"
          class="navbar-brand-image">
      </a>
    </h1>
    <div class="navbar-nav flex-row d-lg-none">
      <div class="nav-item d-none d-lg-flex me-3">
        <div class="btn-list">
          <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path
                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
            </svg>
            Source code
          </a>
          <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
            <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24" viewBox="0 0 24 24"
              stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
            </svg>
            Sponsor
          </a>
        </div>
      </div>
      <div class="d-none d-lg-flex">
        <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
          data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
          </svg>
        </a>
        <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
          data-bs-placement="bottom">
          <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
          </svg>
        </a>

      </div>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
          <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
          <div class="d-none d-xl-block ps-2">
            <div>{{ Auth::guard('user')->user()->name }}</div>
            <div class="mt-1 small text-secondary">Administrator</div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <a href="/proseslogoutadmin" class="dropdown-item">Logout</a>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse" id="sidebar-menu">
      <ul class="navbar-nav pt-lg-3">
        <li class="nav-item">
          <a class="nav-link" href="/panel/dashboardadmin/">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
              </svg>
            </span>
            <span class="nav-link-title">
              Home
            </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is(['karyawan', 'departemen', ' cabang']) ? 'show' : '' }}"
            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
            aria-expanded="{{ request()->is(['karyawan', 'departemen', 'cabang']) ? 'true' : '' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                <path d="M12 12l8 -4.5" />
                <path d="M12 12l0 9" />
                <path d="M12 12l-8 -4.5" />
                <path d="M16 5.25l-8 4.5" />
              </svg>
            </span>
            <span class="nav-link-title">
              Data Master
            </span>
          </a>
          <div class="dropdown-menu {{ request()->is(['karyawan', 'departemen', 'cabang', 'cuti']) ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->is(['karyawan']) ? 'active' : '' }}" href="/karyawan">
                  Karyawan
                </a>
                @role('administrator', 'user')
                <a class="dropdown-item {{ request()->is(['departemen']) ? 'active' : '' }}" href="/departemen">
                  Unit Kerja
                </a>
                <a class="dropdown-item {{ request()->is(['cabang']) ? 'active' : '' }}" href="/cabang">
                  Lokasi Kerja
                </a>
                @endrole
                <a class="dropdown-item {{ request()->is(['cuti']) ? 'active' : '' }}" href="/cuti">
                  Cuti
                </a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('presensi/monitoring') ? 'active' : '' }}" href="/presensi/monitoring">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-heart-rate-monitor">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                <path d="M7 20h10" />
                <path d="M9 16v4" />
                <path d="M15 16v4" />
                <path d="M7 10h2l2 3l2 -6l1 3h3" />
              </svg>
            </span>
            <span class="nav-link-title">
              Monitoring Presensi
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('presensi/izinsakit') ? 'active' : '' }}" href="/presensi/izinsakit">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/home -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-writing-sign">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M3 19c3.333 -2 5 -4 5 -6c0 -3 -1 -3 -2 -3s-2.032 1.085 -2 3c.034 2.048 1.658 2.877 2.5 4c1.5 2 2.5 2.5 3.5 1c.667 -1 1.167 -1.833 1.5 -2.5c1 2.333 2.333 3.5 4 3.5h2.5" />
                <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z" />
                <path d="M16 7h4" />
              </svg>
            </span>
            <span class="nav-link-title">
              Data Pengajuan Izin atau Sakit
            </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is(['presensi/laporan', 'presensi/rekap']) ? 'show' : '' }}"
            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
            aria-expanded="{{ request()->is(['presensi/laporan', 'presensi/rekap']) ? 'true' : '' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                <path d="M9 12h6" />
                <path d="M9 16h6" />
              </svg>
            </span>
            <span class="nav-link-title">
              Laporan
            </span>
          </a>
          <div class="dropdown-menu {{ request()->is(['presensi/laporan', 'presensi/rekap']) ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->is(['presensi/laporan']) ? 'active' : '' }}"
                  href="/presensi/laporan">
                  Presensi
                </a>
                <a class="dropdown-item {{ request()->is(['presensi/rekap']) ? 'active' : '' }}" href="/presensi/rekap">
                  Rekap Presensi
                </a>
              </div>
            </div>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->is(['konfigurasi', 'konfigurasi/*']) ? 'show' : '' }}"
            href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
            aria-expanded="{{ request()->is(['konfigurasi', 'konfigurasi/*']) ? 'true' : '' }}">
            <span class="nav-link-icon d-md-none d-lg-inline-block">
              <!-- Download SVG icon from http://tabler-icons.io/i/package -->
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
                class="icon icon-tabler icons-tabler-filled icon-tabler-settings">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                  d="M14.647 4.081a.724 .724 0 0 0 1.08 .448c2.439 -1.485 5.23 1.305 3.745 3.744a.724 .724 0 0 0 .447 1.08c2.775 .673 2.775 4.62 0 5.294a.724 .724 0 0 0 -.448 1.08c1.485 2.439 -1.305 5.23 -3.744 3.745a.724 .724 0 0 0 -1.08 .447c-.673 2.775 -4.62 2.775 -5.294 0a.724 .724 0 0 0 -1.08 -.448c-2.439 1.485 -5.23 -1.305 -3.745 -3.744a.724 .724 0 0 0 -.447 -1.08c-2.775 -.673 -2.775 -4.62 0 -5.294a.724 .724 0 0 0 .448 -1.08c-1.485 -2.439 1.305 -5.23 3.744 -3.745a.722 .722 0 0 0 1.08 -.447c.673 -2.775 4.62 -2.775 5.294 0zm-2.647 4.919a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" />
              </svg>
            </span>
            <span class="nav-link-title">
              Konfigurasi
            </span>
          </a>
          <div class="dropdown-menu {{ request()->is(['konfigurasi', 'konfigurasi/*']) ? 'show' : '' }}">
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">

              </div>
            </div>
            <div class="dropdown-menu-columns">
              <div class="dropdown-menu-column">
                <a class="dropdown-item {{ request()->is(['konfigurasi/jamkerja']) ? 'active' : '' }}"
                  href="/konfigurasi/jamkerja">
                  Data Jam Kerja
                </a>
                <a class="dropdown-item {{ request()->is(['konfigurasi/jamkerjadept']) ? 'active' : '' }}"
                  href="/konfigurasi/jamkerjadept">
                  Jam Kerja Unit
                </a>
                @role('administrator', 'user')
                <a class="dropdown-item {{ request()->is(['konfigurasi/users']) ? 'active' : '' }}"
                  href="/konfigurasi/users">
                  User's
                </a>
              </div>
            </div>
          </div>
        </li>
        @endrole
      </ul>
    </div>
  </div>
</aside>
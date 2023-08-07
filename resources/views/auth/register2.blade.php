<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Guru Kita | Daftar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box" id="register1">
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      <form>
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
            <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
            </div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
            </div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Kata Sandi">
            <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Kata Sandi">
            <div class="input-group-append">
              <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="invalid-feedback"></div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="button" class="btn btn-primary btn-block" name="btn-lanjutkan">
                Lanjutkan
                <div class="spinner-border spinner-border-sm text-light ml-2 d-none" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">Sudah punya akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  
</div>
<!-- /.register-box -->

<div class="container d-none" id="register2">
    <div class="row">
        <div class="col-6 m-auto">
            <div class="card">
                <div class="card-body register-card-body">
                    <h3 class="text-center">Masukkan Data Diri</h3>
            
                    <form>
                      @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" name="nip" placeholder="NIP">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="tempatLahir" placeholder="Tempat Lahir">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <input type="date" class="form-control" name="tanggalLahir" placeholder="Tanggal Lahir">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="noTelp" placeholder="No Telp/WA">
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="form-group">
                            <select name="jenisKelamin" class="form-control">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="button" class="btn btn-primary btn-block" name="btn-daftar">
                                  Daftar
                                  <div class="spinner-border spinner-border-sm text-light ml-2 d-none" role="status">
                                    <span class="sr-only">Loading...</span>
                                  </div>
                                </button>
                                <button type="button" class="btn btn-danger btn-block" name="btn-kembali">Kembali</button>
                            </div>
                            <!-- /.col -->
                        </div>

                    </form>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('assets/js/auth-register.js') }}"></script>
</body>
</html>

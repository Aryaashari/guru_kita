@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Profil Saya')

@section('title-page', 'Profil Saya')



@section('content')
    
<div class="row">
    <div class="col-12" id="detailDataArea">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" id="btnEdit">Edit Profil</button>
            </div>
          <div class="card-body" style="display: block;">
            <table>
                <tr>
                    <td class="text-bold">Nama</td>
                    <td id="detailNama">: {{ $profil->nama ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">Email</td>
                    <td id="detailEamil">: {{ $profil->email ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">NIP </td>
                    <td id="detailNip">: {{ $profil->teacher->nip ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">Tempat Lahir</td>
                    <td id="detailTempatLahir">: {{ $profil->teacher->tempat_lahir ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">Tanggal Lahir</td>
                    <td id="detailTanggalLahir">: {{ $profil->teacher->tanggal_lahir ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">No Telp/WA</td>
                    <td id="detailNoTelp">: {{ $profil->teacher->no_telp ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">Jenis Kelamin</td>
                    <td id="detailJenisKelamin">: {{ $profil->teacher->jenis_kelamin ?? "-" }}</td>
                </tr>
                <tr>
                    <td class="text-bold">Foto Profil</td>
                    <td id="detailFotoProfil">
                        @if ($profil->teacher->foto_profile == null)
                            : Tidak foto profil
                        @else
                            <img src="{{ asset('storage/'.$profil->teacher->foto_profile) }}" width="200" alt="foto-profile">
                        @endif 
                    </td>
                </tr>
            </table>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


      {{-- Edit Data --}}
      <div class="col-12 d-none" id="editDataArea">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-secondary" id="btnKembali">Kembali</button>
                <button class="btn btn-primary" id="btnSimpan">Simpan</button>
            </div>
            <div class="card-body">
                <form action="#" method="POST" id="formEdit" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{ $profil->nama ?? '' }}" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="{{ $profil->email ?? '' }}" class="form-control" id="email" name="email" placeholder="Masukkan email">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" value="{{ $profil->teacher->nip ?? '' }}" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="tempatLahir">Tempat Lahir</label>
                                <input type="text" value="{{ $profil->teacher->tempat_lahir ?? '' }}" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan tempatLahir sekolah">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                                    <option value="L" {{ $profil->teacher->jenis_kelamin == "L" ? "selected" : "" }}>Laki-Laki</option>
                                    <option value="P" {{ $profil->teacher->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" value="{{ $profil->teacher->tanggal_lahir ?? '' }}" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan tanggal lahir">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="fotoProfil">Foto Profil</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="fotoProfil" id="fotoProfil">
                                    <label class="custom-file-label" for="fotoProfil">Pilih file</label>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            
        </div>
      </div>
      
</div>

@endsection

@push('script')
    
    <script>
        $(document).ready(() => {
            
            let detailDataArea = $("#detailDataArea")[0];
            let editDataArea = $("#editDataArea")[0];
            let btnKembali = $("#btnKembali")[0];
            let btnSimpan = $("#btnSimpan")[0];
            let btnEdit = $("#btnEdit")[0];


            // detail area
            let detailNama = $("#detailNama")[0];
            let detailEmail = $("#detailEmail")[0];
            let detailNip = $("#detailNip")[0];
            let detailTempatLahir = $("#detailTempatLahir")[0];
            let detailTanggalLahir = $("#detailTanggalLahir")[0];
            let detailNoTelp = $("#detailNoTelp")[0];
            let detailJenisKelamin = $("#detailJenisKelamin")[0];
            let detailFotoProfil = $("#detailFotoProfil")[0];


            // Input form
            let formEdit = $("#formEdit")[0];
            let inputNama = $("#nama")[0];
            let inputEmail = $("#email")[0];
            let inputNip = $("#nip")[0];
            let inputTempatLahir = $("#tempatLahir")[0];
            let inputTanggalLahir = $("#tanggalLahir")[0];
            let inputNoTelp = $("#noTelp")[0];
            let inputJenisKelamin = $("#jenisKelamin")[0];

            let inputFotoProfil = $("#fotoProfil")[0];
            let ekstensiValid = ["jpg", "png", "jpeg"];
            let maxFileSize = 3 * 1024 * 1024; // 3 MB
            let fileFotoProfil = null;

            inputFotoProfil.addEventListener("change", () => {
                fileFotoProfil = inputFotoProfil.files[0];
                inputFotoProfil.nextElementSibling.innerText = fileFotoProfil.name;
            });



            btnEdit.addEventListener("click", () => {
                detailDataArea.classList.add("d-none");
                editDataArea.classList.remove("d-none");
            });


            btnKembali.addEventListener("click", () => {
                detailDataArea.classList.remove("d-none");
                editDataArea.classList.add("d-none");
            });

        });
    </script>

@endpush
@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Tambah Siswa')
@section('title-page', 'Tambah Siswa')


@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route("siswa") }}" class="btn btn-secondary">Kembali</a>
        <a href="#" class="btn btn-primary" id="simpan">Simpan</a>
    </div>
    <div class="card-body">
        <div class="row">
            <h4>Data Pribadi</h4>
        </div>

        <form action="{{ url("/siswa") }}" method="POST" id="formTambah">
            @csrf
            <div class="row">
                <div class="col-12 col-md-4">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama siswa">
                </div>
                <div class="col-12 col-md-4">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis" placeholder="Masukkan NIS siswa">
                </div>
                <div class="col-12 col-md-4">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN siswa">
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatLahir" placeholder="Masukkan tempat lahir siswa">
                </div>
                <div class="col-12 col-md-4">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggalLahir">
                </div>
                <div class="col-12 col-md-4">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelp">No Telp/WA</label>
                    <input type="text" class="form-control" name="noTelp" placeholder="Masukkan no telp/WA siswa">
                </div>
            </div>
    
            <div class="row mt-5">
                <h4>Data Ayah</h4>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="namaAyah">Nama Ayah</label>
                    <input type="text" class="form-control" name="namaAyah" placeholder="Masukkan nama ayah siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" name="pekerjaanAyah" placeholder="Masukkan pekerjaan ayah siswa">
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamatAyah">Alamat Ayah</label>
                    <input type="text" class="form-control" name="alamatAyah" placeholder="Masukkan alamat ayah siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelpAyah">No Telp/WA Ayah</label>
                    <input type="text" class="form-control" name="noTelpAyah" placeholder="Masukkan no telp/WA ayah siswa">
                </div>
            </div>
    
    
            <div class="row mt-5">
                <h4>Data Ibu</h4>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="namaIbu">Nama Ibu</label>
                    <input type="text" class="form-control" name="namaIbu" placeholder="Masukkan nama ibu siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" name="pekerjaanIbu" placeholder="Masukkan pekerjaan ibu siswa">
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamatIbu">Alamat Ibu</label>
                    <input type="text" class="form-control" name="alamatIbu" placeholder="Masukkan alamat ibu siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelpIbu">No Telp/WA Ibu</label>
                    <input type="text" class="form-control" name="noTelpIbu" placeholder="Masukkan no telp/WA ibu siswa">
                </div>
            </div>
    
    
            <div class="row mt-5">
                <h4>Data Wali</h4>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="namaWali">Nama Wali</label>
                    <input type="text" class="form-control" name="namaWali" placeholder="Masukkan nama wali siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="pekerjaanWali">Pekerjaan Wali</label>
                    <input type="text" class="form-control" name="pekerjaanWali" placeholder="Masukkan pekerjaan wali siswa">
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamatWali">Alamat Wali</label>
                    <input type="text" class="form-control" name="alamatWali" placeholder="Masukkan alamat wali siswa">
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelpWali">No Telp/WA Wali</label>
                    <input type="text" class="form-control" name="noTelpWali" placeholder="Masukkan no telp/WA wali siswa">
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@push('script')
    
    <script>
        $(document).ready(function() {

            let btnSimpan = $("#simpan")[0];
            let formTambah = $("#formTambah")[0];

            btnSimpan.addEventListener("click", () => {

                loadingAnimation.classList.remove("d-none");
                formTambah.submit();

            });

        });
    </script>

@endpush
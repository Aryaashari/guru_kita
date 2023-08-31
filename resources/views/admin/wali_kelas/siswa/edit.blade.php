@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Edit Siswa')
@section('title-page', 'Edit Siswa')


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

        <form action="{{ url("/siswa")."/".$student->id }}" method="POST" id="formEdit">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-12 col-md-4">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama') ?? $student->nama }}" placeholder="Masukkan nama siswa">
                    @error("nama")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control {{ $errors->has('nis') ? 'is-invalid' : '' }}" name="nis" value="{{ old('nis') ?? $student->nis }}" placeholder="Masukkan NIS siswa">
                    @error("nis")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control {{ $errors->has('nisn') ? 'is-invalid' : '' }}" name="nisn" value="{{ old('nisn') ?? $student->nisn }}" placeholder="Masukkan NISN siswa">
                    @error("nisn")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-4">
                    <label for="tempatLahir">Tempat Lahir</label>
                    <input type="text" class="form-control {{ $errors->has('tempatLahir') ? 'is-invalid' : '' }}" name="tempatLahir" value="{{ old('tempatLahir') ?? $student->tempat_lahir }}" placeholder="Masukkan tempat lahir siswa">
                    @error("tempatLahir")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label for="tanggalLahir">Tanggal Lahir</label>
                    <input type="date" class="form-control {{ $errors->has('tanggalLahir') ? 'is-invalid' : '' }}" value="{{ old('tanggalLahir') ?? $student->tanggal_lahir }}" name="tanggalLahir">
                    @error("tanggalLahir")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control {{ $errors->has('jenisKelamin') ? 'is-invalid' : '' }}" id="jenisKelamin" name="jenisKelamin">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="L" {{ (old('jenisKelamin') == 'L' || $student->jenis_kelamin == 'L') ? 'selected' : ''}}>Laki-Laki</option>
                        <option value="P" {{ (old('jenisKelamin') == 'P' || $student->jenis_kelamin == 'P') ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @error("jenisKelamin")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" value="{{ old('alamat') ?? $student->alamat }}" placeholder="Masukkan alamat siswa">
                    @error("alamat")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelp">No Telp/WA</label>
                    <input type="text" class="form-control {{ $errors->has('noTelp') ? 'is-invalid' : '' }}" name="noTelp" value="{{ old('noTelp') ?? $student->no_telp }}" placeholder="Masukkan no telp/WA siswa">
                    @error("noTelp")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="row mt-5">
                <h4>Data Ayah</h4>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="namaAyah">Nama Ayah</label>
                    <input type="text" class="form-control {{ $errors->has('namaAyah') ? 'is-invalid' : '' }}" name="namaAyah" value="{{ old('namaAyah') ?? $student->nama_ayah }}" placeholder="Masukkan nama ayah siswa">
                    @error("namaAyah")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="pekerjaanAyah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control {{ $errors->has('pekerjaanAyah') ? 'is-invalid' : '' }}" name="pekerjaanAyah" value="{{ old('pekerjaanAyah') ?? $student->pekerjaan_ayah }}" placeholder="Masukkan pekerjaan ayah siswa">
                    @error("pekerjaanAyah")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamatAyah">Alamat Ayah</label>
                    <input type="text" class="form-control {{ $errors->has('alamatAyah') ? 'is-invalid' : '' }}" name="alamatAyah" value="{{ old('alamatAyah') ?? $student->alamat_ayah }}" placeholder="Masukkan alamat ayah siswa">
                    @error("alamatAyah")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelpAyah">No Telp/WA Ayah</label>
                    <input type="text" class="form-control {{ $errors->has('noTelpAyah') ? 'is-invalid' : '' }}" name="noTelpAyah" value="{{ old('noTelpAyah') ?? $student->no_telp_ayah }}" placeholder="Masukkan no telp/WA ayah siswa">
                    @error("noTelpAyah")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
    
            <div class="row mt-5">
                <h4>Data Ibu</h4>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="namaIbu">Nama Ibu</label>
                    <input type="text" class="form-control {{ $errors->has('namaIbu') ? 'is-invalid' : '' }}" name="namaIbu" value="{{ old('namaIbu') ?? $student->nama_ibu }}" placeholder="Masukkan nama ibu siswa">
                    @error("namaIbu")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="pekerjaanIbu">Pekerjaan Ibu</label>
                    <input type="text" class="form-control {{ $errors->has('pekerjaanIbu') ? 'is-invalid' : '' }}" name="pekerjaanIbu" value="{{ old('pekerjaanIbu') ?? $student->pekerjaan_ibu }}" placeholder="Masukkan pekerjaan ibu siswa">
                    @error("pekerjaanIbu")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamatIbu">Alamat Ibu</label>
                    <input type="text" class="form-control {{ $errors->has('alamatIbu') ? 'is-invalid' : '' }}" name="alamatIbu" value="{{ old('alamatIbu') ?? $student->alamat_ibu }}" placeholder="Masukkan alamat ibu siswa">
                    @error("alamatIbu")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelpIbu">No Telp/WA Ibu</label>
                    <input type="text" class="form-control {{ $errors->has('noTelpIbu') ? 'is-invalid' : '' }}" name="noTelpIbu" value="{{ old('noTelpIbu') ?? $student->no_telp_ibu }}" placeholder="Masukkan no telp/WA ibu siswa">
                    @error("noTelpIbu")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
    
            <div class="row mt-5">
                <h4>Data Wali</h4>
            </div>
    
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="namaWali">Nama Wali</label>
                    <input type="text" class="form-control {{ $errors->has('namaWali') ? 'is-invalid' : '' }}" name="namaWali" value="{{ old('namaWali') ?? $student->nama_wali }}" placeholder="Masukkan nama wali siswa">
                    @error("namaWali")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="pekerjaanWali">Pekerjaan Wali</label>
                    <input type="text" class="form-control {{ $errors->has('pekerjaanWali') ? 'is-invalid' : '' }}" name="pekerjaanWali" value="{{ old('pekerjaanWali') ?? $student->pekerjaan_wali }}" placeholder="Masukkan pekerjaan wali siswa">
                    @error("pekerjaanWali")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    
            <div class="row mt-2">
                <div class="col-12 col-md-6">
                    <label for="alamatWali">Alamat Wali</label>
                    <input type="text" class="form-control {{ $errors->has('alamatWali') ? 'is-invalid' : '' }}" name="alamatWali" value="{{ old('alamatWali') ?? $student->alamat_wali }}" placeholder="Masukkan alamat wali siswa">
                    @error("alamatWali")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="noTelpWali">No Telp/WA Wali</label>
                    <input type="text" class="form-control {{ $errors->has('noTelpWali') ? 'is-invalid' : '' }}" name="noTelpWali" value="{{ old('noTelpWali') ?? $student->no_telp_wali }}" placeholder="Masukkan no telp/WA wali siswa">
                    @error("noTelpWali")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
            let formEdit = $("#formEdit")[0];

            btnSimpan.addEventListener("click", () => {

                loadingAnimation.classList.remove("d-none");
                formEdit.submit();

            });

        });
    </script>

@endpush
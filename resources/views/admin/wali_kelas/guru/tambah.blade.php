@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Tambah Guru Mapel')
@section('title-page', 'Tambah Guru Mapel')


@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route("guru_mapel") }}" class="btn btn-secondary">Kembali</a>
        <a href="#" class="btn btn-primary" id="simpan">Simpan</a>
    </div>
    <div class="card-body">

        <form action="{{ url("/guru/mapel") }}" method="POST" id="formTambah">
            @csrf
            <div class="row mb-4">
                <div class="col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama guru">
                    @error("nama")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP guru">
                    @error("nip")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <label for="noTelp">No Telp/WA</label>
                    <input type="text" class="form-control {{ $errors->has('noTelp') ? 'is-invalid' : '' }}" name="noTelp" value="{{ old('noTelp') }}" placeholder="Masukkan no telp/WA siswa">
                    @error("noTelp")
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-md-6">
                    <label for="jenisKelamin">Jenis Kelamin</label>
                    <select class="form-control {{ $errors->has('jenisKelamin') ? 'is-invalid' : '' }}" id="jenisKelamin" name="jenisKelamin">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="L" {{ old('jenisKelamin') == 'L' ? 'selected' : ''}}>Laki-Laki</option>
                        <option value="P" {{ old('jenisKelamin') == 'P' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @error("jenisKelamin")
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
            let formTambah = $("#formTambah")[0];

            btnSimpan.addEventListener("click", () => {

                loadingAnimation.classList.remove("d-none");
                formTambah.submit();

            });

        });
    </script>

@endpush
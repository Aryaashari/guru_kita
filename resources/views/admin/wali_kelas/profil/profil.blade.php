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
                <form method="POST" id="formEdit" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{ $profil->nama ?? '' }}" data-default="{{ $profil->nama ?? '' }}" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" value="{{ $profil->teacher->nip ?? '' }}" data-default="{{ $profil->teacher->nip ?? '' }}" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="tempatLahir">Tempat Lahir</label>
                                <input type="text" value="{{ $profil->teacher->tempat_lahir ?? '' }}" data-default="{{ $profil->teacher->tempat_lahir ?? '' }}" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Masukkan tempatLahir sekolah">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="tanggalLahir">Tanggal Lahir</label>
                                <input type="date" value="{{ $profil->teacher->tanggal_lahir ?? '' }}" data-default="{{ $profil->teacher->tanggal_lahir ?? '' }}" class="form-control" id="tanggalLahir" name="tanggalLahir" placeholder="Masukkan tanggal lahir">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenisKelamin" name="jenisKelamin" data-default="{{ $profil->teacher->jenis_kelamin }}">
                                    <option value="L" {{ $profil->teacher->jenis_kelamin == "L" ? "selected" : "" }}>Laki-Laki</option>
                                    <option value="P" {{ $profil->teacher->jenis_kelamin == "P" ? "selected" : "" }}>Perempuan</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="noTelp">No Telp/WA</label>
                                <input type="text" value="{{ $profil->teacher->no_telp ?? '' }}" data-default="{{ $profil->teacher->no_telp ?? '' }}" class="form-control" id="noTelp" name="noTelp" placeholder="Masukkan No Telp/WA">
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


            function clearValidationEffect() {
                inputNama.classList.remove("is-invalid");
                inputNama.nextElementSibling.classList.remove("d-block");
                inputNama.nextElementSibling.innerText = "";

                inputNip.classList.remove("is-invalid");
                inputNip.nextElementSibling.classList.remove("d-block");
                inputNip.nextElementSibling.innerText = "";

                inputNoTelp.classList.remove("is-invalid");
                inputNoTelp.nextElementSibling.classList.remove("d-block");
                inputNoTelp.nextElementSibling.innerText = "";
            
                inputTempatLahir.classList.remove("is-invalid");
                inputTempatLahir.nextElementSibling.classList.remove("d-block");
                inputTempatLahir.nextElementSibling.innerText = "";
            
                inputTanggalLahir.classList.remove("is-invalid");
                inputTanggalLahir.nextElementSibling.classList.remove("d-block");
                inputTanggalLahir.nextElementSibling.innerText = "";
            
                inputNoTelp.classList.remove("is-invalid");
                inputNoTelp.nextElementSibling.classList.remove("d-block");
                inputNoTelp.nextElementSibling.innerText = "";
            
                inputJenisKelamin.classList.remove("is-invalid");
                inputJenisKelamin.nextElementSibling.classList.remove("d-block");
                inputJenisKelamin.nextElementSibling.innerText = "";

                inputFotoProfil.classList.remove("is-invalid");
                inputFotoProfil.nextElementSibling.nextElementSibling.classList.remove("d-block");
                inputFotoProfil.nextElementSibling.nextElementSibling.innerText = "";
            }


            btnKembali.addEventListener("click", () => {

                clearValidationEffect();

                // reset default value
                inputNama.value = inputNama.dataset.default;
                inputNip.value = inputNip.dataset.default;
                inputNoTelp.value = inputNoTelp.dataset.default;
                inputTanggalLahir.value = inputTanggalLahir.dataset.default;
                inputTempatLahir.value = inputTempatLahir.dataset.default;
                inputJenisKelamin.value = inputJenisKelamin.dataset.default;

                inputFotoProfil.nextElementSibling.innerText = "Pilih file";
                inputFotoProfil.value = "";


                detailDataArea.classList.remove("d-none");
                editDataArea.classList.add("d-none");
            });


            btnSimpan.addEventListener("click", async () => {

                let errNama = "";
                let errNip = "";
                let errTempatLahir = "";
                let errTanggalLahir = "";
                let errNoTelp = "";
                let errFotoProfil = "";

                clearValidationEffect();

                // validasi nama
                if (inputNama.value.trim() == "") {
                    errNama = "Nama tidak boleh kosong";
                } else if(!/^[a-zA-Z\s]+$/.test(inputNama.value.trim())) { // validasi hanya boleh a-z. A-Z, dan spasi
                    errNama = "Nama hanya boleh karakter (a-z, A-Z, dan spasi)";
                }

                // Validasi NIP
                if (inputNip.value.trim() == "") {
                    errNip = "NIP tidak boleh kosong";
                } else if(!/^[0-9]+$/.test(inputNip.value.trim()) && inputNip.value.trim() != "") { // validasi hanya boleh 0-9
                    errNip = "NIP hanya boleh karakter (0-9)";
                }

                // Validasi tempat lahir
                if (inputTempatLahir.value.trim() == "") {
                    errNip = "Tempat lahir tidak boleh kosong";
                } else if(!/^[a-zA-Z\s]+$/.test(inputTempatLahir.value.trim())) { // validasi hanya boleh a-z. A-Z, dan spasi
                    errTempatLahir = "Tempat lahir hanya boleh karakter (a-z, A-Z, dan spasi)";
                }

                // Validasi tanggal lahir
                if (inputTanggalLahir.value.trim() == "") {
                    errTanggalLahir = "Tanggal lahir tidak boleh kosong";
                }

                // Validasi no telp
                if (inputNoTelp.value.trim() == "") {
                    errNoTelp = "No telp/WA tidak boleh kosong";
                } else if(!/^[0-9]+$/.test(inputNoTelp.value.trim())) { // validasi hanya boleh 0-9
                    errNoTelp = "No telp/WA hanya boleh karakter (0-9)";
                } else if (inputNoTelp.value.trim().length < 10 && inputNoTelp.value.trim().length > 12) {
                    errNoTelp = "Panjang No Telp/WA minimal 10 dan maksimal 12 angka";
                }

                // validasi foto profil
                fileFotoProfil = inputFotoProfil.files[0];
                if (fileFotoProfil != null) {
                    let fileExtension = fileFotoProfil.name.split(".").pop().toLowerCase();
                    if (!ekstensiValid.includes(fileExtension)) {
                        errFotoProfil = "File yang diupload hanya boleh berupa (JPG, PNG, JPEG)";
                        inputFotoProfil.value = "";
                    } else if (fileFotoProfil.size > maxFileSize) {
                        errFotoProfil = "Ukuran maksimal file 3MB";
                        inputFotoProfil.value = "";
                    }
                }



                if (errNama != "") {
                    inputNama.classList.add("is-invalid");
                    inputNama.nextElementSibling.classList.add("d-block");
                    inputNama.nextElementSibling.innerText = errNama;
                }

                if (errNip != "") {
                    inputNip.classList.add("is-invalid");
                    inputNip.nextElementSibling.classList.add("d-block");
                    inputNip.nextElementSibling.innerText = errNip;
                }

                if (errTempatLahir != "") {
                    inputTempatLahir.classList.add("is-invalid");
                    inputTempatLahir.nextElementSibling.classList.add("d-block");
                    inputTempatLahir.nextElementSibling.innerText = errTempatLahir;
                }

                if (errTanggalLahir != "") {
                    errTanggalLahir.classList.add("is-invalid");
                    errTanggalLahir.nextElementSibling.classList.add("d-block");
                    errTanggalLahir.nextElementSibling.innerText = errTanggalLahir;
                }

                if (errNoTelp != "") {
                    inputNoTelp.classList.add("is-invalid");
                    inputNoTelp.nextElementSibling.classList.add("d-block");
                    inputNoTelp.nextElementSibling.innerText = errNoTelp;
                }

                if (errFotoProfil != "") {
                    inputFotoProfil.classList.add("is-invalid");
                    inputFotoProfil.nextElementSibling.nextElementSibling.classList.add("d-block");
                    inputFotoProfil.nextElementSibling.nextElementSibling.innerText = errFotoProfil;
                }


                if (errNama == "" && errNip == "" && errTempatLahir == "" && errTanggalLahir == "" && errNoTelp == "" && errFotoProfil == "") {

                    loadingAnimation.classList.remove("d-none");

                    const formData = new FormData();
                    formData.append("nama", inputNama.value.trim());
                    formData.append("nip", inputNip.value.trim());
                    formData.append("tempatLahir", inputTempatLahir.value.trim());
                    formData.append("tanggalLahir", inputTanggalLahir.value.trim());
                    formData.append("noTelp", inputNoTelp.value.trim());
                    formData.append("jenisKelamin", inputJenisKelamin.value.trim());
                    formData.append("_method", "PUT");
 
                    if (inputFotoProfil.files[0] != null) {
                        formData.append("fotoProfil", inputFotoProfil.files[0]);
                    }


                    await fetch("/profil", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(result => {

                        if (result.success && result.code == 200) {

                            // update default value form
                            inputNama.dataset.default = result.data.nama;
                            inputNip.dataset.default = result.data.teacher.nip;
                            inputTempatLahir.dataset.default = result.data.teacher.tempat_lahir;
                            inputTanggalLahir.dataset.default = result.data.teacher.tanggal_lahir;
                            inputNoTelp.dataset.default = result.data.teacher.no_telp;
                            inputJenisKelamin.dataset.default = result.data.teacher.jenis_kelamin;
                            inputFotoProfil.dataset.default = "";
                            inputFotoProfil.nextElementSibling.innerText = "Pilih file";


                            // update detail area
                            detailNama.innerText = (result.data.nama == null) ? ": -" : ": "+ result.data.nama;
                            detailNip.innerText = (result.data.teacher.nip == null) ? ": -" : ": "+ result.data.teacher.nip;
                            detailTempatLahir.innerText = (result.data.teacher.tempat_lahir == null) ? ": -" : ": "+ result.data.teacher.tempat_lahir;
                            detailTanggalLahir.innerText = (result.data.teacher.tanggal_lahir == null) ? ": -" : ": "+ result.data.teacher.tanggal_lahir;
                            detailNoTelp.innerText = (result.data.teacher.no_telp == null) ? ": -" : ": "+ result.data.teacher.no_telp;
                            detailJenisKelamin.innerText = (result.data.teacher.jenis_kelamin == null) ? ": -" : ": "+ result.data.teacher.jenis_kelamin;
                            if (result.data.teacher.foto_profile == null) {
                                detailFotoProfil.innerText = ": Tidak foto";
                            } else {
                                detailFotoProfil.innerHTML = '<img src="' + '{{ asset("storage/") }}' + '/'+ result.data.teacher.foto_profile + '" width="100" alt="foto-profil">';
                            }

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Profil berhasil di edit'
                            });

                        } else if (result.code == 400) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Validasi gagal, silahkan cek kembali data yang anda isi!'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Sistem bermasalah, silahkan coba lagi nanti!'
                            });
                        }

                    })
                    .catch(e => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Sistem bermasalah, silahkan coba lagi nanti!'
                        });
                    });

                    loadingAnimation.classList.add("d-none");
                }

            });

        });
    </script>

@endpush
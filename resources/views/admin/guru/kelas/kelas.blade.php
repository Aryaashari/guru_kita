@extends('admin/layouts/app')

@section('title-web', 'Guru Kita | Kelas')

@section('title-page', 'Data Kelas')


@section('content')
    
    <div class="row">
        <div class="col-12" id="detailDataArea">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" id="btnEdit">Edit Data</button>
                </div>
              <div class="card-body" style="display: block;">
                <table>
                    <tr>
                        <td class="text-bold">Nama Kelas</td>
                        <td id="detailNamaKelas">: {{ $classroom->nama ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Jurusan Kelas</td>
                        <td id="detailJurusanKelas">: {{ $classroom->jurusan ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Nama Sekolah</td>
                        <td id="detailNamaSekolah">: {{ $classroom->nama_sekolah ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">NPSN</td>
                        <td id="detailNpsn">: {{ $classroom->npsn ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Akreditasi</td>
                        <td id="detailAkreditasi">: {{ $classroom->akreditasi ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Alamat Sekolah</td>
                        <td id="detailAlamat">: {{ $classroom->alamat ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Nama Kepala Sekolah</td>
                        <td id="detailNamaKepalaSekolah">: {{ $classroom->nama_kepala_sekolah ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">NIP Kepala Sekolah</td>
                        <td id="detailNipKepalaSekolah">: {{ $classroom->nip_kepala_sekolah ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Logo Sekolah</td>
                        <td id="detailLogoSekolah">
                            @if ($classroom->logo_sekolah == null)
                                : Tidak ada logo
                            @else
                                <img src="{{ asset('storage/'.$classroom->logo_sekolah) }}" width="100" alt="logo-sekolah">
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
                    <form action="{{ route('kelas.update') }}" method="POST" id="formEdit" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="namaKelas">Nama Kelas</label>
                                    <input type="text" value="{{ $classroom->nama ?? '' }}" data-default="{{ $classroom->nama ?? '' }}" class="form-control" id="namaKelas" name="namaKelas" placeholder="Masukkan nama kelas">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="jurusanKelas">Jurusan Kelas</label>
                                    <input type="text" value="{{ $classroom->jurusan ?? '' }}" data-default="{{ $classroom->jurusan ?? '' }}" class="form-control" id="jurusanKelas" name="jurusanKelas" placeholder="Masukkan jurusan kelas">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="namaSekolah">Nama Sekolah</label>
                                    <input type="text" value="{{ $classroom->nama_sekolah ?? '' }}" data-default="{{ $classroom->nama_sekolah ?? '' }}" class="form-control" id="namaSekolah" name="namaSekolah" placeholder="Masukkan nama sekolah">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="npsn">NPSN Sekolah</label>
                                    <input type="text" value="{{ $classroom->npsn ?? '' }}" data-default="{{ $classroom->npsn ?? '' }}" class="form-control" id="npsn" name="npsn" placeholder="Masukkan NPSN sekolah">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="akreditasiSekolah">Akreditasi Sekolah</label>
                                    <select class="form-control" id="akreditasiSekolah" name="akreditasiSekolah" data-default="{{ $classroom->akreditasi }}">
                                        <option value="">Pilih akreditasi</option>
                                        <option value="A" {{ $classroom->akreditasi == "A" ? "selected" : "" }}>A</option>
                                        <option value="B" {{ $classroom->akreditasi == "B" ? "selected" : "" }}>B</option>
                                        <option value="C" {{ $classroom->akreditasi == "C" ? "selected" : "" }}>C</option>
                                        <option value="NO" {{ $classroom->akreditasi == "NO" ? "selected" : "" }}>Belum diketahui</option>
                                    </select>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="namaKepalaSekolah">Nama Kepala Sekolah</label>
                                    <input type="text" value="{{ $classroom->nama_kepala_sekolah ?? '' }}" data-default="{{ $classroom->nama_kepala_sekolah ?? '' }}" class="form-control" id="namaKepalaSekolah" name="namaKepalaSekolah" placeholder="Masukkan nama kepala sekolah">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="nipKepalaSekolah">NIP Kepala Sekolah</label>
                                    <input type="text" value="{{ $classroom->nip_kepala_sekolah ?? '' }}" data-default="{{ $classroom->nip_kepala_sekolah ?? '' }}" class="form-control" id="nipKepalaSekolah" name="nipKepalaSekolah" placeholder="Masukkan nip kepala sekolah">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label for="logoSekolah">Logo Sekolah</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logoSekolah" id="logoSekolah">
                                        <label class="custom-file-label" for="logoSekolah">Pilih file</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Alamat Sekolah</label>
                                    <textarea class="form-control" name="alamatSekolah" data-default="{{ $classroom->nip_kepala_sekolah ?? '' }}" id="alamatSekolah" placeholder="Masukkan alamat sekolah">{{ $classroom->alamat ?? '' }}</textarea>
                                    <div class="invalid-feedback"></div>
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
            let detailNamaKelas = $("#detailNamaKelas")[0];
            let detailJurusanKelas = $("#detailJurusanKelas")[0];
            let detailNamaSekolah = $("#detailNamaSekolah")[0];
            let detailNpsn = $("#detailNpsn")[0];
            let detailAlamat = $("#detailAlamat")[0];
            let detailAkreditasi = $("#detailAkreditasi")[0];
            let detailNamaKepalaSekolah = $("#detailNamaKepalaSekolah")[0];
            let detailNipKepalaSekolah = $("#detailNipKepalaSekolah")[0];
            let detailLogoSekolah = $("#detailLogoSekolah")[0];


            // Input form
            let formEdit = $("#formEdit")[0];
            let inputNamaKelas = $("#namaKelas")[0];
            let inputJurusanKelas = $("#jurusanKelas")[0];
            let inputNamaSekolah = $("#namaSekolah")[0];
            let inputNpsnSekolah = $("#npsn")[0];
            let inputAkreditasiSekolah = $("#akreditasiSekolah")[0];
            let inputAlamatSekolah = $("#alamatSekolah")[0];
            let inputNamaKepalaSekolah = $("#namaKepalaSekolah")[0];
            let inputNipKepalaSekolah = $("#nipKepalaSekolah")[0];

            let inputLogoSekolah = $("#logoSekolah")[0];
            let ekstensiValid = ["jpg", "png", "jpeg"];
            let maxFileSize = 3 * 1024 * 1024; // 3 MB
            let fileLogo = null;

            inputLogoSekolah.addEventListener("change", () => {
                fileLogo = inputLogoSekolah.files[0];
                inputLogoSekolah.nextElementSibling.innerText = fileLogo.name;
            });

            btnEdit.addEventListener("click", () => {
                detailDataArea.classList.add("d-none");
                editDataArea.classList.remove("d-none");

            });


            function clearValidasiEffect() {
                inputNamaKelas.classList.remove("is-invalid");
                inputNamaKelas.nextElementSibling.classList.remove("d-block");
                inputNamaKelas.nextElementSibling.innerText = "";

                inputJurusanKelas.classList.remove("is-invalid");
                inputJurusanKelas.nextElementSibling.classList.remove("d-block");
                inputJurusanKelas.nextElementSibling.innerText = "";
            
                inputNamaSekolah.classList.remove("is-invalid");
                inputNamaSekolah.nextElementSibling.classList.remove("d-block");
                inputNamaSekolah.nextElementSibling.innerText = "";
            
                inputNpsnSekolah.classList.remove("is-invalid");
                inputNpsnSekolah.nextElementSibling.classList.remove("d-block");
                inputNpsnSekolah.nextElementSibling.innerText = "";
            
                inputAkreditasiSekolah.classList.remove("is-invalid");
                inputAkreditasiSekolah.nextElementSibling.classList.remove("d-block");
                inputAkreditasiSekolah.nextElementSibling.innerText = "";
            
                inputNamaKepalaSekolah.classList.remove("is-invalid");
                inputNamaKepalaSekolah.nextElementSibling.classList.remove("d-block");
                inputNamaKepalaSekolah.nextElementSibling.innerText = "";
            
                inputNipKepalaSekolah.classList.remove("is-invalid");
                inputNipKepalaSekolah.nextElementSibling.classList.remove("d-block");
                inputNipKepalaSekolah.nextElementSibling.innerText = "";
            
                inputLogoSekolah.classList.remove("is-invalid");
                inputLogoSekolah.nextElementSibling.nextElementSibling.classList.remove("d-block");
                inputLogoSekolah.nextElementSibling.nextElementSibling.innerText = "";
            }

            btnKembali.addEventListener("click", () => {
                if (inputNamaKelas.dataset.default == "" || inputJurusanKelas.dataset.default == "" || inputNamaSekolah.dataset.default == "" || inputNpsnSekolah.dataset.default == "" || inputAkreditasiSekolah.dataset.default == "") {
                    Swal.fire({
                        title: 'Anda yakin?',
                        icon: 'warning',
                        text: "Anda belum melengkapi data kelas dan sekolah",
                        showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            'Lengkapi Data',
                        cancelButtonText:
                            'Nanti Saja',
                    })
                    .then(result => {
                        if (!result.isConfirmed) {
                            detailDataArea.classList.remove("d-none");
                            editDataArea.classList.add("d-none");
                        }
                    })
                } else {
                    detailDataArea.classList.remove("d-none");
                    editDataArea.classList.add("d-none");
                }

                // clear validasi effect
                clearValidasiEffect();
                
                // reset input form ke defult value
                inputNamaKelas.value = inputNamaKelas.dataset.default;
                inputJurusanKelas.value = inputJurusanKelas.dataset.default;
                inputNpsnSekolah.value = inputNpsnSekolah.dataset.default;
                inputNamaSekolah.value = inputNamaSekolah.dataset.default;
                inputAkreditasiSekolah.value = inputAkreditasiSekolah.dataset.default;
                inputNamaKepalaSekolah.value = inputNamaKepalaSekolah.dataset.default;
                inputNipKepalaSekolah.value = inputNipKepalaSekolah.dataset.default;
                inputAlamatSekolah.value = inputAlamatSekolah.dataset.default;
                inputLogoSekolah.nextElementSibling.innerText = "Pilih file";
                inputLogoSekolah.value = '';
            });
            
            
            btnSimpan.addEventListener("click", async () => {

                let errNamaKelas = "";
                let errJurusanKelas = "";
                let errNamaSekolah = "";
                let errNpsnSekolah = "";
                let errAkreditasiSekolah = "";
                let errNamaKepalaSekolah = "";
                let errNipKepalaSekolah = "";
                let errLogoSekolah = "";

                
                // clear validasi effect
                clearValidasiEffect();
                
                // validasi nama kelas
                if (inputNamaKelas.value.trim() == "") {
                    errNamaKelas = "Nama kelas tidak boleh kosong";
                } else if(!/^[a-zA-Z0-9\s\-]+$/.test(inputNamaKelas.value.trim())) { // validasi hanya boleh 0-9, a-z. A-Z, spasi, strip
                    errNamaKelas = "Nama kelas hanya boleh karakter (0-9, a-z, A-Z, spasi, dan strip)";
                }


                // validasi jurusan kelas
                if (inputJurusanKelas.value.trim() == "") {
                    errJurusanKelas = "Jurusan kelas tidak boleh kosong";
                } else if(!/^[a-zA-Z\s]+$/.test(inputJurusanKelas.value.trim())) { // validasi hanya boleh a-z. A-Z, spasi
                    errJurusanKelas = "Jurusan kelas hanya boleh karakter (a-z, A-Z, dan spasi)";
                }


                // validasi nama sekolah
                if (inputNamaSekolah.value.trim() == "") {
                    errNamaSekolah = "Nama sekolah tidak boleh kosong";
                } else if(!/^[a-zA-Z0-9\s]+$/.test(inputNamaSekolah.value.trim())) { // validasi hanya boleh 0-9, a-z. A-Z, spasi
                    errNamaSekolah = "Nama sekolah hanya boleh karakter (0-9, a-z, A-Z, dan spasi)";
                }


                // validasi npsn sekolah
                if (inputNpsnSekolah.value.trim() == "") {
                    errNpsnSekolah = "NPSN sekolah tidak boleh kosong";
                } else if(!/^[0-9]+$/.test(inputNpsnSekolah.value.trim())) { // validasi hanya boleh 0-9
                    errNpsnSekolah = "NPSN sekolah hanya boleh karakter (0-9)";
                }

                // validasi akreditasi sekolah
                if (inputAkreditasiSekolah.value.trim() == "") {
                    errAkreditasiSekolah = "Akreditasi sekolah tidak boleh kosong";
                }
                

                // validasi nama kepala sekolah
                if (!/^[a-zA-Z\s]+$/.test(inputNamaKepalaSekolah.value.trim()) && inputNamaKepalaSekolah.value.trim() != "") { // validasi hanya boleh a-z. A-Z, spasi
                    errNamaKepalaSekolah = "Nama kepala sekolah hanya boleh karakter (a-z, A-Z, dan spasi)";
                }

                // validasi nip kepala sekolah
                if(!/^[0-9]+$/.test(inputNipKepalaSekolah.value.trim()) && inputNipKepalaSekolah.value.trim() != "") { // validasi hanya boleh 0-9
                    errNipKepalaSekolah = "NIP kepala sekolah hanya boleh karakter (0-9)";
                }

                // validasi logo sekolah
                fileLogo = inputLogoSekolah.files[0];
                if (fileLogo != null) {
                    let fileExtension = fileLogo.name.split(".").pop().toLowerCase();
                    if (!ekstensiValid.includes(fileExtension)) {
                        errLogoSekolah = "File yang diupload hanya boleh berupa (JPG, PNG, JPEG)";
                        inputLogoSekolah.value = "";
                    } else if (fileLogo.size > maxFileSize) {
                        errLogoSekolah = "Ukuran maksimal file 3MB";
                        inputLogoSekolah.value = "";
                    }
                }


                if (errNamaKelas != "") {
                    inputNamaKelas.classList.add("is-invalid");
                    inputNamaKelas.nextElementSibling.classList.add("d-block");
                    inputNamaKelas.nextElementSibling.innerText = errNamaKelas;
                }

                if (errJurusanKelas != "") {
                    inputJurusanKelas.classList.add("is-invalid");
                    inputJurusanKelas.nextElementSibling.classList.add("d-block");
                    inputJurusanKelas.nextElementSibling.innerText = errJurusanKelas;
                }

                if (errNamaSekolah != "") {
                    inputNamaSekolah.classList.add("is-invalid");
                    inputNamaSekolah.nextElementSibling.classList.add("d-block");
                    inputNamaSekolah.nextElementSibling.innerText = errNamaSekolah;
                }

                if (errNpsnSekolah != "") {
                    inputNpsnSekolah.classList.add("is-invalid");
                    inputNpsnSekolah.nextElementSibling.classList.add("d-block");
                    inputNpsnSekolah.nextElementSibling.innerText = errNpsnSekolah;
                }

                if (errAkreditasiSekolah != "") {
                    inputAkreditasiSekolah.classList.add("is-invalid");
                    inputAkreditasiSekolah.nextElementSibling.classList.add("d-block");
                    inputAkreditasiSekolah.nextElementSibling.innerText = errAkreditasiSekolah;
                }

                if (errNamaKepalaSekolah != "") {
                    inputNamaKepalaSekolah.classList.add("is-invalid");
                    inputNamaKepalaSekolah.nextElementSibling.classList.add("d-block");
                    inputNamaKepalaSekolah.nextElementSibling.innerText = errNamaKepalaSekolah;
                }

                if (errNipKepalaSekolah != "") {
                    inputNipKepalaSekolah.classList.add("is-invalid");
                    inputNipKepalaSekolah.nextElementSibling.classList.add("d-block");
                    inputNipKepalaSekolah.nextElementSibling.innerText = errNipKepalaSekolah;
                }

                if (errLogoSekolah != "") {
                    inputLogoSekolah.classList.add("is-invalid");
                    inputLogoSekolah.nextElementSibling.nextElementSibling.classList.add("d-block");
                    inputLogoSekolah.nextElementSibling.nextElementSibling.innerText = errLogoSekolah;
                }

                if (errNamaKelas == "" && errJurusanKelas == "" && errNamaSekolah == "" && errNpsnSekolah == "" && errLogoSekolah == "" && errNpsnSekolah == "" && errAkreditasiSekolah == "" && errNamaKepalaSekolah == "" & errNipKepalaSekolah == "") {

                    loadingAnimation.classList.remove("d-none");

                    const formData = new FormData();
                    formData.append("namaKelas", inputNamaKelas.value.trim());
                    formData.append("jurusanKelas", inputJurusanKelas.value.trim());
                    formData.append("namaSekolah", inputNamaSekolah.value.trim());
                    formData.append("npsn", inputNpsnSekolah.value.trim());
                    formData.append("akreditasiSekolah", inputAkreditasiSekolah.value.trim());
                    formData.append("alamatSekolah", inputAlamatSekolah.value.trim());
                    formData.append("namaKepalaSekolah", inputNamaKepalaSekolah.value.trim());
                    formData.append("nipKepalaSekolah", inputNipKepalaSekolah.value.trim());
                    formData.append("logoSekolah", inputLogoSekolah.files[0]);
                    formData.append("_method", "PUT");

                    await fetch("/kelas", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.success && result.code == 200) {

                            // update default value form
                            inputNamaKelas.dataset.default = result.data.nama;
                            inputJurusanKelas.dataset.default = result.data.jurusan;
                            inputNamaSekolah.dataset.default = result.data.nama_sekolah;
                            inputNpsnSekolah.dataset.default = result.data.npsn;
                            inputAkreditasiSekolah.dataset.default = result.data.akreditasi;
                            inputNamaKepalaSekolah.dataset.default = result.data.nama_kepala_sekolah;
                            inputNipKepalaSekolah.dataset.default = result.data.nip_kepala_sekolah;
                            inputAlamatSekolah.dataset.default = result.data.alamat;

                            // update detail area
                            detailNamaKelas.innerText = (result.data.nama == null) ? ": -" : ": "+ result.data.nama;
                            detailJurusanKelas.innerText = (result.data.jurusan == null) ? ": -" : ": "+ result.data.jurusan;
                            detailNamaSekolah.innerText = (result.data.nama_sekolah == null) ? ": -" : ": "+ result.data.nama_sekolah;
                            detailAkreditasi.innerText = (result.data.akreditasi == null) ? ": -" : ": "+ result.data.akreditasi;
                            detailNpsn.innerText = (result.data.npsn == null) ? ": -" : ": "+ result.data.npsn;
                            detailAlamat.innerText = (result.data.alamat == null) ? ": -" : ": "+ result.data.alamat;
                            detailNamaKepalaSekolah.innerText = (result.data.nama_kepala_sekolah == null) ? ": -" : ": "+ result.data.nama_kepala_sekolah;
                            detailNipKepalaSekolah.innerText = (result.data.nip_kepala_sekolah == null) ? ": -" : ": "+ result.data.nip_kepala_sekolah;
                            if (result.data.logo_sekolah == null) {
                                detailLogoSekolah.innerText = ": Tidak ada logo";
                            } else {
                                detailLogoSekolah.innerHTML = '<img src="' + '{{ asset("storage/") }}' + '/'+ result.data.logo_sekolah + '" width="100" alt="logo-sekolah">';
                            }

                            // clear innert text logo sekolah
                            inputLogoSekolah.nextElementSibling.innerText = "Pilih file";
                            inputLogoSekolah.value = '';

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Data berhasil di edit'
                            });

                        } else if (result.code == 400) {
                            Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Validasi gagal, silahkan cek kembali data yang anda isi!'
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

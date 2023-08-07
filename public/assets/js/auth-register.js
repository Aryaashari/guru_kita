$(document).ready(function () {
    
    let formRegister1 = $('#register1')[0];
    let formRegister2 = $('#register2')[0];

    // Register 1
    let inputNama = $('input[name="nama"]')[0];
    let inputEmail = $('input[name="email"]')[0];
    let inputPassword = $('input[name="password"]')[0];
    let inputConfirmPassword = $('input[name="password_confirmation"]')[0];
    let btnLanjutkan = $('button[name="btn-lanjutkan"')[0];
    let loading = $('.spinner-border')[0];


    btnLanjutkan.addEventListener("click", async () => {

        let errNama = "";
        let errEmail = "";
        let errPassword = "";
        let errConfirmPassword = "";

        
        inputNama.classList.remove("is-invalid");
        inputEmail.classList.remove("is-invalid");
        inputPassword.classList.remove("is-invalid");
        inputConfirmPassword.classList.remove("is-invalid");

        inputNama.nextElementSibling.nextElementSibling.classList.remove("d-block");
        inputNama.nextElementSibling.nextElementSibling.innerText = errNama;

        inputEmail.nextElementSibling.nextElementSibling.classList.remove("d-block");
        inputEmail.nextElementSibling.nextElementSibling.innerText = errEmail;

        inputPassword.nextElementSibling.nextElementSibling.classList.remove("d-block");
        inputPassword.nextElementSibling.nextElementSibling.innerText = errPassword;

        inputConfirmPassword.nextElementSibling.nextElementSibling.classList.remove("d-block");
        inputConfirmPassword.nextElementSibling.nextElementSibling.innerText = errConfirmPassword;

        if (inputNama.value.trim() == "") {
            errNama = "Anda belum memasukkan nama lengkap!";
        } else if (!/^[a-zA-Z\s]+$/.test(inputNama.value.trim())) { // pengecekan kondisi hanya boleh karakter a-z, A-Z, dan spasi
            errNama = "Hanya boleh memasukkan karakter (a-z, A-Z, dan spasi)!";
        } else if (inputNama.value.trim().length < 3 && inputNama.value.trim().length > 30) {
            errNama = "Panjang nama minimal 3 & maksimal 30 karakter!";
        }

        if (inputEmail.value.trim() == "") {
            errEmail = "Anda belum memasukkan email!";
        } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(inputEmail.value.trim())) { // pengecekan kondisi hanya boleh format email
            errEmail = "Format email tidak sesuai!";
        }

        btnLanjutkan.classList.add("disabled");
        loading.classList.remove("d-none");
        if (errEmail == "") {
            const response = await fetch(`/check-email?email=${encodeURIComponent(inputEmail.value.trim())}`)
                                    .catch(e => {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Sistem Bermasalah!',
                                            text: 'Silahkan coba lagi beberapa saat!'
                                        });
                                    });
            const data = await response.json();
    
            if (data.isRegistered) {
                errEmail = "Email telah terdaftar!";
            }
        }


        if (inputPassword.value.trim() == "") {
            errPassword = "Anda belum memasukkan kata sandi!";
        } else if (inputPassword.value.trim().length < 8) {
            errPassword = "Minimal kata sandi 8 karakter!";
        }

        if (inputConfirmPassword.value.trim() != inputPassword.value.trim() && errPassword == "") {
            errConfirmPassword = "Tidak sesuai dengan kata sandi!";
        }

        if (errNama != "") {
            inputNama.classList.add("is-invalid");
            inputNama.nextElementSibling.nextElementSibling.classList.add("d-block");
            inputNama.nextElementSibling.nextElementSibling.innerText = errNama;
        } else {

        }

        if (errEmail != "") {
            inputEmail.classList.add("is-invalid");
            inputEmail.nextElementSibling.nextElementSibling.classList.add("d-block");
            inputEmail.nextElementSibling.nextElementSibling.innerText = errEmail;
            
        }

        if (errPassword != "") {
            inputPassword.classList.add("is-invalid");
            inputPassword.nextElementSibling.nextElementSibling.classList.add("d-block");
            inputPassword.nextElementSibling.nextElementSibling.innerText = errPassword;
        }

        if (errConfirmPassword != "") {
            inputConfirmPassword.classList.add("is-invalid");
            inputConfirmPassword.nextElementSibling.nextElementSibling.classList.add("d-block");
            inputConfirmPassword.nextElementSibling.nextElementSibling.innerText = errConfirmPassword;
        }


        if (errNama == "" && errEmail == "" && errPassword == "" && errConfirmPassword == "") {
            formRegister1.classList.add("d-none");
            formRegister2.classList.remove("d-none");
        }

        btnLanjutkan.classList.remove("disabled");
        loading.classList.add("d-none");

    });


    // Register 2
    let inputNip = $('input[name="nip"]')[0];
    let inputTempatLahir = $('input[name="tempatLahir"]')[0];
    let inputTglLahir = $('input[name="tanggalLahir"]')[0];
    let inputNoTelp = $('input[name="noTelp"]')[0];
    let inputJenisKelamin = $('select[name="jenisKelamin"]')[0];
    let btnDaftar = $('button[name="btn-daftar"')[0];
    let btnKembali = $('button[name="btn-kembali"')[0];
    let loading2 = $('.spinner-border')[1];

    btnKembali.addEventListener("click", () => {
        formRegister2.classList.add("d-none");
        formRegister1.classList.remove("d-none");
    });

    btnDaftar.addEventListener("click", async () => {

        let errNip = "";
        let errTempatLahir = "";
        let errTglLahir = "";
        let errNoTelp = "";
        let errJenisKelamin = "";


        inputNip.classList.remove("is-invalid");
        inputTempatLahir.classList.remove("is-invalid");
        inputTglLahir.classList.remove("is-invalid");
        inputNoTelp.classList.remove("is-invalid");
        inputJenisKelamin.classList.remove("is-invalid");

        inputNip.nextElementSibling.classList.remove("d-block");
        inputNip.nextElementSibling.innerText = "";

        inputTempatLahir.nextElementSibling.classList.remove("d-block");
        inputTempatLahir.nextElementSibling.innerText = "";

        inputTglLahir.nextElementSibling.classList.remove("d-block");
        inputTglLahir.nextElementSibling.innerText = "";

        inputNoTelp.nextElementSibling.classList.remove("d-block");
        inputNoTelp.nextElementSibling.innerText = "";

        inputJenisKelamin.nextElementSibling.classList.remove("d-block");
        inputJenisKelamin.nextElementSibling.innerText = "";


        if (inputNip.value.trim() == "") {
            errNip = "Anda belum memasukkan NIP!";
        } else if (!/^\d+$/.test(inputNip.value.trim())) { // validasi hanya angka
            errNip = "NIP hanya boleh diisi dengan angka!";
        }

        if (inputTempatLahir.value.trim() == "") {
            errTempatLahir = "Anda belum memasukkan tempat lahir!";
        }

        if (inputTglLahir.value.trim() == "") {
            errTglLahir = "Anda belum memasukkan tanggal lahir!";
        }

        if (inputNoTelp.value.trim() == "") {
            errNoTelp = "Anda belum memasukkan no telephone/WA!";
        } else if (!/^\d+$/.test(inputNoTelp.value.trim())) { // validasi hanya angka
            errNoTelp = "No Telp Hanya boleh diisi dengan angka!";
        } else if (inputNoTelp.value.trim().length < 10 || inputNoTelp.value.trim().length > 13) {
            errNoTelp = "Panjang no telp minimal 10 dan maksimal 13 karakter!";
        }

        if (inputJenisKelamin.value.trim() == "") {
            errJenisKelamin = "Anda belum memilih jenis kelamin!";
        }



        if (errNip != "") {
            inputNip.nextElementSibling.classList.add("d-block");
            inputNip.nextElementSibling.innerText = errNip;
        }

        if (errTempatLahir != "") {
            inputTempatLahir.nextElementSibling.classList.add("d-block");
            inputTempatLahir.nextElementSibling.innerText = errTempatLahir;
        }

        if (errTglLahir != "") {
            inputTglLahir.nextElementSibling.classList.add("d-block");
            inputTglLahir.nextElementSibling.innerText = errTglLahir;
        }

        if (errNoTelp != "") {
            inputNoTelp.nextElementSibling.classList.add("d-block");
            inputNoTelp.nextElementSibling.innerText = errNoTelp;
        }

        if (errJenisKelamin != "") {
            inputJenisKelamin.nextElementSibling.classList.add("d-block");
            inputJenisKelamin.nextElementSibling.innerText = errJenisKelamin;
        }


        if (errNip == "" && errTempatLahir == "" && errTglLahir == "" && errNoTelp == "" && errJenisKelamin == "") {
            const formData = {
                nama: inputNama.value.trim(),
                email: inputEmail.value.trim(),
                password: inputPassword.value.trim(),
                password_confirmation: inputConfirmPassword.value.trim(),
                nip: inputNip.value.trim(),
                tempatLahir: inputTempatLahir.value.trim(),
                tanggalLahir: inputTglLahir.value.trim(),
                noTelp: inputNoTelp.value.trim(),
                jenisKelamin: inputJenisKelamin.value.trim(),
            }

            btnDaftar.classList.add("disabled");
            loading2.classList.remove("d-none");
            await fetch("/register", {
                method: "POST",
                body: JSON.stringify(formData),
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Selamat, anda berhasil mendaftarkan akun'
                    }).then(() => {
                        window.location.href = "/login";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Maaf, anda gagal mendaftarkan akun, silahkan coba lagi'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Sistem Error!',
                    text: 'Silahkan coba lagi beberapa saat kemudian'
                });
            });

            btnDaftar.classList.remove("disabled");
            loading2.classList.add("d-none");
        }

    });

});
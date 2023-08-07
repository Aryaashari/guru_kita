$(document).ready(function() {


    let inputEmail = $('input[name="email"]')[0];
    let inputPassword = $('input[name="password"]')[0];
    let btnMasuk = $('#btnMasuk')[0];
    let loading = $('.spinner-border')[0];

    btnMasuk.addEventListener("click", async () => {

        let errEmail = "";
        let errPassword = "";


        // hilangkan validasi sebelumnya
        inputEmail.classList.remove("is-invalid");
        inputEmail.nextElementSibling.nextElementSibling.classList.remove("d-block");
        inputEmail.nextElementSibling.nextElementSibling.classList.innerText = errEmail;

        inputPassword.classList.remove("is-invalid");
        inputPassword.nextElementSibling.nextElementSibling.classList.remove("d-block");
        inputPassword.nextElementSibling.nextElementSibling.classList.innerText = errPassword;


        // validasi email
        if (inputEmail.value.trim() == "") {
            errEmail = "Anda belum memasukkan email!";
        } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(inputEmail.value.trim())) { // pengecekan kondisi hanya boleh format email
            errEmail = "Format email tidak sesuai!";
        }


        // validasi password
        if (inputPassword.value.trim() == "") {
            errPassword = "Anda belum memasukkan password!";
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


        if (errEmail == "" && errPassword == "") {

            const formData = {
                email: inputEmail.value.trim(),
                password: inputPassword.value.trim()
            };

            btnMasuk.classList.add("disabled");
            loading.classList.remove("d-none");
            await fetch("/login", {
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
                        text: 'Selamat, anda berhasil login'
                    })
                    .then(() => {
                        window.location.href = "/dasbor";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: "Username atau Password salah!"
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Sistem Error!',
                    text: 'Silahkan coba lagi beberapa saat kemudian'
                });
            })

        }

        btnMasuk.classList.remove("disabled");
        loading.classList.add("d-none");

    });


});
@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Guru Mapel')
@section('title-page', 'Guru Mapel')

@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{  asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{  asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{  asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')



<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <a class="btn btn-primary" href="{{ route("siswa.tambah.get") }}">Tambah data</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dtr-inline display" id="tableSiswa">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>No Telp</th>
                            <th>Jenis Kelamin</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjectTeachers as $subjectTeacher)
                            <tr>
                                <td>{{ $subjectTeacher->nama }}</td>
                                <td>{{ $subjectTeacher->nip }}</td>
                                <td>{{ $subjectTeacher->no_telp }}</td>
                                <td>{{ $subjectTeacher->jenis_kelamin }}</td>
                                <td>
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                          Aksi
                                        </button>
                                        <div class="dropdown-menu" style="position: absolute; transform: translate3d(0px, -164px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top-start">
                                          <a class="dropdown-item" href="{{ url('/siswa/edit')."/".$subjectTeacher->id }}">Edit data</a>
                                          <button class="dropdown-item btnHapus" data-id="{{ $subjectTeacher->id }}">Hapus data</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                    
            </div>
        </div>

    </div>
</div>


@endsection

@push('script')
    {{-- Data table --}}
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script> --}}

    <!-- DataTables  & Plugins -->
    <script src="{{  asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{  asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{  asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{  asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{  asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{  asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            // let tableSiswa = $("#tableSiswa")[0];

            // let tableSiswa = new DataTable("#tableSiswa");

            $("#tableSiswa").DataTable({
                paging: true,
                responsive: true,
                language: {
                    processing: "Loading...",
                    paginate: {
                        previous: "Kembali",
                        next: "Selanjutnya"
                    },
                    searchPlaceholder: "Cari guru",
                    emptyTable: "Data kosong",
                    zeroRecords: "Data tidak ditemukan",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "",
                },

            });


            // let btnHapus = $("#btnHapus");
            let formDelete = $("#formDelete")[0];
            
            $(".btnHapus").on("click", function() {
                let id = $(this).data("id");
                let row = $(this).closest("tr");

                Swal.fire({
                    icon: 'warning',
                    title: 'Anda yakin?',
                    text: 'Yakin ingin menghapus data?',
                    showDenyButton: true,
                    confirmButtonText: 'Hapus',
                    denyButtonText: 'Batal'
                })
                .then(async (result) => {
                    loadingAnimation.classList.remove("d-none");
                    if (result.isConfirmed) {
                        let formData = new FormData();
                        formData.append("_method", "DELETE");
                        await fetch("/siswa/"+id, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                // Delete data from table
                                row.remove();

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Berhasil hapus data!',
                                    showConfirmButton: false,
                                    timer: 1000
                                })
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Sistem sedang bermasalah, silahkan coba lagi nanti!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        });
                    }
                    loadingAnimation.classList.add("d-none");
                })

            });

        });
    </script>

    @if (session("message"))
    <script>
        let msg = `{{ session("message") }}`

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil!',
            text: msg,
            showConfirmButton: false,
            timer: 1000
        });
    </script>
    @endif

@endpush
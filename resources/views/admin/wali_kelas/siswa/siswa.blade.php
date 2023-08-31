@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Siswa')
@section('title-page', 'Siswa')

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
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->nama }}</td>
                                <td>{{ $student->nis }}</td>
                                <td>{{ $student->nisn }}</td>
                                <td>{{ $student->jenis_kelamin }}</td>
                                <td>{{ $student->tempat_lahir }}</td>
                                <td>{{ $student->tanggal_lahir }}</td>
                                <td>
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                          Aksi
                                        </button>
                                        <div class="dropdown-menu" style="position: absolute; transform: translate3d(0px, -164px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top-start">
                                          <a class="dropdown-item" href="#">Lihat detail</a>
                                          <a class="dropdown-item" href="/siswa/edit/{{ $student->id }}">Edit data</a>
                                          <a class="dropdown-item" href="#">Hapus data</a>
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
                    searchPlaceholder: "Cari siswa",
                    emptyTable: "Data kosong",
                    zeroRecords: "Data tidak ditemukan",
                    lengthMenu: "Tampilkan _MENU_ data",
                    info: "",
                },

            });


            

        });
    </script>

    @if (session("message"))
    <script>
        let msg = `{{ session("message") }}`

        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: msg
        });
    </script>
    @endif

@endpush
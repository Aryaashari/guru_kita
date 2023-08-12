@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Siswa')
@section('title-page', 'Siswa')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
    
    <div class="row">
        <div class="col-12">
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
            </table>
        </div>
    </div>

@endsection

@push('script')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            // let tableSiswa = $("#tableSiswa")[0];

            // let tableSiswa = new DataTable("#tableSiswa");

            $("#tableSiswa").DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('siswa.getData') }}',
                columns: [
                    { data: 'nama', name: 'nama' },
                    { data: 'nis', name: 'nis' },
                    { data: 'nisn', name: 'nisn' },
                    { data: 'jenis_kelamin', name: 'jenis_kelamin' },
                    { data: 'tempat_lahir', name: 'tempat_lahir' },
                    { data: 'tanggal_lahir', name: 'tanggal_lahir' },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `<div class="input-group-prepend">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Lihat detail</a>
                                        <a class="dropdown-item" href="#">Edit data</a>
                                        <a class="dropdown-item" href="#">Hapus data</a>
                                    </div>`
                        }
                    }
                ],
                language: {
                    processing: "Loading...",
                    paginate: {
                        previous: "Kembali",
                        next: "Selanjutnya"
                    },
                    searchPlaceholder: "Cari siswa",
                },

            });

        });
    </script>
@endpush
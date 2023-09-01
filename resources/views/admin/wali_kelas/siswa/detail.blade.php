@extends('admin.layouts.app')

@section('title-web', 'Guru Kita | Detail Siswa')

@section('title-page', 'Detail Siswa')



@section('content')
    
<div class="row">
    <div class="col-12" id="detailDataArea">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-secondary" href="{{ url('/siswa/') }}">Lihat Semua Siswa</a>
                <a class="btn btn-primary" href="{{ url('/siswa/edit')."/".$student->id }}">Edit Data</a>
            </div>
          <div class="card-body" style="display: block;">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-bold text-secondary">Data pribadi</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">Nama</td>
                            <td>: {{ $student->nama ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">NIS</td>
                            <td>: {{ $student->nis ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">NISN </td>
                            <td>: {{ $student->nisn ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Tempat Lahir</td>
                            <td>: {{ $student->tempat_lahir ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">Tanggal Lahir</td>
                            <td>: {{ $student->tanggal_lahir ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">No Telp/WA</td>
                            <td>: {{ $student->no_telp ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Jenis Kelamin</td>
                            <td>: {{ $student->jenis_kelamin ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Alamat</td>
                            <td>: {{ $student->alamat ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="text-bold text-secondary">Data ayah</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">Nama ayah</td>
                            <td>: {{ $student->nama_ayah ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Pekerjaan ayah</td>
                            <td>: {{ $student->pekerjaan_ayah ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">No telp ayah</td>
                            <td>: {{ $student->no_telp_ayah ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Alamat ayah </td>
                            <td>: {{ $student->alamat_ayah ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="text-bold text-secondary">Data ibu</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">Nama ibu</td>
                            <td>: {{ $student->nama_ibu ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Pekerjaan ibu</td>
                            <td>: {{ $student->pekerjaan_ibu ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">No telp ibu</td>
                            <td>: {{ $student->no_telp_ibu ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Alamat ibu </td>
                            <td>: {{ $student->alamat_ibu ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="text-bold text-secondary">Data wali</h4>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">Nama wali</td>
                            <td>: {{ $student->nama_wali ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Pekerjaan wali</td>
                            <td>: {{ $student->pekerjaan_wali ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <table>
                        <tr>
                            <td class="text-bold">No telp wali</td>
                            <td>: {{ $student->no_telp_wali ?? "-" }}</td>
                        </tr>
                        <tr>
                            <td class="text-bold">Alamat wali </td>
                            <td>: {{ $student->alamat_wali ?? "-" }}</td>
                        </tr>
                    </table>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
      
</div>

@endsection

@push('script')
    
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
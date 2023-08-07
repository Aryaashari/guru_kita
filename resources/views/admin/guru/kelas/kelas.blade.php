@extends('admin/layouts/app')

@section('title-web', 'Guru Kita | Kelas')

@section('title-page', 'Data Kelas')


@section('content')
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="btn btn-warning">Edit Data</div>
                </div>
              <div class="card-body" style="display: block;">
                <table>
                    <tr>
                        <td class="text-bold">Nama Kelas</td>
                        <td>: {{ $classroom->nama ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Jurusan Kelas</td>
                        <td>: {{ $classroom->jurusan ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Nama Sekolah</td>
                        <td>: {{ $classroom->nama_sekolah ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">NPSN</td>
                        <td>: {{ $classroom->npsn ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Akreditasi</td>
                        <td>: {{ $classroom->akreditasi ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Alamat Sekolah</td>
                        <td>: {{ $classroom->alamat ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Nama Kepala Sekolah</td>
                        <td>: {{ $classroom->nama_kepala_sekolah ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">NIP Kepala Sekolah</td>
                        <td>: {{ $classroom->nip_kepala_sekolah ?? "-" }}</td>
                    </tr>
                    <tr>
                        <td class="text-bold">Logo Sekolah</td>
                        <td><br>
                            @if ($classroom->logo_sekolah == null)
                                : Tidak ada logo
                            @else
                                <img src="{{ asset('assets/img/'.$classroom->logo_sekolah) }}" width="100" alt="logo-sekolah">
                            @endif 
                        </td>
                    </tr>
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>

@endsection


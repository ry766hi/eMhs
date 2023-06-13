@extends('layouts.main')
@section('title','Mahasiswa')
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <a href="/mahasiswa/formtambah" class="btn btn-primary" role="button"><i class="bi bi-plus-circle-fill">
              </i> Mahasiswa</a>
                <form action="/mahasiswa/pencarian" method="GET" class="form-inline my-2 my-lg-0 float-right">
                  <input name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
        </div>
        <div class="card-body">
          @if(session('flashubah'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('flashubah')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if(session('flashhapus'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{session('flashhapus')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Minat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($mhs as $idx => $m)
                    <tr>
                        <th scope="row">{{$mhs->firstItem()+$idx}}</th>
                        <td>{{$m->nim}}</td>
                        <td>{{$m->nama}}</td>
                        <td>{{$m->gender}}</td>
                        <td>{{$m->prodi}}</td>
                        <td>{{$m->minat}}</td>
                        <td>
                          <a href="/mahasiswa/formubah/{{$m->nim}}" class="btn btn-success" role="button">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                          <a href="/mahasiswa/delete/{{$m->nim}}" class="btn btn-danger" role="button">
                            <i class="bi bi-trash3"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
              <span class="float-right">{{$mhs->links()}}</span>
        </div>
    </div>
@endsection
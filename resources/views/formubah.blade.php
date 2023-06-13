@extends('layouts.main')
@section('title','Mahasiswa')
@section('content')
<div class="card mt-4">
    <div class="card-header"></div>
    <div class="card-body">
        @php
          $minat = explode(', ', $mhs->minat);
      @endphp
        <form action="/mahasiswa/update/{{$mhs->nim}}" method="POST">
          @csrf
          @method('PUT')
            <div class="form-group">
              <label>NIM</label>
              <input type="number" name="nim" class="form-control" value="{{$mhs->nim}}" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="{{$mhs->nama}}">
            </div>
            <label>Gender</label>
            <div class="form-check">
              <input type="radio" name="gender" value="Pria" class="form-check-input" {{($mhs->gender == 'Pria')?'checked':''}}>
              <label>Pria</label>
            </div>
            <div class="form-check">
              <input type="radio" name="gender" value="Wanita" class="form-check-input" {{($mhs->gender == 'Wanita')?'checked':''}}>
              <label>Wanita</label>
            </div>
            <div class="form-group">
              <label>Prodi</label>
              <select name="prodi" class="form-control">
                <option value="0">--Pilih Program Studi--</option>
                <option value="Informatika" {{($mhs->prodi == 'Informatika')? 'Selected':''}}>Informatika</option>
                <option value="Sistem Informasi" {{($mhs->prodi == 'Sistem Informasi')? 'Selected':''}}>Sistem Informasi</option>
                <option value="Manajemen" {{($mhs->prodi == 'Manajemen')? 'Selected':''}}>Manajemen</option>
              </select>
            </div>
            <label>Minat</label>
            <div class="form-check">
              <input type="checkbox" name="minat[]" value="ai" class="form-check-input" {{in_array('ai', $minat)?'checked':''}}>
              <label>Artificial Intelegent</label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="minat[]" value="web" class="form-check-input"{{in_array('web', $minat)?'checked':''}}>
              <label>Web Engineering</label>
            </div>
            <div class="form-check">
              <input type="checkbox" name="minat[]" value="data" class="form-check-input"{{in_array('data', $minat)?'checked':''}}>
              <label>Data Engineering</label>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
          </form>
    </div>
</div>
@endsection
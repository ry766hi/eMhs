{{-- Menampilkan navbar --}}
<div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link {{($key == 'beranda')? 'active':''}}" href="/beranda">Beranda</a>
    <a class="nav-link {{($key == 'profil')? 'active':''}}" href="/profil">Profil</a>
    <a class="nav-link {{($key == 'mahasiswa')? 'active':''}}" href="/mahasiswa">Mahasiswa</a>
    <a class="nav-link {{($key == 'kontak')? 'active':''}}" href="/kontak">Kontak</a>
</div>
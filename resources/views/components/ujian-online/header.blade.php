<!-- HEADER -->
<header class="site-header">
  <div class="row">
    <div class="pull-left">
      <div class="brand">
        <h2>
          <b>LKS</b> ONLINE
        </h2>
        <small>LEMBAR KERJA SISWA ONLINE</small>
      </div>
    </div>
    <div class="pull-right">
      <div class="account-user">
        <img src="{{ url('img\users\ujian.png') }}" width="50">
        <div class="data-user">
          <span>Selamat Datang</span><br>
          <span>{{ Auth::user()->name }}</span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- END HEADER -->
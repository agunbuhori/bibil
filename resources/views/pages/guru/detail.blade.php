@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Detail Guru @endslot
  @slot('subtitle') {{ $guru->nama }} @endslot
  @endcomponent

  <section class="content">
    <div class="row">
      <div class="col-md-4">
  
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img src="{{ asset('img/users/' . $guru->user->picture) }}" class="profile-user-img img-responsive img-circle">
            <h3 class="profile-username text-center">{{ $guru->nama }}</h3>
            <p class="text-muted text-center">{{ __('Guru Mata Pelajaran') }}</p>
            <p align="center">
              {!! Viewdata::mapel($guru->mapel) !!}
            </p>

            <hr>

            <table class="table table-bordered table-hover">
              <thead class="bg-blue">
                <tr>
                  <th>Mapel</th>
                  <th>Kelas</th>
                  <th width="60">Siswa</th>
                </tr>
              </thead>
              <tbody>
                @php ($total = 0)
                @foreach ($siswa as $item)    
                <tr>
                  <td>{{ $item->mapel }}</td>
                  <td>{{ $item->kelas }}</td>
                  <td align="center">
                    <span class="label bg-blue">{{ $item->siswa }}</span>
                  </td>
                </tr>
                @php ($total = $total + $item->siswa)
                @endforeach
                <tr>
                  <td colspan="2"><b>Total Siswa</b></td>
                  <td align="center">
                    <span class="label bg-blue">{{ $total }}</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
  
      </div>

      <div class="col-md-8">
        <div class="nav-tabs-custom tab-primary">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
            <li><a href="#profile" data-toggle="tab">Profile</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="account">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover table-list">
                      <thead class="bg-blue">
                        <tr>
                          <th colspan="3">Detail Akun</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="110">Nama Lengkap</td>
                          <td>: {{ $guru->user->name }}</td>
                          <td width="175" rowspan="4">
                              <img src="{{ asset('img/users/' . $guru->user->picture) }}" class="img-responsive">
                          </td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>: {{ $guru->user->email }}</td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td>: {{ $guru->user->username }}</td>
                        </tr>
                        <tr>
                          <td>Hak Akses</td>
                          <td>: <span class="label bg-blue">{{ $guru->user->role }}</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile">
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-hover table-list">
                      <thead class="bg-blue">
                        <tr>
                          <th colspan="3">Detail Profile</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="110">Nama Lengkap</td>
                          <td>: {{ $guru->nama }}</td>
                          <td width="175" rowspan="4">
                              <img src="{{ asset('img/users/' . $guru->user->picture) }}" class="img-responsive">
                          </td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>: {{ ($guru->kelamin === 'L') ? 'Laki - laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>: {{ $guru->alamat }}</td>
                        </tr>
                        <tr>
                          <td>Mata Pelajaran</td>
                          <td>: {!! Viewdata::mapel($guru->mapel) !!}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
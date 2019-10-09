@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Detail Orang Tua @endslot
  @slot('subtitle') {{ $ortu->nama }} @endslot
  @endcomponent

  <section class="content">
    <div class="row">
      <div class="col-md-4">
  
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img src="{{ asset('img/users/' . $ortu->user->picture) }}" class="profile-user-img img-responsive img-circle">
            <h3 class="profile-username text-center">{{ $ortu->nama }}</h3>
            <p class="text-muted text-center">{{ $ortu->nis }}</p>
            <p align="center">
              Orang Tua <a href="{{ url('siswa/'.$ortu->siswa->id) }}">{{ $ortu->siswa->nama }}</a>
            </p>
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
                          <th colspan="4">Detail Akun</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="110">Nama Lengkap</td>
                          <td width="5">:</td>
                          <td>{{ $ortu->user->name }}</td>
                          <td width="175" rowspan="4">
                              <img src="{{ asset('img/users/' . $ortu->user->picture) }}" class="img-responsive">
                          </td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td width="5">:</td>
                          <td>{{ $ortu->user->email }}</td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td width="5">:</td>
                          <td>{{ $ortu->user->username }}</td>
                        </tr>
                        <tr>
                          <td>Hak Akses</td>
                          <td width="5">:</td>
                          <td><span class="label bg-blue">{{ $ortu->user->role }}</span></td>
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
                          <th colspan="4">Detail Profile</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td width="110">Nama Lengkap</td>
                          <td width="5">:</td>
                          <td>{{ $ortu->nama }}</td>
                          <td width="175" rowspan="4">
                              <img src="{{ asset('img/users/' . $ortu->user->picture) }}" class="img-responsive">
                          </td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td width="5">:</td>
                          <td>{{ ($ortu->kelamin === 'L') ? 'Laki - laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                          <td>NIS</td>
                          <td width="5">:</td>
                          <td>{{ $ortu->nis }}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td width="5">:</td>
                          <td>{{ $ortu->alamat }}</td>
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
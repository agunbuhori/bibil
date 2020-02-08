@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Dashboard @endslot
  @slot('subtitle') Profile @endslot
  @endcomponent

  <div class="row" style="margin-top:20px;">
    <div class="col-md-12">
      <div class="nav-tabs-custom tab-primary">
        <div class="tab-content">
          <div class="tab-pane active" id="account">
            <div class="row">
              <div class="card col-md-6">
                <div class="card-body">
                    <div class="col-lg-12 col-md-12 card-margin">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-8">
                        <p>{{$profiles->name}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-8">
                         <p>{{$profiles->email}}</p>
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-8">
                         <p>{{$profiles->username}}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Hak Akses</label>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-8">
                        <p>{{$profiles->role}}</p>
                        </div>
                      </div>          
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('javascript')
  <script>
    $(function () {
      
    })
  </script>
@endsection
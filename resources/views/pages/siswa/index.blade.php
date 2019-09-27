@extends('templates.base')
@section('content')
  @component('components.wraper.title')
  @slot('title') Siswa @endslot
  @slot('subtitle')  @endslot
  @endcomponent
  
  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Siswa</h3>
        <div class="box-tools pull-right" style="margin-top:0px;">
          <button type="button" href="#" class="btn btn-sm bg-blue"
            data-toggle="modal" data-target="#siswa" onclick="clearform()">
            <i class="fa fa-plus-circle"></i> Tambah
          </button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <form action="{{ url()->current() }}" method="get">
            <div class="col-sm-1">
              <select name="limit" id="show" class="form-control input-sm">
                <option {{ ($request->limit == 5) ? 'selected' : '' }} value="5">5</option>
                <option {{ ($request->limit == 10) ? 'selected' : '' }} value="10">10</option>
                <option {{ ($request->limit == 25) ? 'selected' : '' }} value="25">25</option>
                <option {{ ($request->limit == 50) ? 'selected' : '' }} value="50">50</option>
                <option {{ ($request->limit == 100) ? 'selected' : '' }} value="100">100</option>
              </select>
            </div>
            <div class="col-sm-8" style="margin-bottom:35px"></div>
            <div class="col-sm-3">
              <div class="input-group input-group-sm">
                <input name="keyword" type="text" class="form-control" placeholder="Search" value="{{ $request->keyword }}">
                <span class="input-group-btn">
                  <button type="submit" class="btn bg-blue btn-flat">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </div>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-list">
            <thead class="bg-blue">
              <tr>
                <th width="35">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th width="38">L/P</th>
                <th width="90">Username</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            <tbody id="listitem">
              @php ($no = ($siswa->currentPage() * $siswa->perPage()) - ($siswa->perPage() - 1))
              @foreach ($siswa as $item) 
              <tr>
                <td>{{ $no }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->user->email }}</td>
                <td align="center">{{ $item->kelamin }}</td>
                <td class="column-label">
                  <span class="label bg-green">{{ $item->user->username }}</span>  
                </td>
                <td class="action">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                      Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu animated-fast fadeIn">
                      <li>
                        <a href="{{ route('siswa.show', ['id' => $item->id]) }}">
                          <i class="fa fa-file-text"></i> Detail Siswa
                        </a>
                      </li>
                      <li>
                        <a onclick="passwordreset({{ $item->user_id }})">
                          <i class="fa fa-lock"></i> Reset Password
                        </a>
                      </li>
                      <li>
                        <a onclick="edit({{ $item->id }})">
                          <i class="fa fa-edit"></i> Edit Siswa
                        </a>
                      </li>
                      <li>
                        <a onclick="deleted({{ $item->user_id }})">
                          <i class="fa fa-trash"></i> Delete Siswa
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="7">
                  <small>page {{ $siswa->currentPage() }} of {{ $siswa->lastPage() }} page and total data {{ $siswa->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $siswa->links() }}
          </div>
        </div>
      </div>
    </div>
    @include('pages.siswa.popup')
  </section>
@endsection

@section('javascript')
  <script>
    function clearform() {
      var modal = $('#siswa'),
          form  = modal.find('form[name="siswa"]')

      modal.find('.modal-title').text('Tambah Siswa')
      form.find('[name]').not('[name="_token"]').val('')
      // form.find('#jurusan_id').select2().val('').trigger('change');
      // form.find('#kelas_id').select2().val('').trigger('change');
      form.find('#password').prop('disabled', false).parent().show()
      form.attr('action', '{{ route('siswa.store') }}')
    }

    function listitem() {
      $.ajax({
        type: 'GET',
        url: '{{ url()->full() }}',
        dataType: 'html',
        success: function(response) {
          $('#listitem').html(response)
        },
        error: function(response) {
          Swal.fire("Something is not quite right", "Well be back soon!", "error");
        }
      });
    }

    $('form[name="siswa"]').on('submit', function(e) {
      var form   = $(this),
          modal  = $('#siswa'),
          url    = form.prop('action'),
          method = form.prop('method'),
          data   = form.serialize();

      Swal.fire({
        title: 'Mohon tunggu sebentar!',
        allowOutsideClick: false,
        onBeforeOpen: () => {
          modal.modal('hide')
          Swal.showLoading()
          clearform()
          $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(response) {
              if (response.status) {
                listitem()
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: response.message,
                  allowOutsideClick: false
                })
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal!',
                  text: response.message,
                  allowOutsideClick: false
                });
              }
            },
            error: function() {
              Swal.fire("Something is not quite right", "Well be back soon!", "error");
            }
          });
        }
      })

      e.preventDefault();
    });

    $('form[name="password-reset"]').on('submit', function(e) {
      var form   = $(this),
          modal  = $('#password-reset'),
          url    = form.prop('action'),
          method = form.prop('method'),
          data   = form.serialize();

      Swal.fire({
        title: 'Mohon tunggu sebentar!',
        allowOutsideClick: false,
        onBeforeOpen: () => {
          modal.modal('hide')
          Swal.showLoading()
          clearpass()
          $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(response) {
              if (response.status) {
                listitem()
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: response.message,
                  allowOutsideClick: false
                })
              } else {
                Swal.fire({
                  type: 'error',
                  title: 'Gagal!',
                  text: response.message,
                  allowOutsideClick: false
                });
              }
            },
            error: function() {
              Swal.fire("Something is not quite right", "Well be back soon!", "error");
            }
          });
        }
      })

      e.preventDefault();
    });

    function edit(id) {
      var modal = $('#siswa'),
          form  = modal.find('form[name="siswa"]')

      modal.find('.modal-title').text('Ubah Siswa')
      form.attr('action', '{{ route('siswa.index') }}/' + id)
      form.find('#method_action').val('PUT')
      form.find('#password').prop('disabled', true).parent().hide()

      $.ajax({
        type: 'GET',
        url: '{{ route('siswa.index') }}/' + id + '/edit',
        dataType: 'json',
        success: function(response) {
          modal.modal('show')
          form.find('#jurusan_id').select2().val(response.data.jurusan_id).trigger('change')
          form.find('#kelas_id').select2().val(response.data.kelas_id).trigger('change')
          $.each(response.data, function(key, val) {
            form.find('[name="' + key + '"]').val(val)
          });
        },
        error: function(response) {
          Swal.fire("Something is not quite right", "Well be back soon!", "error");
        }
      });
    }

    function passwordreset(id) {
      var modal = $('#password-reset'),
          form  = modal.find('form[name="password-reset"]')

      form.find('[name="id"]').val(id)
      modal.modal('show')
    }

    function clearpass() {
      var modal = $('#password-reset'),
          form  = modal.find('form[name="password-reset"]')

      form.find('[name]').val('')
    }

    function deleted(id) {
      Swal.fire({
        title: 'Hapus siswa ini ?',
        text: "semua data yang berhubungan akan terhapus",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        allowOutsideClick: false
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            title: 'Mohon tunggu sebentar!',
            allowOutsideClick: false,
            onBeforeOpen: () => {
              Swal.showLoading()
              $.ajax({
                type: 'DELETE',
                url: '{{ route('siswa.index') }}/' + id,
                data: '_token={{ csrf_token() }}',
                dataType: 'json',
                success: function(response) {
                  if (response.status) {
                    listitem()
                    Swal.fire({
                      type: 'success',
                      title: 'Berhasil!',
                      text: response.message,
                      allowOutsideClick: false
                    })
                  } else {
                    Swal.fire({
                      type: 'error',
                      title: 'Gagal!',
                      text: response.message,
                      allowOutsideClick: false
                    });
                  }
                },
                error: function() {
                  Swal.fire("Something is not quite right", "Well be back soon!", "error");
                }
              });
            }
          })
        }
      })
    }
  </script>
@endsection
@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Kisi - Kisi @endslot
  @slot('subtitle') Manage Kisi - Kisi @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Kisi - Kisi</h3>
        <div class="box-tools pull-right" style="margin-top:0px;">
          <button type="button" href="#" class="btn btn-sm bg-blue"
            data-toggle="modal" data-target="#kisi" onclick="clearform()">
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
                <th>Judul Kisi - Kisi</th>
                <th width="200">File</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            <tbody id="listitem">
              @php ($no = ($kisi->currentPage() * $kisi->perPage()) - ($kisi->perPage() - 1))
              @foreach ($kisi as $item)    
              <tr>
                <td align="center">{{ $no }}</td>
                <td>{{ $item->judul }}</td>
                <td class="action">
                  <a href="{{ url('files/' . $item->file) }}" target="_blank" class="btn bg-green btn-block btn-sm btn-flat">
                    <i class="download"></i> Download
                  </a>
                </td>
                <td class="action">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                      Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu animated-fast fadeIn">
                      <li>
                        <a onclick="edit({{ $item->id }})">
                          <i class="fa fa-edit"></i> Edit Kisi - Kisi
                        </a>
                      </li>
                      <li>
                        <a onclick="deleted({{ $item->id }})">
                          <i class="fa fa-trash"></i> Delete Kisi - Kisi
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="4">
                  <small>page {{ $kisi->currentPage() }} of {{ $kisi->lastPage() }} page and total data {{ $kisi->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $kisi->links() }}
          </div>
        </div>
      </div>
    </div>

    @include('pages.kisi.popup')

  </section>
@endsection

@section('javascript')
  <script>
    (function() {
      $(":file").filestyle({
          btnClass: "btn-primary",
          htmlIcon: '<i class="fa fa-folder"></i> ',
          text: 'Cari File'
      })
    })()

    function clearform() {
      var modal = $('#kisi'),
          form  = modal.find('form[name="kisi"]')

      modal.find('.modal-title').text('Tambah kisi')
      form.find('[name]').not('[name="_token"]').val('')
      form.find('#ujian_id').select2().val('').trigger('change')
      form.find('[name="file"]').prop('required', true).parent().show()
      form.attr('action', '{{ route('kisi.store') }}')
      $(":file").filestyle('clear')
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

    $('form[name="kisi"]').on('submit', function(e) {
      var form   = $(this),
          modal  = $('#kisi'),
          url    = form.prop('action'),
          method = form.prop('method'),
          data   = new FormData(this);

      Swal.fire({
        title: 'Mohon tunggu sebentar!',
        allowOutsideClick: false,
        onBeforeOpen: () => {
          modal.modal('hide')
          Swal.showLoading()
          $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
              if (response.status) {
                clearform()
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
      var modal = $('#kisi'),
          form  = modal.find('form[name="kisi"]')

      modal.find('.modal-title').text('Ubah kisi')
      form.attr('action', '{{ route('kisi.index') }}/' + id)
      form.find('#method_action').val('PUT')

      $.ajax({
        type: 'GET',
        url: '{{ route('kisi.index') }}/' + id + '/edit',
        dataType: 'json',
        success: function(response) {
          modal.modal('show')
          $.each(response.data, function(key, val) {
            form.find('[name="' + key + '"]').not(':file').val(val)
          })
          form.find('[name="file"]').prop('required', false).parent().hide()
          form.find('#ujian_id').select2().val(response.data.ujian_id).trigger('change')
        },
        error: function(response) {
          Swal.fire("Something is not quite right", "Well be back soon!", "error")
        }
      })
    }

    function deleted(id) {
      Swal.fire({
        title: 'Hapus kisi ini ?',
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
                url: '{{ route('kisi.index') }}/' + id,
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
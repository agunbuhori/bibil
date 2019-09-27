@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Ujian @endslot
  @slot('subtitle') Manage Ujian @endslot
  @endcomponent

  <section class="content">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Ujian</h3>
        <div class="box-tools pull-right" style="margin-top:0px;">
          <button type="button" href="#" class="btn btn-sm bg-blue"
            data-toggle="modal" data-target="#ujian" onclick="clearform()">
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
                <th>Jurusan / Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Judul Ujian</th>
                <th>Mulai / Selesai</th>
                <th>Waktu / Soal</th>
                <th width="200">Action</th>
              </tr>
            </thead>
            <tbody id="listitem">
              @php ($no = ($ujian->currentPage() * $ujian->perPage()) - ($ujian->perPage() - 1))
              @foreach ($ujian as $item)    
              <tr>
                <td align="center">{{ $no }}</td>
                <td>
                  <span class="label bg-blue">Jurusan</span> : {!! Viewdata::jurusan($item->jurusan_id, 'green') !!}
                  <hr style="margin-top: 5px;margin-bottom: 1px;">
                  <span class="label bg-blue">Kelas &nbsp; &nbsp; &nbsp;</span> : {!! Viewdata::kelas($item->kelas_id) !!}
                </td>
                <td>
                  <span class="label bg-blue">Mapel &nbsp; &nbsp; &nbsp;&nbsp;</span> : {!! Viewdata::mapel(json_encode([$item->mapel_id]), 'green') !!}
                  <hr style="margin-top: 5px;margin-bottom: 1px;">
                  <span class="label bg-blue">Remedial</span> : <span class="label bg-{{ $item->remedial ? 'green' : 'red' }}">{{ $item->remedial ? 'Ya' : 'Tidak' }}</span>
                </td>
                <td>{{ $item->judul_ujian }}</td>
                <td>
                  <span class="label bg-blue">Mulai &nbsp;&nbsp;</span> : <span class="label bg-green">{{ date('d M Y | H:i', strtotime($item->date_start)) }}</span>
                  <hr style="margin-top: 5px;margin-bottom: 1px;">
                  <span class="label bg-blue">Selesai</span> : <span class="label bg-red">{{ date('d M Y | H:i', strtotime($item->date_end)) }}</span>
                </td>
                <td>
                  <span class="label bg-blue">Waktu</span> : <span class="label bg-green">{{ $item->waktu }}</span>
                  <hr style="margin-top: 5px;margin-bottom: 1px;">
                  <span class="label bg-blue">Soal &nbsp; &nbsp;</span> : <span class="label bg-green">{{ $item->jmlh_soal }}</span>
                </td>
                <td class="action">
                  <div class="dropdown">
                    <button class="btn btn-sm btn-flat btn-block bg-blue dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                      Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu animated-fast fadeIn">
                      <li>
                        <a href="{{ route('ujian.show', ['id' => $item->id]) }}">
                          <i class="fa fa-file-text"></i> Detail Ujian
                        </a>
                      </li>
                      <li>
                        <a onclick="edit({{ $item->id }})">
                          <i class="fa fa-edit"></i> Edit Ujian
                        </a>
                      </li>
                      <li>
                        <a onclick="deleted({{ $item->id }})">
                          <i class="fa fa-trash"></i> Delete Ujian
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @php ($no++)
              @endforeach
              <tr>
                <td colspan="8">
                  <small>page {{ $ujian->currentPage() }} of {{ $ujian->lastPage() }} page and total data {{ $ujian->total() }}</small>
                </td>
              </tr>
            </tbody>
          </table>
          <div style="text-align:right">
            {{ $ujian->links() }}
          </div>
        </div>
      </div>
    </div>

    @include('pages.ujian.popup.popup')

  </section>
@endsection

@section('javascript')
  {!! HTML::script('plugins/ckeditor/ckeditor.js') !!}
  <script>
    (function() {
      CKEDITOR.replace('keterangan');
      $('[data-tanggal]').datetimepicker({ 
          format: 'YYYY-MM-DD HH:mm'
      })
    })();
    function clearform() {
      var modal = $('#ujian'),
          form  = modal.find('form[name="ujian"]')

      modal.find('.modal-title').text('Tambah Ujian')
      form.find('[name]').not('[name="_token"]').val('')
      form.find('[name="remedial"]').val(0)
      form.find('#jurusan_id').select2().val('').trigger('change');
      form.find('#kelas_id').select2().val('').trigger('change');
      form.find('#mapel_id').select2().val('').trigger('change');
      CKEDITOR.instances.keterangan.setData('')
      form.attr('action', '{{ route('ujian.store') }}')
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

    $('form[name="ujian"]').on('submit', function(e) {
      var form   = $(this),
          modal  = $('#ujian'),
          url    = form.prop('action'),
          method = form.prop('method'),
          data   = new FormData(this);

      data.append('keterangan', CKEDITOR.instances.keterangan.getData());

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
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
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
      var modal = $('#ujian'),
          form  = modal.find('form[name="ujian"]')

      modal.find('.modal-title').text('Ubah Ujian')
      form.attr('action', '{{ route('ujian.index') }}/' + id)
      form.find('#method_action').val('PUT')

      $.ajax({
        type: 'GET',
        url: '{{ route('ujian.index') }}/' + id + '/edit',
        dataType: 'json',
        success: function(response) {
          modal.modal('show')
          $.each(response.data, function(key, val) {
            form.find('[name="' + key + '"]').val(val)
          })
          let selectData = {
            kelas: response.data.kelas_id,
            mapel: response.data.mapel_id
          }
          form.find('#jurusan_id').select2().val(response.data.jurusan_id).trigger('change', selectData);
        },
        error: function(response) {
          Swal.fire("Something is not quite right", "Well be back soon!", "error");
        }
      });
    }

    function deleted(id) {
      Swal.fire({
        title: 'Hapus ujian ini ?',
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
                url: '{{ route('ujian.index') }}/' + id,
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

    $('#jurusan_id').select2().on('change', (event, params) => {      
      var jurusan = $("#jurusan_id").val()

      if (jurusan == '') return false;
      
      $.get('{{ route('ajax.kelas') }}?jurusan=' + jurusan, (data, status) => {
        if (status) {
          data.unshift({id: '', text: '--- Pilih Kelas ---'});
          $('#kelas_id').html('').select2({data: data});
          $('#mapel_id').html('').select2({data: [{id: '', text: '--- Pilih Mapel ---'}]});

          if (typeof params !== 'undefined') {
            $('#kelas_id').select2().val(params.kelas).trigger('change', params);
          }
        } else {
          Swal.fire("Something is not quite right", "Well be back soon!", "error");
        }
      })
    })

    $('#kelas_id').select2().on('change', (event, params) => {
      var kelas = $("#kelas_id").val()

      if (kelas == '') return false;
      
      $.get('{{ route('ajax.mapel') }}?kelas=' + kelas, (data, status) => {
        if (status) {
          data.unshift({id: '', text: '--- Pilih Mapel ---'});
          $('#mapel_id').html('').select2({data: data});

          if (typeof data !== 'undefined') {
            $('#mapel_id').select2().val(params.mapel).trigger('change');
          }
        } else {
          Swal.fire("Something is not quite right", "Well be back soon!", "error");
        }
      })
    })
  </script>
@endsection
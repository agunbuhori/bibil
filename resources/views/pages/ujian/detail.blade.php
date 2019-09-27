@extends('templates.base')

@section('content')
  @component('components.wraper.title')
  @slot('title') Detail Soal @endslot
  @slot('subtitle') {{ $ujian->judul_ujian }} @endslot
  @endcomponent

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom tab-primary">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#ujian" data-toggle="tab">Detail Ujian</a></li>
            <li><a href="#soal-pilihan-ganda" data-toggle="tab">Soal Pilihan Ganda</a></li>
            <li><a href="#soal-essay" data-toggle="tab">Soal Essay</a></li>
          </ul>
          <div class="tab-content">
            @include('pages.ujian.ujian')
            @include('pages.ujian.ganda')
            @include('pages.ujian.essay')
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('pages.ujian.popup.popup_soal')
@endsection

@section('javascript')
  {!! HTML::script('plugins/ckeditor/ckeditor.js') !!}
  <script>
    (function() {
      CKEDITOR.replace('soal');
      CKEDITOR.replace('kunci_jawaban');
    })();

    function addSoal(soal) {
      var form = $('form[name="form-soal"]')
      form.find('[name="jenis_soal"]').val(soal)
      if (soal === 'ganda') {
        form.find('.form-ganda').each((index, elmt) => {
          $(elmt).show();
          $(elmt).find('.form-control').prop('required', true)
        })
        form.find('.form-essay').hide()
      } else {
        form.find('.form-ganda').each((index, elmt) => {
          $(elmt).hide();
          $(elmt).find('.form-control').prop('required', false)
        })
        form.find('.form-essay').show()
      }
      clearform()
    }

    function clearform() {
      var modal = $('#form-soal'),
          form  = modal.find('form[name="form-soal"]')

      modal.find('.modal-title').text('Tambah Soal')
      form.find('[name]').not('[name="_token"]')
                         .not('[name="ujian_id"]')
                         .not('[name="jenis_soal"]')
                         .val('')
      form.attr('action', '{{ route('soal.store') }}')
      CKEDITOR.instances.soal.setData('')
      CKEDITOR.instances.kunci_jawaban.setData('')
    }

    $('form[name="form-soal"]').on('submit', function(e) {
      var form   = $(this),
          modal  = $('#form-soal'),
          url    = form.prop('action'),
          method = form.prop('method'),
          data   = new FormData(this);

      data.append('soal', CKEDITOR.instances.soal.getData());
      if (form.find('[name="jenis_soal"]').val() === 'essay') {
        data.append('kunci', CKEDITOR.instances.kunci_jawaban.getData());
      } else {
        CKEDITOR.instances.kunci_jawaban.setData('')
      }

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
                Swal.fire({
                  type: 'success',
                  title: 'Berhasil!',
                  text: response.message,
                  allowOutsideClick: false
                }).then((result) => {
                  if (result.value) {
                    $('form[data-search="' + response.jenis +'"]').submit();
                  }
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

    $('form[data-search]').on('submit', function(e) {
      var form   = $(this),
          url    = form.prop('action'),
          method = form.prop('method'),
          jenis  = form.find('[name="jenis"]').val(),
          data   = form.serialize();
      
      Swal.fire({
        title: 'Mohon tunggu sebentar!',
        allowOutsideClick: false,
        onBeforeOpen: () => {
          Swal.showLoading()
          $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'html',
            success: function(response) {
              $('#listitem-' + jenis).html(response)
              Swal.close();
            },
            error: function() {
              Swal.fire("Something is not quite right", "Well be back soon!", "error");
            }
          });
        }
      })

      e.preventDefault();
    });

    function edit(id, jenis) {
      var modal = $('#form-soal'),
          form  = modal.find('form[name="form-soal"]')
        
      addSoal(jenis)

      modal.find('.modal-title').text('Ubah Soal')
      form.attr('action', '{{ route('soal.index') }}/' + id)
      form.find('#method_action').val('PUT')

      $.ajax({
        type: 'GET',
        url: '{{ route('soal.index') }}/' + id + '/edit',
        dataType: 'json',
        success: function(response) {
          modal.modal('show')
          if (jenis == 'ganda') {
            console.log('saipul');
            
            CKEDITOR.instances.soal.setData(response.data.soal)
            $.each(response.data, function(key, val) {
              form.find('[name="' + key + '"]').val(val)
            });
          } else {
            CKEDITOR.instances.soal.setData(response.data.soal)
            CKEDITOR.instances.kunci_jawaban.setData(response.data.kunci)
          }
        },
        error: function(response) {
          Swal.fire("Something is not quite right", "Well be back soon!", "error");
        }
      });
    }

    function deleted(id, jenis, ujian) {
      Swal.fire({
        title: 'Hapus soal ini ?',
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
                url: '{{ route('soal.index') }}/' + id,
                data: '_token={{ csrf_token() }}&ujian=' + ujian,
                dataType: 'json',
                success: function(response) {
                  if (response.status) {
                    Swal.fire({
                      type: 'success',
                      title: 'Berhasil!',
                      text: response.message,
                      allowOutsideClick: false
                    }).then((result) => {
                      if (result.value) {
                        $('form[data-search="' + jenis +'"]').submit();
                      }
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
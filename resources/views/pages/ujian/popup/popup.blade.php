<div class="modal fade" id="ujian" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearform()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form name="ujian" action="{{ route('ujian.store') }}" method="post">
        @csrf
        {{-- <input name="_method" id="method_action" type="hidden" value="PUT"> --}}
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="jurusan_id">Jurusan</label>
                <select name="jurusan_id" id="jurusan_id" class="form-control select2" style="width:100%" required>
                  <option value="">--- Pilih Jurusan ---</option>
                  {{-- {!! Tagdata::jurusan() !!} --}}
                  @foreach(\DB::table('jurusans')->get() as $jurusan)
                  <option value="{{$jurusan->id}}">{{$jurusan->nama_jurusan}}</option>
                  @endforeach
                  {{-- {{dd(\DB::table('jurusans')->get())}} --}}
                </select>
              </div>
              <div class="form-group">
                <label for="kelas_id">Kelas</label>
                <select name="kelas_id" id="kelas_id" class="form-control select2" style="width:100%" required>
                  <option value="">--- Pilih Kelas ---</option>
                </select>
              </div>
              <div class="form-group">
                <label for="mapel_id">Mapel</label>
                <select name="mapel_id" id="mapel_id" class="form-control select2" style="width:100%" required>
                  <option value="">--- Pilih Mapel ---</option>
                </select>
              </div>
              <div class="form-group">
                <label for="remedial">Remedial</label>
                <select name="remedial" id="remedial" class="form-control">
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul_ujian">Judul Ujian</label>
                <input type="text" id="judul_ujian" name="judul_ujian" class="form-control" placeholder="Judul Ujian" required>
              </div>
              <div class="form-group">
                <label for="date_start">Tanggal Mulai</label>
                <input type="text" id="date_start" data-tanggal="true" name="date_start" class="form-control" placeholder="Tanggal Mulai" required>
              </div>
              <div class="form-group">
                <label for="date_end">Tanggal Selesai</label>
                <input type="text" id="date_end" data-tanggal="true" name="date_end" class="form-control" placeholder="Tanggal Selesai" required>
              </div>
              <div class="form-group">
                <label for="waktu">Waktu Ujian</label>
                <input type="number" id="waktu" maxlength="3" name="waktu" class="form-control" placeholder="Waktu Ujian (Menit)" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="keterangan">Keterangan Ujian</label>
                <textarea name="keterangan" id="keterangan" rows="4" class="form-control" placeholder="Keterangan Ujian ..."></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearform()">Close</button>
          <button type="submit" class="btn bg-blue">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="kisi" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearform()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form name="kisi" action="{{ route('kisi.store') }}" method="post">
        @csrf
        <input name="_method" id="method_action" type="hidden" value="PUT">
        <div class="modal-body">
          <div class="form-group">
            <label for="judul">Judul Kisi - Kisi</label>
            <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Kisi - Kisi" required>
          </div>
          <div class="form-group">
            <label for="ujian_id">Untuk Ujian</label>
            <select name="ujian_id" id="ujian_id" class="form-control select2" style="width:100%">
              <option value="">--- Pilih Ujian ---</option>
              {!! Tagdata::ujian() !!}
            </select>
          </div>
          <div class="form-group">
            <label for="file">File Kisi</label>
            <input type="file" id="file" name="file" class="filestyle" required>
            <small><i><b>Catatan:</b> File yang di upload berukuran kurang dari <b>5 MB</b></i></small>
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
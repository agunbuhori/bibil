<div class="modal fade" id="mapel" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearform()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form name="mapel" action="{{ route('mapel.store') }}" method="post">
        @csrf
        <input name="_method" id="method_action" type="hidden" value="PUT">
        <div class="modal-body">
          <div class="form-group">
            <label for="jurusan_id">Jurusan</label>
            <select name="jurusan_id" id="jurusan_id" class="form-control select2" style="width:100%" required>
              <option value="">--- Pilih Jurusan ---</option>
              {!! Tagdata::jurusan() !!}
            </select>
          </div>
          <div class="form-group">
            <label for="jenjang">Jenjang</label>
            <select name="jenjang" id="jenjang" class="form-control" required>
              <option value="">--- Pilih Jenjang ---</option>
              <option value="X">X</option>
              <option value="XI">XI</option>
              <option value="XII">XII</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_mapel">Nama Mapel</label>
            <input type="text" id="nama_mapel" name="nama_mapel" class="form-control" placeholder="Nama Mapel" required>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan Mapel</label>
            <textarea name="keterangan" id="keterangan" rows="4" class="form-control" placeholder="Keterangan"></textarea>
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
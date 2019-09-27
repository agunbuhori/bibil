<div class="modal fade" id="jurusan" data-backdrop="static">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearform()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form name="jurusan" action="{{ route('jurusan.store') }}" method="post">
        @csrf
        <input name="_method" id="method_action" type="hidden" value="PUT">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input type="text" id="nama_jurusan" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan" required>
          </div>
          <div class="form-group">
            <label for="singkatan">Singkatan</label>
            <input type="text" id="singkatan" name="singkatan" maxlength="10" class="form-control" placeholder="Singkatan" required>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan Jurusan</label>
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
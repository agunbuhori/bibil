<div class="modal fade" id="form-soal" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearform()">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form name="form-soal" action="{{ route('soal.store') }}" method="post">
        @csrf
        <input name="_method" id="method_action" type="hidden" value="PUT">
        <input name="ujian_id" type="hidden" value="{{ $ujian->id }}">
        <input name="jenis_soal" type="hidden">
        <div class="modal-body">
          <div class="form-group">
            <label for="soal">Text Soal</label>
            <textarea name="soal" id="soal" rows="4" class="form-control" placeholder="Text Soal Ujian ..." required></textarea>
          </div>
          <!-- <div class="form-group form-essay">
            <label for="kunci_jawaban">Kunci Jawaban</label>
            <textarea name="kunci" id="kunci_jawaban" rows="4" class="form-control" placeholder="Text Soal Ujian ..." required></textarea>
          </div> -->
          <div class="form-group form-ganda">
            <label for="jawaban_a">Jawaban A</label>
            <input type="text" name="a" id="jawaban_a" class="form-control" placeholder="Jawaban A">
          </div>
          <div class="form-group form-ganda">
            <label for="jawaban_b">Jawaban B</label>
            <input type="text" name="b" id="jawaban_b" class="form-control" placeholder="Jawaban B">
          </div>
          <div class="form-group form-ganda">
            <label for="jawaban_c">Jawaban C</label>
            <input type="text" name="c" id="jawaban_c" class="form-control" placeholder="Jawaban C">
          </div>
          <div class="form-group form-ganda">
            <label for="jawaban_d">Jawaban D</label>
            <input type="text" name="d" id="jawaban_d" class="form-control" placeholder="Jawaban D">
          </div>
          <div class="form-group form-ganda">
            <label for="jawaban_e">Jawaban E</label>
            <input type="text" name="e" id="jawaban_e" class="form-control" placeholder="Jawaban E">
          </div>
          <div class="form-group form-ganda">
            <label for="kunci_jawaban">Kunci Jawaban</label>
            <select name="kunci_jawaban" id="kunci_jawaban" class="form-control">
              <option value="">--- Kunci Jawaban ---</option>
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
              <option value="e">E</option>
            </select>
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
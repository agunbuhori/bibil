<div class="tab-pane active" id="ujian">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-hover table-bordered">
        <tbody>
          <tr>
            <td width="200" class="bg-blue">
              <b>Judul Ujian</b>
            </td>
            <td width="5">:</td>
            <td>{{ $ujian->judul_ujian }}</td>
            <td width="400" class="bg-blue">
              <b>Keterangan</b>
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Jurusan</b>
            </td>
            <td width="5">:</td>
            <td>{{ Viewdata::jurusan($ujian->jurusan_id, 'green', true) }}</td>
            <td rowspan="10">
              {!! $ujian->keterangan !!}
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Kelas</b>
            </td>
            <td width="5">:</td>
            <td>{{ Viewdata::kelas($ujian->kelas_id, 'green', true) }}</td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Mata Pelajaran</b>
            </td>
            <td width="5">:</td>
            <td>{!! Viewdata::mapel(json_encode([$ujian->mapel_id]), 'green') !!}</td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Remedial</b>
            </td>
            <td width="5">:</td>
            <td>
              <span class="label bg-{{ $ujian->remedial ? 'green' : 'red' }}">{{ $ujian->remedial ? 'Ya' : 'Tidak' }}</span>
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Tanggal Mulai</b>
            </td>
            <td width="5">:</td>
            <td>
              {{ date('d M Y | H:i', strtotime($ujian->date_start)) }}
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Tanggal Selesai</b>
            </td>
            <td width="5">:</td>
            <td>
              {{ date('d M Y | H:i', strtotime($ujian->date_end)) }}
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Waktu Ujian</b>
            </td>
            <td width="5">:</td>
            <td>
              <span class="label bg-blue">{{ $ujian->waktu }} Menit</span>
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Jumlah Soal</b>
            </td>
            <td width="5">:</td>
            <td>
              <span class="label bg-maroon">{{ $ujian->jmlh_soal }} Soal</span>
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Soal Pilihan Ganda</b>
            </td>
            <td width="5">:</td>
            <td>
              <span class="label bg-green">{{ $ujian->soal_ganda }} Soal</span>
            </td>
          </tr>
          <tr>
            <td width="200" class="bg-blue">
              <b>Soal Essay</b>
            </td>
            <td width="5">:</td>
            <td>
              <span class="label bg-yellow">{{ $ujian->soal_essay }} Soal</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
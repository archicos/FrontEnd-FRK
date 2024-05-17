@extends('Template.evaluasi')

@section('content-kegiatan')
    {{-- TAMPILAN BAGIAN EVALUASI PENELITIAN --}}

    {{-- BAGIAN A --}}
    <div id="penelitian-A" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>A. Keterlibatan dalam 1 judul penelitian atau pembuatan karya
                    seni atau teknologi yang dilakukan oleh kelompok (disetujui oleh pimpinan dan tercapai)</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-A"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Posisi (Ketua/ Anggota)
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jumlah Anggota</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2" class="allign-middle fw-bold col-3">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($penelitian_kelompok) && sizeof($penelitian_kelompok) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($penelitian_kelompok as $item)
                                <tr>
                                    <td scope="row">{{ $counter }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['posisi'] }}</td>
                                    <td>{{ $item['jumlah_anggota'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_A-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>
                                {{-- TEMPAT MODAL ADD FILE A --}}
                                <div class="modal fade" id="modalEditEvaluasiPenelitian_A-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPendidikanALabel">A. Kuliah
                                                    (Teori)
                                                    pada tingkat Diploma
                                                    dan S1 terhadap setiap kelompok</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}">
                                                    <input type="hidden" name="jenis_penelitian"
                                                        value="Penelitian_Kelompok" />
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Keterangan dari Pimpinan/Ka LPPM atau Surat
                                                                        Kontrak Penelitian</li>
                                                                    <li>Proposal</li>
                                                                    <li>Laporan progress report bila belum selesai</li>
                                                                    <li>Surat pernyataan dari Ka LPPM bahwa penelitian sudah
                                                                        selesai</li>
                                                                    <li>Laporan akhir penelitian (termasuklog book)</li>
                                                                    <li>Foto karya seni / bukti lain yang relevan jika
                                                                        terkait dengan pengembangan teknologi
                                                                    </li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianA-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianA-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianA-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        id="btnUploadPenelitianA-{{ $item['id_rencana'] }}"
                                                        class="btn btn-primary">Upload Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE A --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianA-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianA-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianA-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianA-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN A --}}

    {{-- BAGIAN B --}}

    {{-- AKHIR BAGIAN B --}}

    {{-- BAGIAN C --}}
    <div id="penelitian-C" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>C. Menulis 1 judul naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya \
                    4 semester (disetujui oleh pimpinan dan tercatat)sama dengan 3 sks.</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-C"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($buku_terbit) && sizeof($buku_terbit) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($buku_terbit as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['jenis_pengerjaan'] }}</td>
                                    <td>{{ $item['peran'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_C-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>

                                {{-- TEMPAT MODAL ADD FILE C --}}
                                <div class="modal fade" id="modalEditEvaluasiPenelitian_C-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPendidikanALabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianCLabel">C. Menulis
                                                    1 judul
                                                    naskah buku yang akan diterbitkan dalam waktu sebanyak-banyaknya \ 4
                                                    semester
                                                    (disetujui oleh pimpinan dan tercatat)
                                                    sama dengan 3 sks.</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Buku_Terbit">
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Buku yang sudah terbit</li>
                                                                    <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                                                    <li>Surat Keterangan Sedang Menulis
                                                                        Buku dari Pimpinan bagi yang sedang menulis buku,
                                                                        dengan
                                                                        mencantumkan akan selesai dalam
                                                                        berapa lama, bagi yang sedang menulis.</li>
                                                                    <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                        proses</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianC-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianC-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianC-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        id="btnUploadPenelitianC-{{ $item['id_rencana'] }}"
                                                        class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE C --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianC-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianC-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianC-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianC-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN C --}}

    {{-- BAGIAN D --}}
    <div id="penelitian-D" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>D. Menulis satu judul naskah buku internasional
                    (berbahasa dan diedarkan secara internasional minimal tiga negara),
                    disetujui oleh pimpinan dan tercatat</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-D"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold col-1">Asesor 1</th>
                            <th scope="col" class="fw-bold col-1">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (isset($buku_internasional) && sizeof($buku_internasional) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($buku_internasional as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['jenis_pengerjaan'] }}</td>
                                    <td>{{ $item['peran'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditEvaluasiPenelitian_D_{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>

                                {{-- TEMPAT MODAL ADD FILE D --}}
                                <div class="modal fade" id="modalEditEvaluasiPenelitian_D_{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditEvaluasiPenelitianDLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditEvaluasiPenelitianDLabel">D. Menulis
                                                    satu
                                                    judul naskah buku internasional
                                                    (berbahasa dan diedarkan secara internasional minimal tiga negara)
                                                    ,
                                                    disetujui oleh pimpinan dan tercatat</h6>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <input type="hidden" name="id_rencana"
                                                        value="{{ $item['id_rencana'] }}" />
                                                    <input type="hidden" name="jenis_penelitian"
                                                        value="Buku_Internasional}">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Buku yang sudah terbit</li>
                                                                    <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                                                    <li>Surat Keterangan Sedang Menulis
                                                                        Buku dari Pimpinan bagi yang sedang menulis buku,
                                                                        dengan
                                                                        mencantumkan akan selesai dalam
                                                                        berapa lama, bagi yang sedang menulis.</li>
                                                                    <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                        proses
                                                                    </li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnD-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number
                                                                    of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div id="selectedFilesD-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputD-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL ADD FILE D --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputD-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesD-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnD-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputD-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN D --}}

    {{-- BAGIAN E --}}
    <div id="penelitian-E" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>E. Menterjemahkan atau menyadur naskah buku teks yang akan diterbitkan
                    dalam waktu sebanyak-banyaknya 4 semester (disetujui oleh pimpinan dan tercatat), sama dengan 2 sks</b>
            </h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-E"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Posisi (Ketua/ Editor/
                                Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($menyadur) && sizeof($menyadur) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($menyadur as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['posisi'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_E-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>

                                    </td>
                                </tr>

                                {{-- MODAL UPLOAD E --}}
                                <div class="modal fade" id="modalEditPenelitian_E-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditPenelitian_E_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_E_label">E.Menterjemahkan
                                                    atau
                                                    menyadur naskah buku teks yang
                                                    akan diterbitkan dalam waktu sebanyak-banyaknya 4 semester (disetujui
                                                    oleh
                                                    pimpinan dan tercatat), sama dengan 2 sks </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Menyadur_Buku" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Buku yang sudah terbit</li>
                                                                    <li>Bukti kontrak penerbitan jika masih naik cetak</li>
                                                                    <li>Surat Keterangan Sedang Menulis Buku dari Pimpinan
                                                                        bagi
                                                                        yang
                                                                        sedang menulis buku, dengan mencantumkan akan
                                                                        selesai
                                                                        dalam
                                                                        berapa lama, bagi yang sedang menulis</li>
                                                                    <li>Progres penulisan buku dll., bagi yang sedang dalam
                                                                        proses</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianE-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianE-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianE-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianE-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD E --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianE-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianE-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianE-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianE-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN E --}}

    {{-- BAGIAN F --}}
    <div id="penelitian-F" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>F. Menyunting satu judul naskah buku yang akan diterbitkan dalam waktu
                    sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat) sama dengan 2 sks</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-F"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Posisi (Ketua/ Editor/
                                Anggota)</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="align-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($menyunting) && sizeof($menyunting) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($menyunting as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['posisi'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_F-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>

                                {{-- MODAL UPLOAD F --}}
                                <div class="modal fade" id="modalEditPenelitian_F-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditPenelitian_F_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_F_label">F. Menyunting
                                                    satu judul
                                                    naskah buku yang akan diterbitkan dalam waktu
                                                    sebanyak-banyaknya 4 semester (disetujui pimpinan dan tercatat) sama
                                                    dengan 2
                                                    sks </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Menyunting_Judul" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas atau Surat Keterangan Telah Menyunting
                                                                        Buku
                                                                        dari
                                                                        Pimpinan dengan
                                                                        mencantumkan akan selesai dalam berapa lama.</li>
                                                                    <li>Buku yang sudah terbit</li>
                                                                    <li>bukti kontrak penerbitan jika masih naik cetak</li>
                                                                    <li>Progres penyuntingan naskah buku</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianF-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianF-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianF-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianF-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD F --}}

                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianF-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianF-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianF-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianF-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN F --}}

    {{-- BAGIAN G --}}
    <div id="penelitian-G" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>G. Menulis Modul/Diktat/Bahan Ajar oleh seorang Dosen yang sesuai dengan
                    bidang ilmu dan tidak diterbitkan, tetapi digunakan oleh mahasiswa</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-G"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Tahap Pencapaian</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2" class="align-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($penelitian_modul) && sizeof($penelitian_modul) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($penelitian_modul as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['status_tahapan'] }}</td>
                                    <td>{{ $item['jenis_pengerjaan'] }}</td>
                                    <td>{{ $item['peran'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_G">Tambah Lampiran</button>
                                    </td>
                                </tr>

                                {{-- MODAL UPLOAD G --}}
                                <div class="modal fade" id="modalEditPenelitian_G" tabindex="-1"
                                    aria-labelledby="modalEditPenelitian_G_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_G_label">G. Menulis
                                                    Modul/Diktat/Bahan Ajar oleh seorang Dosen yang sesuai dengan
                                                    bidang ilmu dan tidak diterbitkan, tetapi digunakan oleh mahasiswa</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Menulis_Modul" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas atau Surat Keputusan Mengajar (mata
                                                                        kuliah
                                                                        yang
                                                                        dimodulkan) dari Pimpinan</li>
                                                                    <li>Modul/Diktat/Bahan Ajar yang sudah jadi</li>
                                                                    <li>Bukti lain yang menunjukkan bahwa modul/diktat/bahan
                                                                        ajar
                                                                        sudah dipergunakan oleh mahasiswa</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianG-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianG-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianG-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianG-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD G --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianG-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianG-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianG-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianG-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN G --}}

    {{-- BAGIAN H --}}
    <div id="penelitian-H" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>H. PEKERTI/AA</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-H"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($penelitian_pekerti) && sizeof($penelitian_pekerti) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($penelitian_pekerti as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_H-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>

                                {{-- MODAL UPLOAD H --}}
                                <div class="modal fade" id="modalEditPenelitian_H-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditPenelitian_H_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_H_label">H. Pekerti/AA
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Pekerti_AA" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas Mengikuti Program Pekerti dari Pimpinan
                                                                    </li>
                                                                    <li>Sertifikat</li>
                                                                    <li>Tugas yang diselesaikan selama pelatihan seperti
                                                                        RKPSS yang
                                                                        sudah siap dll.</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianH-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianH-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianH-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianH-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD H --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianH-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianH-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianH-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianH-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN H --}}

    {{-- BAGIAN I --}}
    <div id="penelitian-I" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body"><b>I. Sebagai asesor Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan
                Tinggi</b>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-I"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Banyaknya BKD yang di
                                Evaluasi
                            </th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($penelitian_tridharma) && sizeof($penelitian_tridharma) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($penelitian_tridharma as $item)
                                <tr>
                                    <td scope="row">1</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['jumlah_bkd'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_I-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>


                                    </td>
                                </tr>

                                {{-- MODAL UPLOAD I --}}
                                <div class="modal fade" id="modalEditPenelitian_I-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditPenelitian_I_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_I_label">I. Sebagai asesor
                                                    Beban Kerja Dosen dan Evaluasi Pelaksanaan Tridharma Perguruan Tinggi
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian"
                                                    value="Penelitian_Tridharma" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas Mengikuti Program Pekerti dari Pimpinan
                                                                    </li>
                                                                    <li>Surat permohonan dari institusi lain</li>
                                                                    <li>Lembar Pengesahan/bukti kegiatan yg disahkan atasan
                                                                    </li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianI-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianI-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianI-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianI-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD I --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianH-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianH-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianH-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianH-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN I --}}

    {{-- BAGIAN J --}}
    <div id="penelitian-J" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>J. Menulis jurnal ilmiah</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-J"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Jenis Pengerjaan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">Peran</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($jurnal_ilmiah) && sizeof($jurnal_ilmiah) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($jurnal_ilmiah as $item)
                                <tr>
                                    <td scope="row">1</td>
                                    <td>{{ $item['nama_kegiatan'] }}</td>
                                    <td>{{ $item['lingkup_penerbit'] }}</td>
                                    <td>{{ $item['jenis_pengerjaan'] }}</td>
                                    <td>{{ $item['peran'] }}</td>
                                    <td>{{ $item['sks_terhitung'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_J-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>
                                    </td>
                                </tr>

                                {{-- MODAL UPLOAD J --}}
                                <div class="modal fade" id="modalEditPenelitian_J-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditPenelitian_J_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_J_label">J. Menulis jurnal
                                                    ilmiah
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Jurnal_Ilmiah" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Jurnal yang sudah diterbitkan atau surat
                                                                        keterangan/penerimaan dr redaksi & naskah, bagi yang
                                                                        belum diterbitkan.</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianJ-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianJ-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianJ-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianJ-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD J --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianJ-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianJ-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianJ-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianJ-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN J --}}

    {{-- BAGIAN K --}}
    <div id="penelitian-K" class="card shadow-sm mt-5 ml-1 mr-1 bg-card">
        <div class="card-body">
            <h6><b>K. Memperoleh hak paten</b></h6>
            <hr />

            <div class="text-sm">
                <table id="tablePenelitian-K"
                    class="table table-striped table-bordered mt-2 text-center align-middle border-secondary-subtle"
                    style="border: 2px;">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-1">No.</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-3">Kegiatan</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold">Kategori</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">SKS Terhitung</th>
                            <th scope="col" colspan="2 " class="allign-middle fw-bold col-2">Status</th>
                            <th scope="col" rowspan="2" class="align-middle fw-bold col-2">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col" class="fw-bold">Asesor 1</th>
                            <th scope="col" class="fw-bold">Asesor 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($hak_paten) && sizeof($hak_paten) > 0)
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($hak_paten as $item)
                                <tr>
                                    <td scope="row">{{ $counter++ }}</td>
                                    <td> {{ $item['nama_kegiatan'] }} </td>
                                    <td> {{ $item['lingkup_wilayah'] }} </td>
                                    <td> {{ $item['sks_terhitung'] }} </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-primary mr-1" data-bs-toggle="modal"
                                            data-bs-target="#modalEditPenelitian_K-{{ $item['id_rencana'] }}">Tambah
                                            Lampiran</button>

                                    </td>
                                </tr>
                                {{-- MODAL UPLOAD K --}}
                                <div class="modal fade" id="modalEditPenelitian_K-{{ $item['id_rencana'] }}"
                                    tabindex="-1" aria-labelledby="modalEditPenelitian_K_label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modalEditPenelitian_K_label">K. Memperoleh hak
                                                    paten</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('ed-add-lampiran-penelitian') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_rencana"
                                                    value="{{ $item['id_rencana'] }}">
                                                <input type="hidden" name="jenis_penelitian" value="Hak_Paten" />

                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6>*Jenis Dokumen yang harus dilengkapi : </h6>
                                                                <ol>
                                                                    <li>Surat Tugas Mengikuti Program Pekerti dari Pimpinan
                                                                    </li>
                                                                    <li>Sertifikat</li>
                                                                    <li>Tugas yang diselesaikan selama pelatihan seperti
                                                                        RKPSS yang
                                                                        sudah siap dll.</li>
                                                                </ol>
                                                                <!-- File input -->
                                                                <button type="button"
                                                                    id="addFilesBtnPenelitianK-{{ $item['id_rencana'] }}"
                                                                    class="btn btn-secondary">Add Files</button>
                                                                <p style="color: #808080;">Maximum file size: 5MB, maximum
                                                                    number of files: 50</p>
                                                                <p class="mb-4">*Dokumen yang dilengkapi dapat lebih dari
                                                                    1 </p>
                                                                <!-- tambahkan jarak bawah -->
                                                                <div class="mt-3 mb-3"> <!-- tambahkan jarak bawah -->
                                                                    <div
                                                                        id="selectedFilesPenelitianK-{{ $item['id_rencana'] }}">
                                                                    </div>
                                                                </div>
                                                                <input type="file"
                                                                    id="fileInputPenelitianK-{{ $item['id_rencana'] }}"
                                                                    name="fileInput[]" style="display: none;" multiple>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        id="btnUploadPenelitianK-{{ $item['id_rencana'] }}">Upload
                                                        Lampiran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- AKHIR MODAL UPLOAD H --}}
                                <script>
                                    // Gunakan fungsi displayFilesWithIcons untuk menampilkan file dengan gambar/logo
                                    document.getElementById("fileInputPenelitianK-{{ $item['id_rencana'] }}").addEventListener("change", function() {
                                        var files = this.files;
                                        const idFiles = "selectedFilesPenelitianK-{{ $item['id_rencana'] }}"
                                        var fileArray = [];
                                        displayFilesWithIcons(files, idFiles, fileArray);
                                    });

                                    document.getElementById("addFilesBtnPenelitianK-{{ $item['id_rencana'] }}").addEventListener("click", function() {
                                        var fileInput = document.getElementById("fileInputPenelitianK-{{ $item['id_rencana'] }}");
                                        fileInput.click();
                                    });
                                </script>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- AKHIR BAGIAN K --}}

    {{-- TEMPAT MODAL DELETE CONFIRM --}}
    <div class="modal fade" id="modalDeleteConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <h1><i class="bi bi-x-circle text-danger"></i></h1>
                    <h5>Yakin untuk menghapus kegiatan ini?</h5>
                    <p class="text-muted small">proses ini tidak dapat diurungkan bila anda sudah menekan tombol 'Yakin'
                    </p>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                    <button id="confirmDeleteBtn" type="button" class="btn btn-danger">Yakin</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL BATAL UPLOAD --}}
    <div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="modalBatal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center" style="padding: 8%;">
                    <h5 class="modal-title" id="modalBatal_label py-5">Apakah anda yakin untuk membatalkan pengumpulan
                        lampiran?</h5>
                    <div class="my-4">
                        <button type="button" class="btn btn-primary mx-3" data-bs-dismiss="modal">Yakin</button>
                        <button type="button" class="btn btn-secondary mx-3">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- AKHIR BAGIAN MODAL BATAL UPLOAD --}}

    {{-- TEMPAT TOAST --}}

    {{-- TOAS EDIT --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="editToast" class="toast bg-success-subtle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-check2-circle"></i>
                Berhasil Mengubah Kegiatan
            </div>
        </div>
    </div>

    {{-- TOAST DELETE --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="deleteToast" class="toast bg-success-subtle" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                <i class="bi bi-check2-circle"></i>
                Berhasil Menghapus Kegiatan
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
@endsection

{{-- BAGIAN A --}}

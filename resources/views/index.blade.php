@extends('layouts.main')

@section('content')
    <div class="card mt-5 bg-dark bg-gradient mb-5">
        <div class="card-body">
            <div class="text-center text-white">
                <div class="p-5">
                    <h1 class="display-6 fw-bold">Pengecekan Status Naskah</h1>
                    <p class="lead">Silahkan Anda masukkan ID Pengguna yang telah diberikan. Sistem pelacakan ini juga menyediakan informasi update secara real-time untuk
                        memastikan transparansi dan kemudahan akses.
                    </p>

                </div>
                {{-- Center the col-lg-8 --}}
                <div class="d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="input-group mb-3">
                            <input type="text" id="id_jurnal" class="form-control" placeholder="Masukan id jurnal"
                                aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary text-white d-block" id="button-cari" type="button">
                                <span class="d-none" id="loading"><span class="spinner-border spinner-border-sm"
                                        role="status" aria-hidden="true"></span>
                                    Loading... </span><span class="d-block" id="cari"> Cari </span></button>


                        </div>
                    </div>
                </div>
                {{-- Area Tabel Hasil Pencarian --}}
                <div class="mt-4 table-responsive">
                    <table class="table table-dark table-striped d-none " id="resultTable">
                        <thead>
                            <tr>
                                <th>Tanggal Submit</th>
                                <th>ID Jurnal</th>
                                <th>Nama Jurnal</th>
                                <th>Nama Artikel</th>
                                <th>Status</th>
                                <th>Tanggal Update Setatus</th>
                            </tr>
                        </thead>
                        <tbody id="resultBody">
                            {{-- Hasil Pencarian Akan Ditampilkan di Sini --}}
                        </tbody>
                    </table>
                    <div id="informasi-status" class="d-none text-start">
                        <h3>Informasi Status</h3>
                        <ul class="list-unstyled">
                            <li>
                                <strong>QC (Quality Control):</strong> Naskah author sedang dicek oleh tim QC sebelum
                                disubmit
                            </li>
                            <li>
                                <strong>QC-Author Confirm:</strong> Naskah sedang berada di author untuk direvisi setelah
                                evaluasi dari QC
                            </li>
                            <li>
                                <strong>Proofreading:</strong> Naskah sedang dalam proses proofreading
                            </li>
                            <li>
                                <strong>Translating:</strong> Naskah sedang dalam proses translating
                            </li>
                            <li>
                                <strong>Submitted:</strong> Naskah sudah berhasil disubmit ke jurnal tujuan dan akan
                                dilakukan follow up secara berkala 3x/minggu
                            </li>
                            <li>
                                <strong>In review:</strong> Naskah sedang dalam review oleh tim reviewer jurnal
                            </li>
                            <li>
                                <strong>Rejected:</strong> Naskah telah ditolak oleh editor. Alasan tertolaknya telah
                                diinformasikan ke email author.
                            </li>
                            <li>
                                <strong>Revision:</strong> Naskah telah mendapat revisi dari editor dan sedang diproses oleh
                                tim
                            </li>
                            <li>
                                <strong>Revision-Submitted:</strong> Naskah telah disubmit kembali ke editor setelah proses
                                revisi
                            </li>
                            <li>
                                <strong>Revision Author:</strong> Naskah sedang berada di author untuk direvisi (setelah
                                revisi dari editor dievaluasi dan dibantu oleh tim terlebih dahulu)
                            </li>
                            <li>
                                <strong>Accepted:</strong> Naskah telah diterima oleh editor
                            </li>
                            <li>
                                <strong>Published:</strong> Naskah telah berhasil terpublikasi
                            </li>
                            <li>
                                <strong>Withdraw:</strong> Naskah ditarik dari jurnal. Alasannya bisa jadi karena editor
                                tidak kunjung membalas email follow up atau alasan lain (silahkan kontak admin)
                            </li>
                            <li>
                                <strong>Stop:</strong> Naskah telah dihentikan layanan asistensinya di Ravi Institute
                            </li>
                            <li>
                                <strong>Hold:</strong> Naskah sedang dalam proses pemantauan intens oleh tim terkait
                                beberapa alasan (mis. permintaan persetujuan turun Q oleh author, pertimbangan penarikan
                                naskah karena editor tidak kunjung merespon, dll)
                            </li>
                            <li>
                                <strong>Special Issue:</strong> Naskah sedang diproses ke Special Issue sebuah jurnal
                            </li>
                            <li>
                                <strong>RE-QC:</strong> Naskah sedang diproses QC kembali terkait alasan rejected
                                berkali-kali atau karena revisi mayor terkait konten oleh editor
                            </li>
                            <li>
                                <strong>RE-QC Author Confirm:</strong> Naskah sedang berada di author untuk direvisi setelah
                                RE-QC
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $('#button-cari').on('click', function() {
            // Ambil nilai id_jurnal dari input
            let id_jurnal = $('#id_jurnal').val();

            if (!id_jurnal) {
                alert('Masukkan ID Jurnal terlebih dahulu!');
                return;
            }

            // Tampilkan spinner dan nonaktifkan tombol
            $('#cari').addClass('d-none');
            $('#loading').removeClass('d-none');
            // Lakukan request GET ke server
            $.get(`/jurnal/${id_jurnal}`, function(response) {
                $('#cari').removeClass('d-none');

                $('#loading').addClass('d-none');

                // Periksa apakah data ditemukan
                if (response.success && response.data) {
                    const jurnal = response.data;

                    // Tampilkan tabel hasil
                    $('#resultTable').removeClass('d-none');
                    $('#informasi-status').removeClass('d-none');
                    $('#resultBody').html(`
                        <tr>
                            <td>${new Date(jurnal.tanggal).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</td>
                            <td>${jurnal.id_jurnal}</td>
                            <td>${jurnal.nm_jurnal}</td>
                            <td>${jurnal.nm_artikel}</td>
                            <td>${jurnal.status}</td>
                            <td>${new Date(jurnal.updated_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</td>
                        </tr>
                    `);
                } else {
                    alert('Data tidak ditemukan.');
                }
                // Tampilkan data dalam console atau manipulasi DOM di sini
            }).fail(function(xhr, status, error) {
                $('#loading').addClass('d-none');
                $('#cari').removeClass('d-none');
                console.error('Terjadi kesalahan:', error);
                alert('Jurnal tidak ditemukan atau terjadi kesalahan!');
            });
        });
    </script>
@endsection

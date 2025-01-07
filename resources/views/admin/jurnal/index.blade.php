@extends('admin.layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Jurnal</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Jurnal</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>

                        <a href="/admin/jurnal/create" class="btn  btn-sm btn-primary">Tambah Data</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <b>N</b>o
                                    </th>
                                    <th>ID Jurnal</th>
                                    <th>Tanggal upload</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($jurnals as $jurnal)
                                    <tr>
                                        <td>{{ $i++ }} </td>
                                        <td>{{ $jurnal->id_jurnal }}</td>
                                        <td>{{ $jurnal->nm_jurnal }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <a href="" data-bs-toggle="modal" data-bs-target="#statusModal">
                                                {{ ucfirst($jurnal->status) }}
                                            </a>




                                        </td>

                                        <td>
                                            <a href="/admin/jurnal/{{ $jurnal->id }}/edit"
                                                class="btn-sm btn btn-success">Edit</a>

                                            <form action="/admin/jurnal/{{ $jurnal->id }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-sm btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus jurnal ini?')">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="statusModal" tabindex="-1"
                                        aria-labelledby="statusModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="/admin/jurnal/status/{{ $jurnal->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="statusModalLabel">Edit Status
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        {{-- Input Status --}}
                                                        <label for="status" class="form-label mt-3">Status</label>
                                                        <select id="status" name="status"
                                                            class="form-control @error('status') is-invalid @enderror">

                                                            <option value="">Pilih Status</option>
                                                            <option value="QC"
                                                                {{ old('status', $jurnal->status) == 'QC' ? 'selected' : '' }}>
                                                                QC</option>
                                                            <option value="QC-Author Confirm"
                                                                {{ old('status', $jurnal->status) == 'QC-Author Confirm' ? 'selected' : '' }}>
                                                                QC-Author
                                                                Confirm</option>
                                                            <option value="Proofreading"
                                                                {{ old('status', $jurnal->status) == 'Proofreading' ? 'selected' : '' }}>
                                                                Proofreading
                                                            </option>
                                                            <option value="Translating"
                                                                {{ old('status', $jurnal->status) == 'Translating' ? 'selected' : '' }}>
                                                                Translating</option>
                                                            <option value="Submitted"
                                                                {{ old('status', $jurnal->status) == 'Submitted' ? 'selected' : '' }}>
                                                                Submitted</option>
                                                            <option value="In review"
                                                                {{ old('status', $jurnal->status) == 'In review' ? 'selected' : '' }}>
                                                                In
                                                                review</option>
                                                            <option value="Rejected"
                                                                {{ old('status', $jurnal->status) == 'Rejected' ? 'selected' : '' }}>
                                                                Rejected
                                                            </option>
                                                            <option value="Revision"
                                                                {{ old('status', $jurnal->status) == 'Revision' ? 'selected' : '' }}>
                                                                Revision
                                                            </option>
                                                            <option value="Revision-Submitted"
                                                                {{ old('status', $jurnal->status) == 'Revision-Submitted' ? 'selected' : '' }}>
                                                                Revision-Submitted</option>
                                                            <option value="Revision Author"
                                                                {{ old('status', $jurnal->status) == 'Revision Author' ? 'selected' : '' }}>
                                                                Revision
                                                                Author</option>
                                                            <option value="Accepted"
                                                                {{ old('status', $jurnal->status) == 'Accepted' ? 'selected' : '' }}>
                                                                Accepted
                                                            </option>
                                                            <option value="Published"
                                                                {{ old('status', $jurnal->status) == 'Published' ? 'selected' : '' }}>
                                                                Published</option>
                                                            <option value="Withdraw"
                                                                {{ old('status', $jurnal->status) == 'Withdraw' ? 'selected' : '' }}>
                                                                Withdraw
                                                            </option>
                                                            <option value="Stop"
                                                                {{ old('status', $jurnal->status) == 'Stop' ? 'selected' : '' }}>
                                                                Stop</option>
                                                            <option value="Hold"
                                                                {{ old('status', $jurnal->status) == 'Hold' ? 'selected' : '' }}>
                                                                Hold</option>
                                                            <option value="Special Issue"
                                                                {{ old('status', $jurnal->status) == 'Special Issue' ? 'selected' : '' }}>
                                                                Special Issue
                                                            </option>
                                                            <option value="RE-QC"
                                                                {{ old('status', $jurnal->status) == 'RE-QC' ? 'selected' : '' }}>
                                                                RE-QC</option>
                                                            <option value="RE-QC Author Confirm"
                                                                {{ old('status', $jurnal->status) == 'RE-QC Author Confirm' ? 'selected' : '' }}>
                                                                RE-QC Author Confirm</option>
                                                        </select>
                                                        @error('status')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                    </div>
                    @endforeach

                    </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

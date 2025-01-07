@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Jurnal</h5>

            <form action="/admin/jurnal" method="POST">
                @csrf


                {{-- Input Tanggal --}}
                <label for="tanggal" class="form-label mt-3">Tanggal Upload</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal') }}">
                @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                {{-- Input Nama Jurnal --}}
                <label for="nm_jurnal" class="form-label mt-3">Nama Jurnal</label>
                <input type="text" id="nm_jurnal" name="nm_jurnal"
                    class="form-control @error('nm_jurnal') is-invalid @enderror" value="{{ old('nm_jurnal') }}">
                @error('nm_jurnal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror


                <label for="status" class="form-label mt-3">Status</label>
                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="">Pilih Status</option>
                    <option value="QC" {{ old('status') == 'QC' ? 'selected' : '' }}>QC</option>
                    <option value="QC-Author Confirm" {{ old('status') == 'QC-Author Confirm' ? 'selected' : '' }}>QC-Author
                        Confirm</option>
                    <option value="Proofreading" {{ old('status') == 'Proofreading' ? 'selected' : '' }}>Proofreading
                    </option>
                    <option value="Translating" {{ old('status') == 'Translating' ? 'selected' : '' }}>Translating</option>
                    <option value="Submitted" {{ old('status') == 'Submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="In review" {{ old('status') == 'In review' ? 'selected' : '' }}>In review</option>
                    <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="Revision" {{ old('status') == 'Revision' ? 'selected' : '' }}>Revision</option>
                    <option value="Revision-Submitted" {{ old('status') == 'Revision-Submitted' ? 'selected' : '' }}>
                        Revision-Submitted</option>
                    <option value="Revision Author" {{ old('status') == 'Revision Author' ? 'selected' : '' }}>Revision
                        Author</option>
                    <option value="Accepted" {{ old('status') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="Published" {{ old('status') == 'Published' ? 'selected' : '' }}>Published</option>
                    <option value="Withdraw" {{ old('status') == 'Withdraw' ? 'selected' : '' }}>Withdraw</option>
                    <option value="Stop" {{ old('status') == 'Stop' ? 'selected' : '' }}>Stop</option>
                    <option value="Hold" {{ old('status') == 'Hold' ? 'selected' : '' }}>Hold</option>
                    <option value="Special Issue" {{ old('status') == 'Special Issue' ? 'selected' : '' }}>Special Issue
                    </option>
                    <option value="RE-QC" {{ old('status') == 'RE-QC' ? 'selected' : '' }}>RE-QC</option>
                    <option value="RE-QC Author Confirm" {{ old('status') == 'RE-QC Author Confirm' ? 'selected' : '' }}>
                        RE-QC Author Confirm</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror


                <div class="submit mt-3">
                    <a href="/admin/jurnal" class="btn btn-secondary">Kembali</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>

        </div>
    </div>
@endsection

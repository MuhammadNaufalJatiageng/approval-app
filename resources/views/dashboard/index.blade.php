@extends('layout.main')

@section('body')
<div class="row d-flex align-items-center mt-1">
  <div class="col-sm-2">
    <div class="content-wrapper mb-1">
      <a href="/create" class="btn btn-primary p-2 fs-5" data-bs-toggle="modal" data-bs-target="#modalcreate">
        <i class="bi bi-upload"></i>
        Upload
      </a>
    </div>
  </div>
  {{-- ALERT --}}
  <div class="col-sm-5">
    @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @error('deskripsi')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @enderror
    @error('file_permohonan_adp')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @enderror
    @error('file_estimasi_adp')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @enderror
  </div>

  <div class="col-md">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</div>

<div class="main-content">
    <div class="tabel mt-2">
        <table class="table-secondary table-bordered" cell-padding="2px">
            <thead class="bg-dark">
              <tr class="table-dark">
                <th scope="col" class="no">No</th>
                <th scope="col" class="divisi">DIVISI</th>
                <th scope="col" class="no-dokumen">N0. DOKUMEN</th>
                <th scope="col" class="desc">DESKRIPSI</th>
                <th scope="col" class="file">FILE PERMOHONAN ADP</th>
                <th scope="col" class="file">FILE ESTIMASI ADP</th>
                <th scope="col" class="date">INPUT DATE</th>
                <th scope="col" class="no-adp">NO. ADP</th>
                <th scope="col" class="no-capex">NO. CAPEX</th>
                <th scope="col" class="approval">OFC</th>
                <th scope="col" class="approval">GL</th>
                <th scope="col" class="approval">M</th>
                <th scope="col" class="approval">FM</th>
                <th scope="col" class="approval">ACC</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($proposals as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->divisi }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ mb_strimwidth($item->deskripsi, 0,55,'...') }}</td>
                    <td>
                      <a href="/file_permohonan/{{ $item->file_permohonan_adp }}" download>{{ mb_strimwidth($item->file_permohonan_adp, 0, 17, '...') }}</a>
                    </td>
                    <td>
                      <a href="/file_estimasi/{{ $item->file_estimasi_adp }}" download>{{ mb_strimwidth($item->file_estimasi_adp, 0, 17, '...') }}</a>
                    </td>
                    <td>{{ mb_strimwidth($item->created_at, 0, 10) }}</td>
                    <td>{{ $item->no_adp }}</td>
                    <td>{{ $item->no_capex }}</td>
                    <td class="approved"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <div class="paginasi my-2 me-1">
      {{ $proposals->links() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalcreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalcreateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <form action="/" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalcreateLabel">Upload Permohonan ADP</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="mb-4">
            <label for="deskripsi" class="form-label text-dark fs-5 fw-medium">Deskripsi :</label>

            <textarea class="form-control border-dark text-dark fs-5 fw-medium @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="2" value="{{ old('deskripsi') }}" sutofocus required></textarea>
          </div>

          <div class="mb-4">
            <label for="file-permohonan-adp" class="form-label text-dark fs-5 fw-medium">File Permohonan ADP :</label>
            <input type="file" name="file_permohonan_adp" class="form-control border-dark fs-5 fw-medium @error('file_permohonan_adp') is-invalid @enderror" id="file-permohonan-adp" required>
          </div>

          <div class="mb-4">
            <label for="file-estimasi-adp" class="form-label text-dark fs-5 fw-medium">File Estimasi ADP :</label>
            <input type="file" name="file_estimasi_adp" class="form-control border-dark fs-5 fw-medium @error('file_estimasi_adp') is-invalid @enderror" id="file-estimasi-adp" required>
          </div>
          
          <div class="mb-4">
            <label for="divisi" class="form-label text-dark fs-5 fw-medium">Divisi</label>
            <select class="form-select fs-5 fw-medium border-dark @error('divisi') is-invalid @enderror" aria-label="Default select example" id="divisi" name="divisi" required>
              <option value="FL" class="fs-5 fw-medium">FL</option>
              <option value="PROSES" class="fs-5 fw-medium">PROSES</option>
              <option value="PGA" class="fs-5 fw-medium">PGA</option>
              <option value="Teknik" class="fs-5 fw-medium">Teknik</option>
              <option value="PPIC" class="fs-5 fw-medium">PPIC</option>
              <option value="ECOMMERCE" class="fs-5 fw-medium">ECOMMERCE</option>
              <option value="QC" class="fs-5 fw-medium">QC</option>
              <option value="SALES" class="fs-5 fw-medium">SALES</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection

@section('script')
  <script src="/js/dashboard.js"></script>
@endsection
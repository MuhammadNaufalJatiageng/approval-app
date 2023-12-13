<div class="row d-flex align-items-center my-1">
    {{-- Upload Button --}}
    @if (auth()->user()->role_name === 'staff' && Request::is('dashboard'))
      <div class="col-sm-2">
        <div class="content-wrapper mb-1">
          <a href="/create" class="btn btn-primary p-2 fs-5" data-bs-toggle="modal" data-bs-target="#modalcreate">
            <i class="bi bi-upload"></i>
            Upload
          </a>
        </div>
      </div>
    @endif
    {{-- ALERT --}}
    <div class="col-sm-5">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session('warning') }}</strong>
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
    {{-- Searchbar --}}
    {{-- <div class="col-md">
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div> --}}
</div>
@extends('layout.main')

@section('body')

@include('dashboard.partials.headerMainContent')

<div class="main-content">
    <div class="row">
        <div class="col-sm border-end">
            <div class="title">
                <h3>Informasi Akun</h3>
            </div>
            <div class="mt-3">
                <form action="/user/{{ auth()->user()->id }}" method="post">
                    @csrf
                    <input type="hidden" name="role_id" value="{{ auth()->user()->role_id }}">
                    <input type="hidden" name="role_name" value="{{ auth()->user()->role_name }}">
                    <div>
                        <label for="role" class="fw-bolder">Peran :</label>
                        <input type="text" id="role" name="role" class="form-control my-2" value="{{ auth()->user()->role_name }}" disabled>
                    </div>
                    <div>
                        <label for="name" class="fw-bolder">Nama :</label>
                        <input type="text" id="name" name="name" class="form-control my-2" value="{{ auth()->user()->name }}">
                    </div>
                    <div>
                        <label for="username" class="fw-bolder">Username :</label>
                        <input type="text" id="username" name="username" class="form-control my-2" value="{{ auth()->user()->username }}">
                    </div>
                    <div>
                        <label for="password" class="fw-bolder">Password :</label>
                        <input type="text" id="password" name="password" class="form-control my-2">
                    </div>
                    <button class="btn btn-primary mt-3">Perbarui</button>
                </form>
            </div>
        </div>
        
        <div class="col-sm border-start">
            @if (auth()->user()->role_id === 1)
                <div class="title">
                    <h3>Tambah Akun</h3>
                </div>
                <div class="mt-3">
                    <form action="/user" method="post">
                        @csrf
                        <div>
                            <label for="name" class="fw-bolder">Nama :</label>
                            <input type="text" id="name" name="name" class="form-control my-2 @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="form-text mb-3 text-danger" id="basic-addon4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="fw-bolder">Username :</label>
                            <input type="text" id="username" name="username" class="form-control my-2 @error('username') is-invalid @enderror">
                            @error('username')
                                <div class="form-text mb-3 text-danger" id="basic-addon4">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="fw-bolder">Password :</label>
                            <input type="text" id="password" name="password" class="form-control my-2 @error('password') is-invalid @enderror" autocomplete="off">
                            @error('password')
                                <div class="form-text mb-3 text-danger" id="basic-addon4">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-3">Buat Akun</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
    
@endsection

@section('script')
  <script src="/js/alert.js"></script>
@endsection
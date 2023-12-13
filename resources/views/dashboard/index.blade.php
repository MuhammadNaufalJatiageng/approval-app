{{-- @dd(auth()->user()->role()->name); --}}
@extends('layout.main')

@section('body')
{{-- Header Main Content ( Upload Button, Alert, Searchbar) --}}
@include('dashboard.partials.headerMainContent')

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
                @if (auth()->user()->role_id === 2)
                  <th scope="col" class="action">ACTION</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($proposals as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->divisi }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->deskripsi}}</td>
                    <td class="text-center">
                      <a href="/file_permohonan/{{ $item->file_permohonan_adp }}" download><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                    </td>
                    <td class="text-center">
                      <a href="/file_estimasi/{{ $item->file_estimasi_adp }}" download><i class="bi bi-file-earmark-arrow-down-fill"></i></a>
                    </td>
                    <td>{{ mb_strimwidth($item->created_at, 0, 10) }}</td>
                    <td>{{ $item->no_adp }}</td>
                    <td>{{ $item->no_capex }}</td>
                    <td class="{{ ($item->ofc === 1 ? 'approved' : '') }}"></td>
                    <td class="{{ ($item->gl === 1 ? 'approved' : '') }}"></td>
                    <td class="{{ ($item->manager === 1 ? 'approved' : '') }}"></td>
                    <td class="{{ ($item->fm === 1 ? 'approved' : '') }}"></td>
                    <td class="{{ ($item->acc === 1 ? 'approved' : '') }}"></td>
                    @if (auth()->user()->role->name === "approver")
                      <td class="text-center">
                        <form action="/dashboard/{{ $item->id }}" method="post" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <button type="submit" class="btn btn-primary">Approve</button>
                        </form>
                      </td>
                    @endif
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
@include('dashboard.partials.modalCreate')
@endsection

@section('script')
  <script src="/js/modal.js"></script>
  <script src="/js/alert.js"></script>
@endsection
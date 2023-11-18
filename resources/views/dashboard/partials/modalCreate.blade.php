<div class="modal fade" id="modalcreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalcreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
  
        <form action="/dashboard" method="post" enctype="multipart/form-data">
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
<!-- Edit Complaint Modal -->
<div class="modal fade" id="editComplaintModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="editComplaintModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editComplaintModalLabel{{ $item->id }}">
                    Edit Keluhan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('complaints.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title{{ $item->id }}" class="form-label">Judul
                            Keluhan</label>
                        <input type="text" class="form-control" id="title{{ $item->id }}" name="title"
                            value="{{ $item->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description{{ $item->id }} " class="form-label">
                            Deskripsi
                        </label>
                        <textarea class="form-control ckeditor" id="description{{ $item->id }}" name="description" rows="3" required>{{ $item->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" formnovalidate="formnovalidate">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Balas Modal -->
<div class="modal fade" id="editComplaintModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="editComplaintModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <form action="{{ route('list-complaints.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editComplaintModalLabel{{ $item->id }}">Balas Keluhan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="reply{{ $item->id }} " class="form-label">
                            Balasan
                        </label>
                        <textarea class="form-control ckeditor" id="reply{{ $item->id }}" name="reply" rows="3" required>{{ $item->reply }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" formnovalidate="formnovalidate">Kirim Balasan</button>
                </div>
            </form>
        </div>
    </div>
</div>

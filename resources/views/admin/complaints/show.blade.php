<!-- Detail Complaint Modal -->
<div class="modal fade" id="detailComplaintModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="detailComplaintModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailComplaintModalLabel{{ $item->id }}">Detail Keluhan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Judul Keluhan:</strong> {{ $item->title }}</p>
                <p><strong>Deskripsi:</strong></p>
                <p>{!! $item->description !!}</p>
                <p><strong>Balasan:</strong></p>
                <p>{!! $item->reply !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

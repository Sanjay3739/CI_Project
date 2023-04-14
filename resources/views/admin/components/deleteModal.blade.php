<div class="modal fade" id="deleteModal-{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <form action="{{ route($form_action, $id) }}" method="Post">
                @csrf
                @method('DELETE')
                <div class='d-flex justify-content-between'>
                    <div class="py-2">
                        <h5>Confirm Delete</h5>
                    </div>

                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="border:none;background:none;">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="fs-5 pb-4">
                    Are you sure you want to delete this item?
                </div>
                <div class="d-flex py-4 justify-content-center">
                    <div class="px-1">
                        <button type="button" class="btn btn-outline-secondary px-4 rounded-pill"
                            data-dismiss="modal">Close</button>
                    </div>
                    <div class="px-1">
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4">Delete</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

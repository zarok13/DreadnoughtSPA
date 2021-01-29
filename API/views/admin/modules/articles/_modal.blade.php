<div class="modal fade confirm_delete" id="confirm_delete" tabindex="-1" role="dialog" aria-labelledby="confirm_delete_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm_delete_label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to remove this {{ $item->title }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="{{ route($moduleName . '.delete', $item->lang_id)}}" class="btn btn-danger">Delete </a>
            </div>
        </div>
    </div>
</div>


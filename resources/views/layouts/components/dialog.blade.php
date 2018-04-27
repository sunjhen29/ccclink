<div class="modal modal-success fade" id="myDialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="myDialogForm" method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="message"></p>
                    <input type="hidden" name="declined_reason" id="declined_reason" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="myModal" class="modal modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="myForm" method="POST" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    @yield('modal_form')
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn-save" class="btn btn-success"></button>
                </div>
            </form>
        </div>
    </div>
</div>
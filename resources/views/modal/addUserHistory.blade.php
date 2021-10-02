<!-- BEGIN: Modal Content -->
<div id="modal_user_history" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Nueva Historia de usuario</h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <form id="modal_form_user_history">
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="user_story_name" class="form-label">Nombre</label>
                        <input id="user_story_name" type="text" class="form-control"
                               placeholder="Nombre de la historia">
                        <div id="error-user_story_name"
                             class="projet__input-error w-5/6 text-theme-6 mt-2"></div>

                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="user_story_comment" class="form-label">Comentario</label>
                        <textarea id="user_story_comment" class="form-control" placeholder="Comentario">
                    </textarea>
                        <div id="error-user_story_comment"
                             class="projet__input-error w-5/6 text-theme-6 mt-2"></div>

                    </div>
                    <div class="font-medium text-base mr-auto">Ticket</div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="ticket_name" class="form-label">Nombre</label>
                        <input id="ticket_name" type="text" class="form-control" placeholder="Nombre del ticket">
                        <div id="error-ticket_name" class="projet__input-error w-5/6 text-theme-6 mt-2"></div>

                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="ticket_comment" class="form-label">Comentario</label>
                        <textarea id="ticket_comment" class="form-control" placeholder="Comentario">
                    </textarea>
                        <div id="error-ticket_comment" class="projet__input-error w-5/6 text-theme-6 mt-2"></div>

                    </div>

                </div>
            </form>
            <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer text-right">
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancelar</button>
                <button type="button" id="btn-modal-user-history-store" class="btn btn-primary w-20">Agregar</button>
            </div>
            <!-- END: Modal Footer -->
        </div>
    </div>
</div>
<!-- END: Modal Content -->

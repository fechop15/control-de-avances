<!-- BEGIN: Modal Content -->
<div id="modal_ticket" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Actualizar Ticket</h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <form id="modal_form_ticket">
            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <input id="modal_ticket_id" type="hidden">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal_ticket_name" class="form-label">Nombre</label>
                        <input id="modal_ticket_name" type="text" class="form-control" placeholder="Nombre del ticket">
                        <div id="error-modal_user_history_name"
                             class="ticket__input-error w-5/6 text-theme-6 mt-2"></div>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal_ticket_comment" class="form-label">Comentario</label>
                        <textarea id="modal_ticket_comment" class="form-control" placeholder="Comentario">

                    </textarea>
                        <div id="error-modal_user_history_name"
                             class="ticket__input-error w-5/6 text-theme-6 mt-2"></div>
                    </div>
                    <div class="col-span-12 sm:col-span-12" id="modal_ticket_state_div" >
                        <label for="modal_ticket_state" class="form-label">Estado</label>
                        <select id="modal_ticket_state" class="form-select">
                            <option>Activo</option>
                            <option>En proceso</option>
                            <option>Finalizado</option>
                            <option>Cancelado</option>
                        </select>
                    </div>
            </div>
            </form>
            <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer text-right">
                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancelar</button>
                <button type="button" id="btn-modal-user-history-update" class="btn btn-primary w-20">Actualizar</button>
                <button type="button" id="btn-modal-user-history-store" class="btn btn-primary w-20">Guardar</button>
            </div>
            <!-- END: Modal Footer -->
        </div>
    </div>
</div>
<!-- END: Modal Content -->

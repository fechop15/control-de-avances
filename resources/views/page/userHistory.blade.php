@extends('../layout/' . $layout)

@section('subhead')
    <title>{{\Request::route()->getName()}} - {{env('APP_NAME')}}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">{{$userStory->name}}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2 btn-new-ticket">Agregar Ticket</button>
        </div>
        <br>
    </div>
    <p class="intro-y text-lg font-small">{{$userStory->comment}}</p>

    <div class="intro-y grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 md:col-span-3 lg:col-span-3">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5 bg-theme-1">
                    <h2 class="font-medium text-base mr-auto text-white	">Activo</h2>
                </div>
                <div id="basic-accordion" class="p-5">
                    <div class="preview">
                        <div id="faq-accordion-1" class="accordion">
                            @foreach($userStory->tickets->where('state', 'Activo') as $ticket)
                                <div class="accordion-item">
                                    <div id="faq-accordion-content-{{$ticket->id}}" class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-accordion-collapse-{{$ticket->id}}"
                                                aria-expanded="false"
                                                aria-controls="faq-accordion-collapse-{{$ticket->id}}">
                                            {{$ticket->name}}
                                        </button>
                                    </div>
                                    <div id="faq-accordion-collapse-{{$ticket->id}}" class="accordion-collapse collapse"
                                         aria-labelledby="faq-accordion-content-{{$ticket->id}}"
                                         data-bs-parent="#faq-accordion-1"
                                         style="display: none;">
                                        <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                            {{$ticket->comment}}
                                            <div class="font-medium flex mt-5">
                                                <button type="button"
                                                        class="btn-update-ticket btn btn-primary bg-theme-1 text-white py-1 px-2 ml-auto ml-auto" data="{{$ticket}}">
                                                    Editar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-3 lg:col-span-3">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5 bg-theme-11">
                    <h2 class="font-medium text-base mr-auto text-white	">En proceso</h2>
                </div>
                <div id="basic-accordion" class="p-5">
                    <div class="preview">
                        <div id="faq-accordion-1" class="accordion">
                            @foreach($userStory->tickets->where('state', 'En proceso') as $ticket)
                                <div class="accordion-item">
                                    <div id="faq-accordion-content-{{$ticket->id}}" class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-accordion-collapse-{{$ticket->id}}"
                                                aria-expanded="false"
                                                aria-controls="faq-accordion-collapse-{{$ticket->id}}">
                                            {{$ticket->name}}
                                        </button>
                                    </div>
                                    <div id="faq-accordion-collapse-{{$ticket->id}}" class="accordion-collapse collapse"
                                         aria-labelledby="faq-accordion-content-{{$ticket->id}}"
                                         data-bs-parent="#faq-accordion-1"
                                         style="display: none;">
                                        <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                            {{$ticket->comment}}
                                            <div class="font-medium flex mt-5">
                                                <button type="button"
                                                        class="btn-update-ticket btn btn-primary bg-theme-11 text-white py-1 px-2 ml-auto ml-auto" data="{{$ticket}}">
                                                    Editar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-3 lg:col-span-3">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5 bg-theme-9 ">
                    <h2 class="font-medium text-base mr-auto text-white	">Finalizado</h2>
                </div>
                <div id="basic-accordion" class="p-5">
                    <div class="preview">
                        <div id="faq-accordion-1" class="accordion">
                            @foreach($userStory->tickets->where('state', 'Finalizado') as $ticket)
                                <div class="accordion-item">
                                    <div id="faq-accordion-content-{{$ticket->id}}" class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-accordion-collapse-{{$ticket->id}}"
                                                aria-expanded="false"
                                                aria-controls="faq-accordion-collapse-{{$ticket->id}}">
                                            {{$ticket->name}}
                                        </button>
                                    </div>
                                    <div id="faq-accordion-collapse-{{$ticket->id}}" class="accordion-collapse collapse"
                                         aria-labelledby="faq-accordion-content-{{$ticket->id}}"
                                         data-bs-parent="#faq-accordion-1"
                                         style="display: none;">
                                        <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                            {{$ticket->comment}}
                                            <div class="font-medium flex mt-5">
                                                <button type="button"
                                                        class="btn-update-ticket btn btn-primary bg-theme-9 text-white py-1 px-2 ml-auto ml-auto" data="{{$ticket}}">
                                                    Editar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-3 lg:col-span-3">
            <div class="intro-y box">
                <div
                    class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5 bg-theme-6 ">
                    <h2 class="font-medium text-base mr-auto text-white">Cancelado</h2>
                </div>
                <div id="basic-accordion" class="p-5">
                    <div class="preview">
                        <div id="faq-accordion-1" class="accordion">
                            @foreach($userStory->tickets->where('state', 'Cancelado') as $ticket)
                                <div class="accordion-item">
                                    <div id="faq-accordion-content-{{$ticket->id}}" class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-accordion-collapse-{{$ticket->id}}"
                                                aria-expanded="false"
                                                aria-controls="faq-accordion-collapse-{{$ticket->id}}">
                                            {{$ticket->name}}
                                        </button>
                                    </div>
                                    <div id="faq-accordion-collapse-{{$ticket->id}}" class="accordion-collapse collapse"
                                         aria-labelledby="faq-accordion-content-{{$ticket->id}}"
                                         data-bs-parent="#faq-accordion-1"
                                         style="display: none;">
                                        <div class="accordion-body text-gray-700 dark:text-gray-600 leading-relaxed">
                                            {{$ticket->comment}}
                                            <div class="font-medium flex mt-5">
                                                <button type="button"
                                                        class="btn-update-ticket btn btn-primary bg-theme-6 text-white py-1 px-2 ml-auto ml-auto" data="{{$ticket}}" >
                                                    Editar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modal.editTicket')

@endsection

@section('script')
    <script>
        cash(function () {
            cash('.btn-update-ticket').on('click', function() {
                console.log(cash(this).attr('data'));
                let ticket=JSON.parse(cash(this).attr('data'));
                cash('#modal_ticket_id').val(ticket.id);
                cash('#modal_ticket_name').val(ticket.name);
                cash('#modal_ticket_comment').val(ticket.comment);
                cash('#modal_ticket_state').val(ticket.state);
                cash('#modal_ticket_state h2').html('Actualizar Ticket');
                cash('#modal_ticket_state_div').show();
                cash('#btn-modal-user-history-update').show();
                cash('#btn-modal-user-history-store').hide();
                cash('#modal_ticket').modal('show');
            });

            cash('.btn-new-ticket').on('click', function() {
                cash('#modal_ticket_state h2').html('Nuevo Ticket');
                cash('#modal_ticket_id').val(0);
                cash('#modal_ticket_name').val('');
                cash('#modal_ticket_comment').val('');
                cash('#modal_ticket_state').val('Activo');
                cash('#modal_ticket_state_div').hide();
                cash('#btn-modal-user-history-store').show();
                cash('#btn-modal-user-history-update').hide();
                cash('#modal_ticket').modal('show');
            });

            async function updateTicket() {
                // Reset state
                cash('#ticket-form').find('.ticket__input').removeClass('border-theme-6')
                cash('#ticket-form').find('.ticket__input-error').html('')

                // Loading state
                cash('#btn-modal-user-history-update').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)

                axios.put(`/request/ticket/`+cash('#modal_ticket_id').val(), {
                    name: cash('#modal_ticket_name').val(),
                    comment: cash('#modal_ticket_comment').val(),
                    state: cash('#modal_ticket_state').val(),
                }).then(res => {
                    cash('#modal_ticket').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ok!',
                        text: "Ticket actualizado",
                        showConfirmButton: false,
                        timer: 1500,
                        willClose: () => {
                            location.reload();
                        }
                    });
                }).catch(err => {
                    cash('#btn-modal-user-history-update').html('Actualizar')
                    if (err.response.data.message != 'Wrong email or password.') {
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            cash(`#${key}`).addClass('border-theme-6')
                            cash(`#error-${key}`).html(val)
                        }
                    } else {
                        cash(`#password`).addClass('border-theme-6')
                        cash(`#error-password`).html(err.response.data.message)
                    }
                })
            }

            async function storeTicket() {
                // Reset state
                cash('#ticket-form').find('.ticket__input').removeClass('border-theme-6')
                cash('#ticket-form').find('.ticket__input-error').html('')

                // Loading state
                cash('#btn-modal-user-history-store').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)

                axios.post(`/request/ticket/`, {
                    name: cash('#modal_ticket_name').val(),
                    comment: cash('#modal_ticket_comment').val(),
                }).then(res => {
                    cash('#modal_ticket').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ok!',
                        text: "Ticket Creado",
                        showConfirmButton: false,
                        timer: 1500,
                        willClose: () => {
                            location.reload();
                        }
                    });
                }).catch(err => {
                    cash('#btn-modal-user-history-store').html('Guardar')
                    if (err.response.data.message != 'Wrong email or password.') {
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            cash(`#${key}`).addClass('border-theme-6')
                            cash(`#error-${key}`).html(val)
                        }
                    } else {
                        cash(`#password`).addClass('border-theme-6')
                        cash(`#error-password`).html(err.response.data.message)
                    }
                })
            }

            cash('#btn-modal-user-history-update').on('click', function() {
                updateTicket()
            })

            cash('#btn-modal-user-history-store').on('click', function() {
                storeTicket()
            })

        })
    </script>
@endsection

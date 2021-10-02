@extends('../layout/' . $layout)

@section('subhead')
    <title>{{\Request::route()->getName()}} - {{env('APP_NAME')}}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Proyecto: {{$projet->name}}</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary btn-new-projet shadow-md mr-2">Agregar historia de usuario</button>
        </div>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="col-span-12 lg:col-span-12 xxl:col-span-10">
            <div class="grid grid-cols-12 gap-5 mt-5">
                @foreach($projet->userStories as $userStory)
                <div class="col-span-12 sm:col-span-4 xxl:col-span-3 box p-5 cursor-pointer zoom-in">
                    <a href="/proyecto/{{$projet->id}}/{{$userStory->id}}">
                    <div class="font-medium text-base">{{$userStory->name}}</div>
                    <div class="text-gray-600">{{$userStory->tickets->count()}} Tickets</div>
                    <div class="mt-8">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                            <span class="truncate">Activo</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">{{$userStory->tickets->where('state', 'Activo')->count()}}</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                            <span class="truncate">En proceso</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">{{$userStory->tickets->where('state', 'En proceso')->count()}}</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div>
                            <span class="truncate">Finalizado</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">{{$userStory->tickets->where('state', 'Finalizado')->count()}}</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                            <span class="truncate">Cancelado</span>
                            <div
                                class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">{{$userStory->tickets->where('state', 'Cancelado')->count()}}</span>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('modal.addUserHistory')

@endsection

@section('script')
    <script>
        cash(function () {

            cash('.btn-new-projet').on('click', function() {
                cash('#modal_user_history h2').html('Nueva historia de usuario');
                cash('#modal_user_history').modal('show');
            });

            async function storeTicket() {
                // Reset state
                cash('#modal_form_user_history').find('.projet__input').removeClass('border-theme-6')
                cash('#modal_form_user_history').find('.projet__input-error').html('')

                // Loading state
                cash('#btn-modal-user-history-store').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)

                axios.post(`/request/user_story`, {
                    user_story_name: cash('#user_story_name').val(),
                    user_story_comment: cash('#user_story_comment').val(),
                    ticket_name: cash('#ticket_comment').val(),
                    ticket_comment: cash('#ticket_comment').val(),
                }).then(res => {
                    cash('#modal_user_history').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Ok!',
                        text: "Historia de usuario agregada",
                        showConfirmButton: false,
                        timer: 1500,
                        willClose: () => {
                            location.reload();
                        }
                    });
                }).catch(err => {
                    cash('#btn-modal-user-history-store').html('Agregar')
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

            cash('#btn-modal-user-history-store').on('click', function() {
                storeTicket()
            })

        })
    </script>
@endsection

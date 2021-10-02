@extends('../layout/' . $layout)

@section('subhead')
    <title>{{\Request::route()->getName()}} - {{env('APP_NAME')}}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Bienvenido</h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ auth()->user()->name  }}</div>
                    <div class="text-gray-600">{{ auth()->user()->company->name }}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3 font-bold	">Informacion de la empresa</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <strong>Nombre: </strong>{{auth()->user()->company->name}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <strong>Nit: </strong>  {{auth()->user()->company->nit}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <strong>Teléfono: </strong>  {{auth()->user()->company->phone}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <strong>Dirección: </strong>  {{auth()->user()->company->address}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <strong>Correo electrónico: </strong> {{auth()->user()->company->email}}
                    </div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 dark:text-gray-300 px-5 border-l border-r border-gray-200 dark:border-dark-5 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3 font-bold	">Informacion general</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center">
                        <strong>Proyectos: </strong>{{auth()->user()->company->projets->count()}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <strong>Historias de usuario: </strong>  {{$countUserStory}}
                    </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3">
                        <strong>Tickets: </strong>  {{$countTickets}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Latest Uploads -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">Ultimos proyectos</h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>
                            </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a href="javascript:;" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">All Files</a>
                                </div>
                            </div>
                        </div>
                        <a href="/proyectos" class="btn btn-outline-secondary hidden sm:flex">Ver todos</a>
                    </div>
                    <div class="p-5">
                        @foreach(auth()->user()->company->projets->take(3) as $projet)
                        <div class="flex items-center mt-5">
                            <div class="file">
                                <a href="/proyecto/{{$projet->id}}" class="w-12 file__icon file__icon--directory"></a>
                            </div>
                            <div class="ml-4">
                                <a class="font-medium" href="/proyecto/{{$projet->id}}">{{$projet->name}}</a>
                                <div class="text-gray-600 text-xs mt-0.5">{{$projet->userStories->count()}} Historias de usuarios</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- END: Latest Uploads -->
{{--                <!-- BEGIN: Work In Progress -->--}}
{{--                <div class="intro-y box col-span-12 lg:col-span-6">--}}
{{--                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">--}}
{{--                        <h2 class="font-medium text-base mr-auto">Work In Progress</h2>--}}
{{--                        <div class="dropdown ml-auto sm:hidden">--}}
{{--                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">--}}
{{--                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>--}}
{{--                            </a>--}}
{{--                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">--}}
{{--                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">--}}
{{--                                    <a id="work-in-progress-new-tab" href="javascript:;" data-toggle="tab" data-target="#work-in-progress-new" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-controls="work-in-progress-new" aria-selected="true">New</a>--}}
{{--                                    <a id="work-in-progress-last-week-tab" href="javascript:;" data-toggle="tab" data-target="#work-in-progress-last-week" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-selected="false">Last Week</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="nav nav-tabs ml-auto hidden sm:flex" role="tablist">--}}
{{--                            <a id="work-in-progress-mobile-new-tab" data-toggle="tab" data-target="#work-in-progress-new" href="javascript:;" class="py-5 ml-6 active" role="tab" aria-selected="true">New</a>--}}
{{--                            <a id="week-work-in-progress-mobile-last-week-tab" data-toggle="tab" data-target="#work-in-progress-last-week" href="javascript:;" class="py-5 ml-6" role="tab" aria-selected="false">Last Week</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="tab-content">--}}
{{--                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">--}}
{{--                                <div>--}}
{{--                                    <div class="flex">--}}
{{--                                        <div class="mr-auto">Pending Tasks</div>--}}
{{--                                        <div>20%</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress h-1 mt-2">--}}
{{--                                        <div class="progress-bar w-1/2 bg-theme-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-5">--}}
{{--                                    <div class="flex">--}}
{{--                                        <div class="mr-auto">Completed Tasks</div>--}}
{{--                                        <div>2 / 20</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress h-1 mt-2">--}}
{{--                                        <div class="progress-bar w-1/4 bg-theme-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-5">--}}
{{--                                    <div class="flex">--}}
{{--                                        <div class="mr-auto">Tasks In Progress</div>--}}
{{--                                        <div>42</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress h-1 mt-2">--}}
{{--                                        <div class="progress-bar w-3/4 bg-theme-1" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <a href="" class="btn btn-secondary block w-40 mx-auto mt-5">View More Details</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END: Work In Progress -->--}}
{{--                <!-- BEGIN: Daily Sales -->--}}
{{--                <div class="intro-y box col-span-12 lg:col-span-6">--}}
{{--                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">--}}
{{--                        <h2 class="font-medium text-base mr-auto">Daily Sales</h2>--}}
{{--                        <div class="dropdown ml-auto sm:hidden">--}}
{{--                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">--}}
{{--                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu w-40">--}}
{{--                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">--}}
{{--                                    <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 rounded-md">--}}
{{--                                        <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button class="btn btn-outline-secondary hidden sm:flex">--}}
{{--                            <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Excel--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="relative flex items-center">--}}
{{--                            <div class="w-12 h-12 flex-none image-fit">--}}
{{--                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $fakers[0]['photos'][0]) }}">--}}
{{--                            </div>--}}
{{--                            <div class="ml-4 mr-auto">--}}
{{--                                <a href="" class="font-medium">{{ $fakers[0]['users'][0]['name'] }}</a>--}}
{{--                                <div class="text-gray-600 mr-5 sm:mr-5">Bootstrap 4 HTML Admin Template</div>--}}
{{--                            </div>--}}
{{--                            <div class="font-medium text-gray-700 dark:text-gray-600">+$19</div>--}}
{{--                        </div>--}}
{{--                        <div class="relative flex items-center mt-5">--}}
{{--                            <div class="w-12 h-12 flex-none image-fit">--}}
{{--                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $fakers[1]['photos'][0]) }}">--}}
{{--                            </div>--}}
{{--                            <div class="ml-4 mr-auto">--}}
{{--                                <a href="" class="font-medium">{{ $fakers[1]['users'][0]['name'] }}</a>--}}
{{--                                <div class="text-gray-600 mr-5 sm:mr-5">Tailwind HTML Admin Template</div>--}}
{{--                            </div>--}}
{{--                            <div class="font-medium text-gray-700 dark:text-gray-600">+$25</div>--}}
{{--                        </div>--}}
{{--                        <div class="relative flex items-center mt-5">--}}
{{--                            <div class="w-12 h-12 flex-none image-fit">--}}
{{--                                <img alt="Rubick Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $fakers[2]['photos'][0]) }}">--}}
{{--                            </div>--}}
{{--                            <div class="ml-4 mr-auto">--}}
{{--                                <a href="" class="font-medium">{{ $fakers[2]['users'][0]['name'] }}</a>--}}
{{--                                <div class="text-gray-600 mr-5 sm:mr-5">Vuejs HTML Admin Template</div>--}}
{{--                            </div>--}}
{{--                            <div class="font-medium text-gray-700 dark:text-gray-600">+$21</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END: Daily Sales -->--}}
{{--                <!-- BEGIN: Latest Tasks -->--}}
{{--                <div class="intro-y box col-span-12 lg:col-span-6">--}}
{{--                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-gray-200 dark:border-dark-5">--}}
{{--                        <h2 class="font-medium text-base mr-auto">Latest Tasks</h2>--}}
{{--                        <div class="dropdown ml-auto sm:hidden">--}}
{{--                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">--}}
{{--                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i>--}}
{{--                            </a>--}}
{{--                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">--}}
{{--                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">--}}
{{--                                    <a id="latest-tasks-new-tab" href="javascript:;" data-toggle="tab" data-target="#latest-tasks-new" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-controls="latest-tasks-new" aria-selected="true">New</a>--}}
{{--                                    <a id="latest-tasks-last-week-tab" href="javascript:;" data-toggle="tab" data-target="#latest-tasks-last-week" class="block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md" role="tab" aria-selected="false">Last Week</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="nav nav-tabs ml-auto hidden sm:flex" role="tablist">--}}
{{--                            <a id="latest-tasks-mobile-new-tab" data-toggle="tab" data-target="#latest-tasks-new" href="javascript:;" class="py-5 ml-6 active" role="tab" aria-selected="true">New</a>--}}
{{--                            <a id="latest-tasks-mobile-last-week-tab" data-toggle="tab" data-target="#latest-tasks-last-week" href="javascript:;" class="py-5 ml-6" role="tab" aria-selected="false">Last Week</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="p-5">--}}
{{--                        <div class="tab-content">--}}
{{--                            <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">--}}
{{--                                <div class="flex items-center">--}}
{{--                                    <div class="border-l-2 border-theme-1 pl-4">--}}
{{--                                        <a href="" class="font-medium">Create New Campaign</a>--}}
{{--                                        <div class="text-gray-600">10:00 AM</div>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-check-switch ml-auto" type="checkbox">--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center mt-5">--}}
{{--                                    <div class="border-l-2 border-theme-1 pl-4">--}}
{{--                                        <a href="" class="font-medium">Meeting With Client</a>--}}
{{--                                        <div class="text-gray-600">02:00 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-check-switch ml-auto" type="checkbox">--}}
{{--                                </div>--}}
{{--                                <div class="flex items-center mt-5">--}}
{{--                                    <div class="border-l-2 border-theme-1 pl-4">--}}
{{--                                        <a href="" class="font-medium">Create New Repository</a>--}}
{{--                                        <div class="text-gray-600">04:00 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <input class="form-check-switch ml-auto" type="checkbox">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END: Latest Tasks -->--}}
            </div>
        </div>
    </div>
@endsection

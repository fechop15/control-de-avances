<div>
    <!-- BEGIN: File Manager Filter -->
    <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
        <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
            <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700 dark:text-gray-300" data-feather="search"></i>
            <input type="text" class="form-control w-full sm:w-64 box px-10 text-gray-700 dark:text-gray-300 placeholder-theme-13" placeholder="Search files">
            <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center" data-placement="bottom-start">
                <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700 dark:text-gray-300" role="button" aria-expanded="false" data-feather="chevron-down"></i>
                <div class="inbox-filter__dropdown-menu dropdown-menu pt-2">
                    <div class="dropdown-menu__content box p-5">
                        <div class="grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-6">
                                <label for="input-filter-1" class="form-label text-xs">File Name</label>
                                <input id="input-filter-1" type="text" class="form-control flex-1" placeholder="Type the file name">
                            </div>
                            <div class="col-span-6">
                                <label for="input-filter-2" class="form-label text-xs">Shared With</label>
                                <input id="input-filter-2" type="text" class="form-control flex-1" placeholder="example@gmail.com">
                            </div>
                            <div class="col-span-6">
                                <label for="input-filter-3" class="form-label text-xs">Created At</label>
                                <input id="input-filter-3" type="text" class="form-control flex-1" placeholder="Important Meeting">
                            </div>
                            <div class="col-span-6">
                                <label for="input-filter-4" class="form-label text-xs">Size</label>
                                <select id="input-filter-4" class="form-select flex-1">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>35</option>
                                    <option>50</option>
                                </select>
                            </div>
                            <div class="col-span-12 flex items-center mt-3">
                                <button class="btn btn-secondary w-32 ml-auto">Create Filter</button>
                                <button class="btn btn-primary w-32 ml-2">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full sm:w-auto flex">
            <button class="btn btn-primary shadow-md mr-2">Cargar Documento</button>
            <button class="btn btn-primary shadow-md mr-2" onclick="agregarDirectorio()">Nueva Carpeta</button>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                            <span class="w-5 h-5 flex items-center justify-center">
                                <i class="w-4 h-4" data-feather="plus"></i>
                            </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file" class="w-4 h-4 mr-2"></i> Share Files
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: File Manager Filter -->
    <!-- BEGIN: Directory & Files -->
    <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
        @foreach ($directorio->hijos as $carpeta)
            @if($carpeta->directorioHijo->estado==1)
            <div id="directorio-{{$carpeta->directorioHijo->id}}" class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                    <div class="absolute left-0 top-0 mt-3 ml-3">
                        <input class="form-check-input border border-gray-500" type="checkbox">
                    </div>
                    <a href="#" class="w-3/5 file__icon file__icon--directory mx-auto"></a>

                    <a href="" class="block font-medium mt-4 text-center truncate">{{ $carpeta->directorioHijo->nombre }}</a>
                    <div class="text-gray-600 text-xs text-center mt-0.5">0 mb</div>
                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                            <i data-feather="more-vertical" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <div class="dropdown-menu w-40">
                            <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2  rounded-md">
                                    <i data-feather="users" class="w-4 h-4 mr-2"></i> Compartir
                                </a>
                                <a onclick="eliminarDirectorio({{$carpeta->directorioHijo->id}})" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2  rounded-md">
                                    <i data-feather="trash" class="w-4 h-4 mr-2"></i> Eliminar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach


    </div>
    <!-- END: Directory & Files -->
</div>

@section('script')
    <script>
        /********************/
        function agregarDirectorio() {
            Swal.fire({
                title: 'Nuevo Directorio',
                html:
                    '<label class="w-full" style="float: left">Nombre Directorio</label><br>' +
                    '<input id="nombre-directorio" placeholder="" class="form-control"><br><br>' +
                    '',
                focusConfirm: false,
                showCancelButton: true,
                showLoaderOnConfirm: true,
                onOpen: () => {

                },
                preConfirm: () => {
                    if ($('#nombre-directorio').val() === "") {
                        Swal.showValidationMessage(
                            `Escriba el nombre del directorio`
                        )
                        return;
                    }
                    //ajax
                    let directorio = $('#nombre-directorio').val();
                    Swal.fire({
                        title: 'Por favor espera !',
                        html: 'Validando informacion..',// add html attribute if you want or remove
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        onBeforeOpen: () => {
                            Swal.showLoading()
                        },
                    });
                    axios.post(`{{url('crearDirectorio')}}`, {
                        nombre: directorio,
                        directorio_id: {{$directorio->id}},
                    }).then(function (res) {
                        console.log(res.data);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Bien!',
                            text: "Directorio agregado con exito",
                            showCancelButton: false,
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                                window.location.reload();
                            }
                        });

                        return true;
                    }).catch(e => {
                        console.log(e);
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Ups!',
                            text: "Ha ocurrido un error intente nuevamente",
                            showCancelButton: false,
                            confirmButtonText: 'Ok'
                        });
                    })

                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                console.log(result);
                if (result.value) {
                    Swal.fire({
                        title: `Se ha asignado correctamente la atencion`,
                    });
                } else if (!result.dismiss) {
                    Swal.fire({
                        title: `Lo sentimos pero no se pudo procesar la solicitud`,
                    })
                }
            });
        }

        function eliminarDirectorio(id) {
            Swal.fire({
                title: 'Por favor espera !',
                html: 'Eliminando Directorio..',// add html attribute if you want or remove
                allowOutsideClick: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            axios.post(`{{url('eliminarDirectorio')}}`, {
                id: id,
                directorio_id: {{$directorio->id}},
            }).then(function (res) {
                console.log(res.data);
                $("#directorio-" + id).remove();
                $( "body" ).click();

                swal.close()
            }).catch(e => {
                console.log(e);
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Ups!',
                    text: "Ha ocurrido un error intente nuevamente",
                    showCancelButton: false,
                    confirmButtonText: 'Ok'
                });
            })
        }

    </script>
@endsection

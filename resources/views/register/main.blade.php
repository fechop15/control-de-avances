@extends('../layout/' . $layout)

@section('head')
    <title>Registro - Control de avance</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="control de avances" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        Ru<span class="font-medium">bick</span>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                         src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Control de avances <br>
                        Administra tus actividades
                    </div>
                    <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Gestiona tus
                        proyectos mediante tareas y actividades
                    </div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Registro</h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Control de avances, Administra tus
                        actividades. Gestiona tus proyectos mediante tareas y actividades
                    </div>
                    <form id="register-form">

                        <div class="intro-x mt-8">
                            <input type="text" id="input-name" name="name"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                                   placeholder="Nombre completo">
                            <div id="error-name" class="register__input-error w-5/6 text-theme-6 mt-2"></div>

                            <input type="text" id="input-email" name="email"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                   placeholder="Correo">
                            <div id="error-email" class="register__input-error w-5/6 text-theme-6 mt-2"></div>

                            <select id="input-company_id" name="company_id"
                                    class="intro-x login__input input form-select border border-gray-300 block mt-4">
                                <option disabled selected value>Compañia asociada</option>
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                            <div id="error-company_id" class="register__input-error w-5/6 text-theme-6 mt-2"></div>

                            <input type="text" id="input-password" name="password"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                   placeholder="Contraseña">
                            <div id="error-password" class="register__input-error w-5/6 text-theme-6 mt-2"></div>

                            <input type="text" id="input-password_confirmation" name="password_confirmation"
                                   class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                   placeholder="Confirmar contraseña">
                            <div id="error-password_confirmation" class="register__input-error w-5/6 text-theme-6 mt-2"></div>

                        </div>
                        <div class="intro-x flex items-center text-gray-700 dark:text-gray-600 mt-4 text-xs sm:text-sm">
                            <input id="input-politicas" name="politicas" type="checkbox"
                                   class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="input-politicas">Estoy de acuerdo con Control
                                de avances</label>
                            <a class="text-theme-1 dark:text-theme-10 ml-1" href="#">Política de privacidad</a>.
                        </div>
                        <div id="error-politicas" class="register__input-error w-5/6 text-theme-6 mt-2"></div>

                    </form>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button id="btn-register" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                            Registrarme
                        </button>
                        <button id="btn-login"
                                class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">
                            Ingresar
                        </button>
                    </div>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        cash(function () {
            async function register() {
                // Reset state
                cash('#register-form').find('.login__input').removeClass('border-theme-6')
                cash('#register-form').find('.register__input-error').html('')

                // Post form
                let name = cash('#input-name').val()
                let email = cash('#input-email').val()
                let password = cash('#input-password').val()
                let password_confirmation = cash('#input-password_confirmation').val()
                let company_id = cash('#input-company_id').val()
                let politicas = cash('#input-politicas').val()

                // Loading state
                cash('#btn-register').html('<i data-loading-icon="oval" data-color="white" class="w-5 h-5 mx-auto"></i>').svgLoader()
                await helper.delay(1500)

                axios.post(`register`, {
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation,
                    company_id: company_id,
                    politicas: politicas
                }).then(res => {
                    location.href = '/'
                }).catch(err => {
                    cash('#btn-register').html('register')
                    if (err.response.data.message != 'Wrong email or password.') {
                        for (const [key, val] of Object.entries(err.response.data.errors)) {
                            cash(`#${key}`).addClass('border-theme-6')
                            cash(`#error-${key}`).html(val)
                        }
                    } else {
                        cash(`#input-password`).addClass('border-theme-6')
                        cash(`#error-password`).html(err.response.data.message)
                    }
                })
            }

            cash('#btn-register').on('keyup', function (e) {
                if (e.keyCode === 13) {
                    register()
                }
            })

            cash('#btn-register').on('click', function () {
                register()
            })

            cash('#btn-login').on('click', function (e) {
                location.href = '/'
            })
        })
    </script>
@endsection

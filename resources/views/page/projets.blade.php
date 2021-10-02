@extends('../layout/' . $layout)

@section('subhead')
    <title>{{\Request::route()->getName()}} - {{env('APP_NAME')}}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Proyectos</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-12 xxl:col-span-10">
            <div class="grid grid-cols-12 gap-5 mt-5">
                @foreach($projets as $projet)
                    <div class="col-span-12 sm:col-span-4 xxl:col-span-3 box p-5 cursor-pointer zoom-in">
                        <a href="/proyecto/{{$projet->id}}">
                            <div class="font-medium text-base">{{$projet->name}}</div>
                            <div class="text-gray-600">{{$projet->userStories->count()}} Historias de usuarios</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection

@extends('layouts.personal')
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Detalles de la tarea</h1>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-8 py-6">

                <div class="mb-4">
                    <h2 class="text-2xl font-bold text-gray-700 mb-2">titulo de la tarea:</h2>
                    <p class="text-gray-600 text-lg">{{ $tasks->title }}</p>
                </div>


                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Descripción:</h3>
                    <p class="text-gray-600 text-lg">{{ $tasks->description ? $tasks->description : 'No tiene descripción' }}
                    </p>
                </div>


                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Creada el:</h3>
                    <p class="text-gray-600 text-lg">{{ $tasks->created_at->format('d-m-Y H:i:s') }}</p>
                </div>


                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Última actualización:</h3>
                    <p class="text-gray-600 text-lg">{{ $tasks->updated_at->diffForHumans() }}</p>
                </div>

                <div class="flex justify-center gap-5">
                    <a href="{{ route('tasks.index') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Volver a la lista</a>
                    <a href="{{ route('tasks.edit', $tasks->id)}}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Editar tarea</a>
                </div>


            </div>
        </div>
    </div>
@endsection

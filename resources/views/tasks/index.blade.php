@extends('layouts.personal')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de tareas del usuario {{$user}}</h1>

    <div class="flex justify-end mb-4">
        <a href="" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" >Nueva tarea</a>
        {{-- <a href="{{ route('categories.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Nueva Categoría</a> --}}
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($tasks as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Enlace a la vista de detalles -->
                            <a href="" class="text-blue-600 hover:text-blue-800 ml-4" >Detalles</a>
                            {{-- <a href="{{ route('categories.show', $item->id) }}"
                                class="text-blue-600 hover:text-blue-800">Detalles</a> --}}

                            <a href="{{route('tasks.edit', $item->id)}}" class="text-indigo-600 hover:text-indigo-800 ml-4" >Editar</a>
                            
                            {{-- <!-- Enlace para editar -->
                            <a href="{{ route('categories.edit', $item->id) }}"
                                class="text-indigo-600 hover:text-indigo-800 ml-4">Editar</a> --}}
                            
                            <a href=""  class="text-red-600 hover:text-red-800 ml-4" >Eliminar</a>
                            <!-- Formulario para eliminar -->
                            {{-- <form action="{{ route('categories.destroy', $item->id) }}" method="POST"
                                class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                            </form> --}}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">No hay
                            categorías disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl text-purple-800">Bienvenido al gestor de tareas</h1>
                    {{-- {{ Auth::user()->tasks->find(1)->title}}  --}}
                    @foreach ($tasks as $item)
                        <p class="mt-4 text-lg text-purple-800">
                            {{ $item->title }}
                        </p>
                        <p class="mt-4 text-lg text-orange-600">
                            {{ $item->description }}
                        </p>
                    @endforeach
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center gap-3">
        <table class="w-2/4 text-left table-auto min-w-max">
            <thead>
                <tr class="border-b border-slate-300 bg-slate-50">
                    <th class="p-4 text-sm font-normal leading-none text-slate-500">Titulo</th>
                    <th class="p-4 text-sm font-normal leading-none text-slate-500">Descripcion</th>
                    <th class="p-4 text-sm font-normal leading-none text-slate-500">Acciones</th>
                </tr>
            </thead>
            <button class="bg-sky-500" wire:click="openCreateModal">
                Agregar tarea
            </button>
            <tbody>
                @foreach ($tasks as $item)
                    <tr class="hover:bg-slate-50">
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p>{{ $item->title }}</p>

                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">
                            <p>{{ $item->description }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 py-5">

                            <button wire:click="deleteTask({{$item->id}})" type="button" class="bg-red-500">
                                Eliminar
                            </button>
                            <button wire:click="editTask({{$item}})" type="button" class="bg-yellow-500">
                                Editar
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal for create task --}}
    <!-- component -->

    {{-- Modal para crear tareas --}}
    @if ($modal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg">
                <h2 class="text-xl font-bold mb-4">Crear Nueva Tarea</h2>
                <input type="text" wire:model="title" placeholder="Título" class="w-full mb-2 p-2 border" />
                <input type="text" wire:model="description" placeholder="Descripción"
                    class="w-full mb-2 p-2 border" />
                <div class="flex justify-end gap-2">
                    <button wire:click.prevent="createTask" class="bg-blue-500 text-white p-2 rounded">
                    @if( $editingTaskId)
                        Actualizar
                    @else
                        Guardar 
                    @endif  tarea</button>
                    <button wire:click="closeModal" class="bg-gray-500 text-white p-2 rounded">Cancelar</button>
                </div>
            </div>
        </div>
    @endif
</div>

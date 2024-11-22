

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jefe de departamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <!-- Main Content -->
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Proyectos</h3>
                        
                        <!-- Buscador -->
                        <div class="mb-4">
                            <input type="text" class="p-2 border border-gray-300 rounded w-full" placeholder="Buscar proyecto...">
                        </div>

                        <!-- Botones de proyectos -->
                        <div class="space-x-4 mb-6">
                            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">En Revisión</button>
                            <button class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">En Asesoría</button>
                            <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Proyectos Vigentes</button>
                            <button class="bg-gray-500 text-white py-2 px-4 rounded hover:bg-gray-600">Proyectos Realizados</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lateral Derecho -->
            
        </div>
    </div>
</x-app-layout>

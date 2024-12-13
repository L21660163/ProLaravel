@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="flex justify-center mb-8">
        <div class="w-full">
            <h2 class="text-2xl font-bold text-center mb-4">Fases del Proyecto</h2>
            <div class="flex justify-between items-center bg-gray-200 p-4 rounded-full">
                @foreach ($phases as $phase)
                    <div class="flex-1 text-center p-2">
                        <span class="block">{{ $phase->name }}</span>
                        <div class="w-8 h-8 rounded-full mx-auto" 
                             style="background-color: {{ $project->id_project_phase == $phase->id ? '#4CAF50' : ($project->id_project_phase > $phase->id ? '#3b82f6' : '#e5e7eb') }};">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex justify-center space-x-4">
        @foreach ($phases as $phase)
            <button 
                id="phase-button-{{ $phase->id }}" 
                class="bg-indigo-500 text-white py-2 px-4 rounded-lg {{ $project->id_project_phase == $phase->id ? '' : 'opacity-50 cursor-not-allowed' }}" 
                {{ $project->id_project_phase == $phase->id ? '' : 'disabled' }}
                onclick="updateProjectPhase({{ $phase->id }})">
                {{ $phase->name }}
            </button>
        @endforeach
    </div>

    <div class="mt-8 text-center">
        <button class="bg-red-500 text-white py-2 px-4 rounded-lg" onclick="goBackToPreviousPhase()">
            Rechazar Proyecto
        </button>
    </div>
</div>

<script>
    async function updateProjectPhase(newPhaseId) {
        try {
            const response = await fetch(`/update-project-phase/{{ $project->id }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id_project_phase: newPhaseId })
            });

            const data = await response.json();
            if (response.ok) {
                alert(data.message);
                window.location.reload(); // Recargar para mostrar la fase actualizada
            } else {
                alert(data.error);
            }
        } catch (error) {
            console.error('Error al actualizar la fase:', error);
        }
    }

    async function goBackToPreviousPhase() {
        try {
            const response = await fetch(`/update-project-phase/{{ $project->id }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id_project_phase: {{ $project->id_project_phase - 1 }} })
            });

            const data = await response.json();
            if (response.ok) {
                alert(data.message);
                window.location.reload(); // Recargar para mostrar la fase actualizada
            } else {
                alert(data.error);
            }
        } catch (error) {
            console.error('Error al retroceder la fase:', error);
        }
    }
</script>
@endsection

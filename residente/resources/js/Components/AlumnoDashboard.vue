<template>
  <div class="min-h-screen bg-[#E6E6FA]">
    <!-- Header -->
    <header class="border-b bg-[rgb(205,211,251)] backdrop-blur-sm">
      <div class="container mx-auto flex h-16 items-center px-4">
        <div class="flex items-center gap-2">
          <img
            src="/images/logo.png"
            alt="Instituto Tecnologico de Matehuala logo"
            class="h-10 w-10"
          />
          <span class="text-lg font-semibold">INSTITUTO TECNOLOGICO DE MATEHUALA</span>
        </div>
      </div>
    </header>

    <div class="flex min-h-[calc(100vh-4rem)]">
      <!-- Sidebar -->
      <aside class="w-64 border-r bg-white p-4">
        <nav class="space-y-4">
          <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
            <User class="h-5 w-5" />
            <span class="text-sm font-medium">Perfil</span>
          </a>
          <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
            <Folder class="h-5 w-5" />
            <span class="text-sm font-medium">Proyectos</span>
          </a>
          <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-gray-700 hover:bg-gray-100">
            <PlusCircle class="h-5 w-5" />
            <span class="text-sm font-medium">Subir archivos</span>
          </a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 p-6">
        <div class="rounded-lg bg-white/80 p-6 shadow-lg backdrop-blur-sm">
          <h2 class="mb-6 text-2xl font-bold">Proyectos</h2>
          <div class="grid gap-4">
            <!-- Aquí irá el contenido de los proyectos -->
            <div class="rounded-lg border p-4">
              <p class="text-gray-600">No hay proyectos disponibles.</p>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import { User, Folder, PlusCircle } from 'lucide-vue-next'

export default {
  components: {
    User,
    Folder,
    PlusCircle
  }
}
</script>
<template>
  <div class="min-h-screen bg-[#E6E6FA]">
    <header class="border-b bg-white/50 backdrop-blur-sm">
      <div class="container mx-auto flex h-16 items-center justify-between px-4">
        <div class="flex items-center gap-2">
          <img
            src="/images/logo.png"
            alt="Instituto Tecnologico de Matehuala logo"
            class="h-10 w-10"
          />
          <span class="text-lg font-semibold">INSTITUTO TECNOLOGICO DE MATEHUALA</span>
        </div>
        <nav class="flex items-center gap-4">
          <a class="text-sm font-medium hover:underline" href="#">Intranet</a>
          <a class="text-sm font-medium hover:underline" href="#">Ayuda</a>
          <a class="text-sm font-medium hover:underline" href="#">Iniciar sesión</a>
        </nav>
      </div>
    </header>
    
    <main class="container mx-auto flex min-h-[calc(100vh-4rem)] items-center justify-center px-4">
      <div class="w-full max-w-md">
        <div class="rounded-lg bg-white/80 p-8 shadow-lg backdrop-blur-sm">
          <h1 class="mb-8 text-2xl font-bold text-center">Iniciar Sesión</h1>
          <form @submit.prevent="handleSubmit" class="space-y-6">
            <div class="space-y-4">
              <div class="relative">
                <Mail class="absolute left-3 top-3 h-5 w-5 text-gray-400" />
                <input
                  v-model="email"
                  class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 pl-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                  id="email"
                  placeholder="Correo Institucional"
                  type="email"
                  required
                />
              </div>
              
              <div class="relative">
                <Lock class="absolute left-3 top-3 h-5 w-5 text-gray-400" />
                <input
                  v-model="password"
                  class="w-full rounded-md border border-gray-300 bg-white px-4 py-2 pl-10 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500"
                  id="password"
                  placeholder="Contraseña"
                  type="password"
                  required
                />
              </div>
            </div>
            
            <button
              type="submit"
              class="w-full rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
            >
              Iniciar Sesión
            </button>
            
            <div class="text-center">
              <a href="#" class="text-sm text-blue-600 hover:underline">
                ¿Olvidaste tu contraseña?
              </a>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import { ref } from 'vue'
import { Mail, Lock } from 'lucide-vue-next'

export default {
  components: {
    Mail,
    Lock
  },
  setup() {
    const email = ref('')
    const password = ref('')

    const handleSubmit = () => {
      console.log('Email:', email.value)
      console.log('Password:', password.value)
      // Aquí puedes implementar la lógica de inicio de sesión
    }

    return {
      email,
      password,
      handleSubmit
    }
  }
}
</script>
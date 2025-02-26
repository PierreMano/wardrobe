<template>
    <div class="min-h-screen bg-gray-50">
      <header v-if="isAuthenticated" class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <div class="flex-shrink-0 flex items-center">
                <h1 class="text-xl font-bold text-gray-900">Wardrobe App</h1>
              </div>
            </div>
            <div class="flex items-center">
              <button 
                @click="logout" 
                class="ml-4 px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500"
              >
                Logout
              </button>
            </div>
          </div>
        </div>
      </header>
  
      <main>
        <div v-if="!isAuthenticated">
          <AuthComponent @login-success="handleLoginSuccess" />
        </div>
        <div v-else>
          <WardrobeManager />
        </div>
      </main>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, defineAsyncComponent } from 'vue';
  import WardrobeManager from '../components/WardrobeManager.vue';
  
  // Lazy load AuthComponent to avoid circular dependency
  const AuthComponent = defineAsyncComponent(() => import('../components/AuthComponent.vue'));
  
  const isAuthenticated = ref(false);
  
  onMounted(() => {
    const token = localStorage.getItem('token') || '';
    if (token) {
      isAuthenticated.value = true;
    }
  });
  
  const handleLoginSuccess = () => {
    isAuthenticated.value = true;
  };
  
  const logout = () => {
    localStorage.removeItem('token');
    isAuthenticated.value = false;
  };
  </script>
  
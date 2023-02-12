<template>
  <AppLayout>
    <template #header>
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ article.title }}
         </h2>
         <div class="py-12">
             <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                     {{ article.content }}
                 </div>
             </div>
         </div>
     </template>
  </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import { Head } from '@inertiajs/vue3';

export default {
  components: {
    Head,
    AppLayout,
  },
  props: {
    article: Object,
  },
}
</script>
<template>
  <AppLayout>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello {{ article.title }} welcome to your first Inertia app!</p>
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
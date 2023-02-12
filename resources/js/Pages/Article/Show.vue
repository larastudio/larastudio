<template>
  <Layout>
    <Head title="Welcome" />
    <h1>Welcome</h1>
    <p>Hello {{ article.title }} welcome to your first Inertia app!</p>
  </Layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import { Head } from '@inertiajs/inertia-vue3'

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
<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <jet-form-section @submitted="createArticle">
                    </jet-form-section>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                <th class="px-6 pt-6 pb-4">Name</th>
                <th class="px-6 pt-6 pb-4">City</th>
                <th class="px-6 pt-6 pb-4" colspan="2">Phone</th>
                </tr>
                <!-- <tr v-for="article in articles.data" :key="article.id" class="hover:bg-gray-100 focus-within:bg-gray-100"> -->
                <tr>
                <td class="border-t">
                    <inertia-link class="px-6 py-4 flex items-center focus:text-indigo-500" :href="route('articles.edit', article.id)">
                    {{ article.name }}
                    <icon v-if="article.deleted_at" name="trash" class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2" />
                    </inertia-link>
                </td>
                <td class="border-t">
                    <inertia-link class="px-6 py-4 flex items-center" :href="route('articles.edit', article.id)" tabindex="-1">
                    {{ article.city }}
                    </inertia-link>
                </td>
                <td class="border-t">
                    <inertia-link class="px-6 py-4 flex items-center" :href="route('articles.edit', article.id)" tabindex="-1">
                    {{ article.phone }}
                    </inertia-link>
                </td>
                <td class="border-t w-px">
                    <inertia-link class="px-4 flex items-center" :href="route('articles.edit', article.id)" tabindex="-1">
                    <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
                    </inertia-link>
                </td>
                </tr>
                <tr v-if="articles.data.length === 0">
                <td class="border-t px-6 py-4" colspan="4">No articles found.</td>
                </tr>
            </table>
        </div>
    <pagination class="mt-6" :links="articles.links" />
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetFormSection from '@/Jetstream/FormSection'

    export default {
        components: {
            AppLayout,
            JetFormSection,
        },
        methods: {
            createArticle() {
                this.createArticleForm.post(route('article.get'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.displayingToken = true
                        this.createApiTokenForm.reset()
                    }
                })
            },
            
        },
    }

    
</script>

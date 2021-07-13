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
                    <!-- component -->
                <table class="m-5 w-5/6 mx-auto text-gray-800">
                <tr class="text-left border-b-2 border-gray-200">
                    <th class="px-4 py-3">Article Title</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Tag</th>
                    <th class="px-4 py-3">SEO</th>
                </tr>
                
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-3">Jill</td>
                    <td class="px-4 py-3">Smith</td>
                    <td class="px-4 py-3">50</td>
                    <td class="px-4 py-3">Male</td>
                </tr> 
                <!-- each row -->
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-3">Jill</td>
                    <td class="px-4 py-3">Smith</td>
                    <td class="px-4 py-3">50</td>
                    <td class="px-4 py-3">Male</td>
                </tr> 
                <!-- each row -->
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-3">Jill</td>
                    <td class="px-4 py-3">Smith</td>
                    <td class="px-4 py-3">50</td>
                    <td class="px-4 py-3">Male</td>
                </tr> 
                <!-- each row -->

                </table>

                <!-- classic design -->

                </div>
            </div>
        </div>
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

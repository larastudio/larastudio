<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Articles
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <jet-form-section @submitted="createArticle">
            <template #form>
                <!-- Title -->
                <div class="col-span-full sm:col-span-full">
                <jet-label for="title" value="Title" />
                <jet-input
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    autocomplete="title"
                />
                <jet-input-error :message="form.errors.title" class="mt-2" />
                </div>

                <!-- Content -->
                <div class="col-span-full sm:col-span-full">
                <jet-label for="content" value="Content" />
                <!-- <div class="bg-white p-4 overflow-hidden shadow-xl sm:rounded-lg"> -->
                    <editor
                    id="tiny"
                    :init="{
                        height: 500,
                        menubar: false,
                        plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount',
                        ],
                        toolbar:
                        'undo redo | formatselect | bold italic backcolor | \
                                            alignleft aligncenter alignright alignjustify | \
                                            bullist numlist outdent indent | removeformat | help',
                    }"
                    v-model="form.content"
                    />
                <!-- </div> -->
                <jet-input-error :message="form.errors.content" class="mt-2" />
                </div>
            </template>

            <template #actions>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
                </jet-action-message>

                <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
                >
                Save
                </jet-button>
            </template>
            </jet-form-section>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Editor from "@tinymce/tinymce-vue";
import { useForm } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSectionTiny";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSelect from "@/Components/Select";

export default {
  components: {
    AppLayout,
    editor: Editor,
    JetActionMessage,
    JetButton,
    JetFormSection,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    JetSelect,
  },
  setup() {
    const form = useForm({
      _method: "POST",
      title: "",
      content: "",
    });

    const createArticle = () => {
      form.post(route("articles.store"));
    };

    return { form, createArticle };
  },
};
</script>
<style scoped>
</style>
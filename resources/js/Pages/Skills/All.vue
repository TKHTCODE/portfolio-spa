<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/jetstream/Button";
import JetModal from "@/Jetstream/Modal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";

export default {
  components: {
    AppLayout,
    JetButton,
    JetInput,
    JetModal,
    JetInputError,
  },
  props: {
    skills: Object,
    availableColors: Object,
  },
  methods: {
    submit() {
      this.form.submit("post", route("skills.store"), {
        onSuccess: () => {
          this.form.reset("name");
          this.form.reset("color");
          this.acting = null;
        },
      });
    },
  },
  data() {
    return {
      acting: null,
      form: this.$inertia.form({
        name: "",
        color: "",
      }),
    };
  },
};
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Skills</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right">
        <jet-button
          class="
            p-3
            border-3 border-indigo-500
            text-indigo-500
            bg-indigo-50
            hover:bg-indigo-200
          "
          @click="acting = true"
          >Add new +</jet-button
        >

        <jet-modal :show="acting" closable="true" @close="acting = null">
          <div class="bg-gray-50 shadow-2xl p-8">
            <form
              class="flex flex-col items-center p-16"
              @submit.prevent="submit"
            >
              <jet-input
                class="px-5 py-3 w-96 border border-gray-600 rouded"
                type="text"
                name="name"
                v-model="form.name"
                placeholder="Skill name"
              >
              </jet-input>
              <jet-input-error :message="form.errors.name" />

              <select
                class="w-96 border border-gray-600 rounded mt-5"
                v-model="form.color"
              >
                <option value="">Select a color</option>
                <option
                  v-for="color in availableColors"
                  :key="color"
                  :value="color"
                >
                  {{ color }}
                </option>
              </select>

              <jet-input-error :message="form.errors.color" />

              <jet-button
                class="
                  px-5
                  py-3
                  mt-5
                  w-96
                  bg-purple-800
                  justify-center
                  rounded-xl
                  test-sm
                "
                :disabled="form.processing"
              >
                <span
                  class="animate-spin mr-1 bg-gray-700"
                  v-show="form.processing"
                  >&#9696;</span
                >
                <span v-show="!form.processing">Register</span>
              </jet-button>
            </form>
          </div>
        </jet-modal>

        <table v-if="skills.length > 0" class="w-full text-left">
          <thead class="border-b-2 border-gray-300 text-indigo-600">
            <tr>
              <th class="px-6 py-3 text-left">Name</th>
              <th class="px-6 py-3 text-left">Color</th>
              <th class="px-6 py-3 text-left">Actions</th>
            </tr>
          </thead>
          <tbody v-for="skill in skills" :key="skill">
            <tr class="text-sm text-emerald-900 border-b border-gray-400">
              <td class="px-6 py-4">{{ skill.name }}</td>
              <td class="px-py-4">
                <p>
                  <span class="mr-5 py-4 px-6 rounded" :class="skill.color">
                  </span>
                  {{ skill.color }}
                </p>
              </td>
              <td>
                <jet-button
                  class="
                    border border-emerald-500
                    text-emerald-500
                    bg-emerald-50
                    hover:bg-indigo-200
                    mr-3
                  "
                  >Edit</jet-button
                >
                <jet-button
                  class="
                    border border-rose-500
                    text-rose-500
                    bg-rose-50
                    hover:bg-rose-200
                    mr-3
                  "
                  >Delete</jet-button
                >
              </td>
            </tr>
          </tbody>
        </table>
        <div
          v-else
          class="
            bg-white
            overflow-hidden
            shadow-xl
            rounded-lg
            p-6
            border-gray-200
            flex-col
            text-xl
          "
        >
          There are no skills for now. Add something.
        </div>
      </div>
    </div>
  </AppLayout>
</template>

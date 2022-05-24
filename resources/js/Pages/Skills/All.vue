<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/jetstream/Button";

export default {
  components: {
    AppLayout,
    JetButton,
  },
  props: {
    skills: Object,
  },
};
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Skills</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table v-if="skills.length > 0" class="w-full">
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
                  <span class="mr-5 py-4 px-6 rounded" :class="skill.color"> </span>
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

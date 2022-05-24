<script>
import { defineAsyncComponent } from '@vue/runtime-core';
import AppLayout from "@/Layouts/AppLayout.vue";
import JetButton from "@/jetstream/Button";

export default {
  components: {
    AppLayout,
    JetButton,
  },
  props: {
    projects: Object,
  },
  methods: {
    componentName(index) {
      return defineAsyncComponent(() =>
        import(
          "@heroicons/vue/solid/" + this.projects[index].icon_name + "Icon.js"
        )
      );
    },
  },
};
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        projects
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table v-if="projects.length > 0" class="w-full">
          <thead class="border-b-2 border-gray-300 text-indigo-600">
            <tr>
              <th class="px-6 py-3 text-left">Title</th>
              <th class="px-6 py-3 text-left">Description</th>
              <th class="px-6 py-3 text-left">Color</th>
              <th class="px-6 py-3 text-left">Icon</th>
              <th class="px-6 py-3 text-left">Actions</th>
            </tr>
          </thead>
          <tbody v-for="(project, index) in projects" :key="project">
            <tr class="text-sm text-gray-700 border-b border-gray-400">
              <td class="px-6 py-4">{{ project.title }}</td>
              <td class="px-6 py-4">{{ project.description }}</td>
              <td class="px-py-4">
                <p>
                  <span class="mr-5 py-4 px-6 rounded" :class="project.color">
                  {{ project.color }}
                  </span>
                </p>
              </td>
              <td class="px-6 py-4" :class="project.color">
                <component :is="componentName(index)"></component>
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
          There are no projects for now. Add something.
        </div>
      </div>
    </div>
  </AppLayout>
</template>

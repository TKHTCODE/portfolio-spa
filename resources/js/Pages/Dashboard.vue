<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Head, Link} from '@inertiajs/inertia-vue3'
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
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
          <p class="mb-5">Your Profiles</p>
          <ul class="p-3">
            <li class="m-8 flex flex-row items-center">
              <div class="bg-gray-500 mr-3 w-2">
                  <Link class="text-emerald-500 border-d hover:text-gray-400 my-8 px-8" 
                  :href="route('skills.index')">
                  Skills</Link>
              </div>
            </li>
            <li class="m-8 flex flex-row items-center">
              <div class="bg-gray-500 mr-3 w-2">
                 <Link class="text-emerald-500 border-d hover:text-gray-400 my-8 px-8" :href="route('projects.index')">Projects</Link> 
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
});
</script>

<template>
  <div>
    <section class="bg-blue-900 pt-16 h-screen px-72">
      <div class="h-2/3 flex flex-wrap content-between pb-36">
      <p class="border-b-2 font-bold border-gray-200 text-2xl text-gray-200 uppercase">Hey This is Taka. I'm a Web developer.</p>
      </div>
    </section>
    <section class="bg-zinc-300 text-gray-900 px-72 py-10 h-screen">
      <h2 class="text-6xl font-bold pt-3">Skills</h2>
    </section>
    <section class="bg-sky-400 text-gray-900 px-72 py-10 h-screen">
      <h2 class="text-6xl font-bold pt-3">Projects</h2>
    </section>
    <section class="flex justify-between py-10 px-72 bg-gray-800 text-gray-300 text-xl">
      <p>&copy; Taka. All right reserved</p>
      <div class="flex justify-evenly items-center">Github Facebook</div>
    </section>
  </div>
</template>

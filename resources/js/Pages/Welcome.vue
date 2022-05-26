<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import Section from "@/components/Section";
import JetButton from "@/Jetstream/Button";
import JetModal from "@/Jetstream/Modal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import Skill from "@/components/Skill";
import Project from "@/components/Project";

import { defineAsyncComponent, defineComponent } from "@vue/runtime-core";

export default defineComponent({
  components: {
    Head,
    Link,
    JetApplicationMark,
    JetButton,
    JetModal,
    JetInput,
    JetInputError,
    Section,
    Skill,
    Project,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    skills: Object,
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
    submit() {
      this.form.post(route("contact"));
    },
  },
  data() {
    return {
      contacting: null,
      form: this.$inertia.form({
        email: "",
        message: "",
      }),
    };
  },
});
</script>

<template>
  <Head title="Welcome" />

  <Section
    class="grid grid-cols-2 text-right px-24 bg-gray-900 text-gray-300"
  >
    <div>
      <jet-application-mark class="h-12 w-auto"></jet-application-mark>
    </div>
    <div v-if="canLogin">
      <Link
        v-if="$page.props.user"
        :href="route('dashboard')"
        class="text-sm underline"
      >
        Dashboard
      </Link>

      <template v-else>
        <Link :href="route('login')" class="text-base underline"> Log in </Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="text-base underline place-self-end ml-4"
        >
          Register
        </Link>
      </template>
    </div>
  </Section>

  <div>
    <Section class="bg-gray-900 pt-16 px-0">
      <div class="flex flex-wrap content-between pb-36">
        <video
          class="w-fulll"
          src="https://taka-portfolio.s3.us-west-1.amazonaws.com/viltstack.mp4"
          autoplay
          playsinline
          muted
          loop
        ></video>
      </div>
    </Section>
    <Section id="skills" class="bg-zinc-300 text-gray-900">
      <h2 class="text-6xl font-bold pt-3 font-mono">Skills</h2>

      <div class="grid grid-cols-2">
        <div v-for="skill in skills" :key="skill">
          <Skill :background="skill.color">
            {{ skill.name }}
          </Skill>
        </div>
      </div>
      <div class="flex justify-center mt-10">
        <jet-button
          class="
            bg-indigo-800
            rounded
            font-bold
            text-sm text-gray-200
            hover:bg-indigo-700
          "
          @click="contacting = true"
        >
          {{
            $page.props.flash.contacted
              ? "Messeage was sent. Thanks!"
              : "Send message"
          }}
        </jet-button>
      </div>
    </Section>
    <Section class="bg-sky-400 text-gray-900">
      <h2 class="text-6xl font-bold pt-3 font-mono">Projects</h2>

      <div v-for="(project, index) in projects" :key="project">
        <Project
          :title="project.title"
          :description="project.description"
          :color="project.color"
        >
          <component :is="componentName(index)"></component>
        </Project>
      </div>
    </Section>
    <Section class="flex justify-between bg-gray-800 text-gray-300 text-xl">
      <p>&copy; Taka. All right reserved</p>
      <div class="flex justify-evenly items-center">
        <Link class="border-b pb-1 px-2 hover:text-gray-50" href="#"
          >Github</Link
        >
        <Link class="border-b pb-1 px-2 hover:text-gray-50" href="#"
          >Facebook</Link
        >
      </div>
    </Section>
  </div>
  <jet-modal :show="contacting" closable="true" @close="contacting = null">
    <div
      class="bg-green-600 shadow-2xl p-8 text-center font-bold"
      v-if="$page.props.flash.contacted"
    >
      <p class="text-5xl m-5 text-white">Submission success</p>
    </div>
    <div class="bg-gray-50 shadow-2xl p-8" v-else>
      <p class="text-gray-600 text-2xl font-extrabold text-center">
        Let me know some details
      </p>
      <form class="flex flex-col items-center p-16" @submit.prevent="submit">
        <jet-input
          class="px-5 py-3 w-96 border border-gray-600 rouded"
          v-model="form.email"
          placeholder="Your email"
        >
        </jet-input>
        <jet-input-error :message="form.errors.email" />
        <textarea
          class="px-5 py-3 w-96 border border-gray-600 rounded mt-5"
          name="message"
          v-model="form.message"
          placeholder="Message"
        ></textarea>
        <jet-input-error :message="form.errors.message" />
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
          <span class="animate-spin mr-1 bg-gray-700" v-show="form.processing"
            >&#9696;</span
          >
          <span v-show="!form.processing">Get in touch</span>
        </jet-button>
      </form>
    </div>
  </jet-modal>
</template>

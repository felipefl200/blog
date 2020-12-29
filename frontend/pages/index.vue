<template>
  <div>
    <div v-if="!dados">
      <Loader />
    </div>
    <div
      v-else
      class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 p-10 px-2 lg:px-20"
    >
      <div
        v-for="dado in dados.data"
        :key="dado.id"
        class="shadow rounded flex flex-col"
      >
        <div>
          <img :src="dado.image" class="w-full bg-cover bg-center" />
        </div>
        <div class="flex flex-col h-full justify-between">
          <div>
            <h3 class="text-gray-700 text-3xl px-3 font-sans">
              {{ dado.title }}
            </h3>
            <span class="text-sm text-gray-400 italic px-4">
              Escrito por {{ dado.author.name }}
            </span>
            <p class="p-3 text-gray-700">
              {{ dado.content }}
            </p>
          </div>

          <div class="flex justify-between px-5">
            <div>
              <a
                v-for="tag in dado.tags"
                :key="tag.id"
                href="#"
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"
              >
                {{ tag.name }}
              </a>
            </div>
            <div class="flex items-center">
              <a href="">
                <svg
                  class="w-6 h-6 text-red-500"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </a>
              <span class="text-sm text-gray-500"> {{ dado.like }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Loader from '../components/Loader.vue'
export default {
  components: {
    Loader,
  },
  data() {
    return {
      dados: null,
    }
  },
  methods: {
    async fetchSomething() {
      let data = await this.$axios.$get('http://localhost:8000/api/posts')
      this.dados = data
    },
  },
  mounted() {
    this.fetchSomething()
  },
}
</script>
<style>
.space-column {
  justify-content: space-between;
}
</style>

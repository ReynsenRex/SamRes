<template>
  <div>
    <!-- Loop through categories -->
    <div v-for="(categoryRestaurants, categoryName) in restaurants" :key="categoryName" class="my-6">
      <h3 class="text-2xl font-semibold mb-4">{{ categoryName }}</h3>

      <!-- Restaurant Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 overflow-y-auto">
        <div
          v-for="(item, index) in categoryRestaurants"
          :key="index"
          class="bg-white border shadow-md border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700"
        >
          <div class="relative h-[350px] w-full overflow-hidden rounded-t-lg">
            <img
              class="rounded-t-lg w-full h-full object-cover"
              :src="item.image_url"
              alt="Restaurant Image"
            />
          </div>
          <div class="p-5">
            <a href="#">
              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ item.name }}
              </h5>
            </a>
            <p class="mb-3 text-md font-normal text-gray-700 dark:text-gray-400">
              {{ item.category }}
            </p>
            <p class="mb-3 text-sm font-normal text-gray-700 dark:text-gray-400">
              Rating: {{ item.rating }} | Price: {{ item.price }}
            </p>
            <a :href="'/restaurants/' + item.id"
              class="inline-flex justify-center w-full px-3 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300"
            >
              View Details
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    initialRestaurants: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      // Restaurant data grouped by category
      restaurants: this.initialRestaurants,
    };
  },
};
</script>

<style scoped>
/* Custom styles for the page */
</style>

<template>
  <div>
    <!-- Loop through categories -->
    <div v-for="(categoryRestaurants, categoryName) in restaurants" :key="categoryName" class="my-6 bg-black">
      <!-- Restaurant Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 overflow-y-auto">
        <div
          v-for="(item, index) in categoryRestaurants"
          :key="index"
          class="bg-black shadow-md border-black-200 rounded-lg dark:bg-black-800 dark:border-black-700"
        >
          <a :href="'/restaurants/' + item.id + '/reserve'">
            <div class="relative h-[350px] w-full overflow-hidden rounded-t-lg">
              <img
                class="rounded-t-lg w-full h-full object-cover"
                :src="item.image"
                alt="Restaurant Image"
              />
            </div>
            <div class="p-5">
              <h5 class="mb-2 text-xl font-bold tracking-tight text-white-900 dark:text-white">
                {{ item.name }}
              </h5>
              <p class="mb-3 text-md font-normal text-white dark:text-white">
                {{ item.category }}
              </p>
              <p class="mb-3 text-sm font-normal text-white dark:text-white">
                ⭐ {{ item.rating }}
              </p>
              <p class="mb-3 text-sm font-normal text-white dark:text-white">
                {{ item.price }}
              </p>
              <p class="mb-3 text-sm font-normal text-white dark:text-white">
                {{ item.location }}
              </p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    initialRestaurants: {
      type: Array, // assuming it's an array of restaurants
      required: true,
    },
  },
  data() {
    return {
      // Grouping restaurants by category
      restaurants: this.groupByCategory(this.initialRestaurants),
    };
  },
  methods: {
    groupByCategory(restaurants) {
      return restaurants.reduce((acc, restaurant) => {
        const category = restaurant.category; // Assuming restaurant has a 'category' field
        if (!acc[category]) {
          acc[category] = [];
        }
        acc[category].push(restaurant);
        return acc;
      }, {});
    },
  },
};
</script>

<style scoped>
/* Custom styles for the page */
</style>

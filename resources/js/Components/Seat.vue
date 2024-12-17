<template>
  <div>
    <!-- Seat Legend -->
    <div class="mb-8 flex justify-between items-center">
      <div class="text-white ml-4">
        <h2 class="text-lg inline-flex items-center">
          <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Each table has 4 seats
        </h2>
      </div>

      <div class="flex space-x-6 justify-center">
        <div class="flex items-center">
          <div class="w-[24px] h-[24px] rounded-full bg-red-500 mr-2"></div>
          <span class="text-white">Reserved</span>
        </div>
        <div class="flex items-center">
          <div class="w-[24px] h-[24px] rounded-full bg-white mr-2"></div>
          <span class="text-white">Available</span>
        </div>
        <div class="flex items-center">
          <div class="w-[24px] h-[24px] rounded-full bg-blue-700 mr-2"></div>
          <span class="text-white">Book</span>
        </div>
      </div>
    </div>

    <!-- Seat Table -->
    <div id="seat-grid" class="mb-8 grid grid-cols-5 gap-4 justify-items-center">
      <div v-for="seat in seats" :key="seat.seat_number">
        <div :class="getSeatClass(seat)"
          class="w-[65px] h-[60px] mx-4 flex flex-col items-center justify-center rounded-md"
          @click="selectSeat(seat)">
          <h2 class="text-center">Table</h2>
          <h2 class="text-center">{{ seat.seat_number }}</h2>
        </div>
      </div>
    </div>

    <div v-if="selectedSeats.length" class="mt-4 mb-4 mx-4 text-xl font-semibold text-gray-900">
      <button type="button"
        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-lg rounded-lg w-full py-2.5 text-center inline-flex justify-center items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-300"
        @click="reserveSeats">
        Confirm
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 5h12m0 0L9 1m4 4L9 9" />
        </svg>
      </button>
    </div>
  </div>a
</template>

<script>
export default {
  data() {
    return {
      seats: [], // Store the seats dynamically fetched from the backend
      selectedSeats: [], // Array to store selected seats (multiple)
    };
  },
  created() {
    // Fetch seat data when the component is created
    this.fetchSeats();
  },
  methods: {
    // Fetch seat data from the backend
    fetchSeats() {
      const restaurantId = 1; // Example restaurant ID (you can pass this dynamically)
      fetch(`/seats/${restaurantId}`)
        .then(response => response.json())
        .then(data => {
          this.seats = data; // Store seat data
        })
        .catch(error => {
          console.error("Error fetching seats:", error);
        });
    },

    // Get CSS classes for each seat based on its availability
    getSeatClass(seat) {
      if (seat.status === "reserved") {
        return "bg-red-500 text-white cursor-not-allowed";
      } else if (seat.status === "available") {
        return "bg-white text-gray-800 hover:bg-blue-700 hover:text-white cursor-pointer";
      } else if (seat.status === "selected") {
        return "bg-blue-700 text-white cursor-pointer";
      }
      return "";
    },

    // Handle seat selection
    selectSeat(seat) {
      if (seat.status === "reserved") return; // Prevent selecting reserved seats

      // Toggle selection of the seat
      const seatIndex = this.selectedSeats.findIndex(
        (s) => s.seat_number === seat.seat_number
      );
      if (seatIndex >= 0) {
        this.selectedSeats.splice(seatIndex, 1); // Deselect seat
        seat.status = "available"; // Update seat status
      } else {
        this.selectedSeats.push(seat); // Select seat
        seat.status = "selected"; // Update seat status
      }
    },

    // Handle seat reservation
    // In the frontend, you'll need to send both seat_number and seat_id to the backend
    reserveSeats() {
  if (this.selectedSeats.length === 0) {
    alert("Please select at least one seat.");
    return;
  }

  // Send selected seats (by seat_number) to the backend to reserve them
  const seatNumbers = this.selectedSeats.map(seat => seat.seat_number);  // The seat numbers (for display)
  const restaurantId = 1; // Example restaurant ID

  fetch("/seats/reserve", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
    },
    body: JSON.stringify({
      restaurant_id: restaurantId,
      seats: seatNumbers,  // Pass seat numbers
    }),
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert("Seats reserved successfully!");
      this.fetchSeats(); // Refresh the seat grid
      this.selectedSeats = []; // Clear selected seats
    } else {
      alert("Failed to reserve seats.");
    }
  })
  .catch(error => {
    console.error("Error reserving seats:", error);
    alert("Failed to reserve seats.");
  });
},
  },
};
</script>

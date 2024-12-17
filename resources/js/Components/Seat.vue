<template>
  <div>
    <!-- Seat Legend -->
    <div class="mb-8 flex justify-between items-center">
      <!-- Table Notice (Left Aligned) -->
      <div class="text-white ml-4">
        <h2 class="text-lg inline-flex items-center">
          <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Each table has 4 seats
        </h2>
      </div>

      <!-- Legends (Centered) -->
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

      <!-- Empty Spacer for Alignment -->
      <div class="w-[150px]"></div>
    </div>

    <!-- Seat Table -->
    <table class="mx-auto border-collapse border-spacing-2">
      <tbody>
        <tr v-for="(row, rowIndex) in rows" :key="rowIndex">
          <td v-for="(col, colIndex) in cols" :key="colIndex" class="text-center p-2">
            <!-- Seat Label -->
            <div :class="getSeatClass(rowIndex, colIndex)"
              class="w-[65px] h-[60px] mx-4 flex flex-col items-center justify-center rounded-md"
              @click="selectSeat(rowIndex, colIndex)">
              <h2 class="text-center">Table</h2>
              <h2 class="text-center">{{ rowIndex * cols + colIndex + 1 }}</h2>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Selected Seats Cards -->
    <div class="mt-10 w-full">
      <div v-if="selectedSeats.length" class="mt-6 mx-4 grid grid-cols-1 gap-6 text-left">
        <div class="text-lg font-semibold text-white">
          <h2>Selected Seats</h2>
        </div>
        <div v-for="(seat, index) in selectedSeats" :key="index"
          class="block w-full p-4 bg-gray-800 rounded dark:bg-gray-800">
          <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
            Table {{ seat.tableNumber }}
          </h5>
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
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      rows: 5, // Number of rows
      cols: 5, // Number of columns
      tableNumber: 1,
      seatStatus: [], // 2D array for seat statuses
      selectedSeats: [], // Array to store selected seats (multiple)
      ticketPrice: 100, // Ticket price for each seat
    };
  },
  created() {
    // Initialize seat statuses to "available"
    this.seatStatus = Array.from({ length: this.rows }, () =>
      Array(this.cols).fill("available")
    );
  },
  computed: {
    // Calculate the total price for all selected seats
    totalPrice() {
      return this.selectedSeats.length * this.ticketPrice;
    },
  },
  methods: {
    getSeatClass(row, col) {
      // Return CSS classes based on seat status
      const status = this.seatStatus[row][col];
      if (status === "available")
        return "bg-white text-gray-800 hover:bg-blue-700 hover:text-white cursor-pointer";
      if (status === "reserved")
        return "bg-red-500 text-white cursor-not-allowed";
      if (status === "selected")
        return "bg-blue-700 text-white cursor-pointer";
    },
    selectSeat(row, col) {
      if (this.seatStatus[row][col] === "reserved") return;

      const seatIndex = this.selectedSeats.findIndex(
        (seat) => seat.row === row && seat.col === col
      );

      // If the seat is already selected, deselect it
      if (seatIndex >= 0) {
        this.selectedSeats.splice(seatIndex, 1);
        this.seatStatus[row][col] = "available";
      } else {
        // Add seat with table number
        const tableNumber = row * this.cols + col + 1; // Sequential table number
        this.selectedSeats.push({ row, col, tableNumber });
        this.seatStatus[row][col] = "selected";
      }
    },
    reserveSeats() {
      if (this.selectedSeats.length === 0) return;

      // Reserve all selected seats
      this.selectedSeats.forEach((seat) => {
        this.seatStatus[seat.row][seat.col] = "reserved";
      });

      // Clear selected seats
      this.selectedSeats = [];

      alert("Seats reserved successfully!");
    },
  },
};
</script>

<style>
/* Optional custom styling */
</style>

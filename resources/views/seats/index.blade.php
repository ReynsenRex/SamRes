@extends('layouts.app')
@section('title', 'Seats')

@section('content')

  <section class="bg-black dark:bg-black">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto text-center mb-8 lg:mb-16 overflow-x-auto">
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

        {{-- Seat table --}}
        <div id="seat-grid" class="mb-8 grid grid-cols-5 gap-4 justify-items-center"></div>

        {{-- Confirm button --}}
        <div class="mt-4 mb-4 mx-4 text-xl font-semibold text-gray-900">
          <button id="confirm-seats" type="button"
                  class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-lg rounded-lg w-full py-2.5 text-center inline-flex justify-center items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-300">
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
  </section>

  {{-- jQuery CDN --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      const restaurantId = 19; // Example restaurant ID
      let selectedSeats = [];

      // Fetch and render seats
      function fetchSeats() {
        $.ajax({
          url: `/seats/${restaurantId}`,
          method: "GET",
          success: function(data) {
            renderSeats(data);
          },
          error: function() {
            alert("Failed to load seats.");
          },
        });
      }

      function renderSeats(seats) {
        $("#seat-grid").empty();

        for (let i = 0; i < seats.length; i++) {
          const seat = seats[i];
          const seatClass = seat.is_available ?
            "bg-white text-gray-800 hover:bg-blue-700 hover:text-white cursor-pointer" :
            "bg-red-500 text-white cursor-not-allowed";

          $("#seat-grid").append(`
            <div data-seat-number="${seat.seat_number}"
                 class="seat w-16 h-16 flex flex-col items-center justify-center rounded-md ${seatClass}">
                <h5 class="text-md tracking-tight">
                    Table
                </h5>
                <h6 class="text-sm">
                    ${seat.seat_number}
                </h6>
            </div>
        `);
        }
      }


      // Handle seat selection
      $("#seat-grid").on("click", ".seat", function() {
        if ($(this).hasClass("bg-red-500")) return; // Prevent selecting unavailable seats

        const seatNumber = $(this).data("seat-number");

        if (selectedSeats.includes(seatNumber)) {
          // Deselect the seat
          selectedSeats = selectedSeats.filter((s) => s !== seatNumber);
          $(this).removeClass("bg-blue-700 text-white").addClass("bg-white");
        } else {
          // Select the seat
          selectedSeats.push(seatNumber);
          $(this).removeClass("bg-white").addClass("bg-blue-700 text-white");
        }
      });

      // Confirm seat reservation
      $("#confirm-seats").click(function() {
        if (!selectedSeats.length) {
          alert("Please select at least one seat.");
          return;
        }

        $.ajax({
          url: "/seats/reserve",
          method: "POST",
          data: {
            restaurant_id: restaurantId,
            seats: selectedSeats,
          },
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          success: function() {
            alert("Seats reserved successfully!");
            selectedSeats = [];
            fetchSeats();
          },
          error: function() {
            alert("Failed to reserve seats.");
          },
        });
      });

      // Initialize the seat grid
      fetchSeats();
    });
  </script>
@endsection

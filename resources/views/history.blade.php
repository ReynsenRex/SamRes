@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black text-white p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold">History</h1>
        <a href="{{ url()->previous() }}" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded">Back</a>
    </div>

    <!-- Search -->
    <div class="mb-4">
        <input type="text" placeholder="Search..." 
               class="w-full p-2 rounded bg-gray-800 text-white placeholder-gray-400 focus:ring focus:ring-gray-600">
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-900 rounded">
            <thead class="text-gray-400 uppercase text-sm">
                <tr>
                    <th class="p-3 text-left">No.</th>
                    <th class="p-3 text-left">Restaurant</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Time</th>
                    <th class="p-3 text-left">Seat</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Actions</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $index => $reservation)
                <tr class="border-b border-gray-800">
                    <td class="p-3">{{ $index + 1 }}</td>
                    <td class="p-3">{{ $reservation->restaurant->name ?? 'N/A' }}</td>
                    <td class="p-3">{{ $reservation->reservation_date }}</td>
                    <td class="p-3">{{ $reservation->reservation_time }}</td>
                    <td class="p-3">{{ $reservation->seat->seat_number ?? 'N/A' }}</td>
                    <td class="p-3">
                        @if ($reservation->status == 'Completed')
                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-sm">Success</span>
                        @elseif ($reservation->status == 'Cancelled')
                            <span class="bg-red-500 text-white px-2 py-1 rounded-full text-sm">Cancelled</span>
                        @else
                            <span class="bg-yellow-500 text-black px-2 py-1 rounded-full text-sm">On Going</span>
                        @endif
                    </td>
                    <td class="p-3">
                        @if ($reservation->status != 'Cancelled')
                            <!-- Cancel Button -->
                            <form method="POST" action="{{ route('reservation.cancel', $reservation->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                    Cancel
                                </button>
                            </form>
                        @else
                            <span class="text-red-500">Already Cancelled</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

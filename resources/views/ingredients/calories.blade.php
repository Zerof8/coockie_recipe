<div x-data="{ showModal: false, calories: '' }">
    <!-- Button to open the modal -->
    <button @click="showModal = true" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">
        Calculate Highest Score Per Calories
    </button>

    <!-- Modal backdrop -->
    <div x-show="showModal" x-transition:enter="transition-opacity duration-300"
         x-transition:leave="transition-opacity duration-300" x-on:click="showModal = false"
         class="fixed inset-0 bg-black opacity-50 backdrop-blur"></div>

    <!-- Modal dialog -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-90" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md">
            <!-- Modal header -->
            <div class="flex justify-between">
                <h2 class="text-lg font-semibold">Calculate Per Calories Score</h2>
                <!-- Close button -->
                <button @click="showModal = false">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="mt-4 text-left">
                <!-- Form for entering calories -->
                <form action="{{ route('calculate') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="calories" class="block">Enter Calories:</label>
                        <input type="number" class="form-control w-full" id="calories" name="calories" x-model="calories" required>
                    </div>

                    <!-- Calculate button -->
                    <div class="mt-4 flex justify-center">
                        <x-button type="submit" name="action" value="per_calories" class="btn btn-primary">Calculate</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

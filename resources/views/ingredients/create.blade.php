<div x-data="{ showModal: false }">
    <!-- Button to open the modal -->
    <button @click="showModal = true" class="bg-indigo-500 text-white px-4 py-2 rounded-md mb-2 md:mr-2
    hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
        Add A New Ingredient
    </button>

    <!-- Modal backdrop -->
    <div x-show="showModal" x-transition:enter="transition-opacity duration-300" x-transition:leave="transition-opacity duration-300" x-on:click="showModal = false" class="fixed inset-0 bg-black opacity-50 backdrop-blur"></div>

    <!-- Modal dialog -->
    <div x-show="showModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="fixed inset-0 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-xl">
            <!-- Modal header -->
            <div class="flex justify-between">
                <h2 class="text-lg font-semibold">Add A New Ingredient</h2>
                <!-- Close button -->
                <button @click="showModal = false">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="mt-4">
                <!-- Form for creating a new ingredient -->
                <div class="mt-4 flex justify-end">
                    <!-- Form for creating a new ingredient -->
                    <form action="{{ route('ingredients.store') }}" method="POST" class="w-full max-w-sm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control w-full" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity:</label>
                            <input type="text" class="form-control w-full" id="capacity" name="capacity" required>
                        </div>
                        <div class="form-group">
                            <label for="durability">Durability:</label>
                            <input type="text" class="form-control w-full" id="durability" name="durability" required>
                        </div>
                        <div class="form-group">
                            <label for="flavor">Flavor:</label>
                            <input type="text" class="form-control w-full" id="flavor" name="flavor" required>
                        </div>
                        <div class="form-group">
                            <label for="texture">Texture:</label>
                            <input type="text" class="form-control w-full" id="texture" name="texture" required>
                        </div>
                        <div class="form-group">
                            <label for="calories">Calories:</label>
                            <input type="text" class="form-control w-full" id="calories" name="calories" required>
                        </div>

                        <!-- Center the button -->
                        <div class="flex justify-center">
                            <x-button type="submit" class="btn btn-primary mt-4">Create</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


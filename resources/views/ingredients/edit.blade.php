<div x-data="{ showModal: false }">
    <!-- Button to open the modal -->
    <button @click="showModal = true" class="bg-blue-400 text-white w-20 px-2 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
        Edit
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
                <h2 class="text-lg font-semibold">Edit Ingredient</h2>
                <!-- Close button -->
                <button @click="showModal = false">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="mt-4 text-left">
                <!-- Form for editing an ingredient -->
                <form action="{{ route('ingredients.update', $ingredient->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="block">Name:</label>
                        <input type="text" class="form-control w-full" id="name" name="name" value="{{ $ingredient->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="block">Capacity:</label>
                        <input type="text" class="form-control w-full" id="capacity" name="capacity" value="{{ $ingredient->capacity }}" required>
                    </div>
                    <div class="form-group">
                        <label for="durability" class="block">Durability:</label>
                        <input type="text" class="form-control w-full" id="durability" name="durability" value="{{ $ingredient->durability }}" required>
                    </div>
                    <div class="form-group">
                        <label for="flavor" class="block">Flavor:</label>
                        <input type="text" class="form-control w-full" id="flavor" name="flavor" value="{{ $ingredient->flavor }}" required>
                    </div>
                    <div class="form-group">
                        <label for="texture" class="block">Texture:</label>
                        <input type="text" class="form-control w-full" id="texture" name="texture" value="{{ $ingredient->texture }}" required>
                    </div>
                    <div class="form-group">
                        <label for="calories" class="block">Calories:</label>
                        <input type="text" class="form-control w-full" id="calories" name="calories" value="{{ $ingredient->calories }}" required>
                    </div>

                    <!-- Update button -->
                    <div class="mt-4 flex justify-center">
                        <x-button type="submit" class="btn btn-primary">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

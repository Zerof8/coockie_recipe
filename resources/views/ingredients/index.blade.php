<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingredients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
{{--                <!-- Statement about the ingredient limit -->--}}
{{--                <div class="mb-4 text-gray-800">--}}
{{--                    <p class="text-sm">You can add up to 4 ingredients.</p>--}}
{{--                </div>--}}

                <!-- Table with picture and buttons -->
                <div class="flex flex-col md:flex-row items-center md:justify-between">
                    <!-- Table -->
                    <table class="max-w-full md:flex-grow mb-4 md:mb-0 overflow-x-auto">
                        <!-- Table header -->
                        <thead class="bg-gray-100 text-center">
                        <tr>
                            <!-- Table header columns -->
                            <th scope="col"
                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Capacity
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Durability
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Flavor
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Texture
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Calories
                            </th>
{{--                            <th scope="col"--}}
{{--                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                Add To Custom Recipe--}}
{{--                            </th>--}}
{{--                            <th scope="col"--}}
{{--                                class="px-2 py-3 text-xs md:text-sm font-medium text-gray-500 uppercase tracking-wider">--}}
{{--                                Actions--}}
{{--                            </th>--}}
                        </tr>
                        </thead>
                        <!-- Table body -->
                        <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Iterate through ingredients -->
                        @foreach ($ingredients as $ingredient)
                            <tr>
                                <!-- Name column -->
                                <td class="px-2 py-2 whitespace-nowrap text-center">
                                    <div class="text-xs md:text-sm font-medium text-gray-900">
                                        {{ $ingredient['name'] }}
                                    </div>
                                </td>
                                <!-- columns for each property -->
                                <td class="px-2 py-2 whitespace-nowrap text-center">{{ $ingredient['capacity'] }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-center">{{ $ingredient['durability'] }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-center">{{ $ingredient['flavor'] }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-center">{{ $ingredient['texture'] }}</td>
                                <td class="px-2 py-2 whitespace-nowrap text-center">{{ $ingredient['calories'] }}</td>
{{--                                <!-- Add to Recipe column -->--}}
{{--                                <td class="px-2 py-2 whitespace-nowrap text-center">--}}
{{--                                    <input type="number" class="form-input w-20 add-to-recipe" min="0" max="100"--}}
{{--                                           value="0">--}}
{{--                                </td>--}}
{{--                                <!-- Actions column -->--}}
{{--                                <td class="px-2 py-2 whitespace-nowrap text-center">--}}
{{--                                    @include('ingredients.edit')--}}
{{--                                    <!-- Form for deleting an ingredient -->--}}
{{--                                    <form action="{{ route('ingredients.destroy', $ingredient['id']) }}" method="POST"--}}
{{--                                          onsubmit="return confirm('Are you sure you want to delete this ingredient?')">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <!-- Delete button -->--}}
{{--                                        <button type="submit"--}}
{{--                                                class="bg-red-400 mt-2 w-20 text-center text-xs md:text-sm text-white py-2 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-700">--}}
{{--                                            Delete--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
{{--                <!-- Include the create modal -->--}}
{{--                <div class="flex justify-end mt-4">--}}
{{--                    <div class="w-full">--}}
{{--                        @if (count($ingredients) < 4)--}}
{{--                            @include('ingredients.create')--}}
{{--                        @else--}}
{{--                            <button--}}
{{--                                class="bg-gray-300 cursor-not-allowed text-gray-600 px-4 py-2 rounded-md mb-2 md:mr-2">--}}
{{--                                Add Ingredient (Limit Reached)--}}
{{--                            </button>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Calculation buttons -->
                <div class="flex flex-col md:flex-row mt-4 justify-center">
                    <div class="px-6">
                        @include('ingredients.calories')
                    </div>
                    @if(count($ingredients) > 0)
                        <form action="{{ route('calculate') }}" method="POST" class="mb-4 md:mb-0">
                            @csrf
                            <div class="flex">
                                <button type="submit" name="action" value="highest"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md mb-2 md:mr-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    Calculate Highest Score
                                </button>
                            </div>
                            @else
                                <div class="flex">
                                    <button class="bg-gray-300 cursor-not-allowed text-gray-600 px-4 py-2 rounded-md mb-2 md:mr-2">Calculate Highest Score (Not Enough Ingredients)</button>
                                    <button class="bg-gray-300 cursor-not-allowed text-gray-600 px-4 py-2 rounded-md mb-2 md:mr-2">Calculate Highest Score Per Calories (Not Enough Ingredients)</button>
                                </div>
                        </form>
                    @endif
                </div>
                <!-- Result section -->
                <div class="bg-blue-100 border border-blue-400 mt-2 text-blue-700 px-4 py-3 rounded relative">
                    <strong class="font-bold">Result:</strong>
                    @if(session()->has('result'))
                            <span class="block sm:inline">{{ session('result')['message'] }}</span>
                        @if(isset(session('result')['score']))
                            <span class="block sm:inline">Score: {{ number_format(session('result')['score']) }}</span>
                        @endif
                        <br>
                        @if(!empty(session('result')['quantities']))
                            <span class="block sm:inline">Quantities:</span>
                            <ul>
                                @foreach(session('result')['quantities'] as $ingredient => $teaspoons)
                                    <li>{{ $ingredient }}: {{ $teaspoons }} teaspoons</li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        let inputs = document.querySelectorAll('.add-to-recipe');--}}
{{--        inputs.forEach(input => {--}}
{{--            input.addEventListener('input', function () {--}}
{{--                let total = 0;--}}
{{--                inputs.forEach(i => {--}}
{{--                    total += parseInt(i.value);--}}
{{--                });--}}
{{--                if (total > 100) {--}}
{{--                    alert('Total exceeds 100. Please adjust the values.');--}}
{{--                    input.value = 0;--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

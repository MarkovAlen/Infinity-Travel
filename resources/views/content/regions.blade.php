<x-app-layout>
    
    <div class="div text-center ">
        @if(session('success'))
        <div class="alert alert-success">
        <h1 class="text-white text-xl ">{{ session('success') }}</h1>    
        </div>
    @endif

    
    
    </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        <form method="POST" action="{{ route('regions.store') }}">
                            @csrf
                            <!-- Name -->
                            <div>
                                <p class="text-white text-center">Add a Region</p>
                            </div>
                            <label for="country_id" class="mr-3 dark:text-gray-100">Select a country that the region is in:</label>
                            <select name="country_id" id="country_id">
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <x-input-label for="region_name" :value="__('Name of region:')" />
                                <x-text-input id="region_name" class="block mt-1 w-full" type="text" name="region_name" :value="old('region_name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('region_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-primary-button class="mt-4" >
                                    {{ __('Add') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <form method="POST" action="{{ route('regions.edit') }}">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div>
                                <p class="text-center mb-6 dark:text-gray-100">Edit a region</p>
                            </div>
                            <label for="region_id" class="mr-3 dark:text-gray-100">Select region:</label>
                            <select name="region_id" id="region_id">
                                @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <x-input-label for="region_name" :value="__('Name')" />
                                <x-text-input id="region_name" class="block mt-1 w-full" type="text" name="region_name" autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('region_name')" class="mt-2" />
                            </div>
                            <div>
                                <x-primary-button class="mt-4">
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('regions.destroy') }}">
                            @csrf
                            @method('DELETE')
                            
                            <div>
                                <p class="text-center mb-6 dark:text-gray-100">Delete a region</p>
                            </div>
                            <label for="region_id" class="mr-3 dark:text-gray-100">Select Region:</label>
                            <select name="region_id" id="region_id">
                                @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                                @endforeach
                            </select>
                            <div>
                                <x-primary-button class="mt-4">
                                    {{ __('Remove') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </x-app-layout>
    
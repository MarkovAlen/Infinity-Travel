<x-app-layout>

    <div class="text-center">
        @if(session('success'))
            <div class="alert alert-success">
                <h1 class="text-white text-xl">{{ session('success') }}</h1>
            </div>
        @endif
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('accommodations.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <p class="text-white text-center">Add an Accommodation</p>
                        </div>
                        <label for="region_id" class="mr-3 dark:text-gray-100">Select a region that the accommodation is in:</label>
                        <select name="region_id" id="region_idd">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                            @endforeach
                        </select>
                        <div class="flex justify-between mt-5" style="margin-top: 30px">
                            <div>
                                <x-input-label for="namee" :value="__('Name of accommodation:')" />
                                <x-text-input id="namee" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="main_imagee" :value="__('Main image URL:')" />
                                <x-text-input id="main_imagee" class="block mt-1 w-full" type="text" name="main_image" :value="old('main_image')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('main_image')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="additional_informationn" :value="__('Additional information:')" />
                                <x-text-input id="additional_informationn" class="block mt-1 w-full" type="text" name="additional_information" :value="old('additional_information')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('additional_information')" class="mt-2" />
                            </div>
                            
                        </div>
                        <div class="flex justify-between mt-5" style="margin-top: 40px">
                            <div>
                                <label for="rating_idd" class="mr-3 dark:text-gray-100">Select a rating:</label>
                                <select name="rating_id" id="rating_idd">
                                    @foreach($ratings as $rating)
                                        <option value="{{ $rating->id }}">{{ $rating->rating }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-5">
                                <label class="dark:text-gray-100">Is it last-minute</label>
                                <div class="flex items-center mt-2">
                                    <label for="last_minute_yess" style="margin-right: 30px" class="text-white">
                                        <input  id="last_minute_yess" type="radio" name="is_last_minute" value={{true}} {{ old('is_last_minute') == '1' ? 'checked' : '' }}>
                                        Yes
                                    </label>
                                    <label for="last_minute_noo" class="text-white">
                                        <input id="last_minute_noo" type="radio" name="is_last_minute" value={{false}} {{ old('is_last_minute') == '0' ? 'checked' : '' }}>
                                        No
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('is_last_minute')" class="mt-2" />
                            </div>
                        </div>
                        <div style="margin-top: 30px">
                            <x-input-label for="descriptionn" :value="__('Description:')" />
                            <x-text-input id="descriptionn" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div style="margin-top: 30px">
                            <x-input-label for="transportt" :value="__('Transport:')" />
                            <x-text-input id="transportt" class="block mt-1 w-full" type="text" name="transport" :value="old('transport')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('transport')" class="mt-2" />
                        </div>
                        <div>

                            <div class="flex justify-between mt-5" style="margin-top: 40px">
                                <div>
                                    <x-input-label for="image_path_11" :value="__('Details image-1:')" />
                                    <x-text-input id="image_path_11" class="block mt-1 w-full" type="text" name="image_path_1" :value="old('image_path_1')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('image_path_1')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="image_path_22" :value="__('Details image-2:')" />
                                    <x-text-input id="image_path_22" class="block mt-1 w-full" type="text" name="image_path_2" :value="old('image_path_2')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('image_path_2')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="image_path_33" :value="__('Details image-3:')" />
                                    <x-text-input id="image_path_33" class="block mt-1 w-full" type="text" name="image_path_3" :value="old('image_path_3')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('image_path_3')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="image_path_44" :value="__('Details image-4:')" />
                                    <x-text-input id="image_path_44" class="block mt-1 w-full" type="text" name="image_path_4" :value="old('image_path_4')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('image_path_4')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="image_path_55" :value="__('Details image-5:')" />
                                    <x-text-input id="image_path_55" class="block mt-1 w-full" type="text" name="image_path_5" :value="old('image_path_5')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('image_path_5')" class="mt-2" />
                                </div>
                            </div>

                            <x-primary-button class="mt-4">
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
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('accommodations.edit') }}">
                            @csrf
                            @method('PUT')
                            <div>
                                <p class="text-white text-center">Edit an Accommodation</p>
                            </div>
                            <label for="accommodation_id" class="mr-3 dark:text-gray-100">Select an accommodation to edit:</label>
                            <select name="accommodation_id" id="accommodation_id">
                                <option value="" disabled selected>Select an accommodation</option>
                                @foreach($accommodations as $accommodation)
                                    <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                @endforeach
                            </select>
                            <div class="flex justify-between mt-5" style="margin-top: 30px">
                                <div>
                                    <x-input-label for="name" :value="__('Name of accommodation:')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="main_image" :value="__('Main image URL:')" />
                                    <x-text-input id="main_image" class="block mt-1 w-full" type="text" name="main_image" :value="old('main_image')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('main_image')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="additional_information" :value="__('Additional information:')" />
                                    <x-text-input id="additional_information" class="block mt-1 w-full" type="text" name="additional_information" :value="old('additional_information')" required autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('additional_information')" class="mt-2" />
                                </div>
                            </div>
                            <div class="flex justify-between mt-5" style="margin-top: 40px">
                                <div>
                                    <label for="rating_id" class="mr-3 dark:text-gray-100">Select a rating:</label>
                                    <select name="rating_id" id="rating_id">
                                        @foreach($ratings as $rating)
                                            <option value="{{ $rating->id }}">{{ $rating->rating }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-5">
                                    <label class="dark:text-gray-100">Is it last-minute</label>
                                    <div class="flex items-center mt-2">
                                        <label for="last_minute_yes" style="margin-right: 30px" class="text-white">
                                            <input  id="last_minute_yes" type="radio" name="is_last_minute" value={{true}} {{ old('is_last_minute') == '1' ? 'checked' : '' }}>
                                            Yes
                                        </label>
                                        <label for="last_minute_no" class="text-white">
                                            <input id="last_minute_no" type="radio" name="is_last_minute" value={{false}} {{ old('is_last_minute') == '0' ? 'checked' : '' }}>
                                            No
                                        </label>
                                    </div>
                                    <x-input-error :messages="$errors->get('is_last_minute')" class="mt-2" />
                                </div>
                            </div>
                            <div style="margin-top: 30px">
                                <x-input-label for="description" :value="__('Description:')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <div style="margin-top: 30px">
                                <x-input-label for="transport" :value="__('Transport:')" />
                                <x-text-input id="transport" class="block mt-1 w-full" type="text" name="transport" :value="old('transport')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('transport')" class="mt-2" />
                            </div>
                            <div>
    
                                <div class="flex justify-between mt-5" style="margin-top: 40px">
                                    <div>
                                        <x-input-label for="image_path_1" :value="__('Details image-1:')" />
                                        <x-text-input id="image_path_1" class="block mt-1 w-full" type="text" name="image_path_1" :value="old('image_path_1')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('image_path_1')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="image_path_2" :value="__('Details image-2:')" />
                                        <x-text-input id="image_path_2" class="block mt-1 w-full" type="text" name="image_path_2" :value="old('image_path_2')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('image_path_2')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="image_path_3" :value="__('Details image-3:')" />
                                        <x-text-input id="image_path_3" class="block mt-1 w-full" type="text" name="image_path_3" :value="old('image_path_3')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('image_path_3')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="image_path_4" :value="__('Details image-4:')" />
                                        <x-text-input id="image_path_4" class="block mt-1 w-full" type="text" name="image_path_4" :value="old('image_path_4')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('image_path_4')" class="mt-2" />
                                    </div>
                                    <div>
                                        <x-input-label for="image_path_5" :value="__('Details image-5:')" />
                                        <x-text-input id="image_path_5" class="block mt-1 w-full" type="text" name="image_path_5" :value="old('image_path_5')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('image_path_5')" class="mt-2" />
                                    </div>
                                </div>
    
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
                        <form method="POST" action="{{ route('accommodations.destroy') }}">
                            @csrf
                            @method('DELETE')
                            
                            <div>
                                <p class="text-center mb-6 dark:text-gray-100">Delete an Accommodation</p>
                            </div>
                            <label for="accommodation_id" class="mr-3 dark:text-gray-100">Select an accommodation to delete:</label>
                            <select name="accommodation_id" id="accommodation_id">
                                @foreach($accommodations as $accommodation)
                                    <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
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
<script>
    document.getElementById('accommodation_id').addEventListener('change', function () {
        var accommodationId = this.value;

        fetch('/get-accommodation-details/' + accommodationId)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('name').value = data.accommodation.name;
                document.getElementById('main_image').value = data.accommodation.main_image;
                document.getElementById('additional_information').value = data.accommodation.additional_information;
                document.getElementById('rating_id').value = data.accommodation.rating_id;
                document.getElementById('description').value = data.detailed_info.description;
                document.getElementById('transport').value = data.detailed_info.transport;
                document.getElementById('image_path_1').value = data.gallery.image_path_1;
                document.getElementById('image_path_2').value = data.gallery.image_path_2;
                document.getElementById('image_path_3').value = data.gallery.image_path_3;
                document.getElementById('image_path_4').value = data.gallery.image_path_4;
                document.getElementById('image_path_5').value = data.gallery.image_path_5;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>



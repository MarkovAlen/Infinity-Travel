<x-app-layout>

    <div class="text-center">
        @if(session('success'))
            <div class="alert alert-success">
                <h1 class="text-white text-xl">{{ session('success') }}</h1>
            </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            <h1 class="text-white text-xl">{{ session('error') }}</h1>
        </div>
    @endif
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('rooms.store') }}">
                        @csrf
                        <!-- Name -->
                        <div>
                            <p class="text-white text-center">Add an Room</p>
                        </div>
                        <label for="accommodation_idd" class="mr-3 dark:text-gray-100">Select an accommodation the room is in :</label>
                            <select name="accommodation_id" id="accommodation_idd">
                                @foreach($accommodations as $accommodation)
                                    <option value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                                @endforeach
                            </select>
                        <div class="flex justify-between mt-5" style="margin-top: 30px">
                            <div>
                                <x-input-label for="room_numberr" :value="__('Room number	:')" />
                                <x-text-input id="room_numberr	" class="block mt-1 w-full" type="text" name="room_number" :value="old('room_number')" required autofocus autocomplete="room_number" />
                                <x-input-error :messages="$errors->get('room_number')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="namer" :value="__('Nights number	:')" />
                                <x-text-input id="nights_numberr	" class="block mt-1 w-full" type="text" name="nights_number" :value="old('nights_number')" required autofocus autocomplete="nights_number" />
                                <x-input-error :messages="$errors->get('nights_number')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="price_per_nightt" :value="__('Price per night:')" />
                                <x-text-input id="price_per_nightt" class="block mt-1 w-full" type="text" name="price_per_night" :value="old('price_per_night')" required autofocus autocomplete="price_per_night" />
                                <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="total_pricee" :value="__('Total price :')" />
                                <x-text-input id="total_pricee" class="block mt-1 w-full" type="text" name="total_price" :value="old('total_price')" required autofocus autocomplete="total_price" />
                                <x-input-error :messages="$errors->get('total_price')" class="mt-2" />
                            </div>
                           
                        </div>
                        <div style="margin-top: 30px">
                            <x-input-label for="type_of_roomm" :value="__('Type of room:')" />
                            <x-text-input id="type_of_roomm" class="block mt-1 w-full" type="text" name="type_of_room" :value="old('type_of_room')" required autofocus autocomplete="type_of_room" />
                            <x-input-error :messages="$errors->get('type_of_room')" class="mt-2" />
                        </div>
                        <div class="flex justify-between mt-5" style="margin-top: 40px">
                            
                            <div class="mt-5"style="margin-bot: 40px">
                                <label class="dark:text-gray-100">Is it reserved</label>
                                <div class="flex items-center mt-2">
                                    <label for="is_reserved_yess" style="margin-right: 30px" class="text-white">
                                        <input  id="is_reserved_yess" type="radio" name="is_reserved" value={{true}}>
                                        Yes
                                    </label>
                                    <label for="is_reserved_noo" class="text-white">
                                        <input id="is_reserved_noo" type="radio" name="is_reserved" value={{false}} >
                                        No
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('is_reserved')" class="mt-2" />
                            </div>
                            <div >
                                <x-input-label for="available_datee" :value="__('Available date:')" />
                                <x-text-input id="available_datee" class="block mt-1 w-full" type="date" name="available_date" :value="old('available_date')" required autofocus autocomplete="available_date" />
                                <x-input-error :messages="$errors->get('available_date')" class="mt-2" />
                                
                            </div>
                        </div>
                       
                        <div>

    

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
                    <form method="POST" action="{{ route('rooms.edit') }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <p class="text-white text-center">Edit a room</p>
                        </div>
                        <div class="flex justify-between mt-5" style="margin-top: 30px">
                       
                        
                            <div>
                                <label for="room_number" class="mr-3 dark:text-gray-100">Select a room to edit :</label>
                                <select name="room_number" id="room_number">
                                    <option value="" disabled selected>Select a room number</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->detailedInfo->accommodation->name }} - Room {{ $room->room_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-between mt-5" style="margin-top: 30px">
                          
                            <div>
                                <x-input-label for="name" :value="__('Nights number	:')" />
                                <x-text-input id="nights_number	" class="block mt-1 w-full" type="text" name="nights_number" :value="old('nights_number')" required autofocus autocomplete="nights_number" />
                                <x-input-error :messages="$errors->get('nights_number')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="price_per_night" :value="__('Price per night:')" />
                                <x-text-input id="price_per_night" class="block mt-1 w-full" type="text" name="price_per_night" :value="old('price_per_night')" required autofocus autocomplete="price_per_night" />
                                <x-input-error :messages="$errors->get('price_per_night')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="total_price" :value="__('Total price :')" />
                                <x-text-input id="total_price" class="block mt-1 w-full" type="text" name="total_price" :value="old('total_price')" required autofocus autocomplete="total_price" />
                                <x-input-error :messages="$errors->get('total_price')" class="mt-2" />
                            </div>
                           
                        </div>
                        <div style="margin-top: 30px">
                            <x-input-label for="type_of_room" :value="__('Type of room:')" />
                            <x-text-input id="type_of_room" class="block mt-1 w-full" type="text" name="type_of_room" :value="old('type_of_room')" required autofocus autocomplete="type_of_room" />
                            <x-input-error :messages="$errors->get('type_of_room')" class="mt-2" />
                        </div>
                        <div class="flex justify-between mt-5" style="margin-top: 40px">
                            
                            <div class="mt-5"style="margin-bot: 40px">
                                <label class="dark:text-gray-100">Is it reserved</label>
                                <div class="flex items-center mt-2">
                                    <label for="is_reserved_yes" style="margin-right: 30px" class="text-white">
                                        <input  id="is_reserved_yes" type="radio" name="is_reserved" value={{true}}>
                                        Yes
                                    </label>
                                    <label for="is_reserved_no" class="text-white">
                                        <input id="is_reserved_no" type="radio" name="is_reserved" value={{false}} >
                                        No
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('is_reserved')" class="mt-2" />
                            </div>
                            <div >
                                <x-input-label for="available_date" :value="__('Available date:')" />
                                <x-text-input id="available_date" class="block mt-1 w-full" type="date" name="available_date" :value="old('available_date')" required autofocus autocomplete="available_date" />
                                <x-input-error :messages="$errors->get('available_date')" class="mt-2" />
                                
                            </div>
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
                    <form method="POST" action="{{ route('rooms.destroy') }}">
                        @csrf
                        @method('DELETE')
                        
                        <div>
                            <p class="text-center mb-6 dark:text-gray-100">Delete a Room</p>
                        </div>
                            <label for="room_number" class="mr-3 dark:text-gray-100">Select a room to delete :</label>
                            <select name="room_number" id="room_number">
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->detailedInfo->accommodation->name }} - Room {{ $room->room_number }}</option>
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
    //total price 
    document.getElementById('price_per_nightt').addEventListener('input', updateTotalPrice);
    document.getElementById('nights_numberr').addEventListener('input', updateTotalPrice);
    function updateTotalPrice() {
        var pricePerNight = parseFloat(document.getElementById('price_per_nightt').value) || 0;
        var nightsNumber = parseFloat(document.getElementById('nights_numberr').value) || 0;
        var totalPrice = pricePerNight * nightsNumber;
        document.getElementById('total_pricee').value = totalPrice; 
    }
    //room auto fill
    document.getElementById('room_number').addEventListener('change', function () {
        var roomNumber = this.value;

        fetch('/get-room-details/' + roomNumber)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('type_of_room').value = data.type_of_room;
                document.getElementById('nights_number').value = data.nights_number;
                document.getElementById('total_price').value = parseInt(data.nights_number) * parseInt(data.price_per_night);
                document.getElementById('price_per_night').value = data.price_per_night;
                document.getElementById('available_date').value = data.available_date;
                document.getElementById('description').value = data.description;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
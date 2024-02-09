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
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form method="POST" action="{{ route('offers.store') }}">
                            @csrf
                            <!-- Name -->
                            <div>
                                <p class="text-white text-center">Send an offer</p>
                            </div>
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="offer" :value="__('Offer')" />
                                <x-text-input id="offer" class="block mt-1 w-full h-32" style="height:100px"  type="textarea" name="offer" :value="old('offer')" rows="5" required autofocus autocomplete="offer" />
                                <x-input-error :messages="$errors->get('offer')" class="mt-2" />
                            </div>                            
                            <div>
                                <x-primary-button class="mt-4" name='add_offer'>
                                    {{ __('Add') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
      
  
    
    </x-app-layout>
    
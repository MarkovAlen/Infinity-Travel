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
                      <div>
                        <p class="text-center">Airplane Tickets:</p>
                        @foreach ($tickets as $ticket)
                         <p>
                            Name: {{$ticket->name}}
                            <br>
                            Surname: {{$ticket->surname}}
                            <br>
                            Email: {{$ticket->email}}
                            <br>
                            Phone Number: {{$ticket->phone_number}}
                            <br>
                            Class: {{$ticket->class}}
                            <br>
                            Origin: {{$ticket->origin}}
                            <br>
                            Destination: {{$ticket->destination}}
                            <br>
                            Date Of Going: {{$ticket->date_of_going}}
                            <br>
                            Return Date: {{$ticket->return_date}}
                            <br>
                            Adults Number: {{$ticket->adults_number}}
                            <br>
                            Kids Number: {{$ticket->kids_number}}
                            <br>
                            Babies Number: {{$ticket->babies_number}}

                        </p>   
                        @endforeach
                      </div>
                    </div>
                </div>
            </div>
        </div>
    
        
    
    </x-app-layout>
    
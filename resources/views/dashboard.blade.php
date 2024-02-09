<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-banner d-flex align-items-center justify-content-center">
        <div class="row ">
            <div class="col-md-12 text-center ">
                <h3 class="animate-charcter">INFINITY TRAVEL</h3>
            </div>
        </div>
    </div>
</x-app-layout>


<style>
    .animate-charcter
{
    
   text-transform: uppercase;
  background-image: linear-gradient(
    -225deg,
    #DCAB23 0%,
    #d1ca01 29%,
    #8e8901 67%,
    #111827 100%
  );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2.5s linear infinite;
  display: inline-block;

}
@media(min-width:768px){
    .animate-charcter{
        font-size: 70px;
    }
}
@keyframes textclip {
  to {
    background-position: 210% center;
  }
}
</style>
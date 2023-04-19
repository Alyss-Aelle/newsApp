<x-app-layout>
    <script src="https://cdn.tailwindscss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             Info News
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="md:p-8 p-2 bg-white">
            <!--Banner image-->
            <img
              class="rounded-lg w-full"
              src="{{Storage::url($actu->image)}}"
              
            />
    <!--Title-->
    <h1
    class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate"
  >
  {{$actu->titre}}
  </h1>
  <!--Description-->
  <div class="max-w-full">
    <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
      {{$actu->description}}
    </p>
    </div>
    </div>
</x-app-layout>
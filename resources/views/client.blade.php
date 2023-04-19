@extends('layoutsclient.appclient')

@section('main')
<x-app-layout>
    <script src="https://cdn.tailwindscss.com"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             News
        </h2>
    </x-slot>

    <div class="py-12">
  
      
        
 <div class="antialiased md:bg-gray-100">
    <!--Parent div-->
    
    <div class="grid grid-cols-3 md:grid-cols-3 gap-3">
      <!--First card-->
      @forelse ($actus as $itemActu)

      <div class="md:p-8 p-2 bg-white">
        <!--Banner image-->
        <img
          class="rounded-lg w-full"
          src="{{Storage::url($itemActu->image)}}"
          
        />
       
        <!--Title-->
        <h1
          class="font-semibold text-gray-900 leading-none text-xl mt-1 capitalize truncate"
        >
        {{$itemActu->titre}}
        </h1>
        <!--Description-->
        <div class="max-w-full">
          <p class="text-base font-medium tracking-wide text-gray-600 mt-1">
            {{$itemActu->description}}
          </p>
          <div class="bg-orange-600 px-8 py-3 text-white rounded-md font-bold">
          <a href="{{route('news.info',$itemActu->id)}}"> voir plus </a>
        </div>

      </div>
      <!--End of first card-->

      @empty
      <h1>rien</h1>
      @endforelse
        </div>
      </div>
      <!--End of first card-->
    </div>
    <!--End of parent div-->


</div>

    </div>
</x-app-layout>
@endsection
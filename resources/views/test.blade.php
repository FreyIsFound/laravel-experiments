<x-layout title="Test">
    <h1>Test</h1>
{{--    @dd($array)--}}

    @if(count($array))
        @foreach($array as $key => $item)
            <li>Item : {{$item}} for Key: {{$key}}</li>
        @endforeach
    @else
        <p>There are no items</p>
    @endif
{{-- can be shortened to this  --}}
    @forelse($array as $key=>$item)
        <li>Item : {{$item}} for Key: {{$key}}</li>
    @empty
        <p>There are no items</p>
    @endforelse

    @can('edit', $post??"test") {{-- syntax for checking if an user can do something and then render the result --}}
        <a href="/posts/edit">Edit</a>
    @endcan

   <x-card class="max-w-400">
       <p>{{$person}}</p>
   </x-card>
</x-layout>

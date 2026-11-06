<x-layout title="Test">
    <h1 class="text-white">Add items</h1>
    <form method="POST" action="/items">
        @csrf

        <div class="col-span-full">
            <label for="item_name" class="block text-sm/6 font-medium text-white">Item</label>
            <input type="text" id="item_name" name="item_name" class="block w-full rounded-md text-white bg-white/5 px-3">
        </div>
        <div class="col-span-full">
            <label for="description" class="block text-sm/6 font-medium text-white">Description</label>
            <textarea id="description" name="description" rows="3" class="block w-full rounded-md text-white bg-white/5 px-3"></textarea>
        </div>
        <p class="mt-3 text-sm/6 text-gray-400">Describe the item.</p>
        <div class="mt-6 flex items-center gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-inidgo-500">Add</button>
        </div>
    </form>

    @if(count($items))
        <div class="mt-6">
            <h2 class="font-bold">Items temp list</h2>
            <ul class="text-white">
                @foreach($items as $key => $item)
                    <li>{{$key+1}}. {{$item["item_name"]}}: {{$item["description"]}}</li>
                @endforeach
            </ul>
        </div>
    <div>
        <form method="POST" action="/items/clear">
            @csrf
            <div class="mt-6 flex items-center gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-inidgo-500">Clear</button>
            </div>
        </form>
        <form method="POST" action="/items/save">
            @csrf
            <div class="mt-6 flex items-center gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-inidgo-500">Save</button>
            </div>
        </form>
    </div>
    @endif

    @if($db_items->count())
        <div class="mt-6">
            <h2 class="font-bold">Saved Item list</h2>
            <ul class="text-white">
                @foreach($db_items as  $db_item)
                    <li class="mb-2">
                        {{$db_item->item_name}}: {{$db_item->description}}
                        <form action="/items/{{ $db_item->id }}/toggle" method="POST" style="display: inline; margin-left: 10px">
                        @csrf
                            <button type="submit"
                                    class="text-xs px-2 py-0.5 rounded text-white {{ $db_item->active == 1 ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }}">
                                {{ $db_item->active == 1 ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


</x-layout>

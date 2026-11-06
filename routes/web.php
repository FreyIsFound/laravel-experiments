<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Item;

Route::get('/', function () {
    return view('home');
});

Route::view("about", "about");


Route::view("contact", "contact");

Route::view("test", "test", [
    'person' => request('person', 'apple'),
    'array'=> ['apple', 'banana'],
]);


Route::get('/items', function () {
    $items = session('items', []);
    $db_items = Item::query()
        ->when(request()->filled('active'), function ($query, $active) {
//            dd($active);
            $query->where('active', request('active'));
        })
    ->get();
    return view('items_form', [
        'items' => $items,
        'db_items' => $db_items,
    ]);
});

Route::post('items', function (Request $request) {

    $validated = $request->validate([
        'item_name' => 'required|string',
        'description' => 'required|string|max:255',
    ]);
    session()->push('items', $validated);

    return redirect('/items');

});

Route::post('items/clear', function (Request $request) {
    session()->forget('items');
    return redirect('/items');

});
Route::post('items/save', function (Request $request) {
    foreach (session('items') as $item) {
        Item::create([
            'item_name' => $item['item_name'],
            'description' => $item['description'],
            'active' => 1,
        ]);
    }
    session()->forget('items');
    return redirect('/items');

});

Route::post('items/{id}/toggle', function ($id) {
    $item = Item::findOrFail($id);
    $item->active = $item->active == 1 ? 0 : 1;
    $item->save();
    return redirect('/items');
});

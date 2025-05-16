<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Keep for validation

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->paginate(10); // Get latest items, paginated
        return view('items.index', compact('items')); // Pass items to a Blade view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create'); // Show a creation form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('items.create') // Or back()
                        ->withErrors($validator)
                        ->withInput();
        }

        Item::create($validator->validated());

        return redirect()->route('items.index')
                         ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item) // Route model binding
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item) // Route model binding
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item) // Route model binding
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('items.edit', $item->id) // Or back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validatedData = $validator->validated();
        if (!empty($validatedData)) {
            $item->update($validatedData);
        }

        return redirect()->route('items.index')
                         ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item) // Route model binding
    {
        $item->delete();

        return redirect()->route('items.index')
                         ->with('success', 'Item deleted successfully.');
    }
}

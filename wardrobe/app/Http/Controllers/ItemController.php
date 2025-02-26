<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $items = $request->user()->items()->with('category')->get();
        
        return response()->json([
            'data' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color' => 'required|string|max:255',
            'season' => 'required|string|max:255',
            'image_url' => 'nullable|string|max:2048',
        ]);

        $item = $request->user()->items()->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'color' => $request->color,
            'season' => $request->season,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Item created successfully',
            'data' => $item
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Item $item)
    {
        // Check if the item belongs to the authenticated user
        if ($item->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'data' => $item->load('category')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Check if the item belongs to the authenticated user
        if ($item->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color' => 'required|string|max:255',
            'season' => 'required|string|max:255',
            'image_url' => 'nullable|string|max:2048',
        ]);

        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'color' => $request->color,
            'season' => $request->season,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'message' => 'Item updated successfully',
            'data' => $item
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Item $item)
    {
        // Check if the item belongs to the authenticated user
        if ($item->user_id !== $request->user()->id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully'
        ]);
    }
}
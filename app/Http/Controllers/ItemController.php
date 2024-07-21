<?php

namespace App\Http\Controllers;

use App\Application\Item\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        $items = $this->itemService->getAllItems();
        return response()->json($items);
    }

    public function show($id)
    {
        $item = $this->itemService->getItemById($id);
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $this->itemService->createItem($request->all());
        return response()->json(['message' => 'Item created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $this->itemService->updateItem($id, $request->all());
        return response()->json(['message' => 'Item updated successfully']);
    }

    public function destroy($id)
    {
        $this->itemService->deleteItem($id);
        return response()->json(['message' => 'Item deleted successfully']);
    }
}

<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API endpoints for catalog
Route::prefix('v1')->group(function () {

    // Get all categories
    Route::get('/categories', function () {
        return response()->json([
            'success' => true,
            'data' => Category::withCount('products')->get(),
        ]);
    });

    // Get all products (with optional category filter)
    Route::get('/products', function (Request $request) {
        $query = Product::with('category')->where('is_active', true);

        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        return response()->json([
            'success' => true,
            'data' => $query->orderBy('name')->get(),
        ]);
    });

    // Get single product by slug
    Route::get('/products/{slug}', function (string $slug) {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    });
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;//ProductResource
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/demo', function(){
   $data = Product::all();
   return response()->json($data);
});




Route::get('test-api', function () {
   // return UserResource::collection(User::all());
 // return new ProductResource(Product::First());
 return ProductResource::collection(Product::take(10)->get());
});

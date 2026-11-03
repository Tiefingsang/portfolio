<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AutomatedBlogController;

Route::get('/test', function () {
    return response()->json([
        'success' => true,
        'message' => 'API du portfolio Tiefing Sangaré opérationnelle.',
    ]);
});



Route::middleware('automation.token')->group(function () {
    Route::post('/automation/blog', [AutomatedBlogController::class, 'store']);
});

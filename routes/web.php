<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/jobs', function () {
//    return '<h1>Available Jobs</h1>';
//});
//Json Example
//Route::get('/api/users', function () {
//    return [
//        'id' => '123',
//        'name' => 'John Doe',
//'email' => 'john@gmail.com',
//    ];
//});

//redirect example
//Route:: redirect( uri: "/first" , destination: "/second");

//Route::get('/post/{id}', function (string $id) {
//    return 'This is the students with this id '.$id;
//});


//Route::get('/test', function (Request $request) {
//    return $request;
//});
//Route::get('/test', function (Illuminate\Http\Request $request) {
//    return [
//        'method' => $request->method(),
//        'url' => $request->url(),
//        'path' => $request->path(),
//        'fullUrl' => $request->fullUrl(),
//        'ip' => $request->ip(),
//        'userAgent' => $request->userAgent(),
//        'header' => $request->header(),
//    ];
//});

//Route::get('/test', function () {
//    return response('Hello, World!');
//});


//Route::get('/read-cookie', function (Request $request) {
//    $cookieValue = $request->cookie('hello');
//    return response()->json(['cookie' => $cookieValue]);
//});





// Assignment: Routing, Requests & Responses

//Detyra 1

Route::get('/courses', function () {
    return '<h1>Available Courses</h1>';
})->name('courses');

Route::get('/home', function () {
    return '<a href="' . route('courses') . '">Courses</a>';
});


// Detyra 2

Route::get('/courses/{id}', function ($id) {
    return 'Course ' . $id;
})->whereNumber('id');

Route::get('/courses/{id}/{title}', function ($id, $title) {
    return 'Course ' . $id . ': ' . $title;
})->whereNumber('id')->whereAlpha('title');

Route::get('/courses/category/{category?}', function ($category = null) {
    if ($category) {
        return 'Category: ' . $category;
    }

    return 'All categories';
});


// detyra 3
Route::get('/courses/search', function (Request $request) {
    return response()->json([
        'keyword' => $request->query('keyword'),
        'level' => $request->input('level', 'Beginner'),
        'hasKeyword' => $request->has('keyword')
    ]);
});


//detyra 4

Route::get('/courses/featured', function () {
    return response()
        ->json(['message' => 'Featured courses'], 200)
        ->header('X-Course-Source', 'Laravel')
        ->cookie('last_visited', 'featured');
});


// detyra 5

Route::redirect('/catalog', '/courses');

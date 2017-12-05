<?php

use Illuminate\Http\Request;
use App\Church;
use App\User;
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



/*

Route::get('/churchs', function()
{

   return Church::all();
}) ;



Route::get('/churchs/{id}',function($id)
{
    return Church::find($id);
});

Route::post('/churchs',function(Request $request)
{
  //return Church::create($request->all);

    $church=Church::create($request->all());
    return response()->json($church, 201);
});

Route::post('churchs/{id}/update',function(Request $request,$id)
{
    $church = Church::findOrFail($id);
    $church->update($request->all());

    return Church::find($id);
});

Route::post('churchs/{id}/delete',function($id)
{
    Church::find($id)->delete();

        return ('Deleted!!!');
});
*/

Route::get('churchs', 'ChurchsController@index') ->middleware('jwt.auth');
Route::get('churchs/{id}', 'ChurchsController@show') ->middleware('jwt.auth');
Route::post('churchs', 'ChurchsController@store') ->middleware('jwt.auth');
Route::post('churchs/{id}/update', 'ChurchsController@update') ->middleware('jwt.auth');
Route::post('churchs/{id}/delete', 'ChurchsController@delete')->middleware('jwt.auth');


Route::get('users', 'UsersController@index') ->middleware('jwt.auth');
Route::get('users/{id}', 'UsersController@show') ->middleware('jwt.auth');
Route::post('users', 'UsersController@store') ->middleware('jwt.auth');
Route::post('users/{id}/update', 'UsersController@update') ->middleware('jwt.auth');
Route::post('users/{id}/delete', 'UsersController@delete') ->middleware('jwt.auth');


Route::post('/login', ['uses' => 'ApiAuthController@login']);
Route::post('/register', ['uses' => 'ApiAuthController@register']);

/*Route::get('users', ['middleware' => 'cors', function()
{
    return \Response::json(\App\Brewery::with('beers', 'geocode')->paginate(10), 200);
}]);*/

/*
Route::post('register', 'Auth\RegisterController@register');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
/*
Route::get('/users', function()
{

    return User::all();
}) ->middleware('jwt.auth');

*/
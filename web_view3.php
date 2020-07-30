Route::get('/', function() {
    return view('welcome');

});

Route::get('/about', function() {
    return view('about');

});

// for show data of table
Route::get('/about', function() {
    
    return view('about', [
        'artefact' => App\Artefact::take(3)->latest()->get()
    ]);

});

//final route code for view
Route::get('/about', function() {
    
    return view('about', [
        'artefacts' => App\Artefact::take(3)->latest()->get()
    ]);

});
Route::get('/artefacts', 'ArtefactsController@index');
Route::get('/artefacts/{artefact}', 'ArtefactsController@show');
<?php

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProfileController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */


    Route::get('profile/{id}', 'App\Http\Controllers\ProfileController@show');

    Route::get('/', function (Request $request) {
        $results = DB::select('select * from characters');
        return view('characterlist', [ 'results' => $results ]);
    });

    Route::get('/locations', function (Request $request) {
        $results = DB::select('select * from characters');
        return view('locations', [ 'results' => $results ]);
    });

    Route::get('/populatedb', function (Request $request) {
        for ($x = 1; $x < 827; $x++) {
            $response = Http::get("https://rickandmortyapi.com/api/character/$x");
            $response = $response->json();
            $id = $response['id'];
            $name = $response['name'];
            $status = $response['status'];
            $species = $response['species'];
            $type = $response['type'];
            $gender = $response['gender'];
            $origin = $response['origin']['name'] . "," . $response['origin']['url'];
            $location_name = $response['location']['name'];
            $location_url = $response['location']['url'];
            $image = $response['image'];
            $episode = '';
            for ($a = 0; $a < count($response['episode']); $a++) {
                $episode .= $response['episode'][$a] . ",";
            }
            $created = $response['created'];
            DB::insert('insert into characters (id, name, status, species, type, gender, origin, location_name, location_url, image, episodes, created) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$id, $name, $status, $species, $type, $gender, $origin, $location_name, $location_url, $image, $episode, $created]);
        }

        return view('populatedb', []);
    });

    Route::get('/populatelocations', function (Request $request) {
        for ($x = 1; $x < 127; $x++) {
            $response = Http::get("https://rickandmortyapi.com/api/location/$x");
            $response = $response->json();
            $id = $response['id'];
            $name = $response['name'];
            $type = $response['type'];
            $dimension = $response['dimension'];
            $residents = $response['residents'];
            $residents2 = '';
            for ($a = 0; $a < count($residents); $a++) {
                $residents2 .= $residents[$a] . ",";
            }
            $created = $response['created'];
            DB::insert('insert into locations (id, name, type, dimension, residents) values (?, ?, ?, ?, ?)', [$id, $name, $type, $dimension, $residents2]);
        }

        return view('populatedb', []);
    });



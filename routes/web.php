<?php

    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\Facades\Route;

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

    Route::post("city/{city}", function ($city) {
        $city = $_POST['search_city'];
        $location = $city;
        $apiKey = 'c815e7e6f6adf63781437395939c7e9d';

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric");
        $responsejson = $response->json();
        if ($responsejson['cod'] != 200) {
            abort(404);
        }

        return view('welcome', [
            'currentWeather' => $response->json(),
            'location' => $city,
        ]);
    });

    Route::post("latlong/", function () {
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $apiKey = 'c815e7e6f6adf63781437395939c7e9d';

        $response = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat={$latitude}&lon={$longitude}&exclude=minutely,hourly&appid={$apiKey}&units=metric");

        return view('latlong', [
            'currentWeather' => $response->json(),
            'location' => 'Unknown',
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    });

    Route::get('/', function (Request $request) {
        $results = DB::select('select * from characters');

//        dd($results);

        return view('characterlist', [ 'results' => $results ]);

    });

    Route::get('/locations', function (Request $request) {
        $results = DB::select('select * from characters');

//        dd($results);

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



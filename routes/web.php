<?php

use App\Models\Entreprise;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NonapiController;



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

Route::get('/', function () {  
    return view('welcome');
});
Route::get('/json', [NonapiController::class, 'index']);
Route::get('/log1', function () {  
    /*$test = Entreprise::all('id','nom')->ToJson();
    $test = Entreprise::all()->pluck('id', 'nom');*/

   // dd($test->get('Leblanc'));
   /*$tests = Entreprise::with(['contact' => function(Builder $query) {
                $query->where('nom', 'Jacob');
            }]
   )->get()->ToArray();*/

   //$tests = Entreprise::with(['contact' => function ($q) {
   //     $q->where('nom','=','tes');
   // }])->get()->ToArray();


//    $tests = Entreprise::with('contact')->whereHas('contact',  function($q)  {
//         $q->where('nom', 'Ribeiro');//query on team model
//    })   
//    ->get()->groupBy('nom');

//    //$tests = Entreprise::all(); 

//    dump($tests);

  

  
    //$test = Entreprise::all()->ToJson();
    // $test_array =  json_decode($test, true);
    //dd($test_array[0]['id']);
    /*Log::alert('zakaria');
    Log::info('hamza');*/

    //mode() most repeat
    //sortByDesc
    //nth()
    //first(fn($person) => $person['id']>1)
    //firstWhere()
    //whereBetween('age' , ['12', '21'])
    //whereIn('name', ['zak',..]) || whereNotIn('name', ['zak',..])
    //keyBy('name') === 'zaka' => array(data)  || keyBy('name')['zakaria']
    //zip()
   // example
  /* collect([
       'class A',
       'class B',
       'class C',
   ])->zip([
       '12',
       '17',
       'test',
   ]);
   => 0 =>[
       0 => 'class A',
       1 => '12'
   ]*/
   

   /*
    $collection = collect(['name' => 'taylor', 'framework' => 'laravel']);

    $collection->forget('name');

    $collection->all();

    // ['framework' => 'laravel']

    $collection = collect(['name' => 'Desk', 'price' => 100]);

    $collection->contains('Desk');

    // true

    $collection->contains('New York');

    // false

    collect(['a', 'b', 'c'])->join(', '); // 'a, b, c'
    collect(['a', 'b', 'c'])->join(', ', ', and '); // 'a, b, and c'
    collect(['a', 'b'])->join(', ', ' and '); // 'a and b'
    collect(['a'])->join(', ', ' and '); // 'a'
    collect([])->join(', ', ' and '); // ''
   */

   /*
     take(2) two  items
   */
  /*
  put(0, [
      'name' => 'replace '
  ])
  */

//   $collection = collect(
//     //[2, 4, 6, 8]
//       [2 => 'test' , 4 => 'wini', 6 => 'alpha', 8 => 'narimal']
//   );

//     return  $collection->contains('wini');

$result = collect([
    'class A',
    'class B',
    'class C',
])->zip([
    '12',
    '17',
    'test',
]);
   dd($result->toArray());

});

<?php

use App\Http\Middleware\LogAcessoMiddleware;
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

Route::get('/', 'MainController@index')->name('site.index');
Route::get('/aboutus', 'AboutUsController@aboutUs')->name('site.aboutus');
Route::get('/contact', 'ContactController@contact')->name('site.contact');
Route::post('/contact', 'ContactController@salvar')->name('site.contact');
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/exit', 'LoginController@exit')->name('app.exit');
    Route::get('/customer', 'CustomerController@index')->name('app.customer');
    Route::get('/supplier', 'SupplierController@index')->name('app.supplier');
    // Route::post('/supplier/list', 'SupplierController@list')->name('app.supplier.list');
    Route::get('/supplier/list', 'SupplierController@list')->name('app.supplier.list');
    Route::get('/supplier/add', 'SupplierController@add')->name('app.supplier.add');
    Route::post('/supplier/add', 'SupplierController@add')->name('app.supplier.add');
    Route::get('/supplier/edit/{id}', 'SupplierController@edit')->name('app.supplier.edit');
    Route::get('/supplier/remove/{id}', 'SupplierController@remove')->name('app.supplier.remove');

    Route::resource('product', 'ProductController');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

// Route::get('/rota1', function () {
//     echo 'rota1';
// })->name('site.rota1');

// Route::redirect('/rota2','rota1');
// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// })->name('site.rota2');

Route::fallback(function () {
    echo 'A rota não existe. <a href="' . route('site.index') . '">Ir para a pagina inicial</a>';
});


// Rotas opcionais e com expressão regular
// Route::get(
//     '/contact/{nome}/{categoria_id?}',
//     function (string $nome, int $categoria_id = 1) {
//         echo "Estamos aqui: $nome - $categoria_id";
//     }
// )
// ->where('categoria_id', '[0-9]+')
// ->where('nome', '[A-Za-z]+');

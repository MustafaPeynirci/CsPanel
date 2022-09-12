<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/auth-user', function (Request $request) {
        return $request->user()->load('role');
    });

});
Route::apiResource('category','App\Http\Controllers\CategoryController');

//2
//1cDfYZfMmZ69JF5iWHlkJsTt158qDmcjDHtfeeny
// eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiNTNjNDM5MjI2N2M0MTAxMDQ5ZjYwZTUyMWVmZmUxMGNlNDhkOGQzYzYyNGFmNjY3NTkxMmNlOTE2ZGI2ZDhiZTVjZjRiYWYxOGU3MWI5NDAiLCJpYXQiOjE2NjIyMTAwMTkuNDIzMjUxLCJuYmYiOjE2NjIyMTAwMTkuNDIzMjUyLCJleHAiOjE2OTM3NDYwMTkuNDE1NjU4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.hCVNixllTf8g9-ygdgR2OGp0xNQRqZYdGicABnVc6Ghnek3hg6atOJ047dYfOjRKEri9Uav0pQBjPmlsKNxt4uHNNSPoUXQ2DyastRKMqTzNf-92UdZDdB7Ev6Nkpjy04MXqibBHvLPW6DE4QR6kMOHQQAmKBofky4DHNZKhu85zznj_5zX_O-Qj7CxlS4hTc_psYlSlZ9jc-1K22n48gzHStcUpFxFO31GWqpC50hUBUzt9r2xUA6zzRe8t8e6HZT7o6lcsi2NKHI4Pi1384RVrPlUFOjO5YvR1dkeBc_Z6oUr3AenpioUBz6qxGV5GxAPxF3nAtXaTymS7ZDnkvotOY3eQwMKWzFFxcRt_sN-nvrCU9uMHW_jc13rDWH4S-o_rsSVyp_jIUu6632JRAwzLInfhHGl7XVCh2HYMmkIK0yGJCYrS2daXm2YictlbZn6HJHh0q35i0CThSsDR5QF7FWUZQfLP3HeLPW1N-3xUdLGl7FTl28vUu5vdtsaBqf7JUjUz4-0f_z_HEdVhWw_36AwQiq76q_iCzCd6Q_8ncCA6qoluh1UZ54klI_3Y_LMX_iAx3umsk6aq85XpUBZM9UAYXTap7c66XlZvxVRDcPta0skv1RTSehVQ8tD_9Z1Ck71Pw15yOMph-hUXHFGGt09xHa0HLhPqgHHa9dw

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

    /**
     * @OA\Info(
     *     title="My First API",
     *     version="0.1"
     * )
     * @OA\SecurityScheme(
     *      securityScheme="Authorization",
     *      in="header",
     *      name="Authorization",
     *      type="http",
     *      scheme="bearer",
     *      bearerFormat="JWT",
     * ),
     */
    
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
   
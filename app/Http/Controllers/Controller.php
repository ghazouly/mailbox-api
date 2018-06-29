<?php

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Mailbox API",
 *     version="1.0.0"
 *   ),
 *   @SWG\SecurityScheme(
 *          securityDefinition="default",
 *          type="apiKey",
 *          in="header",
 *          name="Authorization"
 *   )
 * )
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

<?php
require(__DIR__."/../vendor/autoload.php");
$openapi = \OpenApi\scan(__DIR__."/../app/SwaggerRequest.php");
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();

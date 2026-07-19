<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();

// Auto-create storage directory structure for shared hosting
$storagePaths = [
    $app->storagePath().'/framework/sessions',
    $app->storagePath().'/framework/views',
    $app->storagePath().'/framework/cache/data',
    $app->storagePath().'/logs',
];
foreach ($storagePaths as $path) {
    if (!is_dir($path)) {
        @mkdir($path, 0755, true);
    }
}

// Auto-create SQLite database file if missing
$sqlitePath = $app->databasePath().'/database.sqlite';
if (!file_exists($sqlitePath)) {
    @touch($sqlitePath);
}

return $app;

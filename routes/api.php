<?php

declare(strict_types=1);

use App\Http\Controllers\Api\WebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/webhook', WebhookController::class)->name('api.webhook');

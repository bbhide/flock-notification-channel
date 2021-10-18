<?php

namespace Illuminate\Notifications;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class FlockChannelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('flock', function ($app) {
                return new Channels\FlockWebhookChannel($app->make(HttpClient::class));
            });
        });
    }
}

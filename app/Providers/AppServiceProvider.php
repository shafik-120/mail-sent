<?php

namespace App\Providers;

use App\Models\Mailsetting;
use Illuminate\Support\ServiceProvider;
use Config;
use PSpell\Config as PSpellConfig;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $mailSetting = Mailsetting::all();
        if ($mailSetting) {
            foreach ($mailSetting as $key => $value) {
                $data = [
                    'driver' => $value->mail_transport,
                    'host' => $value->mail_host,
                    'port' => $value->mail_port,
                    'encryption' => $value->mail_encryption,
                    'username' => $value->mail_username,
                    'password' => $value->mail_password,
                    'from' => [
                        'address' => $value->mail_from,
                        'name' => $value->mail_sender_name,
                    ],
                ];
                Config::set('mail', $data);
            }
        };
    }
}

// foreach ($mailSetting as $key => $value) {
//     // echo $value->mail_username . "<br>";
//     $data = [
//         'driver' => $value->mail_transport,
//         'host' => $value->mail_host,
//         'port' => $value->mail_port,
//         'encryption' => $value->mail_encryption,
//         'username' => $value->mail_username,
//         'password' => $value->mail_password,
//         'from' => [
//             'address' => $value->mail_from,
//             'name' => $value->mail_sender_name,
//         ],
//     ];
//     Config::set('mail', $data);
// }
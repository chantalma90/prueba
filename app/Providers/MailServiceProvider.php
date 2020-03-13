<?php

namespace App\Providers;

use App;
use App\Providers\MailerProvider;
use App\Providers\SmtpProvider;
use App\Providers\SesProvider;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        * Ahora mismo el método del controlador y el comando usan el SmtpProvider porque aquí he programado que cuando se inyecte 
        * la interfaz creada, se instancie a él. Me faltaría crear un condicional que permitiera bind el SmtpProvider o el Sesprovider
        * según si se llama desde el controlador o desde el comando.
        */
        App::bind( MailerProvider::class, SmtpProvider::class );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
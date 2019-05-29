<?php

namespace App\Providers;

use App\Company;
use App\Employee;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {

            $event->menu->add([
                'text'        => 'Companies',
                'url'         => route('company.index'),
                'icon'        => 'file',
                'label'       => Company::get()->count(),
                'label_color' => 'success',
            ],
                [
                    'text'        => 'Employees',
                    'url'         => route('employee.index'),
                    'icon'        => 'file',
                    'label'       => Employee::get()->count(),
                    'label_color' => 'success',
                ]);
            });
    }
}

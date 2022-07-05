<?php

namespace App\Providers;

use App\Http\Controllers\PedidosController;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('pedido.create',[\App\Policies\PedidoPolicy::class,'create']);
        Gate::define('pedido.manage',[\App\Policies\PedidoPolicy::class,'manage']);
        Gate::define('category.create',[\App\Policies\PedidoPolicy::class,'create']);

        //
    }
}

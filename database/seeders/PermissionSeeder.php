<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                "name"=>"pedido.create",
                "description"=> "El usuario puede crear pedidos",
                "model"=>"User"
            ],
            [
                "name"=>"category.create",
                "description"=> "El usuario puede crear categorías",
                "model"=>"User"
            ],
            [
                "name"=>"pedido.manage",
                "description"=> "El usuario puede gestionar pedidos",
                "model"=>"User"
            ]
        ]);
    }
}

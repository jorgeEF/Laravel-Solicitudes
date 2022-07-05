<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pedido;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pedido::insert([
            [
                "title"=>"Notebook",
                "description"=>"Notebook INTEL i5 15\"",
                "quantity"=>"1",
                "category_id"=>"1",
                "created_by"=>"seeder"
            ],
            [
                "title"=>"Sillas",
                "description"=>"Silla oficina reclinable",
                "quantity"=>"2",
                "category_id"=>"3",
                "created_by"=>"seeder"
            ],
            [
                "title"=>"Cinta Scotch",
                "description"=>"Cinta scotch de 20m",
                "quantity"=>"5",
                "category_id"=>"2",
                "created_by"=>"seeder"
            ]
        ]);

    }
}

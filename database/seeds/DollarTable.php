<?php

use Illuminate\Database\Seeder;

class DollarTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dolars')->insert([

            'name'=> 'dollarBuy',
            'price'=> 17000
            ]);
            
            DB::table('dolars')->insert([
            
            'name'=> 'dollarSell',
            'price'=> 15000
            ]);
            
            DB::table('shipping_methods')->insert([
            
            'name'=> 'MRW',
            'price'=> 34000
            ]);
            
    }
}

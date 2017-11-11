<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //Заполнение таблицы Employees без использования фабрик
        DB::table('positions')->insert(
            array(                
                    [
                    	'position_name' => 'CEO',
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ],
                    [
                    	'position_name' => 'Director',
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ],
                    [	
                    	'position_name' => 'Vice president',
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ],
                    [
                    	'position_name' => 'Chief',
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ],
                    [
                    	'position_name' => 'Deputy chief',
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ],
                    [
                    	'position_name' => 'Head of the sector',
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ],
                    [
	                    'position_name' => 'Worker', 
	                    'created_at' => date('Y-m-d H:i:s'),
	                    'updated_at' => date('Y-m-d H:i:s')
                    ]

                )
            );

    }
}

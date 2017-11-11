<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Запускаем фабрики на заполнение БД сотрудниками всех должностей

        factory(App\Employee::class, 1)->states('CEO')->create();

        factory(App\Employee::class, pow(6,1))->states('director')->create();

        factory(App\Employee::class, pow(6,2))->states('vice_president')->create();

        factory(App\Employee::class, pow(6,3))->states('chief')->create();

        factory(App\Employee::class, pow(6,4))->states('deputy_chief')->create();

        factory(App\Employee::class, pow(6,5))->states('head_of_the_sector')->create();

        factory(App\Employee::class, pow(6,6))->states('worker')->create();


        /**
        //Заполнение таблицы Employees без использования фабрик
        DB::table('employees')->insert(
            array(
                
                [
                    'first_name' => "Александр",
                    'last_name' => "Дерачиц",
                    'patronomic' => "Игоревич",
                    'position_id' => 1,
                    'employmend_date' => date('Y-m-d'),
                    'salary' => 30000,
                    'created_at' => date('Y-m-d H:i:s')
                ]
                )
            );
 
        $x=0;
        while ($x<pow(6,6))
        {
            DB::table('employees')->insert(
                array(
                    [
                        'first_name' => str_random(5),
                        'last_name' => str_random(7),
                        'patronomic' => str_random(10),
                        'position_id' => 6,
                        'employmend_date' => date('Y-m-d'),
                        'salary' => random_int(5000, 10000),
                        'created_at' => date('Y-m-d H:i:s')
                    ]
                    )
                );
            $x++;
        }*/
    }
}

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
        //Запускаем фабрики на заполнение БД сотрудниками всех должностей заданного кол-ва

        factory(App\Employee::class, 1)->states('CEO')->create();

        factory(App\Employee::class, pow(6,1))->states('director')->create();

        factory(App\Employee::class, pow(6,2))->states('vice_president')->create();

        factory(App\Employee::class, pow(6,3))->states('chief')->create();

        factory(App\Employee::class, pow(6,4))->states('deputy_chief')->create();

        factory(App\Employee::class, pow(6,5))->states('head_of_the_sector')->create();

        factory(App\Employee::class, pow(6,6))->states('worker')->create();

    }
}

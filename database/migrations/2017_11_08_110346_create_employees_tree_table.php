<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_tree', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id_lvl_1')->index();
            $table->integer('emp_id_lvl_2')->index();
            $table->integer('emp_id_lvl_3')->index();
            $table->integer('emp_id_lvl_4')->index();
            $table->integer('emp_id_lvl_5')->index();
            $table->integer('emp_id_lvl_6')->index();
            $table->integer('emp_id_lvl_7')->index();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_tree');
    }
}

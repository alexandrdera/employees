<?php

use Illuminate\Database\Seeder;

class EmployeesTreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		//Заполнение таблицы EmployeesTree без использования фабрик

		$tree[][] = array();
		$count = 1;

		$header = array(
		    'emp_id_lvl_1' => null,
		    'emp_id_lvl_2' => null,
		    'emp_id_lvl_3' => null,
		    'emp_id_lvl_4' => null,
		    'emp_id_lvl_5' => null,
		    'emp_id_lvl_6' => null,
		    'emp_id_lvl_7' => null
		);

		foreach ($header as $key => $value) { 
			for ($j=1; $j <= pow(6,6); $j++) { 

				if ($key=='emp_id_lvl_1') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,6)==0) {$count++;}
				}
				elseif ($key=='emp_id_lvl_2') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,5)==0) {$count++;}
				}
				elseif ($key=='emp_id_lvl_3') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,4)==0) {$count++;}
				}
				elseif ($key=='emp_id_lvl_4') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,3)==0) {$count++;}
				}
				elseif ($key=='emp_id_lvl_5') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,2)==0) {$count++;}
				}
				elseif ($key=='emp_id_lvl_6') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,1)==0) {$count++;}
				}
				elseif ($key=='emp_id_lvl_7') {
					$tree[$j][$key] = $count;
					if ($j%pow(6,0)==0) {$count++;}
				}
						
			}
		}

		foreach ($tree as $key => $value) {
			if ($key <> null) DB::table('employees_tree')->insert($value);
		}

	}
}
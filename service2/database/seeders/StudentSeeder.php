<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelstudents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'name'=> "Nguyen Duc Doanh",
            'masv' => 'B18DCCN092',
            'email' => 'doanhnd@gmail.com',
            'phone' => '0221313',
            'birthday' => '2000-02-25',
            'class' => "D18CQCN04",
            'branch' => "CNTT",
            'country' => "Thai binh"
        ]);
        $student2 = Student::create([
            'name'=> "Nguyen Trong khang",
            'masv' => 'B18DCCN093',
            'email' => 'khang@gmail.com',
            'phone' => '0221313',
            'birthday' => '2000-02-26',
            'class' => "D18CQCN04",
            'branch' => "CNTT",
            'country' => "Nam Dinh"
        ]);
        $student3 = Student::create([
            'name'=> "Truong The Tu",
            'masv' => 'B18DCCN094',
            'email' => 'tu@gmail.com',
            'phone' => '0221313',
            'birthday' => '2000-02-27',
            'class' => "D18CQCN04",
            'branch' => "CNTT",
            'country' => "Thanh Hoa"
        ]);
        $student4 = Student::create([
            'name'=> "Phung Dinh Son",
            'masv' => 'B18DCCN095',
            'email' => 'son@gmail.com',
            'phone' => '2312342',
            'birthday' => '2000-02-28',
            'class' => "D18CQCN04",
            'branch' => "CNTT",
            'country' => "Ha Noi"
        ]);
    }
}

<?php

use Illumintae\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_terms = [
        	['name' => 'Thế Giới','slug' => 'The-Gioi'],
        	['name' => 'Kinh Doanh','slug' => 'Kinh-Doanh'],
        	['name' => 'Văn Hoá','slug' => 'Van-Hoa'],
        	['name' => 'Thể Thao','slug' => 'The-Thao'],
        	['name' => 'Pháp Luật','slug' => 'Phap-Luat'],
        	['name' => 'Đời Sống','slug' => 'Doi-Song'],
        	['name' => 'Khoa Học','slug' => 'Khoa-Hoc'],
        	['name' => 'Vi Tính','slug' => 'Vi-Tinh']
        ];

        DB::table('terms')->insert($array_terms);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_categories = [
            ['term_id'=>'1', 'name' => 'Giáo Dục', 'slug' => 'Giao-Duc'],
        	['term_id'=>'1', 'name' => 'Nhịp Điệu Trẻ', 'slug' => 'Nhip-Dieu-Tre'],
        	['term_id'=>'1', 'name' => 'Du Lịch', 'slug' => 'Du-Lich'],
        	['term_id'=>'1', 'name' => 'Du Học', 'slug' => 'Du-Hoc'],
        	['term_id'=>'2', 'name' => 'Cuộc Sống Đó Đây', 'slug' => 'Cuoc-Song-Do-Day'],
        	['term_id'=>'2', 'name' => 'Ảnh', 'slug' => 'Anh'],
        	['term_id'=>'2', 'name' => 'Người Việt 5 Châu', 'slug' => 'Nguoi-Viet-5-Chau'],
        	['term_id'=>'2', 'name' => 'Phân Tích', 'slug' => 'Phan-Tich'],
        	['term_id'=>'3', 'name' => 'Chứng Khoán', 'slug' => 'Chung-Khoan'],
        	['term_id'=>'3', 'name' => 'Bất Động Sản', 'slug' => 'Bat-Dong-San'],
        	['term_id'=>'3', 'name' => 'Doanh Nhân', 'slug' => 'Doanh-Nhan'],
        	['term_id'=>'3', 'name' => 'Quốc Tế', 'slug' => 'Quoc-Te'],
        	['term_id'=>'3', 'name' => 'Mua Sắm', 'slug' => 'Mua-Sam'],
        	['term_id'=>'3', 'name' => 'Doanh Nghiệp Viết', 'slug' => 'Doanh-Nghiep-Viet'],
        	['term_id'=>'4', 'name' => 'Hoa Hậu', 'slug' => 'Hoa-Hau'],
        	['term_id'=>'4', 'name' => 'Nghệ Sỹ', 'slug' => 'Nghe-Sy'],
        	['term_id'=>'4', 'name' => 'Âm Nhạc', 'slug' => 'Am-Nhac'],
        	['term_id'=>'4', 'name' => 'Thời Trang', 'slug' => 'Thoi-Trang'],
        	['term_id'=>'4', 'name' => 'Điện Ảnh', 'slug' => 'Dien-Anh'],
        	['term_id'=>'4', 'name' => 'Mỹ Thuật', 'slug' => 'My-Thuat'],
        	['term_id'=>'5', 'name' => 'Bóng Đá', 'slug' => 'Bong-Da'],
        	['term_id'=>'5', 'name' => 'Tennis', 'slug' => 'Tennis'],
        	['term_id'=>'5', 'name' => 'Chân Dung', 'slug' => 'Chan-Dung'],
            ['term_id'=>'6', 'name' => 'Hình Sự', 'slug' => 'Hinh-Su'],
            ['term_id'=>'6', 'name' => 'Chuyên Mục Khác', 'slug' => 'Chuyen-Muc-Khac']
        ];

        DB::table('categories')->insert($array_categories);
    }
}

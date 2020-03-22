<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_comments = [
            'Bài viết rất hay',
    		'Tôi rất thích bài viết này',
    		'Bài viết này tạm ổn',
    		'Hay quá trời',
    		'Tôi sẽ học thèo bài viết này',
    		'Bài viết này chưa được hay lắm',
    		'Ý kiến của tôi khác so với bài này',
    		'Bài viết này được',
    		'Không thích bài viết này',
    		'Tôi chưa có ý kiến gì'
        ];

        for( $i = 1; $i <= 100; $i++ ) {
            DB::table('comments')->insert([
                'user_id' => rand(1, 10),
                'post_id' => rand(1, 100),
                'content' => $array_comments[rand(0, 9)]
            ]);
        }
    }
}

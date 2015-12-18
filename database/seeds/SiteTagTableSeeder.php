<?php

use Illuminate\Database\Seeder;

class SiteTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_tag')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'site_id' => 2,
        'tag_id' => 3,
        ]);

        DB::table('site_tag')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'site_id' => 1,
        'tag_id' => 2,
        ]);

        DB::table('site_tag')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'site_id' => 1,
        'tag_id' => 5,
        ]);

        DB::table('site_tag')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'site_id' => 3,
        'tag_id' => 1,
        ]);

    }
}

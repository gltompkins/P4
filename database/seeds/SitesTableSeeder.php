<?php

use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'sitename' => 'Cloud Design Patterns: Prescriptive Architecture Guidance for Cloud Applications',
        'siteurl' => 'https://msdn.microsoft.com/en-us/library/dn568099.aspx',
        'sitedesc' => 'Containing twenty-four design patterns and ten related guidance topics, this guide articulates the benefit of applying patterns',
        'siterating' => 4,
        ]);

        DB::table('sites')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'sitename' => 'IBM Reference Architecture for API Management',
        'siteurl' => 'https://developer.ibm.com/apimanagement/docs/api-101/ibm-reference-architecture-api-management/',
        'sitedesc' => 'The following figure depicts the IBM reference architecture for API Management.',
        'siterating' => 5,
        ]);

        DB::table('sites')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'sitename' => 'The Open Group Architecture Forum',
        'siteurl' => 'https://www.opengroup.org/togaf/',
        'sitedesc' => "TOGAF®, an Open Group Standard, is a proven enterprise architecture methodology and framework used by the world's leading organizations to improve business efficiency.",
        'siterating' => 5,
        ]);

    }
}

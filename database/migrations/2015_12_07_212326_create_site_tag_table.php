<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tag', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

    # `site_id` and `tag_id` will be foreign keys, so they have to be unsigned
    #  Note how the field names here correspond to the tables they will connect...
    # `site_id` will reference the `sites table` and `tag_id` will reference the `tags` table.
    $table->integer('site_id')->unsigned();
    $table->integer('tag_id')->unsigned();

    # Make foreign keys
    $table->foreign('site_id')->references('id')->on('sites');
    $table->foreign('tag_id')->references('id')->on('tags');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_tag');
    }
}

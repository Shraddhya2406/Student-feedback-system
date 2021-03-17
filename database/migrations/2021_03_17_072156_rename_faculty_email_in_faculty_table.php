<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFacultyEmailInFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faculty', function (Blueprint $table) {
            $table->renameColumn('faculty_email', 'email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faculty', function (Blueprint $table) {
            $table->renameColumn('email', 'faculty_email');
        });
    }
}

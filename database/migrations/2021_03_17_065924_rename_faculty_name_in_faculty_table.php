<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFacultyNameInFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faculty', function (Blueprint $table) {
            $table->renameColumn('faculty_name', 'name');

           
            
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
            $table->renameColumn('name', 'faculty_name');

        
        });
    }
}

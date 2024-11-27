<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('publication_status')->insert([
            ['status_name' => 'published'],
            ['status_name' => 'unpublished'],
            ['status_name' => 'archive'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('publication_status')
        ->whereIn('status_name', ['published', 'unpublished', 'archive'])
        ->delete();
    }
};

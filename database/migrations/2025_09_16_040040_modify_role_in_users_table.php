<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // ubah kolom role jadi enum
        $table->enum('role', ['root', 'admin', 'user'])
              ->default('user')
              ->change();
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // rollback ke string default 'users'
        $table->string('role')->default('users')->change();
    });
}
};

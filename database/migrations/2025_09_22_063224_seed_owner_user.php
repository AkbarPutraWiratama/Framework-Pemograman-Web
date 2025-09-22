<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    public function up(): void
    {
        DB::table('users')->insert([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'password' => Hash::make('123'), // default password
            'role' => 'owner',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        DB::table('users')->where('email', 'owner@example.com')->delete();
    }
};

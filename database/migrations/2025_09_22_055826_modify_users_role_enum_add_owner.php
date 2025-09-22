<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        // tambahkan 'owner' ke enum (MySQL)
        DB::statement("ALTER TABLE `users` MODIFY `role` ENUM('user','admin','owner') NOT NULL DEFAULT 'user'");
    }

    public function down()
    {
        // rollback: kembalikan ke keadaan semula
        DB::statement("ALTER TABLE `users` MODIFY `role` ENUM('user','admin') NOT NULL DEFAULT 'user'");
    }
};

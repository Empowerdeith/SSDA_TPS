<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $command = "
        CREATE OR REPLACE PROCEDURE SP_COUNT_SORTEOS_ALL_USERS (CURSOR_CONTADOR_USR OUT SYS_REFCURSOR)
        AS
        BEGIN
            OPEN CURSOR_CONTADOR_USR FOR
            SELECT NAME, USERNAME, CARGO, COUNT(U.ID) AS CANTIDAD FROM USERS U
            JOIN LISTA L ON U.ID=L.USER_ID
            GROUP BY NAME, USERNAME, CARGO;
        END;";

        DB::connection()->getPdo()->exec($command);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $command = "DROP PROCEDURE SP_COUNT_SORTEOS_ALL_USERS";
        DB::connection()->getPdo()->exec($command);
    }
};

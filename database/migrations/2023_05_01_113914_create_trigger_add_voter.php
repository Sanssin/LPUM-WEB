<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER tr_Add_Voter
            AFTER UPDATE ON `users`
            FOR EACH ROW

            BEGIN
                IF new.vote_status <> old.vote_status THEN
                    IF NEW.vote_status = 1 THEN
                        UPDATE vote_stats 
                        SET 
                        total_voter = total_voter + 1 ,
                        golput = golput+1
                        WHERE election_id = NEW.election_id;
                    ELSEIF NEW.vote_status = 0 THEN
                        UPDATE vote_stats 
                        SET 
                        total_voter = total_voter - 1,
                        golput = golput-1
                        WHERE election_id = NEW.election_id;
                    ELSEIF NEW.vote_status = 2 THEN
                        UPDATE vote_stats
                        SET 
                        voted = voted + 1,
                        golput = golput - 1
                        WHERE election_id = NEW.election_id;
                    END IF;
                END IF;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS tr_Add_Voter');
    }
};

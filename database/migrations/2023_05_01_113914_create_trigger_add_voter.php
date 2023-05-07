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
                IF NEW.vote_status <> OLD.vote_status THEN
                    IF NEW.vote_status = 1 THEN
                        UPDATE vote_stats 
                        SET 
                        total_voter = total_voter + 1 ,
                        golput = golput+1
                        WHERE election_id = NEW.election_id;
                    ELSEIF NEW.vote_status = 0 AND OLD.vote_status = 1 THEN
                            UPDATE vote_stats 
                            SET 
                            total_voter = total_voter - 1,
                            golput = golput-1
                            WHERE election_id = OLD.election_id;
                    ELSEIF NEW.vote_status = 2 THEN
                        UPDATE vote_stats
                        SET 
                        voted = voted + 1,
                        golput = golput - 1
                        WHERE election_id = NEW.election_id;
                    END IF;
                ELSEIF NEW.vote_status = OLD.vote_status AND NEW.election_id <> OLD.election_id THEN
                    UPDATE vote_stats
                    SET 
                        golput = golput - 1,
                        total_voter = total_voter - 1
                    WHERE election_id = OLD.election_id;
                
                    UPDATE vote_stats
                    SET 
                        golput = golput + 1,
                        total_voter = total_voter + 1
                    WHERE election_id = NEW.election_id;
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

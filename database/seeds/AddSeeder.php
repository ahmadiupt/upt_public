<?php

use Illuminate\Database\Seeder;

class AddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new \App\User;
        $user1->username = "Rena";
        $user1->name = "Rena Susanti";
        $user1->email = "rena@gmail.com";
        $user1->password = \Hash::make("rena");
        $user1->level ="user";
        $user1->save();

        $user2 = new \App\User;
        $user2->username = "nuryatin";
        $user2->name = "Nuryatin";
        $user2->email = "nuryatin@gmail.com";
        $user2->password = \Hash::make("nuryatin");
        $user2->level ="teknisi";
        $user2->save();

        $user3 = new \App\User;
        $user3->username = "jauhari";
        $user3->name = "Muhammad Jauhari";
        $user3->email = "jauhari@mail.com";
        $user3->password = \Hash::make("jauhari");
        $user3->level = "admin";
        $user3->save();
        $this->command->info("User dibuat");
    }
}

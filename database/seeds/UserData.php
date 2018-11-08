<?php

use App\User;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $add = new User;
        $add->name  = 'admin';
        $add->level  = 'admin';
        $add->password = bcrypt(123456);
        $add->email  = 'admin@admin.com';
        $add->office_id = 1;
        $add->level_id = 1;
        $add->city_id = 1;
        $add->country_id = 1;
        $add->save();
    }

}

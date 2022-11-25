<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Person;
use App\User;
use App\Affiliation;
use App\UserRole;
use App\Shop;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = Person::create([
            'lastname' => 'Padz',
            'firstname' => 'Ben',
            'birthdate' => Carbon::now()->toDateString(),
            'address' => 'Test Address',
            'citymun_id' => 1,
            'zipcode' => '1234'
        ]);

        $user = User::create([
            'person_id' => $person->id,
            'username' => 'binarybee_admin',
            'email' => 'binarybee.solutions@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $role = UserRole::create([
            'role' => 'Super Admin',
            'description' => 'This is a superadmin role'
        ]);

        $affiliation = Affiliation::create([
            'user_id' => $user->id,
            'shop_id' => factory(Shop::class)->create()->id,
            'role_id' => $role->id
        ]);
    }
}

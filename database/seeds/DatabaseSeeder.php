<?php

use App\Models\Address;
use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class
        ]);
        factory(Contact::class, 50)
            ->create()->each(function ($contact) {
                $contact->addresses()->save(factory(Address::class)->make());
                $contact->phoneNumbers()->save(factory(PhoneNumber::class)->make());
            });
    }
}

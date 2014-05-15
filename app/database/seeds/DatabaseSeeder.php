<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Eloquent::unguard();

        // Ayalar tablosu kayıtıları
        $this->call('createSettingsData');
        $this->call('createUserData');

	}

}


/*
 * Ayarlar tablosuna ilk kayıtların eklenmesi
 */
class createSettingsData extends Seeder {

    public function run()
    {
        DB::table('settings')->delete();
        DB::insert('insert into settings (module, content) values ("components", "[\"Veritabanı\",\"Arayüz\"]")');
        $this->command->info('Ayarlar tablosuna veri eklendi!');

    }

}

/*
 * Kullanıcılar tablosuna ilk kayıtların eklenmesi
 */
class createUserData extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::insert('insert into users (username, password, email, name,role) values ("admin", "1234", "admin@admin.com", "Admin", "1")');
        $this->command->info('Kullanıcılar tablosuna veri eklendi!');

    }

}
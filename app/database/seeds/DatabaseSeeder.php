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
        $this->call('createComponents');
        $this->call('createProjects');
        $this->call('createUserData');

	}

}


/*
 * Ayarlar tablosuna ilk kayıtların eklenmesi
 */
class createSettingsData extends Seeder {

    public function run()
    {
        $settings = new SettingsModel;
        $settings->truncate();

    }

}

/*
 * Bileşenler tablosuna ilk kayıtların eklenmesi
 */
class createComponents extends Seeder {

    public function run()
    {
        $components = new ComponentsModel;
        $components->truncate();
        $components->content = "Veritabanı";
        $components->save();
        $components2 = new ComponentsModel;
        $components2->content = "Arayüz";
        $components2->save();
        $this->command->info('Bileşenler tablosuna veri eklendi!');

    }

}

/*
 * Projeler tablosuna ilk kayıtların eklenmesi
 */
class createProjects extends Seeder {

    public function run()
    {
        $projects = new ProjectsModel;
        $projects->truncate();
        $projects->name = "Test";
        $projects->content = "Test";
        $projects->status = "t";
        $projects->user = "1";
        $projects->save();
        $this->command->info('Proje tablosuna veri eklendi!');

    }

}

/*
 * Kullanıcılar tablosuna ilk kayıtların eklenmesi
 */
class createUserData extends Seeder {

    public function run()
    {
        $users = new UserModel;
        $users->truncate();
        $users->username = "admin";
        $users->password = Hash::make("123456");
        $users->email = "admin@admin.com";
        $users->name = "Admin";
        $users->role = "1";
        $users->status = "1";
        $users->save();

        $users2 = new UserModel;
        $users2->username = "kullanıcı";
        $users2->password = Hash::make("123456");;
        $users2->email = "kullanici@gmail.com";
        $users2->name = "Kullanıcı";
        $users2->role = "0";
        $users2->status = "1";
        $users2->save();
        $this->command->info('Kullanıcılar tablosuna veri eklendi!');

    }

}
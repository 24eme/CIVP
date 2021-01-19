<?php

namespace Database\Seeders;

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
      DB::table('obligations')->insert(["title"=>"DRM","start"=>"2021-01-08T08:00Z","end"=>"2021-01-08T09:00Z","profil"=>"Negociant","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Revendications","start"=>"2021-07-01T08:00:00Z","end"=>"2021-07-01T10:00:00Z","profil"=>"Negociant","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Arachage 2","start"=>"2021-06-29T08:00:00Z","end"=>"2021-06-29T10:00:00Z","profil"=>"Producteur-Recoltant","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Revendications 3","start"=>"2021-06-30T18:00:00Z","end"=>"2021-06-30T20:00:00Z","profil"=>"Viticulteur","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Douanes 4","start"=>"2021-07-01T08:00:00Z","end"=>"2021-07-01T10:00:00Z","profil"=>"Producteur-Recoltant","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Négociant 5","start"=>"2021-01-02T14:00:00Z","end"=>"2021-01-02T15:00:00Z","profil"=>"Negociant","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des obligations","start"=>"2021-06-29T14:00:00Z","end"=>"2021-06-29T15:00:00Z","profil"=>"Negociant-Vinificateur","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Bleus 7","start"=>"2021-06-30T08:00:00Z","end"=>"2021-06-30T10:00:00Z","profil"=>"Negociant-Vinificateur","organisme"=>"","lien"=>"","contact"=>""]);
      DB::table("obligations")->insert(["title"=>"Déclaration des DRM","start"=>"2021-06-30T14:00:00Z","end"=>"2021-06-30T15:00:00Z","profil"=>"Viticulteur","organisme"=>"","lien"=>"","contact"=>""]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('obligations')->insert(["title"=>"DRM","start"=>"2021-01-08","end"=>"2021-01-08","description"=>"","profil"=>"Negociant","organisme"=>"","lien"=>"","contact"=>"","color"=>"#96b5aa"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Revendications","start"=>"2021-07-01","end"=>"2021-07-01","description"=>"","profil"=>"Negociant","organisme"=>"","lien"=>"","contact"=>"","color"=>"#96b5aa"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Arachage 2","start"=>"2021-06-29","end"=>"2021-06-29 ","description"=>"","profil"=>"Producteur-Recoltant","organisme"=>"","lien"=>"","contact"=>"","color"=>"#f1d600"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Revendications 3","start"=>"2021-06-30","end"=>"2021-06-30","description"=>"","profil"=>"Viticulteur","organisme"=>"","lien"=>"","contact"=>"","color"=>"#621940"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Douanes 4","start"=>"2021-01-14","end"=>"2021-01-14","description"=>"","profil"=>"Producteur-Recoltant","organisme"=>"","lien"=>"","contact"=>"","color"=>"#f1d600"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Négociant 5","start"=>"2021-01-02","end"=>"2021-01-02","description"=>"","profil"=>"Negociant","organisme"=>"","lien"=>"","contact"=>"","color"=>"#96b5aa"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des obligations","start"=>"2021-06-29","end"=>"2021-06-29","description"=>"","profil"=>"Negociant-Vinificateur","organisme"=>"","lien"=>"","contact"=>"","color"=>"#517fbe"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Bleus 7","start"=>"2021-06-30","end"=>"2021-06-30","description"=>"","profil"=>"Negociant-Vinificateur","organisme"=>"","lien"=>"","contact"=>"","color"=>"#517fbe"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des DRM","start"=>"2021-06-30","end"=>"2021-06-30","description"=>"","profil"=>"Viticulteur","organisme"=>"","lien"=>"","contact"=>"","color"=>"#621940"]);
    }
}

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
      DB::table('obligations')->insert(["title"=>"DRM","start"=>"2021-01-08","end"=>"2021-01-08","description"=>"","profil"=>"Negociant","organismedestinataire"=>"","textedeloi"=>"","color"=>"#96b5aa"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Revendications","start"=>"2021-07-01","end"=>"2021-07-01","description"=>"","profil"=>"Negociant","organismedestinataire"=>"","textedeloi"=>"","color"=>"#96b5aa"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Arachage 2","start"=>"2021-06-29","end"=>"2021-06-29 ","description"=>"","profil"=>"Producteur-Recoltant","organismedestinataire"=>"","textedeloi"=>"","color"=>"#f1d600"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Revendications 3","start"=>"2021-06-30","end"=>"2021-06-30","description"=>"","profil"=>"Viticulteur","organismedestinataire"=>"","textedeloi"=>"","color"=>"#621940"]);
      DB::table("obligations")->insert(["title"=>"Conférence","start"=>"2021-03-03","end"=>"2021-03-04 ","description"=>"","profil"=>"Producteur-Recoltant","organismedestinataire"=>"","textedeloi"=>"","rrule"=>"DTSTART:20210301T103000Z\nRRULE:FREQ=MONTHLY;INTERVAL=2;UNTIL=20220601","color"=>"#f1d600"]);
      DB::table("obligations")->insert(["title"=>"Réunion","start"=>"2021-03-03","end"=>"2021-03-04","description"=>"","profil"=>"Viticulteur","organismedestinataire"=>"","textedeloi"=>"","rrule"=>"DTSTART:20210301T103000Z\nRRULE:FREQ=WEEKLY;INTERVAL=2;UNTIL=20220301","color"=>"#621940"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Douanes 4","start"=>"2021-01-14","end"=>"2021-01-14","description"=>"","profil"=>"Producteur-Recoltant","organismedestinataire"=>"","textedeloi"=>"","color"=>"#f1d600"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Négociant 5","start"=>"2021-01-02","end"=>"2021-01-02","description"=>"","profil"=>"Negociant","organismedestinataire"=>"","textedeloi"=>"","color"=>"#96b5aa"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des obligations","start"=>"2021-06-29","end"=>"2021-06-29","description"=>"","profil"=>"Negociant-Vinificateur","organismedestinataire"=>"","textedeloi"=>"","color"=>"#517fbe"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des Bleus 7","start"=>"2021-06-30","end"=>"2021-06-30","description"=>"","profil"=>"Negociant-Vinificateur","organismedestinataire"=>"","textedeloi"=>"","color"=>"#517fbe"]);
      DB::table("obligations")->insert(["title"=>"Déclaration des DRM","start"=>"2021-06-30","end"=>"2021-06-30","description"=>"","profil"=>"Viticulteur","organismedestinataire"=>"","textedeloi"=>"","color"=>"#621940"]);
    }
}

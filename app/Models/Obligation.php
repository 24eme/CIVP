<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obligation extends Model
{
    use HasFactory;

    protected function convertDate($date){
      $date = str_replace('T', '', $date);
      $date = str_replace('Z','',$date);
      return $date;
    }

    public function InvalidDate(){
      $end = $this->convertDate($this->end);
      $currentDate = Carbon::now('Europe/Paris')->format('Y-m-d');
        if($currentDate > $end) {
          return True;
        }
      return False;
    }
}
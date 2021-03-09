<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obligation extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','start','end','description','profil','organismedestinataire','textedeloi','rrule','color'];

    const TYPE_AIDE => "AIDES";
    const TYPE_EVENEMENT => "EVENEMENT";
    const TYPE_OBLIGATION => "OBLIGATION";
    
    const PROFIL_PRODUCTEUR_RECOLTANT => "Producteur-Recoltant";
    const PROFIL_NEGOCIANT => "Négociant";
    const PROFIL_NEGOCIANT_VINIFICATEUR => "Négociant-Vinificateur";
    const PROFIL_VITICULTEUR => "Viticulteur (Exploitant Agricole)";

    protected function convertDate($date){
      $date = str_replace('T', '', $date);
      $date = str_replace('Z','',$date);
      return $date;
    }

    public function setColor($profil){
      switch ($profil) {
        case 'Producteur-Recoltant':
          $this->color = '#f1d600';
          break;
        case 'Negociant':
          $this->color = '#96b5aa';
          break;
        case 'Negociant-Vinificateur':
          $this->color = '#517fbe';
          break;
        case 'Viticulteur':
          $this->color = '#621940';
          break;
        default:
          $this->color = '#3788d8';
          break;
      }
    }
}

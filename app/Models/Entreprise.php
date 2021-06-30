<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entreprise extends Model
{
    use HasFactory;

    protected $guarded = [];  

    protected $table = 'entreprise';

    const PAGINATION_COUNT = 10;

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function entrepriseSeleted($entreprise_id)
    {
        return $this->where('id','=',$entreprise_id)->toArray();
    }

    public static function getColor($status)
    {
        return [
            'client' => 'bg-green-200',
            'prospect' => 'bg-red-200',
            'lead' => 'bg-purple-200',
            '' => '',
        ][$status];
    }

    public static function search($query, $sortField, $order)
	{
		return empty($query) ? DB::table('entreprise')->orderBy($sortField, $order)
        ->join('contact', 'entreprise.id', '=', 'contact.entreprise_id')            
        ->select('contact.nom as contactnom', 'contact.prenom', 'contact.e_mail', 'entreprise.nom', 'entreprise.statut', 'entreprise.code_postal', 'entreprise.ville', 'entreprise.adresse', 'entreprise.id')
			: DB::table('entreprise')
            ->join('contact', 'entreprise.id', '=', 'contact.entreprise_id')            
            ->select('contact.nom as contactnom', 'contact.prenom', 'contact.e_mail', 'entreprise.nom', 'entreprise.statut', 'entreprise.code_postal', 'entreprise.ville', 'entreprise.adresse', 'entreprise.id')
            ->whereRaw("contact.nom like '%".$query."%'")
            ->orwhereRaw("entreprise.nom like '%" .$query."%'")
            ->orwhereRaw("entreprise.statut like '%" .$query."%'")
            ->orderBy($sortField, $order);          
	}

}

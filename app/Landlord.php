<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $table = 'landlords';
    //
    protected $fillable = ['name'];
    protected $guarded = ['id', 'phone_number'];

    function creatNewLandlord($name, $phone_number){
	$user = User::create(
		['name' => $name,
		'phone_number' => $phone_number]);

    }

    function getAllLandlords(){
	$landlords = Landlord::all();

    }

    function getLandlord(id){
	$landlord = Landlord::findOrFail(id);

    }

    function deleteLandlord(id){

	User::destroy(id);
    }

}

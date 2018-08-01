<?php

namespace App\Http\Controllers;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/ipaque-bfd9b-firebase-adminsdk-4xbmd-0b81da0d11.json');
		$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)->create();
    $db = $firebase->getDatabase();

    $db->getReference('config/website')->set([
    	'id'=>1,
    	 'name' =>'charmaine',
    	 'email' => 'cha@cha.com'
    
    ]);

    echo '<h1>Data has been inserted</h1';

   }
}

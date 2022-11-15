<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class TsiController extends Controller
{
    //
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function user()
    {
        $users = $this->database->getReference('user')->getValue();
        dd( $users );
    }
    public function user_show($id)
    {
        //
        $user = $this->database->getReference('user')->getChild($id)->getvalue();
        dd($user);
    }
    public function wallet()
    {
        $wallet = $this->database->getReference('wallet')->getValue();
        dd( $wallet );
    }
    public function show_wallet($id)
    {
        //
        $wallet = $this->database->getReference('wallet')->getChild($id)->getvalue();
        dd($wallet);
    }
    public function consultation()
    {
        $users = $this->database->getReference('consultation')->getValue();
        dd( $users );
    }
    public function show_consultation($id)
    {
        //
        $user = $this->database->getReference('consultation')->getChild($id)->getvalue();
        dd($user);
    }
    public function device()
    {
        $wallet = $this->database->getReference('atm_sehat/device')->getValue();
        dd( $wallet );
    }
    public function show_device($id)
    {
        //
        $wallet = $this->database->getReference('atm_sehat/device')->getChild($id)->getvalue();
        dd($wallet);
    }
    public function observation()
    {
        $wallet = $this->database->getReference('atm_sehat/log_checking')->getValue();
        dd( $wallet );
    }
    public function show_observation($id)
    {
        //
        $wallet = $this->database->getReference('atm_sehat/log_checking')->getChild($id)->getvalue();
        dd($wallet);
    }
    public function ping()
    {
        $wallet = $this->database->getReference('atm_sehat/log_ping')->getValue();
        dd( $wallet );
    }
    public function show_ping($id)
    {
        //
        $wallet = $this->database->getReference('atm_sehat/log_ping')->getChild($id)->getvalue();
        dd($wallet);
    }
    public function status()
    {
        $wallet = $this->database->getReference('atm_sehat/log_activity')->getValue();
        dd( $wallet );
    }
    public function show_status($id)
    {
        //
        $wallet = $this->database->getReference('atm_sehat/log_activity')->getChild($id)->getvalue();
        dd($wallet);
    }
    public function device_user()
    {
        $wallet = $this->database->getReference('atm_sehat/log_connected_user')->getValue();
        dd( $wallet );
    }
    public function show_device_user($id)
    {
        //
        $wallet = $this->database->getReference('atm_sehat/log_connected_user')->getChild($id)->getvalue();
        dd($wallet);
    }

}

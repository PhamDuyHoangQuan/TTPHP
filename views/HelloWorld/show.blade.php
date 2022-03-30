<?php 
    namespace App\Http\Controller;
        use App\Http\Controllers\Usercontroller;
        use App\Models\User;
    class Controller extends UserController
    {
        public function index(){
            return 'Hello World';
        }
    }
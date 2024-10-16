<?php 

namespace App\Repository;

use App\Repository\AccountRepositoryinterface;

interface AccountRepositoryinterface{

public function index();
public function create_Pay();
public function add_Pay( $request);
public function edit($id);
public function  update($request);

public function delete($request);
    
}
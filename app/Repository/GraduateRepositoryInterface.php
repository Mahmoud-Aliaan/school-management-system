<?php

namespace App\Repository;

interface GraduateRepositoryInterface{
 

public function create();

public function  softdelete($request);

public function index();  

public function  destroy($request);

public function return_studen($request);
}
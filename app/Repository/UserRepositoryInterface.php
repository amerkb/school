<?php

namespace App\Repository;

interface UserRepositoryInterface { 

    public function getAll();

    public function GetGender();

    public function StoreOriented($request);

    public function DeleteOriented($request);

    public function editOriented($id);

    public function UpdateOriented($request);

    public function Get_type();
}
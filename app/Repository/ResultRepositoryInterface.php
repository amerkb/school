<?php


namespace App\Repository;


interface ResultRepositoryInterface
{
    public function index();

    public function show($id,$year,$id_se);

    public function store($request);

}
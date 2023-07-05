<?php


namespace App\Repository;


interface ResultRepositoryInterface
{
    public function index();

    public function show($id);

    public function store($request);

}
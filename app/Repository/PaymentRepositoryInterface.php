<?php


namespace App\Repository;


interface PaymentRepositoryInterface
{
    public function index();

    public function show($id);
    public function showteacher($id);
    public function showuser($id);
    public function storeuser($request);

    public function storeteacher($id);

    public function edit($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}
<?php

namespace App\Interfaces;

interface BrandInterface
{
    public function index();
    public function store($data);
    public function show($id);
    public function update($id,$data);
    public function destroy($id);
    public function products($id);
}

<?php

namespace App\Services\Link\Repositories;

interface LinkRepositoryInterface
{
    public function store           (array  $data);
    public function getByHash       (string $hash);
    public function counterDecrement(int    $id  );
}

<?php

namespace App\Services\Link;

use App\Services\Link\Repositories\LinkRepositoryInterface;

class LinkService {
    private $repository;

    public function __construct() {
        $this->repository = app(LinkRepositoryInterface::class);
    }

    public function getByHash($hash) {
        return $this->repository->getByHash($hash);
    }

    public function store($data) {
        return $this->repository->store($data);
    }

    public function counterDecrement($id) {
        return $this->repository->counterDecrement($id);
    }
}

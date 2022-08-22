<?php

namespace App\Services\Link\Repositories;

use App\Models\Link;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LinkRepository implements LinkRepositoryInterface
{

    public function getByHash(string $hash)
    {
        return Link::query()
            ->where('hash', $hash)
            ->first();
    }

    public function store(array $data): Model|Builder
    {
        return Link::query()
            ->create([
                'link'      => $data['link'],
                'limit'     => $data['limit'],
                'hash'      => Str::random(8),
                'unlimited' => $data['unlimited'],
                'lifetime'  => $data['lifetime'],
            ]);
    }

    public function counterDecrement(int $id)
    {
        Link::query()
            ->where('id', $id)
            ->decrement('limit', 1);
    }
}

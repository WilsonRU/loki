<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function find(int $id): Model;

    public static function store(array $attributes): ?Model;

    public static function remove(int $id): void;

    public static function update(int $id, array $attributes): void;

    public static function setup(): Model;
}

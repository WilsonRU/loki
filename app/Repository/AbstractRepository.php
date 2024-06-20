<?php

namespace App\Repository;

use App\Interfaces\RepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model;

    public static function setup(): Model
    {
        return app(static::$model);
    }

    public static function find(int $id): Model
    {
        $result = self::setup()::query()->find($id);

        if ($result instanceof Model) {
            return $result;
        }

        throw new Exception('Não foi possivel localizar o registro');
    }

    public static function store(array $attributes = []): ?Model
    {
        return self::setup()::query()->create($attributes);
    }

    public static function remove(int $id): void
    {
        self::setup()::query()->where(['id' => $id])->delete();
    }

    public static function update(int $id, array $attributes = []): void
    {
        self::setup()::query()->where(['id' => $id])->update($attributes);
    }
}

<?php

namespace App\Services\Illuminate\Database\Migrations;

use Illuminate\Database\Migrations\MigrationRepositoryInterface;

use Illuminate\Database\ConnectionResolverInterface as Resolver;
use Illuminate\Database\Migrations\DatabaseMigrationRepository as IlluminateDatabaseMigrationRepository;

class DatabaseMigrationRepository extends IlluminateDatabaseMigrationRepository implements MigrationRepositoryInterface
{
    /**
     * Get the last migration batch.
     *
     * @return array
     */
    public function getLast()
    {
        $query = $this->table()->where('batch', $this->getLastBatchNumber());

        return $query->orderBy('id', 'desc')->get()->all();
    }
}

<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryInterface
{
    protected $model;

    /**
     * Return collection.
     *
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->model::get();
    }

    /**
     * Return a model.
     *
     * @param int $id
     *
     * @return Model
     */
    public function find($id): Model
    {
        return $this->model::findOrFail($id);
    }

    /**
     * Delete a model.
     *
     * @param int $id
     *
     * @return bool
     */
    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $this->find($id)->delete();
            });

            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

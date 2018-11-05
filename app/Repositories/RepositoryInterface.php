<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function get();

    public function find($id);

    public function destroy($id);
}

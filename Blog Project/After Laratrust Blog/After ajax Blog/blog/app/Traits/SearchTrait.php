<?php

namespace App\Traits;
trait SearchTrait
{
    public function scopeSearchStrict($query, $field, $search)
    {
        if ($search !== '') {
            return $query->where($field, $search);
        }
    }
    public function scopeSearch($query, $field, $search)
    {
        if ($search !== '') {
            return $query->where($field, 'like', "%$search%");
        }
    }
    public function scopeSearchMany($query, $field, $search, $relation)
    {
        if ($search !== '') {
            return $query->whereHas($relation, function ($query) use ($field, $search) {
                $query->where($field, 'like', '%' . $search . '%');
            });
        }
    }

    public function scopeTest($name)
    {
        return $name;
    }
}
<?php

namespace  App\Utils;

use Carbon\Carbon;
use Countable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseMapper
{

    public static function prune($data)
    {
        if (!$data instanceof Countable) {
            unset(
                $data['id'],
                // $data['visibility'],
                // $data['slug'],
                // $data['updated_at'],
            );
            return $data;
        }

        foreach ($data as $entity) {
            unset(
                $entity['id'],
                // $entity['visibility'],
                // $entity['slug'],
                // $entity['updated_at'],
            );
        }

        return $data;
    }
}

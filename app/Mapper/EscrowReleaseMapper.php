<?php

namespace  App\Utils;

use Carbon\Carbon;
use Countable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EscrowReleaseMapper extends BaseMapper
{

    public static function propExist($object, $prop)
    {
        return property_exists($object, $prop) ? $object->{$prop} : null;
    }

    public static function pruneDetailed($data)
    {
        if (!$data instanceof Countable) {
            unset(
                $data['visibility'],
            );
            return $data;
        }

        foreach ($data as $entity) {
            unset(
                $entity['visibility'],
            );
        }

        return $data;
    }

    public static function prune($data)
    {

        if (!$data instanceof Countable) {
            unset(
                $data['created_at'],
                $data['updated_at'],
            );
            return $data;
        }

        foreach ($data as $entity) {
            unset(
                $entity['created_at'],
                $entity['updated_at'],
            );
        }

        return $data;
    }

    public static function createEscrowReleaseInputData($data)
    {
        $data = (object) $data;
        return [
            'uuid' => SELF::propExist($data, 'uuid'),
            'escrow_id' => SELF::propExist($data, 'escrow_id'),
            'wallet_type' => SELF::propExist($data, 'wallet_type'),
            'wallet_id' => SELF::propExist($data, 'wallet_id'),
            'amount' => SELF::propExist($data, 'amount'),
            'balance' => SELF::propExist($data, 'amount'),
        ];
    }
}

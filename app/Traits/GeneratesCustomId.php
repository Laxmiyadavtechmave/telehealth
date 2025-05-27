<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

trait GeneratesCustomId
{
    public function generateCustomUniqueId(
        string $table,
        string $column = 'custom_id',
        string $prefix = '',
        int $length = 6,
        bool $withDate = false
    ): string {
        do {
            $random = $prefix;
            if ($withDate) {
                $random .= now()->format('Ymd') . '-';
            }
            $random .= strtoupper(Str::random($length));
        } while (DB::table($table)->where($column, $random)->exists());

        return $random;
    }
}

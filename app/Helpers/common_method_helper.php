<?php

if (!function_exists('address')) {
    function address($row)
    {
        if (!$row) {
            return '';
        }

        return implode(', ', array_filter([
            $row->address1 ?? '',
            $row->address2 ?? '',
            $row->city ?? '',
            $row->country ?? '',
            $row->postal_code ?? ''
        ]));
    }
}
?>

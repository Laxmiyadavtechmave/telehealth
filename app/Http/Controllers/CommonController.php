<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public static function statusBg($status)
    {
         switch ($status) {
            case 'active':
                return 'bg-soft-success';
            case 'inactive':
                return 'bg-soft-danger';
            default:
                return 'bg-outline-info';
        }
    }

    public static function validateClinicSchedule($workingHours, $notAvailable)
    {
        $errors = [];
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($daysOfWeek as $day) {
            $slots = $workingHours[$day]['slots'] ?? [];

            if (empty($slots) && !isset($notAvailable[$day])) {
                $errors[$day] = "Please add at least one slot or mark $day as Not Available.";
            }

            foreach ($slots as $index => $slot) {
                if (empty($slot['from']) || empty($slot['to'])) {
                    $errors["$day.slot_$index"] = "Both start and end times are required for $day slot #" . ($index + 1);
                }
            }
        }

        return $errors;
    }

}

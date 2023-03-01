<?php

namespace App\Rules;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        $piskupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($piskupDate->hour, $piskupDate->minute, $piskupDate->second);

        $earliestTime = Carbon::createFromTimeString('17:00:00');
        $lasttime = Carbon::createFromTimeString('23:00:00');

        return $pickupTime->between($earliestTime, $lasttime) ? true : false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please choose the time between 17:00-23:00.';
    }
}

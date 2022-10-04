<?php

namespace App\Traits;

use Carbon\Carbon;

trait DateUtility
{
    use ObjectUtility;

    /**
     * @param  null  $birthdate
     *
     * get birthdate
     *
     * @return string|null
     */
    public function getAgeBaseOnBirthdate($birthdate = null)
    {
        return self::isNull($birthdate) ? null : Carbon::parse($birthdate)->diff(Carbon::now())->format('%y');
    }

    /**
     * @param  null  $date
     *
     *
     * 01, Jan 2000
     *
     * @return string|null
     */
    public function parseDateFormat1($date = null)
    {
        return self::isNull($date) ? null : Carbon::parse($date)->format('d, M Y');
    }

    /**
     * @param  null  $date
     *
     * Sat 01 of Jan 2000 1:00 am
     *
     * @return string
     */
    public function parseDateFormat2($date = null)
    {
        return self::isNull($date) ? null : Carbon::parse($date)->format('l d \\of F Y h:i A');
    }

    /**
     * @param  null  $date
     *
     * 2000-01-01 13:00:00
     *
     * @return string
     */
    public function parseDateFormat3($date = null)
    {
        return self::isNull($date) ? null : Carbon::parse($date)->format('Y-m-d H:i:s');
    }


    /**
     * @param  null  $date
     *
     * 2000-01-01
     *
     * @return string
     */
    public function parseDateFormat4($date = null)
    {
        return self::isNull($date) ? null : Carbon::parse($date)->format('Y-m-d') ;
    }


    /**
     * @param  null  $date
     *
     * 01, Jan 2000 01:30 pm
     *
     * @return string|null
     */
    public function parseCustom1($date = null)
    {
        return self::isNull($date) ?  null : Carbon::parse($date)->format('d M, Y  h:i A');
    }

    /**
     * @param  null  $date_issue
     * @param  int  $expiration_days
     *
     * @return int
     */
    public function getRemainingDays($date_issue = null, int $expiration_days): int
    {
        if(self::isNull($date_issue)){
            return 0;
        }

        $expiryAt = Carbon::parse($date_issue)->addDays($expiration_days);

        if ($expiryAt->lessThan(Carbon::now())) {
            return 0;
        }

        return (int) Carbon::now()->diff($expiryAt)->days;
    }

}

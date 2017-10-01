<?php

namespace TimezoneOptions;

use DateTime;
use DateTimeZone;

/**
 * Some borrowed from https://pastebin.com/raw/vBmW1cnX
 */
class TimezoneOptions {

    const ORDERBY_REGION = 'regions';
    const ORDERBY_TIME = 'time';
    const ORDERBY_OFFSET = 'offset';

    public static function generate($orderBy = null) {
        $timezoneIds = array_diff(DateTimeZone::listIdentifiers(), ['UTC']);

        $offsets = $result = $byOffsetNeg = $byOffsetPos = [];
        $now = new DateTime;
        foreach ($timezoneIds as $timezoneId) {
            $tz = new DateTimeZone($timezoneId);
            $offsets[$timezoneId] = $tz->getOffset($now);
        }
        ksort($offsets);

        foreach ($offsets as $timezone => $offset) {

            $byOffset = &$byOffsetPos;
            $offsetPrefix = '+';
            if ($offset < 0) {
                $byOffset = &$byOffsetNeg;
                $offsetPrefix = '-';
            }
            $offsetFormatted = $offsetPrefix . gmdate('H:i', abs($offset));

            $now->setTimezone(new DateTimeZone($timezone));
            $currentTime = $now->format('H:i');

            list($region, $readable) = self::explodeTimezone($timezone);
            $result[self::ORDERBY_REGION][$region][$timezone] = $readable;
            $result[self::ORDERBY_TIME][$currentTime][$timezone] = $readable;
            $byOffset[$offsetFormatted][$timezone] = $readable;
        }
        krsort($byOffsetNeg);
        ksort($byOffsetPos);
        $result[self::ORDERBY_OFFSET] = $byOffsetNeg + $byOffsetPos;
        ksort($result[self::ORDERBY_TIME]);

        return ($orderBy) ? $result[$orderBy] : $result;
    }

    /**
     * @param type $timezone
     * @return array [region, readable]
     */
    public static function explodeTimezone($timezone) {
        list($region, $area, $subarea) = array_pad(
        explode('/', $timezone), 3, ''
        );
        $area = str_replace('_', ' ', $area);
        $subarea = str_replace('_', ' ', $subarea);

        $readable = $area;
        $readable .= $subarea ? " ({$subarea})" : '';
        return [$region, $readable];
    }

}

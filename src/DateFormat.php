<?php

declare(strict_types=1);

namespace Gadget\LDAP;

final class DateFormat
{
    /**
     * @param int $utcTimestamp
     * @param non-empty-string|null $localTimezone
     * @return \DateTimeInterface
     */
    public static function formatUTCTimestamp(
        int $utcTimestamp,
        string|null $localTimezone = null
    ): \DateTimeInterface {
        if ($utcTimestamp < 19700101000000 || $utcTimestamp > 20991231235959) {
            throw new LDAPException("Invalid timestamp");
        }

        $year = intval(floor($utcTimestamp / 10000000000));
        $month = intval(floor($utcTimestamp / 100000000) % 100);
        $day = intval(floor($utcTimestamp / 1000000) % 100);
        $hour = intval(floor($utcTimestamp / 10000) % 100);
        $minute = intval(floor($utcTimestamp / 100) % 100);
        $second = $utcTimestamp % 100;

        if ($month < 1 || $month > 12 || $day < 1 || $day > 31 || $hour > 23 || $minute > 59 || $second > 59) {
            throw new LDAPException("Invalid timestamp");
        }

        return static::createLocalDateTime(
            sprintf(
                '%d-%02d-%02d %02d:%02d:%02d',
                $year,
                $month,
                $day,
                $hour,
                $minute,
                $second
            ),
            $localTimezone
        );
    }


    /**
     * @param int $timeInterval
     * @param non-empty-string|null $localTimezone
     * @return \DateTimeInterface|null
     */
    public static function formatTimeInterval(
        int $timeInterval,
        string|null $localTimezone = null
    ): \DateTimeInterface|null {
        return $timeInterval > 116444736000000000
            ? self::createLocalDateTime(
                date(
                    'Y-m-d H:i:s',
                    intval(floor($timeInterval / 10000000)) - 11644473600
                ),
                $localTimezone
            )
            : null;
    }


    /**
     * @param string $utcDateTime
     * @param non-empty-string|null $timezone
     * @return \DateTimeInterface
     */
    public static function createLocalDateTime(
        string $utcDateTime,
        string|null $timezone = null
    ): \DateTimeInterface {
        $utcDateTime = (new \DateTime($utcDateTime, new \DateTimeZone('UTC')));
        return ($timezone !== null)
            ? $utcDateTime->setTimezone(new \DateTimeZone($timezone))
            : $utcDateTime;
    }
}

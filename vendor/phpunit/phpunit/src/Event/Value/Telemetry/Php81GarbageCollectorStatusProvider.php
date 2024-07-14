<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Event\Telemetry;

use function gc_status;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 *
 * @codeCoverageIgnore
 */
final class Php81GarbageCollectorStatusProvider implements GarbageCollectorStatusProvider
{
    public function status(): GarbageCollectorStatus
    {
        $status = gc_status();

        return new GarbageCollectorStatus(
            $status['runs'],
            $status['collected'],
            $status['threshold'],
            $status['roots'],
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
        );
    }
}

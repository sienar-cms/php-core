<?php

namespace Sienar\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * A base type for events that are fired after a process has occurred
 *
 * @template T The type of the event target
 * @extends TargetedEventBase<T>
 */
abstract class AfterProcessEventBase extends TargetedEventBase {}
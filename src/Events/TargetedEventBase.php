<?php

namespace Sienar\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * A base type for events that target a specified data type
 *
 * @template T The type of the event target
 */
abstract class TargetedEventBase extends Event {
	/**
	 * @var T
	 */
	private readonly mixed $target;

	/**
	 * @param mixed $target
	 */
	public function __construct(mixed $target) {
		$this->target = $target;
	}

	/**
	 * @return T
	 */
	public function getTarget(): mixed {
		return $this->target;
	}
}
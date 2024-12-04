<?php

namespace Sienar\Events;

interface AfterProcessDispatcherInterface {
	/**
	 * Dispatches the after-process event for a hookable request
	 *
	 * @param string $eventType The event to trigger
	 * @param mixed $input The input to the event
	 *
	 * @return void
	 */
	public function dispatch(string $eventType, mixed $input): void;
}
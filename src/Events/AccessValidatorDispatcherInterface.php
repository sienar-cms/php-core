<?php

namespace Sienar\Events;

use Sienar\Data\OperationResult;

interface AccessValidatorDispatcherInterface {
	/**
	 * Runs access validation events for a hookable request
	 *
	 * @param string $eventType The event to trigger
	 * @param mixed $input The input to the event
	 *
	 * @return OperationResult<bool> Whether the validation was successful
	 */
	public function validate(string $eventType, mixed $input): OperationResult;
}
<?php

namespace Sienar\Events;

use Sienar\Infrastructure\AccessValidationContext;

/**
 * A base type for events that are fired to validate access to a process or entity
 *
 * @template T The type of the event target
 * @extends TargetedEventBase<T>
 */
abstract class AccessValidatorEventBase extends TargetedEventBase {
	private readonly AccessValidationContext $context;

	public function __construct(
		AccessValidationContext $context,
		$target
	) {
		parent::__construct($target);
		$this->context = $context;
	}

	/**
	 * Gets the event's {@see AccessValidationContext}
	 *
	 * @return AccessValidationContext
	 */
	public function getAccessValidationContext(): AccessValidationContext {
		return $this->context;
	}
}
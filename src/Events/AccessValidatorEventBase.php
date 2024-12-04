<?php

namespace Sienar\Events;

use Sienar\Infrastructure\AccessValidationContext;
use Symfony\Contracts\EventDispatcher\Event;

abstract class AccessValidatorEventBase extends Event {
	private readonly AccessValidationContext $context;
	private readonly mixed $target;

	public function __construct(
		AccessValidationContext $context,
		$target
	) {
		$this->context = $context;
		$this->target = $target;
	}

	public function getAccessValidationContext(): AccessValidationContext {
		return $this->context;
	}

	public function getTarget(): mixed {
		return $this->target;
	}
}
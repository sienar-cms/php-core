<?php

namespace Sienar\Events;

use Sienar\Infrastructure\AccessValidationContext;

abstract class AccessValidatorEventBase extends TargetedEventBase {
	private readonly AccessValidationContext $context;

	public function __construct(
		AccessValidationContext $context,
		$target
	) {
		parent::__construct($target);
		$this->context = $context;
	}

	public function getAccessValidationContext(): AccessValidationContext {
		return $this->context;
	}
}
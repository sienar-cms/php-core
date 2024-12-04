<?php

namespace Sienar\Events;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Sienar\Data\OperationResult;
use Sienar\Data\OperationStatus;
use Sienar\Events\AccessValidatorDispatcherInterface;
use Sienar\Infrastructure\AccessValidationContext;

class DefaultAccessValidationDispatcher implements AccessValidatorDispatcherInterface {
	public function __construct(
		private readonly EventDispatcherInterface $dispatcher,
		private readonly LoggerInterface $logger
	) {}

	/**
	 * @inheritDoc
	 */
	public function validate(string $eventType, mixed $input): OperationResult {
		$context = new AccessValidationContext;

		try {
			$event = new $eventType($context, $input);
			$this->dispatcher->dispatch($event);
		} catch (\Exception $e) {
			$this->logger->error($e);

			return new OperationResult(
				OperationStatus::Unknown,
				false,
				'An unknown error has occured'
			);
		}

		$success = !$context->wasAttempted() || $context->canAccess();
		return new OperationResult(
			$success ? OperationStatus::Success : OperationStatus::Unauthorized,
			$success
		);
	}
}
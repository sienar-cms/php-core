<?php

namespace Sienar\Events;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;

/**
 * Dispatches after-process events and logs errors on failure
 */
class DefaultAfterProcessDispatcher implements AfterProcessDispatcherInterface {
	public function __construct(
		private readonly EventDispatcherInterface $dispatcher,
		private readonly LoggerInterface $logger
	) {}

	/**
	 * @inheritDoc
	 */
	public function dispatch(string $eventType, mixed $input): void {
		try {
			$event = new $eventType($input);
			$this->dispatcher->dispatch($event);
		} catch (\Exception $e) {
			$this->logger->error($e);
		}
	}
}
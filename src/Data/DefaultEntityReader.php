<?php

namespace Sienar\Data;

use Psr\Log\LoggerInterface;
use Sienar\Events\AccessValidationDispatcherInterface;
use Sienar\Events\AfterProcessDispatcherInterface;
use Symfony\Component\Uid\Uuid;

/**
 * A default implementation of {@see EntityReaderInterface}
 *
 * @template T The type of the entity
 * @implements EntityReaderInterface<T>
 */
class DefaultEntityReader implements EntityReaderInterface {
	protected string $entityNameSingular;
	protected string $entityNamePlural;
	protected string $accessValidationEvent;
	protected string $afterProcessEvent;

	public function __construct(
		private readonly RepositoryInterface $repository,
		private readonly AccessValidationDispatcherInterface $accessValidationDispatcher,
		private readonly AfterProcessDispatcherInterface $afterProcessDispatcher,
		private readonly LoggerInterface $logger
	) {}

	/**
	 * @inheritDoc
	 */
	public function read(Uuid $id, ?Filter $filter = null): OperationResult {
		$entity = null;

		try {
			$entity = $this->repository->read($id, $filter);
		} catch (\Exception $e) {
			$this->logger->error($e);

			return new OperationResult(
				OperationStatus::Unknown,
				null,
				"Unable to read $this->entityNameSingular"
			);
		}

		if ($entity === null) {
			return new OperationResult(
				OperationStatus::NotFound,
				null,
				"$this->entityNameSingular with ID $id was not found"
			);
		}

		/**
		 * @var OperationResult<bool> $accessValidationResult
		 */
		$accessValidationResult = $this->accessValidationDispatcher->dispatch(
			$this->accessValidationEvent,
			$entity
		);
		if (!$accessValidationResult->getResult()) {
			return new OperationResult(
				OperationStatus::Unauthorized,
				null,
				"You do not have permission to access this $this->entityNameSingular"
			);
		}

		$this->afterProcessDispatcher->dispatch(
			$this->afterProcessEvent,
			$entity
		);

		return new OperationResult(result: $entity);
	}

	/**
	 * @inheritDoc
	 */
	public function readAll(?Filter $filter = null): OperationResult {
		$queryResult = null;

		try {
			$queryResult = $this->repository->readAll($filter);
		} catch (\Exception $e) {
			$this->logger->error($e);
			return new OperationResult(
				OperationStatus::Unknown,
				new PagedQuery([], 0),
				"Unable to read $this->entityNamePlural"
			);
		}

		foreach ($queryResult as $entity) {
			$this->afterProcessDispatcher->dispatch($this->afterProcessEvent, $entity);
		}

		return new OperationResult(result: $queryResult);
	}
}
<?php

namespace Sienar\Data;

use Symfony\Component\Uid\Uuid;

/**
 * Writes entities to a repository
 *
 * @template T The type of the entity
 */
interface EntityWriterInterface {
	/**
	 * Creates a new entity in the repository
	 *
	 * @param EntityInterface $entity The entity to create
	 *
	 * @return OperationResult<Uuid> An {@see OperationResult} wrapping around the created entity's primary key
	 */
	public function create(EntityInterface $entity): OperationResult;

	/**
	 * Updates an existing entity in the repository
	 *
	 * @param EntityInterface $entity The entity to update
	 *
	 * @return OperationResult<bool> An {@see OperationResult} wrapping around the success status of the edit operation
	 */
	public function update(EntityInterface $entity): OperationResult;
}
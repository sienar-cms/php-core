<?php

namespace Processors;

use Sienar\Data\EntityInterface;
use Sienar\Data\Filter;
use Sienar\Data\OperationResult;
use Sienar\Data\PagedQuery;
use Symfony\Component\Uid\Uuid;

/**
 * @template T The type of the entity
 */
interface CrudProcessorInterface {
	/**
	 * Gets an entity by primary key
	 *
	 * @param Uuid $id The primary key of the entity to retrieve
	 * @param Filter|null $filter A {@see Filter} to specify included results
	 *
	 * @return OperationResult<T> An {@see OperationResult} wrapping around the requested entity
	 */
	public function read(Uuid $id, ?Filter $filter = null): OperationResult;

	/**
	 * Gets a list of all entities in the backend
	 *
	 * @param Filter|null $filter A {@see Filter} to specify included results
	 *
	 * @return OperationResult<PagedQuery<T>> An {@see OperationResult} wrapping around a paged list of all entities in the database
	 */
	public function readAll(?Filter $filter = null): OperationResult;

	/**
	 * Creates a new entity in the backend
	 *
	 * @param EntityInterface $entity The entity to create
	 *
	 * @return OperationResult<Uuid> An {@see OperationResult} wrapping around the created entity's primary key
	 */
	public function create(EntityInterface $entity): OperationResult;

	/**
	 * Updates an existing entity in the backend
	 *
	 * @param EntityInterface $entity The entity to update
	 *
	 * @return OperationResult<bool> An {@see OperationResult} wrapping around the success status of the edit operation
	 */
	public function update(EntityInterface $entity): OperationResult;

	/**
	 * Deletes an entity by primary key
	 *
	 * @param Uuid $id The ID of the entity to delete
	 *
	 * @return OperationResult<bool> An {@see OperationResult} wrapping around the success status of the delete operation
	 */
	public function delete(Uuid $id): OperationResult;
}
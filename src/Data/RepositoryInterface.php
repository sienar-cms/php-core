<?php

namespace Sienar\Data;

use Symfony\Component\Uid\Uuid;

/**
 * Exposes methods for storing, updating, and retrieving instances of an entity from a datastore
 *
 * @template T of EntityInterface
 */
interface RepositoryInterface {
	/**
	 * Reads an entity from the datastore
	 *
	 * @param Uuid $id The ID of the entity
	 * @param Filter|null $filter A {@see Filter} to specify included results
	 *
	 * @return T|null The entity if it exists, else <code>null</code>
	 */
	public function read(Uuid $id, ?Filter $filter = null): ?EntityInterface;

	/**
	 * Reads all entities from the datastore that satisfy the provided {@see Filter}
	 *
	 * @param Filter|null $filter A {@see Filter} to specify included results
	 *
	 * @return PagedQuery<T> A {@see PagedQuery} of entities matching the provided filter
	 */
	public function readAll(?Filter $filter = null): PagedQuery;

	/**
	 * Creates a new entity in the datastore
	 *
	 * @param T $entity The entity to create
	 *
	 * @return Uuid|null The entity's primary key if successful, else <code>null</code>
	 */
	public function create(EntityInterface $entity): ?Uuid;

	/**
	 * Updates an existing entity in the datastore
	 *
	 * @param T $entity The entity to update
	 *
	 * @return bool Whether the edit operation was successful
	 */
	public function update(EntityInterface $entity): bool;

	/**
	 * Deletes an entity from the datastore
	 *
	 * @param Uuid $id The primary key of the entity to delete
	 *
	 * @return bool Whether the delete operation was successful
	 */
	public function delete(Uuid $id): bool;

	/**
	 * Reads the concurrency stamp for the entity with the given ID
	 *
	 * @param Uuid $id The ID of the entity
	 *
	 * @return Uuid|null The concurrency stamp of the entity if it exists, else <code>null</code>
	 */
	public function readConcurrencyStamp(Uuid $id): ?Uuid;
}
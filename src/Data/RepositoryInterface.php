<?php

namespace Sienar\Data;

/**
 * Exposes methods for storing, updating, and retrieving instances of an entity from a datastore
 *
 * @template T
 */
interface RepositoryInterface {
	/**
	 * Reads an entity from the datastore
	 *
	 * @param int $id The ID of the entity
	 * @param Filter|null $filter A {@see Filter} to specify included results
	 *
	 * @return T|null The entity if it exists, else <code>null</code>
	 */
	public function read(int $id, ?Filter $filter = null): mixed;

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
	 * @return int|null The entity's primary key if successful, else <code>null</code>
	 */
	public function create(mixed $entity): ?int;

	/**
	 * Updates an existing entity in the datastore
	 *
	 * @param T $entity The entity to update
	 *
	 * @return bool Whether the edit operation was successful
	 */
	public function update(mixed $entity): bool;

	/**
	 * Deletes an entity from the datastore
	 *
	 * @param int $id The primary key of the entity to delete
	 *
	 * @return bool Whether the delete operation was successful
	 */
	public function delete(int $id): bool;

	/**
	 * Reads the concurrency stamp for the entity with the given ID
	 *
	 * @param int $id The ID of the entity
	 *
	 * @return int|null The concurrency stamp of the entity if it exists, else <code>null</code>
	 */
	public function readConcurrencyStamp(int $id): ?int;
}
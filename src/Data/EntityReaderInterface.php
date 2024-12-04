<?php

namespace Sienar\Data;

use Symfony\Component\Uid\Uuid;

/**
 * Reads entities from a repository
 *
 * @template T The type of the entity
 */
interface EntityReaderInterface {
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
	 * Gets a paged list of all entities in the repository
	 *
	 * @param Filter|null $filter A {@see Filter} to specify included results
	 *
	 * @return OperationResult<PagedQuery<T>> An {@see OperationResult} wrapping around a paged list of all entities in the database
	 */
	public function readAll(?Filter $filter = null): OperationResult;
}
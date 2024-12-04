<?php

namespace Sienar\Data;

use Symfony\Component\Uid\Uuid;

interface EntityDeleterInterface {
	/**
	 * Deletes an entity by primary key
	 *
	 * @param Uuid $id The ID of the entity to delete
	 *
	 * @return OperationResult<bool> An {@see OperationResult} wrapping around the success status of the delete operation
	 */
	public function delete(Uuid $id): OperationResult;
}
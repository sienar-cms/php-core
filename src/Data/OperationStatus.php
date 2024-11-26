<?php

namespace Sienar\Data;

enum OperationStatus : int
{
	/**
	 * Indicates that a hook or process was successful
	 */
	case Success = 0;

	/**
	 * Indicates that the operation failed due to a missing entity
	 */
	case NotFound = 1;

	/**
	 * Indicates that the operation failed because the user lacks permissions
	 */
	case Unauthorized = 2;

	/**
	 * Indicates that the operation failed due to the entity or request state
	 */
	case Unprocessable = 3;

	/**
	 * Indicates that the operation failed due to a database conflict
	 */
	case Conflict = 4;

	/**
	 * Indicates that the operation failed due to a database concurrency error
	 */
	case Concurrency = 5;

	/**
	 * Indicates that the operation failed for unknown reasons
	 */
	case Unknown = 6;
}

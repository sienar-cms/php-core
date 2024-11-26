<?php

namespace Sienar\Data;

enum OperationStatus
{
	/**
	 * Indicates that a hook or process was successful
	 */
	case Success;

	/**
	 * Indicates that the operation failed due to a missing entity
	 */
	case NotFound;

	/**
	 * Indicates that the operation failed because the user lacks permissions
	 */
	case Unauthorized;

	/**
	 * Indicates that the operation failed due to the entity or request state
	 */
	case Unprocessable;

	/**
	 * Indicates that the operation failed due to a database conflict
	 */
	case Conflict;

	/**
	 * Indicates that the operation failed due to a database concurrency error
	 */
	case Concurrency;

	/**
	 * Indicates that the operation failed for unknown reasons
	 */
	case Unknown;
}

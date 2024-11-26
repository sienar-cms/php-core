<?php

namespace Sienar\Data;

/**
 * A base interface containing the getters and setters required by all entities in the app
 */
interface EntityInterface {
	/**
	 * Represents the unique ID of the entity
	 *
	 * @return int|null
	 */
	public function getId(): ?int;

	/**
	 * Represents the concurrency stamp of the entity
	 *
	 * @return int|null
	 */
	public function getConcurrencyStamp(): ?int;

	/**
	 * Sets the new concurrency stamp of the entity
	 *
	 * @param int $concurrencyStamp The new concurrency stamp
	 *
	 * @return void
	 */
	public function setConcurrencyStamp(int $concurrencyStamp): void;
}
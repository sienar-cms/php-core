<?php

namespace Sienar\Data;

use Symfony\Component\Uid\Uuid;

/**
 * A base interface containing the getters and setters required by all entities in the app
 */
interface EntityInterface {
	/**
	 * Represents the unique ID of the entity
	 *
	 * @return Uuid|null
	 */
	public function getId(): ?Uuid;

	/**
	 * Represents the concurrency stamp of the entity
	 *
	 * @return Uuid|null
	 */
	public function getConcurrencyStamp(): ?Uuid;

	/**
	 * Sets the new concurrency stamp of the entity
	 *
	 * @param Uuid $concurrencyStamp The new concurrency stamp
	 *
	 * @return void
	 */
	public function setConcurrencyStamp(Uuid $concurrencyStamp): void;
}
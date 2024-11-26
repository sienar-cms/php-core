<?php

namespace Sienar\Data;

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
<?php

namespace Sienar\Data;

interface EntityInterface
{
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
	public function getVersion(): ?int;

	/**
	 * Sets the new concurrency stamp of the entity
	 *
	 * @param int $version The new concurrency stamp
	 * @return void
	 */
	public function setVersion(int $version): void;
}
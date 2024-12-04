<?php

namespace Sienar\Infrastructure;

/**
 * Used to track access requests that should fail by default and require explicit approval
 */
class AccessValidationContext {
	/**
	 * @var bool Indicates whether the access request is approved or not
	 */
	private bool $hasAccess = false;

	/**
	 * @var bool Indicates whether any access validator has attempted to validate the access request
	 */
	private bool $hasBeenAttempted = false;

	/**
	 * Indicates whether the access request is approved or not
	 *
	 * @return bool
	 */
	public function canAccess(): bool {
		return $this->hasAccess;
	}

	/**
	 * Indicates whether any access validator has attempted to validate the access request
	 *
	 * @return bool
	 */
	public function wasAttempted(): bool {
		return $this->hasBeenAttempted;
	}

	/**
	 * Informs the access validation context that an attempt to validate access was made
	 *
	 * @return void
	 */
	public function markAttempted(): void {
		$this->hasBeenAttempted = true;
	}

	/**
	 * Informs the access validation context that the access request is approved
	 * @return void
	 */
	public function approve(): void {
		$this->hasAccess = true;
	}
}
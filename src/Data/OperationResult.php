<?php

namespace Sienar\Data;

/**
 * Represents the result of an operation
 *
 * @template T
 */
readonly class OperationResult {
	private OperationStatus $status;

	/**
	 * @var T|null
	 */
	private mixed $result;
	private ?string $message;

	/**
	 * @param OperationStatus $status
	 * @param T|null $result
	 * @param string|null $message
	 */
	public function __construct(
		OperationStatus $status = OperationStatus::Success,
		mixed $result = null,
		?string $message = null) {
		$this->status = $status;
		$this->result = $result;
		$this->message = $message;
	}

	/**
	 * Gets the status of the operation
	 *
	 * @return OperationStatus
	 */
	public function getStatus(): OperationStatus {
		return $this->status;
	}

	/**
	 * Gets the value returned from the operation
	 *
	 * @return T|null
	 */
	public function getResult(): mixed {
		return $this->result;
	}

	/**
	 * Gets the status message from the operation
	 *
	 * @return string|null
	 */
	public function getMessage(): ?string {
		return $this->message;
	}
}
<?php

namespace Sienar\Data;

readonly class OperationResult {
	private OperationStatus $status;
	private mixed $result;
	private ?string $message;

	/**
	 * @param OperationStatus $status
	 * @param mixed $result
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

	public function getStatus(): OperationStatus {
		return $this->status;
	}

	public function getResult(): mixed {
		return $this->result;
	}

	public function getMessage(): ?string {
		return $this->message;
	}
}
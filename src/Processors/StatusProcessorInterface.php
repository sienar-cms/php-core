<?php

namespace Processors;

use Sienar\Data\OperationResult;

/**
 * @template TInput The type of the input to the {@see process} method
 */
interface StatusProcessorInterface {
	/**
	 * @param TInput $input The input to the process
	 *
	 * @return OperationResult<bool> The result of the process
	 */
	public function process($input): OperationResult;
}
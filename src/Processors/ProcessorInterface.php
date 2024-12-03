<?php

namespace Processors;

use Sienar\Data\OperationResult;

/**
 * @template TInput The type of the input to the {@see process} method
 * @template TOutput The type of the return result
 */
interface ProcessorInterface {
	/**
	 * @param TInput $input The input to the process
	 *
	 * @return OperationResult<TOutput> The result of the process
	 */
	public function process($input): OperationResult;
}
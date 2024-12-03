<?php

namespace Processors;

use Sienar\Data\OperationResult;

/**
 * @template TOutput The type of the return result
 */
interface ResultProcessorInterface {
	/**
	 * @return OperationResult<TOutput> The result of the process
	 */
	public function process(): OperationResult;
}
<?php

namespace Sienar\Data;

/**
 * Used to page through database results
 *
 * @template T
 */
class PagedQuery {
	/**
	 * @var T[]
	 */
	private array $items;
	private int $totalCount;

	/**
	 * @param T[] $items
	 * @param int $totalCount
	 */
	public function __construct(array $items, int $totalCount) {
		$this->items = $items;
		$this->totalCount = $totalCount;
	}

	/**
	 * @return T[] Gets the items returned from a query
	 */
	public function getItems(): array {
		return $this->items;
	}

	/**
	 * @return int Gets the total number of items
	 */
	public function getTotalCount(): int {
		return $this->totalCount;
	}
}
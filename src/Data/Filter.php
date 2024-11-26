<?php

namespace Sienar\Data;

/**
 * Used to search, sort, order, and page through datastore records
 */
class Filter {
	private ?string $searchTerm;
	private ?string $sortName;
	private ?bool $sortDescending;
	private ?int $page;
	private ?int $pageSize;
	private array $includes;

	/**
	 * Gets the text value to search for, if any
	 *
	 * @return string|null
	 */
	public function getSearchTerm(): ?string {
		return $this->searchTerm;
	}

	/**
	 * Sets the text value to search for, if any
	 *
	 * @param string|null $searchTerm The new search term
	 *
	 * @return void
	 */
	public function setSearchTerm(?string $searchTerm): void {
		$this->searchTerm = $searchTerm;
	}

	/**
	 * Gets the name of the column to sort by, if any
	 *
	 * @return string|null
	 */
	public function getSortName(): ?string {
		return $this->sortName;
	}

	/**
	 * Sets the name of the column to sort by, if any
	 *
	 * @param string|null $sortName The new sort column name
	 *
	 * @return void
	 */
	public function setSortName(?string $sortName): void {
		$this->sortName = $sortName;
	}

	/**
	 * Gets whether to explicitly sort by value descending
	 *
	 * @return bool|null
	 */
	public function getSortDescending(): ?bool {
		return $this->sortDescending;
	}

	/**
	 * Sets whether to explicitly sort by value descending
	 *
	 * @param bool|null $sortDescending The new sort descending value
	 *
	 * @return void
	 */
	public function setSortDescending(
		?bool $sortDescending): void {
		$this->sortDescending = $sortDescending;
	}

	/**
	 * Gets the page of results to return (1-indexed)
	 *
	 * @return int|null
	 */
	public function getPage(): ?int {
		return $this->page;
	}

	/**
	 * Sets the page of results to return (1-indexed)
	 *
	 * @param int|null $page The new page number
	 *
	 * @return void
	 */
	public function setPage(
		?int $page): void {
		$this->page = $page;
	}

	/**
	 * Gets the number of results in a single page
	 *
	 * @return int|null
	 */
	public function getPageSize(): ?int {
		return $this->pageSize;
	}

	/**
	 * Sets the number of results in a single page
	 *
	 * @param int|null $pageSize The new page size
	 *
	 * @return void
	 */
	public function setPageSize(
		?int $pageSize): void {
		$this->pageSize = $pageSize;
	}

	/**
	 * Gets the related entities to include
	 *
	 * @return string[]
	 */
	public function getIncludes(): array {
		return $this->includes;
	}

	/**
	 * Sets the related entities to include
	 *
	 * @param string[] $includes The new entities to include
	 *
	 * @return void
	 */
	public function setIncludes(array $includes): void {
		$this->includes = $includes;
	}

	/**
	 * Creates a filter that gets all results, without paging
	 *
	 * @return Filter
	 */
	public static function getAll(): Filter {
		$filter = new Filter();
		$filter->setPageSize(0);
		return $filter;
	}

	/**
	 * Creates a filter that includes the designated related entities
	 *
	 * @param string ...$includes
	 *
	 * @return Filter
	 */
	public static function withIncludes(string ...$includes): Filter {
		$filter = new Filter();
		$filter->setIncludes($includes);
		return $filter;
	}
}
<?php

namespace Sienar\Data;

class Filter
{
	private ?string $searchTerm;
	private ?string $sortName;
	private ?bool $sortDescending;
	private ?int $page;
	private ?int $pageSize;
	private array $includes;

	public function getSearchTerm(): ?string
	{
		return $this->searchTerm;
	}

	public function setSearchTerm(
		?string $searchTerm ): void
	{
		$this->searchTerm = $searchTerm;
	}

	public function getSortName(): ?string
	{
		return $this->sortName;
	}

	public function setSortName(
		?string $sortName ): void
	{
		$this->sortName = $sortName;
	}

	public function getSortDescending(): ?bool
	{
		return $this->sortDescending;
	}

	public function setSortDescending(
		?bool $sortDescending ): void
	{
		$this->sortDescending = $sortDescending;
	}

	public function getPage(): ?int
	{
		return $this->page;
	}

	public function setPage(
		?int $page ): void
	{
		$this->page = $page;
	}

	public function getPageSize(): ?int
	{
		return $this->pageSize;
	}

	public function setPageSize(
		?int $pageSize ): void
	{
		$this->pageSize = $pageSize;
	}

	/**
	 * @return string[]
	 */
	public function getIncludes(): array
	{
		return $this->includes;
	}

	/**
	 * @param string[] $includes
	 * @return void
	 */
	public function setIncludes(array $includes): void
	{
		$this->includes = $includes;
	}

	/**
	 * Creates a filter that gets all results, without paging
	 *
	 * @return Filter
	 */
	public static function getAll(): Filter
	{
		$filter = new Filter();
		$filter->setPageSize(0);
		return $filter;
	}

	/**
	 * Creates a filter that includes the designated related entities
	 *
	 * @param string ...$includes
	 * @return Filter
	 */
	public static function withIncludes(string ...$includes): Filter
	{
		$filter = new Filter();
		$filter->setIncludes($includes);
		return $filter;
	}
}

return Filter::withIncludes("hello", 'world');
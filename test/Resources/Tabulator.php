<?php
declare(strict_types=1);

namespace PChouse\Resources;

use PChouse\Tabulator\Column\ColumnDefinition;
use PChouse\Tabulator\Column\ColumnDefinitionAlign;
use PChouse\Tabulator\Column\Layout;
use PChouse\Tabulator\Column\Resizable;
use PChouse\Tabulator\Index;
use PChouse\Tabulator\KeyBinding;
use PChouse\Tabulator\Options;
use PChouse\Tabulator\Sorter\SortDirection;
use PChouse\Tabulator\Sorter\Sorter;
use PChouse\Tabulator\Sorter\SortMode;

#[Options(
	sortMode: SortMode::LOCAL,
	filterMode: SortMode::LOCAL,
	layout: Layout::FIT_COLUMNS,
	height: 500,
	placeholder: "Sem registos",
)]
#[KeyBinding]
class Tabulator
{











	#[Index]
	#[ColumnDefinition(
	visible: true
	)]
	private int $id;

	#[Sorter(SortDirection::DESC)]
	#[ColumnDefinition(
	width: 100,
	hozAlign: ColumnDefinitionAlign::LEFT,
	resizable: Resizable::HEADER,
	frozen: true,
	sorter: \PChouse\Tabulator\Column\Sorter::ALPHA_NUM
	)]
	private string $name;

	#[Sorter(SortDirection::ASC)]
	#[ColumnDefinition(
	hozAlign: ColumnDefinitionAlign::LEFT,
	resizable: Resizable::HEADER,
	sorter: \PChouse\Tabulator\Column\Sorter::ALPHA_NUM
	)]
	private string $surname;

	#[Sorter]
	#[ColumnDefinition(
	hozAlign: ColumnDefinitionAlign::RIGHT,
	resizable: Resizable::HEADER,
	frozen: true,
	sorter: \PChouse\Tabulator\Column\Sorter::ALPHA_NUM
	)]
	private int $age;

	#[ColumnDefinition(
	hozAlign: ColumnDefinitionAlign::CENTER,
	resizable: Resizable::HEADER,
	sorter: \PChouse\Tabulator\Column\Sorter::STRING
	)]
	private string $nationality;

	public function __construct()
	{
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param int $id
	 *
	 * @return Tabulator
	 */
	public function setId(int $id): Tabulator
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 *
	 * @return Tabulator
	 */
	public function setName(string $name): Tabulator
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSurname(): string
	{
		return $this->surname;
	}

	/**
	 * @param string $surname
	 *
	 * @return Tabulator
	 */
	public function setSurname(string $surname): Tabulator
	{
		$this->surname = $surname;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getAge(): int
	{
		return $this->age;
	}

	/**
	 * @param int $age
	 *
	 * @return Tabulator
	 */
	public function setAge(int $age): Tabulator
	{
		$this->age = $age;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getNationality(): string
	{
		return $this->nationality;
	}

	/**
	 * @param string $nationality
	 *
	 * @return Tabulator
	 */
	public function setNationality(string $nationality): Tabulator
	{
		$this->nationality = $nationality;
		return $this;
	}
}

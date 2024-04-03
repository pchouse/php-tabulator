<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

use PChouse\Tabulator\ABase;
use PChouse\Tabulator\NoExport;
use PChouse\Tabulator\Sorter\SortDirection;
use PChouse\Tabulator\Translate;
use PChouse\Tabulator\Undefined;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ColumnDefinition extends ABase
{


    /**
     * The column position in the table
     *
     * @var int|null
     */
    #[NoExport]
    private int|null $position = null;

    /**
     * If you want to dynamically generate the sorterParams at the time the sort is called you
     * can pass a function into the property that should return the params object.
     *
     * @var \PChouse\Tabulator\Column\ColumnDefinitionSorterParams|\PChouse\Tabulator\Undefined|null
     */
    private ColumnDefinitionSorterParams|Undefined|null $sorterParams = Undefined::UNDEFINED;

    /**
     * You can pass an optional additional parameter with the formatter,
     * formatterParams that should contain an object with additional
     * information for configuring the formatter.
     *
     * @var \PChouse\Tabulator\Column\MoneyParams|\PChouse\Tabulator\Column\ImageParams|\PChouse\Tabulator\Column\LinkParams|\PChouse\Tabulator\Column\DateTimeParams|\PChouse\Tabulator\Column\DateTimeDifferenceParams|\PChouse\Tabulator\Column\TickCrossParams|\PChouse\Tabulator\Column\ToggleParams|\PChouse\Tabulator\Column\TrafficParams|\PChouse\Tabulator\Column\ProgressBarParams|\PChouse\Tabulator\Column\StarRatingParams|\PChouse\Tabulator\Undefined|null
     */
    // phpcs:ignore
    private MoneyParams|ImageParams|LinkParams|DateTimeParams|DateTimeDifferenceParams|TickCrossParams|ToggleParams|TrafficParams|ProgressBarParams|StarRatingParams|Undefined|null $formatterParams = Undefined::UNDEFINED;

    // phpcs:ignore
    private NumberParams|CheckboxParams|InputParams|TextAreaParams|DateParams|TimeParams|DateTimeEditorParams|Undefined|null $editorParams = Undefined::UNDEFINED;

    //phpcs:disable
    /**
     * phpcs:ignore comment
     *
     * @param string $title                                                                                    Required This is the title that will be displayed in the header for this column.
     * @param string|\PChouse\Tabulator\Undefined|null $field                                                  Required (not required in icon/button columns) this is the key for this column in the data array.
     * @param int|null $position                                                                               The column position in the table
     * @param bool|\PChouse\Tabulator\Undefined|null $visible                                                  Determines if the column is visible.
     * @param int|\PChouse\Tabulator\Undefined|null $width                                                     sets the width of this column, this can be set in pixels or as a percentage of total table width (if not set the system will determine the best)
     * @param \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null $hozAlign      If you want to set the horizontal alignment on a column by column basis
     * @param \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null $headerHozAlign
     * @param \PChouse\Tabulator\Column\VerticalAlign|\PChouse\Tabulator\Undefined|null $vertAlign             If you want to set the vertical alignment on a column by column basis
     * @param int|\PChouse\Tabulator\Undefined|null $minWidth                                                  Sets the minimum width of this column, this should be set in pixels
     * @param float|int|\PChouse\Tabulator\Undefined|null $widthGrow                                           The widthGrow property should be used on columns without a width property set. The value is used to work out what fraction of the available will be allocated to the column. The value should be set to a number greater than 0, by default any columns with no width set have a widthGrow value of 1
     * @param float|int|\PChouse\Tabulator\Undefined|null $widthShrink                                         The widthShrink property should be used on columns with a width property set. The value is used to work out how to shrink columns with a fixed width when the table is too narrow to fit in all the columns. The value should be set to a number greater than 0, by default columns with a width set have a widthShrink value of 0, meaning they will not be shrunk if the table gets too narrow, and may cause the horizontal scrollbar to appear.
     * @param \PChouse\Tabulator\Column\Resizable|bool|\PChouse\Tabulator\Undefined|null $resizable            Set whether column can be resized by user dragging its edges
     * @param bool|\PChouse\Tabulator\Undefined|null $frozen                                                   You can freeze the position of columns on the left and right of the table using the frozen property in the column definition array. This will keep the column still when the table is scrolled horizontally.
     * @param int|\PChouse\Tabulator\Undefined|null $responsive                                                An integer to determine when the column should be hidden in responsive mode.
     * @param string|\PChouse\Tabulator\Undefined|null $tooltip                                                Sets the on hover tooltip for each cell in this column * * The tooltip parameter can take three different types of value:
     * @param bool|\PChouse\Tabulator\Undefined|null $rowHandle                                                Sets the column as a row handle, allowing it to be used to drag movable rows.
     * @param \PChouse\Tabulator\Column\Sorter|\PChouse\Tabulator\Undefined|null $sorter                       By default, Tabulator will attempt to guess which sorter should be applied to a column based on the data contained in the first row. It can determine sorters for strings, numbers, alphanumeric sequences and booleans, anything else will be treated as a string.
     * @param \PChouse\Tabulator\Column\Formatter|\PChouse\Tabulator\Undefined|null $formatter                 Set how you would like the data to be formatted.
     * @param bool|\PChouse\Tabulator\Undefined|null $variableHeight                                           Alter the row height to fit the contents of the cell instead of hiding overflow
     * @param bool|\PChouse\Tabulator\Undefined|null $editable                                                 There are some circumstances where you may want to block edit-ability of a cell for one reason or another. To meet this need you can use the editable option. This lets you set a callback that is executed before the editor is built, if this callback returns true the editor is added, if it returns false the edit is aborted and the cell remains a non-editable cell. The function is passed one parameter, the CellComponent of the cell about to be edited. You can also pass a boolean value instead of a function to this property.
     * @param \PChouse\Tabulator\Column\Editor|\PChouse\Tabulator\Undefined|null $editor                       When a user clicks on an editable column that will be able to edit the value for that cell. By default, Tabulator will use an editor that matches the current formatter for that cell. if you wish to specify a specific editor, you can set them per column using the editor option in the column definition. Passing a value of true to this option will result in Tabulator applying the editor that best matches the columns formatter, if present.
     * @param \PChouse\Tabulator\Column\StandardValidatorType|\PChouse\Tabulator\Undefined|null $validator
     * @param bool|\PChouse\Tabulator\Undefined|null $download                                                 Show or hide column in downloaded data
     * @param string|\PChouse\Tabulator\Undefined|null $titleDownload                                          Set custom title for column in download.
     * @param bool|\PChouse\Tabulator\Undefined|null $headerSort                                               By default, all columns in a table are sortable by clicking on the column header
     * @param \PChouse\Tabulator\Sorter\SortDirection|\PChouse\Tabulator\Undefined|null $headerSortStartingDir Set the starting sort direction when a user first clicks on a header.
     * @param bool|\PChouse\Tabulator\Undefined|null $headerSortTristate                                       Allow tristate toggling of column header sort direction.
     * @param bool|string|\PChouse\Tabulator\Undefined|null $headerTooltip                                     Sets the on hover tooltip for the column header* * The tooltip headerTooltip can take three different types of value
     * @param bool|\PChouse\Tabulator\Column\Flip|\PChouse\Tabulator\Undefined|null $headerVertical            Change the orientation of the column header to vertical
     * @param bool|\PChouse\Tabulator\Undefined|null $editableTitle                                            Allows the user to edit the header titles
     * @param \PChouse\Tabulator\Column\Formatter|\PChouse\Tabulator\Undefined|null $titleFormatter            Formatter function for header title.
     * @param \PChouse\Tabulator\Column\Editor|\PChouse\Tabulator\Undefined|null $headerFilter                 Filtering of columns from elements in the header.
     * @param string|\PChouse\Tabulator\Undefined|null $headerFilterPlaceholder
     * @param bool|\PChouse\Tabulator\Undefined|null $headerFilterLiveFilter                                   Disable live filtering of the table.
     * @param bool|\PChouse\Tabulator\Undefined|null $htmlOutput                                               Show/Hide a particular column in the HTML output.
     * @param bool|\PChouse\Tabulator\Undefined|null $clipboard                                                If you don't want to show a particular column in the clipboard output you can set the clipboard property in its column definition object to false.
     * @param bool|\PChouse\Tabulator\Undefined|null $print                                                    If you don't want to show a particular column in the print table you can set the print property in its column definition object to false.
     * @param bool|\PChouse\Tabulator\Undefined|null $titlePrint
     * @param int|\PChouse\Tabulator\Undefined|null $maxWidth
     * @param bool|\PChouse\Tabulator\Undefined|null $headerWordWrap
     *
     * @throws \PChouse\Tabulator\Column\ColumnDefinitionException
     */
    //phpcs:enable
    public function __construct(
        #[Translate] private string                  $title = "",
        private string|Undefined|null                $field = Undefined::UNDEFINED,
        int|null                                     $position = null,
        private bool|Undefined|null                  $visible = Undefined::UNDEFINED,
        private int|Undefined|null                   $width = Undefined::UNDEFINED,
        private ColumnDefinitionAlign|Undefined|null $hozAlign = Undefined::UNDEFINED,
        private ColumnDefinitionAlign|Undefined|null $headerHozAlign = Undefined::UNDEFINED,
        private VerticalAlign|Undefined|null         $vertAlign = Undefined::UNDEFINED,
        private int|Undefined|null                   $minWidth = Undefined::UNDEFINED,
        private float|int|Undefined|null             $widthGrow = Undefined::UNDEFINED,
        private float|int|Undefined|null             $widthShrink = Undefined::UNDEFINED,
        private Resizable|bool|Undefined|null        $resizable = Undefined::UNDEFINED,
        private bool|Undefined|null                  $frozen = Undefined::UNDEFINED,
        private int|Undefined|null                   $responsive = Undefined::UNDEFINED,
        private string|Undefined|null                $tooltip = Undefined::UNDEFINED,
        private bool|Undefined|null                  $rowHandle = Undefined::UNDEFINED,
        private Sorter|Undefined|null                $sorter = Undefined::UNDEFINED,
        private Formatter|Undefined|null             $formatter = Undefined::UNDEFINED,
        private bool|Undefined|null                  $variableHeight = Undefined::UNDEFINED,
        private bool|Undefined|null                  $editable = Undefined::UNDEFINED,
        private Editor|Undefined|null                $editor = Undefined::UNDEFINED,
        private StandardValidatorType|Undefined|null $validator = Undefined::UNDEFINED,
        private bool|Undefined|null                  $download = Undefined::UNDEFINED,
        private string|Undefined|null                $titleDownload = Undefined::UNDEFINED,
        private bool|Undefined|null                  $headerSort = Undefined::UNDEFINED,
        private SortDirection|Undefined|null         $headerSortStartingDir = Undefined::UNDEFINED,
        private bool|Undefined|null                  $headerSortTristate = Undefined::UNDEFINED,
        private bool|string|Undefined|null           $headerTooltip = Undefined::UNDEFINED,
        private bool|Flip|Undefined|null             $headerVertical = Undefined::UNDEFINED,
        private bool|Undefined|null                  $editableTitle = Undefined::UNDEFINED,
        private Formatter|Undefined|null             $titleFormatter = Undefined::UNDEFINED,
        private Editor|Undefined|null                $headerFilter = Undefined::UNDEFINED,
        private string|Undefined|null                $headerFilterPlaceholder = Undefined::UNDEFINED,
        private bool|Undefined|null                  $headerFilterLiveFilter = Undefined::UNDEFINED,
        private bool|Undefined|null                  $htmlOutput = Undefined::UNDEFINED,
        private bool|Undefined|null                  $clipboard = Undefined::UNDEFINED,
        private bool|Undefined|null                  $print = Undefined::UNDEFINED,
        private bool|Undefined|null                  $titlePrint = Undefined::UNDEFINED,
        private int|Undefined|null                   $maxWidth = Undefined::UNDEFINED,
        private bool|Undefined|null                  $headerWordWrap = Undefined::UNDEFINED,
    ) {
        $this->setPosition($position);
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     *
     * @return ColumnDefinition
     * @throws \PChouse\Tabulator\Column\ColumnDefinitionException
     */
    public function setPosition(?int $position): ColumnDefinition
    {
        if ($position !== null && $position < 1) {
            throw new ColumnDefinitionException("Column position cannot be less than one");
        }
        $this->position = $position;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return ColumnDefinition
     */
    public function setTitle(string $title): ColumnDefinition
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getField(): string|Undefined|null
    {
        return $this->field;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $field
     *
     * @return ColumnDefinition
     */
    public function setField(string|Undefined|null $field): ColumnDefinition
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getVisible(): bool|Undefined|null
    {
        return $this->visible;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $visible
     *
     * @return ColumnDefinition
     */
    public function setVisible(bool|Undefined|null $visible): ColumnDefinition
    {
        $this->visible = $visible;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getWidth(): int|Undefined|null
    {
        return $this->width;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $width
     *
     * @return ColumnDefinition
     */
    public function setWidth(int|Undefined|null $width): ColumnDefinition
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\ColumnDefinitionSorterParams|\PChouse\Tabulator\Undefined|null
     */
    public function getSorterParams(): ColumnDefinitionSorterParams|Undefined|null
    {
        return $this->sorterParams;
    }

    /**
     * @param \PChouse\Tabulator\Column\ColumnDefinitionSorterParams|\PChouse\Tabulator\Undefined|null $sorterParams
     *
     * @return ColumnDefinition
     */
    public function setSorterParams(ColumnDefinitionSorterParams|Undefined|null $sorterParams): ColumnDefinition
    {
        $this->sorterParams = $sorterParams;
        return $this;
    }

    /**
     * phpcs:ignore
     * @return \PChouse\Tabulator\Column\DateTimeParams|\PChouse\Tabulator\Column\MoneyParams|\PChouse\Tabulator\Column\TickCrossParams|\PChouse\Tabulator\Column\ToggleParams|\PChouse\Tabulator\Column\DateTimeDifferenceParams|\PChouse\Tabulator\Column\ImageParams|\PChouse\Tabulator\Column\StarRatingParams|\PChouse\Tabulator\Column\TrafficParams|\PChouse\Tabulator\Undefined|\PChouse\Tabulator\Column\ProgressBarParams|\PChouse\Tabulator\Column\LinkParams|null
     */
    // phpcs:ignore
    public function getFormatterParams(): DateTimeParams|MoneyParams|TickCrossParams|ToggleParams|DateTimeDifferenceParams|ImageParams|StarRatingParams|TrafficParams|Undefined|ProgressBarParams|LinkParams|null
    {
        return $this->formatterParams;
    }

    /**
     * phpcs:ignore
     * @param \PChouse\Tabulator\Column\DateTimeParams|\PChouse\Tabulator\Column\MoneyParams|\PChouse\Tabulator\Column\TickCrossParams|\PChouse\Tabulator\Column\ToggleParams|\PChouse\Tabulator\Column\DateTimeDifferenceParams|\PChouse\Tabulator\Column\ImageParams|\PChouse\Tabulator\Column\StarRatingParams|\PChouse\Tabulator\Column\TrafficParams|\PChouse\Tabulator\Undefined|\PChouse\Tabulator\Column\ProgressBarParams|\PChouse\Tabulator\Column\LinkParams|null $formatterParams
     *
     * @return ColumnDefinition
     */
    // phpcs:ignore
    public function setFormatterParams(DateTimeParams|MoneyParams|TickCrossParams|ToggleParams|DateTimeDifferenceParams|ImageParams|StarRatingParams|TrafficParams|Undefined|ProgressBarParams|LinkParams|null $formatterParams): ColumnDefinition
    {
        $this->formatterParams = $formatterParams;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\CheckboxParams|\PChouse\Tabulator\Column\DateTimeEditorParams|\PChouse\Tabulator\Column\TimeParams|\PChouse\Tabulator\Column\DateParams|\PChouse\Tabulator\Undefined|\PChouse\Tabulator\Column\InputParams|\PChouse\Tabulator\Column\TextAreaParams|\PChouse\Tabulator\Column\NumberParams|null
     */
    //phpcs:ignore
    public function getEditorParams(): CheckboxParams|DateTimeEditorParams|TimeParams|DateParams|Undefined|InputParams|TextAreaParams|NumberParams|null
    {
        return $this->editorParams;
    }

    /**
     * phpcs:ignore
     * @param \PChouse\Tabulator\Column\CheckboxParams|\PChouse\Tabulator\Column\DateTimeEditorParams|\PChouse\Tabulator\Column\TimeParams|\PChouse\Tabulator\Column\DateParams|\PChouse\Tabulator\Undefined|\PChouse\Tabulator\Column\InputParams|\PChouse\Tabulator\Column\TextAreaParams|\PChouse\Tabulator\Column\NumberParams|null $editorParams
     *
     * @return $this
     */
    // phpcs:ignore
    public function setEditorParams(CheckboxParams|DateTimeEditorParams|TimeParams|DateParams|Undefined|InputParams|TextAreaParams|NumberParams|null $editorParams): ColumnDefinition
    {
        $this->editorParams = $editorParams;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null
     */
    //phpcs:ignore
    public function getHozAlign(): ColumnDefinitionAlign|Undefined|null
    {
        return $this->hozAlign;
    }

    /**
     * @param \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null $hozAlign
     *
     * @return ColumnDefinition
     */
    public function setHozAlign(ColumnDefinitionAlign|Undefined|null $hozAlign): ColumnDefinition
    {
        $this->hozAlign = $hozAlign;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null
     */
    //phpcs:ignore
    public function getHeaderHozAlign(): ColumnDefinitionAlign|Undefined|null
    {
        return $this->headerHozAlign;
    }

    /**
     * @param \PChouse\Tabulator\Column\ColumnDefinitionAlign|\PChouse\Tabulator\Undefined|null $headerHozAlign
     *
     * @return ColumnDefinition
     */
    public function setHeaderHozAlign(ColumnDefinitionAlign|Undefined|null $headerHozAlign): ColumnDefinition
    {
        $this->headerHozAlign = $headerHozAlign;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\VerticalAlign|\PChouse\Tabulator\Undefined|null
     */
    public function getVertAlign(): VerticalAlign|Undefined|null
    {
        return $this->vertAlign;
    }

    /**
     * @param \PChouse\Tabulator\Column\VerticalAlign|\PChouse\Tabulator\Undefined|null $vertAlign
     *
     * @return ColumnDefinition
     */
    public function setVertAlign(VerticalAlign|Undefined|null $vertAlign): ColumnDefinition
    {
        $this->vertAlign = $vertAlign;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getMinWidth(): int|Undefined|null
    {
        return $this->minWidth;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $minWidth
     *
     * @return ColumnDefinition
     */
    public function setMinWidth(int|Undefined|null $minWidth): ColumnDefinition
    {
        $this->minWidth = $minWidth;
        return $this;
    }

    /**
     * @return float|int|\PChouse\Tabulator\Undefined|null
     */
    public function getWidthGrow(): float|int|Undefined|null
    {
        return $this->widthGrow;
    }

    /**
     * @param float|int|\PChouse\Tabulator\Undefined|null $widthGrow
     *
     * @return ColumnDefinition
     */
    public function setWidthGrow(float|int|Undefined|null $widthGrow): ColumnDefinition
    {
        $this->widthGrow = $widthGrow;
        return $this;
    }

    /**
     * @return float|int|\PChouse\Tabulator\Undefined|null
     */
    public function getWidthShrink(): float|int|Undefined|null
    {
        return $this->widthShrink;
    }

    /**
     * @param float|int|\PChouse\Tabulator\Undefined|null $widthShrink
     *
     * @return ColumnDefinition
     */
    public function setWidthShrink(float|int|Undefined|null $widthShrink): ColumnDefinition
    {
        $this->widthShrink = $widthShrink;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Column\Resizable|\PChouse\Tabulator\Undefined|null
     */
    public function getResizable(): Resizable|bool|Undefined|null
    {
        return $this->resizable;
    }

    /**
     * @param bool|\PChouse\Tabulator\Column\Resizable|\PChouse\Tabulator\Undefined|null $resizable
     *
     * @return ColumnDefinition
     */
    public function setResizable(Resizable|bool|Undefined|null $resizable): ColumnDefinition
    {
        $this->resizable = $resizable;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getFrozen(): bool|Undefined|null
    {
        return $this->frozen;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $frozen
     *
     * @return ColumnDefinition
     */
    public function setFrozen(bool|Undefined|null $frozen): ColumnDefinition
    {
        $this->frozen = $frozen;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getResponsive(): int|Undefined|null
    {
        return $this->responsive;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $responsive
     *
     * @return ColumnDefinition
     */
    public function setResponsive(int|Undefined|null $responsive): ColumnDefinition
    {
        $this->responsive = $responsive;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getTooltip(): string|Undefined|null
    {
        return $this->tooltip;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $tooltip
     *
     * @return ColumnDefinition
     */
    public function setTooltip(string|Undefined|null $tooltip): ColumnDefinition
    {
        $this->tooltip = $tooltip;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getRowHandle(): bool|Undefined|null
    {
        return $this->rowHandle;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $rowHandle
     *
     * @return ColumnDefinition
     */
    public function setRowHandle(bool|Undefined|null $rowHandle): ColumnDefinition
    {
        $this->rowHandle = $rowHandle;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\Sorter|\PChouse\Tabulator\Undefined|null
     */
    public function getSorter(): Sorter|Undefined|null
    {
        return $this->sorter;
    }

    /**
     * @param \PChouse\Tabulator\Column\Sorter|\PChouse\Tabulator\Undefined|null $sorter
     *
     * @return ColumnDefinition
     */
    public function setSorter(Sorter|Undefined|null $sorter): ColumnDefinition
    {
        $this->sorter = $sorter;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\Formatter|\PChouse\Tabulator\Undefined|null
     */
    public function getFormatter(): Formatter|Undefined|null
    {
        return $this->formatter;
    }

    /**
     * @param \PChouse\Tabulator\Column\Formatter|\PChouse\Tabulator\Undefined|null $formatter
     *
     * @return ColumnDefinition
     */
    public function setFormatter(Formatter|Undefined|null $formatter): ColumnDefinition
    {
        $this->formatter = $formatter;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getVariableHeight(): bool|Undefined|null
    {
        return $this->variableHeight;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $variableHeight
     *
     * @return ColumnDefinition
     */
    public function setVariableHeight(bool|Undefined|null $variableHeight): ColumnDefinition
    {
        $this->variableHeight = $variableHeight;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getEditable(): bool|Undefined|null
    {
        return $this->editable;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $editable
     *
     * @return ColumnDefinition
     */
    public function setEditable(bool|Undefined|null $editable): ColumnDefinition
    {
        $this->editable = $editable;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\Editor|\PChouse\Tabulator\Undefined|null
     */
    public function getEditor(): Editor|Undefined|null
    {
        return $this->editor;
    }

    /**
     * @param \PChouse\Tabulator\Column\Editor|\PChouse\Tabulator\Undefined|null $editor
     *
     * @return ColumnDefinition
     */
    public function setEditor(Editor|Undefined|null $editor): ColumnDefinition
    {
        $this->editor = $editor;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\StandardValidatorType|\PChouse\Tabulator\Undefined|null
     */
    public function getValidator(): Undefined|StandardValidatorType|null
    {
        return $this->validator;
    }

    /**
     * @param \PChouse\Tabulator\Column\StandardValidatorType|\PChouse\Tabulator\Undefined|null $validator
     *
     * @return ColumnDefinition
     */
    public function setValidator(Undefined|StandardValidatorType|null $validator): ColumnDefinition
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getDownload(): bool|Undefined|null
    {
        return $this->download;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $download
     *
     * @return ColumnDefinition
     */
    public function setDownload(bool|Undefined|null $download): ColumnDefinition
    {
        $this->download = $download;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getTitleDownload(): string|Undefined|null
    {
        return $this->titleDownload;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $titleDownload
     *
     * @return ColumnDefinition
     */
    public function setTitleDownload(string|Undefined|null $titleDownload): ColumnDefinition
    {
        $this->titleDownload = $titleDownload;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderSort(): bool|Undefined|null
    {
        return $this->headerSort;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $headerSort
     *
     * @return ColumnDefinition
     */
    public function setHeaderSort(bool|Undefined|null $headerSort): ColumnDefinition
    {
        $this->headerSort = $headerSort;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Sorter\SortDirection|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderSortStartingDir(): Undefined|SortDirection|null
    {
        return $this->headerSortStartingDir;
    }

    /**
     * @param \PChouse\Tabulator\Sorter\SortDirection|\PChouse\Tabulator\Undefined|null $headerSortStartingDir
     *
     * @return ColumnDefinition
     */
    public function setHeaderSortStartingDir(Undefined|SortDirection|null $headerSortStartingDir): ColumnDefinition
    {
        $this->headerSortStartingDir = $headerSortStartingDir;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderSortTristate(): bool|Undefined|null
    {
        return $this->headerSortTristate;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $headerSortTristate
     *
     * @return ColumnDefinition
     */
    public function setHeaderSortTristate(bool|Undefined|null $headerSortTristate): ColumnDefinition
    {
        $this->headerSortTristate = $headerSortTristate;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getHeaderTooltip(): bool|string|Undefined|null
    {
        return $this->headerTooltip;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $headerTooltip
     *
     * @return ColumnDefinition
     */
    public function setHeaderTooltip(bool|string|Undefined|null $headerTooltip): ColumnDefinition
    {
        $this->headerTooltip = $headerTooltip;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Column\Flip|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderVertical(): bool|Flip|Undefined|null
    {
        return $this->headerVertical;
    }

    /**
     * @param bool|\PChouse\Tabulator\Column\Flip|\PChouse\Tabulator\Undefined|null $headerVertical
     *
     * @return ColumnDefinition
     */
    public function setHeaderVertical(bool|Flip|Undefined|null $headerVertical): ColumnDefinition
    {
        $this->headerVertical = $headerVertical;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getEditableTitle(): bool|Undefined|null
    {
        return $this->editableTitle;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $editableTitle
     *
     * @return ColumnDefinition
     */
    public function setEditableTitle(bool|Undefined|null $editableTitle): ColumnDefinition
    {
        $this->editableTitle = $editableTitle;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\Formatter|\PChouse\Tabulator\Undefined|null
     */
    public function getTitleFormatter(): Formatter|Undefined|null
    {
        return $this->titleFormatter;
    }

    /**
     * @param \PChouse\Tabulator\Column\Formatter|\PChouse\Tabulator\Undefined|null $titleFormatter
     *
     * @return ColumnDefinition
     */
    public function setTitleFormatter(Formatter|Undefined|null $titleFormatter): ColumnDefinition
    {
        $this->titleFormatter = $titleFormatter;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\Editor|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderFilter(): Editor|Undefined|null
    {
        return $this->headerFilter;
    }

    /**
     * @param \PChouse\Tabulator\Column\Editor|\PChouse\Tabulator\Undefined|null $headerFilter
     *
     * @return ColumnDefinition
     */
    public function setHeaderFilter(Editor|Undefined|null $headerFilter): ColumnDefinition
    {
        $this->headerFilter = $headerFilter;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|string|null
     */
    public function getHeaderFilterPlaceholder(): string|Undefined|null
    {
        return $this->headerFilterPlaceholder;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|string|null $headerFilterPlaceholder
     *
     * @return ColumnDefinition
     */
    public function setHeaderFilterPlaceholder(string|Undefined|null $headerFilterPlaceholder): ColumnDefinition
    {
        $this->headerFilterPlaceholder = $headerFilterPlaceholder;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderFilterLiveFilter(): bool|Undefined|null
    {
        return $this->headerFilterLiveFilter;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $headerFilterLiveFilter
     *
     * @return ColumnDefinition
     */
    public function setHeaderFilterLiveFilter(bool|Undefined|null $headerFilterLiveFilter): ColumnDefinition
    {
        $this->headerFilterLiveFilter = $headerFilterLiveFilter;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getHtmlOutput(): bool|Undefined|null
    {
        return $this->htmlOutput;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $htmlOutput
     *
     * @return ColumnDefinition
     */
    public function setHtmlOutput(bool|Undefined|null $htmlOutput): ColumnDefinition
    {
        $this->htmlOutput = $htmlOutput;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getClipboard(): bool|Undefined|null
    {
        return $this->clipboard;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $clipboard
     *
     * @return ColumnDefinition
     */
    public function setClipboard(bool|Undefined|null $clipboard): ColumnDefinition
    {
        $this->clipboard = $clipboard;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getPrint(): bool|Undefined|null
    {
        return $this->print;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $print
     *
     * @return ColumnDefinition
     */
    public function setPrint(bool|Undefined|null $print): ColumnDefinition
    {
        $this->print = $print;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getTitlePrint(): bool|Undefined|null
    {
        return $this->titlePrint;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $titlePrint
     *
     * @return ColumnDefinition
     */
    public function setTitlePrint(bool|Undefined|null $titlePrint): ColumnDefinition
    {
        $this->titlePrint = $titlePrint;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getMaxWidth(): int|Undefined|null
    {
        return $this->maxWidth;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $maxWidth
     *
     * @return ColumnDefinition
     */
    public function setMaxWidth(int|Undefined|null $maxWidth): ColumnDefinition
    {
        $this->maxWidth = $maxWidth;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getHeaderWordWrap(): bool|Undefined|null
    {
        return $this->headerWordWrap;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $headerWordWrap
     *
     * @return ColumnDefinition
     */
    public function setHeaderWordWrap(bool|Undefined|null $headerWordWrap): ColumnDefinition
    {
        $this->headerWordWrap = $headerWordWrap;
        return $this;
    }
}

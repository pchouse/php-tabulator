<?php
declare(strict_types=1);

namespace PChouse\Tabulator;

use PChouse\Tabulator\Column\CheckboxParams;
use PChouse\Tabulator\Column\ColumnCalc;
use PChouse\Tabulator\Column\ColumnDefinition;
use PChouse\Tabulator\Column\ColumnDefinitionSorterParams;
use PChouse\Tabulator\Column\DateParams;
use PChouse\Tabulator\Column\DateTimeDifferenceParams;
use PChouse\Tabulator\Column\DateTimeEditorParams;
use PChouse\Tabulator\Column\DateTimeParams;
use PChouse\Tabulator\Column\ImageParams;
use PChouse\Tabulator\Column\InputParams;
use PChouse\Tabulator\Column\Layout;
use PChouse\Tabulator\Column\LinkParams;
use PChouse\Tabulator\Column\MoneyParams;
use PChouse\Tabulator\Column\NumberParams;
use PChouse\Tabulator\Column\ProgressBarParams;
use PChouse\Tabulator\Column\ResponsiveLayout;
use PChouse\Tabulator\Column\ScrollToColumnPosition;
use PChouse\Tabulator\Column\StarRatingParams;
use PChouse\Tabulator\Column\TextAreaParams;
use PChouse\Tabulator\Column\TickCrossParams;
use PChouse\Tabulator\Column\TimeParams;
use PChouse\Tabulator\Column\TrafficParams;
use PChouse\Tabulator\Column\VerticalAlign;
use PChouse\Tabulator\Config\Config;
use PChouse\Tabulator\Sorter\Sorter;
use PChouse\Tabulator\Sorter\SortMode;

/**
 * @noinspection all
 */

#[\Attribute(\Attribute::TARGET_CLASS)]
class Options extends OptionsJson
{


    /**
     * @var \PChouse\Tabulator\Sorter\Sorter[]|\PChouse\Tabulator\Undefined|null
     */
    private array|Undefined|null $initialSort = Undefined::UNDEFINED;

    /**
     * The column definitions are provided to Tabulator in the columns property of the
     * table constructor object and should take the format of
     * an array of objects, with each object representing the configuration of one column.
     *
     * @var \PChouse\Tabulator\Column\ColumnDefinition[]|\PChouse\Tabulator\Undefined|null
     */
    private array|Undefined|null $columns = Undefined::UNDEFINED;

    /**
     * @var \PChouse\Tabulator\KeyBinding|false|\PChouse\Tabulator\Undefined|null
     */
    private KeyBinding|false|Undefined|null $keybindings = Undefined::UNDEFINED;

    // phpcs:disable
    /**
     * @param string|int|\PChouse\Tabulator\Undefined|null                                       $index                                 A unique index value should be present for each row of data if you want to be able to programmatically alter that data at a later point, this should be either numeric or a string. By default, Tabulator will look for this value in the id field for the data. If you wish to use a different field as the index, set this using the index option parameter.
     * @param array|null|\PChouse\Tabulator\Undefined                                            $data                                  Array to hold data that should be loaded on table creation.
     * @param \PChouse\Tabulator\ImportFormat|\PChouse\Tabulator\Undefined|null                  $importFormat
     * @param \PChouse\Tabulator\ImportReader|\PChouse\Tabulator\Undefined|null                  $importReader                          By default, Tabulator will read in the file as plain text, which is the format used by all the builtin importers. If you need to read the file data in a different format then you can use the importReader option to instruct the file reader to read in the file in a different format.
     * @param bool|null                                                                          $autoTables
     * @param string|\PChouse\Tabulator\Undefined|null                                           $ajaxURL                               If you wish to retrieve your data from a remote source you can set the URL for the request in the ajaxURL option.
     * @param array|\PChouse\Tabulator\Undefined|null                                            $ajaxParams                            Parameters to be passed to remote Ajax data loading request.
     * @param \PChouse\Tabulator\AjaxContentType|\PChouse\Tabulator\Undefined|null               $ajaxContentType                       When using a request method other than "GET" Tabulator will send any parameters with a content type of form data. You can change the content type with the ajaxContentType option. This will ensure parameters are sent in the format you expect, with the correct headers.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $ajaxFiltering                         Send filter config to server instead of processing locally
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $ajaxSorting                           Send sorter config to server instead of processing locally
     * @param \PChouse\Tabulator\ProgressiveLoad|\PChouse\Tabulator\Undefined|null               $progressiveLoad                       There are two different progressive loading modes, to give you a choice of how data is loaded into the table.
     * @param int|\PChouse\Tabulator\Undefined|null                                              $progressiveLoadDelay                  By default, tabulator will make the requests to fill the table as quickly as possible. On some servers these repeats requests from the same client may trigger rate limiting or security systems. In this case you can use the ajaxProgressiveLoadDelay option to add a delay in milliseconds between each page request.
     * @param int|\PChouse\Tabulator\Undefined|null                                              $progressiveLoadScrollMargin           The ajaxProgressiveLoadScrollMargin property determines how close to the bottom of the table in pixels, the scroll bar must be before the next page worth of data is loaded, by default it is set to twice the height of the table.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $ajaxLoader                            Show loader while data is loading
     * @param string|\PChouse\Tabulator\Undefined|null                                           $ajaxLoaderLoading                     html for loader element.
     * @param string|\PChouse\Tabulator\Undefined|null                                           $ajaxLoaderError                       html for the loader element in the event of an error.
     * @param bool|null                                                                          $dataLoader
     * @param bool|null                                                                          $dataLoaderError
     * @param int|null                                                                           $dataLoaderErrorTimeout
     * @param \PChouse\Tabulator\Sorter\SortMode|null                                            $sortMode
     * @param \PChouse\Tabulator\Sorter\SortMode|null                                            $filterMode
     * @param bool|null                                                                          $pagination
     * @param \PChouse\Tabulator\Sorter\SortMode|null                                            $paginationMode
     * @param int|\PChouse\Tabulator\Undefined|null                                              $paginationSize                        Set the number of rows in each page.
     * @param bool|array<int|string>|\PChouse\Tabulator\Undefined|null                           $paginationSizeSelector                Setting this option to true will cause Tabulator to create a list of page size options, that are multiples of the current page size, ex: [5, 10, 20, 50, 100].
     * @param \PChouse\Tabulator\PaginationAddRow|\PChouse\Tabulator\Undefined|null              $paginationAddRow                      When using the addRow function on a paginated table, rows will be added relative to the current page (ie to the top or bottom of the current page), with overflowing rows being shifted onto the next page.
     * @param int|\PChouse\Tabulator\Undefined|null                                              $paginationButtonCount                 The number of pagination page buttons shown in the footer using the paginationButtonCount option. By default, this has a value of 5.
     * @param int|\PChouse\Tabulator\Undefined|null                                              $paginationInitialPage
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $sortOrderReverse                      Reverse the order that multiple sorters are applied to the table.
     * @param \PChouse\Tabulator\HeaderSortClickElement|null                                     $headerSortClickElement
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $autoColumns                           If you set the autoColumns option to true, every time data is loaded into the table through the data option or through the setData function, Tabulator will examine the first row of the data and build columns to match that data.
     * @param \PChouse\Tabulator\Column\Layout|\PChouse\Tabulator\Undefined|null                 $layout                                By default, Tabulator will use the fitData layout mode, which will resize the tables columns to fit the data held in each column, unless you specify a width or minWidth in the column constructor. If the width of all columns exceeds the width of the containing element, a scroll bar will appear.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $layoutColumnsOnNewData                To keep the layout of the columns consistent, once the column widths have been set on the first data load (either from the data property in the constructor or the setData function) they will not be changed when new data is loaded.
     *                                                                                                                                  If you prefer that the column widths adjust to the data each time you load it into the table you can set the layoutColumnsOnNewData property to true.
     * @param \PChouse\Tabulator\Column\ResponsiveLayout|bool|\PChouse\Tabulator\Undefined|null  $responsiveLayout                      Responsive layout will automatically hide/show columns to fit the width of the Tabulator element. This allows for clean rendering of tables on smaller mobile devices, showing important data while avoiding horizontal scroll bars. You can enable responsive layouts using the responsiveLayout option.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $responsiveLayoutCollapseStartOpen     Collapsed lists are displayed to the user by default, if you would prefer they start closed so the user can open them you can use the responsiveLayoutCollapseStartOpen option.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $responsiveLayoutCollapseUseFormatters By default, any formatter set on the column is applied to the value that will appear in the list. while this works for most formatters it can cause issues with the progress formatter which relies on being inside a cell.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $movableColumns                        To allow the user to move columns along the table
     * @param \PChouse\Tabulator\Column\VerticalAlign|\PChouse\Tabulator\Undefined|null          $columnHeaderVertAlign                 You can use the columnHeaderVertAlign option to set how the text in your column headers should be vertically.
     * @param \PChouse\Tabulator\Column\ScrollToColumnPosition|\PChouse\Tabulator\Undefined|null $scrollToColumnPosition                The default ScrollTo position can be set using the scrollToColumnPosition option.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $scrollToColumnIfVisible               The default option for triggering a ScrollTo on a visible element can be set using the scrollToColumnIfVisible option.
     * @param \PChouse\Tabulator\Column\ColumnCalc|bool|\PChouse\Tabulator\Undefined|null        $columnCalcs                           By default, column calculations are shown at the top and bottom of the table
     * @param string|bool|\PChouse\Tabulator\Undefined|null                                      $nestedFieldSeparator                  If you need to use the . character as part of your field name, you can change the separator to any other character using the nestedFieldSeparator option
     *                                                                                                                                  Set false to disable nested data parsing
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $columnHeaderSortMulti                 multiple or single column sorting
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $headerSort                            The headerSort option can now be set in the table options to affect all columns as well as in column definitions.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $resizableColumnFit
     * @param string|int|false|\PChouse\Tabulator\Undefined|null                                 $height                                Sets the height of the containing element, can be set to any valid height css value. If set to false (the default), the height of the table will resize to fit the table data.
     * @param string|int|\PChouse\Tabulator\Undefined|null                                       $maxHeight                             Can be set to any valid CSS value. By setting this you can allow your table to expand to fit the data, but not overflow its parent element. When there are too many rows to fit in the available space, the vertical scroll bar will be shown. This has the added benefit of improving load times on larger tables
     * @param string|int|\PChouse\Tabulator\Undefined|null                                       $minHeight                             With a variable table height you can set the minimum height of the table either defined in the min-height CSS property for the element or set it using the minHeight option in the table constructor, this can be set to any valid CSS value.
     * @param \PChouse\Tabulator\RenderMode|\PChouse\Tabulator\Undefined                         $renderVertical
     * @param \PChouse\Tabulator\RenderMode|\PChouse\Tabulator\Undefined                         $renderHorizontal
     * @param int|null                                                                           $rowHeight
     * @param bool|int|\PChouse\Tabulator\Undefined|null                                         $renderVerticalBuffer                  Manually set the size of the virtual DOM buffer.
     * @param string|null                                                                        $placeholder                           Placeholder element to display on empty table.
     * @param string|null                                                                        $placeholderHeaderFilter
     * @param string|null                                                                        $footerElement                         Footer  element to display for the table.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $reactiveData                          The reactivity systems allow Tabulator to watch arrays and objects passed into the table for changes and then automatically update the table.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $autoResize                            Tabulator will automatically attempt to redraw the data contained in the table if the containing element for the table is resized. To disable this functionality, set the autoResize property to false.
     * @param bool|\PChouse\Tabulator\Undefined|null                                             $invalidOptionWarnings                 Setting the invalidOptionWarnings option to false will disable console warning messages for invalid properties in the table constructor and column definition object.
     * @param \PChouse\Tabulator\ValidationMode|\PChouse\Tabulator\Undefined|null                $validationMode                        There are now three different validation modes available to customize the validation experience
     * @param \PChouse\Tabulator\TextDirection|\PChouse\Tabulator\Undefined|null                 $textDirection
     * @param bool|int|\PChouse\Tabulator\SelectableRows|\PChouse\Tabulator\Undefined            $selectableRows                        false - selectable rows are disabled; true - selectable rows are enabled, and you can select as many as you want; integer - any integer value, this sets the maximum number of rows that can be selected (when the maximum number of selected rows is exceeded, the first selected row will be deselected to allow the next row to be selected). "highlight" (default) - rows have the same hover styling as selectable rows but do not change state when clicked. This is great for when you want to show that a row is clickable but don't want it to be selectable.
     * @param \PChouse\Tabulator\SelectableRowsRangeMode|\PChouse\Tabulator\Undefined            $selectableRowsRangeMode               By default, you can select a range of rows by holding down the shift key and click dragging over a number of rows to toggle the selected state of all rows the cursor passes over. If you preferred to select a range of row by clicking on the first row then holding down shift and clicking on the end row then you can achieve this by setting the selectableRowsRangeMode to click
     * @param bool|\PChouse\Tabulator\Undefined                                                  $selectableRowsRollingSelection        By default, row selection works on a rolling basis, if you set the selectableRows option to a numeric value then when you select past this number of rows, the first row to be selected will be deselected. If you want to disable this behaviour and instead prevent selection of new rows once the limit is reached you can set the selectableRowsRollingSelection option to false.
     * @param bool|\PChouse\Tabulator\Undefined                                                  $selectableRowsPersistence             By default, Tabulator will maintain selected rows when the table is filtered, sorted or paginated (but NOT when the setData function is used). If you want the selected rows to be cleared whenever the table view is updated then set the selectableRowsPersistence option to false.
     * @param int|\PChouse\Tabulator\Undefined                                                   $headerFilterLiveFilterDelay           By default, Tabulator will wait 300 milliseconds after a keystroke before triggering the filter
     *
     * @throws \PChouse\Tabulator\TabulatorException
     */
    // phpcs:enable
    public function __construct(
        //<editor-fold desc="OptionsData">
        private string|int|Undefined|null             $index = Undefined::UNDEFINED,
        private array|Undefined|null                  $data = Undefined::UNDEFINED,
        private ImportFormat|Undefined|null           $importFormat = Undefined::UNDEFINED,
        private ImportReader|Undefined|null           $importReader = Undefined::UNDEFINED,
        private bool|null                             $autoTables = null,
        private string|Undefined|null                 $ajaxURL = Undefined::UNDEFINED,
        private array|Undefined|null                  $ajaxParams = Undefined::UNDEFINED,
        private AjaxContentType|Undefined|null        $ajaxContentType = Undefined::UNDEFINED,
        private bool|Undefined|null                   $ajaxFiltering = Undefined::UNDEFINED,
        private bool|Undefined|null                   $ajaxSorting = Undefined::UNDEFINED,
        private ProgressiveLoad|Undefined|null        $progressiveLoad = Undefined::UNDEFINED,
        private int|Undefined|null                    $progressiveLoadDelay = Undefined::UNDEFINED,
        private int|Undefined|null                    $progressiveLoadScrollMargin = Undefined::UNDEFINED,
        private bool|Undefined|null                   $ajaxLoader = Undefined::UNDEFINED,
        private string|Undefined|null                 $ajaxLoaderLoading = Undefined::UNDEFINED,
        private string|Undefined|null                 $ajaxLoaderError = Undefined::UNDEFINED,
        private bool|null                             $dataLoader = null,
        private bool|null                             $dataLoaderError = null,
        private int|null                              $dataLoaderErrorTimeout = null,
        private SortMode|null                         $sortMode = null,
        private SortMode|null                         $filterMode = null,
        //</editor-fold>
        //<editor-fold desc="OptionsPagination">
        private bool|null                             $pagination = null,
        private SortMode|null                         $paginationMode = null,
        private int|Undefined|null                    $paginationSize = Undefined::UNDEFINED,
        private bool|array|Undefined|null             $paginationSizeSelector = Undefined::UNDEFINED,
        private PaginationAddRow|Undefined|null       $paginationAddRow = Undefined::UNDEFINED,
        private int|Undefined|null                    $paginationButtonCount = Undefined::UNDEFINED,
        private int|Undefined|null                    $paginationInitialPage = Undefined::UNDEFINED,
        //</editor-fold>
        //<editor-fold desc="OptionsSorting">
        private bool|Undefined|null                   $sortOrderReverse = Undefined::UNDEFINED,
        private HeaderSortClickElement|null           $headerSortClickElement = null,
        //</editor-fold>
        //<editor-fold desc="OptionsColumns">
        private bool|Undefined|null                   $autoColumns = Undefined::UNDEFINED,
        private Layout|Undefined|null                 $layout = Undefined::UNDEFINED,
        private bool|Undefined|null                   $layoutColumnsOnNewData = Undefined::UNDEFINED,
        private ResponsiveLayout|bool|Undefined|null  $responsiveLayout = Undefined::UNDEFINED,
        private bool|Undefined|null                   $responsiveLayoutCollapseStartOpen = Undefined::UNDEFINED,
        private bool|Undefined|null                   $responsiveLayoutCollapseUseFormatters = Undefined::UNDEFINED,
        private bool|Undefined|null                   $movableColumns = Undefined::UNDEFINED,
        private VerticalAlign|Undefined|null          $columnHeaderVertAlign = Undefined::UNDEFINED,
        private ScrollToColumnPosition|Undefined|null $scrollToColumnPosition = Undefined::UNDEFINED,
        private bool|Undefined|null                   $scrollToColumnIfVisible = Undefined::UNDEFINED,
        private ColumnCalc|bool|Undefined|null        $columnCalcs = Undefined::UNDEFINED,
        private string|bool|Undefined|null            $nestedFieldSeparator = Undefined::UNDEFINED,
        private bool|Undefined|null                   $columnHeaderSortMulti = Undefined::UNDEFINED,
        private bool|Undefined|null                   $headerSort = Undefined::UNDEFINED,
        private bool|Undefined|null                   $resizableColumnFit = Undefined::UNDEFINED,
        //</editor-fold>
        //<editor-fold desc="OptionsGeneral">
        private string|int|false|Undefined|null       $height = Undefined::UNDEFINED,
        private string|int|Undefined|null             $maxHeight = Undefined::UNDEFINED,
        private string|int|Undefined|null             $minHeight = Undefined::UNDEFINED,
        private RenderMode|Undefined                  $renderVertical = Undefined::UNDEFINED,
        private RenderMode|Undefined                  $renderHorizontal = Undefined::UNDEFINED,
        private int|null                              $rowHeight = null,
        private bool|int|Undefined|null               $renderVerticalBuffer = Undefined::UNDEFINED,
        #[Translate] private string|null              $placeholder = null,
        private string|null                           $placeholderHeaderFilter = null,
        private string|null                           $footerElement = null,
        private bool|Undefined|null                   $reactiveData = Undefined::UNDEFINED,
        private bool|Undefined|null                   $autoResize = Undefined::UNDEFINED,
        private bool|Undefined|null                   $invalidOptionWarnings = Undefined::UNDEFINED,
        private ValidationMode|Undefined|null         $validationMode = Undefined::UNDEFINED,
        private TextDirection|Undefined|null          $textDirection = Undefined::UNDEFINED,
        //</editor-fold>
        //<editor-fold desc="RowSelection>"
        private bool|int|SelectableRows|Undefined     $selectableRows = Undefined::UNDEFINED,
        private SelectableRowsRangeMode|Undefined     $selectableRowsRangeMode = Undefined::UNDEFINED,
        private bool|Undefined                        $selectableRowsRollingSelection = Undefined::UNDEFINED,
        private bool|Undefined                        $selectableRowsPersistence = Undefined::UNDEFINED,
        private int|Undefined                         $headerFilterLiveFilterDelay = Undefined::UNDEFINED
        //</editor-fold>
    ) {
        if (\is_int($selectableRows) && $selectableRows < 0) {
            throw new TabulatorException("selectable rows cannot be negative integer");
        }
    }

    //<editor-fold desc="OptionsData">

    /**
     * A unique index value should be present for each row of data if you want to be able to programmatically alter
     * that data at a later point, this should be either numeric or a string.
     * By default, Tabulator will look for this value in the id field for the data.
     * If you wish to use a different field as the index, set this using the index option parameter.
     *
     * @return int|string|\PChouse\Tabulator\Undefined|null
     */
    public function getIndex(): int|string|Undefined|null
    {
        return $this->index;
    }

    /**
     * A unique index value should be present for each row of data if you want to be able to programmatically alter
     * that data at a later point, this should be either numeric or a string.
     * By default, Tabulator will look for this value in the id field for the data.
     * If you wish to use a different field as the index, set this using the index option parameter.
     *
     * @param int|string|\PChouse\Tabulator\Undefined|null $index
     *
     * @return $this
     */
    public function setIndex(int|string|Undefined|null $index): Options
    {
        $this->index = $index;
        return $this;
    }

    /**
     * Array to hold data that should be loaded on table creation.
     *
     * @return array|\PChouse\Tabulator\Undefined|null
     */
    public function getData(): array|Undefined|null
    {
        return $this->data;
    }

    /**
     * Array to hold data that should be loaded on table creation.
     *
     * @param array|\PChouse\Tabulator\Undefined|null $data
     *
     * @return $this
     */
    public function setData(array|Undefined|null $data): Options
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\ImportFormat|\PChouse\Tabulator\Undefined|null
     */
    public function getImportFormat(): ImportFormat|Undefined|null
    {
        return $this->importFormat;
    }

    /**
     * @param \PChouse\Tabulator\ImportFormat|\PChouse\Tabulator\Undefined|null $importFormat
     *
     * @return $this
     */
    public function setImportFormat(ImportFormat|Undefined|null $importFormat): Options
    {
        $this->importFormat = $importFormat;
        return $this;
    }

    /**
     * By default, Tabulator will read in the file as plain text,
     * which is the format used by all the builtin importers.
     * If you need to read the file data in a different format then you can use the importReader
     * option to instruct the file reader to read in the file in a different format.
     *
     * @return \PChouse\Tabulator\ImportReader|\PChouse\Tabulator\Undefined|null
     */
    public function getImportReader(): ImportReader|Undefined|null
    {
        return $this->importReader;
    }

    /**
     * By default, Tabulator will read in the file as plain text,
     * which is the format used by all the builtin importers.
     * If you need to read the file data in a different format then you can use the importReader
     * option to instruct the file reader to read in the file in a different format.
     *
     * @param \PChouse\Tabulator\ImportReader|\PChouse\Tabulator\Undefined|null $importReader
     *
     * @return $this
     */
    public function setImportReader(ImportReader|Undefined|null $importReader): Options
    {
        $this->importReader = $importReader;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAutoTables(): ?bool
    {
        return $this->autoTables;
    }

    /**
     * @param bool|null $autoTables
     *
     * @return $this
     */
    public function setAutoTables(?bool $autoTables): Options
    {
        $this->autoTables = $autoTables;
        return $this;
    }

    /**
     * If you wish to retrieve your data from a remote source you can set the URL for the request in the ajaxURL option.
     *
     * @return string|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxURL(): string|Undefined|null
    {
        return $this->ajaxURL;
    }

    /**
     * If you wish to retrieve your data from a remote source you can set the URL for the request in the ajaxURL option.
     *
     * @param string|\PChouse\Tabulator\Undefined|null $ajaxURL
     *
     * @return $this
     */
    public function setAjaxURL(string|Undefined|null $ajaxURL): Options
    {
        $this->ajaxURL = $ajaxURL;
        return $this;
    }

    /**
     * Parameters to be passed to remote Ajax data loading request.
     *
     * @return array|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxParams(): array|Undefined|null
    {
        return $this->ajaxParams;
    }

    /**
     * Parameters to be passed to remote Ajax data loading request.
     *
     * @param array|\PChouse\Tabulator\Undefined|null $ajaxParams
     *
     * @return $this
     */
    public function setAjaxParams(array|Undefined|null $ajaxParams): Options
    {
        $this->ajaxParams = $ajaxParams;
        return $this;
    }

    /**
     * When using a request method other than "GET" Tabulator will send any parameters with a content type of form data.
     * You can change the content type with the ajaxContentType option.
     * This will ensure parameters are sent in the format you expect, with the correct headers.
     *
     * @return \PChouse\Tabulator\AjaxContentType|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxContentType(): AjaxContentType|Undefined|null
    {
        return $this->ajaxContentType;
    }

    /**
     * When using a request method other than "GET" Tabulator will send any parameters with a content type of form data.
     * You can change the content type with the ajaxContentType option.
     * This will ensure parameters are sent in the format you expect, with the correct headers.
     *
     * @param \PChouse\Tabulator\AjaxContentType|\PChouse\Tabulator\Undefined|null $ajaxContentType
     *
     * @return $this
     */
    public function setAjaxContentType(AjaxContentType|Undefined|null $ajaxContentType): Options
    {
        $this->ajaxContentType = $ajaxContentType;
        return $this;
    }

    /**
     * Send filter config to server instead of processing locally
     *
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxFiltering(): bool|Undefined|null
    {
        return $this->ajaxFiltering;
    }

    /**
     * Send filter config to server instead of processing locally
     *
     * @param bool|\PChouse\Tabulator\Undefined|null $ajaxFiltering
     *
     * @return $this
     */
    public function setAjaxFiltering(bool|Undefined|null $ajaxFiltering): Options
    {
        $this->ajaxFiltering = $ajaxFiltering;
        return $this;
    }

    /**
     * Send sorter config to server instead of processing locally
     *
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxSorting(): bool|Undefined|null
    {
        return $this->ajaxSorting;
    }

    /**
     * Send sorter config to server instead of processing locally
     *
     * @param bool|\PChouse\Tabulator\Undefined|null $ajaxSorting
     *
     * @return $this
     */
    public function setAjaxSorting(bool|Undefined|null $ajaxSorting): Options
    {
        $this->ajaxSorting = $ajaxSorting;
        return $this;
    }

    /**
     * There are two different progressive loading modes, to give you a choice of how data is loaded into the table.
     *
     * @return \PChouse\Tabulator\ProgressiveLoad|\PChouse\Tabulator\Undefined|null
     */
    public function getProgressiveLoad(): ProgressiveLoad|Undefined|null
    {
        return $this->progressiveLoad;
    }

    /**
     * There are two different progressive loading modes, to give you a choice of how data is loaded into the table.
     *
     * @param \PChouse\Tabulator\ProgressiveLoad|\PChouse\Tabulator\Undefined|null $progressiveLoad
     *
     * @return $this
     */
    public function setProgressiveLoad(ProgressiveLoad|Undefined|null $progressiveLoad): Options
    {
        $this->progressiveLoad = $progressiveLoad;
        return $this;
    }

    /**
     * By default, tabulator will make the requests to fill the table as quickly as possible.
     * On some servers these repeats requests from the same client may trigger rate limiting or security systems.
     * In this case you can use the ajaxProgressiveLoadDelay option to add a delay in milliseconds
     * between each page request.
     *
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getProgressiveLoadDelay(): int|Undefined|null
    {
        return $this->progressiveLoadDelay;
    }

    /**
     * By default, tabulator will make the requests to fill the table as quickly as possible.
     * On some servers these repeats requests from the same client may trigger rate limiting or security systems.
     * In this case you can use the ajaxProgressiveLoadDelay option to add a delay in milliseconds
     * between each page request.
     *
     * @param int|\PChouse\Tabulator\Undefined|null $progressiveLoadDelay
     *
     * @return $this
     */
    public function setProgressiveLoadDelay(int|Undefined|null $progressiveLoadDelay): Options
    {
        $this->progressiveLoadDelay = $progressiveLoadDelay;
        return $this;
    }

    /**
     * The ajaxProgressiveLoadScrollMargin property determines how close to the bottom of the table in pixels,
     * the scroll bar must be before the next page worth of data is loaded,
     * by default it is set to twice the height of the table.
     *
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getProgressiveLoadScrollMargin(): int|Undefined|null
    {
        return $this->progressiveLoadScrollMargin;
    }

    /**
     * The ajaxProgressiveLoadScrollMargin property determines how close to the bottom of the table in pixels,
     * the scroll bar must be before the next page worth of data is loaded,
     * by default it is set to twice the height of the table.
     *
     * @param int|\PChouse\Tabulator\Undefined|null $progressiveLoadScrollMargin
     *
     * @return $this
     */
    public function setProgressiveLoadScrollMargin(int|Undefined|null $progressiveLoadScrollMargin): Options
    {
        $this->progressiveLoadScrollMargin = $progressiveLoadScrollMargin;
        return $this;
    }

    /**
     * Show loader while data is loading
     *
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxLoader(): bool|Undefined|null
    {
        return $this->ajaxLoader;
    }

    /**
     * Show loader while data is loading
     *
     * @param bool|\PChouse\Tabulator\Undefined|null $ajaxLoader
     *
     * @return $this
     */
    public function setAjaxLoader(bool|Undefined|null $ajaxLoader): Options
    {
        $this->ajaxLoader = $ajaxLoader;
        return $this;
    }

    /**
     * html for loader element.
     *
     * @return string|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxLoaderLoading(): string|Undefined|null
    {
        return $this->ajaxLoaderLoading;
    }

    /**
     * html for loader element.
     *
     * @param string|\PChouse\Tabulator\Undefined|null $ajaxLoaderLoading
     *
     * @return $this
     */
    public function setAjaxLoaderLoading(string|Undefined|null $ajaxLoaderLoading): Options
    {
        $this->ajaxLoaderLoading = $ajaxLoaderLoading;
        return $this;
    }

    /**
     * html for the loader element in the event of an error.
     *
     * @return string|\PChouse\Tabulator\Undefined|null
     */
    public function getAjaxLoaderError(): string|Undefined|null
    {
        return $this->ajaxLoaderError;
    }

    /**
     * html for the loader element in the event of an error.
     *
     * @param string|\PChouse\Tabulator\Undefined|null $ajaxLoaderError
     *
     * @return $this
     */
    public function setAjaxLoaderError(string|Undefined|null $ajaxLoaderError): Options
    {
        $this->ajaxLoaderError = $ajaxLoaderError;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDataLoader(): ?bool
    {
        return $this->dataLoader;
    }

    /**
     * @param bool|null $dataLoader
     *
     * @return $this
     */
    public function setDataLoader(?bool $dataLoader): Options
    {
        $this->dataLoader = $dataLoader;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDataLoaderError(): ?bool
    {
        return $this->dataLoaderError;
    }

    /**
     * @param bool|null $dataLoaderError
     *
     * @return $this
     */
    public function setDataLoaderError(?bool $dataLoaderError): Options
    {
        $this->dataLoaderError = $dataLoaderError;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDataLoaderErrorTimeout(): ?int
    {
        return $this->dataLoaderErrorTimeout;
    }

    /**
     * @param int|null $dataLoaderErrorTimeout
     *
     * @return $this
     */
    public function setDataLoaderErrorTimeout(?int $dataLoaderErrorTimeout): Options
    {
        $this->dataLoaderErrorTimeout = $dataLoaderErrorTimeout;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Sorter\SortMode|null
     */
    public function getSortMode(): ?SortMode
    {
        return $this->sortMode;
    }

    /**
     * @param \PChouse\Tabulator\Sorter\SortMode|null $sortMode
     *
     * @return $this
     */
    public function setSortMode(?SortMode $sortMode): Options
    {
        $this->sortMode = $sortMode;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Sorter\SortMode|null
     */
    public function getFilterMode(): ?SortMode
    {
        return $this->filterMode;
    }

    /**
     * @param \PChouse\Tabulator\Sorter\SortMode|null $filterMode
     *
     * @return $this
     */
    public function setFilterMode(?SortMode $filterMode): Options
    {
        $this->filterMode = $filterMode;
        return $this;
    }

    //</editor-fold>
    //<editor-fold desc="OptionsPagination">

    /**
     * @return bool|null
     */
    public function getPagination(): ?bool
    {
        return $this->pagination;
    }

    /**
     * @param bool|null $pagination
     *
     * @return Options
     */
    public function setPagination(?bool $pagination): Options
    {
        $this->pagination = $pagination;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Sorter\SortMode|null
     */
    public function getPaginationMode(): ?SortMode
    {
        return $this->paginationMode;
    }

    /**
     * @param \PChouse\Tabulator\Sorter\SortMode|null $paginationMode
     *
     * @return Options
     */
    public function setPaginationMode(?SortMode $paginationMode): Options
    {
        $this->paginationMode = $paginationMode;
        return $this;
    }

    /**
     * Set the number of rows in each page.
     *
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getPaginationSize(): int|Undefined|null
    {
        return $this->paginationSize;
    }

    /**
     * Set the number of rows in each page.
     *
     * @param int|\PChouse\Tabulator\Undefined|null $paginationSize
     *
     * @return Options
     */
    public function setPaginationSize(int|Undefined|null $paginationSize): Options
    {
        $this->paginationSize = $paginationSize;
        return $this;
    }

    /**
     * Setting this option to true will cause Tabulator to create a list of page size options,
     * that are multiples of the current page size, ex: [5, 10, 20, 50, 100].
     *
     * @return array|bool|\PChouse\Tabulator\Undefined|null
     */
    public function getPaginationSizeSelector(): bool|array|Undefined|null
    {
        return $this->paginationSizeSelector;
    }

    /**
     * Setting this option to true will cause Tabulator to create a list of page size options,
     * that are multiples of the current page size, ex: [5, 10, 20, 50, 100].
     *
     * @param array|bool|\PChouse\Tabulator\Undefined|null $paginationSizeSelector
     *
     * @return Options
     */
    public function setPaginationSizeSelector(bool|array|Undefined|null $paginationSizeSelector): Options
    {
        $this->paginationSizeSelector = $paginationSizeSelector;
        return $this;
    }

    /**
     * When using the addRow function on a paginated table,
     * rows will be added relative to the current page (ie to the top or bottom of the current page),
     * with overflowing rows being shifted onto the next page.
     *
     * @return \PChouse\Tabulator\PaginationAddRow|\PChouse\Tabulator\Undefined|null
     */
    public function getPaginationAddRow(): PaginationAddRow|Undefined|null
    {
        return $this->paginationAddRow;
    }

    /**
     * When using the addRow function on a paginated table,
     * rows will be added relative to the current page (ie to the top or bottom of the current page),
     * with overflowing rows being shifted onto the next page.
     *
     * @param \PChouse\Tabulator\PaginationAddRow|\PChouse\Tabulator\Undefined|null $paginationAddRow
     *
     * @return Options
     */
    public function setPaginationAddRow(PaginationAddRow|Undefined|null $paginationAddRow): Options
    {
        $this->paginationAddRow = $paginationAddRow;
        return $this;
    }

    /**
     * The number of pagination page buttons shown in the footer using the paginationButtonCount option.
     * By default, this has a value of 5.
     *
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getPaginationButtonCount(): int|Undefined|null
    {
        return $this->paginationButtonCount;
    }

    /**
     * The number of pagination page buttons shown in the footer using the paginationButtonCount option.
     * By default, this has a value of 5.
     *
     * @param int|\PChouse\Tabulator\Undefined|null $paginationButtonCount
     *
     * @return Options
     */
    public function setPaginationButtonCount(int|Undefined|null $paginationButtonCount): Options
    {
        $this->paginationButtonCount = $paginationButtonCount;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|null
     */
    public function getPaginationInitialPage(): int|Undefined|null
    {
        return $this->paginationInitialPage;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|null $paginationInitialPage
     *
     * @return Options
     */
    public function setPaginationInitialPage(int|Undefined|null $paginationInitialPage): Options
    {
        $this->paginationInitialPage = $paginationInitialPage;
        return $this;
    }

    //</editor-fold>
    //<editor-fold desc="OptionsSorting">

    /**
     * @return \PChouse\Tabulator\Sorter\Sorter[]|\PChouse\Tabulator\Undefined|null
     */
    public function getInitialSort(): array|Undefined|null
    {
        return $this->initialSort;
    }

    /**
     * @param array|\PChouse\Tabulator\Undefined|null $initialSort
     *
     * @return Options
     */
    public function setInitialSort(array|Undefined|null $initialSort): Options
    {
        $this->initialSort = $initialSort;
        return $this;
    }

    /**
     * Reverse the order that multiple sorters are applied to the table.
     *
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getSortOrderReverse(): bool|Undefined|null
    {
        return $this->sortOrderReverse;
    }

    /**
     * Reverse the order that multiple sorters are applied to the table.
     *
     * @param bool|\PChouse\Tabulator\Undefined|null $sortOrderReverse
     *
     * @return Options
     */
    public function setSortOrderReverse(bool|Undefined|null $sortOrderReverse): Options
    {
        $this->sortOrderReverse = $sortOrderReverse;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\HeaderSortClickElement|null
     */
    public function getHeaderSortClickElement(): ?HeaderSortClickElement
    {
        return $this->headerSortClickElement;
    }

    /**
     * @param \PChouse\Tabulator\HeaderSortClickElement|null $headerSortClickElement
     *
     * @return Options
     */
    public function setHeaderSortClickElement(?HeaderSortClickElement $headerSortClickElement): Options
    {
        $this->headerSortClickElement = $headerSortClickElement;
        return $this;
    }

    //</editor-fold>
    //<editor-fold desc="OptionsColumns">

    /**
     * @return array|\PChouse\Tabulator\Undefined|null
     */
    public function getColumns(): array|Undefined|null
    {
        return $this->columns;
    }

    /**
     * @param array|\PChouse\Tabulator\Undefined|null $columns
     *
     * @return Options
     */
    public function setColumns(array|Undefined|null $columns): Options
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAutoColumns(): bool|Undefined|null
    {
        return $this->autoColumns;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $autoColumns
     *
     * @return Options
     */
    public function setAutoColumns(bool|Undefined|null $autoColumns): Options
    {
        $this->autoColumns = $autoColumns;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\Layout|\PChouse\Tabulator\Undefined|null
     */
    public function getLayout(): Layout|Undefined|null
    {
        return $this->layout;
    }

    /**
     * @param \PChouse\Tabulator\Column\Layout|\PChouse\Tabulator\Undefined|null $layout
     *
     * @return Options
     */
    public function setLayout(Layout|Undefined|null $layout): Options
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getLayoutColumnsOnNewData(): bool|Undefined|null
    {
        return $this->layoutColumnsOnNewData;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $layoutColumnsOnNewData
     *
     * @return Options
     */
    public function setLayoutColumnsOnNewData(bool|Undefined|null $layoutColumnsOnNewData): Options
    {
        $this->layoutColumnsOnNewData = $layoutColumnsOnNewData;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Column\ResponsiveLayout|\PChouse\Tabulator\Undefined|null
     */
    public function getResponsiveLayout(): bool|Undefined|ResponsiveLayout|null
    {
        return $this->responsiveLayout;
    }

    /**
     * @param bool|\PChouse\Tabulator\Column\ResponsiveLayout|\PChouse\Tabulator\Undefined|null $responsiveLayout
     *
     * @return Options
     */
    public function setResponsiveLayout(bool|Undefined|ResponsiveLayout|null $responsiveLayout): Options
    {
        $this->responsiveLayout = $responsiveLayout;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getResponsiveLayoutCollapseStartOpen(): bool|Undefined|null
    {
        return $this->responsiveLayoutCollapseStartOpen;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $responsiveLayoutCollapseStartOpen
     *
     * @return Options
     */
    public function setResponsiveLayoutCollapseStartOpen(
        bool|Undefined|null $responsiveLayoutCollapseStartOpen
    ): Options {
        $this->responsiveLayoutCollapseStartOpen = $responsiveLayoutCollapseStartOpen;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getResponsiveLayoutCollapseUseFormatters(): bool|Undefined|null
    {
        return $this->responsiveLayoutCollapseUseFormatters;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $responsiveLayoutCollapseUseFormatters
     *
     * @return Options
     */
    public function setResponsiveLayoutCollapseUseFormatters(
        bool|Undefined|null $responsiveLayoutCollapseUseFormatters
    ): Options {
        $this->responsiveLayoutCollapseUseFormatters = $responsiveLayoutCollapseUseFormatters;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getMovableColumns(): bool|Undefined|null
    {
        return $this->movableColumns;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $movableColumns
     *
     * @return Options
     */
    public function setMovableColumns(bool|Undefined|null $movableColumns): Options
    {
        $this->movableColumns = $movableColumns;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\VerticalAlign|\PChouse\Tabulator\Undefined|null
     */
    public function getColumnHeaderVertAlign(): VerticalAlign|Undefined|null
    {
        return $this->columnHeaderVertAlign;
    }

    /**
     * @param \PChouse\Tabulator\Column\VerticalAlign|\PChouse\Tabulator\Undefined|null $columnHeaderVertAlign
     *
     * @return Options
     */
    public function setColumnHeaderVertAlign(VerticalAlign|Undefined|null $columnHeaderVertAlign): Options
    {
        $this->columnHeaderVertAlign = $columnHeaderVertAlign;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Column\ScrollToColumnPosition|\PChouse\Tabulator\Undefined|null
     */
    public function getScrollToColumnPosition(): ScrollToColumnPosition|Undefined|null
    {
        return $this->scrollToColumnPosition;
    }

    /**
     * @param \PChouse\Tabulator\Column\ScrollToColumnPosition|\PChouse\Tabulator\Undefined|null $scrollToColumnPosition
     *
     * @return Options
     */
    public function setScrollToColumnPosition(ScrollToColumnPosition|Undefined|null $scrollToColumnPosition): Options
    {
        $this->scrollToColumnPosition = $scrollToColumnPosition;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getScrollToColumnIfVisible(): bool|Undefined|null
    {
        return $this->scrollToColumnIfVisible;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $scrollToColumnIfVisible
     *
     * @return Options
     */
    public function setScrollToColumnIfVisible(bool|Undefined|null $scrollToColumnIfVisible): Options
    {
        $this->scrollToColumnIfVisible = $scrollToColumnIfVisible;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Column\ColumnCalc|\PChouse\Tabulator\Undefined|null
     */
    public function getColumnCalcs(): ColumnCalc|bool|Undefined|null
    {
        return $this->columnCalcs;
    }

    /**
     * @param bool|\PChouse\Tabulator\Column\ColumnCalc|\PChouse\Tabulator\Undefined|null $columnCalcs
     *
     * @return Options
     */
    public function setColumnCalcs(ColumnCalc|bool|Undefined|null $columnCalcs): Options
    {
        $this->columnCalcs = $columnCalcs;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|string|null
     */
    public function getNestedFieldSeparator(): bool|string|Undefined|null
    {
        return $this->nestedFieldSeparator;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|string|null $nestedFieldSeparator
     *
     * @return Options
     */
    public function setNestedFieldSeparator(bool|string|Undefined|null $nestedFieldSeparator): Options
    {
        $this->nestedFieldSeparator = $nestedFieldSeparator;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getColumnHeaderSortMulti(): bool|Undefined|null
    {
        return $this->columnHeaderSortMulti;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $columnHeaderSortMulti
     *
     * @return Options
     */
    public function setColumnHeaderSortMulti(bool|Undefined|null $columnHeaderSortMulti): Options
    {
        $this->columnHeaderSortMulti = $columnHeaderSortMulti;
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
     * @return Options
     */
    public function setHeaderSort(bool|Undefined|null $headerSort): Options
    {
        $this->headerSort = $headerSort;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getResizableColumnFit(): bool|Undefined|null
    {
        return $this->resizableColumnFit;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $resizableColumnFit
     *
     * @return Options
     */
    public function setResizableColumnFit(bool|Undefined|null $resizableColumnFit): Options
    {
        $this->resizableColumnFit = $resizableColumnFit;
        return $this;
    }

    //</editor-fold>
    //<editor-fold desc="OptionsGeneral">

    /**
     * @return false|\PChouse\Tabulator\KeyBinding|\PChouse\Tabulator\Undefined|null
     */
    public function getKeybindings(): false|KeyBinding|Undefined|null
    {
        return $this->keybindings;
    }

    /**
     * @param false|\PChouse\Tabulator\KeyBinding|\PChouse\Tabulator\Undefined|null $keybindings
     *
     * @return Options
     */
    public function setKeybindings(false|KeyBinding|Undefined|null $keybindings): Options
    {
        $this->keybindings = $keybindings;
        return $this;
    }

    /**
     * @return false|int|\PChouse\Tabulator\Undefined|string|null
     */
    public function getHeight(): false|int|string|Undefined|null
    {
        return $this->height;
    }

    /**
     * @param false|int|\PChouse\Tabulator\Undefined|string|null $height
     *
     * @return Options
     */
    public function setHeight(false|int|string|Undefined|null $height): Options
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|string|null
     */
    public function getMaxHeight(): int|string|Undefined|null
    {
        return $this->maxHeight;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|string|null $maxHeight
     *
     * @return Options
     */
    public function setMaxHeight(int|string|Undefined|null $maxHeight): Options
    {
        $this->maxHeight = $maxHeight;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined|string|null
     */
    public function getMinHeight(): int|string|Undefined|null
    {
        return $this->minHeight;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined|string|null $minHeight
     *
     * @return Options
     */
    public function setMinHeight(int|string|Undefined|null $minHeight): Options
    {
        $this->minHeight = $minHeight;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\RenderMode|\PChouse\Tabulator\Undefined
     */
    public function getRenderVertical(): RenderMode|Undefined
    {
        return $this->renderVertical;
    }

    /**
     * @param \PChouse\Tabulator\RenderMode|\PChouse\Tabulator\Undefined $renderVertical
     *
     * @return Options
     */
    public function setRenderVertical(RenderMode|Undefined $renderVertical): Options
    {
        $this->renderVertical = $renderVertical;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\RenderMode|\PChouse\Tabulator\Undefined
     */
    public function getRenderHorizontal(): RenderMode|Undefined
    {
        return $this->renderHorizontal;
    }

    /**
     * @param \PChouse\Tabulator\RenderMode|\PChouse\Tabulator\Undefined $renderHorizontal
     *
     * @return Options
     */
    public function setRenderHorizontal(RenderMode|Undefined $renderHorizontal): Options
    {
        $this->renderHorizontal = $renderHorizontal;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRowHeight(): ?int
    {
        return $this->rowHeight;
    }

    /**
     * @param int|null $rowHeight
     *
     * @return Options
     */
    public function setRowHeight(?int $rowHeight): Options
    {
        $this->rowHeight = $rowHeight;
        return $this;
    }

    /**
     * @return bool|int|\PChouse\Tabulator\Undefined|null
     */
    public function getRenderVerticalBuffer(): bool|int|Undefined|null
    {
        return $this->renderVerticalBuffer;
    }

    /**
     * @param bool|int|\PChouse\Tabulator\Undefined|null $renderVerticalBuffer
     *
     * @return Options
     */
    public function setRenderVerticalBuffer(bool|int|Undefined|null $renderVerticalBuffer): Options
    {
        $this->renderVerticalBuffer = $renderVerticalBuffer;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param string|null $placeholder
     *
     * @return Options
     */
    public function setPlaceholder(?string $placeholder): Options
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlaceholderHeaderFilter(): ?string
    {
        return $this->placeholderHeaderFilter;
    }

    /**
     * @param string|null $placeholderHeaderFilter
     *
     * @return Options
     */
    public function setPlaceholderHeaderFilter(?string $placeholderHeaderFilter): Options
    {
        $this->placeholderHeaderFilter = $placeholderHeaderFilter;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFooterElement(): ?string
    {
        return $this->footerElement;
    }

    /**
     * @param string|null $footerElement
     *
     * @return Options
     */
    public function setFooterElement(?string $footerElement): Options
    {
        $this->footerElement = $footerElement;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getReactiveData(): bool|Undefined|null
    {
        return $this->reactiveData;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $reactiveData
     *
     * @return Options
     */
    public function setReactiveData(bool|Undefined|null $reactiveData): Options
    {
        $this->reactiveData = $reactiveData;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getAutoResize(): bool|Undefined|null
    {
        return $this->autoResize;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $autoResize
     *
     * @return Options
     */
    public function setAutoResize(bool|Undefined|null $autoResize): Options
    {
        $this->autoResize = $autoResize;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined|null
     */
    public function getInvalidOptionWarnings(): bool|Undefined|null
    {
        return $this->invalidOptionWarnings;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined|null $invalidOptionWarnings
     *
     * @return Options
     */
    public function setInvalidOptionWarnings(bool|Undefined|null $invalidOptionWarnings): Options
    {
        $this->invalidOptionWarnings = $invalidOptionWarnings;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\Undefined|\PChouse\Tabulator\ValidationMode|null
     */
    public function getValidationMode(): ValidationMode|Undefined|null
    {
        return $this->validationMode;
    }

    /**
     * @param \PChouse\Tabulator\Undefined|\PChouse\Tabulator\ValidationMode|null $validationMode
     *
     * @return Options
     */
    public function setValidationMode(ValidationMode|Undefined|null $validationMode): Options
    {
        $this->validationMode = $validationMode;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\TextDirection|\PChouse\Tabulator\Undefined|null
     */
    public function getTextDirection(): TextDirection|Undefined|null
    {
        return $this->textDirection;
    }

    /**
     * @param \PChouse\Tabulator\TextDirection|\PChouse\Tabulator\Undefined|null $textDirection
     *
     * @return Options
     */
    public function setTextDirection(TextDirection|Undefined|null $textDirection): Options
    {
        $this->textDirection = $textDirection;
        return $this;
    }

    /**
     * @return bool|int|\PChouse\Tabulator\SelectableRows|\PChouse\Tabulator\Undefined
     */
    public function getSelectableRows(): SelectableRows|bool|int|Undefined
    {
        return $this->selectableRows;
    }

    /**
     * @param bool|int|\PChouse\Tabulator\SelectableRows|\PChouse\Tabulator\Undefined $selectableRows
     *
     * @return Options
     * @throws \PChouse\Tabulator\TabulatorException
     */
    public function setSelectableRows(SelectableRows|bool|int|Undefined $selectableRows): Options
    {
        if (\is_int($selectableRows) && $selectableRows < 0) {
            throw new TabulatorException("selectable rows cannot be negative integer");
        }
        $this->selectableRows = $selectableRows;
        return $this;
    }

    /**
     * @return \PChouse\Tabulator\SelectableRowsRangeMode|\PChouse\Tabulator\Undefined
     */
    public function getSelectableRowsRangeMode(): SelectableRowsRangeMode|Undefined
    {
        return $this->selectableRowsRangeMode;
    }

    /**
     * @param \PChouse\Tabulator\SelectableRowsRangeMode|\PChouse\Tabulator\Undefined $selectableRowsRangeMode
     *
     * @return Options
     */
    public function setSelectableRowsRangeMode(SelectableRowsRangeMode|Undefined $selectableRowsRangeMode): Options
    {
        $this->selectableRowsRangeMode = $selectableRowsRangeMode;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined
     */
    public function getSelectableRowsRollingSelection(): bool|Undefined
    {
        return $this->selectableRowsRollingSelection;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined $selectableRowsRollingSelection
     *
     * @return Options
     */
    public function setSelectableRowsRollingSelection(bool|Undefined $selectableRowsRollingSelection): Options
    {
        $this->selectableRowsRollingSelection = $selectableRowsRollingSelection;
        return $this;
    }

    /**
     * @return bool|\PChouse\Tabulator\Undefined
     */
    public function getSelectableRowsPersistence(): bool|Undefined
    {
        return $this->selectableRowsPersistence;
    }

    /**
     * @param bool|\PChouse\Tabulator\Undefined $selectableRowsPersistence
     *
     * @return Options
     */
    public function setSelectableRowsPersistence(bool|Undefined $selectableRowsPersistence): Options
    {
        $this->selectableRowsPersistence = $selectableRowsPersistence;
        return $this;
    }

    /**
     * @return int|\PChouse\Tabulator\Undefined
     */
    public function getHeaderFilterLiveFilterDelay(): int|Undefined
    {
        return $this->headerFilterLiveFilterDelay;
    }

    /**
     * @param int|\PChouse\Tabulator\Undefined $headerFilterLiveFilterDelay
     *
     * @return Options
     */
    public function setHeaderFilterLiveFilterDelay(int|Undefined $headerFilterLiveFilterDelay): Options
    {
        $this->headerFilterLiveFilterDelay = $headerFilterLiveFilterDelay;
        return $this;
    }

    //</editor-fold>

    /**
     * Parse all Tabulator attributes.
     * If after parse the option set programmatically change between requests
     * do not use cache, or clear teh cache before parse in the request that change
     *
     * @param \ReflectionClass                   $attachedClass
     * @param \PChouse\Tabulator\Translator|null $translator
     *
     * @return \PChouse\Tabulator\Options|\PChouse\Tabulator\OptionsJson If exists in cache it will return OptionJson
     * @throws \PChouse\Tabulator\TabulatorParserException
     */
    public static function parse(\ReflectionClass $attachedClass, Translator|null $translator): Options|OptionsJson
    {

        if (Config::instance()->getCache()?->cacheExist($attachedClass) === true) {
            $options = new OptionsJson();
            $options->setAttachedReflectionClass($attachedClass);
            return $options;
        }

        $optionsAttributes = $attachedClass->getAttributes(Options::class);

        $count = \count($optionsAttributes);

        if ($count === 0) {
            throw new TabulatorParserException("No options attribute in class " . $attachedClass->getName());
        }

        if ($count > 1) {
            throw new TabulatorParserException(
                "Only 1 options attribute is allow, but more than one found in class " . $attachedClass->getName()
            );
        }

        /**
         * @var \PChouse\Tabulator\Options $options
         */
        $options = $optionsAttributes[0]->newInstance();
        $options->setAttachedReflectionClass($attachedClass);
        $options->setTranslator($translator);
        $options->parseInitialSort($attachedClass);
        $options->parseKeyBinding($attachedClass);
        $options->parseColumns($attachedClass);
        return $options;
    }

    /**
     * Parse The TabulatorInitialSort attributes
     *
     * @param \ReflectionClass $attachedClass
     *
     * @return void
     */
    public function parseInitialSort(\ReflectionClass $attachedClass): void
    {
        $sortersAttribute = $attachedClass->getAttributes(Sorter::class);
        if (\count($sortersAttribute) === 0) {
            return;
        }
        if (!\is_array($this->initialSort)) {
            $this->initialSort = [];
        }
        foreach ($sortersAttribute as $sorter) {
            $this->initialSort[] = $sorter->newInstance();
        }
    }

    /**
     * Parse the TabulatorKyBinding attributes
     *
     * @param \ReflectionClass $attachedClass
     *
     * @return void
     */
    public function parseKeyBinding(\ReflectionClass $attachedClass): void
    {
        $keyBindings = $attachedClass->getAttributes(KeyBinding::class);
        if (\count($keyBindings) > 0) {
            $this->keybindings = $keyBindings[0]->newInstance();
        }
    }

    /**
     * Parse the TabulatorColumns attributes
     *
     * @param \ReflectionClass $attachedClass
     *
     * @return void
     * @throws \PChouse\Tabulator\TabulatorParserException
     */
    public function parseColumns(\ReflectionClass $attachedClass): void
    {
        $propertiesReflection = $attachedClass->getProperties();
        $index                = null;

        foreach ($propertiesReflection as $property) {
            $columnAttributes = $property->getAttributes(ColumnDefinition::class);

            if (\count($columnAttributes) === 0) {
                continue;
            }

            /**
             * @var ColumnDefinition $columnDefinition
             */
            $columnDefinition = $columnAttributes[0]->newInstance();
            $columnDefinition->setTranslator($this->getTranslator());

            if ($columnDefinition->getField() === Undefined::UNDEFINED) {
                $columnDefinition->setField($property->getName());
            }

            if ($columnDefinition->getTitle() === "" && \is_string($columnDefinition->getField())) {
                $columnDefinition->setTitle(
                    $columnDefinition->getField()
                );
            }

            $definitionSorterParamsAttributes = $property->getAttributes(ColumnDefinitionSorterParams::class);
            if (\count($definitionSorterParamsAttributes) > 0) {
                $columnDefinition->setSorterParams(
                    $definitionSorterParamsAttributes[0]->newInstance()
                );
            }

            $sorterAttributes = $property->getAttributes(Sorter::class);
            if (\count($sorterAttributes) > 0) {
                /**
                 * @var Sorter $sorter
                 */
                $sorter = $sorterAttributes[0]->newInstance();
                if ($columnDefinition->getField() === null || $columnDefinition->getField() === Undefined::UNDEFINED) {
                    $sorter->setColumn($property->getName());
                } else {
                    $sorter->setColumn($columnDefinition->getField());
                }

                $sorters = \is_array($this->getInitialSort()) ? $this->getInitialSort() : [];

                $sorters[] = $sorter;
                $this->setInitialSort($sorters);
            }

            $indexAttributes = $property->getAttributes(Index::class);
            if (\count($indexAttributes) > 0) {
                if ($index !== null) {
                    throw new TabulatorParserException("More than one filed marked as index");
                }
                $this->setIndex($property->getName());
                $index = $this->getIndex();
            }

            $formatterParametersAttributesClass = [
                MoneyParams::class,
                ImageParams::class,
                LinkParams::class,
                DateTimeParams::class,
                DateTimeDifferenceParams::class,
                TickCrossParams::class,
                TrafficParams::class,
                ProgressBarParams::class,
                StarRatingParams::class,
            ];

            foreach ($formatterParametersAttributesClass as $formatterAttributeName) {
                $formatterParametersAttributes = $property->getAttributes($formatterAttributeName);
                if (\count($formatterParametersAttributes) > 0) {
                    /**
                     * phpcs:ignore
                     * @var MoneyParams|ImageParams|LinkParams|DateTimeParams|DateTimeDifferenceParams|TickCrossParams|TrafficParams|ProgressBarParams|StarRatingParams $formatterParameters
                     */
                    $formatterParameters = $formatterParametersAttributes[0]->newInstance();
                    $formatterParameters->setTranslator($this->getTranslator());
                    $columnDefinition->setFormatterParams($formatterParameters);
                    break;
                }
            }

            $editorParametersAttributesClass = [
                NumberParams::class,
                CheckboxParams::class,
                InputParams::class,
                TextAreaParams::class,
                DateParams::class,
                TimeParams::class,
                DateTimeEditorParams::class
            ];

            foreach ($editorParametersAttributesClass as $editorParameterName) {
                $editorParametersAttributes = $property->getAttributes($editorParameterName);
                if (\count($editorParametersAttributes) > 0) {
                    /**
                     * phpcs:ignore
                     * @var NumberParams|CheckboxParams|InputParams|TextAreaParams|DateParams|TimeParams|DateTimeEditorParams $editorParameters
                     */
                    $editorParameters = $definitionSorterParamsAttributes[0]->newInstance();
                    $editorParameters->setTranslator($this->getTranslator());
                    $columnDefinition->setEditorParams($editorParameters);
                    break;
                }
            }

            if (!\is_array($this->columns)) {
                $this->columns = [];
            }

            $this->columns[] = $columnDefinition;
        }
    }

    /**
     * Get the JSON string of tabulator options
     *
     * @return string
     * @throws \PChouse\Tabulator\TabulatorJsonException
     * @throws \PChouse\Tabulator\Cache\CacheException
     */
    public function toJson(): string
    {

        $this->orderColumnPosition();

        if (false === $json = \json_encode($this)) {
            throw new TabulatorJsonException("Error generation json string");
        }

        $jsonSanitized = \str_replace(
            "\"" . (Undefined::UNDEFINED)->value . "\"",
            (Undefined::UNDEFINED)->value,
            $json
        );

        if ($this->getAttachedReflectionClass() !== null) {
            Config::instance()->getCache()?->putInCache($this->getAttachedReflectionClass(), $jsonSanitized);
        }

        return $jsonSanitized;
    }

    /**
     * Order the columns by position
     *
     * @return void
     */
    public function orderColumnPosition(): void
    {
        $columns = $this->getColumns();
        if (!\is_array($columns)) {
            return;
        }

        $newPosition = [];

        /**
         * @var ColumnDefinition $column
         */
        foreach ($columns as $column) {
            if ($column->getPosition() === null) {
                $newPosition[] = $column;
                continue;
            }

            $position = $column->getPosition() - 1;

            if (!\array_key_exists($position, $newPosition)) {
                $newPosition[$position] = $column;
                \ksort($newPosition);
                continue;
            }

            $newPosition = \array_values($newPosition);
            \ksort($newPosition);

            \array_splice($newPosition, $position, 0, [$column]);
        }

        $this->setColumns(\array_values($newPosition));
    }
}

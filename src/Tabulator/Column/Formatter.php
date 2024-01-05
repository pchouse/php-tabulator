<?php
declare(strict_types=1);

namespace PChouse\Tabulator\Column;

enum Formatter: string
{

    case PLAINTEXT           = "plaintext";
    case TEXTAREA            = "textarea";
    case HTML                = "html";
    case MONEY               = "money";
    case IMAGE               = "image";
    case DATETIME            = "datetime";
    case DATETIME_DIFF       = "datetimediff";
    case LINK                = "link";
    case TICK_CROSS          = "tickCross";
    case COLOR               = "color";
    case STAR                = "star";
    case TRAFFIC             = "traffic";
    case PROGRESS            = "progress";
    case LOOKUP              = "lookup";
    case BUTTON_TICK         = "buttonTick";
    case BUTTON_CROSS        = "buttonCross";
    case ROW_NUM             = "rownum";
    case HANDLE              = "handle";
    case ROW_SELECTION       = "rowSelection";
    case RESPONSIVE_COLLAPSE = "responsiveCollapse";
}

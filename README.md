# PChouse tabulator 

--- 

##### A PHP json options generator to Tabulator.js

####  Install 

```bash 
composer require pchouse/php-tabulator
``` 
This library is to generate the json options of Tabulator
using metadata declared in the PHP object class, 
using the PHP attributes in the class and properties.

#### Usage

The object:

```php
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
```

In the  HTML/javascript/typescript
```html
<html lang="en">
<head>
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>
    <title></title>
</head>
<body>

<div id="tabulator"></div>

<script type="text/javascript">
    window.onload = async function(){

        let fetchOptions = await fetch("http://localhost:8080/TabulatorOptions.php");
        let options = await fetchOptions.json();

        // set more options if needed
        // options.data = [];

        new Tabulator("#tabulator", options);
    };
</script>

</body>
</html>
```

Handle the tabulator options request 
```php
<?php
require_once "../../../vendor/autoload.php";

try {
    $options = \PChouse\Tabulator\Options::parse(
        new \ReflectionClass(\PChouse\Resources\Tabulator::class),
        new \PChouse\Resources\Translator()
    );

    if ($options instanceof \PChouse\Tabulator\Options) {
		// Set options programmatically
		// $options->set????  
	}
    
    $json = $options->toJson();

    \header("Content-Type: application/json; charset=UTF-8");
    echo $json;
} catch (\Throwable $e) {
    echo $e->getMessage();
}
```
--- 
License

Copyright 2023 Reflexão, Sistemas e Estudos Informáticos, Lda

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
documentation files (the "Software"), to deal in the Software without restriction,
including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or
substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR
THE USE OR OTHER DEALINGS IN THE SOFTWARE.

--- 

##### Art made by a Joseon Chinnampo soul for smart people 🇰🇷

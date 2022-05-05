<?php

namespace App\View\Components\Datatable;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class ColumnType extends Component
{
    public string $color = 'dark';

    public string $columnName = '';

    const REPLACER = '${$bootstrap_color}';

    protected static array $bootstrapColors = [
        'danger',
        'dark',
        'warning',
        'primary',
        'success',
        'info',
        'secondary'
    ];

    public string $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $columns, string $type,string $class = 'badge badge-${$bootstrap_color}')
    {
        $this->buildColumn($columns,$type,$class);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $properties = get_object_vars($this);

        return view('components.datatable.column-type',$properties);
    }

    /**
     * @throws \Throwable
     */
    protected function buildColumn(array $columns, string $type,string $class)
    {
        $available_types = implode(', ',array_keys($columns));

        throw_unless(array_search($type,array_keys($columns)) !== false,new \Exception("passed {$type} should be exist in {$available_types}"));

        foreach ($columns as $array_value) {
            throw_unless(in_array($array_value,static::$bootstrapColors),new \Exception("$array_value not supported bootstrap color"));
        }

        $this->color = $columns[$type];

        $this->columnName = $type;

        $this->buildClass($class);
    }

    protected function buildClass(string $class)
    {
        $this->class = str_replace(static::REPLACER,$this->color,$class);
    }
}

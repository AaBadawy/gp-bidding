<?php

namespace App\DataTables;

use App\DataTables\UsersDatatable\{AdminDataTable,VendorDataTable,ClientDataTable};
use App\Models\User;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

abstract class UserDataTable
{

    public static function make(string $type)
    {
        return match($type) {
            'admin'     => (new AdminDataTable()),
            'vendor'    => (new VendorDataTable()),
            'client'    => (new ClientDataTable())
        };
    }
}

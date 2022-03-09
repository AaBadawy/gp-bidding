<?php

namespace App\traits;

use App\Models\User;
use Prophecy\Exception\Doubler\MethodNotFoundException;

trait UserType
{

    protected static $ADMIN     = 'admin';
    protected static $VENDOR    = 'vendor';
    protected static $CLIENT    = 'client';

    public function typeIs(string $type):bool
    {
        $this->ensureTypeExist($type);

        return $this->type == $type;
    }

    private function ensureTypeExist(string $type):bool
    {
        return in_array($type,[self::$ADMIN,self::$VENDOR,self::$CLIENT]) ?: throw new \Exception("Unhandled user type");
    }

    public function isVendor()
    {
        return $this->typeIs(self::$VENDOR);
    }
    public function isAdmin()
    {
        return $this->typeIs(self::$ADMIN);
    }

    public function isClient()
    {
        return $this->typeIs(self::$CLIENT);
    }
}

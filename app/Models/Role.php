<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    const ROLE_SUPER_ADMIN = 'super admin';
    const ROLE_MEMBER = 'default admin';
    const ROLE_CUSTOMER = 'customer';
    const ROLE_SHIPPER = 'shipper';
}

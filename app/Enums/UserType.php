<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static Writer()
 * @method static static User()
 */
final class UserType extends Enum
{
    const Admin =   0;
    const Writer =   1;
    const User = 2;
}

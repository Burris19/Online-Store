<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
      protected $table = 'cards';

      protected $fillable = [
          'card_number',
          'last4',
          'expiration_date',
          'brand'
      ];
}

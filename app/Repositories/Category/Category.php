<?php

namespace App\Repositories\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
      protected $table = 'categories';

      protected $fillable = [
          'code',
          'title',
          'description',
          'image'
      ];




}

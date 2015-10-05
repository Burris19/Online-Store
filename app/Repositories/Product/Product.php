<?php

namespace App\Repositories\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

        protected $table = 'products';

        protected $fillable = [
            'id_category',
            'id_provider',
            'title',
            'description',
            'code',
            'price',
            'image',
            'existence'
        ];

        public $relations = [
            'category',
            'provider'
        ];

        // Relations
        public function category()
        {
            return $this->hasOne('App\Repositories\Category\Category' , 'id' , 'id_category');
        }

        public function provider()
        {
            return $this->hasOne('App\Repositories\Provider\Provider' , 'id' , 'id_provider');
        }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local_restaurant extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'local_restaurants';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $fillable = ['category_id','category_slug','template_type','resturant_title','resturant_arabic_title','resturant_image','resturant_food_type','resturant_ratting','resturant_speciality','resturant_area','resturant_avg_cost_pp','resturant_lunch_or_dinner','resturant_description'];
}

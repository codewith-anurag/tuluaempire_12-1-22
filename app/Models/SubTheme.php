<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Theme;

class SubTheme extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subthemes';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $fillable = ['theme_id','theme_slug',"title","subtheme_slug","image","description","status"];

    public function get_theme($theme_id){
        $theme = Theme::where('id',$theme_id)->first();
        return $theme;
    }
}

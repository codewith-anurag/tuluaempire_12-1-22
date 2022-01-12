<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;

class SubPackage extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subpackages';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $fillable = ['package_id','packge_slug','subpackage_title','subpackge_slug','description'];

    public function get_package($package_id="")
    {
        return Package::where('id',$package_id)->first();

        //return $this->belongsTo(Package::class, 'package_id', 'id');

    }
}

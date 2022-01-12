<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubPackage;

class SubPackageSlider extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subpackagesliders';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $fillable = ['subpackage_id','subpackage_slug','image'];

    public function get_subpackage($subpackage_id="")
    {
        return SubPackage::where('id',$subpackage_id)->first();

        //return $this->belongsTo(Package::class, 'package_id', 'id');

    }
}

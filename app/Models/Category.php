<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function products()
    {
        return $this->hasMany(Category::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    public function isParent()
    {
        return $this->category_id == null ? true : false;
    }
    public function isChild()
    {
        return $this->category_id == null ? false : true;
    }
    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function childs()
    {
        return $this->hasMany(Category::class,'category_id');
    }
}

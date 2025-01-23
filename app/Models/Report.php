<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'date',
        'start_time',
        'end_time',
        'name',
        'location',
        'workDescription',
        'machine',
        'fuel',
    ];

    protected $dates = [
        'deleted_at',
    ];

    /**
     * created_atを日本時間で渡す
     *
     * @param [type] $value
     * @return void
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Tokyo')->format('m月d日');
    }

    /**
     * start_time, end_timeをH:iの表記に変更
     *
     * @return Attribute
     */
    protected function startTime():Attribute
    {
        return Attribute::get(fn ($value) => Carbon::parse($value)->format('H:i'));
    }

    protected function endTime():Attribute
    {
        return Attribute::get(fn ($value) => Carbon::parse($value)->format('H:i'));
    }
}

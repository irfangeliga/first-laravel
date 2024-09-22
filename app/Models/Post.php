<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
  use HasFactory;
  protected $fillable = ["penulis_id", "category_id", "judul", "waktu", "sinopsis"];
  protected $with = ['Category', 'Penulis'];

  public function Penulis(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function Category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function scopeJudul(Builder $query, $filter): void
  {
    $query->when($filter->search ?? false, function ($query, $filter) {
      $query->where('judul', "like", "%" . $filter . "%");
    });
    // $query->where('judul', "like", "%" . request('search') . "%");
  }

  public function scopePenulisId(Builder $query): void
  {
    $query->when(request('search') ?? false, function ($query) {
      $query->whereHas("penulis", function ($query) {
        $query->where("name", "like", "%" . request('search') . "%");
      });
    });
  }

  public function scopeCategoryId(Builder $query): void
  {
    $query->when(request('search') ?? false, function ($query) {
      $query->whereHas("category", function ($query) {
        $query->where("name", "like", "%" . request('search') . "%");
      });
    });
  }
}

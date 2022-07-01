<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  use HasFactory;

  /*
  | Query the listings and refine by those which match a tag or search
  | parameter given in the URL
  |
  | Acts on the laravel filter() method - see controller
  */
  public function scopeFilter($query, array $filters) {
    // Filter by tag
    if($filters['tag'] ?? false) {
      $query->where('tags', 'like', '%' . request('tag') . '%');
    }

    // Filter by search
    if($filters['search'] ?? false) {
      $query->where('title', 'like', '%' . request('search') . '%')
        ->orWhere('description', 'like', '%' . request('search') . '%')
        ->orWhere('tags', 'like', '%' . request('search') . '%');
    }
  }
}

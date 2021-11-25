<?php

namespace App\Filters;

class ProductFilter extends QueryFilter {
    public function category_id($id) {
        if (empty($id)) {
            return $this->builder
                ->where('id', '!=', null);
        } else {
            return $this->builder
                ->whereIn('category_id', $id);
        }
    }

    public function price($price) {
        return $this->builder
            ->whereBetween('price', [$price[0], $price[1]]);
    }

    public function color($color) {
        return $this->builder
            ->where('color', '=', $color[0]);
    }

    public function size($size) {
        return $this->builder
            ->where('size', '=', $size[0]);
    }
}

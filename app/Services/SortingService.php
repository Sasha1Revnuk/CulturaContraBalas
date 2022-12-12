<?php
/**
 * Created by PhpStorm.
 * User: Isit 5
 * Date: 25.11.2020
 * Time: 12:51
 */

namespace App\Services;


class SortingService
{
    public function sort( array $ids, array $ranges, $element )
    {
        $elements = $element::all();
        $unique = array_unique($ranges);
    
        $duplicates = array_diff_assoc($ranges, $unique);
        if(count($duplicates)) {
            foreach ($duplicates as $rangesKey => $rangesValue) {
                foreach (range((int)$rangesValue, $element::max( 'sort' ) + 1) as $key => $elemSort) {
                    $tempElem = $elements->where('sort', $elemSort)->first();
                    if($tempElem) {
                        continue;
                    }
                    
                    $ranges[$rangesKey] = $elemSort;
                }
            }
        }
        
        
        sort( $ranges );
        $count = 0;
        foreach ( $ids as $id ) {
            $block = $element::find( (int)$id );
            $block->sort = $ranges[$count];
            $block->save();
            $count++;
        }
    }
}

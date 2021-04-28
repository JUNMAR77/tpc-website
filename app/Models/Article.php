<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const ARTICLE_TYPE = [
        '1' => 'News',
        '2' => 'Event'
    ];
    const ARTICLE_TYPE_DESIGN = [
        '1' => 'bg-red color-palette',
        '2' => 'bg-green-active color-palette'
    ];

    const ARTICLE_STATUS = [
        '0' => 'Deleted',
        '1' => 'Published',
        '2' => 'Draft',
        '3' => 'Archived'
    ];
    const ARTICLE_STATUS_DESIGN = [
        '0' => 'bg-red color-palette',
        '1' => 'bg-green color-palette',
        '2' => 'bg-yellow color-palette',
        '3' => 'bg-purple color-palette'
    ];

    const LEVEL = [
        // '1' => 'Kindergarten',
        // '2' => 'Lower School',
        // '3' => 'Middle School',
        // '4' => 'High School'
        '1' => 'First Year',
        '2' => 'Second Year',
        '3' => 'Third Year',
        '4' => 'Fourth Year',
    ];
    const LEVEL_DESIGN = [
        '1' => 'bg-light-blue color-palette',
        '2' => 'bg-aqua-active color-palette',
        '3' => 'bg-teal color-palette',
        '4' => 'bg-orange color-palette',
        '5' => 'bg-green color-palette'
    ];

    //const ARTICLE_TABLE_HEAD = ['Posting Date','Title','Article Status','Level'];
    const ARTICLE_TABLE_HEAD_SORT = [
        ['label'=>'Posting Date', 'column_name' => 'posting_date'],
        ['label'=>'Title', 'column_name' => 'title'],
        ['label'=>'Article Status', 'column_name' => 'status'],
        ['label'=>'Level', 'column_name' => 'level']
    ];
}

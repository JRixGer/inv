<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsMembersPwcp extends Model
{
 
    protected $table = 'is_members_pwcp';
    public $fillable = [
        'id',
        'contactid',
        'contact',
        'first_name',
        'last_name',
        'title',
        'co_name',
        'street_address_1',
        'street_address_2',
        'city',
        'state',
        'postal_code',
        'country',
        'order_type',
        'promo_code',
        'order_id',
        'order_title',
        'order_date',
        'product_ids',
        'product_name',
        'serial',
        'order_total',
        'invoice_id',
        'affiliate_id',
        'tag_ids'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Date
 * <Modelado de la base de datos>
 * 
 * @author Daniel
 * @version 1.0
 * @since 
 */
class Date extends Model
{
    use HasFactory;
	protected $table= 'dates';

    	protected $fillable = [
		'name',
		'email',
		'phone'
	
	];
}

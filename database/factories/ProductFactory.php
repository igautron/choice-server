<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; // Str::random(10)

class ProductFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Product::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$subtype_arr = [
			'shampoo', //'Шампунь',
			'mask',//'Маска',
			'balm',//'Ампули',
			'scrab',//'Молочко',
			'cream', //'Лосьйон',
			'gel',//'Еліксир',
			'facecream',//'Спрей',
			'facescrub',//'Колорінг',
			'facemask',//'Стайлінг',
			'washface',//'Захист',
			'tonik',//'Крем для волосся',
			'fito',
			'goodfood',//'Набір',
			'forhome',//'Гель-вуаль',
		];

		$apps_arr = [
			'hair',
			'body',
			'face',
			'home',
			'health'
		];

		$brands_arr = [
			"choice",
			"whitemandarin" ,
			"goodfood"    ,
			"greenmax"    
		];

		$serias_arr = [
			"medova"    ,
			"tsitrus"  ,
			"sakska"  ,
			"travi"  ,
			"lik" ,
			"jivlenia" ,
			"zwolojenia" ,
			"forchild" 
		];
        
        $gender_arr = [
            "woman",
            "man",
            "child",
            "young"
        ];
            

		return [
			'title' => $this->faker->city,
            'descr' => $this->faker->paragraph(5),
            'descr2' => $this->faker->paragraph(5),
            'descr3' => $this->faker->paragraph(5),
            'composition' => $this->faker->paragraph(5),
            'sposib' => $this->faker->paragraph(5),
            'image' => '//lorempixel.com/500/600/fashion/?t='.microtime(),
			'price' => $this->faker->randomFloat(2, 1, 999),
			'articul' => $this->faker->postcode,
            'country' => $this->faker->city,
            'amount' => $this->faker->postcode,
            'descr3' => $this->faker->paragraph(5),
			'type' => $this->faker->paragraph(5),
			'composition' => $this->faker->paragraph(5),
            'kind' => $this->faker->paragraph(5), // случайный элемент из $brands_arr,
            'subtype' => $subtype_arr[random_int(0, count($subtype_arr)-1)], // случайный элемент из $serias_arr,
			'app' => $apps_arr[random_int(0, count($apps_arr)-1)], // случайный элемент из $types_arr
            'brand' => $this->faker->city,
            'seria' => $this->faker->city,
			'woman' => random_int(0, 1),
			'man' => random_int(0, 1),
			'child' => random_int(0, 1),
			'molod' => random_int(0, 1),
			
		];
	}
}

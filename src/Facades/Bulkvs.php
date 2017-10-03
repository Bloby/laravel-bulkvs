<?php 

namespace Bulkvs\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed getCoverage($country_iso = null, $city_prefix = null, $city_id = null)
 *
 * @see \Bulkvs\Core
 * @see \Bulkvs\Bulkvs
 * @see \Bulkvs\Facades\Bulkvs
 */
class Bulkvs extends Facade {

	/**
	 * Get the registered name of the component
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'bulkvs'; }
}
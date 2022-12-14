<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;

class MenuController extends Controller
{

    /**
     * @return View
     */
    public function locations(): View
    {
        $query = "SELECT c.id, y.country,country_image, l.location_image, l.id as location_id FROM ac_location_content l, ac_countries AS c, country AS y WHERE c.id = y.id and y.country!='Denmark' and y.country!='Sweden' and y.country!='Spain' and c.id = l.id ORDER BY y.country";
        $locationsContainer = DB::select($query);

        foreach ($locationsContainer as $key => $single) {
            $locationsContainer[$key] = json_encode($single);
        }

        $locationsContainer = array_unique($locationsContainer);
        $locationsContainerResult = [];

        foreach ($locationsContainer as $key => $single) {
            $singleObject = json_decode($single);
            $locationsContainer[$key] = json_decode($single);
            $locationsContainerResult[$singleObject->id] = $locationsContainer[$key];
        }

        return view('web/pages/conditions_and_locations', [
            'title' => "Rent a Car for Europe locations | Get the best car rental deals on advance car booking",
            'locations' => $locationsContainerResult,
        ]);
    }

    /**
     * @return View
     */
    public function travelAdvice(): View
    {
        return view('web/pages/travel_advice', [
            'title' => lang('franchise_title'),
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function cars(Request $request): View
    {
        $country = $request->get('country');

        if ($country === null) {
            $country = "LT";
        }

        $query = "SELECT c.id, y.country FROM ac_countries AS c, country AS y WHERE c.id = y.id AND y.country!='Denmark' AND y.country!='Spain' AND y.country!='Sweden' ORDER BY y.country";
        $countries = DB::select($query);

        $driving_rules = "<a href='/rules/" . $country . ".pdf' class='country' target='_blank'>" . $country . "</a>";

        //airport part
        $airport_sql = "SELECT airport_code FROM ac_locations WHERE country_id = '" . $country . "' and email!=''";
        $result = DB::select($airport_sql);

        $airport_arr = [];

        if (!empty($result)) {
            foreach ($result as $value) {
                $airport_arr[] = "'" . $value->airport_code . "'";
            }
        }

        $airport_comma = implode(",", $airport_arr);

        $query = "SELECT  l.location_name, v.*, t.type, ";
        $query .= (getSeason()) ? "p.day_high AS xday, p.week_high AS xweek, p.month_high AS xmonth" : "p.day_low AS xday, p.week_low AS xweek, p.month_low AS xmonth";
        $query .= " FROM ac_locations AS l, ac_prices AS p, ac_vehicles AS v, ac_vehicle_types AS t";
        $query .= " WHERE l.country_id = '" . $country . "'";
        $query .= " AND l.airport_code IN (" . $airport_comma . ")";
        $query .= " AND l.id = p.location_id";
        $query .= " AND p.vehicle_id = v.id";
        $query .= " AND v.type_id = t.id";
        $query .= " GROUP BY v.model";
//        $query .= " ORDER BY t.order_by" . " ";
//dd($query);
        $result = DB::select($query);

        if(!empty(lang($country.'_car_title'))) {
            $meta_title = lang($country.'_car_title');
        } else {
            $meta_title = lang('cars_title');
        }

        if(!empty(lang($country.'_car_desc'))) {
            $meta_desc = lang($country.'_car_desc');
        } else {
            $meta_desc = lang('cars_desc');
        }
        $filtered_arr = array_filter(
            $countries,
            function($obj) use (&$country){
                return $obj->id === $country;
            });
        $selected_country = reset($filtered_arr)->country;

        return view('web/pages/cars', [
            'title' => $meta_title,
            'meta_description' => $meta_desc,
            'driving_rules' => $driving_rules,
            'country' => $country,
            'countries' => $countries,
            'cars' => $result,
            'selected_country' => $selected_country
        ]);
    }

    /**
     * @return View
     */
    public function about(): View
    {
        return view('web/pages/about_us', [
            'title' => lang('about_title') . " | " . getAppURL(),
        ]);
    }

    /**
     * @return View
     */
    public function franchise(): View
    {
        return view('web/pages/franchise', [
            'title' => lang('franchise_title'),
        ]);
    }

    /**
     * @return View
     */
    public function contact(): View
    {

        $location1 = DB::select("SELECT id from country WHERE country_group IN(1,2)");

        $ex_coun = array();
        foreach ($location1 as $key => $value) {
            $ex_coun[]= "'".$value->id."'";
        }
        $country_allowed = implode(",",$ex_coun);
        $query = "SELECT c.* FROM ac_locations AS l, country AS c WHERE l.country_id = c.id and country_id IN (".$country_allowed.")  GROUP BY l.country_id  ORDER BY c.country";
        $resultLocations = DB::select($query);

        return view('web/pages/contact', [
            'title' => lang('contact_title') . " | " . getAppURL(),
            'location1' => $resultLocations
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function contactAjax(Request $request): JsonResponse
    {
        $query = "SELECT * FROM ac_locations  WHERE  country_id ='".$_POST['country']."'  AND email != ''  ORDER BY sorting ASC, location_name ";
        $results = DB::select($query);
        $resultsLocation = [];

        if (is_array($results) && !empty($results)) {
            $resultsLocation[] = "<option disabled>-Select location-</option>";

            foreach ($results as $result) {
                $resultsLocation[] = "<option value='$result->id'>" . trim($result->location_name) . "</option>";
            }
        } else {
            $resultsLocation[] = "<option>No Location found</option>";
        }

        return response()->json([
            'status' => true,
            'location2' => $resultsLocation
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function phoneAjax(Request $request): JsonResponse
    {

        $query = "SELECT phone FROM ac_locations  WHERE  id ='".$request->get('location')."' ";
        $resultsPhone = DB::SELECT($query);

        if (is_array($resultsPhone) && !empty($resultsPhone)) {
            foreach ($resultsPhone as $phone) {
                $returnPhone = $phone->phone ?? '';
            }
        }

        return response()->json([
            'status' => true,
            'phoneNumber' => $returnPhone ?? 'Not phone number found'
        ]);
    }

    /**
     * @return View
     */
    public function addresses(): View
    {
        $queryAddresses = ('select * from ac_addresses');
        $resultsAddresses = DB::SELECT($queryAddresses);

        return view('web/pages/addresses', [
            'title' => "addCar Adressess" . " | " . getAppURL(),
            'addresses' => $resultsAddresses,
        ]);
    }

    /**
     * @return View
     */
    public function services(Request $request): View
    {
        $location1 = DB::select("SELECT id from country WHERE country_group IN(1,2)");

        $ex_coun = array();
        foreach ($location1 as $key => $value) {
            $ex_coun[]= "'".$value->id."'";
        }
        $country_allowed = implode(",",$ex_coun);
        $query = "SELECT c.* FROM ac_locations AS l, country AS c WHERE l.country_id = c.id and country_id IN (".$country_allowed.")  GROUP BY l.country_id  ORDER BY c.country";
        $resultLocations = DB::select($query);

        $country = '';
        $countryName = '';

        if (isset($request->country) && $request->country !== 'Other') {
            foreach ($resultLocations as $singleResultLocation) {
                if ($singleResultLocation->id === $request->country || $singleResultLocation->country === $request->country ) {
                    $country = $singleResultLocation->id;
                    $countryName = $singleResultLocation->country;
                }
            }
        }

        if (empty($country)) {
            $country = 'LT';
            $countryName = 'Lithuania';
        }

        $driving_rules = "<a href='/rules/" . $country . ".pdf' class='country' target='_blank'>" . $countryName . "</a>";

        return view('web/pages/services', [
            'title' => lang('service_title') . " | " . getAppURL(),
            'location1' => $resultLocations,
            'driving_rules' => $driving_rules
        ]);
    }

    public function notFound() {
        $data['title'] = 'Page not found';
        return response()->view('web.pages.404',$data,404);
    }
}

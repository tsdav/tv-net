<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Boolean;

class FooterController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function conditions(Request $request): View
    {
        $country = $request->get('country');
        $lang = getCurrentLanguage();

        if ($country === null) {
            $country = "AL";
        }
        $query = "SELECT c.id, y.country FROM ac_countries AS c, country AS y WHERE c.id = y.id AND y.country!='Denmark' AND y.country!='Spain' AND y.country!='Sweden' ORDER BY y.country";
        $countries = DB::select($query);

        if ($country !== 'Other') {
            //TODO lang definition
            $content = DB::table('ac_condi_terms')->select('terms')->where('id', $country)->where('language', $lang)->first();
        } else {
            //hardcode
            $content = "<p><font color=\"#cc0000\"><strong>addCar gives you the opportunity to rent a car all over the world in cooperation with various partners.</strong></font></p><p>&nbsp;</p><p>Please notice that when you rent a car on www.addcar.com in other countries than Finland, Sweden, Latvia, Estonia and Lithuania it is the conditions of the specific partner that are valid.</p><p>&nbsp;</p><p>You will have the rental conditions from the specific car rental company that the rental has been made from. If there are any questions in connection to the conditions when renting a car in these countries please contact the specific car rental company that the booking is made from.</p>";
        }

        $driving_rules = "<a href='/rules/" . $country . ".pdf' class='country' target='_blank'>" . $country . "</a>";

        if(!empty(lang($country.'_con_title'))) {
            $meta_title = lang($country.'_con_title');
        } else {
            $meta_title = lang('cond_title');
        }

        if(!empty(lang($country.'_con_desc'))) {
            $meta_desc = lang($country.'_con_desc');
        } else {
            $meta_desc = lang('cond_desc');
        }

        return view('web/pages/conditions', [
            'title' => $meta_title,
            'meta_description' => $meta_desc,
            'terms_content' => $content->terms ?? $content,
            'countries' => $countries,
            'country' => $country,
            'driving_rules' => $driving_rules
        ]);
    }

    /**
     * @return View
     */
    public function policy(): View
    {
        return view('web/pages/policy', [
            'title' => lang('policy_title') . " | " . getAppURL(),
        ]);
    }

    /**
     * @return View
     */
    public function faq(): View
    {
        return view('web/pages/faq', [
            'title' => lang('faq_title') . " | " . getAppURL(),
        ]);
    }

    /**
     * @return View
     */
    public function newsletter(): View
    {
        return view('web/pages/newsletter', [
            'title' => lang('news_title') . " | " . getAppURL(),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function newsletterAjax(Request $request): JsonResponse
    {
        $requestItems = $request->all();
        $validator = Validator::make($requestItems, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:newsletter,email',
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
               'status' => false,
               'message' => 'Please fill all inputs, or check for valid email'
            ]);
        }

        DB::table('newsletter')->insert([
            'name' => $requestItems['name'],
            'email' => $requestItems['email'],
            'dato' => date('Y-m-d H:i:s'),
        ]);

        return new JsonResponse([
            'status' => true
        ]);
    }

    /**
     * @return View
     */
    public function newsletterResponse(): View
    {
        return view('web/pages/newsletterResponse', [
            'title' => lang('SC0'),
        ]);
    }

    /**
     * @return View
     */
    public function shareResponse(): View
    {
        return view('web/pages/shareResponse', [
            'title' => lang('SD0'),
        ]);
    }

    /**
     * @return View
     */
    public function jobs(): View
    {
        return view('web/pages/jobs', [
            'title' => "Job opportunities at addCar Rental",
        ]);
    }

    /**
     * @return View
     */
    public function request(): View
    {
        return view('web/pages/request', [
            'title' => "Addcar | Request Form",
        ]);
    }
}

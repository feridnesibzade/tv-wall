<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Mail\OrderMail;
use App\Models\About;
use App\Models\AboutCity;
use App\Models\BestTypeOfMount;
use App\Models\Blog;
use App\Models\Book;
use App\Models\City;
use App\Models\Country;
use App\Models\ExtraService;
use App\Models\Feedback;
use App\Models\Hero;
use App\Models\Lifting;
use App\Models\MountTvSize;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Question;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\TvSize;
use App\Models\WallMount;
use App\Models\WallType;
use App\Models\WeSpeacial;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;

class StaticController extends Controller
{
    public function index()
    {



        $data = [];
        $data['hero'] = Hero::first();
        $data['projects'] = Project::first();
        $data['mountTvSizes'] = MountTvSize::first();
        $data['services'] = Service::all();
        $data['partners'] = Partner::all();
        $data['weSpecial'] = WeSpeacial::first();
        $data['schedule'] = Schedule::first();
        $data['feedback'] = cache()->remember('reviews', now()->addWeek(), function () {
            return $this->getReviews();
        });

        // dd($data['feedback']);
        return view('index', compact('data'));
    }

    public function about()
    {
        $data['about'] = About::first();
        $data['cities'] = AboutCity::all();

        return view('about', compact('data'));
    }

    public function services($slug = null)
    {
        $data['partners'] = Partner::all();
        $data['services'] = Service::all();
        $data['projects'] = Project::first();
        $data['bestTypeOfMount'] = BestTypeOfMount::first();
        $data['questions'] = Question::all();

        if ($slug) {
            $data['service'] = Service::where('slug', $slug)->firstOrFail();
        }

        return view('services', compact('data'));
    }

    public function blogs($slug = null)
    {
        $data['blogs'] = Blog::latest()->take(10)->get();

        if ($slug) {
            // dd($data);
            $data['blog'] = Blog::where('slug', $slug)->firstOrFail();
            return view('blog', compact('data'));
        }

        return view('blogs', compact('data'));
    }

    public function projects($slug = null)
    {
        $data['projects'] = Project::all('title', 'id', 'year')->groupBy('year');

        if ($slug) {
            $data['project'] = Project::with('city', 'wallMounts')->where('id', $slug)->firstOrFail();
        }

        return view('projects', compact('data'));
    }

    public function locations($slug = null)
    {
        $data['countries'] = Country::with('cities:id,city,country_id,slug')->get();
        if ($slug) {
            $data['city'] = City::where('slug', $slug)->firstOrFail();
        }

        return view('locations', compact('data'));
    }

    public function order()
    {
        $data = [];
        $data['tvSize'] = TvSize::all();
        $data['wallMounts'] = WallMount::all();
        $data['wallTypes'] = WallType::all();
        $data['extraServices'] = ExtraService::all();
        $data['lifting'] = Lifting::all();

        return view('order', compact('data'));
    }

    public function findCity()
    {
        try {
            return City::whereHas('zipCodes', function ($q) {
                $q->where('zip_code', request()->zip_code);
            })->firstOrFail();

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'There is not department in your city.',
                'status' => 422,
            ], 422);
        }
    }

    public function createOrder(BookRequest $request)
    {
        try {
            $order = Book::create([
                'zip_code' => request()->zip_code,
                'city_id' => request()->city['id'],
                'tv_size_id' => request()->tvSize['value'],
                'wall_mount_id' => request()->wallMount['value'],
                'wall_type_id' => request()->wallType['value'],
                // 'extra_service_id' => request()->extraService['value'],
                'lift_assistance' => request()->liftAssistance['value'],
                'lift_assistance_title' => request()->liftAssistance['title'],
                'date' => request()->date,
                'fullname' => request()->fullname,
                'phone' => request()->phone,
                'email' => request()->email,
                'time' => json_encode(request()->time),
                'address' => request()->address,
                'address_detail' => request()->address_detail,
            ]);
            $order->extraServices()->sync(collect($request->extraService)->pluck('value')->toArray());
            Mail::to('jeyhunbiznes43@gmail.com')->send(new OrderMail($order->load(
                'city',
                'wallMount',
                'tvSize',
                'wallType',
                'extraServices'
            )));

            return response()->json(['message' => 'Successfully reserved.']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'errors' => "Oops! Something Went Wrong."], 500);
        }
    }

    public function orderSuccess()
    {
        return view('success');
    }

    public function ajaxBlogs()
    {
        $data = Blog::simplePaginate(6);
        return response()->json([
            'data' => $data->map(function ($r) {
                return array_merge(
                    $r->toArray(),
                    [
                        'shortDescription' => substr(strip_tags($r->description), 0, 60) . '...',
                        'diffForHumans' => $r->created_at->diffForHumans(),
                    ]
                );
            }),
            'current_page' => $data->currentPage(),
            'hasMore' => $data->hasMorePages()
        ]);
    }

    public function getReviews()
    {
        $url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=ChIJH5Ie3aUUAk0RwbeaPrU-wQA&key=AIzaSyAcNtAcUVJLBM6mG7St4do9y0TTV8pE_C8";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        return json_decode($response)->result->reviews;
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\About;
use App\Models\BestTypeOfMount;
use App\Models\Book;
use App\Models\City;
use App\Models\Country;
use App\Models\ExtraService;
use App\Models\Feedback;
use App\Models\Hero;
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

class StaticController extends Controller
{
    public function index()
    {
        $data = [];
        $data['hero'] = Hero::first();
        $data['projects'] = Project::orderByDesc('id')->get();
        $data['mountTvSizes'] = MountTvSize::first();
        $data['services'] = Service::all();
        $data['partners'] = Partner::all();
        $data['weSpecial'] = WeSpeacial::first();
        $data['schedule'] = Schedule::first();
        $data['feedback'] = Feedback::all();

        return view('index', compact('data'));
    }

    public function about()
    {
        $data['about'] = About::first();
        $data['cities'] = City::all();

        return view('about', compact('data'));
    }

    public function services($slug = null)
    {
        $data['partners'] = Partner::all();
        $data['services'] = Service::all();
        $data['projects'] = Project::all();
        $data['bestTypeOfMount'] = BestTypeOfMount::first();
        $data['questions'] = Question::all();

        if ($slug) {
            $data['service'] = Service::where('slug', $slug)->firstOrFail();
        }

        return view('services', compact('data'));
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

        return view('order', compact('data'));
    }

    public function findCity()
    {
        try {
            return City::where('zip_code', request()->zip_code)->firstOrFail();

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'There is not department in your city.',
                'status' => 422,
            ], 422);
        }
    }

    public function createOrder(BookRequest $request)
    {
        // $request->validate([
        //     'tvSize.value' => 'required',
        //     'wallMount.value' => 'required',
        //     'wallType.value' => 'required',
        //     'extraService.value' => 'required',
        //     'liftAssistance.value' => 'required',
        //     'date' => 'required',
        //     'time' => 'required|array',
        //     'address' => 'required',
        // ]);
        try {

            Book::create([
                'city_id' => request()->city['id'],
                'tv_size_id' => request()->tvSize['value'],
                'wall_mount_id' => request()->wallMount['value'],
                'wall_type_id' => request()->wallType['value'],
                'extra_service_id' => request()->extraService['value'],
                'lift_assistance' => request()->liftAssistance['value'],
                'lift_assistance_title' => request()->liftAssistance['title'],
                'date' => request()->date,
                'time' => json_encode(request()->time),
                'address' => request()->address,
            ]);

            return response()->json(['message' => 'Successfully reserved.']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'errors' => $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bimbel;
use App\Models\ClassBimbel;
use App\Models\Order;
use App\Models\Package_member;
use App\Models\sub_categories;
use App\Models\Tryout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        // Data untuk dashboard admin
        $order = Order::sum('final_price');
        $total_peserta = Order::count('user_id');
        $total_bimbel = Bimbel::count('id');
        $total_paket = Package_member::count('id');

        $total_user_kelas_10 = User::where('status', 'kelas_10')->count();
        $total_user_kelas_11 = User::where('status', 'kelas_11')->count();
        $total_user_kelas_12 = User::where('status', 'kelas_12')->count();
        $total_user_kuliah = User::where('status', 'kuliah')->count();
        $total_user_gep_year = User::where('status', 'gep_year')->count();
        $total_user_lk = User::where('jenis_kelamin', 'lk')->count();
        $total_user_pr = User::where('jenis_kelamin', 'pr')->count();

        $packageSales = DB::table('package_members')
        ->join('orders', 'package_members.id', '=', 'orders.package_member_id')
        ->where('orders.payment_status','paid')
        ->select('package_members.name as package_name', DB::raw('COUNT(orders.id) as total_sales'))
        ->groupBy('package_members.name')
        ->get();

        // Mendapatkan data tryout
        $today = now();

        $upcoming_tryouts = Tryout::where('is_together', 'together')
            ->where('start_date', '>', $today)
            ->count();

        $ongoing_tryouts = Tryout::where('is_together', 'together')
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->count();

        $ended_tryouts = Tryout::where('is_together', 'together')
            ->where('end_date', '<', $today)
            ->count();

        // // Total hasil peserta berdasarkan subkategori
        // $results = DB::table('results')
        //     ->join('sub_categories', 'results.sub_category_id', '=', 'sub_categories.id')
        //     ->join('tryouts', 'results.tryout_id', '=', 'tryouts.id')
        //     ->where('tryouts.is_together', 'together')
        //     ->select('tryouts.is_together as tryout', DB::raw('COUNT(DISTINCT results.user_id) as total_users'))
        //     ->groupBy('sub_categories.name')
        //     ->get();

        // $categories = $results->pluck('tryout');
        // $totals = $results->pluck('total_users');

        $tryouts = DB::table('tryouts')
            ->where('is_together', 'together')
            ->get();

        $chartData = [];
        
        foreach ($tryouts as $tryout) {
            // Get total sub_categories for this tryout
            $totalSubCategories = sub_categories::count();

            // Get users who completed all sub_categories
            $completedUsers = DB::table('results')
                ->select('user_id')
                ->where('tryout_id', $tryout->id)
                ->groupBy('user_id')
                ->havingRaw('COUNT(DISTINCT sub_category_id) = ?', [$totalSubCategories])
                ->get()
                ->count();

            $chartData[] = [
                'tryout_name' => $tryout->name,
                'completed_users' => $completedUsers
            ];
        }

        $labels = collect($chartData)->pluck('tryout_name');
        $data = collect($chartData)->pluck('completed_users');


        // Dashboard berdasarkan role
        if ($user->role == 'user') {
            if (session('url-package')) {
                return redirect()->route('package.item',session('url-package'));
            }

            return  redirect()->route('user.dashboard');
        } elseif ($user->role == 'mentor') {
            return redirect()->route('dashboard-mentor');
        } else {
            return view('admin.dashboard', compact(
                'order',
                'total_peserta',
                'upcoming_tryouts',
                'ongoing_tryouts',
                'ended_tryouts',
                'total_bimbel',
                'total_paket',
                'total_user_kelas_10',
                'total_user_kelas_11',
                'total_user_kelas_12',
                'total_user_kuliah',
                'total_user_gep_year',
                'packageSales',
                'total_user_lk',
                'total_user_pr',
                'labels',
                'data'
            ));
        }
    }


    public function index_mentor(){
        $classes = ClassBimbel::where('user_id', Auth::user()->id)->count();
        
        // $bimbelId = $bimbel->id; // ID bimbel yang dicari

        $bimbel = Bimbel::count();

        $users = User::whereHas('orders.package_member.bimbel')->count();

        $today = Carbon::today(); // Tanggal hari ini
        $now = Carbon::now(); // Waktu saat ini

        // Data kelas hari ini
        $classesToday = ClassBimbel::whereDate('date', $today)
            ->where('user_id', Auth::user()->id)
            ->where('start_time', '>=', $now->format('H:i:s')) // Untuk memastikan kelas belum selesai
            ->get();

        // Data kelas yang akan datang
        $upcomingClasses = ClassBimbel::whereDate('date', '>', $today)
            ->orderBy('date')
            ->get();

        $p = ClassBimbel::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')->get();

        // dd($class);
        

        return view('mentor.dashboard', compact('classes','users', 'bimbel', 'classesToday', 'upcomingClasses', 'p'));
    }


    public function settings(){
        return view('settings');
    }
}

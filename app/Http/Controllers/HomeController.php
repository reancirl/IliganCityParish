<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Carbon\Carbon;
use App\Marriage;
use App\Baptismal;
use App\Confirmation;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $baptismal = Baptismal::all()->count();
        $confirmation = Confirmation::all()->count();
        $marriage = Marriage::all()->count();

        $cathedral_bap = Baptismal::all()
                        ->where('place_of_baptism','St.Michael The Archangel Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($cathedral_bap == null){
            $cathedral_bap = 0;
        }
        else $cathedral_bap = $cathedral_bap->count();

        $sanLorenzo_bap = Baptismal::all()
                        ->where('place_of_baptism','San Lorenzo Ruiz Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($sanLorenzo_bap == null){
            $sanLorenzo_bap = 0;
        }
        else $sanLorenzo_bap = $sanLorenzo_bap->count();

        $sanRoque_bap = Baptismal::all()
                        ->where('place_of_baptism','San Roque Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($sanRoque_bap == null){
            $sanRoque_bap = 0;
        }
        else $sanRoque_bap = $sanRoque_bap->count();

        $holyCross_bap = Baptismal::all()
                        ->where('place_of_baptism','Holy Cross Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($holyCross_bap == null){
            $holyCross_bap = 0;
        }
        else $holyCross_bap = $holyCross_bap->count();

        $redemptorist_bap = Baptismal::all()
                        ->where('place_of_baptism','Redemptorist Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($redemptorist_bap == null){
            $redemptorist_bap = 0;
        }
        else $redemptorist_bap = $redemptorist_bap->count();

        $stoRosario_bap = Baptismal::all()
                        ->where('place_of_baptism','Sto. Rosario Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($stoRosario_bap == null){
            $stoRosario_bap = 0;
        }
        else $stoRosario_bap = $stoRosario_bap->count();

        $corpus_bap = Baptismal::all()
                        ->where('place_of_baptism','Corpus Christi Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($corpus_bap == null){
            $corpus_bap = 0;
        }
        else $corpus_bap = $corpus_bap->count();

        $cathedral_con = Confirmation::all()
                        ->where('church','St.Michael The Archangel Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($cathedral_con == null){
            $cathedral_con = 0;
        }
        else $cathedral_con = $cathedral_con->count();

        $sanLorenzo_con = Confirmation::all()
                        ->where('church','San Lorenzo Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($sanLorenzo_con == null){
            $sanLorenzo_con = 0;
        }
        else $sanLorenzo_con = $sanLorenzo_con->count();

        $sanRoque_con = Confirmation::all()
                        ->where('church','San Roque Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($sanRoque_con == null){
            $sanRoque_con = 0;
        }
        else $sanRoque_con = $sanRoque_con->count();

        $holyCross_con = Confirmation::all()
                        ->where('church','Holy Cross Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($holyCross_con == null){
            $holyCross_con = 0;
        }
        else $holyCross_con = $holyCross_con->count();

        $redemptorist_con = Confirmation::all()
                        ->where('church','Redemptorist Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($redemptorist_con == null){
            $redemptorist_con = 0;
        }
        else $redemptorist_con = $redemptorist_con->count();

        $stoRosario_con = Confirmation::all()
                        ->where('church','Sto. Rosario Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($stoRosario_con == null){
            $stoRosario_con = 0;
        }
        else $stoRosario_con = $stoRosario_con->count();

        $corpus_con = Confirmation::all()
                        ->where('church','Corpus Christi Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($corpus_con == null){
            $corpus_con = 0;
        }
        else $corpus_con = $corpus_con->count();

        $cathedral_mar = Marriage::all()
                        ->where('church','St.Michael The Archangel Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($cathedral_mar == null){
            $cathedral_mar = 0;
        }
        else $cathedral_mar = $cathedral_mar->count();

        $sanLorenzo_mar = Marriage::all()
                        ->where('church','San Lorenzo Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($sanLorenzo_mar == null){
            $sanLorenzo_mar = 0;
        }
        else $sanLorenzo_mar = $cathedral_mar->count();

        $sanRoque_mar = Marriage::all()
                        ->where('church','San Roque Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($sanRoque_mar == null){
            $sanRoque_mar = 0;
        }
        else $sanRoque_mar = $sanRoque_mar->count();

        $holyCross_mar = Marriage::all()
                        ->where('church','Holy Cross Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($holyCross_mar == null){
            $holyCross_mar = 0;
        }
        else $holyCross_mar = $holyCross_mar->count();

        $redemptorist_mar = Marriage::all()
                        ->where('church','Redemptorist Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($redemptorist_mar == null){
            $redemptorist_mar = 0;
        }
        else $redemptorist_mar = $redemptorist_mar->count();

        $stoRosario_mar = Marriage::all()
                        ->where('church','Sto. Rosario Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($stoRosario_mar == null){
            $stoRosario_mar = 0;
        }
        else $stoRosario_mar = $stoRosario_mar->count();

        $corpus_mar = Marriage::all()
                        ->where('church','Corpus Christi Parish Church')
                        ->sortByDesc('created_at')
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('W');
                        })->first();
        if($corpus_mar == null){
            $corpus_mar = 0;
        }
        else $corpus_mar = $corpus_mar->count();

        $data_bap = [$cathedral_bap,$sanLorenzo_bap,$sanRoque_bap,$holyCross_bap,$redemptorist_bap,$stoRosario_bap,$corpus_bap];
        $data_con = [$cathedral_con,$sanLorenzo_con,$sanRoque_con,$holyCross_con,$redemptorist_con,$stoRosario_con,$corpus_con];
        $data_mar = [$cathedral_mar,$sanLorenzo_mar,$sanRoque_mar,$holyCross_mar,$redemptorist_mar,$stoRosario_mar,$corpus_mar];
        return view('home', compact('baptismal', 'confirmation', 'marriage','data_bap','data_con','data_mar'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
}

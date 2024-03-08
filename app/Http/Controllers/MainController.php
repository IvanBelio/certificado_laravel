<?php
namespace App\Http\Controller;
use Illuminate\Http\Request;
class MainController extends Controller
{
public function __invoke(Request $request)
{
    $n =rand(1,100);
    return view("slaudo", ['n' => $n]);

    }
}
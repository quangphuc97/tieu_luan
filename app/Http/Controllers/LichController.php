<?php
/**
 * Created by PhpStorm.
 * User: QuangPhuc
 * Date: 10/5/2019
 * Time: 9:57 PM
 */

namespace App\Http\Controllers;
use App\Hoc;
use Illuminate\Http\Request;
use Calendar;
use Session;
use App\Lop;
use App\Event;

class LichController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => $value->color,
                        'url'=>route('danhsachlop').'?id='.$value->ma_lop,
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('admin.lich.event')->with('calendar', $calendar)->with('events',$events);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_lop = Lop::where('trang_thai',Lop::$chua_sap_lich)->get();
        return view('admin.lich.addevent')->with('ds_lop',$ds_lop);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $lop= Lop::find($request->ma_lop);
        $lop->trang_thai=Lop::$hoat_dong;
        $lop->save();
        for($i=0;$i<3;$i++)
        {
            $this->createEvent($lop,$request->color,$request->start_date[$i]);
        }
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('lich.index');
//        $time = date("H:i:s",strtotime($request->start_date[1]));
//        echo $time;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view ('admin.lich.editevent')->with('event',$event);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function createEvent(Lop $lop, $color, $start_date ){
      for ($i=0;$i<=3;$i++){
            $events= new Event();
        $events->title = $lop->ten_lop."||".date("H:i",strtotime($start_date));
        $events->color  =$color;
        $events->start_date = $start_date;
        $events->end_date = $start_date;
        $events->ma_lop = $lop->ma_lop;
        $start_date= date('Y-m-d H:i:s', strtotime($start_date. ' + 7 days'));
        $events-> save();
        }
    }

    public function showCalendar(Request $request)
    {
        $events = [];
        if (empty($request->id)){
            $data = Event::all();
            if($data->count()) {
                foreach ($data as $key => $value) {
                    $events[] = Calendar::event(
                        $value->title,
                        true,
                        new \DateTime($value->start_date),
                        new \DateTime($value->end_date.' +1 day'),
                        null,
                        // Add color and link on event
                        [
                            'color' => $value->color,
                            'url' =>route('dang-ky-hoc',['id'=>$value->ma_lop]),
                        ]
                    );
                }
            }
            $calendar = Calendar::addEvents($events);
            return view('front-end.lich.index')->with('calendar', $calendar)->with('events',$events);
        }
        else {
            $hoc = Hoc::where('id_hoc_vien',$request->id)->first();
            $data = Event::where('ma_lop',$hoc['ma_lop'])->get();
            if($data->count()) {
                foreach ($data as $key => $value) {
                    $events[] = Calendar::event(
                        $value->title,
                        true,
                        new \DateTime($value->start_date),
                        new \DateTime($value->end_date.' +1 day'),
                        null,
                        // Add color and link on event
                        [
                            'color' => $value->color,
                            'url' =>route('dang-ky-hoc',['id'=>$value->ma_lop]),
                        ]
                    );
                }
            }
            $calendar = Calendar::addEvents($events);
            return view('front-end.lich.index')->with('calendar', $calendar)->with('events',$events);
        }

    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;
use GuzzleHttp\Client;
use App\Events\DemoEvent;
use App\Events\SuccessEvent;
use App\Events\ErrorEvent;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $data = $request->all();
        $data['status'] = 0;
        $checkIsset = null;
        $checkIsset = Task::where("masv",$data['masv'])->first();
        if(!empty($checkIsset))
        {
            event(new DemoEvent("Sinh viên đã được trao thưởng"));
            event(new ErrorEvent($data['name'], $data['email']));
            return response()->json(false);
        }
        $task = Task::create($data);
        $client  = new Client();
        // call api event 
        $apiRequestEvent = $client->request('GET', 'http://172.28.176.1:3001/api/event?event_name='. $data['event_name']);
        
        $event = json_decode($apiRequestEvent->getBody()->getContents());
        if(empty($event)) {
            event(new DemoEvent("Không lấy được Event"));
            event(new ErrorEvent($task->name, $task->email));
            $task->delete();
            return response()->json(false);
        }
        event(new DemoEvent("Get Event Success "));
        sleep(5);
        // dd($event);
        // check event co ton tai hay khong
        //dd($event->id);
        // cal api arward
        $apiRequestAward = $client->request('GET', 'http://172.28.176.1:3004/api/award?event_id='.$event->id);
        $awards = json_decode($apiRequestAward->getBody()->getContents());
        if(empty($awards)) {
            event(new DemoEvent("Không lấy được thông tin Award"));
            event(new ErrorEvent($task->name, $task->email));
            $task->delete();
            return response()->json(false);
        }
        event(new DemoEvent("Get Award Success "));
        sleep(5);
        // dd($awards);
        //call api student and transcrip
        $apiRequestStudent = $client->request('GET', 'http://172.28.176.1:3002/api/student?masv='. $data['masv']);
        $student = json_decode($apiRequestStudent->getBody()->getContents());
        if(empty($student)) {
            event(new DemoEvent("Không lấy được thông tin Sinh viên"));
            event(new ErrorEvent($task->name, $task->email));
            $task->delete();
            return response()->json(false);
        }
        event(new DemoEvent("Get Student and Transcrip Success "));
        sleep(5);
        // all score > 9 => giai nhat
        // all score > 8 => giai nhi
        // all score > 7 => giai ba
        $transcript = $student->transcripts;
        $check = 0;
        if($transcript->score_1 >= 9 && $transcript->score_2 >= 9 && $transcript->score_3 >= 9 && $transcript->score_4 >= 9 && $transcript->score_5 >= 9) {
            $check = 1;
        } else if($transcript->score_1 >= 8 && $transcript->score_2 >= 8 && $transcript->score_3 >= 8 && $transcript->score_4 >= 8 && $transcript->score_5 >= 8){
            $check = 2;
        } else if($transcript->score_1 >= 7 && $transcript->score_2 >= 7 && $transcript->score_3 >= 7 && $transcript->score_4 >= 7 && $transcript->score_5 >= 7){
            $check = 3;
        }
        
        if($check == 0) {
            event(new DemoEvent("Bảng điểm sinh viên không đủ điều kiện xét học bổng"));
            event(new ErrorEvent($task->name, $task->email));
            $task->delete();
            return response()->json(false);
        }
        
        event(new SuccessEvent($task->name, $task->email, $awards[$check-1]));
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = Task::findOrFail($id);
        return response()->json(TaskResource::make($task));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $task = Task::findOrFail($id);

        $task->update(['status'=> 1]);
        return response()->json(TaskResource::make($task));
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
        $task = Task::find($id);
        $task->delete();
        return response()->json(true);
    }
}

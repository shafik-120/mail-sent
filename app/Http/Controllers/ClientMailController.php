<?php

namespace App\Http\Controllers;

use App\Models\ClientMail;
use App\Models\Sender_mail;
use App\Models\Mail_message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $SenderMails = Sender_mail::all();
        // $clientMail = ClientMail::first();
        // if ($clientMail) {
        //     foreach ($SenderMails as $value) {
        //         $mail_arr = [
        //             'mail' => $clientMail->mail,
        //             'mail_subject' => $clientMail->mail_subject,
        //             'mail_body' => $clientMail->mail_body,
        //             'mail_files' => $clientMail->mail_files,
        //             'from_email' => $value['mail'],
        //         ];
        //         $messageMail = Mail_message::create([
        //             'mail' => $clientMail->mail,
        //             'msg' => 'mail sent successful'
        //         ]);
        //         $deleteMail = ClientMail::where('mail', $clientMail->mail)->delete();
                
        //         echo "<pre>";
        //         print_r($mail_arr);
        //         echo " </pre>";
        //     }
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mail_all' => 'required',
            'mail_subject' => 'required',
            'mail_body' => 'required',
            'mail_files' => 'required',
            // 'mail_files' =>'required|max:50000|mimes:xlsx,doc,docx,ppt,pptx,ods,odt,odp,application/csv,application/excel',
        ]);
        $all_files = array();
        if ($request->file('mail_files')) {
            foreach ($request->file('mail_files') as $key => $value) {
                $originalName = $value->getClientOriginalName();
                $path = $value->storeAs('upload', $originalName, 'public');
                array_push($all_files, $path);
            }
        }

        $allFileName = implode(',', $all_files);
        $allMails = explode(' ', $request->mail_all);

        // All Other User Emails Push
        foreach ($allMails as $allMail) {
            $storeDB = ClientMail::create([
                'mail' => $allMail,
                'mail_subject' => $request->mail_subject,
                'mail_body' => $request->mail_body,
                'mail_files' => $allFileName,
            ]);
        }


        return back()->with('msg', 'You have successfully upload file.');
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
}

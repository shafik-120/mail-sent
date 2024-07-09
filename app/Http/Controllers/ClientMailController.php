<?php

namespace App\Http\Controllers;

use App\Models\ClientMail;
use App\Models\Sender_mail;
use Illuminate\Http\Request;

class ClientMailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail_arr = [
            'mail' => 'test@gmail.com',
            'mail_subject' => 'test subje4ct',
            'mail_body' => 'ststlkjsdlf',
            'mail_files' =>'lasjdfajsdoifjiojd,ajsdflos dfm, asfdlsfjdsf,dsfalsdj',
        ];
        $senderEmails = Sender_mail::all();
        foreach ($senderEmails as $senderMail) {
          $mail_arr['from_email'] = $senderMail->mail;
         echo "<pre>";
          print_r($mail_arr);
         echo "</pre>";
        }
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

        // Sender Mail Table Sender Emali Push
        if (!empty($request->mail_all_from)) {
            $senderAllMails = explode(' ', $request->mail_all_from);
            foreach ($senderAllMails as $senderMail) {
                $storeDB = Sender_mail::create([
                    'mail' => $senderMail,
                ]);
            }
        }

        return back()->with('success','You have successfully upload file.');
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

<?php

namespace App\Http\Controllers;

use App\Models\Mailsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailSetting = Mailsetting::all();
        if ($mailSetting) {
            // return $mailSetting;
            foreach ($mailSetting as $key => $value) {
                echo $value->mail_username . "<br>";
            }
        }

        // Mail::raw('Hi welcome', function ($mailmessage) {
        //     $mailmessage->to('saidul.mondol1972@gmail.com')->subject('Testing Mail');
        // });
        // echo "success";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mailSetting');

        // Mailsetting::create([
        //     'mail_transport' => 'smtp',
        //     'mail_host' => 'smtp.gmail.com',
        //     'mail_port' => '465',
        //     'mail_username' => 'shafikul.18288@gmail.com',
        //     'mail_password' => 'vyoslfufqlszefgv',
        //     'mail_encryption' => 'tls',
        //     'mail_from' => 'shafikul.18288@gmail.com',
        // ]);
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
            'mail_transport' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from' => 'required',
            'mail_sender_name' => 'required',
        ]);
        Mailsetting::create([
            'mail_transport' => $request->mail_transport,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from' => $request->mail_from,
            'mail_sender_name' => $request->mail_sender_name,
        ]);

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

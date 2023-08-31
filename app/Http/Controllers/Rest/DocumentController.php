<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\Document;
use App\Notifications\DocumentOtpNotif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class DocumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Document::get();

        $result = $rows;
        $message = 'OK';

        return $this->sendResponse($result, $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
        $row = $document;

        $result = $row;
        $message = 'OK';

        return $this->sendResponse($result, $message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
        $__state = $request->__state ?? NULL;

        switch ($__state) {
            case 'reject':
                $document->update([
                    'status' => 2,
                ]);

                return $this->sendResponse($document, 'OK');
                break;

            case 'request_otp':
                $otp = rand(000000, 999999);

                \App\Models\Otp::updateOrCreate(
                    [
                        'reff_id' => $document->id,
                    ],
                    [
                        'request_date' => Carbon::now(),
                        'token' => $otp,
                        'user_id' => auth()->user()->id,
                    ]
                );

                Notification::send(auth()->user(), new DocumentOtpNotif($otp));

                return $this->sendResponse($document, 'OK');
                break;

            case 'accept':
                $row = \App\Models\Otp::where([
                    ['token', $request->otp],
                    ['reff_id', $document->id],
                ])->first();

                if ($row) {
                    $document->update([
                        'status' => 1,
                    ]);

                    return $this->sendResponse($document, 'OK');
                } else {
                    $error = 'OTP tidak valid';
                    $errorMessages = 'OTP tidak valid';

                    return $this->sendError($error, $errorMessages, 500);
                }
                break;
            
            default:
                return abort(404);
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
